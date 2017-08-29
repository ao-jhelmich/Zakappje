<?php namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mainrequirements;
use App\Requirements;

use Redirect;

class RequirementController extends Controller
{
    public function index()
    {
        $Requirements = Requirements::All();
        return view('admin.manage', ['Requirements' => $Requirements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Mainrequirements = Mainrequirements::pluck('mainrequirements_description', 'mainrequirements_id'); 
        return view('admin.create', ['select' => $Mainrequirements])
        ->with('tablename', 'requirement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //storing the info
        $Requirement = new Requirements;
        $Requirement->requirements_name = $request->input('name');
        $Requirement->requirements_mainrequirements_id = $request->input('select');
        $Requirement->flag = $request->input('flag');
        $Requirement->save();

        //Message about the store
        $request->session()->flash('alert-success', 'Requirement was successful added!');
        //redirecting
        return Redirect::to('admin/requirement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Mainrequirements = Mainrequirements::pluck('mainrequirements_name', 'mainrequirements_id');
        $requirement = Requirements::find($id);
        return view('admin.edit', ['select' => $Mainrequirements, 'requirement' => $requirement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Requirement = Requirements::find($id);
        $Requirement->requirements_name = $request->input('name');
        $Requirement->requirements_mainrequirements_id = $request->input('select');
        $Requirement->flag = $request->input('flag');
        $Requirement->save();

        return Redirect::to('admin/requirement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
