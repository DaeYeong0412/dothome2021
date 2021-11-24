const contents = document.getElementById("contents");
/*------------------------------
SupahScroll
------------------------------*/
class SupahScroll {
    constructor(options) {
        this.opt = options || {};
        this.el = this.opt.el ? this.opt.el : '.supah-scroll';
        this.speed = this.opt.speed ? this.opt.speed : 0.1;
        this.init();
    }

    init() {
        this.scrollX = 0;
        this.supahScroll = document.querySelectorAll(this.el)[0];
        this.supahScroll.classList.add('supah-scroll');
        // img
        this.img0 = document.querySelector(".referenceImg img");
        this.img1 = document.querySelector(".mainImg img");
        this.img2 = document.querySelector(".subImg img");
        this.img3 = document.querySelector(".oneimg img");
        this.img4 = document.querySelector(".twoimg img");
        this.img5 = document.querySelector(".threeimg img");
        this.img6 = document.querySelector(".fourimg img");
        this.img7 = document.querySelector(".fiveimg img");
        this.img8 = document.querySelector(".siximg img");
        this.img9 = document.querySelector(".sevenimg img");
        this.events();
        this.update();
        this.animate();
    }

    update() {
        if (this.supahScroll === null) return;
        // document.body.style.height = `${this.supahScroll.getBoundingClientRect().width/2}px`;
        document.body.style.height = `${document.body.getBoundingClientRect().height/2}px`;

    }

    pause() {
        document.body.style.overflow = 'hidden';
        cancelAnimationFrame(this.raf);
    }

    play() {
        document.body.style.overflow = 'inherit';
        this.raf = requestAnimationFrame(this.animate.bind(this));
    }

    destroy() {
        this.supahScroll.classList.remove('supah-scroll');
        this.supahScroll.style.transform = 'none';
        document.body.style.overflow = 'inherit';
        window.removeEventListener('resize', this.update);
        cancelAnimationFrame(this.raf);
        delete this.supahScroll;
    }

    animate() {
        this.scrollX += (window.scrollY - this.scrollX) * this.speed;
        this.supahScroll.style.transform = `translate3d(${-this.scrollX}px,0,0)`;
        // img
        this.img0.style.transform = `translate3d(${-this.scrollX * 0.07}px,0,0)`;
        this.img1.style.filter = `grayscale(${100-this.scrollX * 0.05}%)`;
        this.img2.style.filter = `grayscale(${100-this.scrollX * 0.04}%)`;
        this.img3.style.transform = `translate3d(${-this.scrollX * 0.07}px,0,0)`;
        this.img4.style.transform = `translate3d(${-this.scrollX * 0.07}px,0,0)`;
        this.img5.style.transform = `translate3d(${-this.scrollX * 0.07}px,0,0)`;
        this.img6.style.transform = `translate3d(${-this.scrollX * 0.07}px,0,0)`;
        this.img7.style.transform = `translate3d(${-this.scrollX * 0.07}px,0,0)`;
        this.img8.style.transform = `translate3d(${-this.scrollX * 0.07}px,0,0)`;
        this.img9.style.transform = `translate3d(${-this.scrollX * 0.07}px,0,0)`;
        this.raf = requestAnimationFrame(this.animate.bind(this));
    }

    scrollTo(x) {
        window.scrollTo(x, 0);
    }

    staticScrollTo(x) {
        cancelAnimationFrame(this.raf);
        this.scrollX = x;
        window.scrollTo(x, 0);
        this.supahScroll.style.transform = `translate3d(${-x}px,0,0)`;
        this.play();
    }

    events() {
        window.addEventListener('resize', this.update.bind(this));
        window.addEventListener('load', this.update.bind(this));
    }
}

/*------------------------------
Initialize
------------------------------*/
const supahscroll = new SupahScroll({
    el: 'main',
    speed: 0.05
});


gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

const scrubValue = 0.5;

const scrollBar = gsap.to('.scrollbar', {
    x: () => {
        return window.innerWidth - (200)
    },
    ease: "none"
})

