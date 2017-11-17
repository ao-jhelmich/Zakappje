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
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Extra info</h3>
            </div>
            <div class="box-body">
                <p>{{Auth::user()->name}} we zouden graag wat info van je willen. Zodat wij altijd in staat zijn om jouw te kunnen bereiken. Of een van jouw ouders</p>
                <p>Vul hier onder je resterende info in!</p>
                <form class="form-horizontal" role="form" method="POST" action="info/store">
                    {{ csrf_field() }}
                    <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                    <div class="form-group{{ $errors->has('streetAdress') ? ' has-error' : '' }}">
                        <label for="streetAdress" class="col-md-4 control-label">Adres + Huisnummer:</label>
                        <div class="col-md-6">
                            <input style="width: 80%; float: left; margin-right: 2%" id="streetAdress" type="text"
                            class="form-control" name="streetAdress" value="@isset (Auth::user()->streetAdress){{Auth::user()->streetAdress}}@endisset" required>
                            <input style="width: 18%;" id="houseNumber" type="number" class="form-control"
                            name="houseNumber"
                            value="@isset (Auth::user()->houseNumber){{Auth::user()->houseNumber}}@endisset" required>
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
                            <input id="postal_code" type="text" class="form-control" name="postal_code"
                            value="@isset (Auth::user()->postal_code){{Auth::user()->postal_code}}@endisset" required>
                            @if ($errors->has('postal_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('postal_code') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label for="city" class="col-md-4 control-label">Stad:</label>
                        <div class="col-md-6">
                            <input id="streetAdress" type="text" class="form-control" name="city" value="@isset (Auth::user()->city){{Auth::user()->city}}@endisset" required>
                            @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('user_phone_number') ? ' has-error' : '' }}">
                        <label for="user_phone_number" class="col-md-4 control-label">Je eigen nummer:</label>
                        <div class="col-md-6">
                            <input id="user_phone_number" type="number" class="form-control" name="user_phone_number"
                            value="@isset (Auth::user()->user_phone_number){{Auth::user()->user_phone_number}}@endisset" required>
                            @if ($errors->has('user_phone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_phone_number') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('user_parent_phone') ? ' has-error' : '' }}">
                        <label for="user_parent_phone" class="col-md-4 control-label">Ouder telefoon nummer:</label>
                        <div class="col-md-6">
                            <input id="user_parent_phone" type="number" class="form-control" name="user_parent_phone"
                            value="@isset (Auth::user()->user_parent_phone){{Auth::user()->user_parent_phone}}@endisset" required>
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
                            value="@isset (Auth::user()->user_parent_name){{Auth::user()->user_parent_name}}@endisset" required>
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
                            value="@isset (Auth::user()->user_parent_email){{Auth::user()->user_parent_email}}@endisset" required>
                            @if ($errors->has('user_parent_email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_parent_email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                            Toevoegen
                            </button>
                        </div>
                    </div>
                </form>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            
        </section>
        <!-- /.content -->
    </div>
    @endsection