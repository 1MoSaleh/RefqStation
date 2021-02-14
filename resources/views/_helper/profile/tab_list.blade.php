<ul id="tab_ul" class="nav nav-tabs my-3 tab_ul" >
    <li class="active mx-2 "><a class="active_tablist_style px-2" id="adoption_tab" data-toggle="tab" href="#orders" style="text-decoration: none; color: black" onclick="changeStyle(event, 'adoption_tab')" >{{__("طلبات التبني")}}</a></li>
    <li ><a id="rescue_tab" class="mr-3" data-toggle="tab" href="#rescue" style="text-decoration: none; color: black" onclick="changeStyle(event, 'rescue_tab')">{{__("طلبات الإنقاذ")}}</a></li>
    <li ><a id="lost_tab" data-toggle="tab" href="#lost" style="text-decoration: none; color: black" onclick="changeStyle(event, 'lost_tab')">{{__("بلاغات الفقدان")}}</a></li>
</ul>

<div class="tab-content">
    <div id="orders" class="active show tab-pane fade in active p-3">
        @if(!$adoption->isEmpty())
        <table class="table table-sm table-striped text-center" style="border-right: 3px solid #00BDAF">
            <thead>
            <tr>
                <td>{{__("رقم الحالة")}} </td>
                <td>{{__("الحالة")}} </td>
                <td>{{__("التاريخ")}} </td>
                <td>{{__("التحكم")}} </td>
            </tr>
            </thead>
            <tbody>
            @foreach($adoption as $record)
            <tr>

                <td><a href="{{route('adoption.show',$record->id)}}" title="{{__("الذهاب إلى الحالة")}}">{{__("$record->id")}}</a></td>
                <td>{{__("$record->statues")}}</td>
                @if($record->updated_at != null)
                <td>{{$record->updated_at->format('Y-m-d')}}</td>
                @else
                    <td>{{__("غير محدد")}}</td>
                @endif
                    <td>
                        @if($record->statues == 'blocked')
                            <label>{{__("الحالة محظورة")}}</label>
                        @elseif($record->statues == 'closed')
                            <form method="POST" action="{{route('adoption.recovery', $record->id)}}" style="display: inline-block">
                                @csrf
                                @method('post')
                                <button class="btn btn-sm btn-info mr-2" style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد الإستعادة ؟')}}')">{{__("استعادة")}}</button>
                            </form>
                        @else
                    <a href="{{route('adoption.edit',$record->id)}}" class="btn btn-sm btn-warning mr-1 my-1 " style="height: 35px; width: 50px;">{{__("تعديل")}}</a>
                        <form method="POST" action="{{route('adoption.close', $record->id)}}" style="display: inline-block">
                            @csrf
                            @method('post')
                            <button class="btn btn-sm btn-danger " style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد الإغلاق ؟')}}')">{{__("إغلاق")}}</button>
                        </form>
                        @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <h4>{{__("لا يوجد بيانات حالياً")}}</h4>
        @endif
    </div>


    <div id="lost" class=" tab-pane fade p-3">
        @if(!$lost->isEmpty())
        <table class="table table-sm table-striped text-center" style="border-right: 3px solid #00BDAF">
            <thead>
            <tr>
                <td>{{__("رقم الحالة")}} </td>
                <td>{{__("الحالة")}} </td>
                <td>{{__("التاريخ")}} </td>
                <td>{{__("التحكم")}} </td>
            </tr>
            </thead>
            <tbody>
            @foreach($lost as $lo)
                <tr>
                    <td><a href="{{route('lost.show',$lo->id)}}" title="{{__("الذهاب إلى الحالة")}}">{{__("$lo->id")}}</a></td>
                    <td>{{__("$lo->statues")}}</td>
                    @if($lo->updated_at != null)
                        <td>{{$lo->updated_at->format('Y-m-d')}}</td>
                    @else
                        <td>{{__("غير محدد")}}</td>
                    @endif
                    <td>
                        @if($lo->statues == 'closed')
                            <form method="POST" action="{{route('lost.recovery', $lo->id)}}" style="display: inline-block">
                                @csrf
                                @method('post')
                                <button class="btn btn-sm btn-info mr-2" style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد الإستعادة ؟')}}')">{{__("استعادة")}}</button>
                            </form>
                        @else

                        <a href="{{route('lost.edit' , $lo->id)}}" class="btn btn-sm btn-warning mr-1 my-2 " style="height: 35px; width: 50px;">{{__("تعديل")}}</a>
                            <form method="POST" action="{{route('lost.close', $lo->id)}}" style="display: inline-block">
                                @csrf
                                @method('post')
                                <button class="btn btn-sm btn-danger " style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد الإغلاق ؟')}}')">{{__("إغلاق")}}</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <h4>{{__("لا يوجد بيانات حالياً")}}</h4>
        @endif
    </div>

    <div id="rescue" class=" tab-pane fade p-3">
        @if(!$rescue->isEmpty())
        <table class="table table-sm table-striped text-center" style="border-right: 3px solid #00BDAF">
            <thead>
            <tr>
                <td>{{__("رقم الحالة")}} </td>
                <td>{{__("الحالة")}} </td>
                <td>{{__("التاريخ")}} </td>
                <td>{{__("التحكم")}} </td>
            </tr>
            </thead>
            <tbody>
            @foreach($rescue as $res)
                <tr>
                    <td><a href="{{route('rescue.show',$res->id)}}" title="{{__("الذهاب إلى الحالة")}}">{{__("$res->id")}}</a></td>
                    <td>{{__("$res->statues")}}</td>
                    @if($res->updated_at != null)
                        <td>{{$res->updated_at->format('Y-m-d')}}</td>
                    @else
                        <td>{{__("غير محدد")}}</td>
                    @endif
                    <td>
                        @if($res->statues == 'closed')
                            <form method="POST" action="{{route('rescue.recovery', $res->id)}}" style="display: inline-block">
                                @csrf
                                @method('post')
                                <button class="btn btn-sm btn-info mr-4" style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد الإستعادة ؟')}}')">{{__("استعادة")}}</button>
                            </form>
                        @else
                            <a href="{{route('rescue.edit' , $res->id)}}" class="btn btn-sm btn-warning mr-1 my-2 " style="height: 35px; width: 50px;">{{__("تعديل")}}</a>
                        <form method="POST" action="{{route('rescue.close', $res->id)}}" style="display: inline-block">
                            @csrf
                            @method('post')
                            <button class="btn btn-sm btn-danger " style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد الإغلاق ؟')}}')">{{__("إغلاق")}}</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
        <h4> {{__("لا يوجد بيانات حالياً")}}</h4>
        @endif
    </div>

</div>

<script>
    function changeStyle(evt, type) {

        var type1 = "adoption_tab"
        var type2 = "rescue_tab"
        var type3 = "lost_tab"
        if (type == type1){
            document.getElementById(type).className = "active_tablist_style px-2";
            document.getElementById(type2).className = "mr-3";
            document.getElementById(type3).className = "";

        }else if(type == type2){
            document.getElementById(type).className = "active_tablist_style px-2 mr-3"
            document.getElementById(type1).className = ""
            document.getElementById(type3).className = ""

        }else {
            document.getElementById(type).className = "active_tablist_style px-2"
            document.getElementById(type1).className = ""
            document.getElementById(type2).className = "mr-2"

        }
    }
</script>
