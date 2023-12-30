const confirmModal = document.getElementById('confirm_modal');
const editModalsList = document.querySelectorAll('.edit-modal');
const yesBtn = document.getElementById('confirm_modal_y');
const noBtn = document.getElementById('confirm_modal_n');
const commentsList = document.getElementById('project_comments_list');
const main = document.getElementById('main-page-projet');
let activeComment = false;

const projectEditIconSupercontainer = document.getElementById('project-edit-icon-supercontainer');

if (projectEditIconSupercontainer) {
  const editProjectBtn = projectEditIconSupercontainer.querySelector('.edit-btn');
  editProjectBtn.addEventListener('click', editProject);
  const deleteProjectBtn = projectEditIconSupercontainer.querySelector('.delete-btn');
  deleteProjectBtn.addEventListener('click', deleteProject);
}

function includeLinks(text) {
  const urlPattern = /(https?:\/\/\S+)/g;
  return text.replace(urlPattern, 
    (match) => {
      return '<a href="' + match + '" target="_blank">' + match + '</a>';
    });
}

function deleteProject() {
  const projectEditModal = projectEditIconSupercontainer.querySelector('.edit-modal');
  projectEditModal.classList.add('dispnone');
  confirmModal.classList.remove('dispnone');
  yesBtn.addEventListener('click', yesDelete);
}

function yesDelete() {
  confirmModal.classList.add('opac50');
    const data = {
      pjId: pjId,
      action: 'delete'
    };
    fetch('edit_projects.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(responseData => {
      if(responseData.success === true) {
        confirmModal.classList.remove('opac50');
        const confirmMessage = document.getElementById('confirm-message');
        confirmMessage.innerText = 'Votre projet a été supprimé avec succès';
        noBtn.classList.add('dispnone');
        yesBtn.innerText = 'Retour à l\'accueil';
        yesBtn.removeEventListener('click', yesDelete);
        yesBtn.addEventListener('click', () => {window.location.href = "rsaccueil.php"});
      }
    });
}

