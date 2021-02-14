<!-- we make this inputs out of forms to call one of it when user choose the type of contact
    #there is tow types: 1) outside link for questioner 2)info like number and another accounts info
 -->
<div id="types-container">

    <div id="contact_type2" style="display: none">
        <div class="form-group">
            <label for="link">{{__("رابط لإستبيان خارجي")}}</label> <br>
            <input type="text" name="link" value="" id="link" class="form-control" maxlength="255" required><br>
        </div>
    </div>

    <div id="contact_type1" style="display: none">

        <div class="contact-number form-group">
            <label for="phoneNumber">{{__("رقم الجوال")}}</label> <br>
            <div class="input-group">
                <input type="text" name="phoneNumber" id="phoneNumber" value="" class="form-control" maxlength="9" minlength="9" required>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">966+</span>
                </div>
            </div>
            <div id="number_label"></div>
            <input type="checkbox" name="whatsapp" value="yes" class="my-2"> <small for="whatsapp" class=" text-muted mx-1 my-1" >{{__("أرغب في التواصل معي عن طريق الواتس اب فقط")}}</small>
            <br>
        </div>

        <div class="twitter-info form-group ">
            <label for="twitter">{{__(" الحساب في منصة تويتر")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small> <br>
            <div class="input-group">
                <input type="text" name="twitter" id="twitter" value="" maxlength="255" class="form-control">
                <div class="input-group-prepend"> <span class="input-group-text" id="inputGroupPrepend">@</span> </div>
            </div>
            <div id="twitter_label"></div>
        </div>

        <div class="insta-info form-group">
            <label for="instagram">{{__("الحساب في منصة الانستجرام")}}</label> <small class=" text-muted mx-2">{{__("اختياري")}}</small> <br>
            <div class="input-group">
                <input type="text" name="instagram" id="instagram" value="" maxlength="255" class="form-control">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
            </div>
            <div id="instagram_label"></div>
        </div>
    </div>

</div>
