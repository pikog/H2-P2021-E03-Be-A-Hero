const closeNotification = () =>
{
    for(const button of document.querySelectorAll('.notification > button.delete'))
    {
        button.addEventListener('click', () =>
        {
            button.parentElement.style.display = 'none';
        })
    }
}

const navbarBurger = () =>
{
    burger = document.querySelector('header .navbar-burger')
    menu = document.querySelector('header .navbar-menu')
    burger.addEventListener('click', () =>
    {
        burger.classList.toggle('is-active')
        menu.classList.toggle('is-active')
    })
}

closeNotification()
navbarBurger()