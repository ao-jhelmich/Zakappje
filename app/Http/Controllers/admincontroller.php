<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mainrequirements;
use App\Requirements;
use App\Instruction;
use App\Classes;
use Input;
use Redirect;


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
        if ($_POST['tablename'] == 'Mainrequirements') {
            $Classes = Classes::pluck('class_name', 'class_id'); 
            return view('admin.create', ['select' => $Classes]) 
            -> with('tablename', $_POST['tablename']);
        } elseif ($_POST['tablename'] == 'Requirements') {
            $Mainrequirements = Mainrequirements::pluck('mr_name', 'mr_id'); 
            return view('admin.create', ['select' => $Mainrequirements]) 
            -> with('tablename', $_POST['tablename']);
        } elseif ($_POST['tablename'] == 'Instruction') {
            $Requirements = Requirements::pluck('r_name', 'r_id'); 
            return view('admin.create', ['select' => $Requirements]) 
            -> with('tablename', $_POST['tablename']);
        }else{
            return "You are not supposed to be here";
        }
        
        
    }
    public function store()
    {
        if ($_POST['tablename'] == 'Mainrequirements') {
            $mainRequirement = new Mainrequirements;
            $mainRequirement->mr_name = Input::get('name');
            $mainRequirement->mr_description = Input::get('desc');
            $mainRequirement->flag = Input::get('flag');
            $mainRequirement->mr_class_id = Input::get('select');
            $mainRequirement->save();
        } elseif ($_POST['tablename'] == 'Requirements') {
            $Requirement = new Requirements;
            $Requirement->r_name = Input::get('name');
            $Requirement->r_mr_id = Input::get('select');
            $Requirement->flag = Input::get('flag');
            $Requirement->save();
        } elseif ($_POST['tablename'] == 'Instruction') {
            $Instruction = new Instruction;
            $Instruction->i_name = Input::get('name');
            $Instruction->i_desc = Input::get('desc');
            $Instruction->req_id = Input::get('select');
            $Instruction->flag = Input::get('flag');
            $Instruction->save();
        }else{
            return "You are not supposed to be here";
        }
            // redirect
            return Redirect::to('admin/');
    }
    public function edit(){}
    public function update(){}
    public function destroy(){}
}
