const X = window.matchMedia("(max-width: 780px)");
const W = window.innerWidth;
const H = window.innerHeight;

window.addEventListener("load", (e) => {
    let btnOpen = document.querySelector("#openBtn2");
    btnOpen.addEventListener("click", (event) => {
        openNav();
    })
});

function openNav() {
    if (X.matches) {
        let dimensions = document.querySelector("#dashboard-admin");
        dimensions.style.width = W + "px";
        dimensions.style.height = H + "px";

        let btnClose = document.querySelector("#closeBtn2");
        btnClose.addEventListener("click", closeNav);
    } else {
        let dimensions = document.querySelector("#dashboard-admin");
        dimensions.style.width = "270px";
        document.getElementById("menu-burger2").style.marginLeft = "270px";
        document.getElementById("main-dash").style.marginLeft = "270px";

        let btnClose = document.querySelector("#closeBtn2");
        btnClose.addEventListener("click", closeNav);
    }
}

function closeNav() {
    if (X.matches) {
        document.getElementById("dashboard-admin").style.width = W + "px";
        document.getElementById("dashboard-admin").style.height = "0";
    } else {
        document.getElementById("dashboard-admin").style.width = "0";
        document.getElementById("menu-burger2").style.marginLeft= "0";
        document.getElementById("main-dash").style.marginLeft = "0";
    }
}

