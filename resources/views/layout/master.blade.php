@php
  use App\Requirements;
  use App\Http\Controllers\bookcontroller;
  use App\Http\Controllers\LeaderboardController;
  use App\UserWantsChk;

  
  $requirements = Requirements::all();
  $allInfo = DB::table('ranks')
  ->select('ranks.*', 'mainrequirements.*', 'requirements.*')
            ->leftJoin('mainrequirements', 'ranks.rank_id', '=', 'mainrequirements.mainrequirements_rank_id')
            ->leftJoin('requirements', 'mainrequirements.mainrequirements_id', '=', 'requirements.requirements_mainrequirements_id')
            
            ->orderby('rank_id')
            ->get();
                
  $curclass = 0;
  $curmr = 0;
  $curr = 0;

  $adminRows = UserWantsChk::all();

  //$array = bookcontroller::GetInfo();
  //dd($array);
@endphp

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ZakAppje</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('css/adminlte/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('/css/adminlte/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/adminlte/dist/css/skins/skin-green.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
  <script src="https://unpkg.com/vue"></script>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
<!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Z</b>ap</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Zak</b>Appje</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
       <!-- User Account Menu -->
       @if (Auth::check())
         <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ asset('/images/user8-128x128.jpg')}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{{ isset(Auth::user()->name) ? 'welkom '  . Auth::user()->name : 'Quest'}}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{ asset('/images/user8-128x128.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  {{{ isset(Auth::user()->name) ? 'welkom '  . Auth::user()->name : 'Quest'}}}                  
                  <small>
                    {{{ isset(Auth::user()->created_at) ? 'Lid sinds:  '  . Auth::user()->created_at : 'created_at not set'}}}
                  </small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Lorem</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Lorem</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Lorem</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('profile/' . Auth::user()->id)}}" class="btn btn-default btn-flat">Mijn Profiel</a>
                </div>
                <div class="pull-right">
                  @if (!Auth::check())
                  <a href="{{ url('/login') }}" class="btn btn-default btn-flat">Log in</a>
                  @else
                    @if(isset(Auth::user()->accountRole))
                      @if(Auth::user()->accountRole == 2)
                        <a href="{{ url('admin') }}" class="btn btn-default btn-flat">Admin</a>
                      @endif
                    @endif
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Log uit</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  </form>
                  @endif
                </div>
              </li>
            </ul>
          </li>
       @else
          <li>
            <a data-toggle="modal" data-target="#loginModel" href="#" >login</a>
            <!--<a href="{{ url('/login') }}">Log in</a>-->
          </li>
          <li>
            <a data-toggle="modal" data-target="#registerModel" href="#">Register</a>
          </li>
       @endif
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/images/user8-128x128.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ isset(Auth::user()->name) ? 'welkom '  . Auth::user()->name : 'Quest'}}</p>
          <!-- Status -->
          <p>
            @if (isset(Auth::user()->accountRole))
              @if (Auth::user()->accountRole == 1)
                {{'Verkenner'}}
              @elseif(Auth::user()->accountRole == 2)
                {{'Leiding'}}
              @endif
            @endif
          </p>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
          </form>
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-folder"></i>  klasseneisen
                  <i class="fa fa-angle-left pull-right"></i>
              </a>                            
              <ul class="treeview-menu">
                @foreach ($allInfo as $info)
                  @if ($info->rank_id !== $curclass)
                  @php$curclass=$info->rank_id;@endphp
                    <li class="treeview">
     
                        <a href="#">
                            {{$info->rank_name}}
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>

                        <ul class="treeview-menu">
                          @foreach ($allInfo as $info)
                            @if ($info->rank_id == $curclass)
                              @if ($info->mainrequirements_id !== $curmr)
                              @php$curmr=$info->mainrequirements_id;@endphp
                                <li class="treeview">

                                    <a href="#">
                                        {{$info->mainrequirements_name}}
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>

                                      <ul class="treeview-menu">
                                        @foreach ($allInfo as $info)
                                          @if ($info->rank_id == $curclass)
                                            @if ($info->mainrequirements_id == $curmr)
                                              @if ($info->requirements_id !== $curr)
                                              @php$curr=$info->requirements_id;@endphp
                                                <li class="treeview">

                                                <a href="/book/show/{{$info->requirements_id}}">{{$info->requirements_name}}</a>
                                                    

                                                </li>
                                              @endif
                                            @endif
                                          @endif
                                        @endforeach
                                      </ul>
                                </li>
      
                              @endif
                            @endif
                          @endforeach
                        </ul>
                    </li>
                  @endif
                @endforeach
              </ul>
          </li>
          <li><a href="{{ url('leaderboard') }}"><i class="fa fa-line-chart"></i><span>Leaderboard</span></a></li>
          @if(isset(Auth::user()->accountRole))
            @if(Auth::user()->accountRole == 2)
              <li><a href="{{ url('admin') }}"><i class="fa fa-database"></i><span>Admin</span></a></li>
            @endif
          @endif
              
        <li><a href="#"><i class="fa fa-link"></i> <span>Uitleg</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

  @yield('content')
