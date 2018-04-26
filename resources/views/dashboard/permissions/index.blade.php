@extends('dashboard_layout.master')


@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="white-box">
                        <table  id="permissionsTable" class="display responsive nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">{{__('permissions.role')}}</th>
                                <th class="text-center">{{__('permissions.permissions')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($roles as $role)
                                <tr>
                                    @if(app()->getLocale()=='ar')
                                        <td class="text-center">{{$role->name_ar}}</td>
                                    @else
                                        <td class="text-center">{{$role->name}}</td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{url('permissionsOf/'.$role->name)}}"
                                           class="fcbtn btn btn-outline btn-info btn-1fbtn-info btn-rounded ">
                                    <span class="btn-label">
                                        <i class="fa fa-edit"></i>
                                     </span>
                                            {{__('dashboard.edit')}}
                                        </a>
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                </div>
                <!-- /.row -->

            </div>
        </div>
    </div>

@endsection


@section('js')
    <script src="{{asset('dashboard/plugins/bower_components/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>

    <script>

        $('#permissionsTable').DataTable({
            @if(app()->getLocale()=='ar')
            "language": {
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                }
            },
            @endif

        });
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