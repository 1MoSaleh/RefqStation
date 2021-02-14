@extends('Admin_views/admin_app')
@section('title', __("التحكم عبر وسيلة التواصل"))

@section('content')
    @include('_helper.admin.admin_search')
    @if($adoption->count() !=0)
        <h5 class="offset-1">{{__("طلبات التبني")}}</h5>
        <table class="table table-sm table-striped text-center mb-5">
            <thead>
            <tr>
                <td>#</td>
                <td>{{__("الحالة")}}</td>
                <td>{{__("التحكم")}}</td>
            </tr>
            </thead>
            <tbody>
            @foreach($adoption as $record)
                <tr>
                    <td>
                        <a href="{{route('adoption.show', $record->id)}}">{{$record->id}}</a>
                    </td>
                    <td>
                        {{__("$record->statues")}}
                    </td>
                    <td>
                        @if($record->statues == 'blocked')
                            <form method="POST" action="{{route("admin.recoverAdoption", $record->id)}}" style="display: inline-block">
                                @csrf
                                @method('post')
                                <button class="btn btn-sm btn-info mr-2" style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد رفع الحظر ؟')}}')">{{__("رفع الحظر")}}</button>
                            </form>
                        @else
                            <form method="POST" action="{{route("admin.blockAdoption", $record->id)}}" style="display: inline-block">
                                @csrf
                                @method('post')
                                <button class="btn btn-sm btn-danger " style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد حظر العنصر المحدد ؟')}}')">{{__("حظر")}}</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td>
                    <form action="{{route('admin.blockAll',['type'=> 'adoption', 'input'=> $adoption_id])}}" method="post" class="d-inline">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="confirm('{{__("هل أنت متأكد من أنك تريد حظر الكل؟")}}')">{{__("Block All")}}</button>
                    </form>
                    <form action="{{route('admin.recoverAll',['type'=> 'adoption', 'input'=> $adoption_id])}}" method="post" class="d-inline">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-sm btn-info mx-2 " onclick="confirm('{{__("هل أنت متأكد من أنك تريد رفع الحظر عن الكل؟")}}')">{{__("Recover All")}}</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    @endif

    @if($rescue->count() !=0)
        <h5 class="offset-1">{{__("بلاغات الإنقاذ")}}</h5>
        <table class="table table-sm table-striped text-center mb-5">
            <thead>
            <tr>
                <td>#</td>
                <td>{{__("الحالة")}}</td>
                <td>{{__("التحكم")}}</td>
            </tr>
            </thead>
            <tbody>
            @foreach($rescue as $record)
                <tr>
                    <td>
                        <a href="{{route('rescue.show', $record->id)}}">{{$record->id}}</a>
                    </td>
                    <td>
                        {{__("$record->statues")}}
                    </td>
                    <td>
                        @if($record->statues == 'blocked')
                            <form method="POST" action="{{route("admin.recoverRescue", $record->id)}}" style="display: inline-block">
                                @csrf
                                @method('post')
                                <button class="btn btn-sm btn-info mr-2" style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد رفع الحظر ؟')}}')">{{__("رفع الحظر")}}</button>
                            </form>
                        @else
                            <form method="POST" action="{{route("admin.blockRescue", $record->id)}}" style="display: inline-block">
                                @csrf
                                @method('post')
                                <button class="btn btn-sm btn-danger " style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد حظر العنصر المحدد ؟')}}')">{{__("حظر")}}</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td>
                    <form action="{{route('admin.blockAll',['type'=>'rescue','input'=>$rescue_id])}}" method="post" class="d-inline">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="confirm('{{__("هل أنت متأكد من أنك تريد حظر الكل؟")}}')">{{__("Block All")}}</button>
                    </form>
                    <form action="{{route('admin.recoverAll',['type'=>'rescue','input'=>$rescue_id])}}" method="post" class="d-inline">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-sm btn-info mx-2 " onclick="confirm('{{__("هل أنت متأكد من أنك تريد رفع الحظر عن الكل؟")}}')">{{__("Recover All")}}</button>
                    </form>
                </td>
            </tr>
            </tbody>

        </table>
    @endif

    @if($lost->count() !=0)
        <h5 class="offset-1">{{__("بلاغات الفقدان")}}</h5>
    <table class="table table-sm table-striped text-center mb-5">
        <thead>
        <tr>
            <td>#</td>
            <td>{{__("الحالة")}}</td>
            <td>{{__("التحكم")}}</td>
        </tr>
        </thead>
        <tbody>
        @foreach($lost as $record)
            <tr>
                <td>
                    <a href="{{route('lost.show', $record->id)}}">{{$record->id}}</a>
                </td>
                <td>
                    {{__("$record->statues")}}
                </td>
                <td>
                    @if($record->statues == 'blocked')
                        <form method="POST" action="{{route("admin.recoverLost", $record->id)}}" style="display: inline-block">
                            @csrf
                            @method('post')
                            <button class="btn btn-sm btn-info mr-2" style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد رفع الحظر ؟')}}')">{{__("رفع الحظر")}}</button>
                        </form>
                    @else
                        <form method="POST" action="{{route("admin.blockLost", $record->id)}}" style="display: inline-block">
                            @csrf
                            @method('post')
                            <button class="btn btn-sm btn-danger " style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد حظر العنصر المحدد ؟')}}')">{{__("حظر")}}</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td>
                <form action="{{route('admin.blockAll',[ 'type'=>'lost', 'input'=> $lost_id])}}" method="post" class="d-inline">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-sm btn-danger d-inline" onclick="confirm('{{__("هل أنت متأكد من أنك تريد حظر الكل؟")}}')">{{__("Block All")}}</button>
                </form>
                <form action="{{route('admin.recoverAll',[ 'type'=>'lost', 'input'=> $lost_id])}}" method="post" class="d-inline">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-sm btn-info mx-2 " onclick="confirm('{{__("هل أنت متأكد من أنك تريد رفع الحظر عن الكل؟")}}')">{{__("Recover All")}}</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
    @endif

    @if($adoption->count() ==0 && $lost->count() ==0 && $rescue->count() ==0)
<div class="alert alert-warning text-center"><h5>{{__("لايوجد محتوى يطابق بحثك")}}</h5></div>
    @endif
@endsection
