<table class="table table-striped">
    <thead>
    <tr>
        <td>#</td>
        @if($layout == 'User')
            <td>{{__("الدور")}}</td>
        @endif
        <td>{{__("الحالة")}}</td>
        @if($layout != 'User')
            <td>{{__("رقم المستخدم")}}</td>
        @else
            <td>{{__("اسم المستخدم")}}</td>
        @endif
        <td>{{__("التحكم")}}</td>
    </tr>
    </thead>
    <tbody>

        <tr>
            <td><a href="{{route("$show", $record[0]->id)}}">{{$record[0]->id}}</a></td>
            @if($layout == 'User')
                <td>{{__($record[0]->role)}}</td>
            @endif
            <td>{{__($record[0]->statues)}}</td>

            @if($layout != 'User')
                @if(isset($record[0]->user_id))
                    <td><a href="{{route("user.show", $record[0]->id)}}">{{$record[0]->user_id}}</a></td>
                @else
                    <td>-</td>
                @endif
            @else
                <td>{{$record[0]->name}}</td>
            @endif
            <td>
                @if($record[0]->statues == 'blocked')
                    <form method="POST" action="{{route("admin.recover$layout", $record[0]->id)}}" style="display: inline-block">
                        @csrf
                        @method('post')
                        <button class="btn btn-sm btn-info mr-2" style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد رفع الحظر ؟')}}')">{{__("رفع الحظر")}}</button>
                    </form>
                @else
                    <form method="POST" action="{{route("admin.block$layout", $record[0]->id)}}" style="display: inline-block">
                        @csrf
                        @method('post')
                        <button class="btn btn-sm btn-danger " style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد حظر العنصر المحدد ؟')}}')">{{__("حظر")}}</button>
                    </form>
                @endif
            </td>

        </tr>

    </tbody>
</table>
