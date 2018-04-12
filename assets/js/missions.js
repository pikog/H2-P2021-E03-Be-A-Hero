/* Geolocation */
const geolocationButton = document.querySelector('a.button-geolocation')
let geolocalised = false
let coords = null
console.log(user)
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
            geolocationButton.classList.add('disable')
            geolocationButton.textContent = 'Loading ...'
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
    const url = `events?user=${user.id}&lat=${coords.latitude}&lon=${coords.longitude}`
    if(window.fetch)
    {
        const options = {
            method: 'GET'
        }

        fetch(url, options)
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
    else
    {
        const xmlhttp = new XMLHttpRequest()
        xmlhttp.onreadystatechange = () =>
        {
            if (this.readyState == 4 && this.status == 200)
            {
                const res = JSON.parse(this.responseText)
                if(res.events)
                {
                    updateEvents(res.events)
                }
            }
        }
        xmlhttp.open("GET", url, true)
        xmlhttp.send()
    }
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
    mapboxgl.accessToken = 'pk.eyJ1IjoicGlrb2ciLCJhIjoiY2pmdmdoNXJjMWE3dTJ4cXF5NTR6cGp4YiJ9.kBW2FE_mxmr_g1EOJTAT0g';
    map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/dark-v9',
        center: [coords.longitude, coords.latitude],
        zoom: 15,
        pitch: 60
    })
    const playerElem = document.createElement('div')
    playerElem.classList.add('marker', 'player')
    playerElem.style.backgroundImage = `url('./assets/images/heroes/${user.hero}.png')`
    playerMarker = new mapboxgl.Marker(playerElem)
    playerMarker.setLngLat([coords.longitude, coords.latitude])
    playerMarker.anchor = 'bottom'
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
const popinContent = popin.querySelector('.popin-content')

popin.addEventListener('click', (e) =>
{
    popin.style.display = 'none'
})
popinContent.addEventListener('click', (e) =>
{
    e.stopPropagation()
})

const popinEvent = (event) =>
{
    popin.classList.remove('error')
    popin.classList.remove('valid')
    popinContent.innerHTML = '<span class="close">&times;</span><img src=""><div class="popin-body"><span class="xp"></span><h3></h3><p class="address"></p><p class="description"></p></div><a class="popin-button" href="#"></a>';

    popinContent.querySelector('h3').textContent = event.name
    popinContent.querySelector('.address').textContent = event.address
    popinContent.querySelector('.xp').textContent = `+${event.reward}xp`
    popinContent.querySelector('.description').textContent = event.description
    popinContent.querySelector('img').src = `./${event.image}`

    const popinButton = popinContent.querySelector('.popin-button')
    popinButton.addEventListener('click', (e) =>
    {
        e.preventDefault()
    })

    if(event.canDo)
    {
        popinButton.textContent = 'BE A HERO!'
        popinButton.classList.remove('disable')
        popinButton.addEventListener('click', (e) =>
        {
            validMission(event)
        }, {once: true})
    }
    else
    {
        popinButton.textContent = 'Too Far :('
        popinButton.classList.add('disable')
    }

    popin.style.display = 'block'

    const crossClose = popin.querySelector('.close')
    crossClose.addEventListener('click', (e) =>
    {
        e.preventDefault()
        popin.style.display = 'none'
    })
}

const popinValidMission = (level, level_up, reward) =>
{
    popin.classList.remove('error')
    popin.classList.add('valid')
    popinContent.innerHTML = '<span class="close">&times;</span><div class="popin-body"><h3></h3><p class="reward"></p><p class="level-up"></p></div>';

    popinContent.querySelector('h3').innerHTML = 'Congratulation, you are a <span class="hero">hero</span>!'
    popinContent.querySelector('.reward').innerHTML = `Your reward: <b>+${reward}xp</b>`
    if(level_up)
    {
        popinContent.querySelector('.level-up').innerHTML = `You passed level <b>${level}</b>`
    }
    else
    {
        popinContent.removeChild(popinContent.querySelector('.level-up'))
    }

    popin.style.display = 'block'

    const crossClose = popin.querySelector('.close')
    crossClose.addEventListener('click', (e) =>
    {
        e.preventDefault()
        popin.style.display = 'none'
    })

    getEvents()
}

const popinError = (error) =>
{
    popin.classList.remove('valid')
    popin.classList.add('error')
    popinContent.innerHTML = '<span class="close">&times;</span><div class="popin-body"><h3></h3></div>';
    
    popinContent.querySelector('h3').textContent = error

    popin.style.display = 'block'

    const crossClose = popin.querySelector('.close')
    crossClose.addEventListener('click', (e) =>
    {
        e.preventDefault()
        popin.style.display = 'none'
    })
}

const validMission = (event) =>
{
    const url = `check-mission?user=${user.id}&lat=${coords.latitude}&lon=${coords.longitude}&event=${event.id}`
    if(window.fetch)
    {
        const options = {
            method: 'GET'
        }
    
        fetch(url, options)
            .then((res) =>
            {
                console.log(res)
                return res.json()
            })
            .then((res) =>
            {
                if(res.ok)
                {

                    popinValidMission(res.level, res.level_up, res.reward)
                }
                else
                {
                    popinError(res.error)
                }
            })
    }
    else
    {
        const xmlhttp = new XMLHttpRequest()
        xmlhttp.onreadystatechange = () =>
        {
            if (this.readyState == 4 && this.status == 200)
            {
                const res = JSON.parse(this.responseText)
                if(res.ok)
                {
                    popinValidMission(res.level, res.level_up)
                    getEvents()
                }
                else
                {
                    popinError(res.error)
                }
            }
        }
        xmlhttp.open("GET", url, true)
        xmlhttp.send()
    }
}