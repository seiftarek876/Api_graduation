<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index', ['users' => User::orderBy('created_at', 'desc')->paginate(25)]);
    }
    // public function create()
    // {
    //     //
    // }
    // public function store(Request $request)
    // {
    //     //
    // }
    // public function show(string $id)
    // {
    //     //
    // }
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('users.edit')
            ->with(compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_name'=>'required|string|min:5',
            'user_email'=>['required','email',Rule::unique('users','user_email')->ignore($id)],
            'user_phone'=>'required|string|numeric|min:11',
        ]);
        try {
            User::find($id)->update($request->except('_token'));
            return to_route('users.index')->with('message', 'User updated');
        } catch (\Exception $exception) {
            return to_route('users.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::destroy($id);
            return to_route('users.index')->with('message', 'User deleted');
        } catch (\Exception $exception) {
            return to_route('users.index')->with('message', $exception->getMessage());
        }
    }
}
