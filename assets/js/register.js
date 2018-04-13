/**
 * Hero selection on register page
 */

let heroes = document.querySelectorAll('.hero')
let inputHero = document.querySelector('.hero-input')

/**
 *  Set default hero selected when the page is loaded
 */
document.querySelector(`.hero[data-hero-id="${inputHero.value}"]`).classList.add('active')

/**
 * Trigger when click on hero
 */
for(let hero of heroes){
  hero.addEventListener('click', () =>
  {
    heroOnClick(hero)
  })
}

/**
 *  Set class active when the hero is selected
 */
const heroOnClick = (heroActive) =>
{
  for (let hero of heroes) {
    hero.classList.remove('active')
  }
  inputHero.value = heroActive.dataset.heroId
  heroActive.classList.add('active')
}