let $heroes = document.querySelectorAll('.hero')
let $inputHero = document.querySelector('.hero-input')

for(let hero of $heroes){
  hero.addEventListener('click', () => {
    $heroValue = hero.getAttribute('data-id')
    $inputHero.value = $heroValue
    console.log($inputHero.value)
    changeHeroSelection()
  }, false)
}

const changeHeroSelection = () => {
  for (let hero of $heroes) {
    $heroValue = hero.getAttribute('data-id')
    if ($inputHero.value != $heroValue) {
      hero.style.backgroundColor = 'transparent'
    } else {
      hero.style.backgroundColor = "blue"
    }
  }
}
