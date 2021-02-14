<table class="table table-striped">
    <thead>
    <tr>
        <td>#</td>
        <td>{{__("الدور")}}</td>
        <td>{{__("الحالة")}}</td>
        <td>{{__("اسم المستخدم")}}</td>
        <td>{{__("عدد الحالات")}}</td>
        <td>{{__("التحكم")}}</td>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
     @if($record->role != 'superAdmin')
        <tr>
            <td><a href="{{route("$show", $record->id)}}">{{$record->id}}</a></td>
            <td>{{__("$record->role")}}</td>
            <td>{{__("$record->statues")}}</td>
            <td>{{$record->name}}</td>
            <td>{{$record->num_of_cases}}</td>
            <td>
                @if($record->role == 'subAdmin')
                    <form method="POST" action="{{route("admin.upgradeToAdmin", $record->id)}}" style="display: inline-block">
                        @csrf
                        @method('post')
                        <button class="btn btn-sm btn-info mr-2" style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد الترقية ؟')}}')">{{__("ترقية")}}</button>
                    </form>
                @elseif($record->role == 'admin')
                    <form method="POST" action="{{route("admin.downgradeToSub", $record->id)}}" style="display: inline-block">
                        @csrf
                        @method('post')
                        <button class="btn btn-sm btn-danger " style="height: 35px" onclick="return confirm('{{__('هل أنت متأكد أنك تريد تخفيض العنصر المحدد ؟')}}')">{{__("تخفيض")}}</button>
                    </form>
                @endif
            </td>

        </tr>
     @endif
    @endforeach

    </tbody>
</table>
