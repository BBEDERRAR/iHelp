@extends('landing_layout.master')
@section('content')
    <section id="wrapper" class="login-register">

        <div class="container flex-centex">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mt-5 mb-3">
                        <div class="deep-orange lighten-1 p-3 white-text text-center ">
                            <h2>{{__('landing.register')}}</h2>
                        </div>
                        <div class="card-body p-5">
                            @if(Session::has('success'))
                                <div id="alert" class="alert alert-success text-center">
                                    {{Session::get('success')}}
                                </div>
                            @endif
                            <form class="form-horizontal  form-material" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}


                                <h3 class="box-title text-center m-t-40 m-b-0">{{__('auth.register')}}</h3>
                                <h5 class="text-center">{{__('auth.registerStep')}}</h5>
                                <div class="m-t-20 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <label for="name" class="text-center col-md-4">
                                            {{__('dashboard.name')}}
                                        </label>
                                        <input id="name" type="text" class="form-control col-md-8"
                                                name="name"
                                               value="{{ old('name') }}"
                                               required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <label for="email" class="col-md-4 text-center">{{__('dashboard.email')}}</label>
                                        <input id="email" type="email" class="form-control col-md-8"
                                                name="email"
                                               value="{{ old('email') }}"
                                               required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif                        </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <label for="name" class="text-center col-md-4">
                                            {{__('dashboard.password')}}
                                        </label>
                                        <input id="password" type="password" class="form-control col-md-8"
                                                name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="password-confirm" class="text-center col-md-4">
                                            {{__('dashboard.confirmPassword')}}
                                        </label>
                                        <input id="password-confirm" type="password" class="form-control col-md-8" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <label for="phone" class="text-center col-md-4">
                                            {{__('dashboard.phone')}}
                                        </label>
                                        <input id="phone" type="text" class="form-control col-md-8"  name="phone" value="{{ old('phone') }}" required>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif                        </div>
                                </div>
                                <div class="form-group{{ $errors->has('identityNumber') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <label for="identityNumber" class="text-center col-md-4">
                                            {{__('dashboard.identityNumber')}}
                                        </label>
                                        <input id="identityNumber" type="text" class="form-control col-md-8"   name="identityNumber" value="{{ old('identityNumber') }}"
                                               required>

                                        @if ($errors->has('identityNumber'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('identityNumber') }}</strong>
                                    </span>
                                        @endif                        </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                        <input id="phone" type="text" class="form-control"  placeholder="{{__('dashboard.phone')}}" name="phone" value="{{ old('phone') }}"
                                               required>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif                        </div>
                                </div>
                                <div class="form-group{{ $errors->has('identityNumber') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                        <input id="identityNumber" type="text" class="form-control"  placeholder="{{__('dashboard.identityNumber')}}" name="identityNumber" value="{{ old('identityNumber') }}"
                                               required>

                                        @if ($errors->has('identityNumber'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('identityNumber') }}</strong>
                                    </span>
                                        @endif                        </div>
                                </div>
                                <div class="form-group{{ $errors->has('visaNumber') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                        <input id="visaNumber" type="text" class="form-control"  placeholder="{{__('dashboard.visaNumber')}}" name="visaNumber" value="{{ old('visaNumber') }}"
                                               required>

                                        @if ($errors->has('visaNumber'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('visaNumber') }}</strong>
                                    </span>
                                        @endif                        </div>
                                </div>


                                <div class="form-group text-center m-t-20">
                                    <div class="col-xs-12">
                                        <button class="btn btn-warning btn-lg btn-block text-uppercase waves-effect waves-light"
                                                type="submit">
                                            {{__('auth.signUp')}}
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-12 text-center">
                                        <p>{{__('auth.hasAccount')}} <a href="{{url('/loginCustomer')}}"
                                                                        class="text-warning m-l-5"><b>{{__('auth.login')}}</b></a>
                                        </p>
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

                <div class="col-md-4 " style="display: flex;justify-content: center;align-items: center">
                    <img  class="img-responsive"
                         src="{{asset('landingpage/images/elite-admin-logo.png')}}"
                         alt="Eliteadmin"/>
                </div>
            </div>
        </div>
    </section>
@endsection