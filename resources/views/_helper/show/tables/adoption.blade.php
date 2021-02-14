<table class="table  table-striped" style="border-right: 3px solid #00BDAF">
    <tbody>
    <tr>
        <td scope="row" class="text-muted">{{__("فئة الحيوان")}}</td>
        <td class="">{{$show[0]->pet->type}}</td>
    </tr>
    @isset($show[0]->pet->details)
        <tr>
        <td scope="row" class="text-muted">{{__("التفاصيل")}}</td>
        <td class="">{{$show[0]->details}}</td>
    </tr>
    @endisset
    @isset($show[0]->pet->conditions)
        <tr>
        <td scope="row" class="text-muted">{{__("الشروط")}}</td>
        <td class="">{{$show[0]->conditions}}</td>
    </tr>
    @endisset
    <tr>
        <td scope="row" class="text-muted">{{__("سبب عرض الحيوان للتبني")}}</td>
        <td class="">{{$show[0]->pet->reason}}</td>
    </tr>

    @isset($show[0]->pet->name)
    <tr>
        <td scope="row" class="text-muted">{{__("اسم الحيوان")}}</td>
        <td class="">{{$show[0]->pet->name}}</td>
    </tr>
    @endisset
    <tr>
        <td scope="row" class="text-muted">{{__("الفئة العمرية للحيوان")}}</td>
        <td class="">{{$show[0]->pet->age}}</td>
    </tr>
    <tr>
        <td scope="row" class="text-muted">{{__("جنس الحيوان")}}</td>
        <td class="">{{$show[0]->pet->gender}}</td>
    </tr>
    @isset($show[0]->pet->family)
        <tr>
        <td scope="row" class="text-muted">{{__("فصيلة الحيوان")}}</td>
        <td class="">{{$show[0]->pet->family}}</td>
    </tr>
    @endisset
    <tr>
            <td scope="row" class="text-muted">{{__("التعقيم")}}</td>
            <td class="">{{$show[0]->pet->castration}}</td>
    </tr>
    <tr>
        <td scope="row" class="text-muted">{{__("تطعيمات الحيوان")}}</td>
        <td class="">{{$show[0]->pet->vaccinated}}</td>
    </tr>
    <tr>
        <td scope="row" class="text-muted">{{__("اللتر بوكس")}}</td>
        <td class="">{{$show[0]->pet->litterBox}}</td>
    </tr>
    <tr>
        <td scope="row" class="text-muted">{{__("الحالة الصحية للحيوان")}}</td>
        <td class="">{{$show[0]->pet->healthStatues}}</td>
    </tr>
    <tr>
        <td scope="row" class="text-muted">{{__("سلوك الحيوان")}}</td>
        <td class="">{{$show[0]->pet->behavior}}</td>
    </tr>

    </tbody>
</table>
