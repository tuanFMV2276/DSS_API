<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Material as Entities_Material;

class Order_Detail extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Entities_Material::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderDetail = Entities_Material::create($request->all());
        return response()->json($orderDetail, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Entities_Material::findOrFail($id);
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
        $orderDetail = Entities_Material::findOrFail($id);
        $orderDetail->update($request->all());
        return response()->json($orderDetail, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entities_Material::destroy($id);
        return response()->json(null, 204);
    }
}
