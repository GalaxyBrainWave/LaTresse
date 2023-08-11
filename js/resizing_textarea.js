commentInput = document.getElementById("comment_input");

commentInput.addEventListener("focus", () => {
  commentInput.style.height = "256px";
});


commentInput.addEventListener("blur", () => {
  commentInput.style.height = "42px";
});
