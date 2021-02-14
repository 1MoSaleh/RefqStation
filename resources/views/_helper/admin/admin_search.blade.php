<div class="row justify-content-center my-3">
    <div class="card quick-search shadow my-2 col-11 col-sm-9 col-md-8 col-lg-11 col-xl-9">
        <div class="card-body mx-auto text-center my-3">
            <h3 class="thirdColor my-2 d-inline-block mx-1">{{__("البحث السريع")}} </h3> <i class="fas fa-search thirdColor"></i>
            <h6>{{__("ابحث عن جميع الطلبات والبلاغات المرتبطة بوسيلة تواصل محددة!")}}</h6>
            <form action="{{route('admin.getByContact')}}" method="get">
                @csrf
                @method('get')
                <div class="d-inline-flex mx-2 my-2">
                    <select class="form-control" name="type" id="contact-type-select" style="width: 250px">
                        <option value="user_id">{{__("رقم المستخدم")}}</option>
                        <option value="phoneNumber">{{__("رقم الجوال")}}</option>
                        <option value="twitter">{{__("تويتر")}}</option>
                        <option value="instagram">{{__("انستجرام")}}</option>
                    </select>
                </div>
                <div class="d-inline-flex mx-2 my-2">
                    <div class="input-group">
                        <input type="text" name="data" class="form-control my-2" placeholder="{{__("ادخل البيانات")}}" style="min-width: 250px">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-light mx-2 " style="width:125px;">{{__("ابحث!")}}</button>

            </form>
        </div>
    </div>
</div>
