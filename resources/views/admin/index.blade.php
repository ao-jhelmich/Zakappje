@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ZakAppje
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    	<p>Admin index</p> 
    
    <p>What would you like to manage?</p>
    <a href="admin/mainrequirement"><button class="btn btn-default">Mainrequirements</button></a>
    <a href="admin/requirement"><button class="btn btn-default">Requirements</button></a>
    <a href="admin/instruction"><button class="btn btn-default">instructions</button></a>
    <!-- /.content -->
  </div>
@endsection