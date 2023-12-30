const htPicInput = document.getElementById('picinput');
const confirmIcon = document.getElementById('picinput-confirm-icon');

htPicInput.addEventListener('change', 
() => {
  if (htPicInput.files.length > 0) {
  confirmIcon.classList.remove('dispnone');
  }
});