<?php namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $userHasMainrequirementsId = UserHasMr::where('user_id' ,'=', $id);
        return view('profile.index', ['profile' => $userInfo]);
    }


}