function editProject() {
  const projectEditModal = projectEditIconSupercontainer.querySelector('.edit-modal');
  projectEditModal.classList.add('dispnone');
  const projectTitleContainer = document.getElementById('project-title-container');
  const h1 = document.getElementById('project-title');
  const initialTitle = h1.innerText;
  projectTitleContainer.innerHTML = '<div id="title-input-container"><input type="text" id="title-input" placeholder="Ajoutez votre titre"></div>';
  const titleInput = document.getElementById('title-input');
  titleInput.value = initialTitle;
  const descriptionContainer = document.getElementById('description-container');
  const description = document.getElementById('description');
  const initialDescriptionText = description.innerText;
  descriptionContainer.innerHTML = '<textarea id="description-input" class="comment_input" placeholder="Ajoutez votre description">' + initialDescriptionText + '</textarea><div class="edit-comment-btn-ctner"><button id="description-update-btn" class="nice-blue-button">Valider</button><button id="description-cancel-btn" class="nice-blue-button">Annuler</button></div>';
  const descriptionInput = document.getElementById("description-input");
  // descriptionInput.style.height = 'auto';
  descriptionInput.style.height = (descriptionInput.scrollHeight) + 'px';
  descriptionInput.addEventListener('input', 
    () => {
      descriptionInput.style.height = 'auto';
      descriptionInput.style.height = (descriptionInput.scrollHeight) + 'px';
    }
  );
  const descriptionCancelBtn = document.getElementById("description-cancel-btn");
  descriptionCancelBtn.addEventListener('click',
    () => {
      projectTitleContainer.innerHTML = '<h1 id="project-title">' + initialTitle + '</h1>';
      descriptionContainer.innerHTML = '<p id="description">' + initialDescriptionText.replace(/\n/g, "<br>") + '</p>';
    }
  );
  const descriptionUpdateBtn = document.getElementById("description-update-btn");
  descriptionUpdateBtn.addEventListener('click',
    () => {
      const projectPresentation = document.getElementById("project-presentation");
      projectPresentation.classList.add('opac50');
      const newTitle = titleInput.value;
      const newDescription = descriptionInput.value;
      const data = {
        pjId: pjId,
        newTitle: newTitle,
        newDescription: newDescription,
        action: 'update'
      }
      fetch('edit_projects.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      })
      .then(response => response.json())
      .then(responseData => {
        if(responseData.success === true) {
          projectPresentation.classList.remove('opac50');
          projectTitleContainer.innerHTML = '<h1 id="project-title">' + newTitle + '</h1>';
          descriptionContainer.innerHTML = '<p id="description">' + newDescription.replace(/\n/g, "<br>") + '</p>';         
        }
      });
    }
  );
}

commentsList.addEventListener('click', editComments);

function editComments(event) {
  const target = event.target;
  // delete
  if (target.classList.contains('delete-btn') || target.parentElement.classList.contains('delete-btn')) {
    const comment = target.closest('.general_comment');
    let cmId = comment.getAttribute('data-cmid');
    // confirmModal.setAttribute('data-cmid', cmId);
    confirmModal.classList.remove('dispnone');
    const commentBody = comment.closest('.project_comment_body');
    // if it's a subcomment or a comment without replies
    if (comment.classList.contains('project_subcomment') || !commentBody.querySelector('.leftbar_container')) {
      yesBtn.addEventListener('click', () => {
        confirmModal.style.opacity = "0.5";
          const data = {
            cmId: cmId,
            type: 'subcomment/commentWithoutChildren',
            action: 'delete'
          };
          fetch('edit_comments.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          })
          .then(response => response.json())
          .then(responseData => {
            if(responseData.success === true) {
              confirmModal.classList.add('dispnone');
              confirmModal.style.opacity = "1";
              editModalsList.forEach(modal => {
                modal.classList.add('dispnone');
              });
              // if it's a comment without replies
              if (!comment.classList.contains('project_subcomment') && !comment.querySelector('.leftbar_container')) {
                let commentBody = comment.closest('.project_comment_body');
                commentBody.classList.add('dispnone');
                return ;
              } else {
                comment.classList.add('dispnone');
                return ;
              }
            }
          })

      });
      // if the comment has at least one subcomment
    } else if (comment.classList.contains('project_comment_itself') && commentBody.querySelector('.leftbar_container')) {
      yesBtn.addEventListener('click', () => {
        confirmModal.style.opacity = "0.5";
          const data = {
            cmId: cmId,
            type: 'comment',
            action: 'delete'
          };
          fetch('edit_comments.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          })
          .then(response => response.json())
          .then(responseData => {
            if(responseData.success === true) {
              confirmModal.classList.add('dispnone');
              confirmModal.style.opacity = "1";
              editModalsList.forEach(modal => {
                modal.classList.add('dispnone');
              });
              const commentTextContent = comment.querySelector('.comment_itself_content');
              commentTextContent.innerHTML = 'Ce commentaire a été effacé par son auteur.e';
              return ;
            }
          })
        // } else {
        //   confirmModal.classList.add('dispnone');
        // }
      });
    } else {
      // à finir
      //yesBtn.addEventListener('click', () => {
    }
  }
  // update
  else if (target.classList.contains('edit-btn') || target.parentElement.classList.contains('edit-btn')) {
    const currentEditModal = target.closest('.edit-modal');
    currentEditModal.classList.add('dispnone');
    const updateBtnContainer = target.closest('.general_comment');
    const commentTextContainer = updateBtnContainer.querySelector('.general_comment_itself_content_container');
    const commentText = commentTextContainer.querySelector('p.comment_itself_content').innerText;
    commentTextContainer.innerHTML = '<textarea id="update-comment_input" class="comment_input" placeholder="Ajoutez votre commentaire">' + commentText + '</textarea><div class="edit-comment-btn-ctner"><button id="current-comment-edit-btn" class="nice-blue-button">Valider</button><button id="current-comment-cancel-btn" class="nice-blue-button">Annuler</button></div>';
    const txtArea = document.getElementById('update-comment_input');
    txtArea.style.height = 'auto';
    txtArea.style.height = (txtArea.scrollHeight) + 'px';
    txtArea.addEventListener('input', () => {
      txtArea.style.height = 'auto';
      txtArea.style.height = (txtArea.scrollHeight) + 'px';
    });
    const validateUpdateBtn = document.getElementById('current-comment-edit-btn');
    validateUpdateBtn.addEventListener('click',
      () => {
        commentTextContainer.style.opacity = "0.5";
        const updatedComment = txtArea.value; // Use .value instead of .innerText for textarea
        const comment = target.closest('.general_comment'); // Fix typo here (btn -> updateBtn)
        const cmId = comment.getAttribute('data-cmid');
        const data = {
          cmId: cmId,
          type: 'comment',
          action: 'update',
          content: updatedComment
        };
        fetch('edit_comments.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        })
          .then(response => response.json())
          .then(responseData => {
            if (responseData.success === true) {
              commentTextContainer.style.opacity = "1";
              commentTextContainer.innerHTML = '<p class="comment_itself_content">' + includeLinks(updatedComment).replace(/\n/g, "<br>") + '</p>';
            }
          });
      }
    );
    const cancelBtn = document.getElementById('current-comment-cancel-btn');
    cancelBtn.addEventListener('click', 
      () => {
        commentTextContainer.innerHTML = '<p class="comment_itself_content">' + includeLinks(commentText).replace(/\n/g, "<br>") + '</p>';
      }
    );
  }
}

main.addEventListener('click', openEditModals);

function openEditModals(event) {
  const currentEditModal = event.target;
  if (currentEditModal.classList.contains('edit-icon-container') || currentEditModal.parentElement.classList.contains('edit-icon-container') || currentEditModal.parentElement.parentElement.classList.contains('edit-icon-container')) {
    const container = currentEditModal.closest('.edit-icon-container');
    const modal = container.querySelector('.edit-modal');
    if (modal.classList.contains('dispnone')) {
      modal.classList.remove('dispnone');
    } else {
      modal.classList.add('dispnone');
    }
  }
}





// editBtnList.forEach(btn => {
//   btn.addEventListener('click',() => {
//     let modal = btn.querySelector('.edit-modal');
//     if (modal.classList.contains('dispnone')) {
//       modal.classList.remove('dispnone');
//     } else {
//       modal.classList.add('dispnone');
//     }
//   });
// });



// deleteBtnList.forEach(btn => {
//   btn.addEventListener('click',() => {
//     const comment = btn.closest('.general_comment');
//     let cmId = comment.getAttribute('data-cmid');
//     // confirmModal.setAttribute('data-cmid', cmId);
//     confirmModal.classList.remove('dispnone');
//     const commentBody = comment.closest('.project_comment_body');
//     // if it's a subcomment or a comment without replies
//     if (comment.classList.contains('project_subcomment') || !commentBody.querySelector('.leftbar_container')) {
//       yesBtn.addEventListener('click', () => {
//         confirmModal.style.opacity = "0.5";
//           const data = {
//             cmId: cmId,
//             type: 'subcomment/commentWithoutChildren',
//             action: 'delete'
//           };
//           fetch('edit_comments.php', {
//             method: 'POST',
//             headers: {
//               'Content-Type': 'application/json'
//             },
//             body: JSON.stringify(data)
//           })
//           .then(response => response.json())
//           .then(responseData => {
//             if(responseData.success === true) {
//               confirmModal.classList.add('dispnone');
//               confirmModal.style.opacity = "1";
//               // confirmModal.setAttribute('data-cmid', '0');
//               editModalsList.forEach(modal => {
//                 modal.classList.add('dispnone');
//               });
//               // if it's a comment without replies
//               if (!comment.classList.contains('project_subcomment') && !comment.querySelector('.leftbar_container')) {
//                 let commentBody = comment.closest('.project_comment_body');
//                 commentBody.classList.add('dispnone');
//                 return ;
//               } else {
//                 comment.classList.add('dispnone');
//                 return ;
//               }
//             }
//           })

//       });
//       // if the comment has at least one subcomment
//     } else if (comment.classList.contains('project_comment_itself') && commentBody.querySelector('.leftbar_container')) {
//       yesBtn.addEventListener('click', () => {
//         confirmModal.style.opacity = "0.5";
//           const data = {
//             cmId: cmId,
//             type: 'comment',
//             action: 'delete'
//           };
//           fetch('edit_comments.php', {
//             method: 'POST',
//             headers: {
//               'Content-Type': 'application/json'
//             },
//             body: JSON.stringify(data)
//           })
//           .then(response => response.json())
//           .then(responseData => {
//             if(responseData.success === true) {
//               confirmModal.classList.add('dispnone');
//               confirmModal.style.opacity = "1";
//               // confirmModal.setAttribute('data-cmid', '0');
//               editModalsList.forEach(modal => {
//                 modal.classList.add('dispnone');
//               });
//               const commentTextContent = comment.querySelector('.comment_itself_content');
//               commentTextContent.innerHTML = 'Ce commentaire a été effacé par son auteur.e';
//               // const avatar = comment.querySelector('.project_comment_header_pic');
//               // avatar.src = '../img/users/default_avatar.png';
//               // const firstName = comment.querySelector('h3');
//               // firstName.innerHTML = '';
//               // const commentFooter = comment.querySelector('.project_comment_footer');
//               // commentFooter.classList.add('dispnone');
//               return ;
//             }
//           })
//         // } else {
//         //   confirmModal.classList.add('dispnone');
//         // }
//       });
//     } else {
//       // à finir
//       //yesBtn.addEventListener('click', () => {
//     }

//   });
// });



// updateBtnList.forEach(
//   (updateBtn) => {
//     updateBtn.addEventListener('click',
//       (e) => {
//         const currentBtn = e.target;
//         const updateBtnContainer = currentBtn.closest('.general_comment');
//         const commentTextContainer = updateBtnContainer.querySelector('.general_comment_itself_content_container');
//         const commentText = commentTextContainer.querySelector('p.comment_itself_content').innerText;
//         commentTextContainer.innerHTML = '<textarea id="update-comment_input" class="comment_input" placeholder="Ajoutez votre commentaire">' + commentText + '</textarea><div class="edit-comment-btn-ctner"><button id="current-comment-edit-btn" class="nice-blue-button">Valider</button><button id="current-comment-cancel-btn" class="nice-blue-button">Annuler</button></div>';
//         const txtArea = document.getElementById('update-comment_input');
//         txtArea.style.height = 'auto';
//         txtArea.style.height = (txtArea.scrollHeight) + 'px';
//         txtArea.addEventListener('input', () => {
//           txtArea.style.height = 'auto';
//           txtArea.style.height = (txtArea.scrollHeight) + 'px';
//         });
//         validateUpdateBtn = document.getElementById('current-comment-edit-btn');
//         validateUpdateBtn.addEventListener('click',
//           () => {
//             commentTextContainer.style.opacity = "0.5";
//             const updatedComment = txtArea.value; // Use .value instead of .innerText for textarea
//             const comment = updateBtn.closest('.general_comment'); // Fix typo here (btn -> updateBtn)
//             const cmId = comment.getAttribute('data-cmid');
//             const data = {
//               cmId: cmId,
//               type: 'comment',
//               action: 'update',
//               content: updatedComment
//             };
//             fetch('edit_comments.php', {
//               method: 'POST',
//               headers: {
//                 'Content-Type': 'application/json'
//               },
//               body: JSON.stringify(data)
//             })
//               .then(response => response.json())
//               .then(responseData => {
//                 if (responseData.success === true) {
//                   commentTextContainer.style.opacity = "1";
//                   commentTextContainer.innerHTML = '<p class="comment_itself_content">' + updatedComment.replace(/\n/g, "<br>") + '</p>';
//                 }
//               });
//           }
//         );
//       }
//     );
//   }
// );



noBtn.addEventListener('click', () => {
  confirmModal.classList.add('dispnone');
  // confirmModal.setAttribute('data-cmid', '0');
});