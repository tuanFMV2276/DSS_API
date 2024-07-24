<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Order as EntitiesOrder;
use Illuminate\Support\Facades\DB;

class Order extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = EntitiesOrder::join('Order_Detail', function ($join) {
            $join->on('Order_Detail.id', '=', 'Order.id');
        })->select('Order_Detail.*', 'Order.*');
        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = EntitiesOrder::create($request->all());
        return response()->json($order, 201);
    }

    // public function store(Request $request)
    // {
    //     // Validate dữ liệu nếu cần thiết
    //     $validatedData = $request->validate([
    //         'order_date' => 'nullable|date',
    //         'total_price' => 'required|numeric',
    //         'name' => 'required|string',
    //         'email' => 'required|email',
    //         'address' => 'required|string',
    //         'phone' => 'required|string',
    //         'status' => 'integer',
    //     ]);

    //     // Lưu dữ liệu vào database, ví dụ sử dụng Eloquent
    //     $order = EntitiesOrder::create($validatedData);

    //     // Trả về response json thành công
    //     return response()->json($order, 201);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EntitiesOrder::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = EntitiesOrder::findOrFail($id);
        $order->update($request->all());
        return response()->json($order, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EntitiesOrder::destroy($id);
        return response()->json(null, 204);
    }
    public function statusDisplay($status)
    {
        return EntitiesOrder::where('status', $status)->get();
    }

    public function searchOrder($user_name, $order_date)
    {
        if ($user_name === 'null' && $order_date === 'null') {
            $orders = EntitiesOrder::all();
        } else if ($user_name != 'null' && $order_date != 'null') {
            $match_these = ['name' => $user_name, 'order_date' => $order_date];
            $orders = EntitiesOrder::where($match_these)->get();
        } else {
            if ($order_date === 'null') {
                $orders = EntitiesOrder::where('name', $user_name)->get();
            } else {
                $orders = EntitiesOrder::where('order_date', $order_date)->get();
            }
        }
        return response()->json(['orders' => $orders], 200);
    }

    public function dashboardDataRender($criteria)
    {
        $data = [];
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        switch ($criteria) {
            case 'year':
                $data = EntitiesOrder::selectRaw('YEAR(order_date) as year')
                    ->selectRaw('SUM(total_price) as revenue')
                    ->groupBy(DB::raw('YEAR(order_date)'))
                    ->orderBy(DB::raw('YEAR(order_date)'))
                    ->get()
                    ->map(function ($item) {
                        return [
                            'x' => $item->year,
                            'y' => $item->revenue,
                        ];
                    });
                break;
            case 'month':
                $data = EntitiesOrder::whereRaw('YEAR(order_date) = ?', [$currentYear])
                    ->selectRaw('MONTH(order_date) as month')
                    ->selectRaw('SUM(total_price) as revenue')
                    ->groupBy(DB::raw('MONTH(order_date)'))
                    ->orderBy(DB::raw('MONTH(order_date)'))
                    ->get()
                    ->map(function ($item) {
                        return [
                            'x' => $item->month,
                            'y' => $item->revenue,
                        ];
                    });
                break;
            case 'day':
                $data = EntitiesOrder::selectRaw('DAY(order_date) as day')
                    ->whereRaw('MONTH(order_date) = ?', [$currentMonth])
                    ->whereRaw('YEAR(order_date) = ?', [$currentYear])
                    ->selectRaw('SUM(total_price) as revenue')
                    ->groupBy(DB::raw('DAY(order_date)'))
                    ->orderBy(DB::raw('DAY(order_date)'))
                    ->get()
                    ->map(function ($item) {
                        return [
                            'x' => $item->day,
                            'y' => $item->revenue,
                        ];
                    });
                break;
            default:
                return response()->json(['error' => 'Invalid criteria'], 400);
        }

        return response()->json($data);
    }

}
