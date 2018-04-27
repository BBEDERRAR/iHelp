@extends('layouts.app')

@section('content')
    <section style="background-color:#00D2DB!important;" class="text-center">
        <img class="img-responsive " src="{{asset('img/cover.png')}}" alt="">
    </section>

    <section id="features" class="text-center">
        <h1 class="wow animated flipInY">
            Features
        </h1>
        <div class="container">
            <div class="row">

                <div class="col-md-8 p-5">
                    <h3>
                        <span class="text-danger wow animated fadeInUp">Cause 1# :</span>
                        Ambulance patient quickly

                    </h3>
                    <p class=" wow animated fadeInUp">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis incidunt vero voluptatum?
                        Ad animi cupiditate deleniti, deserunt dicta, expedita libero molestiae, molestias praesentium
                        temporibus ullam ut. Inventore iure magni nisi.
                    </p>
                </div>
                <div class="col-md-4 p-5">
                    <img class="img-circle wow animated swing" src="{{asset('img/doctor.png')}}"
                         alt="ي"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 p-5">
                    <img class="img-circle wow animated swing" src="{{asset('img/syringe.png')}}"
                         alt="ي"/>
                </div>
                <div class="col-md-8 p-5">
                    <h3>
                        <span class="text-danger wow animated fadeInUp">Cause 2# :</span>
                        Medical Nursing

                    </h3>
                    <p class=" wow animated fadeInUp">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis incidunt vero voluptatum?
                        Ad animi cupiditate deleniti, deserunt dicta, expedita libero molestiae, molestias praesentium
                        temporibus ullam ut. Inventore iure magni nisi.
                    </p>
                </div>
            </div>
            <div class="row">

                <div class="col-md-8 p-5">
                    <h3>
                        <span class="text-danger wow animated fadeInUp">Cause 3# :</span>
                        social solidarity

                    </h3>
                    <p class=" wow animated fadeInUp">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis incidunt vero voluptatum?
                        Ad animi cupiditate deleniti, deserunt dicta, expedita libero molestiae, molestias praesentium
                        temporibus ullam ut. Inventore iure magni nisi.
                    </p>
                </div>
                <div class="col-md-4  p-5">
                    <img class="img-circle wow animated swing" src="{{asset('img/care.png')}}"
                         alt="ي"/>
                </div>
            </div>
        </div>


    </section>


@endsection

@section('css')
    <style>


        #features {
            padding: 50px;
            color: #FCFEFF !important;
            background-color: #00D2DB !important;
        }


    </style>
@endsection

@section('js')
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>

@endsection
