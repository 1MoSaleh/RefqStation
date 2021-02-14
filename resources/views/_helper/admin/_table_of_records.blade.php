<table class="table table-striped">
    <thead>
    <tr>
        <td>#</td>
        <td>{{__("الحالة")}}</td>
        <td>{{__("رقم المستخدم")}}</td>
        <td>{{__("التحكم")}}</td>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
        <tr>
            <td><a href="{{route("$show", $record->id)}}">{{$record->id}}</a></td>
            <td>{{__("$record->statues")}}</td>
            @if(isset($record->user_id))
                    <td><a href="{{route("user.show", $record->user_id)}}">{{$record->user_id}}</a></td>
                @else
                <td>-</td>
                @endif
            <td>
            @if($record->statues == 'blocked')
                <form method="POST" action="{{route("admin.recover$layout", $record->id)}}" style="display: inline-block">
                    @csrf
                    @method('post')
                    <button class="btn btn-sm btn-info mr-2" style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد رفع الحظر ؟')}}')">{{__("رفع الحظر")}}</button>
                </form>
            @else
                <form method="POST" action="{{route("admin.block$layout", $record->id)}}" style="display: inline-block">
                    @csrf
                    @method('post')
                    <button class="btn btn-sm btn-danger " style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد حظر العنصر المحدد ؟')}}')">{{__("حظر")}}</button>
                </form>
            @endif
            </td>

        </tr>
    @endforeach

    </tbody>
</table>
