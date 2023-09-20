const cardsContainer = document.getElementById("bmcards-container"); // get the container
const loadButton = document.getElementById("load-button"); // get the button

let visibleCards = 15; // initialize the number of visible cards to 15

// Function to render a card
function renderCard(data) {
  const card = document.createElement("div"); // create a div element
  card.className = "bmcard loadedcard"; // give it these two classes
  card.innerHTML = data; // fill the card with the html code stored in data
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