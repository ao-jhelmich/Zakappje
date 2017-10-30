@extends('layout.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
        </div> 
    <h1>
    {{$rank->rank_name}}
    <small>{{$mainrequirement->mainrequirements_name}}</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Work</a></li>
      <li><a href="#">to</a></li>
      <li class="active">do</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{$requirement->requirements_name}}</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
          @if(Auth::check())
            @if(Auth::user()->users_rank_id == $rank->rank_id -1)
              @if($inrow)
                <a href="/check/{{$requirement->requirements_id}}/{{Auth::user()->id}}">
                <button class="btn bg-olive margin pull-right">Aftekenen</button></a>
              @endif
            @endif
          @endif
        </div>
      </div>
      <div class="box-body">
        @isset ($instructions)
        @foreach ($instructions as $instruction)
        <div class="pre">{!!htmlspecialchars_decode($instruction->instructions_desc)!!}</div>
        @endforeach
        @endisset
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        possible admin info (last updated created BY and on)
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
@endsection