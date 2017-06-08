<?php namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mainrequirements;

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
            return view('admin.create', ['select' => $ranks]) 
            -> with('tablename', $_POST['tablename']);
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
            $mainRequirement->mainrequirements_name = Input::get('name');
            $mainRequirement->mainrequirements_description = Input::get('desc');
            $mainRequirement->flag = Input::get('flag');
            $mainRequirement->mainrequirements_rank_id = Input::get('select');
            $mainRequirement->save();
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
        //
    }
}
