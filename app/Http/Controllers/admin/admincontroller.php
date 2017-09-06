<?php namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\mainrequirements;
use App\Instructions;
use App\requirements;


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
}
