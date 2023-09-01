const commentInput = document.getElementById("comment_input");

commentInput.addEventListener('input', () => {
  commentInput.style.height = 'auto';
  commentInput.style.height = (commentInput.scrollHeight) + 'px';
});
