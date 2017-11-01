@extends('layout.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li><a href="#activity" data-toggle="tab">ZakAppje Gegevens</a></li>
        <li class="active"><a href="#timeline" data-toggle="tab">Contact gegevens</a></li>
        <li><a href="#settings" data-toggle="tab">Settings</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane" id="activity">
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Huidige Klasse:</b> <a class="pull-right">{{$profile->users_rank_id}}</a>
            </li>
          </ul>
          
          <div>
            <ul class="nav nav-list">
              <li><label class="tree-toggle nav-header">Bootstrap</label>
              <ul class="nav nav-list tree">
                <li><a href="#">JavaScript</a></li>
                <li><a href="#">CSS</a></li>
                <li><label class="tree-toggle nav-header">Buttons</label>
                <ul class="nav nav-list tree">
                  <li><a href="#">Colors</a></li>
                  <li><a href="#">Sizes</a></li>
                  <li><label class="tree-toggle nav-header">Forms</label>
                  <ul class="nav nav-list tree">
                    <li><a href="
                      <li><a href="#">Vertical</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="divider"></li>
          <li><label class="tree-toggle nav-header">Responsive</label>
          <ul class="nav nav-list tree">
            <li><a href="#">Overview</a></li>
            <li><a href="#">CSS</a></li>
            <li><label class="tree-toggle nav-header">Media Queries</label>
            <ul class="nav nav-list tree">
              <li><a href="#">Text</a></li>
              <li><a href="#">Images</a></li>
              <li><label class="tree-toggle nav-header">Mobile Devices</label>
              <ul class="nav nav-list tree">
                <li><a href="#">iPhone</a></li>
                <li><a href="#">Samsung</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><label class="tree-toggle nav-header">Coding</label>
        <ul class="nav nav-list tree">
          <li><a href="#">JavaScript</a></li>
          <li><a href="#">jQuery</a></li>
          <li><label class="tree-toggle nav-header">HTML DOM</label>
          <ul class="nav nav-list tree">
            <li><a href="#">DOM Elements</a></li>
            <li><a href="#">Recursive</a></li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</li>
</ul>
</div>
</div>
<!-- /.tab-pane -->
<div class="active tab-pane" id="timeline">
<div class="box-body box-profile">
<img class="profile-user-img img-responsive img-circle" src="/images/user8-128x128.jpg" alt="User profile picture">
<h3 class="profile-username text-center">{{$profile->name .' '. $profile->lastName}}</h3>
<a data-toggle="modal" data-target="#editModel" href="#">edit</a>
<p class="text-muted text-center">
@if (isset(Auth::user()->accountRole))
@if (Auth::user()->accountRole == 1)
{{'Verkenner'}}
@elseif(Auth::user()->accountRole == 2)
{{'Leiding'}}
@endif
@endif
</p>
<ul class="list-group list-group-unbordered">
<li class="list-group-item">
  <b>Naam:</b> <a class="pull-right">{{$profile->name ." ". $profile->lastName}}</a>
</li>
<li class="list-group-item">
  <b>Email</b> <a class="pull-right">{{$profile->email}}</a>
</li>
<li class="list-group-item">
  <b>Adres</b> <a class="pull-right">{{$profile->streetAdress ." ". $profile->houseNumber}}</a>
</li>
<li class="list-group-item">
  <b>Woonplaats</b> <a class="pull-right">{{$profile->city}}</a>
</li>
<li class="list-group-item">
  <b>Postcode</b> <a class="pull-right">{{$profile->postal_code}}</a>
</li>
<li class="list-group-item">
  <b>Eigen telefoon nummer</b> <a class="pull-right">{{$profile->user_phone_number}}</a>
</li>
<li class="list-group-item">
  @php
  $month = NULL;
  if ($profile->birth_day_month == 1){
  $month = "januarie";
  }elseif ($profile->birth_day_month == 2){
  $month = "februari";
  }elseif ($profile->birth_day_month == 3){
  $month = "maart";
  }elseif ($profile->birth_day_month == 4){
  $month = "april";
  }elseif ($profile->birth_day_month == 5){
  $month = "mei";
  }elseif ($profile->birth_day_month == 6){
  $month = "juni";
  }elseif ($profile->birth_day_month == 7){
  $month = "juli";
  }elseif ($profile->birth_day_month == 8){
  $month = "augustus";
  }elseif ($profile->birth_day_month == 9){
  $month = "september";
  }elseif ($profile->birth_day_month == 10){
  $month = "oktober";
  }elseif ($profile->birth_day_month == 11){
  $month = "november";
  }elseif ($profile->birth_day_month == 12){
  $month = "december";
  }
  @endphp
  <b>Geboorte datum</b> <a class="pull-right">{{$profile->birth_day_day ." ". $month ." ".  $profile->birth_day_year}}</a>
</li>
<li class="list-group-item">
  <b>Ouder naam</b> <a class="pull-right">{{$profile->user_parent_name}}</a>
</li>
<li class="list-group-item">
  <b>Ouder email</b> <a class="pull-right">{{$profile->user_parent_email}}</a>
</li>
<li class="list-group-item">
  <b>Ouder telefoon</b> <a class="pull-right">{{$profile->user_parent_phone}}</a>
</li>
</ul>
</div>
<!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
</section>
</div>
@yield('content')
<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit</h4>
</div>
<div class="modal-body">
{{ Form::open(['url' => '/edit-user', 'method' => 'Post']) }}
<div class="form-horizontal">
{{ csrf_field() }}
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<label for="name" class="col-md-4 control-label">Naam:</label>
<div class="col-md-6">
{{ Form::text('name', $profile->name, array('class' => 'form-control')) }}
@if ($errors->has('name'))
<span class="help-block">
  <strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
<label for="lastName" class="col-md-4 control-label">Achternaam:</label>
<div class="col-md-6">
{{ Form::text('lastName', $profile->lastName, array('class' => 'form-control')) }}
@if ($errors->has('lastName'))
<span class="help-block">
  <strong>{{ $errors->first('lastName') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<label for="email" class="col-md-4 control-label">e-mail adres:</label>
<div class="col-md-6">
{{ Form::email('email', $profile->email, array('class' => 'form-control')) }}
@if ($errors->has('email'))
<span class="help-block">
  <strong>{{ $errors->first('email') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
<label for="city" class="col-md-4 control-label">Stad:</label>
<div class="col-md-6">
{{ Form::text('city', $profile->city, array('class' => 'form-control')) }}
@if ($errors->has('city'))
<span class="help-block">
  <strong>{{ $errors->first('city') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('streetAdress') ? ' has-error' : '' }}">
<label for="streetAdress" class="col-md-4 control-label">Adres + Huisnummer:</label>
<div class="col-md-6">
{{ Form::text('streetAdress', $profile->streetAdress, array('class' => 'form-control', 'style' => 'width: 80%; float: left; margin-right: 2%')) }}
{{ Form::text('houseNumber', $profile->houseNumber, array('class' => 'form-control', 'style' => 'width: 18%;')) }}
@if ($errors->has('streetAdress'))
<span class="help-block">
  <strong>{{ $errors->first('streetAdress') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
<label for="postal_code" class="col-md-4 control-label">Postcode:</label>
<div class="col-md-6">
{{ Form::text('postal_code', $profile->postal_code, array('class' => 'form-control')) }}
@if ($errors->has('postal_code'))
<span class="help-block">
  <strong>{{ $errors->first('postal_code') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('user_phone_number') ? ' has-error' : '' }}">
<label for="user_phone_number" class="col-md-4 control-label">Je eigen nummer:</label>
<div class="col-md-6">
{{ Form::number('user_phone_number', $profile->user_phone_number, array('class' => 'form-control')) }}
@if ($errors->has('user_phone_number'))
<span class="help-block">
  <strong>{{ $errors->first('user_phone_number') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('birth_day') ? ' has-error' : '' }}">
<label for="birth_day" class="col-md-4 control-label">Geboorte datum:</label>
<div class="col-md-6">
<input type="date" class="form-control" name="birth_day" value="{{$profile->birth_day_year}}-{{$profile->birth_day_month}}-{{$profile->birth_day_day}}" />
@if ($errors->has('birth_day_year'))
<span class="help-block">
  <strong>{{ $errors->first('birth_day') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('user_parent_phone') ? ' has-error' : '' }}">
<label for="user_parent_phone" class="col-md-4 control-label">Ouder telefoon nummer:</label>
<div class="col-md-6">
{{ Form::number('user_parent_phone', $profile->user_parent_phone, array('class' => 'form-control')) }}
@if ($errors->has('user_parent_phone'))
<span class="help-block">
  <strong>{{ $errors->first('user_parent_phone') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('user_parent_name') ? ' has-error' : '' }}">
<label for="user_parent_name" class="col-md-4 control-label">Ouder naam:</label>
<div class="col-md-6">
{{ Form::text('user_parent_name', $profile->user_parent_name, array('class' => 'form-control')) }}
@if ($errors->has('user_parent_name'))
<span class="help-block">
  <strong>{{ $errors->first('user_parent_name') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('user_parent_email') ? ' has-error' : '' }}">
<label for="user_parent_email" class="col-md-4 control-label">Ouder e-mail:</label>
<div class="col-md-6">
{{ Form::email('user_parent_email', $profile->user_parent_email, array('class' => 'form-control')) }}
@if ($errors->has('user_parent_email'))
<span class="help-block">
  <strong>{{ $errors->first('user_parent_email') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group">
<div class="col-md-6 col-md-offset-4">
{{ Form::submit('Opslaan', array('class' => 'btn btn-primary'))}}
</div>
</div>
{{ Form::close() }}
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
@endsection