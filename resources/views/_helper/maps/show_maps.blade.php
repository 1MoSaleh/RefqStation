<!-- ## I decide to use external link lead to google map directly, so we have canceled this map << to complate it just put values from database in the inputs -->
<div class="map-container col-11">
    <input type="text" hidden id="lat" name="lat">
    <input type="text" hidden id="lng" name="lng" >
    <label for="map">{{__("إحداثيات الموقع")}}</label>
    <div id="map" style="height: auto; min-height: 350px; min-width: 250px; width: inherit;"></div>
    <button class="btn btn-outline-light my-2 offset-3" onclick="get_coordinates()">{{__("تحديد موقعك الحالي")}}</button>
</div>


<script>
    var  map;
    var marker;
    function initMap() {

        const location = {lat: document.getElementById('lat').value, lng: document.getElementById('lng').value};
        map = new google.maps.Map(document.getElementById("map"), {
            scaleControl: true,
            center: location,
            zoom: 11
        });
        // create marker with position from data in our records
        myLatlng = new google.maps.LatLng(document.getElementById('lat').value,document.getElementById('lng').value);
        marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'موقع الحالة'
        });
    }
</script>
<script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwpwRi6FRqa0D8KQwX4ACLqrrXSZehoco&callback=initMap">
</script>
