
let menu = document.getElementById("menu_container");
let burger = document.getElementById("nav_burger");
let closeButton = document.getElementById("close_button");


function openBurger() {
  menu.style.display = 'flex';
  burger.style.display = 'none';
}

function closeBUrger() {
  menu.style.display = 'none';
  burger.style.display = 'flex';
}

burger.addEventListener("click", openBurger);
closeButton.addEventListener("click", closeBUrger);

