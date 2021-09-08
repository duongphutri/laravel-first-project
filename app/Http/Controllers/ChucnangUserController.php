<?php

namespace App\Http\Controllers;

use App\Models\chucnang_users;
use App\Models\User;
use Illuminate\Http\Request;

class ChucnangUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = chucnang_users::paginate(10);
        // dd($datas);
        $user = user::all();
        return view('backend.chucnang_user.index', ['datas' => $datas, 'users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('backend.chucnang_user.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->route as $route) {
            chucnang_users::create([
                'id_user' => $request->email,
                'nameroute' => $route,
            ]);
        }

        return redirect()->route('chucnang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chucnang_User  $chucnang_User
     * @return \Illuminate\Http\Response
     */
    public function show(chucnang_users $chucnang_User)
    {
        return view('backend.chucnang_user.show', ['chucnang_User' => $chucnang_User]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chucnang_User  $chucnang_User
     * @return \Illuminate\Http\Response
     */
    public function edit(chucnang_users $chucnang_User)
    {
        return view('backend.chucnang_user.edit', ['chucnang_User' => $chucnang_User]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chucnang_User  $chucnang_User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chucnang_users $chucnang_User)
    {
        $data = $request->except('_token');
        $chucnang_User->update($data);
        return redirect()->route('backend.chucnang.index', ['chucnang_User' => $chucnang_User]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChucnanAg_User  $chucnang_User
     * @return \Illuminate\Http\Response
     */
    public function destroy(chucnang_users $chucnang_User)
    {
        $chucnang_User->delete();

        return redirect()->route('chucnang.index');
    }
    public function destroyAllchucnanguser(Request $request)
    {
        $listProduct = $request->deleteProduct;

        foreach ($listProduct as $productId) {
            chucnang_users::find($productId)->delete();
        }

        return redirect()->route('admin.chucnang.index');
    }
}
