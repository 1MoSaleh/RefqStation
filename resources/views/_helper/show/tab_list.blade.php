<ul id="tab_ul" class="nav nav-tabs my-3 tab_ul" >
    <li class="active mx-4 "><a class="active_tablist_style px-2" id="details_tab" data-toggle="tab" href="#details" style="text-decoration: none; color: black" onclick="changeStyle(event, 'details_tab')" >{{__("التفاصيل")}}</a></li>
    <li ><a id="contact_tab" data-toggle="tab" href="#contact" style="text-decoration: none; color: black" onclick="changeStyle(event, 'contact_tab')">{{__("معلومات التواصل")}}</a></li>
</ul>

<div class="tab-content" style="position: relative">
    <div id="details" class="active show tab-pane fade in active p-3">
       @if($layout == 'adoption')
            @include('_helper.show.tables.adoption')
        @elseif($layout == 'lost')
            @include('_helper/show/tables/lost')
        @elseif($layout == 'rescue')
            @include('_helper/show/tables/rescue')
        @endif
    </div>
    <div id="contact" class=" tab-pane fade p-3">
        @if($layout == 'adoption')
            @include('_helper/show/tables/contactAdoption')
        @else
        @include('_helper/show/tables/contact')
        @endif
    </div>

    @if(\App\Http\Controllers\HelperController::isAuthAdmin())
    <div class="report">
        @if($layout == 'adoption')
            <form action="{{route('admin.blockAdoption', $show[0]->id)}}" id="rform" method="post">
        @elseif($layout == 'lost')
                    <form action="{{route('admin.blockLost', $show[0]->id)}}" id="rform" method="post">
        @elseif($layout == 'rescue')
                            <form action="{{route('admin.blockRescue', $show[0]->id)}}" id="rform" method="post">
        @endif
            @csrf @method('post')
        </form>

            <a id="rform-submit" href="javascript:$('#rform').submit()" title="{{__("حظر")}}" ><i class="far fa-flag" style="color:inherit;"></i></a>
    </div>
    @endif
</div>

<script>
    function changeStyle(evt, type) {
        var type1 = "details_tab"
        var type2 = "contact_tab"
        if (type == type1){
            document.getElementById(type).className = "active_tablist_style px-2"
            document.getElementById(type2).className = ""

        }else{
            document.getElementById(type).className = "active_tablist_style px-2"
            document.getElementById(type1).className = ""
        }
    }

</script>
