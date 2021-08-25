<?php

namespace App\Http\Controllers;

use App\Models\soluong;
use Illuminate\Http\Request;

class SoluongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soluong = soluong::all();

        return view('backend.thongtin.soluong.index', ['soluongs' => $soluong]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.thongtin.soluong.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        soluong::create($request->except('_token'));

        return redirect('admin.soluong.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\soluong  $soluong
     * @return \Illuminate\Http\Response
     */
    public function show(soluong $soluong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\soluong  $soluong
     * @return \Illuminate\Http\Response
     */
    public function edit(soluong $soluong)
    {
        return view('backend.thongtin.soluong.edit', ['soluong' => $soluong]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\soluong  $soluong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, soluong $soluong)
    {
        $soluong->update($request->except('_token'));

        return redirect('admin.soluong.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\soluong  $soluong
     * @return \Illuminate\Http\Response
     */
    public function destroy(soluong $soluong)
    {
        $soluong->delete();
        return redirect('admin.soluong.index');
    }
}
