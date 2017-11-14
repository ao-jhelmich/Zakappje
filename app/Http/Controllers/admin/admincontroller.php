<?php namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect;

use App\mainrequirements;
use App\Instructions;
use App\requirements;
use App\Ranks;


class AdminController extends Controller
{
   	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('admin.index');
    }

    public function manageBookPage()
    {
    	$mainRequirements = Mainrequirements::All();
        $Instructions = Instructions::All();
        $Requirements = Requirements::All();
    	return view('admin.manage' , [	'Requirements' => $Requirements ,
    									'Instructions' => $Instructions ,
    									'mainRequirements' => $mainRequirements ]);
    }

    public function MainrequirementOfTheDayPage()
    {
        $mainrequirementsRank1s = Mainrequirements::where('mainrequirements_rank_id', '1')-> get();
        $mainrequirementsRank2s = Mainrequirements::where('mainrequirements_rank_id', '2')-> get();
        $mainrequirementsRank3s = Mainrequirements::where('mainrequirements_rank_id', '3')-> get();
        $mainrequirementsRank4s = Mainrequirements::where('mainrequirements_rank_id', '4')-> get();

        $rank = Ranks::pluck("rank_name");
        return view('admin.mod',[
                                'rank' => $rank, 
                                'mainrequirementsRank1s' => $mainrequirementsRank1s,
                                'mainrequirementsRank2s' => $mainrequirementsRank2s,
                                'mainrequirementsRank3s' => $mainrequirementsRank3s,
                                'mainrequirementsRank4s' => $mainrequirementsRank4s,
                                 ]);
    }

    public function setMainrequirementOfTheDay(Request $request)
    {
        $mainrequirementsWithModflag = Mainrequirements::where('ModFlag', 2)->get();

        foreach ($mainrequirementsWithModflag as $key => $value) {
            $value->ModFlag = 1;
            $value->save();
        }
        
        $mainRequirementRank1 = Mainrequirements::find($request["mainrequirementsRank1"]);
        $mainRequirementRank1->ModFlag = 2;
        $mainRequirementRank1->save();

        $mainRequirementRank2 = Mainrequirements::find($request["mainrequirementsRank2"]);
        $mainRequirementRank2->ModFlag = 2;
        $mainRequirementRank2->save();

        $mainRequirementRank3 = Mainrequirements::find($request["mainrequirementsRank3"]);
        $mainRequirementRank3->ModFlag = 2;
        $mainRequirementRank3->save();

        $mainRequirementRank4 = Mainrequirements::find($request["mainrequirementsRank4"]);
        $mainRequirementRank4->ModFlag = 2;
        $mainRequirementRank4->save();
        
        $request->session()->flash('alert-success', 'Klasseneissen van de dag Succesvol toegevoegd');
        return Redirect::to('admin/mod');
    }
}
