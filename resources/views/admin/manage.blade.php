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
        <h3>Manage {{$tablename}}</h3>
    @if (isset($Mainrequirements))
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Alle {{$tablename}}</h3>
            </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Pagina Naam</th>
                    <th>Date created</th>
                    <th>Last updated</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Mainrequirements as $Mainrequirement)
                    <tr>
                        <td>{{$Mainrequirement->mr_name}}</td>
                        <td>{{$Mainrequirement->created_at}}</td>
                        <td>{{$Mainrequirement->updated_at}}</td>
                        <td><button class="btn btn-default">Edit</button></td>
                        <td><span class="label label-success">Active</span></td>
                        <td><button class="btn btn-danger">Change status</button></td>
                    </tr>
                @endforeach
            </tbody>
                <tfoot>
                    <tr>
                        <th>Pagina Naam</th>
                        <th>Date created</th>
                        <th>Last updated</th>
                        <th>Edit</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        </div>
    @elseif(isset($Requirements))
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                  <th>Pagina Naam</th>
                  <th>Date created</th>
                  <th>Last updated</th>
                  <th>Edit</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
            @foreach ($Requirements as $Requirement)
                <tr>
                  <td>{{$Requirement->r_name}}</td>
                  <td>{{$Requirement->created_at}}</td>
                  <td>{{$Requirement->updated_at}}</td>
                  <td><button class="btn btn-default">Edit</button></td>
                  <td><span class="label label-success">Active</span></td>
                  <td><button class="btn btn-danger">Change status</button></td>
                </tr>
            @endforeach
          </table>
        </div>
    @elseif(isset($Instructions))
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                  <th>Instructie Naam</th>
                  <th>Date created</th>
                  <th>Last updated</th>
                  <th>Edit</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
            @foreach ($Instructions as $Instruction)
                <tr>
                  <td>{{$Instruction->i_name}}</td>
                  <td>{{$Instruction->created_at}}</td>
                  <td>{{$Instruction->updated_at}}</td>
                  <td><button class="btn btn-default">Edit</button></td>
                  <td><span class="label label-success">Active</span></td>
                  <td><button class="btn btn-danger">Change status</button></td>
                </tr>
            @endforeach
          </table>
        </div>
    @else
        <h1>Page 404 not found</h1>
    @endif
        
    </section>
    <!-- /.content -->
</div>

@endsection