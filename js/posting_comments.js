let commentForm = document.getElementById('project-comment-post');
// let commentInput = document.getElementById('comment_input'); // the textarea where the user entered text
let newComment = document.getElementById('new-comment'); // where the new comment will be inserted on sucess

let chunk1 = '<div class="project_comment_header"><img src="';
let chunk2 = '" alt="Photo de profil" class="project_comment_header_pic"><h3>';
let chunk3 = '</h3></div><p>';
let chunk4 = '</p><div class="project_comment_reaction"><div class="reactions_count_icons"><img src="../img/icons/like.png" alt="icone j\'aime" class="project_reaction_icon"><p>0</p></div><button class="reply_btn"><svg class="activity_card_item_icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#ffe154" fill-rule="evenodd" d="M2 6a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7.667a1 1 0 0 0-.6.2L3.6 21.8A1 1 0 0 1 2 21V6zm5 0a1 1 0 0 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2H7z" clip-rule="evenodd"></path></g></svg><p class="toggle-comment-form">Répondre</p></button><p>0 réponse</p></div>';


function renderComment(textContent, avatarPath, firstName) {
  var commentInnerHTML = chunk1 + avatarPath + chunk2 + firstName + chunk3 + textContent + chunk4;
  newComment.classList.add('project_comment_itself');
  newComment.innerHTML = commentInnerHTML;
}


commentForm.addEventListener('submit', postComment);

async function postComment(event) {
  event.preventDefault(); // Prevent form submission
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
      renderComment(data.textContent, data.userAvatarPath, data.userFirstName); 
    } else {
      console.log('yo');
    }
  })
  // .catch(error => {
  //     console.error('Error:', error);
  //     // Handle error or update the UI
  // });
}
