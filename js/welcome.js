// get a hold of the button "Maintenant"
let btnMaintenant = document.getElementById('welcome-maintenant');

// get a hold of what is initially displayed in the right half (on larger screens)
let firstDisplay = document.getElementById('welcome-right-first-display');

// get a hold of the button "Maintenant"
let form = document.getElementById('complete-profile-form-container');

// define the behavior of the "Maintenant" bouton
btnMaintenant.addEventListener('click', ()=> {
  // hide the initial display
  firstDisplay.style.display = 'none';
  // show the form
  form.style.display = 'block';
});




