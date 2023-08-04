// <?php
//     header('Content-Type: text/javascript; charset=UTF-8');
// ?>

//collection = document.querySelectorAll(class);

//collection.forEach();

//collection.forEach(item => { });

// collection.forEach(item => {
//     console.log(item);
// });


window.addEventListener("load", (e) => {
    const messageOn = document.querySelectorAll(".see-message");

    messageOn.forEach( element => {
        element.addEventListener("click", (event) => {
            target = element.dataset.target;
            seeMessage(target);
        }, false);
    });
}, false);


function seeMessage(message) {
    let trMessage = document.querySelector(message);
    trMessage.style.display = "table-row";

    let btnCloser = document.querySelectorAll(".close-message");
    // btnCloser.addEventListener("click", closeMessage);
    btnCloser.forEach(element => {
        element.addEventListener("click", (evnt) => {
            target = element.dataset.target;
            closeMessage(target);
        });
    })
}

function closeMessage(message) {
    let trMessage = document.querySelector(message);
    trMessage.style.display = "none";
}

// <?php ?>