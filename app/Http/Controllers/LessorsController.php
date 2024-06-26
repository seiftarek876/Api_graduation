<?php

namespace App\Http\Controllers;

use App\Models\Lessors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LessorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lessors.index', ['lessors' => Lessors::orderBy('created_at', 'desc')->paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lessors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:5',
            'email'=>['required','email',Rule::unique('lessors','email')],
            'phone_number'=>'required|string|numeric|min:11',
            'subscribtion_fee'=>'required|numeric'
        ]);
        try {
            Lessors::create($request->except('_token'));
            return to_route('lessors.index')->with('message', 'Subscriber Created');
        } catch (\Exception $exception) {
            return to_route('lessors.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lessors $lessors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lessors = Lessors::findOrFail($id);
        return view('lessors.edit')
            ->with(compact('lessors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|string|min:5',
            'email'=>['required','email',Rule::unique('lessors','email')->ignore($id)],
            'phone_number'=>'required|string|numeric|min:11',
            'subscribtion_fee'=>'required|numeric'
        ]);
        try {
            Lessors::find($id)->update($request->except('_token'));
            return to_route('lessors.index')->with('message', 'Subscriber updated');
        } catch (\Exception $exception) {
            return to_route('lessors.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Lessors::destroy($id);
            return to_route('lessors.index')->with('message', 'Subscriber deleted');
        } catch (\Exception $exception) {
            return to_route('lessors.index')->with('message', $exception->getMessage());
        }
    }
}
