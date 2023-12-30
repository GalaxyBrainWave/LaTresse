// get a reference to the button "S'identifi'er"
let btnSIdentifier = document.querySelector('#sidentifier');
// get a reference to the button "Retour"
let btnRetour = document.querySelector('#login-retour');
// get a reference to the register form's container
let registerForm = document.querySelector('#register-form-container');
// get a reference to the login form's container
let loginForm = document.querySelector('#login-form-container');
// get a reference to the Mot de passe oublié ? button
let btnMdpOublie = document.querySelector('#mdpoublie-btn');
// get a reference to the link to the contact form
let linkMdpOublie = document.querySelector('#mdpoublie-link');

// define the behavior of the button "S'identifi'er"
btnSIdentifier.addEventListener('click', ()=> {
  registerForm.style.display = 'none';
  loginForm.classList.remove('dispnone');
});

// define the behavior of the button "Mot de passe oublié ?"
btnMdpOublie.addEventListener('click', ()=> {
  linkMdpOublie.style.display = 'block';
});

// define the behavior of the button "Retour"
btnRetour.addEventListener('click', ()=> {
  registerForm.style.display = 'flex';
  loginForm.classList.add('dispnone');
});



