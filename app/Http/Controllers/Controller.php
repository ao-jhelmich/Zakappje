<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\userWantsChk;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // if (!Cache::has('allInfo')) {
        //     $allInfo = DB::table('ranks')
        //     ->select('ranks.*', 'mainrequirements.*', 'requirements.*')
        //     ->leftJoin('mainrequirements', 'ranks.rank_id', '=', 'mainrequirements.mainrequirements_rank_id')
        //     ->leftJoin('requirements', 'mainrequirements.mainrequirements_id', '=', 'requirements.requirements_mainrequirements_id')
        //     ->orderby('rank_id')
        //     ->get();
        
        //     Cache::forever('allInfo', $allInfo);
        // }
        
        $allInfo = DB::table('ranks')
        ->select('ranks.*', 'mainrequirements.*', 'requirements.*')
        ->leftJoin('mainrequirements', 'ranks.rank_id', '=', 'mainrequirements.mainrequirements_rank_id')
        ->leftJoin('requirements', 'mainrequirements.mainrequirements_id', '=', 'requirements.requirements_mainrequirements_id')
        ->orderby('rank_id')
        ->get();
    
        // $result = Cache::get('allInfo');
        
        $adminRows = userWantsChk::all();
        
        view()->share('allInfo', $allInfo);
        view()->share('adminRows', $adminRows);
    }
}
