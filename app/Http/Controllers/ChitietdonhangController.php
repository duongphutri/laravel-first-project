<?php

namespace App\Http\Controllers;

use App\Models\Chitietdonhang;
use App\Models\donhang;
use App\Models\mathang;
use Illuminate\Http\Request;

class ChitietdonhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chitietdonhang = chitietdonhang::paginate(10);

        return view('backend.chitietdonhang.index', ['chitietdonhangs' => $chitietdonhang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $donhangs = donhang::all();
        $mathangs = mathang::all();
        return view('backend.chitietdonhang.create', [
            'donhangs' => $donhangs,
            'mathangs' => $mathangs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        chitietdonhang::create($request->except('_token'));
        return redirect()->route('admin.chitietdonhang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chitietdonhang  $chitietdonhang
     * @return \Illuminate\Http\Response
     */
    public function show(chitietdonhang $chitietdonhang)
    {
        return view('backend.chitietdonhang.show', ['chitietdonhang' => $chitietdonhang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chitietdonhang  $chitietdonhang
     * @return \Illuminate\Http\Response
     */
    public function edit(chitietdonhang $chitietdonhang)
    {
        $donhangs = donhang::all();
        $mathangs = mathang::all();
        return view('backend.chitietdonhang.edit', [
            'chitietdonhang' => $chitietdonhang,
            'donhangs' => $donhangs,
            'mathangs' => $mathangs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chitietdonhang  $chitietdonhang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chitietdonhang $chitietdonhang)
    {
        $chitietdonhang->update($request->except('_token'));

        return redirect()->route('admin.chitietdonhang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chitietdonhang  $chitietdonhang
     * @return \Illuminate\Http\Response
     */
    public function destroy(chitietdonhang $chitietdonhang)
    {
        $chitietdonhang->delete();

        return redirect()->route('admin.chitietdonhang.index');
    }
}
