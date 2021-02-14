@extends('Admin_views/admin_app')
@section('title', __("التحكم عبر وسيلة التواصل"))
@section('content')
    <!-- we don't need this view now !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
<div class="text-center my-3">
    <h6>{{__("ابحث عن جميع الطلبات والبلاغات المرتبطة بوسيلة تواصل محددة!")}}</h6>
    <form action="{{route('admin.getByContact')}}" method="get">
        @csrf
        @method('get')
        <div class="d-inline-flex col-11 col-sm-10 col-md-4 col-lg-4 col-xl-4">
            <select class="form-control" name="type" id="contact-type-select">
                <option value="user_id">{{__("رقم المستخدم")}}</option>
                <option value="phoneNumber">{{__("رقم الجوال")}}</option>
                <option value="twitter">{{__("تويتر")}}</option>
                <option value="instagram">{{__("انستجرام")}}</option>
            </select>
        </div>
        <div class="d-inline-flex col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6">
            <div class="input-group">
            <input type="text" name="data" class="form-control my-2" placeholder="{{__("ادخل معلومات وسيلة البحث")}}">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-outline-light mar-btn">{{__("ابحث!")}}</button>
                </span>
            </div>
        </div>
    </form>
</div>

@endsection
