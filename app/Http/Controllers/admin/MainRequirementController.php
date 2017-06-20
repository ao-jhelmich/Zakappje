<?php namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mainrequirements;
use App\Ranks;

use Redirect;

class MainRequirementController extends Controller
{
    public function index()
    {
        $mainRequirements = Mainrequirements::All();   
        return view('admin.manage', ['mainRequirements' => $mainRequirements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranks = Ranks::pluck('rank_name', 'rank_id'); 
        return view('admin.create', ['select' => $ranks])
        ->with('tablename', 'mainrequirement');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mainRequirement = new Mainrequirements;
            $mainRequirement->mainrequirements_name = $request->input('name');
            $mainRequirement->mainrequirements_description = $request->input('desc');
            $mainRequirement->flag = $request->input('flag');
            $mainRequirement->mainrequirements_rank_id = $request->input('select');
            $mainRequirement->save();

        //Message about the store
        $request->session()->flash('alert-success', 'mainrequirement was successful added!');
        //redirecting
        return Redirect::to('admin/mainrequirement');
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
        $ranks = Ranks::pluck('rank_name', 'rank_id');
        $mainRequirement = Mainrequirements::find($id);
        //return $mainRequirement;
        return view('admin.edit', ['Select' => $ranks, 'mainRequirement' => $mainRequirement]);
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
         $Mainrequirement = Mainrequirements::find($id);
            $Mainrequirement->mainrequirements_name = $request->input('name');
            $Mainrequirement->mainrequirements_description = $request->input('desc');
            $Mainrequirement->flag = $request->input('flag');
            $Mainrequirement->mainrequirements_rank_id = $request->input('select');
            $Mainrequirement->save();
            return Redirect::to('admin/mainrequirement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainRequirement = Mainrequirements::findOrFail($id);
        $mainRequirement->delete();

        return Redirect::to('admin/mainrequirement');
    }
}