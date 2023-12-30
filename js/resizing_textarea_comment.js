const commentInput = document.getElementById("comment_input");

commentInput.addEventListener('input', commentInputBehavior);

function commentInputBehavior() {
  commentInput.style.height = 'auto';
  commentInput.style.height = (commentInput.scrollHeight) + 'px';
}
