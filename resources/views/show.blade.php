@extends('layouts/app')
@section('content')
    @if($layout == 'adoption')
@section('title' , __("عرض معلومات التبني"))
@elseif($layout == 'rescue')
    @section('title' , __("عرض معلومات الإنقاذ"))
@elseif($layout == 'lost')
    @section('title' , __("عرض معلومات الحيوان المفقود"))
@endif
@include('_helper/show/image_list')
@include('_helper/show/tab_list')
@include('_helper/social_media/shareSM')
@endsection
