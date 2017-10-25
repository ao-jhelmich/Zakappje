@extends('layout.master')
@section('content')
@php
use App\Http\Controllers\LeaderboardController;
@endphp
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Leaderboard
    </h1>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          @foreach ($ranks as $rank)
          <li @php
            if ($rank->rank_id == 1){ echo 'class="active"'; }
            @endphp>
            <a href="#tab_{{$rank->rank_id}}" data-toggle="tab">{{$rank->rank_name}}</a></li>
            @endforeach
          </ul>
          <div class="tab-content">
            <!-- /.tab-pane -->
            @foreach ($ranks as $rank)
            @php
            $i=0;
            @endphp
            <div class="tab-pane @php
              if ($rank->rank_id == 1){ echo 'active'; }
              @endphp" id="tab_{{$rank->rank_id}}">
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Naam</th>
                    <th>Afgeronde klasseneisen</th>
                  </tr>
                  @foreach ($users as $user)
                  @if ($user->users_rank_id == $rank->rank_id)
                  @php
                  $i++;
                  $requirements = LeaderboardController::getUsersRequirements($user->id);

                  @endphp
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$user->name}} {{$user->lastName}}</td>
                    <td>
                      @if (is_array($requirements) || is_object($requirements))
                        <div class="dropdown">
                            <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="/page.html">
                                {{$user->count}} <span class="caret"></span>
                            </a>
                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                              <li class="dropdown-submenu">
                                
                                  @foreach ($requirements as $requirement)
                                    <li><a href="/book/show/{{$requirement['id']}}">{{$requirement['name']}}</a></li>
                                  @endforeach
                                      
                              </li>
                            </ul>
                        </div>
                    </td>
                  </tr>
                  @else nog geen klasseneisen voor deze klas gedaan
                  @endif
                  @endif
                  @endforeach
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            @endforeach
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
      </div>
      
      
    </section>
    <!-- /.content -->
  </div>
  @endsection