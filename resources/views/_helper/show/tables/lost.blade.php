<table class="table  table-striped" style="border-right: 3px solid #00BDAF">
    <tbody>
    <tr>
        <td scope="row" class="text-muted">{{__("فئة الحيوان")}}</td>
        <td class="">{{$show[0]->type}}</td>
    </tr>

    <tr>
        <td scope="row" class="text-muted">{{__("تاريخ الفقدان")}}</td>
        <td class="">{{$show[0]->dateOfLost}}</td>
    </tr>
    @isset($show[0]->details)
        <tr>
        <td scope="row" class="text-muted">{{__("التفاصيل")}}</td>
        <td class="">{{$show[0]->details}}</td>
    </tr>
    @endisset

    @isset($show[0]->name)
    <tr>
        <td scope="row" class="text-muted">{{__("اسم الحيوان")}}</td>
        <td class="">{{$show[0]->name}}</td>
    </tr>
    @endisset
    <tr>
        <td scope="row" class="text-muted">{{__("عمر الحيوان")}}</td>
        <td class="">{{$show[0]->age}}</td>
    </tr>
    <tr>
        <td scope="row" class="text-muted">{{__("جنس الحيوان")}}</td>
        <td class="">{{$show[0]->gender}}</td>
    </tr>
    @isset($show[0]->catDetails)
    <tr>
        <td scope="row" class="text-muted">{{__("تفاصيل اضافية عن الحيوان")}}</td>
        <td class="">{{$show[0]->catDetails}}</td>
    </tr>
    @endisset
    </tbody>
</table>
