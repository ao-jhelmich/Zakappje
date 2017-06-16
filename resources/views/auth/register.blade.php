@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

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
                            <label for="lastName" class="col-md-4 control-label">lastName</label>

                            <div class="col-md-6">
                                <input id="lastName" type="lastName" class="form-control" name="lastName" required>

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">city</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="streetAdress" required>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('streetAdress') ? ' has-error' : '' }}">
                            <label for="streetAdress" class="col-md-4 control-label">streetAdress</label>

                            <div class="col-md-6">
                                <input id="streetAdress" type="streetAdress" class="form-control" name="streetAdress" required>

                                @if ($errors->has('streetAdress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('streetAdress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                            <label for="postal_code" class="col-md-4 control-label">postal_code</label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text" class="form-control" name="postal_code" required>

                                @if ($errors->has('postal_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('user_phone_number') ? ' has-error' : '' }}">
                            <label for="user_phone_number" class="col-md-4 control-label">user_phone_number</label>

                            <div class="col-md-6">
                                <input id="user_phone_number" type="text" class="form-control" name="user_phone_number" required>

                                @if ($errors->has('user_phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birth_day_year') ? ' has-error' : '' }}">
                            <label for="birth_day_year" class="col-md-4 control-label">birth_day_year</label>

                            <div class="col-md-6">
                                <input id="birth_day_year" type="text" class="form-control" name="birth_day_year" required>

                                @if ($errors->has('birth_day_year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth_day_year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birth_day_month') ? ' has-error' : '' }}">
                            <label for="birth_day_month" class="col-md-4 control-label">birth_day_month</label>

                            <div class="col-md-6">
                                <input id="birth_day_month" type="text" class="form-control" name="birth_day_month" required>

                                @if ($errors->has('birth_day_month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth_day_month') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birth_day_day') ? ' has-error' : '' }}">
                            <label for="birth_day_day" class="col-md-4 control-label">birth_day_day</label>

                            <div class="col-md-6">
                                <input id="birth_day_day" type="text" class="form-control" name="birth_day_day" required>

                                @if ($errors->has('birth_day_day'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth_day_day') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('user_parent_phone') ? ' has-error' : '' }}">
                            <label for="user_parent_phone" class="col-md-4 control-label">user_parent_phone</label>

                            <div class="col-md-6">
                                <input id="user_parent_phone" type="text" class="form-control" name="user_parent_phone" required>

                                @if ($errors->has('user_parent_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_parent_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_parent_name') ? ' has-error' : '' }}">
                            <label for="user_parent_name" class="col-md-4 control-label">user_parent_name</label>

                            <div class="col-md-6">
                                <input id="user_parent_name" type="text" class="form-control" name="user_parent_name" required>

                                @if ($errors->has('user_parent_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_parent_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_parent_email') ? ' has-error' : '' }}">
                            <label for="user_parent_email" class="col-md-4 control-label">user_parent_email</label>

                            <div class="col-md-6">
                                <input id="user_parent_email" type="text" class="form-control" name="user_parent_email" required>

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
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
