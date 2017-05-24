<?php
session_start();
?>

        <!DOCTYPE html>


<html lang="en" xmlns:th="http://www.w3.org/1000/xhtml">

@include('common.header')

<body>

@include('common.navbar')

<div class="container">

    @include('partials.logo')

    <div class="row" style="margin-top: 60px;">
        <div class="col-xs-9 col-xs-offset-3">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li ><a	href="#tab-1" data-toggle="tab"><span style="color: red;">Create
								new account</span></a></li>
                <li class="active"><a href="#tab-2" data-toggle="tab"><span style="color: red;">Log
								in</span></a></li>
                <li><a href="#tab-3" data-toggle="tab"><span style="color: red;">Forget Password</span></a></li>
            </ul>

            <!-- Tab panels -->
            <div class="tab-content">

                <!-- create new user pane -->
                <div class="tab-pane fade" id="tab-1" >
                    <div class="panel-group">
                        <div class="panel panel-default" style="border: none;">
                            <div class="panel-body"	style="background-color: #ededed; margin-top: 20px;">


                                <form method="POST" action="{{ route('register') }}">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="newUsername">* Username: </label>&nbsp;
                                        <input required="required" type="text" class="form-control" value="{{ old('name') }}"
                                                id="newUsername" name="username" />

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif

                                        <p style="color: #828282">Enter your username here.</p>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">* Email Address: </label> <input
                                                required="required" type="text" class="form-control" value="{{ old('email') }}"
                                                id="email" name="email" />

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif

                                        <p style="color: #828282">A valid email address. All
                                            emails from the system withll be sent to this address. The
                                            email address is not made public and will only be used if
                                            you wish to receive a new password or wish to receive
                                            certain notification.</p>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" >*Password</label>

                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm">*Confirm Password</label>

                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Create
                                        new account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- log in -->
                <div class="tab-pane active" id="tab-2" >
                    <div class="panel-group">
                        <div class="panel panel-default" style="border: none;">
                            <div class="panel-body"
                                 style="background-color: #ededed; margin-top: 20px;">
                                <form method="POST" action="{{ route('login') }}">

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="username">* Username: </label>
                                        <input required="required" type="text" class="form-control"
                                                id="username" value="{{ old('email') }}" required autofocus />

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif

                                        <p style="color: #828282">Enter your username here.</p>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">* Password: </label>
                                        <input required="required" type="password" class="form-control" id="password" name="password" required/>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif

                                        <p style="color: #828282">Enter the password that  accompanies your username</p>
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="login">Log in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- forget password -->
                <div class="tab-pane fade" id="tab-3">
                    <div class="panel-group">
                        <div class="panel panel-default" style="border: none;">
                            <div class="panel-body"
                                 style="background-color: #ededed; margin-top: 20px;">
                                <form action = "" method="post">
                                    <div class="form-group">
                                        <label for="recoverEmail">* Your Email: </label> <input
                                                required="required" type="text" class="form-control"
                                                id="recoverEmail" name="email" />
                                        <p style="color: #828282">Enter your registered email
                                            address here.</p>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of container -->

@include('common.footer-scripts')
</body>
</html>
