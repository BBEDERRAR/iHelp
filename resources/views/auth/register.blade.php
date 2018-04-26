@extends('auth.authLayout')
@section('content')
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                @if(Session::has('success'))
                    <div id="alert" class="alert alert-success text-center">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form class="form-horizontal  form-material" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}



                    <h3 class="box-title m-t-40 m-b-0">{{__('auth.register')}}</h3>
                    <div class="m-t-20 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="name" type="text" class="form-control" placeholder="{{__('dashboard.name')}}" name="name" value="{{ old('name') }}"
                                   required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control"  placeholder="{{__('dashboard.email')}}" name="email" value="{{ old('email') }}"
                                   required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="password" type="password" class="form-control"  placeholder="{{__('dashboard.password')}}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password-confirm" type="password" class="form-control"  placeholder="{{__('dashboard.confirmPassword')}}"
                                   name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">
                                {{__('auth.signUp')}}
                            </button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>{{__('auth.hasAccount')}} <a href="{{url('/login')}}" class="text-primary m-l-5"><b>{{__('auth.login')}}</b></a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>



@endsection
