let addButton = document.getElementById("section-more");
let section2 = document.getElementById("section-more1");

addButton.addEventListener("click", () => {
    addBlogSection();  
})

function addBlogSection() {
    const newDiv1 = document.createElement("div");
    const newDiv2 = document.createElement("div");
    const inp = document.createElement("input");
    const textArea = document.createElement("textarea");

    section2.appendChild(newDiv1);
    newDiv1.appendChild(inp);
    section2.appendChild(newDiv2);
    newDiv2.appendChild(textArea);
}