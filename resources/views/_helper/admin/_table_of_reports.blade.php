<table class="table table-striped">
    <thead>
    <tr>
        <td>#</td>
        <td>{{__("الحالة")}}</td>
        <td>{{__("النوع")}}</td>
        <td>{{__("رقم المستخدم/وسيلة التواصل")}}</td>
        <td>{{__("التحكم")}}</td>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
        <tr>
            <td><a href="{{route("$show", $record->id)}}">{{$record->id}}</a></td>
            <td>{{__("$record->statues")}}</td>
            <td>{{__("$record->reason")}}</td>
            @if(isset($record->user_id))
                <td><a href="{{route("user.show", $record->user_id)}}">{{$record->user_id}}</a></td>
            @else
                <td>{{$record->contact}}</td>
            @endif
            <td>
                @if($record->statues == 'closed')
                    <form method="POST" action="{{route("admin.recover$layout", $record->id)}}" style="display: inline-block">
                        @csrf
                        @method('post')
                        <button class="btn btn-sm btn-info mr-2" style="height: 35px" >{{__("رفع الإغلاق")}}</button>
                    </form>
                @else
                    <form method="POST" action="{{route("admin.close$layout", $record->id)}}" style="display: inline-block">
                        @csrf
                        @method('post')
                        <button class="btn btn-sm btn-danger " style="height: 35px" >{{__("إغلاق")}}</button>
                    </form>
                @endif
            </td>

        </tr>
    @endforeach

    </tbody>
</table>
