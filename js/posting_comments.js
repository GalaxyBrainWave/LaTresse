let commentForm = document.getElementById('project-comment-post');

let newComment = document.getElementById('new-comment'); // where the new comment will be inserted on sucess




function renderComment(textContent, avatarPath, firstName, cmId) {
  let chunk1 = '<div class="project_comment_header"><img src="';
  let chunk2 = '" alt="Photo de profil" class="project_comment_header_pic"><h3>';
  let chunk3 = '</h3></div><p>';
  let chunk4 = '</p><div class="project_comment_reaction"><div class="reactions_count_icons"><svg width="20" height="20" viewBox="0 0 90 86" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="path1-cm';
  let chunk5 = '" class="like-btn-default" d="M18.5 85L1.5 62.5C6.29746 50.4098 10.6441 45.7408 22 42C27.3943 41.2335 30.4774 41.5048 36 43L57.5 43.5C63 44.5 64 52.5 57.5 55.5L38 56C36.5 56.5 36.5 59 38 59.5H58C59.8725 59.1695 60.7786 58.7848 62 57.5L78 42C86.5 39 91 43.5 88 51.5L65.5 74C61.9829 77.7723 59.877 78.8437 56 78.5L45.5 77.5C30.0921 75.2017 23.9499 76.7544 18.5 85Z"/><path id="path2-cm';
  let chunk6 = '" class="like-btn-default" d="M85.0062 27.5001C82.0062 32.5 73.5062 38 66.0062 47.5001C64.7149 43.0428 61.5 39 59.0062 39.0001H40.0062C34.1302 38.6457 27 37.5 26.5062 37.0001C0.500718 14.5 29.5 -14 51.0062 11.0001C67.5062 -6.00003 92.0062 0.999996 85.0062 27.5001Z"/></svg><p class="like-btn-default" id="like-count-cm';
  let chunk7 = '</p>';
  let commentInnerHTML = chunk1 + avatarPath + chunk2 + firstName + chunk3 + textContent + chunk4 + cmId + chunk5 + cmId + chunk6 + cmId + chunk7;
  newComment.classList.add('project_comment_itself');
  newComment.innerHTML = commentInnerHTML;
  commentInput.style.height = '40px';
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
      renderComment(data.textContent.replace(/(?:\r\n|\r|\n)/g, '<br>'), data.userAvatarPath, data.userFirstName, data.cmId); 
    } else {
      console.log('yo');
    }
  })
  .catch(error => {
      console.error('Error:', error);
      // Handle error or update the UI
  });
}
