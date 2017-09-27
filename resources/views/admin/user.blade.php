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
    <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
    </div>
    <section class="content">
    <!-- Default box -->
      <div class="box">
            <div class="box-header">
                <h3 class="box-title">Alle gebruikers</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                          <i class="fa fa-times"></i></button>
                    </div>
            </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="container1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Pagina Naam</th>
                    <th>Rol</th>
                    <th>Show</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @if (isset($users))
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>
                          @if ($user->accountRole == 1)
                            {{'Verkenner'}}
                          @elseif($user->accountRole == 2)
                            {{'Leiding'}}
                          @endif
                        </td>
                          <td>
                            <!-- Button trigger modal -->
                          <button type="button" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#{{$user->id}}">
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Wijzig: {{$user->name}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  {{Form::open(['url' => 'admin/user/' . $user->id, 'role' => 'form', 'method' => 'put'])}}
                                    <div class="form-group">
                                        {{ Form::label('name', 'MainRequirement' . ' name: ') }}
                                        {{ Form::text('name', $mainRequirement->mainrequirements_name, ['class' => 'form-control'])}}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('desc', 'Desc: ') }}
                                        {{ Form::text('desc', $mainRequirement->mainrequirements_description,['class' => 'form-control'])}}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('select', 'Toekennen aan: ')}}
                                        {{Form::select('select', $Select, $mainRequirement->mainrequirements_rank_id,['class' => 'form-control'])}}
                                    </div>                
                                    <div class="form-group">
                                        {{ Form::label('flag', 'Flag: ')}}
                                        {{Form::select('flag', ['1' => 'Active', '0' => 'Unactive'], $mainRequirement->flag , ['class' => 'form-control'])}}
                                    </div>
                                    <div class="form-group">
                                    {{ Form::submit('Save')}}
                                    </div>
                                {{Form::close()}}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          </td>
                        <td><span class="label label-success">Active</span></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
                <tfoot>
                    <tr>
                        <th>Pagina Naam</th>
                        <th>Rol</th>
                        <th>Show</th>
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