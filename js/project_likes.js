const projectLikeButton = document.querySelector('#project_reaction>.like-btn');

projectLikeButton.addEventListener('click',pjLike);

async function pjLike() {
  projectLikeButton.classList.add('opac50');
  const pjId = +projectLikeButton.getAttribute('data-pj');
  const hasLiked = +projectLikeButton.getAttribute('data-liked');
  const likeCounter = document.getElementById('like-count-pj' + pjId);
  let numberOfLikes = +likeCounter.innerText;
  const path1 = document.getElementById('path1-pj' + pjId);
  const path2 = document.getElementById('path2-pj' + pjId);
  let likeData = {
    pjId: pjId,
    hasLiked: hasLiked,
    userId: userId
  }
  fetch('project_likes.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(likeData)
  })
  .then(response => response.json())
  .then(responseData => {
    if (responseData.success === true) {
      if (hasLiked === 0) {
        projectLikeButton.classList.remove('opac50');
        likeCounter.classList.remove('like-btn-default');
        path1.classList.remove('like-btn-default');
        path2.classList.remove('like-btn-default');
        likeCounter.classList.add('like-btn-active');
        path1.classList.add('like-btn-active');
        path2.classList.add('like-btn-active');
        numberOfLikes++;
        likeCounter.innerText = numberOfLikes;
        projectLikeButton.setAttribute('data-liked', "1");
      } else if (hasLiked === 1) {
        projectLikeButton.classList.remove('opac50');
        likeCounter.classList.remove('like-btn-active');
        path1.classList.remove('like-btn-active');
        path2.classList.remove('like-btn-active');
        likeCounter.classList.add('like-btn-default');
        path1.classList.add('like-btn-default');
        path2.classList.add('like-btn-default');
        numberOfLikes--;
        likeCounter.innerText = numberOfLikes;
        projectLikeButton.setAttribute('data-liked', "0");
      } else {console.log("hasLiked a foiré")}
    } else {console.log("ça n'a pas marché")}
  })
  .catch(error => {console.log(error)});
}
