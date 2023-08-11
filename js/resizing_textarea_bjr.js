bjrTxt = document.getElementById("bjrtxt");

bjrTxt.addEventListener("focus", () => {
  bjrTxt.style.height = "256px";
});


bjrTxt.addEventListener("blur", () => {
  bjrTxt.style.height = "42px";
});
