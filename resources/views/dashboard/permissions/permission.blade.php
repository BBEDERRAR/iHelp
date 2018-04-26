@extends('dashboard_layout.master')


@section('content')
    @if(Session::has('success'))
        <div id="alert" class="alert alert-success text-center col-md-12">
            <a data-dismiss="alert" aria-label="Close" class="fa  fa-times pull-right"></a>
            {{Session::get('success')}}
        </div>
    @endif


    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="white-box">
                    <form action="{{url('updatePermissionsOf/'.$role->name)}}" method="post">
                        {{csrf_field()}}
                        <table id="permissionsTable" class="table color-bordered-table success-bordered-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">{{__('permissions.permission')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" name="{{$permission->id}}" {{ ($role->hasPermissionTo($permission->name))?'checked':'' }} >
                                    </td>
                                    <td class="text-center">
                                        @if(app()->getLocale()=='ar')
                                            {{$permission->name_ar}}
                                        @else
                                            {{$permission->name}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success btn-rounded ">
                                {{__('dashboard.submit')}}
                            </button>
                        </div>

                    </form>
                    <br>
                </div>
            </div>
            <!-- /.row -->

        </div>
    </div>

@endsection


@section('js')
    <script src="{{asset('dashboard/plugins/bower_components/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>

    <script>

        {{--$('#permissionsTable').DataTable({--}}
            {{--@if(app()->getLocale()=='ar')--}}
            {{--"language": {--}}
                {{--"sProcessing": "جارٍ التحميل...",--}}
                {{--"sLengthMenu": "أظهر _MENU_ مدخلات",--}}
                {{--"sZeroRecords": "لم يعثر على أية سجلات",--}}
                {{--"sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",--}}
                {{--"sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",--}}
                {{--"sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",--}}
                {{--"sInfoPostFix": "",--}}
                {{--"sSearch": "ابحث:",--}}
                {{--"sUrl": "",--}}
                {{--"oPaginate": {--}}
                    {{--"sFirst": "الأول",--}}
                    {{--"sPrevious": "السابق",--}}
                    {{--"sNext": "التالي",--}}
                    {{--"sLast": "الأخير"--}}
                {{--}--}}
            {{--}--}}
            {{--@endif--}}
        {{--});--}}
    </script>
@endsection

@section('css')

    <link href="{{asset('dashboard/plugins/bower_components/datatables/jquery.dataTables.min.css')}}"
          rel="stylesheet"
          type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('dashboard/plugins/bower_components/bootstrap-select/bootstrap-select.min.css')}}"
          rel="stylesheet"/>
    <style>
        .btn-label {
            background: none;
        }
    </style>

@endsection