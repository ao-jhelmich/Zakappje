<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function show(){}
    public function create(){}
    public function store(){}
    public function edit(){}
    public function update(){}
    public function destroy(){}
}
