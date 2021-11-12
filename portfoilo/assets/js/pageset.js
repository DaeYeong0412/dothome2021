var page = document.getElementById('page');
var last_pane = page.getElementsByClassName('pane');
last_pane = last_pane[last_pane.length-1];
var dummy_x = null;

window.onscroll = function () {
    // Horizontal Scroll.
    var y = document.body.getBoundingClientRect().top;
    page.scrollLeft = -y;
    
    // Looping Scroll.
    // var diff = window.scrollY - dummy_x;
    // if (diff > 0) {
    //     window.scrollTo(0, diff);
    // }
    // else if (window.scrollY == 0) {
    //     window.scrollTo(0, dummy_x);
    // }
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

// 스크롤 부드럽게
class Scrooth {
constructor({element = window, strength=10, acceleration = 1.2,deceleration = 0.975}={}) {
    this.element = element;
    this.distance = strength;
    this.acceleration = acceleration;
    this.deceleration = deceleration;
    this.running = false;

    this.element.addEventListener('wheel', this.scrollHandler.bind(this), {passive: false});
    this.element.addEventListener('mousewheel', this.scrollHandler.bind(this), {passive: false});
    this.scroll = this.scroll.bind(this);
}

scrollHandler(e) {
    e.preventDefault();

    if (!this.running) {
        this.top = this.element.pageYOffset || this.element.scrollTop || 0;
        this.running = true;
        this.currentDistance = e.deltaY > 0 ? 0.1 : -0.1;
        this.isDistanceAsc = true;
        this.scroll();
    } else {
        this.isDistanceAsc = false;
        this.currentDistance = e.deltaY > 0 ? this.distance : -this.distance;
    }
}

scroll() {
    if (this.running) {
        this.currentDistance *= this.isDistanceAsc === true ? this.acceleration : this.deceleration;
        Math.abs(this.currentDistance) < 0.1 && this.isDistanceAsc === false ? this.running = false : 1;
        Math.abs(this.currentDistance) >= Math.abs(this.distance) ? this.isDistanceAsc = false : 1;

        this.top += this.currentDistance;
        this.element.scrollTo(0, this.top);
        
        requestAnimationFrame(this.scroll);
        }
    }
}

const scroll = new Scrooth({
    element: window,
    strength: 20,
    acceleration: 1.5,
    deceleration: 0.975,
});

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