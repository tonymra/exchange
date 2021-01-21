<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.inc-html-header')

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>
                                <form method="POST" action="{{ route('register') }}" class="user">
                                    {{ csrf_field() }}

                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input name="name" type="text" class="form-control form-control-user" placeholder="Full Name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input name="email" type="email" class="form-control form-control-user" placeholder="Email Address">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input  name="password"  type="password" class="form-control form-control-user" placeholder="Password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                                        <input  name="password_confirmation"  type="password" class="form-control form-control-user" placeholder="Confirm Password">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <button type="submit"  class="btn btn-primary btn-user btn-block">Register</button>
                                    <hr>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('password.request') }}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{route('login')}}">Already have an account! Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.inc-html-footer')

</body>

</html>