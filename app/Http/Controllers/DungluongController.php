<?php

namespace App\Http\Controllers;

use App\Models\dungluong;
use Illuminate\Http\Request;

class DungluongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dungluong = dungluong::all();
        return view('backend.thongtin.dungluong.index',['dungluongs'=>$dungluong]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.thongtin.dungluong.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dungluong::create($request->except('_token'));

        return redirect('admin.dungluong.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dungluong  $dungluong
     * @return \Illuminate\Http\Response
     */
    public function show(dungluong $dungluong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dungluong  $dungluong
     * @return \Illuminate\Http\Response
     */
    public function edit(dungluong $dungluong)
    {
        return view('backend.thongtin.dungluong.edit', ['dungluong' => $dungluong]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dungluong  $dungluong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dungluong $dungluong)
    {
        $dungluong->update($request->except('_token'));
        return redirect('admin.dungluong.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dungluong  $dungluong
     * @return \Illuminate\Http\Response
     */
    public function destroy(dungluong $dungluong)
    {
        $dungluong->delete();
        return redirect('admin.dungluong.index');
    }
}
