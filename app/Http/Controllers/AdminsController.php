<?php

namespace App\Http\Controllers;

use App\Models\admins;
use App\Http\Requests\StoreadminsRequest;
use App\Http\Requests\UpdateadminsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.index', ['admins' => admins::orderBy('created_at', 'desc')->paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreadminsRequest $request)
    {
        $request->validate([
            'name'=>'required|string|min:5',
            'email'=>['required','email',Rule::unique('admins','email')],
            'phone'=>'required|string|numeric|min:11',
            'password'=>['required','min:8'],
            'role'=>'required'
        ]);
        try {
            admins::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone'=>$request->phone,
                'role'=>$request->role
            ]
            );
            return to_route('admins.index')->with('message', 'Admin Created');
        } catch (\Exception $exception) {
            return to_route('admins.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admins = admins::findOrFail($id);
        return view('admins.edit')
            ->with(compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminsRequest $request,string $id)
    {
        $request->validate([
            'name'=>'required|string|min:5',
            'email'=>['required','email',Rule::unique('admins','email')->ignore($id)],
            'phone'=>'required|string|numeric|min:11',
        ]);
        try {
            admins::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone'=>$request->phone,
                'role'=>$request->role
            ]);
            return to_route('admins.index')->with('message', 'Admin updated');
        } catch (\Exception $exception) {
            return to_route('admins.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            admins::destroy($id);
            return to_route('admins.index')->with('message', 'Admin deleted');
        } catch (\Exception $exception) {
            return to_route('admins.index')->with('message', $exception->getMessage());
        }
    }
}
