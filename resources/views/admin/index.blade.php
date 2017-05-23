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
    
    <p>Manage requirements</p>
    {{ Form::open(array('url' => 'show/')) }}
      {{ Form::hidden('sort', 'requirements') }}
      {{ Form::submit('Delete this Todo', array('class' => 'btn btn-danger')) }}
    {{ Form::close() }}
    </section>
    <!-- /.content -->
  </div>
@endsection