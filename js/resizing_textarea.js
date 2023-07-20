commentInput = document.getElementById("comment_input");

commentInput.addEventListener("focus",expand);

function expand() {
  commentInput.style.height = "256px";
}

commentInput.addEventListener("blur",shrink);

function shrink() {
  commentInput.style.height = "42px";
}