ScrollTrigger.create({
    trigger: contents,
    start: "top top",
    end: () => (contents.scrollWidth - window.innerWidth),
    pin: true,
    anticipatePin: 1,
    scrub: scrubValue,
    animation: scrollBar,
    invalidateOnRefresh: true,
})

// tabmenu
const tabBtn = document.querySelectorAll(".site_choice ul li");
const tabCont = document.querySelectorAll(".site_info");

tabBtn.forEach((element, index) => {
    element.addEventListener("mouseover", function () {
        tabBtn.forEach(el => {
            el.classList.remove("active");
        });
        element.classList.add("active");

        tabCont.forEach(el => {
            el.style.opacity = "0";
        })
        tabCont[index].style.opacity = "1";
    });
});

// cursor
const w = document.querySelector(".cursor").offsetWidth / 2;
const h = document.querySelector(".cursor").offsetHeight / 2;
const w2 = document.querySelector(".cursor-follower").offsetWidth /2;
const h2 = document.querySelector(".cursor-follower").offsetHeight /2;
const cursor = document.querySelector(".cursor");
const cursor2 = document.querySelector(".cursor-follower");


document.addEventListener("mousemove", e => {
    gsap.to(cursor, { duration: .2, left: e.pageX - window.scrollX - w, top: e.pageY - window.scrollY - h }),
    gsap.to(cursor2, { duration: .5, left: e.pageX - window.scrollX - w2, top: e.pageY - window.scrollY - h2 });
});

// clock
function printClock() {

    var clock = document.getElementById("clock");
    var currentDate = new Date();
    var amPm = 'AM';
    var currentHours = addZeros(currentDate.getHours(), 2);
    var currentMinute = addZeros(currentDate.getMinutes(), 2);

    if (currentHours >= 13) {
        amPm = 'PM';
        currentHours = addZeros(currentHours - 12, 2);
    }

    clock.innerHTML = currentHours + " : " + currentMinute + "<span> " + amPm + "&nbsp PORTFOLIO</span>";

    setTimeout("printClock()", 1000);
}

function addZeros(num, digit) {
    var zero = '';
    num = num.toString();
    if (num.length < digit) {
        for (i = 0; i < digit - num.length; i++) {
            zero += '0';
        }
    }
    return zero + num;
}

// audio

const myAudio = new Audio();
myAudio.src="./assets/audio/music.mp3";

const btnPlay = document.querySelector(".fa.fa-volume-off");
const btnPause = document.querySelector(".fa.fa-volume-up");

btnPlay.onclick = function () { 
    myAudio.play(); 
};
btnPause.onclick = function () { 
    myAudio.pause(); 
};

const musicOn = document.querySelector(".fa.fa-volume-off");
const musicOff = document.querySelector(".fa.fa-volume-up");

musicOn.addEventListener("click", function () {
    musicOn.style = "opacity:0; z-index: 100;";
    musicOff.style = "opacity:1; z-index: 101;";
});

musicOff.addEventListener("click", function () {
    musicOn.style = "opacity:1; z-index: 101;";
    musicOff.style = "opacity:0; z-index: 100;";
});

/* Electronic Calculator*/

function addOutput(num) {
    var display = document.getElementById("display");
    display.value = display.value + num;
}

function calculate() {
    var display = document.getElementById("display");
    var result = eval(display.value);
    var displayResult = document.getElementById("result");
    displayResult.value = result;
}

function reset() {
    var display = document.getElementById("display");
    display.value = "";
    var displayResult = document.getElementById("result");
    displayResult.value = "";
}


const previous = document.querySelector(".previous");
const electronic = document.querySelector(".electronic");
const calculator = document.querySelector(".calculator");
const touchBox = document.querySelector(".touch_box");
const calculatorImg = document.querySelector(".calculator img");

calculatorImg.addEventListener("click", function () {
    calculator.style = "opacity:0; transform: scale(0);";
    electronic.style = "opacity:1; transform: scale(1);";
});

touchBox.addEventListener("click", function () {
    calculator.style = "opacity:0; transform: scale(0);";
    electronic.style = "opacity:1; transform: scale(1);";
});

previous.addEventListener("click", function () {
    electronic.style = "opacity:0; transform: scale(0);";
    calculator.style = "opacity:1; transform: scale(1);";
});