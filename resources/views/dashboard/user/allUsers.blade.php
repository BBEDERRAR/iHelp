@extends('dashboard_layout.master')


@section('content')

    @if(count($errors->all())>0)
        <div class="alert alert-danger text-center col-md-12 ">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fa fa-minus"></i></span>
            </button>
            <ul class="list-unstyled text-center">
                @foreach($errors->all() as $error)
                    <li class="text-center">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('success'))
        <div id="alert" class="alert alert-success text-center col-md-12">

            {{Session::get('success')}}
            <span class="pull-right" data-dismiss="alert" aria-label="Close" aria-hidden="true"><i
                        class="fa fa-minus"></i></span>
        </div>
    @endif

    <div class="col-sm-12">
        <div class="white-box">
            <table id="allUsers" class="display responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="text-center">{{__('dashboard.name')}}</th>
                    <th class="text-center">{{__('dashboard.email')}}</th>
                    <th class="text-center">{{__('dashboard.avatar')}}</th>
                    <th class="text-center">{{__('dashboard.address')}}</th>
                    <th class="text-center">{{__('dashboard.phone')}}</th>
                    <th class="text-center">{{__('dashboard.identityNumber')}}</th>
                    <th class="text-center">{{__('dashboard.active')}}</th>
                    <th class="text-center">{{__('dashboard.edit')}}</th>
                    <th class="text-center">{{__('dashboard.deleteOrActivate')}}</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th class="text-center">{{__('dashboard.name')}}</th>
                    <th class="text-center">{{__('dashboard.email')}}</th>
                    <th class="text-center">{{__('dashboard.avatar')}}</th>
                    <th class="text-center">{{__('dashboard.address')}}</th>
                    <th class="text-center">{{__('dashboard.phone')}}</th>
                    <th class="text-center">{{__('dashboard.identityNumber')}}</th>
                    <th class="text-center">{{__('dashboard.active')}}</th>
                    <th class="text-center">{{__('dashboard.edit')}}</th>
                    <th class="text-center del">{{__('dashboard.deleteOrActivate')}}</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($users as $user)
                    @if($user->id!=auth()->id())
                        <tr>
                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center">{{$user->email}}</td>
                            <td class="text-center">
                                <img class="img-circle" style="height: 60px;width: 60px"
                                     src="{{asset('avatar/'.$user->avatar)}}" alt="">
                            </td>
                            <td class="text-center">{{$user->address}}</td>
                            <td class="text-center">{{$user->phone}}</td>
                            <td class="text-center">{{$user->identityNumber}}</td>
                            <td class="text-center">

                                @if($user->active)
                                    <div class="label label-success">
                                        {{__('dashboard.active')}}
                                    </div>
                                @else
                                    <div class="label label-danger">
                                        {{__('dashboard.inactive')}}
                                    </div>

                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button"
                                        class="fcbtn btn btn-outline btn-info btn-1fbtn-info btn-rounded "
                                        data-toggle="modal"
                                        data-target="#edit{{$user->id}}">
                                     <span class="btn-label">
                                        <i class="fa fa-edit"></i>
                                     </span>
                                    {{__('dashboard.edit')}}
                                </button>

                                <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title"
                                                    id="exampleModalLabel1">{{__('dashboard.editUser')}} </h4>
                                            </div>
                                            <div class="modal-body">

                                                {!! Form::open(["url"=>"editUser/".$user->id]) !!}
                                                {!! csrf_field() !!}


                                                <div class="form-group">
                                                    <label class="col-md-12"
                                                           for="example-text">{{__('dashboard.name')}}
                                                    </label>
                                                    <div class="col-md-12">
                                                        <input required="true" name="name" type="text"
                                                               value="{{$user->name}}"
                                                               class="form-control"
                                                               placeholder="{{__('dashboard.namePlaceholder')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12"
                                                           for="example-email">{{__('dashboard.email')}}
                                                    </label>
                                                    <div class="col-md-12">
                                                        <input required="true" name="email" type="email"
                                                               value="{{$user->email}}"
                                                               class="form-control"
                                                               placeholder="{{__('dashboard.emailPlaceholder')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12"
                                                           for="example-phone">{{__('dashboard.phone')}}
                                                    </label>
                                                    <div class="col-md-12">
                                                        <input required="true" name="phone" type="text"
                                                               class="form-control"
                                                               value="{{$user->phone}}"
                                                               placeholder="{{__('dashboard.phonePlaceholder')}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-12"
                                                           for="example-phone">{{__('dashboard.address')}}
                                                    </label>
                                                    <div class="col-md-12">
                                                        <input name="address" type="text" class="form-control"
                                                               value="{{$user->address}}"
                                                               placeholder="{{__('dashboard.addressPlaceholder')}}">

                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="col-md-12" for="example-phone">
                                                        {{__('dashboard.identityNumber')}}
                                                    </label>
                                                    <input name="identityNumber" type="text" class="form-control"
                                                           value="{{$user->identityNumber}}"

                                                           placeholder="{{__('dashboard.identityNumber')}}">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <br>
                                                    <button class="btn btn-info"> {{__('dashboard.submit')}}</button>
                                                    {!! Form::close() !!}
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        {{__('dashboard.close')}}
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                @if(auth()->user()->hasRole('admin') )
                                    @if($user->active)
                                        <button type="button"
                                                class="fcbtn btn btn-outline btn-danger btn-1fbtn-info btn-rounded"
                                                data-toggle="modal"
                                                data-target="#delete{{$user->id}}"
                                        >
                                     <span class="btn-label">
                                        <i class="fa fa-times"></i>
                                     </span>
                                            {{__('dashboard.blocking')}}
                                        </button>
                                        <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title"
                                                            id="exampleModalLabel1">{{__('dashboard.deleteUser')}} </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{__('dashboard.confirmDelete')}}
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <br>
                                                        <form action="{{url('deleteUser/'.$user->id)}}"
                                                              method="post">
                                                            {{csrf_field()}}
                                                            <button class="btn btn-info" type="submit">
                                                                {{__('dashboard.submit')}}
                                                            </button>
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">
                                                                {{__('dashboard.close')}}
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <button type="button"
                                                class="fcbtn btn btn-outline btn-success btn-1fbtn-info btn-rounded"
                                                data-toggle="modal"
                                                data-target="#activate{{$user->id}}"
                                        >
                                     <span class="btn-label">
                                        <i class="fa fa-times"></i>
                                     </span>
                                            {{__('dashboard.activate')}}
                                        </button>
                                        <div class="modal fade" id="activate{{$user->id}}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="exampleModalLabel1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title"
                                                            id="exampleModalLabel1">{{__('dashboard.activateUser')}} </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{__('dashboard.confirmActivation')}}
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <br>
                                                        <form action="{{url('activateUser/'.$user->id)}}"
                                                              method="post">
                                                            {{csrf_field()}}
                                                            <button class="btn btn-info" type="submit">
                                                                {{__('dashboard.submit')}}
                                                            </button>
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">
                                                                {{__('dashboard.close')}}
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                            </td>

                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('js')

    <script src="{{asset('dashboard/plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>

    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>

        $('#allUsers').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions:
                        {
                            columns: [0, 1, 3, 4, 5]
                        }
                }
            ],
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
            }
            @endif
        });

        $('.dt-button').removeClass('dt-button').addClass('btn btn-danger waves-effect waves-light m-r-10 ')
    </script>
@endsection

@section('css')
    <style>
        .btn-label {
            background: none;
        }
    </style>
    <link href="{{asset('dashboard/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css" rel="stylesheet"
          type="text/css"/>

@endsection