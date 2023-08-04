let addButton = document.getElementById("section-more");
let section2 = document.getElementById("section-plus");
let counter = 0;

addButton.addEventListener("click", () => {
    addBlogSection();  
})

function addBlogSection() {
    counter++;
    let newDiv1 = document.createElement("div");
    newDiv1.className = "title-img";

    let newDiv2 = document.createElement("div");
    newDiv2.className = "text-editor";

    let inp = document.createElement("input");
    inp.type = "file";
    inp.name = "img-container";
    inp.id = "img-container" + counter;
    inp.accept = ".png,.jpg,.jpeg";

    let textArea = document.createElement("textarea");
    textArea.name = "text-edit";
    textArea.cols = "30"; textArea.rows = "11";
    textArea.placeholder = "Ecrire l'article";
    textArea.id = "text-edit" + counter;

    section2.appendChild(newDiv1);
    newDiv1.appendChild(inp);
    section2.appendChild(newDiv2);
    newDiv2.appendChild(textArea);
}