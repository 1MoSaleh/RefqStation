@extends('Admin_views.admin_app')
@section('title', __("التحكم بالمستخدمين"))
@section('content')
<div class="row justify-content-center">
  <div class="card card-all mx-2 my-2 col-10 col-sm-10 col-md-4 col-lg-3 col-xl-3">
    <div class="card-body text-center mx-auto   thirdColor">
        <h1>{{$num_blocked + $num_unblocked}}</h1>
        <div class="my-2"><label>{{__("إجمالي المستخدمين")}}</label></div>
    </div>
  </div>

    <div class="card card-unblocked mx-2 my-2 col-10 col-sm-10 col-md-4 col-lg-3 col-xl-3">
    <div class="card-body text-center text-info">
        <h1>{{$num_unblocked}}</h1>
        <div class="my-2"><label>{{_("المستخدمين الغير محظورين")}}</label></div>
    </div>
    </div>

    <div class="card card-blocked mx-2 my-2 col-10 col-sm-10 col-md-4 col-lg-3 col-xl-3">
    <div class="card-body text-center text-danger">
        <h1>{{$num_blocked}}</h1>
        <div class="my-2"><label>{{__("المستخدمين المحظورين")}}</label></div>
    </div>
    </div>

</div>
        <div class="text-center my-3">
            <form action="{{route('admin.user')}}" method="get">
                @csrf
                @method('get')
                <div class="d-inline-flex col-12 col-sm-10 col-md-7 col-lg-6 col-xl-6">
                    <div class="input-group">
                        <input type="text" name="data" class="form-control my-2" placeholder="{{__("ادخل معلومات وسيلة البحث")}}">
                        <span class="input-group-btn">
                    <button type="submit" class="btn btn-outline-light mar-btn">{{__("ابحث!")}}</button>
                </span>
                    </div>
                </div>
            </form>
        </div>
    <div class="row justify-content-center">
            @include('_helper.admin._table_of_users')
    </div>
@endsection
