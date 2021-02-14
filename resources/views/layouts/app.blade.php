<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.ar_name').' | ' }} @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
-->
    <!-- Styles -->
    <!--<link href="{ asset('css/app.css') }}" rel="stylesheet">-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/c410ddd561.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div id="app" class="secondaryBGColor " >
        <nav class="navbar navbar-expand-lg navbar-light bg-light mainBGColor" >
            <div class="container" style="min-height:50px">
                <div class="main-link">
                <a class="navbar-brand secondaryColor p-2" href="/"  >
                    <i class="fas fa-paw" style="font-size:25px;"></i>
                    {{__("رفق ستيشن")}}
                </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">

                        <div class="nav-item mx-3" style="width:fit-Content">
                            <div class="main-link" style="position:relative;">
                            @if(isset($mainAdoption))
                                <a class="nav-link focused-Adoption secondaryColor p-2" id="Main-Adoption" href="{{route('adoption.index')}}" >{{__("التبني")}}</a>
                                @else
                                <a class="nav-link secondaryColor p-2" id="Main-Adoption" href="{{route('adoption.index')}}" >{{__("التبني")}}</a>
                                @endif
                            </div>
                        </div>
                        <div class="nav-item mx-3" style="width:fit-Content">
                            <div class="main-link" style="position:relative;">
                                @if(isset($mainRescue))
                                    <a class="nav-link focused-Rescue secondaryColor p-2" id="Main-Rescue" href="{{route('rescue.index')}}" >{{__("الإنقاذ")}}</a>
                                @else
                                    <a class="nav-link secondaryColor p-2" id="Main-Rescue" href="{{route('rescue.index')}}" >{{__("الإنقاذ")}}</a>
                                @endif
                            </div>
                        </div>
                        <div class="nav-item mx-3" style="width:fit-Content">
                            <div class="main-link" style="position:relative;">
                                @if(isset($mainLost))
                                    <a class="nav-link focused-Lost secondaryColor p-2" id="Main-Lost" href="{{route('lost.index')}}" >{{__("القطط المفقودة")}}</a>
                                @else
                                    <a class="nav-link secondaryColor p-2" id="Main-Lost" href="{{route('lost.index')}}" >{{__("القطط المفقودة")}}</a>
                                @endif
                            </div>
                        </div>


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <div class="main-link" style="position:relative;">
                                <a class="nav-link secondaryColor" href="{{route('register')}}"><i class="fas fa-user-alt mx-1" style="color: inherit"></i> {{__("التسجيل")}} </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="main-link" style="position:relative;">
                                <a class="nav-link secondaryColor" href="{{route('login')}}" ><i class="fas fa-sign-in-alt mx-1" style="color: inherit"></i>{{__("تسجيل الدخول")}}</a>
                                </div>
                            </li>
                        @else
                            @if(\App\Http\Controllers\HelperController::isAuthAdmin())
                            <li class="nav-item" style="width: fit-content">
                                <div class="main-link" style="position:relative;">
                                    <a class="nav-link secondaryColor" href="{{route('admin.index')}}" >{{__("Admin Dashboard")}}</a>
                                </div>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle secondaryColor" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item thirdColor" href="{{ route('user.profile') }}">
                                        {{ __('مشاهدة الملف الشخصي') }}
                                    </a>
                                    <a class="dropdown-item thirdColor" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if($errors->any())
            <ul class="alert alert-warning list-group text-center">
                @foreach($errors->all() as $error)
                <li>{{__("$error")}}</li>
                @endforeach
            </ul>
        @endif
        @if(Session::has('temp_message'))
            <div class="alert alert-info }} text-center">
                <h5>{{Session::pull('temp_message')}}</h5>
            </div>
        @endif
        @if(Session::has('message'))
        <div class="alert {{Session::pull('alert-class' ,  'alert-info') }} text-center">
            <h6>{{Session::pull('message')}}</h6>
        </div>
        @endif
        <!-- for main page ! -->
        @yield('main-image')
        @yield('main-content')

        <main class="container py-4">
            @yield('content')
        </main>

            @yield('cards')

    </div>

    <footer class="page-footer mainBGColor">
        <div class="container ">
            <div class="row">
                <div class="col-11 col-sm-4 col-md-3 col-lg-6 col-xl-6 pt-3">
                    <ul class="list-inline" style="width:fit-Content">
                        <li>
                          <div class="main-link" style="position:relative; width:fit-Content;">
                          <a href="{{route('aboutus')}}" class="nav-link secondaryColor p-2">{{__("عن رفق ستيشن")}}</a>
                        </div>
                        </li>

                        <li>
                          <div class="main-link" style="position:relative;  width:fit-Content;">
                            <a href="{{route('terms')}}" class="nav-link secondaryColor">{{__("الشروط والقوانين")}}</a>
                        </div>
                        </li>
                        <li>
                          <div class="main-link" style="position:relative; width:fit-Content;">
                            <a href="#" class="nav-link secondaryColor" data-toggle="modal" data-target="#contactus-modal">{{__("تواصل معنا")}}</a>
                        </div>
                        </li>
                        @include('_helper/_contactus_model')
                        <!--li><a href="#" class="nav-link secondaryColor">{__("الأسئلة الشائعة")}}</a></li-->
                    </ul>
                </div>
                <div class="social-menu col-12 col-sm-7 col-md-7 col-lg-4 col-xl-4 offset-md-2 offset-lg-2 offset-xl-2 my-auto text-center">
                  <h5 class="secondaryColor">{{__("تواصل معنا عبر السوشال ميديا")}}</h5>
                  <ul class="justify-content-center pt-2">
                      <li><a href="#" title="{{__("تويتر")}}"><i class="fa fa-twitter" style="color:inherit;"></i></a></li>
                      <!--li><a href="#" title="{__("انستجرام")}}"><i class="fa fa-instagram" style="color:inherit;"></i></a></li-->
                    </ul>
                    </div>
            </div>
          </div>
            <div class="container-fluid">
              <div class="row justify-content-center thirdBgColor">
                <p class="secondaryColor d-inlineBlock offset-md-2 offset-lg-3 offset-xl-3 pt-3 pl-1 px-4">صنع بـ <i class="fas fa-heart" style="Color:#B71C1C" title="{{__("حب")}}"></i> في الرياض</p>
                  <p class="secondaryColor d-inlineBlock mx-auto pt-3">{{__("©2020 رفق ستيشن , جميع الحقوق محفوظة")}}</p>
              </div>
            </div>

    </footer>
</body>
</html>
