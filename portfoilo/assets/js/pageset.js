var page = document.getElementById('page');
var last_pane = page.getElementsByClassName('pane');
last_pane = last_pane[last_pane.length-1];
var dummy_x = null;

window.onscroll = function () {
    // Horizontal Scroll.
    var y = document.body.getBoundingClientRect().top;
    page.scrollLeft = -y;
    
    // Looping Scroll.
    var diff = window.scrollY - dummy_x;
    if (diff > 0) {
        window.scrollTo(0, diff);
    }
    else if (window.scrollY == 0) {
        window.scrollTo(0, dummy_x);
    }
}
// Adjust the body height if the window resizes.
window.onresize = resize;
// Initial resize.
resize();

// Reset window-based vars
function resize() {
    var w = page.scrollWidth-window.innerWidth+window.innerHeight;
    document.body.style.height = w + 'px';
    dummy_x = last_pane.getBoundingClientRect().left+window.scrollY;
}

const w = document.querySelector(".cursor").offsetWidth /2;
const h = document.querySelector(".cursor").offsetHeight /2;
const cursor = document.querySelector(".cursor");

document.addEventListener("mousemove", e => {
    gsap.to(".cursor", {duration: 0.3, left: e.pageX -w, top: e.pageY -h});
});

const tabBtn = document.querySelectorAll(".site_choice ul li");
const tabCont = document.querySelectorAll(".site_info");

tabBtn.forEach((element, index)=> {
    element.addEventListener("click", function(){
        tabBtn.forEach(el => {
            el.classList.remove("active");
        });
        element.classList.add("active");

        tabCont.forEach(el => {
            el.style.display = "none";
        })
        tabCont[index].style.display = "block";
    });
});