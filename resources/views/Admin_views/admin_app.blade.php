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
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/c410ddd561.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div id="app" class=" " >
    <nav class="navbar navbar-expand-lg navbar-light bg-light mainBGColor" style="min-height: 67px;" >
        <div class="container" style="min-height:50px">
            @if(\App\Http\Controllers\HelperController::isAuthAdmin())
                <div class="nav-item  mx-3" style="width: fit-content">
                    <div class="main-link" style="position:relative;">
                        <a class="navbar-brand secondaryColor p-2" href="{{route('admin.index')}}" >
                            <i class="fas fa-tachometer-alt"></i>
                            <label>{{__("لوحة التحكم")}}</label>
                        </a>
                    </div>
                </div>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">

                        <div class="main-link mx-3" style="position:relative;">
                            <a class="nav-link secondaryColor p-2" href="{{route('admin.users')}}" >
                                <i class="fas fa-users my-auto" style=""></i>
                                <label>{{__("المستخدمين")}}</label>
                            </a>
                        </div>
                        <div class="main-link mx-3" style="position:relative;">
                            <a class="nav-link secondaryColor p-2" href="{{route('admin.adoption')}}" >
                                <i class="fas fa-cat my-auto"></i>
                                <label>{{__("التبني")}}</label>
                            </a>
                        </div>
                        <div class="main-link mx-3" style="position:relative;">
                            <a class="nav-link secondaryColor p-2" href="{{route('admin.rescue')}}" >
                                <i class="fas fa-first-aid my-auto"></i>
                                <label>{{__("الإنقاذ")}}</label>
                            </a>
                        </div>
                        <div class="main-link mx-3" style="position:relative;">
                            <a class="nav-link secondaryColor p-2" href="{{route('admin.lost')}}" >
                                <i class="fas fa-paw my-auto" ></i>
                                <label>{{__("القطط المفقودة")}}</label>
                            </a>
                        </div>
                    <!--li class="nav-item">
                        <a class="nav-link secondaryColor" href="#" >{__("المقالات")}}</a>
                    </li-->


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav ml-auto" >
                    <li>
                        <a class="nav-link secondaryColor" title="{{__("الصفحة الرئيسية")}}" href="{{ route('main') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <!-- Authentication Links -->
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
            <h5>{{Session::pull('message')}}</h5>
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

</body>
</html>
