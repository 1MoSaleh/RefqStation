<div class="col-12 col-sm-9 col-md-9 col-lg-8 col-xl-7 mx-auto">
<h4 class="mb-4 mt-2 px-2 main-heading">{{__("طلب إنقاذ")}}</h4>

<div class="form-group">
    <label for="need_degree">{{__("درجة الحاجة للإنقاذ")}}</label> <br>
    <select class="form-control" name="need_degree" id="need_degree" required>
        <option value=""  hidden>{{__("اختر درجة الحاجة للإنقاذ")}}</option>
        <option value="25">عادية</option>
        <option value="50">حرجة</option>
        <option value="75">حرجة جداً</option>
        <option value="100">طارئة</option>
    </select>
</div>

    <div class="type form-group">
        <label for="type">{{__("فئة الحيوان")}}</label> <br>
        <select class="form-control" name="type" id="type" required>
            <option value=""  hidden>{{__("اختر فئة الحيوان")}}</option>
            <option value="القطط">{{__("القطط")}}</option>
            <option value="الكلاب">{{__("الكلاب")}}</option>
            <option value="الطيور">{{__("الطيور")}}</option>
            <option value="غير محدد">{{__("غير ذلك")}}</option>
        </select>
    </div>

    <div class="violent form-group">
        <label for="violent">{{__("هل الحيوان عنيف ؟")}}</label> <br>
        <input type="radio" name="violent" value="نعم" id="v1" required> <label for="v1" >{{__("نعم")}}</label>
        <div class="options  mx-4" style="display:inline"> <input type="radio" name="violent" value="لا" id="v2"> <label for="v2">{{__("لا")}}</label> </div>
        <input type="radio" name="violent" value="غير محدد" id ="v3"> <label for="v3">{{__("لا أعلم")}}</label>
    </div>

<div class="form-group">
    <label for="cat-health">{{__("الحالة الصحية للحيوان")}}</label> <br>
    <input type="text" name="healthStatues" value="" id="cat-health" class="form-control" maxlength="255" required>
</div>
<div class="form-group">
    <label for="details">{{__("تفاصيل الحالة")}}</label>
    <textarea name="details" id="details" rows="8" cols="80"  class="form-control" maxlength="550" style="height:50px"></textarea>
</div>

<label for="customFile">{{__("صورة الحيوان")}}</label> <small class=" text-muted mx-2" >{{__("يمكنك اختيار 5 صور كحد أقصى")}}</small> <br>
<div class="custom-file mb-4">
    <input type="file" class="custom-file-input" name="images[]" id="customFile1" onchange="updateList()" accept="image/jpg, image/jpeg , image/png" multiple required>
    <label class="custom-file-label" for="customFile">Choose file</label>
</div>
<div id="fileList" class="text-center mb-3"></div>


<label for="customFile">{{__("فيديو للحيوان")}}</label><small class=" text-muted mx-2" >{{__("اختياري")}}</small> <small class=" text-muted mx-2" >{{__("الحجم الأقصى 30mb")}}</small> <br>
<div class="custom-file mb-4">
    <input type="file" class="custom-file-input" name="video" id="customFile2" onchange="updateVideoList()" accept="video/*" >
    <label class="custom-file-label" for="customFile">Choose file</label>
</div>
    <div id="videoList" style="display: none;" class="text-center mb-3">
        <h6>{{__("الفيديو الذي تم اختياره:")}}</h6>
        <video height="250" width="275" class="video-preview" id="video" controls="controls"/>
    </div>

    @include('_helper.maps.form_maps')

</div>
