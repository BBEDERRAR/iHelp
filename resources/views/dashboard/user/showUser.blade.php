@extends('dashboard_layout.master')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    {{__('dashboard.profile')}}
                </div>
                <div class="panel-body text-center">
                    <img src="{{asset('avatar/'.$user->avatar)}}" class="img-responsive center-block img-circle" alt="">
                    <table class="table  table-hover">
                        <tbody>
                        <tr>
                            <td>
                                <h3 class="text-center">
                                    {{__('dashboard.name')}}
                                </h3>
                            </td>
                            <td>
                                <h4 class="text-center">
                                    {{$user->name}}
                                </h4>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3 class="text-center">
                                    {{__('dashboard.email')}}
                                </h3>
                            </td>
                            <td>
                                <h4 class="text-center">
                                    {{$user->email}}
                                </h4>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3 class="text-center">
                                    {{__('dashboard.address')}}
                                </h3>
                            </td>
                            <td>
                                <h4 class="text-center">
                                    {{$user->address}}
                                </h4>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3 class="text-center">
                                    {{__('dashboard.phone')}}
                                </h3>
                            </td>
                            <td>
                                <h4 class="text-center">
                                    {{$user->phone}}
                                </h4>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h3 class="text-center">
                                    {{__('dashboard.identityNumber')}}
                                </h3>
                            </td>
                            <td>
                                <h4 class="text-center">
                                    {{$user->identityNumber}}
                                </h4>
                            </td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
