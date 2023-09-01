const generalContainer = document.getElementById('project_comments_list');

generalContainer.addEventListener('click', openForm);

function openForm(event) {
  if (event.target && event.target.classList.contains('toggle-comment-form')) {
    let commentContainer = event.target.closest('.project_comment_itself');
    let newForm = document.createElement('form');
    newForm.classList.add('project_comment_post');
    let projectId = document.getElementById('project-id').value;
    let newFormChunk1 = '<textarea name="comment_input" id="comment_input" class="comment_input" placeholder="Ajoutez votre commentaire"></textarea><input type="hidden" name="pj_id" value="';
    let newFormChunk2 = '"><button class="nice-blue-button" id="comment_input_btn"><svg class="dblock" width="12px" height="12px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM16.7682 9.64018C17.1218 9.21591 17.0645 8.58534 16.6402 8.23178C16.2159 7.87821 15.5853 7.93554 15.2318 8.35982L11.6338 12.6774C11.2871 13.0934 11.0922 13.3238 10.9366 13.4653L10.9306 13.4707L10.9242 13.4659C10.7564 13.339 10.5415 13.1272 10.1585 12.7443L8.70711 11.2929C8.31658 10.9024 7.68342 10.9024 7.29289 11.2929C6.90237 11.6834 6.90237 12.3166 7.29289 12.7071L8.74428 14.1585L8.78511 14.1993L8.78512 14.1993C9.11161 14.526 9.4257 14.8402 9.71794 15.0611C10.0453 15.3087 10.474 15.5415 11.0234 15.5165C11.5728 15.4916 11.9787 15.221 12.2823 14.9448C12.5534 14.6983 12.8377 14.3569 13.1333 14.0021L13.1333 14.0021L13.1703 13.9577L16.7682 9.64018Z" fill="#fbd629"></path></g></svg><p>Publier</p></button>';
    newForm.innerHTML = newFormChunk1 + projectId + newFormChunk2;
    commentContainer.appendChild(newForm);
  }
}


