<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mainrequirements;
use App\Requirements;
use App\Instruction;

class admincontroller extends Controller
{
   	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('admin.index');
    }

    public function manage()
    {
        if ($_POST['tablename'] == 'Mainrequirements') {
            $Mainrequirements = Mainrequirements::All();
            return view('admin.manage', ['Mainrequirements' => $Mainrequirements])
                -> with('tablename', $_POST['tablename']);
        } elseif ($_POST['tablename'] == 'Requirements') {
            $Requirements = Requirements::All();
            return view('admin.manage', ['Requirements' => $Requirements])
                -> with('tablename', $_POST['tablename']);
        } elseif ($_POST['tablename'] == 'Instruction') {
            $Instruction = Instruction::All();
            return view('admin.manage', ['Instructions' => $Instruction])
                -> with('tablename', $_POST['tablename']);;
        } else {
            return "You are not supposed to be here";
        }
    }
    public function show(){}
    public function create()
    {
        return view('admin.create') -> with('tablename', $_POST['tablename']);
    }
    public function store(){}
    public function edit(){}
    public function update(){}
    public function destroy(){}
}
