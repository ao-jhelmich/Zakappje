<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Book\Requirements;
use App\Model\Book\Mainrequirements;
use App\Ranks;
use App\User;

use App\Model\Admin\UserHasReq;
use App\Model\Admin\UserHasMr;
use App\Model\Admin\UserWantsChk;

use Redirect;
use DB;

class checkController extends Controller
{
	public function index($requirementid, $userid, $check_id)
	{
		$user = User::Find($userid);
		$checkId = $check_id;
		$requirement = Requirements::Find($requirementid);
		return view('check.index', ['user' => $user, 'requirement' =>$requirement, 'checkId' => $checkId]);
	}

	public function deleteChkFromAdminRow($checkid)
	{
		$adminRowCheck = UserWantsChk::find($checkid);
			$adminRowCheck->delete();

		return back();

	}

	public function addCheckToAdminRow($requirementid, $userid, Request $request)
	{
		$requirementName = Requirements::Find($requirementid);
		$userName = User::Find($userid);

		$chkForAdmin = new userWantsChk;
			$chkForAdmin->user_id = $userid;
			$chkForAdmin->user_name = $userName->name;
			$chkForAdmin->requirement_name = $requirementName->requirements_name;
			$chkForAdmin->requirement_id = $requirementid;
		$chkForAdmin->save();

        $request->session()->flash('alert-success', 'Aftekenen aangevraagd!');

		return back();
	}

    public function addUserHas(Request $request)
    {
    	//Saves the requirement too the user and deletes it
        $mainReqIdFromReqInDispute = Requirements::where('requirements_id', $request->requirement_id)->first();
        
        $userHasR = new UserHasReq;
            $userHasR->user_id = $request->user_id;
            $userHasR->requirement_id = $request->requirement_id;
            $userHasR->user_has_requirement_mainrequirement_id = $mainReqIdFromReqInDispute->requirements_mainrequirements_id;;
        $userHasR->save();
      
		
    	$delUserWantsCheck = UserWantsChk::find($request->check_id);
    	if(!empty($delUserWantsCheck)){
    		$delUserWantsCheck->delete();
    	}
		
    	//Getting the Requirements needed for the main requirement
    	$reqNeededForMr = Requirements::find($request->requirement_id);


        //checking if al req are met for the Main requirement
    		//Getting the requirements from the user and the requirements available

    	$checkUserHasReq = UserHasReq::where('user_has_requirement_mainrequirement_id', $reqNeededForMr->requirements_mainrequirements_id)->count();   
    	$checkAmountOfReqForMainReq = Requirements::where('requirements_mainrequirements_id', 
    														$reqNeededForMr->requirements_mainrequirements_id)->count(); //1


        //Get the mainrequirement
        $mainrequirementRankId = Mainrequirements::find($mainReqIdFromReqInDispute->requirements_mainrequirements_id);


            //Checcking the user obtained requirements with the available requirements
        if ($checkUserHasReq == $checkAmountOfReqForMainReq) {
            $userHasMr = new UserHasMr;
                $userHasMr->user_id = $request->user_id;
                $userHasMr->mainrequirement_id = $reqNeededForMr->requirements_mainrequirements_id;
                $userHasMr->user_has_mainrequirement_rank_id = $mainrequirementRankId->mainrequirements_rank_id;
            $userHasMr->save();
        }
        
        //checking if all main requirements are met for the main requirement
            //Getting the mainrequirements needed for class
        $mainReqNeededForRank = Mainrequirements::find($reqNeededForMr->requirements_mainrequirements_id);
        $checkUserHasMr = UserHasMr::where('user_has_mainrequirement_rank_id', $mainrequirementRankId->mainrequirements_rank_id)->count(); // komt op 1
        
        $checkAmountOfMrForRank = Mainrequirements::where('mainrequirements_rank_id', 
                                                            $mainReqNeededForRank->mainrequirements_rank_id)->count();

    	if($checkUserHasMr == $checkAmountOfMrForRank){
    		$userHasR = User::find($request->user_id);
                $userHasR->users_rank_id = $mainReqNeededForRank->mainrequirements_rank_id;
            $userHasR->save(); 
    	}

        $request->session()->flash('alert-warning', 'Klasse eis afgekruist!');

    	return Redirect::to('/');
    }
}
