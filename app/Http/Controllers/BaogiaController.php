<?php

namespace App\Http\Controllers;

use App\Models\baogia;
use Illuminate\Http\Request;

class BaogiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baogia = baogia::paginate(10);

        return view('backend.excel.index', ['baogias' => $baogia]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.excel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        baogia::create($data);
        return redirect()->route('admin.baogia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\baogia  $baogia
     * @return \Illuminate\Http\Response
     */
    public function show(baogia $baogia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\baogia  $baogia
     * @return \Illuminate\Http\Response
     */
    public function edit(baogia $baogia)
    {
        return view('backend.excel.edit', ['baogia' => $baogia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\baogia  $baogia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, baogia $baogia)
    {
        $data = $request->except('_token');
        $baogia->update($data);
        return redirect()->route('admin.baogia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\baogia  $baogia
     * @return \Illuminate\Http\Response
     */
    public function destroy(baogia $baogia)
    {
        $baogia->delete();
        return redirect()->route('admin.baogia.index');
    }
}
