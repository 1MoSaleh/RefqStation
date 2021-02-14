<article class="card my-3 mx-3  col-9 col-sm-5 col-md-4 col-lg-3 col-xl-3" style="border-bottom: 3px solid #00BDAF; max-width: fit-content; min-width: fit-content;">
    <div class = 'card-body' style="min-width: 250px">
        <a href="{{route('lost.show' , $card->id)}}" class = 'card-body' style="color:black ; text-decoration:none; min-width: 250px">
        <div style="height: 300px" class="" >
            <img src="{{$card->media[0]->src2}}" alt="" class="d-block mx-auto my-auto img-fluid rounded " style="height: auto; max-height:300px; width: auto; max-width:225px; position: relative; top: 50%; transform: translateY(-50%);">
        </div>
        </a>
        <div class="">
            <hr class="mainBGColor">
            <label> <small class="text-muted mr-1"> <i class="fas fa-map-marker-alt mainColor mr-1"></i>{{__("المدينة :")}} </small>{{__($card->contact->city)}}</label> <br>
            <label> <small class="text-muted mr-1"> <i class="fas fa-question mainColor mr-1"></i>{{__("فئة الحيوان :")}} </small>{{__($card->type)}}</label> <br>
            <label> <small class="text-muted mr-1"> <i class="far fa-calendar-alt mainColor mr-1"></i>{{__("الفئة العمرية :")}}</small>{{__($card->age)}}</label> <br>
            <label> <small class="text-muted mr-1"><i class="fas fa-venus-mars mainColor mr-1"></i>{{__("الجنس :")}}</small>{{__($card->gender)}} </label> <br>
            <label> <small class="text-muted mr-1"> <i class="fas fa-file-medical-alt mainColor mr-1"></i>{{__("تاريخ الفقد :")}}</small>{{__($card->dateOfLost)}}</label> <br>
            <label> <small class="text-muted mr-1"> <i class="far fa-clock mainColor mr-1"></i>{{__("منذ :")}}</small>{{\App\Http\Controllers\HelperController::calculate_date($card->created_at)}}</label>
            <div>
                <a href="{{route('lost.show' , $card->id)}}" class ='' style="color:black ; text-decoration:none; min-width: 250px">
                <button type="button" name="button" class="btn btn-outline-light btn-block my-2" >{{__("اذهب الى التفاصيل")}}</button>
                </a>
            </div>
        </div>
    </div>

    @if($card->statues != 'closed')
        <!--div class="myBookmark">
            <span>{__("محتوى تجريبي")}}</span>
        </div -->
    @endif
</article>


