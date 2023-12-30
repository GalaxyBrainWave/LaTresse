const caroussel = document.getElementById('caroussel');
let index = 2;

let intervalID;

function roll() {
  if(!intervalID) {
    setInterval(changeImg, 2000, index);
  }
}

function changeImg() {
  caroussel.src = 'img/caroussel/caroussel-' + index + '.jpg';
  if (index < 8) {
    index++;
  } else {
    index = 1;
  }
}

roll();