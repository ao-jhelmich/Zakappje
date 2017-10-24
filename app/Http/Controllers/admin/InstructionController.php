<?php namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Instructions;
use App\requirements;

use Redirect;

class InstructionController extends Controller
{
    public function index()
    {
        $Instruction = Instructions::All();

        return view('admin.manage', ['Instructions' => $Instruction]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Requirements = Requirements::pluck('requirements_name', 'requirements_id'); 
        return view('admin.create', ['select' => $Requirements]) 
        -> with('tablename', 'instruction');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Instruction = new Instructions;
            $Instruction->instructions_name = $request->input('name');
            $Instruction->instructions_desc = $request->input('desc');
            $Instruction->instructions_requirements_id = $request->input('select');
            $Instruction->flag = $request->input('flag');
            $Instruction->save();

        //Message about the store
        $request->session()->flash('alert-success', 'Instructie succesvol toegevoegd!');
        //redirecting
        return Redirect::to('admin/instruction');
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
        $requirements = Requirements::pluck('requirements_name', 'requirements_id');
        $instruction = Instructions::find($id); 
        return view('admin.edit', ['select' => $requirements , 'instruction' => $instruction]);
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
         $Instruction = Instructions::find($id);
            $Instruction->instructions_name = $request->input('name');
            $Instruction->instructions_desc = htmlspecialchars($request->input('desc'));
            $Instruction->instructions_requirements_id = $request->input('select');
            $Instruction->flag = $request->input('flag');
            $Instruction->save();

        return Redirect::to('admin/instruction'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Instruction = Instructions::findOrFail($id);
        $Instruction->delete();

        session()->flash('alert-warning', 'Instruction was successful deleted!');
        return Redirect::to('admin/manage');
    }
}
