<table class="table  table-striped" style="border-right: 3px solid #00BDAF">
    <tbody>
    <tr>
        <td scope="row" class="text-muted">{{__("المدينة")}}</td>
        <td class="">{{$show[0]->contact->city}}</td>
    </tr>
    <tr>
        <td scope="row" class="text-muted">{{__("الحي")}}</td>
        <td class="">{{$show[0]->contact->neighborhood}}</td>
    </tr>
    @if(isset($show[0]->contact->lat) && isset($show[0]->contact->lng))
    <tr>
        <td scope="row" class="text-muted">{{__("رابط مباشر للموقع")}}</td>
        <td class=""><a href="https://www.google.com/maps/search/?api=1&query={{$show[0]->contact->lat}},{{$show[0]->contact->lng}}">{{__("اضغط هنا")}}</a></td>
    </tr>
    @endif
    @isset($show[0]->contact->phoneNumber)
    @if($show[0]->contact->whatsapp != 'yes')
        <tr>
        <td scope="row" class="text-muted">{{__("رقم الجوال")}}</td>
        <td class=""><a href="tel:+966{{$show[0]->contact->phoneNumber}}">0{{$show[0]->contact->phoneNumber}}</a></td>
    </tr>
    @endif
    <tr>
        <td scope="row" class="text-muted">{{__("واتساب")}}</td>
        <td class=""><a href="https://wa.me/966{{$show[0]->contact->phoneNumber}}">0{{$show[0]->contact->phoneNumber}}</a></td>
    </tr>
    @endisset
    @isset($show[0]->contact->twitter)
    <tr>
        <td scope="row" class="text-muted">{{__("تويتر")}}</td>
        <td class=""><a href="https://www.twitter.com/{{$show[0]->contact->twitter}}" target="_blank"> {{$show[0]->contact->twitter}}@</a></td>
    </tr>
    @endisset
    @isset($show[0]->contact->instagram)
    <tr>
        <td scope="row" class="text-muted">{{__("انستجرام")}}</td>
        <td class=""><a href="https://www.instagram.com/{{$show[0]->contact->instagram}}/" target="_blank">{{$show[0]->contact->instagram}}@</a></td>
    </tr>
    @endisset
    <!--tr>
        <td scope="row" class="text-muted">{__("test")}}</td>
        <td class=""><a href="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" target="_blank">test</a></td>
    </tr-->

    </tbody>
</table>

