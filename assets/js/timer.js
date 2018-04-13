/**
 * Do a little 5seconds timer before redirecting on home page
 * Used for logout and 404 page
 */

const redirection404Timer = () =>
{
    const $timer = document.querySelector('.page-404 span.timer, .page-logout span.timer')
    let time = 5
    window.setInterval(() =>
    {
        if(time > 0)
        {
            $timer.textContent = `${--time} second${time > 1 ? 's' : ''}`
        }
    }, 1000)
}

redirection404Timer()