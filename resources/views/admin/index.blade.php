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
    
    <a href="admin/manage"><button class="btn btn-default">Beheer Het boekje</button></a>
    <a href="admin/mod"><button class="btn btn-default">Zet de klasseneis van de dag</button></a>
    <!-- /.content -->
  </div>
@endsection