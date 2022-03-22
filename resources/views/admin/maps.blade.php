<!DOCTYPE html>
<html>
  <head>
    <title>Marker Labels</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      #map {height: 100%;}
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      let labelIndex = 0;
      function initMap() {
        const bangalore = { lat: -2.907919, lng: -79.011606 };
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 14,
          center: bangalore,
        });
        google.maps.event.addListener(map, "click", (event) => {
          addMarker(event.latLng, map);
        });
        addMarker(bangalore, map);
      }
      function addMarker(location, map) {
        new google.maps.Marker({
          position: location,
          label: labels[labelIndex++ % labels.length],
          map: map,
        });
      }
    </script>
  </head>
  <body>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqE058QE9YilLN5imUK1Y2DhwvJH33Ahw&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>
