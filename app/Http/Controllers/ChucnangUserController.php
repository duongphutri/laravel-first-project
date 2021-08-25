<?php

namespace App\Http\Controllers;

use App\Models\Chucnang_User;
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
        $datas = Chucnang_User::paginate(10);
        $user = user::all();
        return view('backend.chucnang_user.index', ['data' => $datas, 'users' => $user]);
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
            Chucnang_User::create([
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
    public function show(Chucnang_User $chucnang_User)
    {
        return view('backend.chucnang_user.show', ['chucnang_User' => $chucnang_User]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chucnang_User  $chucnang_User
     * @return \Illuminate\Http\Response
     */
    public function edit(Chucnang_User $chucnang_User)
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
    public function update(Request $request, Chucnang_User $chucnang_User)
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
    public function destroy(Chucnang_User $chucnang_User)
    {
        $chucnang_User->delete();

        return redirect()->route('chucnang.index');
    }
}
