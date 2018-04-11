/* Geolocation */
const geolocationButton = document.querySelector('a.button-geolocation')
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
            navigator.geolocation.getCurrentPosition((e) =>
            {
                form = document.createElement('form')
                form.method = "post"
                form.action = "./missions"
                form.innerHTML = `<input type="hidden" name="lat" value="${e.coords.latitude}"><input type="hidden" name="lon" value="${e.coords.longitude}">`
                document.body.appendChild(form)
                form.submit()
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