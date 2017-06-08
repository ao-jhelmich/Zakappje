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
        $Mainrequirements = Mainrequirements::All();   
        return view('admin.manage', ['Mainrequirements' => $Mainrequirements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranks = Ranks::pluck('rank_name', 'rank_id'); 
        return view('admin.create', ['select' => $ranks]);
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

        // redirect
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainrequirement = Mainrequirements::findOrFail($id);
        $mainrequirement->delete();

        return Redirect::to('admin/mainrequirement');
    }
}
