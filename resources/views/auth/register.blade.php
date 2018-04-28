@extends('auth.authLayout')
@section('content')
    <section id="wrapper" class="login-register ">
        <div class="login-box login-sidebar" style="overflow-y: scroll;">
            <div class="white-box">
                @if(Session::has('success'))
                    <div id="alert" class="alert alert-success text-center">
                        {{Session::get('success')}}
                    </div>
                @endif
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Client</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Soucouriste</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Infermier</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <form class="form-horizontal  form-material" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
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
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form class="form-horizontal  form-material" enctype="multipart/form-data" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

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
                                <link rel="stylesheet" href="{{asset('dashboard/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
                                @include('auth.map')
                                <div class="white-box">
                                    <label for="input-file-now">your certaficate </label>
                                    <div class="dropify-wrapper"><div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div>
                                        <div class="dropify-loader"></div>
                                        <div class="dropify-errors-container"><ul></ul></div>
                                        <input name="certaficate" type="file" id="input-file-now" class="dropify">
                                        <button type="button" class="dropify-clear">Remove</button>
                                        <div class="dropify-preview">
                                            <span class="dropify-render"></span>
                                            <div class="dropify-infos"><div class="dropify-infos-inner">
                                                    <p class="dropify-filename">
                                                        <span class="file-icon"></span>
                                                        <span class="dropify-filename-inner"></span></p>
                                                    <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                                </div>
                                            </div>
                                        </div>
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
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <form class="form-horizontal  form-material" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
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

                                    <link rel="stylesheet" href="{{asset('dashboard/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
                                @include('auth.map')
                                <div class="white-box">
                                    <label for="input-file-now">your cerficate</label>
                                    <div class="dropify-wrapper">
                                        <div class="dropify-message">
                                            <span class="file-icon"></span>
                                            <p>Drag and drop a file here or click</p>
                                            <p class="dropify-error">Ooops, something wrong appended.</p>
                                        </div>
                                        <div class="dropify-loader">
                                        </div>
                                        <div class="dropify-errors-container">
                                            <ul></ul>
                                        </div>
                                        <input name="certaficate" type="file" id="input-file-now" class="dropify">
                                        <button type="button" class="dropify-clear">Remove</button>
                                        <div class="dropify-preview">
                                            <span class="dropify-render"></span>
                                            <div class="dropify-infos">
                                                <div class="dropify-infos-inner">
                                                    <p class="dropify-filename">
                                                        <span class="file-icon"></span>
                                                        <span class="dropify-filename-inner"></span>
                                                    </p>
                                                    <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                                </div>
                                            </div>
                                        </div>
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

            </div>
        </div>
    </section>


    <script src="{{asset('dashboard/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            // Basic
            $('.dropify').dropify({
                @if(app()->getLocale()=='ar')
                messages: {
                    default: 'لإختيار ملف إضغط هنا',
                    replace: 'لإستبدال الملف إضغط هنا',
                    remove: 'حذف',
                    error: 'عذرا  !! الملف الذي إخترته كبير جدا !!'
                }
                @endif
            });

        });
    </script>
@endsection
