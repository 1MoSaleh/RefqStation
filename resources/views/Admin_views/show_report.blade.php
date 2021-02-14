@extends('Admin_views/admin_app')
@section('title', __("التحكم عبر وسيلة التواصل"))

@section('content')
    <div class="card text-center mx-auto my-4 col-11 col-sm-11 col-md-8 col-lg-9 col-xl-9" style="border-bottom: 2px solid #00bdaf; height: fit-content; min-width: 200px " >
        <div class="card-body justify-content-center" >
            <div class="report-title my-2" >
            <h5>{{$report->title}}</h5>
                <small>{{__("المرسل: ")}}</small>
                @if(isset($report->sender_id))
                    <a href="{{route('user.show', $report->sender_id)}}"><small>{{$report->sender_id}}</small></a>
                @else
                <small>{{$report->contact}}</small>
                    @endif
                <small class="mx-3">{{__("سبب التواصل")}}</small>
                <small>{{$report->reason}}</small>
            </div>
            <div class="report-content ">
                <hr class="mainBGColor w-75">
                <div class="report-details">
                    <p>{{$report->details}}</p>
                </div>

                    </div>
                </div>
    </div>
@endsection
