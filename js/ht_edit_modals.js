const confirmModal = document.getElementById('confirm_modal');
const yesBtn = document.getElementById('confirm_modal_y');
const noBtn = document.getElementById('confirm_modal_n');
const BMCardsContainer = document.getElementById('bmcards-container');
let editBtnList = document.querySelectorAll('.edit-icon-container');
let deleteBtnList = document.querySelectorAll('.delete-btn');
let updateBtnList = document.querySelectorAll('.edit-btn');


function includeLinks(text) {
  const urlPattern = /(https?:\/\/\S+)/g;
  return text.replace(urlPattern, 
    (match) => {
      return '<a href="' + match + '" target="_blank">' + match + '</a>';
    });
}

// function removeLinks(textContainer) {
//   const links = textContainer.getElementsByTagName('a');
//   for (let i = 0; i < links.length; i++) {
//       let link = links[i];
//       let textContent = document.createTextNode(link.textContent);
//       link.parentNode.replaceChild(textContent, link);
//     }
// }

noBtn.addEventListener('click', () => {
  confirmModal.classList.add('dispnone');
});

const editModals = (event) => {
  const target = event.target;
  if (target.classList.contains('edit-icon-container') || target.parentElement.classList.contains('edit-icon-container') || target.parentElement.parentElement.classList.contains('edit-icon-container')) {
    const editContainer = target.closest('.edit-container');
    let modal = editContainer.querySelector('.edit-modal');
    if (modal.classList.contains('dispnone')) {
      modal.classList.remove('dispnone');
    } else {
      modal.classList.add('dispnone');
    }
  } else if (target.classList.contains('delete-btn') || target.parentElement.classList.contains('delete-btn')) {
    const editContainer = target.closest('.edit-container');
    let modal = editContainer.querySelector('.edit-modal');
    if (!modal.classList.contains('dispnone')) {
      modal.classList.add('dispnone');
    }
    const ht = target.closest('.bmcard');
    const htId = ht.getAttribute('data-htid');
    confirmModal.classList.remove('dispnone');
    yesBtn.addEventListener('click', () => {
      confirmModal.style.opacity = "0.5";
      ht.style.opacity = "0.5";
      const data = {
        htId: htId,
        action: 'delete'
      };
      fetch('edit_ht.php', {
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
          ht.classList.add('dispnone');
        }
      });
    });
  } else if (target.classList.contains('edit-btn') || target.parentElement.classList.contains('edit-btn')) {
    const editContainer = target.closest('.edit-container');
    let modal = editContainer.querySelector('.edit-modal');
    if (!modal.classList.contains('dispnone')) {
      modal.classList.add('dispnone');
    }
    const ht = target.closest('.bmcard');
    const htId = ht.getAttribute('data-htid');
    const htTextContainer = ht.querySelector('.bmcard_txt');
    const htText = htTextContainer.querySelector('p').innerText;
    htTextContainer.innerHTML = '<textarea id="update-ht-input" class="comment_input" placeholder="Ajoutez votre commentaire">' + htText + '</textarea><div class="edit-comment-btn-ctner"><button id="current-comment-edit-btn" class="nice-blue-button">Valider</button><button id="current-comment-cancel-btn" class="nice-blue-button">Annuler</button></div>';
    const txtArea = document.getElementById('update-ht-input');
    txtArea.style.height = 'auto';
    txtArea.style.height = (txtArea.scrollHeight) + 'px';
    txtArea.addEventListener('input', () => {
      txtArea.style.height = 'auto';
      txtArea.style.height = (txtArea.scrollHeight) + 'px';
    });
    validateUpdateBtn = document.getElementById('current-comment-edit-btn');
    validateUpdateBtn.addEventListener('click',
      () => {
        ht.style.opacity = "0.5";
        const updatedHt = document.getElementById('update-ht-input').value; // Use .value instead of .innerText for textarea
        const data = {
          htId: htId,
          action: 'update',
          content: updatedHt
        };
        fetch('edit_ht.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        })
          .then(response => response.json())
          .then(responseData => {
            if (responseData.success === true) {
              ht.style.opacity = "1";
              htTextContainer.innerHTML = '<p>' + includeLinks(updatedHt).replace(/\n/g, "<br>") + '</p>';
            }
          });
      }
    );
    cancelBtn = document.getElementById('current-comment-cancel-btn');
    cancelBtn.addEventListener('click', 
      () => {
        htTextContainer.innerHTML = '<p>' + includeLinks(htText).replace(/\n/g, "<br>") + '</p>';
      }
    );
  }
}

BMCardsContainer.addEventListener('click', editModals);


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
//     const ht = btn.closest('.bmcard');
//     const htId = ht.getAttribute('data-htid');
//     confirmModal.classList.remove('dispnone');
//     yesBtn.addEventListener('click', () => {
//       confirmModal.style.opacity = "0.5";
//       ht.style.opacity = "0.5";
//         const data = {
//           htId: htId,
//           action: 'delete'
//         };
//         fetch('edit_ht.php', {
//           method: 'POST',
//           headers: {
//             'Content-Type': 'application/json'
//           },
//           body: JSON.stringify(data)
//         })
//         .then(response => response.json())
//         .then(responseData => {
//           if(responseData.success === true) {
//             confirmModal.classList.add('dispnone');
//             confirmModal.style.opacity = "1";
//             ht.classList.add('dispnone');
//           }
//         });
//       });
//     });
// });


// updateBtnList.forEach(
//   (updateBtn) => {
//     updateBtn.addEventListener('click',
//       (e) => {
//         const currentBtn = e.target;
//         const ht = currentBtn.closest('.bmcard');
//         const htId = ht.getAttribute('data-htid');
//         const htTextContainer = ht.querySelector('.bmcard_txt');
//         const htText = htTextContainer.querySelector('p').innerText;
//         htTextContainer.innerHTML = '<textarea id="update-ht-input" class="comment_input" placeholder="Ajoutez votre commentaire">' + htText + '</textarea><div class="edit-comment-btn-ctner"><button id="current-comment-edit-btn" class="nice-blue-button">Valider</button><button id="current-comment-cancel-btn" class="nice-blue-button">Annuler</button></div>';
//         const txtArea = document.getElementById('update-ht-input');
//         txtArea.style.height = 'auto';
//         txtArea.style.height = (txtArea.scrollHeight) + 'px';
//         txtArea.addEventListener('input', () => {
//           txtArea.style.height = 'auto';
//           txtArea.style.height = (txtArea.scrollHeight) + 'px';
//         });
//         validateUpdateBtn = document.getElementById('current-comment-edit-btn');
//         validateUpdateBtn.addEventListener('click',
//           () => {
//             ht.style.opacity = "0.5";
//             const updatedHt = document.getElementById('update-ht-input').value; // Use .value instead of .innerText for textarea
//             const data = {
//               htId: htId,
//               action: 'update',
//               content: updatedHt
//             };
//             fetch('edit_ht.php', {
//               method: 'POST',
//               headers: {
//                 'Content-Type': 'application/json'
//               },
//               body: JSON.stringify(data)
//             })
//               .then(response => response.json())
//               .then(responseData => {
//                 if (responseData.success === true) {
//                   ht.style.opacity = "1";
//                   htTextContainer.innerHTML = '<p>' + updatedHt.replace(/\n/g, "<br>") + '</p>';
//                 }
//               });
//           }
//         );
//         cancelBtn = document.getElementById('current-comment-cancel-btn');
//         cancelBtn.addEventListener('click', 
//           () => {
//             htTextContainer.innerHTML = '<p>' + htText.replace(/\n/g, "<br>") + '</p>';
//           }
//         );
//   });
// });