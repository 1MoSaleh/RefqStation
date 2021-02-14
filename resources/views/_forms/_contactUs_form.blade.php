
<div class="reason form-group">
    <label for="reason">{{__("سبب التواصل")}}</label> <br>
    <input type="radio" name="reason" value="suggestion" id="r1"> <label for="r1" >{{__("اقتراح")}}</label>
    <div class="options  mx-4" style="display:inline"> <input type="radio" name="reason" value="report" id="r2"> <label for="r2">{{__("شكوى")}}</label> </div>
    <input type="radio" name="reason" value="noSelection" id ="r3"> <label for="r3">{{__("غير ذلك")}}</label>
</div>
<div class="form-group">
    <label for="title">{{__("عنوان الرسالة")}}</label> <br>
    <input type="text" name="title" id="title" value="" maxlength="255" class="form-control">
</div>

<div class="form-group">
    <label for="details">{{__("التفاصيل")}}</label> <br>
    <textarea name="details" id="contact-us-details" rows="8" cols="80"  class="form-control" maxlength="550" style="height:50px"></textarea>
</div>
@guest
<div class="form-group">
    <label for="contact">{{__("الايميل الخاص بك")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small>  <br>
    <input type="email" name="contact" id="contact" value="" id="contact" class="form-control" maxlength="255" required><br>
</div>
@endguest
