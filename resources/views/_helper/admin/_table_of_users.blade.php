<table class="table table-striped">
    <thead>
    <tr>
        <td>#</td>
        <td>{{__("الدور")}}</td>
        <td>{{__("الحالة")}}</td>
        <td>{{__("اسم المستخدم")}}</td>
        <td>{{__("التحكم")}}</td>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
        <tr>
            <td><a href="{{route("$show", $record->id)}}">{{$record->id}}</a></td>
            <td>{{__("$record->role")}}</td>
            <td>{{__("$record->statues")}}</td>
            <td>{{$record->name}}</td>
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
            @if(\App\Http\Controllers\HelperController::isAdmin())
                        @if($record->role == 'user')
                            <form method="POST" action="{{route("admin.upgradeToSub", $record->id)}}" style="display: inline-block">
                                @csrf
                                @method('post')
                                <button class="btn btn-sm btn-info mr-2" style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد الترقية ؟')}}')">{{__("ترقية")}}</button>
                            </form>
                        @elseif($record->role == 'subAdmin')
                            <form method="POST" action="{{route("admin.downgradeToUser", $record->id)}}" style="display: inline-block">
                                @csrf
                                @method('post')
                                <button class="btn btn-sm btn-danger " style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد تخفيض العنصر المحدد ؟')}}')">{{__("تخفيض")}}</button>
                            </form>
                        @endif
                    @endif

            </td>

        </tr>
    @endforeach

    </tbody>
</table>
