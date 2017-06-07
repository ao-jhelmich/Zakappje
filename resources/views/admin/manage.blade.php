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

    {{ Form::open(['url' => 'admin/create']) }}
        {{Form::hidden('tablename', $tablename)}}
        {{Form::submit('Create new', array('class' => 'btn btn-default'))}}
    {{ Form::close()}}<br>
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
    @if (isset($Mainrequirements))
                @foreach ($Mainrequirements as $Mainrequirement)
                    <tr>
                        <td>{{$Mainrequirement->mainrequirements_name}}</td>
                        <td>{{$Mainrequirement->created_at}}</td>
                        <td>{{$Mainrequirement->updated_at}}</td>
                        <td><a href="{{ URL::to('admin/' . $Mainrequirement->mainrequirements_id .'/edit') }}" title=""><button class="btn btn-default">Edit</button></a></td>
                        <td><span class="label label-success">Active</span></td>
                        <td><button class="btn btn-danger">Change status</button></td>
                    </tr>
                @endforeach
            
    @elseif(isset($Requirements))
            @foreach ($Requirements as $Requirement)
                <tr>
                  <td>{{$Requirement->requirements_name}}</td>
                  <td>{{$Requirement->created_at}}</td>
                  <td>{{$Requirement->updated_at}}</td>
                  <td><button class="btn btn-default">Edit</button></td>
                  <td><span class="label label-success">Active</span></td>
                  <td><button class="btn btn-danger">Change status</button></td>
                </tr>
            @endforeach
    @elseif(isset($Instructions))
            @foreach ($Instructions as $Instruction)
                <tr>
                  <td>{{$Instruction->instructions_name}}</td>
                  <td>{{$Instruction->created_at}}</td>
                  <td>{{$Instruction->updated_at}}</td>
                  <td><button class="btn btn-default">Edit</button></td>
                  <td><span class="label label-success">Active</span></td>
                  <td><button class="btn btn-danger">Change status</button></td>
                </tr>
            @endforeach
    @else
        <h1>Page 404 not found</h1>
    @endif
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
    </section>
    <!-- /.content -->
</div>

@endsection