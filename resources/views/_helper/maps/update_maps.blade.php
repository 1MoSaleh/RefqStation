<div id="map-container" class="col-11">
    <input type="text" hidden id="lat" name="lat" value="{{$update[0]->contact->lat}}">
    <input type="text" hidden id="lng" name="lng" value="{{$update[0]->contact->lng}}">
    <label for="map">{{__("إحداثيات الموقع")}}</label>
    <div id="map" style="height: auto; min-height: 350px; min-width: 250px; width: inherit;"></div>
    <a href="#map-container" class="btn btn-outline-light my-2 offset-3" onclick="get_coordinates()">{{__("تحديد موقعك الحالي")}}</a>
</div>


<script>
    var  map;
    var marker;
    function initMap() {
        var location, myZoom;
        var myLat = document.getElementById('lat').value;
        var myLng = document.getElementById('lng').value;
        if(myLat == 0 && myLng == 0){
           location ={lat: 24.774265, lng: 46.738586};
           myZoom = 8;
        }else{
            location = {lat: Number(myLat) , lng: Number(myLng) };
            myZoom = 11;
        }
        console.log(location);
        map = new google.maps.Map(document.getElementById("map"), {
            scaleControl: true,
            center:location,
            zoom: myZoom
        });
        // create marker with position from data in our records
        myLatlng = new google.maps.LatLng(document.getElementById('lat').value,document.getElementById('lng').value);
        marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'موقع الحالة'
        });
        // to get location from clicking
        map.addListener('click', function(mapsMouseEvent) {
            // create marker when click
            marker.setPosition(mapsMouseEvent.latLng);
            map.panTo(mapsMouseEvent.latLng);
            map.setZoom(16);
            // set the lat and lng to inputs in the form
            document.getElementById('lat').setAttribute('value',mapsMouseEvent.latLng.lat());
            document.getElementById('lng').setAttribute('value', mapsMouseEvent.latLng.lng());
        });

    }

    // get lat, long from geolocation
    function get_coordinates() {
        var lat  , lng ;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){
                lat = position.coords.latitude;
                lng = position.coords.longitude;
                set_marker(lat,lng);
            });
        } else {
            alert('لم نستطع تحديد موقع المستخدم, الرجاء اختيار الموقع من الخرائط المرفقة');
        }
    }
    // make marker position
    function set_marker(lat,lng) {
        myLatlng = new google.maps.LatLng(lat,lng);
        marker.setPosition(myLatlng);
        map.panTo(myLatlng);
        map.setZoom(16);
        document.getElementById('lat').setAttribute('value',lat);
        document.getElementById('lng').setAttribute('value', lng);

    }
</script>
<script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwpwRi6FRqa0D8KQwX4ACLqrrXSZehoco&callback=initMap">
</script>
