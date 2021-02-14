<div class="col-12 col-sm-9 col-md-9 col-lg-8 col-xl-7 mx-auto">

<h4 class="mb-4 mt-2 px-2 main-heading" >{{__("طلب إنقاذ")}}</h4>
<input type="number" name="id" value="{{$update[0]->id}}" hidden>

<div class="form-group">
    <label for="need_degree">{{__("درجة الحاجة للإنقاذ")}}</label> <br>
    <select class="form-control" name="need_degree" id="need_degree">
        <option value="{{$update[0]->need_degree}}" selected hidden>{{__(\App\Http\Controllers\HelperController::get_text_need_degree($update[0]->need_degree))}}</option>
        <option value="25">عادية</option>
        <option value="50">حرجة</option>
        <option value="75">حرجة جداً</option>
        <option value="100">طارئة</option>
    </select>
</div>

    <div class="type form-group">
        <label for="type">{{__("فئة الحيوان")}}</label> <br>
        <select class="form-control" name="type" id="type" required>
            <option value="{{__($update[0]->type)}}"  hidden>{{__($update[0]->type)}}</option>
            <option value="القطط">{{__("القطط")}}</option>
            <option value="الكلاب">{{__("الكلاب")}}</option>
            <option value="الطيور">{{__("الطيور")}}</option>
            <option value="غير محدد">{{__("غير ذلك")}}</option>
        </select>
    </div>

    <div class="violent form-group">
       @if($update[0]->violent == 'نعم')
        <label for="violent">{{__("هل الحيوان عنيف ؟")}}</label> <br>
        <input type="radio" name="violent" value="نعم" id="v1" required checked> <label for="v1" >{{__("نعم")}}</label>
        <div class="options  mx-4" style="display:inline"> <input type="radio" name="violent" value="لا" id="v2"> <label for="v2">{{__("لا")}}</label> </div>
        <input type="radio" name="violent" value="غير محدد" id ="v3"> <label for="v3">{{__("لا أعلم")}}</label>
    @elseif($update[0]->violent == 'لا')
        <label for="violent">{{__("هل الحيوان عنيف ؟")}}</label> <br>
        <input type="radio" name="violent" value="نعم" id="v1" required> <label for="v1" >{{__("نعم")}}</label>
        <div class="options  mx-4" style="display:inline"> <input type="radio" name="violent" value="لا" id="v2" checked> <label for="v2">{{__("لا")}}</label> </div>
        <input type="radio" name="violent" value="غير محدد" id ="v3"> <label for="v3">{{__("لا أعلم")}}</label>
        @else
        <label for="violent">{{__("هل الحيوان عنيف ؟")}}</label> <br>
        <input type="radio" name="violent" value="نعم" id="v1" required> <label for="v1" >{{__("نعم")}}</label>
        <div class="options  mx-4" style="display:inline"> <input type="radio" name="violent" value="لا" id="v2"> <label for="v2">{{__("لا")}}</label> </div>
        <input type="radio" name="violent" value="غير محدد" id ="v3" checked> <label for="v3">{{__("لا أعلم")}}</label>
        @endif
    </div>


<div class="form-group">
    <label for="cat-health">{{__("الحالة الصحية للحيوان")}}</label> <br>
    <input type="text" name="healthStatues" value="{{$update[0]->healthStatues}}" id="cat-health" class="form-control" maxlength="255" required>
</div>
<div class="form-group">
    <label for="details">{{__("تفاصيل الحالة")}}</label>
    <textarea name="details" id="details" rows="8" cols="80"  class="form-control" maxlength="550" style="height:50px">{{$update[0]->details}}</textarea>
</div>

    <label for="customFile">{{__("صورة الحيوان")}}</label> <small class=" text-muted mx-2" >{{__("يمكنك اختيار 5 صور كحد أقصى")}}</small> <br>
    <div class="custom-file mb-4">
        <input type="file" class="custom-file-input" name="images[]" id="customFile1" onchange="updateList()" accept="image/jpg, image/jpeg , image/png" multiple >
        <label class="custom-file-label" for="customFile">{{__("اختر الملف")}}</label>
        <small class=" text-danger mx-2" >{{__("سوف يتم حذف الصور السابقة في حالة تم اختيار صور جديدة!")}}</small>
    </div>
    <div id="fileList" class="text-center mb-3">
        <h6>{{__("الصور التي تم اختيارها:")}}</h6>
        @foreach($update[0]->media as $item)
            @if($item->type != 'video')
                <img src="{{$item->src2}}" alt='' style='height:65px; width:65px;' class='rounded mx-2 mt-2'/>
            @endif
        @endforeach
    </div>

    <label for="customFile">{{__("فيديو للحيوان")}}</label><small class=" text-muted mx-2" >{{__("اختياري")}}</small> <small class=" text-muted mx-2" >{{__("الحجم الأقصى 30mb")}}</small> <br>
    <div class="custom-file mb-4">
        <input type="file" class="custom-file-input" name="video" id="customFile2" onchange="updateVideoList()" accept="video/*" >
        <label class="custom-file-label" for="customFile">Choose file</label>
        <small class=" text-danger mx-2" >{{__("سوف يتم حذف الفيديو السابق في حالة تم اختيار فيديو جديد!")}}</small>
    </div>
    <div class="text-center mb-3">
        @foreach($update[0]->media as $item)
            @if($item->type == 'video')
                    <h6>{{__("الفيديو الذي تم اختياره:")}}</h6>
                    <div>
                    <video src="{{$item->src1}}" height="250" width="275" class="video-preview" id="video2" controls="controls"/>
                </div>
                @endif
        @endforeach

        <div id="videoList">
            <video height="250" width="275" class="video-preview" id="video" style="display: none" controls="controls"/>
        </div>
    </div>

    @include('_helper.maps.update_maps')
</div>
