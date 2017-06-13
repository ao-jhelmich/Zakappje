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
    @if (isset($Mainrequirements))
    <a href="{{url('admin/mainrequirement/create')}}"><button class="btn btn-default">Create new</button></a>
    @elseif(isset($Requirements))
    <a href="{{url('admin/requirement/create')}}"><button class="btn btn-default">Create new</button></a>
    @elseif(isset($Instructions))
    <a href="{{url('admin/instruction/create')}}"><button class="btn btn-default">Create new</button></a>
    @endif
    <br><br>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Alle</h3>
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
    @if (isset($Mainrequirements))
                @foreach ($Mainrequirements as $Mainrequirement)
                    <tr>
                        <td>{{$Mainrequirement->mainrequirements_name}}</td>
                        <td>{{$Mainrequirement->created_at}}</td>
                        <td>{{$Mainrequirement->updated_at}}</td>
                        <td>
                            {{ Form::open(['url' => 'admin/edit'])}}
                            {{ Form::hidden('tablename', 'mainrequirements')}}
                            {{ Form::hidden('id', $Mainrequirement->mainrequirements_id)}}
                            {{ Form::submit('edit', array('class' => 'btn btn-default'))}}
                            {{ Form::close()}}
                        </td>
                        <td> 
                            {{ Form::open(['method' => 'DELETE', 
                                            'route' => ['mainrequirement.destroy', $Mainrequirement->mainrequirements_id]]) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
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
                  <td>
                    {{ Form::open(['url' => 'admin/edit'])}}
                    {{ Form::hidden('tablename', 'Requirements')}}
                    {{ Form::hidden('id', $Requirement->requirements_id)}}
                    {{ Form::submit('edit', array('class' => 'btn btn-default'))}}
                    {{ Form::close()}}
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
    @elseif(isset($Instructions))
            @foreach ($Instructions as $Instruction)
                <tr>
                  <td>{{$Instruction->instructions_name}}</td>
                  <td>{{$Instruction->created_at}}</td>
                  <td>{{$Instruction->updated_at}}</td>
                  <td><button class="btn btn-default">Edit</button></td>
                  <td>
                       {{ Form::open(['method' => 'DELETE', 
                                            'route' => ['mainrequirement.destroy', $Instruction->instructions_name]]) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                  </td>
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