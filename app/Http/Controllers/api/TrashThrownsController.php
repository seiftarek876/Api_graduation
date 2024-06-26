<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\trashThrowns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TrashThrownsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status'=> 'Data Returned',
            'data'=>trashThrowns::with(['bin' , 'user'])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bin_id' => 'required|exists:bins,id',
        ]);
        try {
            $t = trashThrowns::create($request->all());
            return response()->json([
                'status' => 'trash throw Created',
                'trash throw'=>$t
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
    public function show(trashThrowns $trashThrowns)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bin_id' => 'required|exists:bins,id'
        ]);
        try { 
            $c = trashThrowns::find($id)->update($request->all());
            if($c){
                    return response()->json([
                        'status' => 'trash throw Updated',
                        'trash throw' => trashThrowns::find($id)
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
    public function destroy(string $id)
    {
        try {
            trashThrowns::destroy($id);
            return response()->json([
                'Status' => 'Trash Throw Deleted',
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
            ], 500);
        }
    }
}
