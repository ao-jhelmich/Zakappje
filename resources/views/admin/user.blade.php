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
                    <th>Delete</th>
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
                          @if (Auth::user()->accountRole == 2)
                            <td>
                              {{ Form::open(['method' => 'DELETE', 
                                            'route' => ['user.destroy', $user->users_id]]) }}
                              {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                              {{ Form::close() }}   
                            </td>
                          @elseif(Auth::user()->accountRole == 2)
                            {{'Leiding'}}
                          @endif
                        <td><span class="label label-success">Active</span></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
                <tfoot>
                    <tr>
                        <th>Pagina Naam</th>
                        <th>Rol</th>
                        <th>Delete</th>
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