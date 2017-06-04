@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ZakAppje
        </h1>
    </section>
    @php
        var_dump($Mainrequirements);
    @endphp
    <!-- Main content -->
    <section class="content">
        <h1>Manage {{$tablename}}</h1>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                    <tr>
                      <th>Pagina Naam</th>
                      <th>Date</th>
                      <th>Edit</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                @foreach ($Mainrequirements as $Mainrequirement)
                    <tr>
                      <td>{{$Mainrequirement->mr_name}}</td>
                      <td>{{$Mainrequirement->created_at}}</td>
                      <td><button class="btn btn-default">Edit</button></td>
                      <td><span class="label label-success">Active</span></td>
                      <td><button class="btn btn-danger">Change status</button></td>
                    </tr>
                @endforeach
                
              </table>
            </div>
    </section>
    <!-- /.content -->
</div>
@endsection