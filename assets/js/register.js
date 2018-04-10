let $heroes = document.querySelectorAll('.hero')
let $inputHero = document.querySelector('.hero-input')

for(let hero of $heroes){
  hero.addEventListener('click', () => {
      $inputHero.value = hero.getAttribute('data-id')
      console.log($inputHero)
  }, false)
}
