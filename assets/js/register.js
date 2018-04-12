let heroes = document.querySelectorAll('.hero')
let inputHero = document.querySelector('.hero-input')

document.querySelector(`.hero[data-hero-id="${inputHero.value}"]`).classList.add('active')

for(let hero of heroes){
  hero.addEventListener('click', () =>
  {
    heroOnClick(hero)
  })
}

const heroOnClick = (heroActive) =>
{
  for (let hero of heroes) {
    hero.classList.remove('active')
  }
  inputHero.value = heroActive.dataset.heroId
  heroActive.classList.add('active')
}