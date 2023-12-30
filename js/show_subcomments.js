const dispSubcommentsNumberList = document.getElementsByClassName('disp-subcomment-number');

for (let dispSubcommentsNumber of dispSubcommentsNumberList) {
  dispSubcommentsNumber.addEventListener('click', showSubcomments);
}

function showSubcomments(event) {
  const currentTarget = event.target;
  const currentCommentBody = currentTarget.closest('.project_comment_body');
  const currentSubcommentsContainer = currentCommentBody.querySelector('.leftbar_container');
  if (currentSubcommentsContainer.classList.contains('displayed')) {
    currentSubcommentsContainer.classList.remove('displayed');
    currentSubcommentsContainer.classList.add('dispnone');
    // ^ indicates the start of the string, and [^\s]+ matches one or more non-whitespace characters
    let newText = currentTarget.innerText.replace(/^[^\s]+/, 'Montrer');
    currentTarget.innerText = newText;
  } else {
  currentSubcommentsContainer.classList.remove('dispnone');
  currentSubcommentsContainer.classList.add('displayed');
  // ^ indicates the start of the string, and [^\s]+ matches one or more non-whitespace characters
  let newText = currentTarget.innerText.replace(/^[^\s]+/, 'Cacher');
  currentTarget.innerText = newText;
  }
}