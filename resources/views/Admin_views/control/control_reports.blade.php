@extends('Admin_views.admin_app')
@section('title', __("التحكم بطلبات التبني"))
@section('content')
    <div class="row justify-content-center my-4">
        <div class="card card-all mx-2 my-2 col-10 col-sm-10 col-md-4 col-lg-3 col-xl-3">
            <div class="card-body text-center text-info">
                <h1>{{$records->count()}}</h1>
            <div class="my-2"><label>{{__("إجمالي البلاغات")}}</label></div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @include('_helper.admin._table_of_reports')
    </div>
@endsection
