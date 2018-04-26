@extends('landing_layout.master')
@section('content')
    <section id="wrapper" class="login-register">
        <div class="container flex-center ">
            <div class="card">
                <div class="card-title"></div>
                <div class="card-body">
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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-warning   btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{__('auth.reset')}}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection