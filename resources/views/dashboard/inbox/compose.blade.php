@extends('dashboard_layout.master')


@section('content')
    <div class="col-md-12">
        <div class="white-box text-center">
            <form action="{{url('reply')}}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <span>{{__('inbox.to')}}</span>
                    <input class="form-control" name="email" value="{{old('email')}}" >
                </div>
                <div class="form-group">
                    <span>{{__('inbox.subject')}}</span>
                    <input class="form-control" name="subject" value="{{old('subject')}}" >
                </div>
                <div class="form-group">
                    <textarea class="textarea_editor form-control" name="message" rows="15" ></textarea>
                </div>
                <hr>
                <button type="submit" class="btn btn-info"><i class="fa fa-envelope-o"></i> {{__('inbox.send')}}
                </button>
            </form>
        </div>

    </div>
@endsection

@section('js')

    <script src="{{asset('dashboard/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{asset('dashboard/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.textarea_editor').wysihtml5();
        });
    </script>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('dashboard/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css')}}"/>
@endsection