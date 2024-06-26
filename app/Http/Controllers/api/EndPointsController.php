<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\binGroups;
use App\Models\bins;
use App\Models\trashThrowns;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EndPointsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $VisitsPerDay = trashThrowns::select(
            DB::raw('COUNT(id) as numberVisits'),
            DB::raw('dayname(created_at) as dt')
        )->groupBy(DB::raw('dayname(created_at)'))->get();
        $visitsPerMonth = trashThrowns::select(
            DB::raw('COUNT(id) as numberVisits'),
            DB::raw('month(created_at) as dt')
        )->groupBy(DB::raw('month(created_at)'))->get();
        $visitsPerYear = trashThrowns::select(
            DB::raw('COUNT(id) as numberVisits'),
            DB::raw('year(created_at) as dt')
        )->groupBy(DB::raw('year(created_at)'))->get();
        $pointsPermonth = trashThrowns::select(
            DB::raw('sum(score) as points'),
            DB::raw('MONTH(created_at) as dt')
        )->groupBy(DB::raw('MONTH(created_at)'))->get();
        $totalthrowns = trashThrowns::count('id');
        $visitsMaterial = DB::select('select type , count(t.id) as throwns from bins join trash_throwns as t On bins.id = t.bin_id group by type');

        return response()->json([
            'status'=> 'Data Returned',
            'visits per days'=>$VisitsPerDay,
            'visits per month'=>$visitsPerMonth,
            'visits per year'=>$visitsPerYear,
            'Total Visits'=> $totalthrowns ,
            'throwns for each material'=>$visitsMaterial ,
            'points per month'=>$pointsPermonth
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
