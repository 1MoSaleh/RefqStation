<div class="col-12 col-sm-9 col-md-9 col-lg-8 col-xl-7 mx-auto">
<h4 class="mb-4 mt-2 px-2 main-heading" >{{__("تحديث الملف الشخصي")}}</h4>
<input type="number" name="id" value="{{$update[0]->id}}" hidden>

<div class="form-group">
    <label for="cat-health">{{__("الاسم")}}</label> <br>
    <input type="text" name="name" value="{{$update[0]->name}}" id="cat-health" class="form-control" maxlength="255" required>
</div>

<div class="form-group">
    <label for="details">{{__("السيرة الذاتية (bio)")}}</label>  <small class=" text-muted mx-2">{{__("اختياري")}}</small>
    <textarea name="bio" id="details" rows="8" cols="80"  class="form-control" maxlength="550" style="height:50px">{{$update[0]->bio}}</textarea>
</div>

<label for="customFile">{{__("صورة الملف الشخصي")}}</label><br>
<div class="custom-file mb-4">
    <input type="file" class="custom-file-input" name="image" id="customFile1" onchange="updateList()" accept="image/jpg, image/jpeg , image/png" >
    <label class="custom-file-label" for="customFile1">Choose file</label>
</div>
    <div id="fileList" class="text-center mb-3">
        <h6>{{__("الصور التي تم اختيارها:")}}</h6>
        @foreach($update[0]->media as $item)
            @if($item->type != 'video')
                <img src="{{$item->src2}}" alt='' style='height:65px; width:65px;' class='rounded mx-2 mt-2'/>
            @endif
        @endforeach
    </div>
<div class="form-group">
    <label for="cat-health">{{__("اسم المنظمة التابع لها")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small> <br>
    <input type="text" name="organizationName" value="{{$update[0]->organizationName}}" id="cat-health" class="form-control" maxlength="255" >
</div>


<div class="twitter-info form-group ">
    <label for="twitter">{{__(" الحساب في منصة تويتر")}}</label> <small class=" text-muted mx-2" >{{__("اختياري")}}</small> <br>
    <div class="input-group">
        @if(isset($update[0]->contact->twitter))
        <input type="text" name="twitter" id="twitter" value="{{$update[0]->contact->twitter}}" maxlength="255" class="form-control">
        <div class="input-group-prepend"> <span class="input-group-text" id="inputGroupPrepend">@</span> </div>
        @else
            <input type="text" name="twitter" id="twitter" value="" maxlength="255" class="form-control">
            <div class="input-group-prepend"> <span class="input-group-text" id="inputGroupPrepend">@</span> </div>
        @endif
    </div>
    <div id="twitter_label"></div>
</div>

<div class="insta-info form-group">
    <label for="instagram">{{__("الحساب في منصة الانستجرام")}}</label> <small class=" text-muted mx-2">{{__("اختياري")}}</small> <br>
    <div class="input-group">
        @if(isset($update[0]->contact->twitter))
            <input type="text" name="instagram" id="instagram" value="{{$update[0]->contact->instagram}}" maxlength="255" class="form-control">
            <div class="input-group-prepend"><span class="input-group-text" id="inputGroupPrepend">@</span></div>
        @else
            <input type="text" name="instagram" id="instagram" value="" maxlength="255" class="form-control">
            <div class="input-group-prepend"><span class="input-group-text" id="inputGroupPrepend">@</span></div>
        @endif
       </div>
    <div id="instagram_label"></div>
</div>
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
