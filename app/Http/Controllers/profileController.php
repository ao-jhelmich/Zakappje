<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\user;
use App\UserHasReq;
use App\requirements;
use App\mainrequirements;
use App\UserHasMr;

class profileController extends Controller
{
    public function index()
    {	
        $id = Auth::user()->id;
        $userInfo = User::find($id);

        //User has requirements and info about the Requirements
        //$userHasReq = UserHasReq::find($id)->get();
          //  $requirementInfo = Requirements::find($userHasReq->requirement_id);

        //Getting mainrequirement info
        //$userHasMr = UserHasMr::find($userInfo->id)->get();
          //  $mainrequirementInfo = Mainrequirements::find($userHasMr->mainrequirement_id);

        return view('profile.index', ['profile' => $userInfo

            //, 'userHasR' => $requirementInfo, 'userHasMr' => $mainrequirementInfo
            ]);
    }


}
