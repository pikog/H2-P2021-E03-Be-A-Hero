<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title>Attach a popup to a marker instance</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.css' rel='stylesheet' />
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>

<style>

#marker {
    background-image: url('/assets/images/logo.png');
    background-size: cover;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
}

.mapboxgl-popup {
    max-width: 200px;
}

</style>

<div id='map'></div>

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoicGlrb2ciLCJhIjoiY2pmdXJ2c2N2MDAyNDJxa2RubjhvZWJyNCJ9.7Q8yNrlWGgXqV0i2HDSSPg';

var monument = [-77.0353, 38.8895];
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: monument,
    pitch: 60,
    zoom: 15
});

// create the popup
var popup = new mapboxgl.Popup()
    .setText('Construction on the Washington Monument began in 1848.');

// create DOM element for the marker
var el = document.createElement('div');
el.id = 'marker';

// create the marker
new mapboxgl.Marker()
    .setLngLat(monument)
    .setPopup(popup) // sets a popup on this marker
    .addTo(map);

</script>

</body>
</html>