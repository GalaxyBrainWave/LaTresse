const checkbox = document.getElementById('color-checkbox');
const headerLogo = document.getElementById('header-logo');
const colorThemeStylesheet = document.getElementById('color-theme-stylesheet');

checkbox.addEventListener('change', 
  () => {
    if (checkbox.checked) {
      colorThemeStylesheet.setAttribute('href', '../css/rs/variables.css');
      headerLogo.src = '../img/logo/logo1.png';
      fetch('toggle_color_theme.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({state: 'day'})
      });
    } else {
      colorThemeStylesheet.setAttribute('href', '../css/rs/dark_variables.css');
      headerLogo.src = '../img/logo/logo3.png';
      fetch('toggle_color_theme.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({state: 'night'})
      });
    }
  }
);

