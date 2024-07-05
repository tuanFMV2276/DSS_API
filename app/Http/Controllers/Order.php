<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Order as EntitiesOrder;

class Order extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EntitiesOrder::all();
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
    public function statusDisplay($status){
        return EntitiesOrder::where('status', $status)->get();
    }

    public function searchOrderByName($user_name){
        $orders = EntitiesOrder::where('name', $user_name)->get();
        return response()->json(['orders' => $orders], 200);
    }
    
}
