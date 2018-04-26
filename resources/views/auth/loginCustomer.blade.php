@extends('landing_layout.master')
@section('content')
    <section id="wrapper" class="login-register pb-5">

        <div class="container flex-center mt-5 mb-3">
            <div class="row">
                <div class="col-md-6 container flex-center">
                    <img class="img-responsive"
                         style="height : 60%"
                         src="{{asset('landingpage/images/elite-admin-logo.png')}}"
                         alt="Eliteadmin"/>
                </div>
                <div class="col-md-5">
                    <div class="card mt-5 mb-3">
                        <div class="card-title">


                        </div>
                        <div class="card-body">
                            <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                {{--<a href="javascript:void(0)" class="text-center db">--}}
                                {{--<img class="img-responsive" style="background-color: floralwhite;" src="{{asset('img/logo.png')}}" />--}}
                                {{--</a>--}}

                                <div class="form-group m-t-40">
                                    <div class="col-xs-12">
                                        <input id="email" type="text" placeholder="{{__('auth.emailOrPhone')}}" class="form-control" name="login" value="{{ old('email') }}" required >
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input id="password" type="password" placeholder="{{__('dashboard.password')}}" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary pull-left p-t-0">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="checkbox-signup"> {{__('auth.rememberMe')}} </label>
                                        </div>
                                        <a href="{{url('recoverPwd')}}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> {{__('auth.forgotPwd')}}</a> </div>
                                </div>
                                <div class="form-group text-center m-t-20">
                                    <div class="col-xs-12">
                                        <button class="btn btn-warning btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{__('auth.login')}}</button>
                                    </div>
                                </div>
                            </form>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection