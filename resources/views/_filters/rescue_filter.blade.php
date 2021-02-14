<div class="text-center mx-4 my-4">

    @include('_helper/_city_select')

    <select class="btn btn-outline-light my-2 d-block" style="width:165px;" name="type" id="type" >
        <option value="" disabled  selected hidden>{{__("فئة الحيوان")}}</option>
        <option value="القطط">{{__("القطط")}}</option>
        <option value="الكلاب">{{__("الكلاب")}}</option>
        <option value="الطيور">{{__("الطيور")}}</option>
        <option value="">{{__("غير محدد")}}</option>
    </select>

    <select class="btn btn-outline-light my-2 d-block" style="width:165px;" name="need_degree" id="need_degree">
        <option value="" disabled selected hidden>{{__("درجة الاحتياج")}}</option>
        <option value="25">{{__("عادية")}}</option>
        <option value="50">{{__("حرجة")}}</option>
        <option value="75">{{__("حرجة جداً")}}</option>
        <option value="100">{{__("طارئة")}}</option>
        <option value="">{{__("غير محدد")}}</option>
    </select>

</div>
