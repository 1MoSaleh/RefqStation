<div id="map-container" class="col-11">
    <input type="text" hidden id="lat" name="lat" >
    <input type="text" hidden id="lng" name="lng" >
    <label for="map">{{__("إحداثيات الموقع")}}</label>
    <div id="map" style="height: auto; min-height: 350px; min-width: 250px; width: inherit;"></div>
    <a href="#map-container" class="btn btn-outline-light my-2 offset-3" onclick="get_coordinates()">{{__("تحديد موقعك الحالي")}}</a>

</div>


<script>
    var  map;
    var marker;
  function initMap() {

      const riyadh = {lat: 24.774265, lng: 46.738586};
        map = new google.maps.Map(document.getElementById("map"), {
          scaleControl: true,
          center: riyadh,
          zoom: 5
      });
        // create marker without position to set position later by click on the map or getting user location
       marker = new google.maps.Marker({
          position: null,
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
