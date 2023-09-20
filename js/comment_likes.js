// generalContainer is defined in displya_subcomments_forms as
// const generalContainer = document.getElementById('project_comments_list');
generalContainer.addEventListener('click', cmLike);

async function cmLike(event) {
  if (event.target && (event.target.classList.contains('reactions_count_icons') || event.target.parentElement.classList.contains('reactions_count_icons') || event.target.parentElement.parentElement.classList.contains('reactions_count_icons'))) {
    console.log('cmLike in da house');
    const clickedCmLike = event.target;
    const reactionsCountIcons = clickedCmLike.closest('.reactions_count_icons');
    reactionsCountIcons.classList.add('opac50');
    const cmId = +reactionsCountIcons.getAttribute('data-cmid');
    const hasLiked = +reactionsCountIcons.getAttribute('data-liked');
    const likeCounter = document.getElementById('like-count-cm' + cmId);
    let numberOfLikes = +likeCounter.innerText;
    const path1 = document.getElementById('path1-cm' + cmId);
    const path2 = document.getElementById('path2-cm' + cmId);
    const likeData = {
      cmId: cmId,
      hasLiked: hasLiked,
      userId: userId
    }
    fetch('comment_likes.php', {
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
          reactionsCountIcons.classList.remove('opac50');
          likeCounter.classList.remove('like-btn-default');
          path1.classList.remove('like-btn-default');
          path2.classList.remove('like-btn-default');
          likeCounter.classList.add('like-btn-active');
          path1.classList.add('like-btn-active');
          path2.classList.add('like-btn-active');
          numberOfLikes++;
          likeCounter.innerText = numberOfLikes;
          reactionsCountIcons.setAttribute('data-liked', "1");
        } else if (hasLiked === 1) {
          reactionsCountIcons.classList.remove('opac50');
          likeCounter.classList.remove('like-btn-active');
          path1.classList.remove('like-btn-active');
          path2.classList.remove('like-btn-active');
          likeCounter.classList.add('like-btn-default');
          path1.classList.add('like-btn-default');
          path2.classList.add('like-btn-default');
          numberOfLikes--;
          likeCounter.innerText = numberOfLikes;
          reactionsCountIcons.setAttribute('data-liked', "0");
        } else {console.log("hasLiked a foiré")}
      } else {console.log("ça n'a pas marché")}
    })
    .catch(error => {console.log(error)});
  }


}