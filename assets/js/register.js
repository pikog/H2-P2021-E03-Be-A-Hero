let $heroes = document.querySelectorAll('.hero')
let $inputHero = document.querySelector('.hero-input')

for(let hero of $heroes){
  hero.addEventListener('click', () => {
    $heroValue = hero.getAttribute('alt')
    $inputHero.value = $heroValue
    for (let i = 0; i < $heroes.length; i++) {
      if($heroes[i].classList.contains('active')){
        $heroes[i].classList.remove('active')
      }
    }
    hero.classList.add('active')
  }, false)

}
