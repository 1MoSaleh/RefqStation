

<article class="card my-3 mx-3  col-9 col-sm-5 col-md-4 col-lg-3 col-xl-3" style="border-bottom: 3px solid #00BDAF; max-width: fit-content; min-width: fit-content;">
    <div class = 'card-body' style="min-width: 250px">
        <a href="{{route('rescue.show',$card->id)}}" class = 'card-body' style="color:black ; text-decoration:none; min-width: 250px">
        <div style="height: 300px" class="" >
            <img src="{{$card->media[0]->src2}}" alt="" class="d-block mx-auto my-auto img-fluid rounded " style="height: auto; max-height:300px; width: auto; max-width:225px; position: relative; top: 50%; transform: translateY(-50%);">
        </div>
        </a>
        <div class="">
            <hr class="mainBGColor">
            <label> <small class="text-muted mr-1"> <i class="fas fa-map-marker-alt mainColor mr-1"></i>{{__("المدينة :")}} </small>{{__($card->contact->city)}}</label> <br>
            <label> <small class="text-muted mr-1"> <i class="fas fa-question mainColor mr-1"></i>{{__("فئة الحيوان :")}} </small>{{__($card->type)}}</label> <br>
            <label> <small class="text-muted mr-1"> <i class="fas fa-exclamation mainColor mr-1"></i>{{__("حيوان عنيف :")}} </small>{{__($card->violent)}}</label> <br>
            <label> <small class="text-muted mr-1"> <i class="far fa-clock mainColor mr-1"></i>{{__("منذ :")}}</small>{{\App\Http\Controllers\HelperController::calculate_date($card->updated_at)}}</label>

            <div class="my-3">
                <div class="progress" style="height: 20px"><div class="progress-bar" style="width:{{$card->need_degree}}%; background-color:{{\App\Http\Controllers\HelperController::get_color_need_degree($card->need_degree)}} !important" role="progressbar"> <span class="secondaryColor">{{\App\Http\Controllers\HelperController::get_text_need_degree($card->need_degree)}}</span></div></div>
            </div>

            <a href="{{route('rescue.show',$card->id)}}" class = '' style="color:black ; text-decoration:none; min-width: 250px">
            <button type="button" name="button" class="btn btn-outline-light btn-block my-2 mt-3" >{{__("اذهب الى التفاصيل")}}</button>
            </a>
        </div>
    </div>
    @if($card->statues != 'closed')
        <!-- div class="myBookmark">
            <span>{__("محتوى تجريبي")}}</span>
        </div -->
    @endif
</article>


