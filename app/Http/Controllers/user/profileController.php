<?php namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\user;
use App\Model\Admin\UserHasReq;
use App\Model\Book\requirements;
use App\Model\Book\mainrequirements;
use App\Model\Admin\UserHasMr;

class profileController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth', ['only' => ['index']]);
	}
	
    public function index()
    {	
	        $id = Auth::user()->id;
	        $userInfo = User::find($id);

	        $userHasMainrequirementsId = UserHasMr::where('user_id' ,'=', $id);
	        return view('profile.index', ['profile' => $userInfo]);
    }


}
