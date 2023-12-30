const projectCommentsList = document.getElementById('project_comments_list');

projectCommentsList.addEventListener('submit', postSubcomment);

function includeLinks(text) {
  const urlPattern = /(https?:\/\/\S+)/g;
  return text.replace(urlPattern, 
    (match) => {
      return '<a href="' + match + '" target="_blank">' + match + '</a>';
    });
}

async function postSubcomment(event) {
  console.log('postSubcomment in da house');
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
        console.log('23');
        // // the textarea where the user entered text
        // let subcommentInput = activeForm.querySelector('textarea[name="comment_input"]');
        // // empty the textarea 
        // subcommentInput.value = '';

        // two ways of rendering, depending on whether it's the first subcomment or not
        if (activeForm.classList.contains('first-subcomment')) {
          renderFirstSubcomment(data.textContent.replace(/(?:\r\n|\r|\n)/g, '<br>'), data.userAvatarPath, data.userFirstName, projectCommentBody, data.cmId); 
        } else {
          let projectSubcommentsContainer = projectCommentBody.querySelector('.project_subcomments_container');
          let leftbarContainer = projectCommentBody.querySelector('.leftbar_container');
          renderSubsequentSubcomment(data.textContent.replace(/(?:\r\n|\r|\n)/g, '<br>'), data.userAvatarPath, data.userFirstName, projectSubcommentsContainer, data.cmId, leftbarContainer); 
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



let chunk3 = '" class="project_subcomment general_comment"><div class="project_comment_header">';
chunk3 += '<div class="project_comment_header_author"><img src="';
const chunk4 = '" alt="Photo de profil" class="project_comment_header_pic"><h3>';
let chunk5 = '</h3></div><div class="edit-icon-container"><svg class="edit-icon" viewBox="0 0 100 100"';
chunk5 += 'fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="25" cy="25" r="10"/>';
chunk5 += '<circle cx="25" cy="25" r="10"/><circle cx="75" cy="25" r="10"/><circle cx="75" cy="75" r="10"/>';
chunk5 += '<circle cx="25" cy="75" r="10"/></svg><div class="edit-modal dispnone"><ul>';
chunk5 += '<li class="edit-btn"><p>Editer</p></li><li class="delete-btn"><p>Supprimer</p></li></ul></div></div>';
chunk5 += '</div><div class="general_comment_itself_content_container"><p class="comment_itself_content">';
const chunk6 = '</p></div><div class="project_comment_footer"><div class="project_comment_reaction"><div class="reactions_count_icons" data-liked="0" data-cmid="';
const chunk7 = '"><svg width="20" height="20" viewBox="0 0 90 86" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="path1-cm';
const chunk8 = '" class="like-btn-default" d="M18.5 85L1.5 62.5C6.29746 50.4098 10.6441 45.7408 22 42C27.3943 41.2335 30.4774 41.5048 36 43L57.5 43.5C63 44.5 64 52.5 57.5 55.5L38 56C36.5 56.5 36.5 59 38 59.5H58C59.8725 59.1695 60.7786 58.7848 62 57.5L78 42C86.5 39 91 43.5 88 51.5L65.5 74C61.9829 77.7723 59.877 78.8437 56 78.5L45.5 77.5C30.0921 75.2017 23.9499 76.7544 18.5 85Z"/><path id="path2-cm';
const chunk9 = '" class="like-btn-default" d="M85.0062 27.5001C82.0062 32.5 73.5062 38 66.0062 47.5001C64.7149 43.0428 61.5 39 59.0062 39.0001H40.0062C34.1302 38.6457 27 37.5 26.5062 37.0001C0.500718 14.5 29.5 -14 51.0062 11.0001C67.5062 -6.00003 92.0062 0.999996 85.0062 27.5001Z"/></svg><p class="like-btn-default" id="like-count-cm';
const chunk10 = '"></p></div></div><p>';
const chunk11 = '</p></div></div>';
const chunk12 = '</div></div>';




function renderFirstSubcomment(textContent, avatarPath, firstName, projectCommentBody, cmId) {
  let newSubcomment = document.createElement('div');
  const chunk2 = '<div class="leftbar_container"><div class="leftbar"></div><div class="project_subcomments_container"><div data-cmid="';
  let now = new Date();
  let commentOuterHTML = chunk2 + cmId + chunk3 + avatarPath + chunk4 + firstName + chunk5;
  commentOuterHTML += includeLinks(textContent) + chunk6 + cmId + chunk7 + cmId + chunk8 + cmId + chunk9 + cmId + chunk10;
  commentOuterHTML += transformNow(now) + chunk11 + chunk12;
  projectCommentBody.appendChild(newSubcomment);
  newSubcomment.outerHTML = commentOuterHTML;
}

function renderSubsequentSubcomment(textContent, avatarPath, firstName, projectSubcommentsContainer, cmId, leftbarContainer) {
  let newSubcomment = document.createElement('div');
  const chunk2 = '<div data-cmid="';
  let now = new Date();
  let commentOuterHTML = chunk2 + cmId + chunk3 + avatarPath + chunk4 + firstName + chunk5;
  commentOuterHTML += includeLinks(textContent) + chunk6 + cmId + chunk7 + cmId + chunk8 + cmId + chunk9 + cmId + chunk10;
  commentOuterHTML += transformNow(now) + chunk11;
  projectSubcommentsContainer.appendChild(newSubcomment);
  newSubcomment.outerHTML = commentOuterHTML;
  leftbarContainer.classList.remove('dispnone');
  leftbarContainer.classList.add('displayed');
}

function transformNow(now) {
  function conditionalAdd0(month) {
    if (Number(month) < 10) {
      return '0' + month;
    } else {
      return month;
    }
  }
  return conditionalAdd0(now.getDate()) + '/' + conditionalAdd0(now.getMonth()) + '/' + now.getFullYear().toString().slice(2) + ' ' + now.getHours() + ':' + now.getMinutes();
}