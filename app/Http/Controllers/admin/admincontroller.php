<?php namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect;

use App\Model\Book\mainrequirements;
use App\Model\Book\Instructions;
use App\Model\Book\requirements;
use App\Model\Book\Ranks;


class AdminController extends Controller
{
   	public function __construct()
    {
        parent::__construct();
        
        $this->middleware(['auth', 'admin']);
    }

    public function manageBookPage()
    {
    	$mainRequirements = Mainrequirements::All();
        $Instructions = Instructions::All();
        $Requirements = Requirements::All();

    	return view('admin.manage' , compact('Requirements', 'Instructions', 'mainRequirements'));
    }

    public function MainrequirementOfTheDayPage()
    {
        $mainrequirementsRank1s = Mainrequirements::where('mainrequirements_rank_id', '1')-> get();
        $mainrequirementsRank2s = Mainrequirements::where('mainrequirements_rank_id', '2')-> get();
        $mainrequirementsRank3s = Mainrequirements::where('mainrequirements_rank_id', '3')-> get();
        $mainrequirementsRank4s = Mainrequirements::where('mainrequirements_rank_id', '4')-> get();

        $rank = Ranks::pluck("rank_name");
        return view('admin.mod', compact(
                                'rank', 
                                'mainrequirementsRank1s',
                                'mainrequirementsRank2s',
                                'mainrequirementsRank3s',
                                'mainrequirementsRank4s'
                                 ));
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
