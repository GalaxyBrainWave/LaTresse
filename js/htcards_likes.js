const bmCardsContainer = document.getElementById('bmcards-container');

// Get the button that opens the modal
var likeButtonsList = document.getElementsByClassName("ht-like-btn");

for (let likeButton of likeButtonsList) {
  likeButton.addEventListener('click', htlike);
}


function htlike(event) {
  let clickedElement = event.target;
  let currentLikeIcon = clickedElement.closest('.ht-like-btn');
  currentLikeIcon.classList.add('opac50');
  let cardId = currentLikeIcon.getAttribute('data-card');
  let hasLiked = currentLikeIcon.getAttribute('data-liked');
  let likeCounter = document.getElementById('like-count-' + cardId);
  let numberOfLikes = +likeCounter.innerText;
  let path1 = document.getElementById('path1-' + cardId);
  let path2 = document.getElementById('path2-' + cardId);
  let likeData = {
    cardId: cardId,
    hasLiked: hasLiked,
    userId: userId
  }
  fetch('htcards_like.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(likeData)
  })
  .then(response => response.json())
  .then(responseData => {
    if (responseData.success === true) {
      if (hasLiked === "0") {
        currentLikeIcon.classList.remove('opac50');
        likeCounter.classList.remove('like-btn-default');
        path1.classList.remove('like-btn-default');
        path2.classList.remove('like-btn-default');
        likeCounter.classList.add('like-btn-active');
        path1.classList.add('like-btn-active');
        path2.classList.add('like-btn-active');
        numberOfLikes++;
        likeCounter.innerText = numberOfLikes;
        currentLikeIcon.setAttribute('data-liked', "1");
      } else if (hasLiked === "1") {
        currentLikeIcon.classList.remove('opac50');
        likeCounter.classList.remove('like-btn-active');
        path1.classList.remove('like-btn-active');
        path2.classList.remove('like-btn-active');
        likeCounter.classList.add('like-btn-default');
        path1.classList.add('like-btn-default');
        path2.classList.add('like-btn-default');
        numberOfLikes--;
        likeCounter.innerText = numberOfLikes;
        currentLikeIcon.setAttribute('data-liked', "0");
      } else {console.log("hasLiked a foiré")}
    } else {console.log("ça n'a pas marché")}
  })
  .catch(error => {console.log(error)});
}