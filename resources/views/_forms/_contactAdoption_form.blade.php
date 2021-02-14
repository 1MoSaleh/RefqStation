<!-- in this form we have tow types of contact info, we make it in another page to call it when user choose one of it
    # in this page we have the major info like city and neighborhood
    -->
<div class="col-12 col-sm-9 col-md-9 col-lg-8 col-xl-7 mx-auto">
    <div class="city-info form-group">
        <label for="city-select">{{__("المدينة")}}</label>
        <!-- Todo complete the cities // we will do it later with "Modal" from bootstrap  -->
        <select class="form-control" name="city" id="city-select" required>
            <option value=""  hidden>{{__("اختر المدينة")}}</option>
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
            <option value="غير محدد">{{__("غير محدد")}}</option>
        </select>
    </div>
    <div class="form-group">
        <label for="neighborhood">{{__("الحي")}}</label> <br>
        <input type="text" name="neighborhood" value="" id="neighborhood" class="form-control" maxlength="255" required><br>
    </div>

    <div>
        <div class="contact_type form-group">
            <label for="contact_type">{{__("طريقة التواصل")}}</label> <br>
            <input type="radio" name="contact_type" value="contact_type1" id="ct1" required> <label for="ct1" >{{__("معلومات التواصل الأساسية")}}</label>
            <div class="options  mx-4" style="display:inline"> <input type="radio" name="contact_type" value="contact_type2" id="ct2"> <label for="ct2">{{__("استبيان خارجي")}}</label> </div>
        </div>
    </div>


    <div id="chosen_type"></div>

</div>

<script>

    $(document).ready(function() {
        $("input[name$='contact_type']").on( "change", function() {
            var type = $(this).val();

            // when the user choose we move all types to #types-container to be out of the form and hide it
            $("#contact_type1").prependTo($("#types-container"));
            $("#contact_type1").hide();
            $("#contact_type2").prependTo($("#types-container"));
            $("#contact_type2").hide();

            // then we move the chosen type to our form inside #chosen-type div and show the type
            $("#"+type).prependTo($("#chosen_type"));
            $("#"+type).show();
            //$("#chosen_type").html($("#"+type));
        } );
    });


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
