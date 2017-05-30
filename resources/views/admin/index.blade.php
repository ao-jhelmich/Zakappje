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
    
    {{ Form::open(['url' => 'admin/manage']) }}
        {{Form::hidden('tablename', 'Mainrequirements')}}
        {{Form::submit('Mainrequirements', array('class' => 'btn btn-default'))}}
    {{ Form::close()}}<br>      
    {{ Form::open(['url' => 'admin/manage']) }}
        {{Form::hidden('tablename', 'Requirements')}}
        {{Form::submit('Requirements' , array('class' => 'btn btn-default'))}}
    {{ Form::close()}}<br>
    {{ Form::open(['url' => 'admin/manage']) }}
        {{Form::hidden('tablename', 'Instruction')}}
        {{Form::submit('Instructions', array('class' => 'btn btn-default'))}}
    {{ Form::close()}}
    <!-- /.content -->
  </div>
@endsection