<div class="col-12 col-sm-9 col-md-9 col-lg-8 col-xl-7 mx-auto">
<h4 class="mb-4 mt-2 px-2 main-heading">{{__("بلاغ فقدان")}}</h4>

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

<div class="form-group">
    <label for="dateOfLost">{{__("تاريخ فقدان الحيوان")}}</label> <br>
    <input type="date" name="dateOfLost" value="" id="dateOfLost" class="form-control" required>
</div>

<label for="customFile">{{__("صورة الحيوان")}}</label> <small class=" text-muted mx-2" >{{__("يمكنك اختيار 5 صور كحد أقصى")}}</small> <br>
<div class="custom-file mb-4">
    <input type="file" class="custom-file-input" name="images[]" id="customFile1" onchange="updateList()" accept="image/jpg, image/jpeg , image/png" multiple required/>
    <label class="custom-file-label" for="customFile">{{__("اختر الملف")}}</label>
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

    <div class="gender form-group">
    <label for="gender">{{__("الجنس")}}</label> <br>
    <input type="radio" name="gender" value="ذكر" id="s1" required> <label for="s1" >{{__("ذكر")}}</label>
    <div class="options  mx-4" style="display:inline"> <input type="radio" name="gender" value="انثى" id="s2"> <label for="s2">{{__("انثى")}}</label> </div>
    <input type="radio" name="gender" value="غير محدد" id ="s3"> <label for="s3">{{__("لا أعلم")}}</label>
</div>

<div class="age form-group">
    <label for="cat-age">{{__("الفئة العمرية للحيوان")}}</label> <br>
    <select class="form-control" name="age" id="cat-age" required>
        <option value=""  hidden>{{__("اختر الفئة العمرية")}}</option>
        <option value="أصغر من 3 شهور">{{__("أصغر من 3 شهور")}}</option>
        <option value="3-6 شهور">{{__("3-6 شهور")}}</option>
        <option value="7 شهور - سنة">{{__("7 شهور - سنة")}}</option>
        <option value="سنة - سنتين">{{__("سنة - سنتين")}}</option>
        <option value="أكبر من سنتين">{{__("أكبر من سنتين")}}</option>
    </select>
</div>

<div class="form-group">
    <label for="name">{{__("اسم الحيوان")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small>  <br>
    <input type="text" name="name" value="" id="name" class="form-control" maxlength="255">
</div>

<div class="form-group">
    <label for="catDetails">{{__("تفاصيل عن الحيوان")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small>  <br>
    <textarea name="catDetails" id="catDetails" rows="8" cols="80"  class="form-control" maxlength="500" style="height:50px"></textarea>
</div>

<div class="form-group">
    <label for="details">{{__("تفاصيل إضافية")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small>  <br>
    <textarea name="details" id="details" rows="8" cols="80"  class="form-control" maxlength="500" style="height:50px"></textarea>
</div>
</div>

<script>
    document.getElementById('dateOfLost').valueAsDate = new Date();
</script>


