<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThongtinRequest;
use App\Http\Requests\UpdateThongtinRequest;
use App\Models\Thongtin;
use Illuminate\Http\Request;

class ThongtinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thongtin = Thongtin::paginate(10);

        return view('backend.thongtinsp.index', ['thongtins' => $thongtin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.thongtinsp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreThongtinRequest $request)
    {
        Thongtin::create($request->except('_token'));
        return redirect()->route('admin.thongtin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thongtin  $thongtin
     * @return \Illuminate\Http\Response
     */
    public function show(Thongtin $thongtin)
    {
        return view('backend.thongtinsp.show', ['thongtin' => $thongtin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thongtin  $thongtin
     * @return \Illuminate\Http\Response
     */
    public function edit(Thongtin $thongtin)
    {
        return view('backend.thongtinsp.edit', ['thongtin' => $thongtin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thongtin  $thongtin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateThongtinRequest $request, Thongtin $thongtin)
    {
        $thongtin->update($request->except('_token'));
        return redirect()->route('admin.thongtin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thongtin  $thongtin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thongtin $thongtin)
    {
        $thongtin->delete();
        return redirect()->route('admin.thongtin.index');
    }
}
