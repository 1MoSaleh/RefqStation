<div class="col-12 col-sm-9 col-md-9 col-lg-8 col-xl-7 mx-auto">
<h4 class="mb-4 mt-2 px-2 main-heading">{{__("عرض حيوان للتبني")}}</h4>

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

    <div class="gender form-group">
        <label for="gender">{{__("الجنس")}}</label> <br>
        <input type="radio" name="gender" value="ذكر" id="s1" required> <label for="s1" >{{__("ذكر")}}</label>
        <div class="options  mx-4" style="display:inline"> <input type="radio" name="gender" value="انثى" id="s2"> <label for="s2">{{__("انثى")}}</label> </div>
        <input type="radio" name="gender" value="غير محدد" id ="s3"> <label for="s3">{{__("لا أعلم")}}</label>
    </div>

    <div class="castration form-group">
        <label for="castration">{{__("هل تم تعقيم الحيوان ؟")}}</label> <br>
        <input type="radio" name="castration" value="نعم" id ="c1" required> <label for="c1">{{__("نعم")}}</label>
        <div class="options  mx-4" style="display:inline">  <input type="radio" name="castration" value="لا" id ="c2"> <label for="c2">{{__("لا")}}</label> </div>
        <input type="radio" name="castration" value="غير محدد" id ="c3"> <label for="c3">{{__("لا أعلم")}}</label>
    </div>

    <div class="vaccinated form-group">
        <label for="vaccinated">{{__("هل تطعيمات الحيوان كاملة ؟")}}</label> <br>
        <input type="radio" name="vaccinated" value="نعم" id ="v1" required> <label for="v1">{{__("نعم")}}</label>
        <div class="options form-group mx-4" style="display:inline"> <input type="radio" name="vaccinated" value="لا" id ="v2"> <label for="v2">{{__("لا")}}</label> </div>
        <input type="radio" name="vaccinated" value="غير محدد" id ="v3"> <label for="v3">{{__("لا أعلم")}}</label>

    </div>
    <div class="litterbox form-group">
        <label for="litterbox">{{__("هل الحيوان مدرب على اللتر بوكس ؟")}}</label> <br>
        <input type="radio" name="litterBox" value="نعم" id ="lb1" required> <label for="lb1">{{__("نعم")}}</label>
        <div class="options form-group mx-4" style="display:inline"> <input type="radio" name="litterBox" value="لا" id =lb2> <label for="lb2">{{__("لا")}}</label> </div>
        <input type="radio" name="litterBox" value="غير محدد" id =lb3> <label for="lb3">{{__("لا أعلم")}}</label>
    </div>

    <div class="cat-details">
        <div class="form-group">
            <label for="cat-name">{{__("اسم الحيوان")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small>  <br>
            <input type="text" name="name" value="" id="cat-name" class="form-control" maxlength="255">
        </div>

        <div class="form-group">
            <label for="cat-behavior">{{__("سلوك الحيوان")}}</label> <br>
            <input type="text" name="behavior" value="" id="cat-behavior" class="form-control" maxlength="255" required>
        </div>
        <div class="form-group">
            <label for="cat-health">{{__("الحالة الصحية للحيوان")}}</label> <br>
            <input type="text" name="healthStatues" value="" id="cat-health" class="form-control" maxlength="255" required>
        </div>

        <div class="form-group">
            <label for="cat-reason">{{__(" سبب عرض الحيوان للتبني")}}</label> <br>
            <input type="text" name="reason" value="" id="cat-reason" class="form-control" maxlength="255" required>
        </div>
        <label for="customFile">{{__("صورة الحيوان")}}</label> <small class=" text-muted mx-2" >{{__("يمكنك اختيار 5 صور كحد أقصى")}}</small> <br>
        <div class="custom-file mb-4">
            <input type="file" class="custom-file-input" name="images[]" id="customFile1" onchange="updateList()" accept="image/jpg, image/jpeg , image/png" multiple required>
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


        <div class="form-group">
            <label for="family">{{__("فصيلة الحيوان")}}</label> <small class=" text-muted mx-2" >{{__(" اختياري")}}</small>  <br>
            <input type="text" name="family" value="" id="family" class="form-control" maxlength="255">
        </div>

        <div class="form-group">
            <label for="details">{{__("تفاصيل إضافية")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small>  <br>
            <textarea name="details" id="details" rows="8" cols="80" maxlength="500" class="form-control" style="height:50px"></textarea>
        </div>
        <div class="form-group">
            <label for="conditions">{{__("الشروط")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small>  <br>
            <textarea name="conditions" id="conditions" rows="8" cols="80" maxlength="500" class="form-control" style="height:50px"></textarea>
        </div>


    </div>

</div>
