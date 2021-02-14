<div class="col-12 col-sm-9 col-md-9 col-lg-8 col-xl-7 mx-auto mt-5">
    <h4 class="mb-4 mt-2 px-2 main-heading" >{{__("تحديث بيانات الدخول")}}</h4>
        <input type="number" name="id" value="{{$update[0]->id}}" hidden>

        <div class="form-group">
            <label for="cat-health">{{__("البريد الإلكتروني")}}</label> <br>
            <input type="text" name="email" value="{{$update[0]->email}}" id="cat-health" class="form-control" maxlength="255" required>
        </div>


        <div class="form-group">
            <label for="details">{{__("كلمة المرور الحالية")}}</label>
            <input type="text" name="current-password" value="" id="" class="form-control" maxlength="255" required>
        </div>

        <div class="form-group">
            <label for="details">{{__("كلمة المرور الجديدة")}}</label>
            <input type="text" name="password" value="" id="" class="form-control" maxlength="255" >
        </div>

        <div class="form-group">
            <label for="cat-health">{{__("تأكيد كلمة المرور")}}</label><br>
            <input type="text" name="password_confirmation" value="" id="" class="form-control" maxlength="255" >
        </div>
        <small class="text-muted">{{__("سوف يتم توجيهك لتسجيل الدخول مرة اخرى بعد تحديث المعلومات")}}</small>
</div>
