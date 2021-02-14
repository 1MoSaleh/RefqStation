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

    @if(isset($show[0]->contact->link))
        <tr>
            <td scope="row" class="text-muted">{{__("رابط استبيان خارجي")}}</td>
            <td class=""><a href="http://{{$show[0]->contact->link}}" onclick="return confirm('سوف يتم نقلك لرابط تمت إضافته من قبل أحد المستخدمين للموقع ولا يتحمل الموقع مسؤولية الرابط الذي تمت إضافته, هل تريد الإستمرار ؟')">{{$show[0]->contact->link}}</a></td>
        </tr>
    @else
                @if($show[0]->contact['whatsapp'] != 'yes')
                    <tr>
                        <td scope="row" class="text-muted">{{__("رقم الجوال")}}</td>
                        <td class=""><a href="tel:+966{{$show[0]->contact->phoneNumber}}">0{{$show[0]->contact->phoneNumber}}</a></td>
                    </tr>
                @endif
                <tr>
                    <td scope="row" class="text-muted">{{__("واتساب")}}</td>
                    <td class=""><a href="https://wa.me/966{{$show[0]->contact->phoneNumber}}">0{{$show[0]->contact->phoneNumber}}</a></td>
                </tr>
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
    @endif
    </tbody>
</table>