<div class="modal fade" id="loginModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="registerModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Naam:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required>

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">e-mail adres</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">Stad</label>

                            <div class="col-md-6">
                                <input id="streetAdress" type="text" class="form-control" name="city" value="{{ old('city') }}" required>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('streetAdress') ? ' has-error' : '' }}">
                            <label for="streetAdress" class="col-md-4 control-label">Adres + Huisnummer</label>

                            <div class="col-md-6">
                                <input style="width: 80%; float: left; margin-right: 2%" id="streetAdress" type="text" 
                                class="form-control" name="streetAdress" value="{{ old('streetAdress') }}" required>
                                <input style="width: 18%;" id="houseNumber" type="number" class="form-control" 
                                name="houseNumber" value="{{ old('houseNumber') }}" required>

                                @if ($errors->has('streetAdress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('streetAdress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                            <label for="postal_code" class="col-md-4 control-label">Postcode</label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text" class="form-control" name="postal_code" 
                                value="{{ old('postal_code') }}" required>

                                @if ($errors->has('postal_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('user_phone_number') ? ' has-error' : '' }}">
                            <label for="user_phone_number" class="col-md-4 control-label">Je eigen nummer</label>

                            <div class="col-md-6">
                                <input id="user_phone_number" type="number" class="form-control" name="user_phone_number" 
                                value="{{ old('user_phone_number') }}" required>

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
                                <input id="birth_day" type="date" class="form-control" name="birth_day"
                                value="{{ old('birth_day') }}" required>

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
                                <input id="user_parent_phone" type="number" class="form-control" name="user_parent_phone" 
                                value="{{ old('user_parent_phone') }}" required>

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
                                <input id="user_parent_name" type="text" class="form-control" name="user_parent_name"
                                value="{{ old('user_parent_name') }}" required>

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
                                <input id="user_parent_email" type="email" class="form-control" name="user_parent_email" 
                                value="{{ old('user_parent_email') }}" required>

                                @if ($errors->has('user_parent_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_parent_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Bevestig Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>  
  <div id="fade" class="black_overlay"></div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <!-- bottom Right corner -->
    </div>
    <!-- Default to the left -->
    <strong><a href="#">Jasper Helmich</a> & <a href="#">Dylan de Leeuw</a> 2017</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">User wants checked</h3>
        <ul class="control-sidebar-menu">
        @isset ($adminRows)
          @foreach ($adminRows as $adminRow)
            <li>
              <a href="{{url('check/final/' . $adminRow->requirement_id . '/' . $adminRow->user_id . '/' . $adminRow->id )}}">  
                <label class="control-sidebar-subheading">
                  {{$adminRow->user_name}} X
                </label>
                <p>{{$adminRow->requirement_name}}</p>
              </a>
            </li>
          @endforeach
        @endisset
        
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.2.3 -->
<script src="{{ asset('/css/adminlte/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('/css/adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('css/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('css/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('/css/adminlte/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/css/adminlte/dist/js/app.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('/css/adminlte/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('/css/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('/css/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('/css/adminlte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('/css/adminlte/plugins/chartjs/Chart.min.js')}}"></script>
<script src="{{ asset('/css/adminlte/plugins/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'editor1' );
</script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
</body>
</html>