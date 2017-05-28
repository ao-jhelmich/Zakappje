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
    <form action="admin/show" method="post" accept-charset="utf-8">
      <input type="submit" name="tablename" value="requirements">
    </form>
    <!-- /.content -->
  </div>
@endsection