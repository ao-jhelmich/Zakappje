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

              </div>
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="timeline">
                <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/images/user8-128x128.jpg" alt="User profile picture">
              <h3 class="profile-username text-center">{{$profile->name .' '. $profile->lastName}}</h3>
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
                  <b>Adres gegevens</b> <a class="pull-right">{{$profile->streetAdress ." ". $profile->houseNumber 
                    ." ". $profile->postal_code .' '. $profile->city}}</a>
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
                  <b>Ouder gegevens</b> <a class="pull-right">{{$profile->user_parent_name . " " . $profile->user_parent_email}}</a>
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
@endsection