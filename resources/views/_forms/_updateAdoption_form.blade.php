<div class="col-12 col-sm-9 col-md-9 col-lg-8 col-xl-7 mx-auto">
<h4 class="mb-4 mt-2 px-2 main-heading">{{__("تحديث طلب حيوان للتبني")}}</h4>
    <input type="number" name="id" value="{{$update[0]->id}}" hidden>

    <div class="type form-group">
        <label for="type">{{__("فئة الحيوان")}}</label> <br>
        <select class="form-control" name="type" id="type" required>
            <option value="{{__($update[0]->pet->type)}}"  hidden>{{__($update[0]->pet->type)}}</option>
            <option value="القطط">{{__("القطط")}}</option>
            <option value="الكلاب">{{__("الكلاب")}}</option>
            <option value="الطيور">{{__("الطيور")}}</option>
            <option value="غير محدد">{{__("غير ذلك")}}</option>
        </select>
    </div>

    <div class="age form-group">
        <label for="cat-age">{{__("الفئة العمرية للحيوان")}}</label> <br>
        <select class="form-control" name="age" id="cat-age">
            <option value="{{$update[0]->pet->age}}" selected hidden>{{__($update[0]->pet->age)}}</option>
            <option value="أصغر من 3 شهور">{{__("أصغر من 3 شهور")}}</option>
            <option value="3-6 شهور">{{__("3-6 شهور")}}</option>
            <option value="7 شهور - سنة">{{__("7 شهور - سنة")}}</option>
            <option value="سنة - سنتين">{{__("سنة - سنتين")}}</option>
            <option value="أكبر من سنتين">{{__("أكبر من سنتين")}}</option>

        </select>
    </div>

    <div class="gender form-group">
        @if($update[0]->pet->gender == 'ذكر')
            <input type="radio" name="gender" value="ذكر" id="s1" checked required> <label for="s1" >{{__("ذكر")}}</label>
            <div class="options  mx-4" style="display:inline"> <input type="radio" name="gender" value="انثى" id="s2"> <label for="s2">{{__("انثى")}}</label> </div>
            <input type="radio" name="gender" value="غير محدد" id ="s3"> <label for="s3">{{__("لا أعلم")}}</label>
        @elseif($update[0]->pet->gender == 'ذكر')
            <input type="radio" name="gender" value="ذكر" id="s1"  required> <label for="s1" >{{__("ذكر")}}</label>
            <div class="options  mx-4" style="display:inline"> <input type="radio" name="gender" value="انثى" id="s2" checked> <label for="s2">{{__("انثى")}}</label> </div>
            <input type="radio" name="gender" value="غير محدد" id ="s3"> <label for="s3">{{__("لا أعلم")}}</label>
        @else
            <input type="radio" name="gender" value="ذكر" id="s1"  required> <label for="s1" >{{__("ذكر")}}</label>
            <div class="options  mx-4" style="display:inline"> <input type="radio" name="gender" value="انثى" id="s2"> <label for="s2">{{__("انثى")}}</label> </div>
            <input type="radio" name="gender" value="غير محدد" id ="s3" checked> <label for="s3">{{__("لا أعلم")}}</label>
        @endif
    </div>

    <div class="castration form-group">
        <label for="castration">{{__("هل تم تعقيم الحيوان ؟")}}</label> <br>
        @if($update[0]->pet->castration == 'نعم')
            <input type="radio" name="castration" value="نعم" id ="c1" checked required> <label for="c1">{{__("نعم")}}</label>
            <div class="options  mx-4" style="display:inline">  <input type="radio" name="castration" value="لا" id ="c2"> <label for="c2">{{__("لا")}}</label> </div>
            <input type="radio" name="castration" value="غير محدد" id ="c3"> <label for="c3">{{__("لا أعلم")}}</label>
        @elseif($update[0]->pet->castration == 'لا')
            <input type="radio" name="castration" value="نعم" id ="c1" required> <label for="c1">{{__("نعم")}}</label>
            <div class="options  mx-4" style="display:inline">  <input type="radio" name="castration" value="لا" id ="c2" checked> <label for="c2">{{__("لا")}}</label> </div>
            <input type="radio" name="castration" value="غير محدد" id ="c3"> <label for="c3">{{__("لا أعلم")}}</label>
        @else
            <input type="radio" name="castration" value="نعم" id ="c1" required> <label for="c1">{{__("نعم")}}</label>
            <div class="options  mx-4" style="display:inline">  <input type="radio" name="castration" value="لا" id ="c2"> <label for="c2">{{__("لا")}}</label> </div>
            <input type="radio" name="castration" value="غير محدد" id ="c3" checked> <label for="c3">{{__("لا أعلم")}}</label>
        @endif
           </div>

    <div class="vaccinated form-group">
        <label for="vaccinated">{{__("هل تطعيمات الحيوان كاملة ؟")}}</label> <br>
        @if($update[0]->pet->vaccinated == 'نعم')
            <input type="radio" name="vaccinated" value="نعم" id ="v1" checked required> <label for="v1">{{__("نعم")}}</label>
            <div class="options form-group mx-4" style="display:inline"> <input type="radio" name="vaccinated" value="لا" id ="v2"> <label for="v2">{{__("لا")}}</label> </div>
            <input type="radio" name="vaccinated" value="غير محدد" id ="v3"> <label for="v3">{{__("لا أعلم")}}</label>
           @elseif($update[0]->pet->vaccinated == 'لا')
            <input type="radio" name="vaccinated" value="نعم" id ="v1" required> <label for="v1">{{__("نعم")}}</label>
            <div class="options form-group mx-4" style="display:inline"> <input type="radio" name="vaccinated" value="لا" id ="v2" checked> <label for="v2">{{__("لا")}}</label> </div>
            <input type="radio" name="vaccinated" value="غير محدد" id ="v3"> <label for="v3">{{__("لا أعلم")}}</label>
           @else
            <input type="radio" name="vaccinated" value="نعم" id ="v1" required> <label for="v1">{{__("نعم")}}</label>
            <div class="options form-group mx-4" style="display:inline"> <input type="radio" name="vaccinated" value="لا" id ="v2"> <label for="v2">{{__("لا")}}</label> </div>
            <input type="radio" name="vaccinated" value="غير محدد" id ="v3" checked> <label for="v3">{{__("لا أعلم")}}</label>
           @endif

    </div>
    <div class="litterbox form-group">
        <label for="litterbox">{{__("هل الحيوان مدرب على اللتر بوكس ؟")}}</label> <br>
        @if($update[0]->pet->litterbox == 'نعم')
            <input type="radio" name="litterBox" value="نعم" id ="lb1" checked required> <label for="lb1">{{__("نعم")}}</label>
            <div class="options form-group mx-4" style="display:inline"> <input type="radio" name="litterBox" value="لا" id =lb2> <label for="lb2">{{__("لا")}}</label> </div>
            <input type="radio" name="litterBox" value="غير محدد" id ="lb3"> <label for="lb3">{{__("لا أعلم")}}</label>
        @elseif($update[0]->pet->litterbox == 'لا')
            <input type="radio" name="litterBox" value="نعم" id ="lb1" required> <label for="lb1">{{__("نعم")}}</label>
            <div class="options form-group mx-4" style="display:inline"> <input type="radio" name="litterBox" value="لا" id =lb2 checked> <label for="lb2">{{__("لا")}}</label> </div>
            <input type="radio" name="litterBox" value="غير محدد" id ="lb3"> <label for="lb3">{{__("لا أعلم")}}</label>
        @else
            <input type="radio" name="litterBox" value="نعم" id ="lb1" required> <label for="lb1">{{__("نعم")}}</label>
            <div class="options form-group mx-4" style="display:inline"> <input type="radio" name="litterBox" value="لا" id =lb2> <label for="lb2">{{__("لا")}}</label> </div>
            <input type="radio" name="litterBox" value="غير محدد" id ="lb3" checked> <label for="lb3">{{__("لا أعلم")}}</label>
        @endif
         </div>

    <div class="pet-details">
        <div class="form-group">
            <label for="pet-name">{{__("اسم الحيوان")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small>  <br>
            <input type="text" name="name" value="{{$update[0]->pet->name}}" id="cat-name" class="form-control" maxlength="255">
        </div>


        <div class="form-group">
            <label for="pet-behavior">{{__("سلوك الحيوان")}}</label> <br>
            <input type="text" name="behavior" value="{{$update[0]->pet->behavior}}" id="pet-behavior" class="form-control" maxlength="255" required>
        </div>
        <div class="form-group">
            <label for="pet-health">{{__("الحالة الصحية للحيوان")}}</label> <br>
            <input type="text" name="healthStatues" value="{{$update[0]->pet->healthStatues}}" id="pet-health" class="form-control" maxlength="255" required>
        </div>

        <div class="form-group">
            <label for="pet-reason">{{__(" سبب عرض الحيوان للتبني")}}</label> <br>
            <input type="text" name="reason" value="{{$update[0]->pet->reason}}" id="pet-reason" class="form-control" maxlength="255" required>
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
                    <img src="{{$item->src2}}" alt='' style='height:65px; width:65px;' class='rounded mx-2 mt-2'/>"
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

        <div class="form-group">
            <label for="family">{{__("فصيلة الحيوان")}}</label> <small class=" text-muted mx-2" >{{__(" اختياري")}}</small>  <br>
            <input type="text" name="family" value="{{$update[0]->pet->family}}" id="family" class="form-control" maxlength="255">
        </div>

        <div class="form-group">
            <label for="details">{{__("تفاصيل إضافية")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small>  <br>
            <textarea name="details" id="details" rows="8" cols="80" maxlength="500" class="form-control" style="height:50px">{{$update[0]->details}}</textarea>
        </div>
        <div class="form-group">
            <label for="conditions">{{__("الشروط")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small>  <br>
            <textarea name="conditions" id="conditions" rows="8" cols="80" maxlength="500" class="form-control" style="height:50px">{{$update[0]->conditions}}</textarea>
        </div>


    </div>

</div>
