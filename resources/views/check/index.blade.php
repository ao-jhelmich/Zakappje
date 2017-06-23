@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Controleer deze requirement
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/images/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{$user->name . " " . $user->lastName}}</h3>

              <p class="text-muted text-center">
                @if ($user->accountRole == 1)
                  {{'Verkenner'}}
                @elseif($user->accountRole == 2)
                  {{'Leiding'}}
                @endif
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Requirement in kwestie:</b> <a class="pull-right">{{$requirement->requirements_name}}</a>
                </li>
              </ul>
                {{Form::open(['url' => 'check/final'])}}
                    {{Form::hidden('requirement_id', $requirement->requirements_id)}}
                    {{Form::hidden('user_id', $user->id)}}
                    {{Form::hidden('check_id', $checkId)}}
                    {{Form::submit('Afkruisen', ['class' => 'btn btn-primary btn-block', 'style' => 'font-weight: bold;'])}}
                {{Form::close()}}
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
@endsection