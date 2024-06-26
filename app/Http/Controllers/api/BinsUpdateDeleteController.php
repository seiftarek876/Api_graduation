<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatebinsRequest;
use App\Http\Resources\BinResource;
use App\Models\binGroups;
use App\Models\bins;
use Illuminate\Support\Facades\Log;

class BinsUpdateDeleteController extends Controller
{
    public function update(Request $request,$id)
    {
        $request->validate([
            'type' => 'required',
            'trash_weight' => 'required',
            'bin_group_id' => 'required|exists:bin_groups,id',
            'current_trash_Weight' => 'required|numeric',
            'isFull' => 'required'
        ]);
try { 
           $bins = bins::find($id);
           $bins->type = $request->type;
           $bins->trash_weight = $request->trash_weight;
           $bins->bin_group_id = $request->bin_group_id;
           $bins->current_trash_weight = $request->current_trash_Weight;
           $bins->isFull = $request->isFull;
           $result = $bins->save();
           if($result){
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
}
