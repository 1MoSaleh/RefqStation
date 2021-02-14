@php

@endphp
@extends('layouts/app')

@section('content')
   <div class="row col-10 col-sm-10 col-md-8 col-lg-7 col-xl-7 mx-auto">
    @if($layout == 'adoption')
        <a href="{{route('adoption.create')}}" class="btn btn-block btn-outline-light"> {{__("اعرض حيوان للتبني")}} </a>
        @isset($filtered)
            <a href="{{route('adoption.index')}}" class="btn btn-block btn-outline-light"> {{__("إلغاء عوامل التصفية")}} </a>
        @endisset
    @elseif($layout == 'lost')
        <a href="{{route('lost.create')}}" class="btn btn-block btn-outline-light"> {{__("ابلغ عن حيوان مفقود")}} </a>
        @isset($filtered)
            <a href="{{route('lost.index')}}" class="btn btn-block btn-outline-light"> {{__("إلغاء عوامل التصفية")}} </a>
        @endisset
    @elseif($layout == 'rescue')
        <a href="{{route('rescue.create')}}" class="btn btn-block btn-outline-light"> {{__("اعرض حيوان للإنقاذ")}} </a>
        @isset($filtered)
            <a href="{{route('rescue.index')}}" class="btn btn-block btn-outline-light"> {{__("إلغاء عوامل التصفية")}} </a>
        @endisset
    @endif
    @if(!isset($filtered))
    @include('_filters/filters_modal')
    @endif
   </div>
@endsection
@section('cards')
    <div class="container-fluid py-4">

    <div class="row justify-content-center ">
        @if($layout == 'adoption')
            @section('title' , __("التبني"))
            @if($adoption->isempty())
                <h5>{{__("عذراً لايوجد محتوى مطابق لبحثك")}}</h5>
            @else
    @foreach($adoption as $card)
            @include('_card._adoptionCard')
            @endforeach
            @endif
    </div>
    <div class="row justify-content-center">
        {{ $adoption->appends(request()->input())->links()}}
    </div>
        @elseif($layout == 'lost')
                @section('title' , __("الحيوانات المفقودة"))
        @if($lost->isempty())
            <h5>{{__("عذراً لايوجد محتوى مطابق لبحثك")}}</h5>
        @else
            @foreach($lost as $card)
                @include('_card/_lostCard')
            @endforeach
        @endif
        </div>
    <div class="row justify-content-center">
        {{$lost->appends(request()->input())->links()}}
    </div>
        @elseif($layout == 'rescue')
                @section('title' , __("الإنقاذ"))
            @if($rescue->isempty())
                <h5>{{__("عذراً لايوجد محتوى مطابق لبحثك")}}</h5>
            @else
        @foreach($rescue as $card)
                @include('_card/_rescueCard')
            @endforeach
            @endif
        </div>
    <div class="row justify-content-center">
        {{$rescue->appends(request()->input())->links()}}
    </div>
        @endif
    </div>
</div>
@endsection
