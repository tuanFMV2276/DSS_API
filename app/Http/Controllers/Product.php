<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Product as EntitiesProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return EntitiesProduct::all();
        $products = EntitiesProduct::join('Main_Diamond', function ($join) {
            $join->on('Main_Diamond.id', '=', 'Product.id') ;
        })->select('Main_Diamond.*', 'Product.*')
        ->get();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = EntitiesProduct::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EntitiesProduct::findOrFail($id);
    }

    public function getProductByCode($product_code)
    {
        // Tìm sản phẩm với product_code trong cơ sở dữ liệu
        $product = EntitiesProduct::where('product_code', $product_code)->first();

        // Kiểm tra xem sản phẩm có tồn tại không
        if ($product) {
            return response()->json([
                'id' => $product->id,
            ]);
        } else {
            return response()->json([
                'error' => 'Product not found.'
            ], 404);
        }
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
        $product = EntitiesProduct::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EntitiesProduct::destroy($id);
        return response()->json(null, 204);
    }
}