<?php

namespace App\Http\Controllers;

use App\Models\mau;
use Illuminate\Http\Request;

class MauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mau = mau::all();
        return view('backend.thongtin.mau.index',['maus'=>$mau]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.thongtin.mau.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        mau::create($request->except('_token'));

        return redirect('admin.mau.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mau  $mau
     * @return \Illuminate\Http\Response
     */
    public function show(mau $mau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mau  $mau
     * @return \Illuminate\Http\Response
     */
    public function edit(mau $mau)
    {
        return view('backend.thongtin.mau.edit', ['mau' => $mau]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mau  $mau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mau $mau)
    {
        $mau->update($request->except('_token'));

        return redirect('admin.mau.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mau  $mau
     * @return \Illuminate\Http\Response
     */
    public function destroy(mau $mau)
    {
        $mau->delete();
        return redirect('admin.mau.index');
    }
}
