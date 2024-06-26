<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatebinsRequest;
use App\Http\Resources\BinResource;
use App\Models\binGroups;
use App\Models\bins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BinsAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status'=> 'Data Returned',
            'data'=>bins::with('binGroup')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'trash_weight' => 'required',
            'bin_group_id' => 'required|exists:bin_groups,id'
        ]);
        try {
            $c = bins::create($request->all());
            return response()->json([
                'status' => 'Bin Created',
                'bin'=>$c
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bins $bins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $request->validate([
            'bin_group_id' => 'required|exists:bin_groups,id'
        ]);
try { 
    $c = bins::find($id)->update($request->all());
    if($c){
            return response()->json([
                'status' => 'bins Updated',
                'bins' => new BinResource(bins::find($id))
            ]);
        }
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
            ], 500);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bins $bins , $id)
    {
        try {
            $c = bins::destroy($id);
            return response()->json([
                'status' => 'Company Deleted',
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
            ], 500);
        }
    }
}
