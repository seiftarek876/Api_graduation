<?php

namespace App\Http\Controllers;

use App\Models\binGroups;
use App\Models\bins;
use App\Models\trashThrowns;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function barChart()
    {
        $sumsPerDay = bins::select(
            DB::raw('DATE(updated_at) as date'),
            DB::raw('SUM(current_trash_weight) as total_weight'),
        )
        ->groupBy(DB::raw('DATE(updated_at)'))
        ->get();
    
    // Output the results
    foreach ($sumsPerDay as $sum) {
        $date[] = [$sum->date];
        $weight[] = [$sum->total_weight];
    }
         $data = [
            'labels' => $date,
            'data' => $weight,
        ];
        $sumOfType = bins::select(
            DB::raw('type'),
            DB::raw('SUM(current_trash_weight) as total_weight') 
        )->groupBy('type')->get();
        foreach($sumOfType as $sum2){
            $weight2[] = [$sum2->total_weight];
            $type[] = [$sum2->type]; 
        }
        $data2 = [
            'labels' => $type ,
            'datasets' => $weight2
        ];
        $numberOfVisits = trashThrowns::select(
            DB::raw('COUNT(id) as numberVisits'),
            DB::raw('DATE(created_at) as dt')
        )->groupBy(DB::raw('DATE(created_at)'))->get();
        foreach($numberOfVisits as $Nvisits){
            $visits[] =[$Nvisits->numberVisits] ;
            $date2[] = [$Nvisits ->dt];
        }
        $data3 = [
            'labels' => $date2 ,
            'datasets' => $visits
        ];
        $pointsPermonth = trashThrowns::select(
            DB::raw('sum(score) as points'),
            DB::raw('MONTH(created_at) as dt')
        )->groupBy(DB::raw('MONTH(created_at)'))->get();
        foreach($pointsPermonth as $P){
            $point[] =[$P->points] ;
            $date3[] = [$P ->dt];
        }
        $data4 = [
            'labels' => $date3 ,
            'datasets' => $point
        ];
        $totalUsers = User::select(
            DB::raw('COUNT(id) as total_number')
        )->get()->toArray();
        $totalBins = bins::select(
            DB::raw('COUNT(id) as total_bins')
        )->get()->toArray();
        $averageDuration = trashThrowns::select(
            DB::raw('AVG(updated_at - created_at) as average')
        )->get()->toArray();
        $averageWeight = bins::select(
            DB::raw('AVG(current_trash_weight) as average_weight')
        )->get()->toArray();
        $totalGroups = binGroups::select(
            DB::raw('COUNT(id) as totalGroups')
        )->get()->toArray();

        return view('das', compact(['data' , 'data2' ,'data3', 'totalUsers' , 'totalBins' , 'averageDuration' , 'averageWeight' , 'totalGroups' , 'data4']));
    
}
}
