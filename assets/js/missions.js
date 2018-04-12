/* Geolocation */
const geolocationButton = document.querySelector('a.button-geolocation')
let geolocalised = false
let coords = null
let id = 5
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
                coords = pos.coords
                if(!geolocalised)
                {
                    goOnMap()
                }
                else
                {
                    updatePlayer()
                    getEvents()
                }
            }, (err) =>
            {
                alert(err.message)
                goOnMap()
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

const getEvents = () =>
{
    const options = {
        method: 'GET'
    }

    fetch(`events?user=${id}&lat=${coords.latitude}&lon=${coords.longitude}}`, options)
        .then((res) =>
        {
            return res.json()
        })
        .then((res) =>
        {
            if(res.events)
            {
                updateEvents(res.events)
            }
        })
}

let mapElem = null
const goOnMap = () =>
{
    geolocalised = true
    section = document.querySelector('section.page-mission')
    section.classList.remove('not-geolocalised')
    section.classList.add('geolocalised')
    section.removeChild(section.querySelector('.content-not-geolocalised'));
    mapElem = document.createElement('div')
    mapElem.id = "map"
    section.appendChild(mapElem)
    genMap()
    getEvents()
}

let map = null
let playerMarker = null
const markers = []
const genMap = () =>
{
    console.log(coords)
    mapboxgl.accessToken = 'pk.eyJ1IjoicGlrb2ciLCJhIjoiY2pmdmdoNXJjMWE3dTJ4cXF5NTR6cGp4YiJ9.kBW2FE_mxmr_g1EOJTAT0g';
    map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/dark-v9',
        center: [coords.longitude, coords.latitude],
        //center: [15, 15],
        zoom: 15,
        pitch: 60
    })
    const playerElem = document.createElement('div')
    playerElem.classList.add('marker', 'player')
    playerMarker = new mapboxgl.Marker(playerElem)
    playerMarker.setLngLat([coords.longitude, coords.latitude])
    playerMarker.anchor = 'bottom'
    //playerMarker.setLngLat([15, 15])
    playerMarker.addTo(map)
}

const updateEvents = (events) =>
{
    deleteMarkers()
    for(const event of events)
    {
        const elem = document.createElement('div')
        elem.classList.add('marker')
        elem.style.backgroundImage = `url(./assets/images/icons/${event.type}${event.canDo ? '_nearby' : ''}.png)`
        const marker = new mapboxgl.Marker(elem)
        marker.setLngLat([event.lon, event.lat])
        marker.addTo(map)
        markers.push(marker)
        elem.addEventListener('click', () =>
        {
            popinEvent(event)
        })
    }
}

const deleteMarkers = () =>
{
    for(const marker of markers)
    {
        marker.remove()
    }
}

const updatePlayer = () =>
{
    playerMarker.setLngLat([coords.longitude, coords.latitude])
}

const popin = document.querySelector('.popin')

const popinEvent = (event) =>
{
    popin.querySelector('h3').textContent = event.name
    popin.querySelector('.address').textContent = event.place
    popin.querySelector('.xp').textContent = `+${event.reward}xp`
    popin.querySelector('.description').textContent = event.description
    popin.querySelector('img').src = `./${event.image}`
    const popinButton = popin.querySelector('.popin-button')
    if(event.canDo)
    {
        popinButton.textContent = 'BE A HERO!'
        popinButton.classList.remove('disable')
    }
    else
    {
        popinButton.textContent = 'Too Far :('
        popinButton.classList.add('disable')
    }
    popin.style.display = 'block'
}

const crossClose = popin.querySelector('.close')
crossClose.addEventListener('click', () =>
{
    popin.style.display = 'none'
})