<table class="table  table-striped" style="border-right: 3px solid #00BDAF">
    <tbody>
    <tr>
        <td scope="row" class="text-muted">{{__("فئة الحيوان")}}</td>
        <td class="">{{$show[0]->type}}</td>
    </tr>

    <tr>
        <td scope="row" class="text-muted">{{__("درجة الحاجة للإنقاذ")}}</td>
        <td class="">{{__(\App\Http\Controllers\HelperController::get_text_need_degree($show[0]->need_degree))}}</td>
    </tr>

    <tr>
        <td scope="row" class="text-muted">{{__("التفاصيل")}}</td>
        <td class="">{{$show[0]->details}}</td>
    </tr>
    <tr>
        <td scope="row" class="text-muted">{{__("الحالة الصحية للحيوان")}}</td>
        <td class="">{{$show[0]->healthStatues}}</td>
    </tr>

    </tbody>
</table>
