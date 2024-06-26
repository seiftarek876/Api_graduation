<?php

namespace App\Http\Controllers;

use App\Models\binGroups;
use App\Http\Requests\StorebinGroupsRequest;
use App\Http\Requests\UpdatebinGroupsRequest;
use App\Models\admins;
use App\Models\Lessors;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class BinGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('binGroups.index', ['groups' => binGroups::orderBy('created_at', 'desc')->paginate(25) ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = admins::orderBy('id')->pluck('name' , 'id')->toArray();
        $subscribers = Lessors::orderby('id')->pluck('name' , 'id')->toArray();
        // $status = binGroups::orderBy('id')->pluck('status')->toArray();
        return view('binGroups.create' , compact(['admins' , 'subscribers']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'location'=>'required|string',
            'bins_count'=>'required|integer|min:2',
            'admin_id'=>'required' , 
            'lessor_id'=>'required'
        ]);
        try {
            binGroups::create($request->except('_token'));
            return to_route('binGroups.index')->with('message', 'Group Created');
        } catch (\Exception $exception) {
            return to_route('binGroups.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(binGroups $binGroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groups = binGroups::findOrFail($id);
        $status = binGroups::orderBy('id')->pluck('status')->toArray();
        $admins = admins::orderBy('id')->pluck('name' , 'id')->toArray();
        return view('binGroups.edit')->with(compact(['groups','status' , 'admins']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebinGroupsRequest $request, string $id)
    {
        $request->validate([
            'location'=>'required|string',
            'bins_count'=>'required|integer|min:2',
        ]);
        try {
            binGroups::find($id)->update($request->except('_token'));
            return to_route('binGroups.index')->with('message', 'Group updated');
        } catch (\Exception $exception) {
            return to_route('binGroups.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            binGroups::destroy($id);
            return to_route('binGroups.index')->with('message', 'Group deleted');
        } catch (\Exception $exception) {
            return to_route('binGroups.index')->with('message', $exception->getMessage());
        }
    }
}
