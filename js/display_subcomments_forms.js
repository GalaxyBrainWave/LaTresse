const generalContainer = document.getElementById('project_comments_list');

generalContainer.addEventListener('click', openForm);
generalContainer.addEventListener('input', newCommentInputBehavior);


// define newForm chunks here?

function openForm(event) {
  // if the click happens within a button with the class "reply_btn"
  if (event.target && (event.target.classList.contains('reply_btn') || event.target.parentElement.classList.contains('reply_btn') || event.target.parentElement.parentElement.classList.contains('reply_btn'))) {
    const replyButton = event.target.closest('.reply_btn');
    // if the button doesn't have the class "toggled" (meaning the form is already displayed)
    // and if it doesn't have the class multisubcom (meaning there is no subcomment displayed yet)
    if (!replyButton.classList.contains('toggled') && !replyButton.classList.contains('multisubcom')) {
      // in this case, the user is trying to enter the first comment
      const projectCommentBody = event.target.closest('.project_comment_body');
      const commentContainer = projectCommentBody.querySelector('.project_comment_itself');
      const commentId = Number(commentContainer.getAttribute('data-cmid'));
      const newForm = document.createElement('form');
      newForm.classList.add('project_comment_post','subcomment', 'first-subcomment', 'ml48');
      const projectId = document.getElementById('project-id').value;
      const newFormChunk1 = '<textarea name="comment_input" class="comment_input" placeholder="Ajoutez votre réponse"></textarea><input type="hidden" name="pj_id" value="';
      const newFormChunk2 = '"><input type="hidden" name="cm_id" value="';
      const newFormChunk3 = '"><button class="nice-blue-button" id="comment_input_btn"><img class="dblock" src="../img/icons/roundtick_yel.svg"><p>Publier</p></button>';
      newForm.innerHTML = newFormChunk1 + projectId + newFormChunk2 + commentId + newFormChunk3;
      replyButton.classList.add('toggled');
      replyButton.style.display = 'none';
      projectCommentBody.appendChild(newForm);
    } else if (!replyButton.classList.contains('toggled') && replyButton.classList.contains('multisubcom')) {
      const buttonContainer = event.target.closest('.center');
      const leftbarContainer = buttonContainer.previousElementSibling;
      const commentItself = leftbarContainer.previousElementSibling;
      const commentId = Number(commentItself.getAttribute('data-cmid'));
      const newForm = document.createElement('form');
      newForm.classList.add('project_comment_post','subcomment', 'ml48');
      const projectId = document.getElementById('project-id').value;
      const newFormChunk1 = '<textarea name="comment_input" class="comment_input" placeholder="Ajoutez votre réponse"></textarea><input type="hidden" name="pj_id" value="';
      const newFormChunk2 = '"><input type="hidden" name="cm_id" value="';
      const newFormChunk3 = '"><button class="nice-blue-button" id="comment_input_btn"><img class="dblock" src="../img/icons/roundtick_yel.svg"><p>Publier</p></button>';
      newForm.innerHTML = newFormChunk1 + projectId + newFormChunk2 + commentId + newFormChunk3;
      replyButton.classList.add('toggled');
      const projectCommentBody = leftbarContainer.closest('.project_comment_body');
      replyButton.style.display = 'none';
      console.log({projectCommentBody});
      projectCommentBody.appendChild(newForm);
    }
  }
}


function newCommentInputBehavior(event) {
  const commentInput = event.target;
  commentInput.style.height = 'auto';
  commentInput.style.height = (commentInput.scrollHeight) + 'px';
}

