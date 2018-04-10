let $heroes = document.querySelectorAll('.hero')
let $inputHero = document.querySelector('.hero-input')

for(let hero of $heroes){
  hero.addEventListener('click', () => {
    $heroValue = hero.getAttribute('data-id')
    $inputHero.value = $heroValue
    console.log($inputHero)
  }, false)
}
