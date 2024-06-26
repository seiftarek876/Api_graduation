<?php

namespace App\Http\Controllers;

use App\Models\bins;
use App\Http\Requests\StorebinsRequest;
use App\Http\Requests\UpdatebinsRequest;
use App\Models\binGroups;
use Illuminate\Http\Request;

class BinsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bins.index', ['bins' => bins::orderBy('created_at', 'desc')->paginate(25) ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = binGroups::orderBy('id')->pluck('id')->toArray();
        return view('bins.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'trash_weight' => 'required|integer|min:5',
            'bin_group_id' => 'required|exists:bin_groups,id'
        ]);
        try {
            bins::create($request->except('_token'));
            return to_route('bins.index')->with('message', 'Bin Created');
        } catch (\Exception $exception) {
            return to_route('bins.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(bins $bins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groups = binGroups::orderBy('id')->pluck('id')->toArray();
        $bins = bins::findOrFail($id);
        return view('bins.edit')
            ->with(compact('groups'))
            ->with(compact('bins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => 'required',
            'trash_weight' => 'required|integer|min:5',
            'bin_group_id' => 'required|exists:bin_groups,id'
        ]);
        try {
            bins::find($id)->update($request->except('_token'));
            return to_route('bins.index')->with('message', 'Bin updated');
        } catch (\Exception $exception) {
            return to_route('bins.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            bins::destroy($id);
            return to_route('bins.index')->with('message', 'Bin deleted');
        } catch (\Exception $exception) {
            return to_route('bins.index')->with('message', $exception->getMessage());
        }
    }
}
