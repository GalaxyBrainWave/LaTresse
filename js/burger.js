
let menu = document.getElementById("menu_container");
let burger = document.getElementById("nav_burger");
let closeButton = document.getElementById("close_button");


function openBurger() {
  if (menu.style.display == 'none') {
    menu.style.display = 'flex';
    burger.style.display = 'none';
  }
}

function closeBUrger() {
    if (menu.style.display == 'flex') {
        menu.style.display = 'none';
        burger.style.display = 'flex';
      }
}

burger.addEventListener("click", openBurger);
closeButton.addEventListener("click", closeBUrger);

