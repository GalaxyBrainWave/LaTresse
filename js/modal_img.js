// Get the modal
const modal = document.getElementById("modal");

// Get the image in the modal
const bigImg = document.getElementById("big-img");

// Get the button that opens the modal
let imgs = document.getElementsByClassName("bmcard_img");

// Get the <span> element that closes the modal
const span = document.getElementById("modal-close-btn");

// When the user clicks the button, open the modal
for (let img of imgs) {
  img.addEventListener('click', ()=> {
    bigImg.src = img.src;
    modal.style.display = "grid";
  });
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



