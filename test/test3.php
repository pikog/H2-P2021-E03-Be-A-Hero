<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <title>Attach a popup to a marker instance</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.css' rel='stylesheet' />
</head>
<body>
<style>
    body { margin:0; padding:0; }
    #map { position:absolute; top:0; bottom:0; width:100%; }
</style>

<section class="page-mission not-geolocalised">
    <div class="content-not-geolocalised">
        <div class="logo">
            <a href="./home"><img src="./assets/images/logo.png" alt="logo be a hero"></a>
        </div>
        <a class="button button-geolocation" href="#"><i class="fas fa-location-arrow"></i> Locate me</a>
    </div>
</section>

<script>
/* Geolocation */
const geolocationButton = document.querySelector('a.button-geolocation')
let geolocalised = false
const geolocation = () =>
{
    if(navigator.geolocation)
    {
        geolocationButton.addEventListener('click', (e) =>
        {
            e.preventDefault()
        })
        geolocationButton.addEventListener('click', (e) =>
        {
            navigator.geolocation.watchPosition((pos) =>
            {
                console.log(pos.coords)
                if(!geolocalised)
                {
                    goOnMap()
                }
            }, (err) =>
            {
                alert(err.message)
            })
        }, {once: true})
    }
    else
    {
        geolocationButton.text = "Your device doesn't support geolocation :("
        geolocationButton.classList.add("disable")
        geolocationButton.addEventListener('click', (e) =>
        {
            e.preventDefault()
        })
    }
}

if(geolocationButton)
{
    geolocation()
}

let mapElem = null
const goOnMap = () =>
{
    section = document.querySelector('section.page-mission')
    section.classList.remove('not-geolocalised')
    section.classList.add('geolocalised')
    section.removeChild(section.querySelector('.content-not-geolocalised'));
    mapElem = document.createElement('div')
    mapElem.id = "map"
    section.appendChild(mapElem)
    genMap()
}

let map = null
const genMap = () =>
{
    mapboxgl.accessToken = 'pk.eyJ1IjoicGlrb2ciLCJhIjoiY2pmdXJ2c2N2MDAyNDJxa2RubjhvZWJyNCJ9.7Q8yNrlWGgXqV0i2HDSSPg';
    map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/pikog/cjfvf1tct0nn92snzh1ugtjw8',
        center: [-74.50, 40],
        zoom: 9
    })
}
</script>

</body>
</html>