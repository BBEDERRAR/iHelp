<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">

        <a class="navbar-brand" href="{{url('/')}}" style="color: #fff"><img class="img=responsive" style="height: 60px"
                                                                             src="{{asset('img/logo.png')}}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <li class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>


                @if(auth()->guest())
                    <li class="nav-item">
                        <a class="btn btn-outline-primary btn-rounded" href="{{url('register')}}">register</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary btn-rounded" href="{{url('login')}}">login</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="triggerId"
                           data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">

                            <img style="border-radius: 50%;height: 30px" class="img-responsive img-circle"
                                 src="{{asset('avatar/'.auth()->user()->avatar)}}" alt="">

                        </a>
                        <div class="dropdown-menu text-center" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="{{url('myQuestions')}}">أسئلتي</a>
                            <a class="dropdown-item" href="{{url('profile')}}">الحساب</a>
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">الخروج</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </li>
    </div>

</nav>
