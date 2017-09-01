@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ZakAppje
        </h1>
    </section>
    <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
    </div> <!-- end .flash-message -->
    <!-- Main content -->
    <section class="content">
    <br><br>
        <!-- Container 1 -->
        <div class="box">
            <div class="box-header">
                <a href="{{url('admin/mainrequirement/create')}}"><button class="btn btn-default"><h3 class="box-title">Create new
                 mainrequirement</h3></button></a>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                          <i class="fa fa-times"></i></button>
                    </div>
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
                    <th>Delete</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @if (isset($mainRequirements))
                @foreach ($mainRequirements as $mainRequirement)
                    <tr>
                        <td>{{$mainRequirement->mainrequirements_name}}</td>
                        <td>{{$mainRequirement->created_at}}</td>
                        <td>{{$mainRequirement->updated_at}}</td>
                        <td>
                            <a href="{{url('admin/mainrequirement/' . $mainRequirement->mainrequirements_id . '/edit')}}"><button class="btn btn-default">Edit</button></a>
                        </td>
                        <td> 
                            {{ Form::open(['method' => 'DELETE', 
                                            'route' => ['mainrequirement.destroy', $mainRequirement->mainrequirements_id]]) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
                        <td><span class="label label-success">Active</span></td>
                        <td><button class="btn btn-danger">Change status</button></td>
                    </tr>
                @endforeach
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

        <!-- Container 2 -->
        <div class="box">
            <div class="box-header">
                <a href="{{url('admin/requirement/create')}}"><button class="btn btn-default"><h3 class="box-title">Create new
                 requirement</h3></button></a>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                          <i class="fa fa-times"></i></button>
                    </div>
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
                    <th>Delete</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($Requirements))
                @foreach ($Requirements as $Requirement)
                    <tr>
                      <td>{{$Requirement->requirements_name}}</td>
                      <td>{{$Requirement->created_at}}</td>
                      <td>{{$Requirement->updated_at}}</td>
                      <td>
                        <a href="{{url('admin/requirement/' . $Requirement->requirements_id . '/edit')}}"><button class="btn btn-default">Edit</button></a>
                      </td>
                      <td>
                           {{ Form::open(['method' => 'DELETE', 
                                                'route' => ['mainrequirement.destroy', $Requirement->requirements_id]]) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                      </td>
                      <td><span class="label label-success">Active</span></td>
                      <td><button class="btn btn-danger">Change status</button></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>No Requirements yet Create some!</td>
                </tr>
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

        <!-- Container 3 -->
        <div class="box">
            <div class="box-header">
                <a href="{{url('admin/instruction/create')}}"><button class="btn btn-default"><h3 class="box-title">Create new
                 instruction</h3></button></a>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                          <i class="fa fa-times"></i></button>
                    </div>
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
                    <th>Delete</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($Instructions))
                @foreach ($Instructions as $Instruction)
                    <tr>
                      <td>{{$Instruction->instructions_name}}</td>
                      <td>{{$Instruction->created_at}}</td>
                      <td>{{$Instruction->updated_at}}</td>
                      <td>
                           <a href="{{url('admin/instruction/' . $Instruction->instructions_id . '/edit')}}"><button class="btn btn-default">Edit</button></a>
                      </td>
                      <td><button class="btn btn-danger">delete</button></td>
                      <td><span class="label label-success">Active</span></td>
                      <td><button class="btn btn-danger">Change status</button></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>No Instructions yet Create some!</td>
                </tr>
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