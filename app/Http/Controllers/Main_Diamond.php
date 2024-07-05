<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Main_Diamond as EntitiesMain_Diamond;

class Main_Diamond extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diamonds = EntitiesMain_Diamond::join('DiamondPriceList', function ($join) {
            $join->on('Main_Diamond.origin', '=', 'DiamondPriceList.origin') 
                  ->on('Main_Diamond.clarity', '=', 'DiamondPriceList.clarity')
                  ->on('Main_Diamond.cut', '=', 'DiamondPriceList.cut')
                  ->on('Main_Diamond.cara_weight', '=', 'DiamondPriceList.cara_weight')
                  ->on('Main_Diamond.color', '=', 'DiamondPriceList.color');
        })->select('Main_Diamond.*', 'DiamondPriceList.price')
        ->get();
        return response()->json($diamonds);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mainDiamond = EntitiesMain_Diamond::create($request->all());
        return response()->json($mainDiamond, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diamond = EntitiesMain_Diamond::join('DiamondPriceList', function ($join) {
            $join->on('Main_Diamond.origin', '=', 'DiamondPriceList.origin') 
                  ->on('Main_Diamond.clarity', '=', 'DiamondPriceList.clarity')
                  ->on('Main_Diamond.cut', '=', 'DiamondPriceList.cut')
                  ->on('Main_Diamond.cara_weight', '=', 'DiamondPriceList.cara_weight')
                    ->on('Main_Diamond.color', '=', 'DiamondPriceList.color');
        })
        ->select('Main_Diamond.*', 'DiamondPriceList.price')
        ->where('Main_Diamond.id', $id)
        ->firstOrFail();
    
        // Format the price
        // $diamond->price = number_format($diamond->price, 0, ',', '.');
    
        return response()->json($diamond);
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
        $mainDiamond = EntitiesMain_Diamond::findOrFail($id);
        $mainDiamond->update($request->all());
        return response()->json($mainDiamond, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EntitiesMain_Diamond::destroy($id);
        return response()->json(null, 204);
    }
}