//AJAX - establish xhr request inside on container id
const xhr = new XMLHttpRequest();
const container = document.getElementById("container");

xhr.onload = function(){
    if (this.status === 200){
        container.innerHTML = xhr.responseText;
    } else {
        console.warn("Did not receive 200 Response")
    }
}

// make li a clickable butotn, then send the data-url to xhr
document.addEventListener("DOMContentLoaded", () => {
    const navItems = document.querySelectorAll(".header-navbar-row");
    const navbarCol = document.querySelector(".header-navbar-col");

    navItems.forEach(item => {
        item.addEventListener("click", () => {
            const url = item.getAttribute("data-url");
            if (url) {
                xhr.open("GET", url);
                xhr.send();
                navbarCol.classList.toggle("visible");
            }
        });
    });
});

//nav toggle button
document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("navbar-button");
    const navbarCol = document.querySelector(".header-navbar-col");

    toggleButton.addEventListener("click", () => {
        navbarCol.classList.toggle("visible");
    });
});
