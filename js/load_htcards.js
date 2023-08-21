const cardsContainer = document.getElementById("bmcards-container");
const loadButton = document.getElementById("load-button");

let visibleCards = 15;

// Function to render a card
function renderCard(data) {
  const card = document.createElement("div");
  card.className = "bmcard loadedcard";
  card.innerHTML = data;
  cardsContainer.appendChild(card);
}

// Function to load and render cards
async function loadCards() {
  const batchSize = 15;
  
  try {
    const response = await fetch("load_htcards.php?offset=" + visibleCards);
    if (response.ok) {
      const responseData = await response.json();
      for (let i = 0; i < responseData.length; i++) {
        renderCard(responseData[i]);
      }
      var loadedImgs = document.querySelectorAll(".loadedcard img");
      console.log(loadedImgs);
      for (let img of loadedImgs) {
        img.addEventListener('click', ()=> {
          bigImg.src = img.src;
          modal.style.display = "grid";
        });
      }
      visibleCards += batchSize;
    } else {
      console.error("Request failed with status:", response.status);
    }
  } catch (error) {
    console.error("An error occurred:", error); // handle
  }
}

// Event listener for Load More button
loadButton.addEventListener("click", loadCards);