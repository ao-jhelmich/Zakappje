<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirements;
use App\Mainrequirements;
use App\Ranks;
use App\User;

use App\UserHasReq;
use App\UserHasMr;
use App\UserWantsChk;

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
		return redirect()->back();

	}

	public function addCheckToAdminRow($requirementid, $userid)
	{
		$requirementName = Requirements::Find($requirementid);
		$userName = User::Find($userid);

		$chkForAdmin = new userWantsChk;
			$chkForAdmin->user_id = $userid;
			$chkForAdmin->user_name = $userName->name;
			$chkForAdmin->requirement_name = $requirementName->requirements_name;
			$chkForAdmin->requirement_id = $requirementid;
		$chkForAdmin->save();

		return back();
		return redirect()->back();
	}

    public function addUserHas(Request $request)
    {
    	//Saves the requirement too the user and deletes it
    	$userHasR = new UserHasReq;
    		$userHasR->user_id = $request->user_id;
    		$userHasR->requirement_id = $request->requirement_id;
    	$userHasR->save();
		
    	$delUserWantsCheck = UserWantsChk::find($request->check_id);
    	if(!empty($delUserWantsCheck)){
    		$delUserWantsCheck->delete();
    	}
		
    	//Getting the Requirements needed for the main requirement
    	$reqNeededForMr = Requirements::find($request->requirement_id);

    	//checking if al req are met for the Main requirement
    		//Getting the requirements from the user and the requirements available
    	$checkUserHasReq = UserHasReq::where('user_id', $request->user_id)->count();
    	$checkAmountOfReqForMainReq = Requirements::where('requirements_mainrequirements_id', 
    														$reqNeededForMr->requirements_mainrequirements_id)->count();

    		//Checcking the user has req with the available req
    	if ($checkUserHasReq == $checkAmountOfReqForMainReq) {
    		$userHasMr = new UserHasMr;
    			$userHasMr->user_id = $request->user_id;
    			$userHasMr->mainrequirement_id = $reqNeededForMr->requirements_mainrequirements_id;
    		$userHasMr->save();
    	}
    	
    	//checking if all main requirements are met for the main requirement
    		//Getting the mainrequirements needed for class
    	$checkUserHasMr = UserHasMr::where('user_id',$request->user_id)->count();
    	$checkAmountOfMrForRank = Mainrequirements::where('mainrequirements_id', 
    														$reqNeededForMr->requirements_mainrequirements_id)->count();
    	if($checkUserHasMr == $checkAmountOfMrForRank){
    		$userHasR = DB::table('users')->whereId($request->user_id)->increment('users_rank_id'); 
    	}

    	return Redirect::to('/');
    }
}
