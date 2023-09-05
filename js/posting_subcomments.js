const projectCommentsList = document.getElementById('project_comments_list');

projectCommentsList.addEventListener('submit', postSubcomment);

async function postSubcomment(event) {
  event.preventDefault(); // Prevent claasic form submission
  let activeForm = event.target; // get a reference to the form that triggered the event
  // double check this is about posting a subcomment
  if (activeForm.classList.contains('subcomment')) { 
    // let the user know the process is ongoing by setting opacity to 0.5
    activeForm.classList.add('post-loading'); 
    let projectCommentBody = event.target.closest('.project_comment_body');
    const formData = new FormData(activeForm); // this refers to the form
    fetch('post_comment.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json()) // Encode the response in JSON
    .then(data => {
      if (data.inserted == true) {
        activeForm.style.display = 'none';
        // // the textarea where the user entered text
        // let subcommentInput = activeForm.querySelector('textarea[name="comment_input"]');
        // // empty the textarea 
        // subcommentInput.value = '';

        // two ways of rendering, depending on whether it's the first subcomment or not
        if (activeForm.classList.contains('first-subcomment')) {
          renderFirstSubcomment(data.textContent.replace(/(?:\r\n|\r|\n)/g, '<br>'), data.userAvatarPath, data.userFirstName, projectCommentBody); 
        } else {
          let projectSubcommentsContainer = projectCommentBody.querySelector('.project_subcomments_container');
          renderSubsequentSubcomment(data.textContent.replace(/(?:\r\n|\r|\n)/g, '<br>'), data.userAvatarPath, data.userFirstName, projectSubcommentsContainer); 
        }

      } else {
        console.log('yo');
      }
    })
    .catch(error => {
        console.error('Error:', error);
        // Handle error or update the UI
    });
  }
}

function renderFirstSubcomment(textContent, avatarPath, firstName, projectCommentBody) {
  let newSubcomment = document.createElement('div');
  newSubcomment.classList.add('leftbar_container');
  let subcommentPart1 = '<div class="leftbar"></div>';
  subcommentPart1 += '<div class="project_subcomments_container">';
  subcommentPart1 += '<div class="project_subcomment">';
  subcommentPart1 += '<div class="project_subcomment_header">';
  subcommentPart1 += '<img src="';
  let subcommentPart2 = '" alt="Photo de profil" class="project_comment_header_pic">';
  subcommentPart2 += '<h3>';
  let subcommentPart3 = '</h3></div><p>';
  let subcommentPart4 = '</p><div class="project_subcomment_reaction">';
  subcommentPart4 += '<div class="reactions_count_icons">';
  // this will have to be refactored to make likes work
  subcommentPart4 += '<img src="../img/icons/like.png" alt="icone j\'aime" class="project_reaction_icon">';
  subcommentPart4 += '<p>0</p></div></div></div></div></div>';
  let subcommentInnerHTML = subcommentPart1 + avatarPath + subcommentPart2 + firstName + subcommentPart3 + textContent + subcommentPart4;
  newSubcomment.innerHTML = subcommentInnerHTML;
  projectCommentBody.appendChild(newSubcomment);
}

function renderSubsequentSubcomment(textContent, avatarPath, firstName, projectSubcommentsContainer) {
  let newSubcomment = document.createElement('div');
  newSubcomment.classList.add('project_subcomment');
  let subcommentPart1 = '<div class="project_subcomment_header"><img src="';
  let subcommentPart2 = '" alt="Photo de profil" class="project_comment_header_pic"><h3>';
  let subcommentPart3 = '</h3></div><p>';
  let subcommentPart4 = '</p><div class="project_subcomment_reaction">';
  subcommentPart4 += '<div class="reactions_count_icons">';
  // this will have to be refactored to make likes work
  subcommentPart4 += '<img src="../img/icons/like.png" alt="icone j\'aime" class="project_reaction_icon">';
  subcommentPart4 += '<p>0</p></div></div></div></div></div>';
  let subcommentInnerHTML = subcommentPart1 + avatarPath + subcommentPart2 + firstName + subcommentPart3 + textContent + subcommentPart4;
  newSubcomment.innerHTML = subcommentInnerHTML;
  projectSubcommentsContainer.appendChild(newSubcomment);
}