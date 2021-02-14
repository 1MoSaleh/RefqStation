<div class="text-left my-3 mx-3">

    @include('_helper/_city_select')

        <select class="btn btn-outline-light my-2 d-block" style="width:165px;" name="type" id="type" >
            <option value="" disabled  selected hidden>{{__("فئة الحيوان")}}</option>
            <option value="القطط">{{__("القطط")}}</option>
            <option value="الكلاب">{{__("الكلاب")}}</option>
            <option value="الطيور">{{__("الطيور")}}</option>
            <option value="">{{__("غير محدد")}}</option>
        </select>

    <select class="btn btn-outline-light mr-3 my-2 d-block" style="width:165px;" name="age"  id="cat-age">
        <option value="" disabled  selected hidden>{{__("العمر")}}</option>
        <option value="أصغر من 3 شهور">{{__("أصغر من 3 شهور")}}</option>
        <option value="3-6 شهور">{{__("3-6 شهور")}}</option>
        <option value="7 شهور - سنة">{{__("7 شهور - سنة")}}</option>
        <option value="سنة - سنتين">{{__("سنة - سنتين")}}</option>
        <option value="أكبر من سنتين">{{__("أكبر من سنتين")}}</option>
        <option value="">{{__("غير محدد")}}</option>
    </select>

    <select name="gender" class="btn btn-outline-light mr-3 my-2 d-block" style="width:165px;" id="">
        <option value="" disabled  selected hidden>{{__("الجنس")}}</option>
        <option value="ذكر">{{__("ذكر")}}</option>
        <option value="انثى">{{__("انثى")}}</option>
        <option value="">{{__("غير محدد")}}</option>
    </select>

    <select name="vaccinated" class="btn btn-outline-light mr-3 my-2 d-block" style="width:165px;" id="">
        <option value="" disabled selected hidden>{{__("التطعيمات")}}</option>
        <option value="نعم">{{__("نعم")}}</option>
        <option value="لا">{{__("لا")}}</option>
        <option value="">{{__("غير محدد")}}</option>

    </select>

    <select name="castration" class="btn btn-outline-light mr-3 my-2 d-block" style="width:165px;" id="">
        <option value="" disabled selected hidden>{{__("التعقيم")}}</option>
        <option value="نعم">{{__("نعم")}}</option>
        <option value="لا">{{__("لا")}}</option>
        <option value="">{{__("غير محدد")}}</option>
    </select>

</div>


