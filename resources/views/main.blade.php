@extends('layouts/app')
@section('title' , __("الصفحة الرئيسية"))

@section('main-image')
<div class="" style=" position: relative; height: fit-content; background-color: rgba(0,0,0,1);">
<!--
        <div class="container-fluid" style="height: 425px; width: 100%;">
        <div  class="card-image " style="width: 100%; height:100%;background-repeat: no-repeat; background-image:url('{url('/main.jpg')}}');  ">
            <div style="width: 100%; height:100%; background-color: rgba(0,0,0,0.7); "> <h4 style="color: white"> style="color: white">hello world </h4></div>
        </div>
        </div>-->
            <img src="{{url('/main2.jpg')}}" alt="" style="min-width:100%;  width:auto; max-width: 100%; max-height:550px; object-fit: cover; opacity: 0.65;">
                <div style="position: absolute; top: 20%; left: 5%;">
                    <h1 id="main-label" class="text-center secondaryColor">{{__("كُن رَفيقاً")}}</h1>
                <label id="main-label2" class="secondaryColor">{{__("« إِنَّ الرِّفقَ لا يَكُونُ في شيءٍ إِلَّا زَانَهُ »")}}</label>
            </div>
</div>
 @endsection
@section('main-content')
<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="card shadow adoption col-11 col-sm-9 col-md-8 col-lg-3 col-cl-3 mx-3 my-3">
            <div class="card-body text-center my-auto">
                <a href="{{route('adoption.index')}}" class="a-td-none mainColor">
                <div><i class="fas fa-hotel pb-1"></i></div>
                <h2>{{__("التبني")}}</h2>
                </a>
                <p class="thirdColor">{{__("أبحث عن حيوان أليف للتبني وتواصل مع الراغبين بعرض حيواناتهم للتبني")}}</p>
            </div>
        </div>
        <div class="card shadow rescue col-11 col-sm-9 col-md-8 col-lg-3 col-cl-3 mx-3 my-3">
            <div class="card-body text-center my-auto">
                <a href="{{route('rescue.index')}}" class="a-td-none ">
                <div><i class="fas fa-first-aid  pb-1"></i></div>
                <h2 class="">{{__("الإنقاذ")}}</h2>
                </a>
                <p>{{__("أبلغ عن حيوان أليف يحتاج للإنقاذ لمشاركة حالته مع المنقذين")}}</p>
            </div>
        </div>
        <div class="card shadow lost col-11 col-sm-9 col-md-8 col-lg-3 col-cl-3 mx-3 my-3">
            <div class="card-body text-center my-auto">
                <a href="{{route('lost.index')}}" class="a-td-none">
                <div><i class="fas fa-paw  pb-1"></i></div>
                <h2 class="">{{__("الحيوانات المفقودة")}}</h2>
                </a>
                    <p>{{__("أبلغ عن حيوانك المفقود وشارك التفاصيل عبر السوشال ميديا بسهولة")}}</p>
            </div>
        </div>
    </div>

    @include('_helper.main_search')

    <div class="row justify-content-center mt-2" id="Main-Time">
        <div class="col-11 col-sm-11 col-md-7 col-lg-6 col-xl-6 my-3 text-left text-sm-left text-md-center text-lg-center text-xl-center">
            <img src="{{url('time2.png')}}" alt="" style="width: auto; height: auto; max-height: 450px; max-width: inherit;">
        </div>
        <div class="main-time thirdColor col-11 col-sm-11 col-md-5 col-lg-4 col-xl-4 text-center my-auto">
            <h2>{{__("وقت أقل..جهد أقل")}}</h2> <span>{{__("وفر الوقت والجهد وتصفح الحالات بشكل مرتب ومنظم بمكان واحد ")}}</span>
        </div>
    </div>
    <div class="row justify-content-center" id="Main-Search">
        <div class="main-search thirdColor col-11 col-sm-11 col-md-5 col-lg-4 col-xl-4 text-center my-auto order-2 order-sm-2 order-md-1 order-lg-1 order-xl-1">
            <h2>{{__("البحث السريع")}}</h2> <span>{{__("تصفح الحالات بسهولة مع فلاتر البحث الجاهزة")}}</span>
        </div>
        <div class="col-11 col-sm-11 col-md-7 col-lg-6 col-xl-6 my-3 text-left text-sm-left text-md-center text-lg-center text-xl-center order-1 order-sm-1 order-md-2 order-lg-2 order-xl-2">
            <img src="{{url('search2.png')}}" alt="" style="width: auto; height: auto; max-height: 450px; max-width: inherit;">
        </div>
    </div>
    <div class="row justify-content-center mb-2" id="Main-Share">
        <div class="col-11 col-sm-11 col-md-7 col-lg-6 col-xl-6 my-3 text-left text-sm-left text-md-center text-lg-center text-xl-center">
            <img src="{{url('share2.png')}}" alt="" style="width: auto; height: auto; max-height: 450px; max-width: inherit;">
        </div>
        <div class="main-share thirdColor col-11 col-sm-11 col-md-5 col-lg-4 col-xl-4 text-center my-auto">
            <h2>{{__("شارك الحالات")}}</h2> <span>{{__("شارك الحالات عبر السوشال ميديا بسهولة")}}</span>
        </div>
    </div>


</div>

@endsection

