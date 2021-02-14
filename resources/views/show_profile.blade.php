@extends('layouts/app')
@section('title', __("مشاهدة الملف الشخصي"))
@section('content')
    <div class="card text-center mx-auto my-4 col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3" style="border-bottom: 2px solid #00bdaf; height: fit-content; min-width: 200px " >
    <div class="card-body justify-content-center  " style="max-width: fit-content">
    <div class="user-picture card-image " style="height: 200px">

        @if(isset($user->media[0]->src))
            <div class="circle-avatar" style="background-image:url({{$user->media[0]->src}})"></div>
        @else
            <i class="far fa-user-circle profile-pic thirdColor d-block mx-auto my-auto img-fluid" style="font-size: 75px;position: relative; top: 50%; transform: translateY(-50%);"></i>
        @endif
    </div>

    <div class="user-info " style="max-width: 200px">
        <hr class="mainBGColor">
        <div class="user_bio">
            <h4 class="text-center">{{$user->name}}</h4>
            <p>{{$user->bio}}</p>
        </div>
        <div class="user-statistics">
            <hr style="width: 75%" class="mainBGColor">

            <label class="text-center"><i class="far fa-chart-bar mr-2 mainColor"></i></label><h4 style="display: inline">احصائياتي :</h4>
            <label>عدد طلبات التبني :</label> <label> {{$orders}}</label>
            <label>عدد طلبات الإنقاذ :</label> <label> {{$rescue}}</label>
            <label>عدد بلاغات الفقدان :</label> <label> {{$lost}}</label>
        </div>
        <div class="text-left ml-3">
            @isset($user->organizationName)
                <hr style="width: 75%" class="mainBGColor">
                <label><i class="far fa-building mr-2 mainColor"></i>{{__("المنظمة : ")}}</label> <label>{{$user->organizationName}}</label> <br>
            @endisset
            <div class="profile-social-menu my-4 text-center">
                <ul class="justify-content-center pt-2" >
                    @isset($user->contact->twitter)
                        <li><a href="https://twitter.com/{{$user->contact->twitter}}" title="{{$user->contact->twitter}}@" target="_blank"><i class="fa fa-twitter" style="color:inherit;"></i></a></li>
                    @endisset
                    @isset($user->contact->instagram)
                        <li><a href="https://www.instagram.com/{{$user->contact->instagram}}" title="{{$user->contact->instagram}}@" target="_blank"><i class="fa fa-instagram" style="color:inherit;"></i></a></li>
                    @endisset
                </ul>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection
