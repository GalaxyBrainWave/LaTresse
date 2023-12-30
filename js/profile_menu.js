const gearSVG = document.getElementById('gear-svg');
const gearItself = document.getElementById('gear');
const profileMenu = document.getElementById('profile-menu');

gearSVG.addEventListener('click', toggleProfileMenu);

function toggleProfileMenu() {
  if(gearSVG.classList.contains('toggled')) {
    profileMenu.style.display = 'none';
    gearSVG.classList.remove('toggled');
    gear.style.fill = 'var(--beige)';
  } else {
    profileMenu.style.display = 'block';
    gearSVG.classList.add('toggled');
    gear.style.fill = 'var(--ochre)';
  }
}