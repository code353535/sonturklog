<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function userlist(){

        $user = User::all();
        return view('admin.users.userlist',['user' => $user]);
}

public function edit(user $user){

    return view('admin.users.edit', ['user' => $user]);
}

public function update(user $user, Request $request)
{

    $validated = $request->validate([
        'name' => 'required',
        'email' =>  ['required', Rule::unique('users')->ignore($user->id)],
        'role' => 'required',
        'status' => 'required'

    ]);

    $user->update($validated);

    return redirect(route('admin.userlist'));

}
public function destroy(user $user, Request $request)
{

    $user->delete();

    return redirect(route('admin.userlist'));

}

}
