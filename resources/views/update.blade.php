@extends('layouts/app')
@section('content')

    @if($layout == 'adoption')
@section('title' , __("تحديث طلب تبني"))
<form action="{{route('adoption.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("POST")
    @include('_forms._updateAdoption_form')
    @include('_forms._updateContactAdoption')
    <button type="submit" class="btn btn-outline-light offset-3">{{__("تحديث طلب التبني")}}</button>
</form>


@elseif($layout == 'rescue')
    @section('title' , __("تحديث بلاغ إنقاذ"))

<form action="{{route('rescue.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("POST")
    @include('_forms/_updateRescue_form')
    @include('_forms/_updateContact_form')
    <button type="submit" class="btn btn-outline-light offset-3">{{__("تحديث بلاغ الإنقاذ")}}</button>
</form>


@elseif($layout == 'lost')
    @section('title' , __("تحديث بلاغ عن حيوان مفقود"))

<form action="{{route('lost.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("POST")
    @include('_forms/_updateLost_form')
    @include('_forms/_updateContact_form')
    <button type="submit" class="btn btn-outline-light offset-3">{{__("تحديث بلاغ الفقدان")}}</button>
</form>
@elseif($layout == 'user')
    @section('title' , __("تحديث الملف الشخصي"))

<form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("POST")
    @include('_forms/_updateProfile_form')
    <button type="submit" class="btn btn-outline-light offset-3">{{__("تحديث الملف الشخصي")}}</button>
</form>
<form action="{{route('user.updateLoginInfo')}}" method="post">
    @csrf
    @method('put')
@include('_forms/_updateLogin_form')
    <button type="submit" class="btn btn-outline-light offset-3 my-2">{{__("تحديث بيانات الدخول")}}</button>
</form>

@endif


<script>
    function updateList() {
        var max = 5;
        var input = document.getElementById('customFile1');
        var output = document.getElementById('fileList');
        var preview ="الصور التي تم اختيارها : <br>";
        var temp_src='';
        for (var i = 0; i < input.files.length; i++) {
            if(i >= 5){
                alert("تم تحديد صور أكثر من العدد المسموح وسوف يتم تجاهل الصور التي تجاوزت العدد المسموح");
                break;
            }
            temp_src = window.URL.createObjectURL(input.files.item(i))
            preview += "<img src='"+temp_src+"' alt='' style='height:65px; width:65px;' class='rounded mx-2 mt-2'/>"
            //  preview += '<li class="text-muted">' + input.files.item(i).name + '</li>';
        }
        output.innerHTML = '<div>'+preview+'</div>';
    }

    function updateVideoList() {
        var input = document.getElementById('customFile2');
        var output = document.getElementById('videoList');
        if (isVideo(input.files.item(0).type)){
            var temp_src=window.URL.createObjectURL(input.files.item(0))
           if (document.getElementById('video2') != null){
               document.getElementById('video2').style.display = 'none'
           }
            document.getElementById('video').src = temp_src;
            document.getElementById('video').load();
            document.getElementById('video').style.display = 'inline';
            output.style.display = "block";
        }else {
            output.style.display = 'none';
            return alert('يمكنك رفع ملفات الفيديو فقط!')
        }
    }

    function isVideo(filename) {
        switch (filename.toLowerCase()) {
            case 'video/m4v':
            case 'video/avi':
            case 'video/mp4':
            case 'video/mov':
            case 'video/mpg':
            case 'video/mpeg':
                // etc
                return true;
        }
        return false;
    }

</script>
@endsection
