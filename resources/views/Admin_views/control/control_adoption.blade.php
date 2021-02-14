@extends('Admin_views.admin_app')
@section('title', __("التحكم بطلبات التبني"))
@section('content')
    <div class="row justify-content-center my-4">

        <div class="card card-all mx-2 my-2 col-10 col-sm-10 col-md-4 col-lg-3 col-xl-3">
            <div class="card-body text-center thirdColor">
          <h1>{{$num_blocked + $num_unblocked}}</h1>
            <div class="my-2"><label>{{__("إجمالي طلبات التبني")}}</label></div>
            </div>
        </div>

            <div class="card card-unblocked mx-2 my-2 col-10 col-sm-10 col-md-4 col-lg-3 col-xl-3">
                <div class="card-body text-center text-info">
                    <h1>{{$num_unblocked}}</h1>
            <div class="my-2"><label>{{_("طلبات التبني  الغير محظورة")}}</label></div>
                </div>
            </div>

            <div class="card card-blocked mx-2 my-2 col-10 col-sm-10 col-md-4 col-lg-3 col-xl-3">
                <div class="card-body text-center text-danger">
                    <h1>{{$num_blocked}}</h1>
            <div class="my-2"><label>{{__("طلبات التبني المحظورة")}}</label></div>
                </div>
             </div>
    </div>
    <div class="row justify-content-center">
            @include('_helper.admin._table_of_records')
    </div>
@endsection
