@extends('auth.authLayout')
@section('content')
    <section id="wrapper" class="login-register">
        <div class="login-box ">
            <div class="white-box ">
                <img class="img-responsive center-block" style="height: 100px;"
                     src="{{asset('img/logo.png')}}" alt="">
                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    {{--<a href="javascript:void(0)" class="text-center db">--}}
                    {{--<img class="img-responsive" style="background-color: floralwhite;" src="{{asset('img/logo.png')}}" />--}}
                    {{--</a>--}}

                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input id="email" type="text" placeholder="{{__('dashboard.email')}}" class="form-control"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" type="password" placeholder="{{__('dashboard.password')}}"
                                   class="form-control" name="password" required>

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
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i
                                        class="fa fa-lock m-r-5"></i> {{__('auth.forgotPwd')}}</a></div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">{{__('auth.login')}}</button>
                        </div>
                    </div>
                </form>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal" id="recoverform" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>{{__('auth.recoverPwd')}}</h3>
                            <p class="text-muted">{{__('auth.recoverPwdStep')}}</p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   required>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">{{__('auth.reset')}}</button>
                        </div>
                    </div>
                </form>
                <div class="text-center">
                 <span class="text-center">
                     Powered by IHelp version 1.0.0
                 </span>
                </div>
            </div>
        </div>
    </section>
@endsection



