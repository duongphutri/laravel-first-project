<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::orderBy('created_at', 'DESC')->paginate(99);

        return view('backend.user.index', ['data' => $data]);
    }
    public function show()
    { }
    public function create()
    {
        return view('backend.user.create');
    }
    public function store(Request $request)
    {
        $data = ($request->except('_token'));

        User::create($data);

        return redirect()->route('admin.users.index');
    }
    public function edit(User $data)
    {
        return view('backend.user.edit', ['data' => $data]);
    }
    public function update(Request $request, User $data)
    {

        $data1 = $request->except('_token');
        $data->update($data1);
        return redirect()->route('admin.users.index');
    }
    public function destroy($user)
    {
        User::find($user)->delete();
        return redirect()->route('admin.users.index');
    }
}
