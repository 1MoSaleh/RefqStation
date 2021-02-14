<div class="col-12 col-sm-9 col-md-9 col-lg-8 col-xl-7 mx-auto">

    <div class="city-info form-group">
        <label for="city-select">{{__("المدينة")}}</label>
        <!-- Todo complete the cities // we will do it later with "Modal" from bootstrap  -->
        <select class="form-control" name="city" id="city-select">
            <option value="{{$update[0]->contact->city}}" selected hidden>{{__($update[0]->contact->city)}}</option>
            <option value="الرياض">{{__("الرياض")}}</option>
            <option value="جدة">{{__("جدة")}}</option>
            <option value="الدمام">{{__("الدمام")}}</option>
            <option value="الاحساء">{{__("الاحساء")}}</option>
            <option value="الجبيل">{{__("الجبيل")}}</option>
            <option value="المدينة المنورة">{{__("المدينة المنورة")}}</option>
            <option value="مكة المكرمة">{{__("مكة المكرمة")}}</option>
            <option value="بريدة">{{__("بريدة")}}</option>
            <option value="عنيزة">{{__("عنيزة")}}</option>
            <option value="تبوك">{{__("تبوك")}}</option>
            <option value="حائل">{{__("حائل")}}</option>
            <option value="ابها">{{__("ابها")}}</option>
            <option value="خميس مشيط">{{__("خميس مشيط")}}</option>
            <option value="جازان">{{__("جازان")}}</option>
            <option value="نجران">{{__("نجران")}}</option>
            <option value="غير محدد">{{__("غير محدد")}}</option>
        </select>
    </div>
    <div class="form-group">
        <label for="neighborhood">{{__("الحي")}}</label> <br>
        <input type="text" name="neighborhood" value="{{$update[0]->contact->neighborhood}}" id="neighborhood" class="form-control" maxlength="255" required><br>
    </div>

    @if(isset($update[0]->contact->link))

        <div class="form-group">
            <label for="link">{{__("رابط لإستبيان خارجي")}}</label> <br> <small class=" text-muted mx-2" >{{__("يجب إدخال الرابط بالصيغة التالية: www.example.com")}}</small><br>
            <input type="text" name="link" value="{{$update[0]->contact->link}}" id="link" class="form-control" maxlength="255" required><br>
        </div>
     @else

            <div class="contact-number form-group">
                <label for="phoneNumber">{{__("رقم الجوال")}}</label> <br>
                <div class="input-group">
                    <input type="text" name="phoneNumber" id="phoneNumber" value="{{$update[0]->contact->phoneNumber}}" class="form-control" maxlength="9" minlength="9" required>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">966+</span>
                    </div>
                </div>
                <div id="number_label"></div>
                @isset($update[0]->contact->whatsapp)
                    <input type="checkbox" name="whatsapp" value="yes" class="my-2" checked> <small for="whatsapp" class=" text-muted mx-1 my-1" >{{__("أرغب في التواصل معي عن طريق الواتس اب")}}</small>
                    <br>
                @endisset
            </div>

            <div class="twitter-info form-group ">
                <label for="twitter">{{__(" الحساب في منصة تويتر")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small> <br>
                <div class="input-group">
                    <input type="text" name="twitter" id="twitter" value="{{$update[0]->contact->twitter}}" maxlength="255" class="form-control">
                    <div class="input-group-prepend"> <span class="input-group-text" id="inputGroupPrepend">@</span> </div>
                </div>
                <div id="twitter_label"></div>
            </div>

            <div class="insta-info form-group">
                <label for="instagram">{{__("الحساب في منصة الانستجرام")}}</label> <small class=" text-muted mx-2">{{__("اختياري")}}</small> <br>
                <div class="input-group">
                    <input type="text" name="instagram" id="instagram" value="{{$update[0]->contact->instagram}}" maxlength="255" class="form-control">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                    </div>
                </div>
                <div id="instagram_label"></div>
            </div>
    @endif

</div>

<script>
    $(function(){
        $("#phoneNumber").keypress(function(event){
            var ew = event.which;
            if(48 <= ew && ew <= 57)
                return true;
            else{
                $("#number_label").html(" <small class=' text-danger mx-2'>يمكنك ادخال الارقام الانجليزية فقط</small>");
                return false;
            }
        });
        $("#twitter").keypress(function(event){
            var ew = event.which;
            if(48 <= ew && ew <= 57){
                return true;
            }else if(65 <= ew && ew <= 90){
                return true;

            }else if(97 <= ew && ew <= 122){
                return true;
            }else if(ew == 95){
                return true;
            }else{
                $("#twitter_label").html(" <small class=' text-danger mx-2'>يمكنك ادخال الاحرف والارقام والرموز المطابقة لشروط تويتر فقط</small>") ;
                return false;
            }
        });
        $("#instagram").keypress(function(event){
            var ew = event.which;
            if(48 <= ew && ew <= 57){
                return true;
            }else if(65 <= ew && ew <= 90){
                return true;

            }else if(97 <= ew && ew <= 122){
                return true;
            }else if(ew == 46 || ew == 95 ){
                return true;
            }else{
                $("#instagram_label").html(" <small class=' text-danger mx-2'>يمكنك ادخال الاحرف والارقام والرموز المطابقة لشروط الانستجرام فقط</small>") ;
                return false;
            }
        });
    });
</script>
