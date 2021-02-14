@extends('layouts/app')
@section('content')
    @if($layout == 'adoption')
@section('title' , __("إنشاء طلب تبني"))
<form action="{{route('adoption.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            @include('_forms._createAdoption_form')
            @include('_forms._contactAdoption_form')

            <button type="submit" class="btn btn-outline-light offset-3">{{__("انشاء طلب التبني")}}</button>
        </form>
        @include('_forms._contactAdoptionTypes')

    @elseif($layout == 'rescue')
        @section('title' , __("إنشاء طلب انقاذ"))

<form action="{{route('rescue.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            @include('_forms/_createRescue_form')
            @include('_forms/_contact_form')

    <button type="submit" class="btn btn-outline-light offset-3">{{__("انشاء طلب الانقاذ")}}</button>
        </form>
    @elseif($layout == 'lost')
        @section('title' , __("إبلاغ عن حيوان مفقود"))

<form action="{{route('lost.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            @include('_forms/_createLost_form')
            @include('_forms/_contact_form')
   <button type="submit" class="btn btn-outline-light offset-3">{{__("انشاء بلاغ الفقدان")}}</button>
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
        console.log(input.files.item(0).type)
        if (isVideo(input.files.item(0).type)){
            var temp_src=window.URL.createObjectURL(input.files.item(0))
            document.getElementById('video').src = temp_src;
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
