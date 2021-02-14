<button type="button" class="btn btn-block btn-outline-light my-2" data-toggle="modal" data-target="#filters-modal">
    {{__("طبق فلاتر على المحتوى")}}
</button>

<!-- Modal -->
<div class="modal fade " id="filters-modal"  role="dialog" aria-labelledby="filtersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content secondaryBGColor">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__("فلاتر تصفية المحتوى")}}</h5><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <small>{{__("يمكنك اختيار فلتر واحد على الأقل")}}</small>
            @if($layout == 'adoption')
                    <form action="{{route('adoption.filters')}}" method="get" >
                    @csrf
                    @method("get")
                    @include('_filters.adoption_filter')
                @elseif($layout == 'rescue')
                            <form action="{{route('rescue.filters')}}" method="get" >
                    @csrf
                    @method("get")
                    @include('_filters/rescue_filter')
                @elseif($layout == 'lost')
                                    <form action="{{route('lost.filters')}}" method="get" >
                    @csrf
                    @method("get")
                    @include('_filters/lost_filter')
                @endif
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-outline-danger mx-3" data-dismiss="modal">{{__("اغلاق")}}</button>
                <button type="submit" class="btn btn-outline-light mx-3">{{__("طبق الفلاتر")}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
