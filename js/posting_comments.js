let commentForm = document.getElementById('project-comment-post');

let newComment = document.getElementById('new-comment'); // where the new comment will be inserted on sucess




function renderComment(textContent, avatarPath, firstName) {
  let chunk1 = '<div class="project_comment_header"><img src="';
  let chunk2 = '" alt="Photo de profil" class="project_comment_header_pic"><h3>';
  let chunk3 = '</h3></div><p>';
  let chunk4 = '</p><div class="project_comment_reaction"><div class="reactions_count_icons"><img src="../img/icons/like.png" alt="icone j\'aime" class="project_reaction_icon"><p>0</p></div><button class="reply_btn nice-blue-button"><img class="activity_card_item_icon" src="../img/icons/repondre.svg"><p class="toggle-comment-form">Répondre</p></button><p>0 réponse</p></div>';
  let commentInnerHTML = chunk1 + avatarPath + chunk2 + firstName + chunk3 + textContent + chunk4;
  newComment.classList.add('project_comment_itself');
  newComment.innerHTML = commentInnerHTML;
}


commentForm.addEventListener('submit', postComment);

async function postComment(event) {
  event.preventDefault(); // Prevent claasic form submission
  // let the user know the process is ongoing by setting opacity to 0.5
  commentForm.classList.add('post-loading'); 
  const formData = new FormData(this); // this refers to the form
  fetch('post_comment.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json()) // Encode the response in JSON
  .then(data => {
    if (data.inserted == true) {
      commentForm.classList.remove('post-loading');
      let commentInput = document.getElementById('comment_input'); // the textarea where the user entered text
      commentInput.value = '';
      renderComment(data.textContent.replace(/(?:\r\n|\r|\n)/g, '<br>'), data.userAvatarPath, data.userFirstName); 
    } else {
      console.log('yo');
    }
  })
  .catch(error => {
      console.error('Error:', error);
      // Handle error or update the UI
  });
}
