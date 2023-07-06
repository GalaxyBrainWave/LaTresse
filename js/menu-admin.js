let x = window.matchMedia("(max-width: 780px)");
let w = window.innerWidth;

function openNav() {
    if (x.matches) {
        document.getElementById("dashboard-admin").style.width = w;
        document.getElementById("dashboard-admin").style.height = "300px";
        document.getElementsByClassName("header-admin").style.marginTop = "300px";
    } else {
        document.getElementById("dashboard-admin").style.width = "270px";
        document.getElementById("menu-burger2").style.marginLeft = "270px";
        document.getElementById("main-dash").style.marginLeft = "270px";
    }
   
}

function closeNav() {
    if (x.matches) {
        document.getElementById("dashboard-admin").style.width = w;
        document.getElementById("dashboard-admin").style.height = "0";
        document.getElementsByClassName("header-admin").style.marginTop = "0";
    } else {
        document.getElementById("dashboard-admin").style.width = "0";
        document.getElementById("menu-burger2").style.marginLeft= "0";
        document.getElementById("main-dash").style.marginLeft = "0";
    }
}

