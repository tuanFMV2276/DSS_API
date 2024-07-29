<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as EntitiesUser;

class User extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EntitiesUser::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = EntitiesUser::create($request->all());
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EntitiesUser::findOrFail($id);
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
        $user = EntitiesUser::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EntitiesUser::destroy($id);
        return response()->json(null, 204);
    }

    public function dataForBoard(){
        $total_user = EntitiesUser::selectRaw('COUNT(ALL id) as total_user')
                                    ->where('role','=','user')
                                        ->get();
        return response()->json($total_user,200);
    }

}
