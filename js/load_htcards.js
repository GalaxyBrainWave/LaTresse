const cardsContainer = document.getElementById("bmcards-container"); // get the container
const loadButton = document.getElementById("load-button"); // get the button

let visibleCards = 15; // initialize the number of visible cards to 15

// Function to render a card
function renderCard(data) {
  const card = document.createElement("div"); // create a div element
  card.className = "bmcard loadedcard"; // give it these two classes
  card.setAttribute('data-htid', data[1]);
  card.innerHTML = data[0]; // fill the card with the html code stored in data
  cardsContainer.appendChild(card); // append the new div to the container
}

// Function to load and render cards
async function loadCards() {
  const batchSize = 15; // batch size easily customizable (coordinate with back-end code)
  
  try { // send a GET request to this php file with offset parameter
    const response = await fetch("load_htcards.php?offset=" + visibleCards);
    // waits for the HTTP request to complete and returns a resolved Promise containing
    // the HTTP response. This ensures that response will contain the resolved value 
    // (the HTTP response object) before proceeding to the next steps
    if (response.ok) { // Boolean indicating if the Promise was resolved
      const responseData = await response.json(); // make sure response is available and parse it
      for (let i = 0; i < responseData.length; i++) {
        renderCard(responseData[i]); // render all the cards
      }
      let loadedImgs = document.querySelectorAll(".loadedcard img"); // get the newly loaded images
      for (let img of loadedImgs) { // iterate over the array that contains them
        img.addEventListener('click', ()=> { // add an event listener on each of them
          bigImg.src = img.src; // load the img source to the modal's center image's source
          modal.style.display = "grid"; // display the modal
        });
      }
      let likeButtonsList = document.getElementsByClassName("like-btn"); // get the like buttons
      for (let likeButton of likeButtonsList) { // iterate over the array that contains them
        likeButton.addEventListener('click', htLike); // add an event listener on each of them
      }
      // let newEditModalList = document.querySelectorAll('.edit-modal');
      // let editBtnList = document.querySelectorAll('.edit-icon-container');
      // let deleteBtnList = document.querySelectorAll('.delete-btn');
      // let updateBtnList = document.querySelectorAll('.edit-btn');
      // editBtnList.forEach(btn => {
      //   btn.addEventListener('click',() => {
      //     let modal = btn.querySelector('.edit-modal');
      //     if (modal.classList.contains('dispnone')) {
      //       modal.classList.remove('dispnone');
      //     } else {
      //       modal.classList.add('dispnone');
      //     }
      //   });
      // });
      // deleteBtnList.forEach(btn => {
      //   btn.addEventListener('click',() => {
      //     const ht = btn.closest('.bmcard');
      //     const htId = ht.getAttribute('data-htid');
      //     confirmModal.classList.remove('dispnone');
      //     yesBtn.addEventListener('click', () => {
      //       confirmModal.style.opacity = "0.5";
      //       ht.style.opacity = "0.5";
      //         const data = {
      //           htId: htId,
      //           action: 'delete'
      //         };
      //         fetch('edit_ht.php', {
      //           method: 'POST',
      //           headers: {
      //             'Content-Type': 'application/json'
      //           },
      //           body: JSON.stringify(data)
      //         })
      //         .then(response => response.json())
      //         .then(responseData => {
      //           if(responseData.success === true) {
      //             confirmModal.classList.add('dispnone');
      //             confirmModal.style.opacity = "1";
      //             ht.classList.add('dispnone');
      //           }
      //         });
      //       });
      //     });
      // });
      // updateBtnList.forEach(
      //   (updateBtn) => {
      //     updateBtn.addEventListener('click',
      //       (e) => {
      //         const currentBtn = e.target;
      //         const ht = currentBtn.closest('.bmcard');
      //         const htId = ht.getAttribute('data-htid');
      //         const htTextContainer = ht.querySelector('.bmcard_txt');
      //         const htText = htTextContainer.querySelector('p').innerText;
      //         htTextContainer.innerHTML = '<textarea id="update-ht-input" class="comment_input" placeholder="Ajoutez votre commentaire">' + htText + '</textarea><div class="edit-comment-btn-ctner"><button id="current-comment-edit-btn" class="nice-blue-button">Valider</button><button id="current-comment-cancel-btn" class="nice-blue-button">Annuler</button></div>';
      //         const txtArea = document.getElementById('update-ht-input');
      //         txtArea.style.height = 'auto';
      //         txtArea.style.height = (txtArea.scrollHeight) + 'px';
      //         txtArea.addEventListener('input', () => {
      //           txtArea.style.height = 'auto';
      //           txtArea.style.height = (txtArea.scrollHeight) + 'px';
      //         });
      //         validateUpdateBtn = document.getElementById('current-comment-edit-btn');
      //         validateUpdateBtn.addEventListener('click',
      //           () => {
      //             ht.style.opacity = "0.5";
      //             const updatedHt = document.getElementById('update-ht-input').value; // Use .value instead of .innerText for textarea
      //             const data = {
      //               htId: htId,
      //               action: 'update',
      //               content: updatedHt
      //             };
      //             fetch('edit_ht.php', {
      //               method: 'POST',
      //               headers: {
      //                 'Content-Type': 'application/json'
      //               },
      //               body: JSON.stringify(data)
      //             })
      //               .then(response => response.json())
      //               .then(responseData => {
      //                 if (responseData.success === true) {
      //                   ht.style.opacity = "1";
      //                   htTextContainer.innerHTML = '<p>' + updatedHt.replace(/\n/g, "<br>") + '</p>';
      //                 }
      //               });
      //           }
      //         );
      //         cancelBtn = document.getElementById('current-comment-cancel-btn');
      //         cancelBtn.addEventListener('click', 
      //           () => {
      //             htTextContainer.innerHTML = '<p>' + htText.replace(/\n/g, "<br>") + '</p>';
      //           }
      //         );
      //   });
      // });
      visibleCards += batchSize; // there is now another 15 new cards visible
    } else {
      console.error("Request failed with status:", response.status);
    }
  } catch (error) {
    console.error("An error occurred:", error); // handle
  }
}
// Event listener for Load More button
loadButton.addEventListener("click", loadCards);