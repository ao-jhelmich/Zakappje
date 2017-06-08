<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mainrequirements;
use App\Requirements;
use App\Instructions;
use App\Ranks;
use DB;
use Input;
use Redirect;


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
            $Instruction = Instructions::All();
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
            $ranks = Ranks::pluck('rank_name', 'rank_id'); 
            return view('admin.create', ['select' => $ranks]) 
            -> with('tablename', $_POST['tablename']);
        } elseif ($_POST['tablename'] == 'Requirements') {
            $Mainrequirements = Mainrequirements::pluck('mainrequirements_name', 'mainrequirements_id'); 
            return view('admin.create', ['select' => $Mainrequirements]) 
            -> with('tablename', $_POST['tablename']);
        } elseif ($_POST['tablename'] == 'Instruction') {
            $Requirements = Requirements::pluck('requirements_name', 'requirements_id'); 
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
            $mainRequirement->mainrequirements_name = Input::get('name');
            $mainRequirement->mainrequirements_description = Input::get('desc');
            $mainRequirement->flag = Input::get('flag');
            $mainRequirement->mainrequirements_rank_id = Input::get('select');
            $mainRequirement->save();
        } elseif ($_POST['tablename'] == 'Requirements') {
            $Requirement = new Requirements;
            $Requirement->requirements_name = Input::get('name');
            $Requirement->requirements_mainrequirements_id = Input::get('select');
            $Requirement->flag = Input::get('flag');
            $Requirement->save();
        } elseif ($_POST['tablename'] == 'Instruction') {
            $Instruction = new Instruction;
            $Instruction->instructions_name = Input::get('name');
            $Instruction->instructions_desc = Input::get('desc');
            $Instruction->requirements_id = Input::get('select');
            $Instruction->flag = Input::get('flag');
            $Instruction->save();
        }else{
            return "You are not supposed to be here";
        }
            // redirect
            return Redirect::to('admin/');
    }
    public function edit()
    {
        $id = $_POST['id'];
        if ($_POST['tablename'] == 'Mainrequirements') {
            $Info = DB::table('ranks')
                ->select('ranks.*', 'mainrequirements.*', 'requirements.*')
                ->leftJoin('mainrequirements', 'ranks.rank_id', '=', 'mainrequirements.mainrequirements_rank_id')
                ->leftJoin('requirements', 'mainrequirements.mainrequirements_id', '=', 'requirements.requirements_mainrequirements_id')
                ->orderby('rank_id')
                ->where('mainrequirements_id', '=', $id)
                ->get();
                 $ranks = Ranks::pluck('rank_name', 'rank_id'); 
                return view('admin.edit',['Info' => $Info, 'Select' => $ranks])
                 -> with('tablename', 'mainrequirements');
        } elseif ($_POST['tablename'] == 'Requirements') {
            $Mainrequirements = Mainrequirements::pluck('mainrequirements_name', 'mainrequirements_id');

            $Requirement = Requirements::find($id);
            return view('admin.edit', ['select' => $Mainrequirements, 'oldInfo' => $Requirement]) 
            -> with('tablename', $_POST['tablename']);
        } elseif ($_POST['tablename'] == 'Instruction') {
            $Requirements = Requirements::pluck('requirements_name', 'requirements_id'); 
            return view('admin.create', ['select' => $Requirements]) 
            -> with('tablename', $_POST['tablename']);
        }else{
            return "You are not supposed to be here";
        }
    }
    public function update($id)
    {   
        if ($_POST['tablename'] == 'Mainrequirements') {
            $Mainrequirement = Mainrequirements::find($id);
            $Mainrequirement->mainrequirements_name = Input::get('name');
            $Mainrequirement->mainrequirements_description = Input::get('desc');
            $Mainrequirement->flag = Input::get('flag');
            $Mainrequirement->mainrequirements_rank_id = Input::get('select');
            $Mainrequirement->save();
        } elseif ($_POST['tablename'] == 'Requirements') {
            $Requirement = new Requirements;
            $Requirement->requirements_name = Input::get('name');
            $Requirement->requirements_mainrequirements_id = Input::get('select');
            $Requirement->flag = Input::get('flag');
            $Requirement->save();
        } elseif ($_POST['tablename'] == 'Instruction') {
            $Instruction = new Instruction;
            $Instruction->instructions_name = Input::get('name');
            $Instruction->instructions_desc = Input::get('desc');
            $Instruction->requirements_id = Input::get('select');
            $Instruction->flag = Input::get('flag');
            $Instruction->save();
        }else{
            return "You are not supposed to be here";
        }
            // redirect
            return Redirect::to('admin/');
    }
    public function destroy(){}
}
