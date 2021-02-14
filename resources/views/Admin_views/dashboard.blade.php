@extends('Admin_views/admin_app')
@section('title', __("لوحة التحكم"))
@section('main-image')
    <div class="container-fluid">
    <div class="my-4">

        <div class="row justify-content-center my-3">
        <div class="admin-cards-1 card shadow col-8 col-sm-5 col-md-5 col-lg-3 col-xl-3 mx-3 my-2">
            <a href="{{route('admin.users')}}">
            <div class="card-body d-flex">
                <div class="col">
                    <h6 class="">{{__("المستخدمين")}}</h6>
                    <h4 class="offset-1">{{$users}}</h4>
                </div>
                <i class="fas fa-users my-auto" style="font-size: 40px"></i>
            </div>
            </a>
        </div>

        <div class="admin-cards-2 card shadow col-8 col-sm-5 col-md-5 col-lg-3 col-xl-3 mx-3 my-2">
            <a href="{{route('admin.adoption')}}">
            <div class="card-body d-flex">
                <div class="col">
                    <h6 class="">{{__("التبني")}}</h6>
                    <h4 class="offset-1">{{$adoption}}</h4>
                </div>
                <i class="fas fa-cat my-auto" style="font-size: 40px"></i>
            </div>
            </a>
        </div>

        </div>
        <div class="row justify-content-center">

        <div class="admin-cards-3 card shadow col-8 col-sm-5 col-md-5 col-lg-3 col-xl-3 mx-3 my-2">
            <a href="{{route('admin.rescue')}}">
            <div class="card-body d-flex">
                <div class="col">
                    <h6 class="">{{__("الإنقاذ")}}</h6>
                    <h4 class="offset-1">{{$rescue}}</h4>
                </div>
                <i class="fas fa-first-aid my-auto" style="font-size: 40px"></i>
            </div>
            </a>
        </div>

        <div class="admin-cards-4 card shadow col-8 col-sm-5 col-md-5 col-lg-3 col-xl-3 mx-3 my-2">
            <a href="{{route('admin.lost')}}">
            <div class="card-body d-flex">
                <div class="col">
                    <h6 class="">{{__("القطط المفقودة")}}</h6>
                    <h4 class="offset-1">{{$lost}}</h4>
                </div>
                <i class="fas fa-paw my-auto" style="font-size: 40px"></i>
            </div>
            </a>
        </div>

        </div>
            <div class="row justify-content-center">

        @if(\App\Http\Controllers\HelperController::isSuperAdmin())
        <div class="admin-cards-5 card shadow col-8 col-sm-5 col-md-5 col-lg-3 col-xl-3 mx-3 my-2">
            <a href="{{route('admin.admins')}}">
                <div class="card-body d-flex">
                    <div class="col">
                        <h6 class="">{{__("المشرفين")}}</h6>
                        <h4 class="offset-1">{{$admins}}</h4>
                    </div>
                    <i class="fas fa-cogs my-auto" style="font-size: 40px"></i>
                </div>
            </a>
        </div>
        @endif
        @if(\App\Http\Controllers\HelperController::isSuperAdmin())
            <div class="admin-cards-6 card shadow col-8 col-sm-5 col-md-5 col-lg-3 col-xl-3 mx-3 my-2">
                <a href="{{route('admin.reports')}}">
                    <div class="card-body d-flex">
                        <div class="col">
                            <h6 class="">{{__("التواصل والبلاغات")}}</h6>
                            <h4 class="offset-1">{{$reports}}</h4>
                        </div>
                        <i class="fas fa-flag my-auto" style="font-size: 40px"></i>
                    </div>
                </a>
            </div>
        @endif
        </div>


    </div>
    </div>
@endsection

@section('content')
   @include('_helper.admin.admin_search')
@endsection
