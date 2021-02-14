<div class="row justify-content-center my-3">
<div class="card quick-search shadow my-2 col-11 col-sm-9 col-md-8 col-lg-11 col-xl-9">
<div class="card-body mx-auto text-center my-3">
    <form action="{{route('search')}}" method="get">
        @csrf
        @method('get')
        <div>
            <h3 class="thirdColor my-2 d-inline-block mx-1">{{__("البحث السريع")}} </h3> <i class="fas fa-search thirdColor"></i>
        </div>

        <select class="btn btn-outline-light my-2 mx-2 d-block d-sm-block d-md-block d-lg-inline d-xl-inline" style="width:165px;" name="section" id="section" required>
            <option value="" disabled  selected hidden>{{__("القسم")}}</option>
            <option value="التبني">{{__("التبني")}}</option>
            <option value="الإنقاذ">{{__("الإنقاذ")}}</option>
            <option value="الحيوانات المفقودة">{{__("الحيوانات المفقودة")}}</option>
        </select>

        <select class="btn btn-outline-light my-2 mx-2 d-block d-sm-block d-md-block d-lg-inline d-xl-inline" style="width:165px;" name="city" id="city-select" >
            <option value="" disabled selected hidden>{{__("المدينة")}}</option>
            <option value="الرياض">{{__("الرياض")}}</option>
            <option value="جدة">{{__("جدة")}}</option>
            <option value="ابها">{{__("ابها")}}</option>
            <option value="الاحساء">{{__("الاحساء")}}</option>
            <option value="الباحة">{{__("الباحة")}}</option>
            <option value="بريدة">{{__("بريدة")}}</option>
            <option value="بيشة">{{__("بيشة")}}</option>
            <option value="تبوك">{{__("تبوك")}}</option>
            <option value="جازان">{{__("جازان")}}</option>
            <option value="الجبيل">{{__("الجبيل")}}</option>
            <option value="حائل">{{__("حائل")}}</option>
            <option value="حفر الباطن">{{__("حفر الباطن")}}</option>
            <option value="الخبر">{{__("الخبر")}}</option>
            <option value="الخرج">{{__("الخرج")}}</option>
            <option value="الخفجي">{{__("الخفجي")}}</option>
            <option value="الدمام">{{__("الدمام")}}</option>
            <option value="الدوادمي">{{__("الدوادمي")}}</option>
            <option value="الرس">{{__("الرس")}}</option>
            <option value="الزلفي">{{__("الزلفي")}}</option>
            <option value="سدير">{{__("سدير")}}</option>
            <option value="سكاكا">{{__("سكاكا")}}</option>
            <option value="شقراء">{{__("شقراء")}}</option>
            <option value="الطائف">{{__("الطائف")}}</option>
            <option value="عرعر">{{__("عرعر")}}</option>
            <option value="عنيزة">{{__("عنيزة")}}</option>
            <option value="القطيف">{{__("القطيف")}}</option>
            <option value="القنفذة">{{__("القنفذة")}}</option>
            <option value="المجمعة">{{__("المجمعة")}}</option>
            <option value="المدينة المنورة">{{__("المدينة المنورة")}}</option>
            <option value="مكة المكرمة">{{__("مكة المكرمة")}}</option>
            <option value="خميس مشيط">{{__("خميس مشيط")}}</option>
            <option value="نجران">{{__("نجران")}}</option>
            <option value="ينبع">{{__("ينبع")}}</option>
            <option value="">{{__("بدون تحديد")}}</option>
        </select>

        <select class="btn btn-outline-light my-2 mx-2 d-block d-sm-block d-md-block d-lg-inline d-xl-inline" style="width:165px;" name="type" id="type" >
            <option value="" disabled  selected hidden>{{__("فئة الحيوان")}}</option>
            <option value="القطط">{{__("القطط")}}</option>
            <option value="الكلاب">{{__("الكلاب")}}</option>
            <option value="الطيور">{{__("الطيور")}}</option>
            <option value="">{{__("غير محدد")}}</option>
        </select>

                 <button type="submit" class="btn btn-outline-light mx-2 d-block d-sm-block d-md-block d-lg-inline d-xl-inline" style="width:165px;">{{__("ابحث!")}}</button>

    </form>
</div>
</div>
</div>
