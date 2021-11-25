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
const gamestart = document.querySelector(".game_start");
const gamebox = document.querySelector(".game");
const gameend = document.querySelector(".gametext span");

calculatorImg.addEventListener("click", function () {
    calculator.style = "opacity:0; z-index: 200";
    electronic.style = "opacity:1; z-index: 201;";
});

touchBox.addEventListener("click", function () {
    calculator.style = "opacity:0; z-index: 200";
    electronic.style = "opacity:1; z-index: 201;";
});

previous.addEventListener("click", function () {
    electronic.style = "opacity:0; z-index: 200;";
    calculator.style = "opacity:1; z-index: 201;";
});

gamestart.addEventListener("click", function () {
    gamestart.style = "opacity:0; z-index: 300";
    gamebox.style = "opacity:1; z-index: 301;";
});

gameend.addEventListener("click", function () {
    gamebox.style = "opacity:0; z-index: 300;";
    gamestart.style = "opacity:1; z-index: 301;";
});

/*------------------------------
    scroll animation
------------------------------*/ 

const eng_box = document.querySelector (".eng_box");
const kor_box = document.querySelector (".kor_box");

const a_text1 = document.querySelector (".a_text1");
const a_text2 = document.querySelector (".a_text2");
const a_text3 = document.querySelector (".a_text3");

const span_text1 = document.querySelector (".span_text1");
const span_text2 = document.querySelector (".span_text2");
const span_text3 = document.querySelector (".bspan");

const text1 = document.querySelector (".text1");
const text2 = document.querySelector (".text2");
const text3 = document.querySelector (".text3");
const text4 = document.querySelector (".text4");
const text5 = document.querySelector (".text5");
const text6 = document.querySelector (".text6");
const text7 = document.querySelector (".text7");
const text8 = document.querySelector (".text8");
const text9 = document.querySelector (".text9");
const text10 = document.querySelector (".text10");
const text11 = document.querySelector (".text11");
const text12 = document.querySelector (".text12");
const text13 = document.querySelector (".text13");
const text14 = document.querySelector (".text14");
const text15 = document.querySelector (".text15");


if(cont1.getBoundingClientRect().left - window.innerWidth*4/4 <= 0){
    let cont1 = gsap.timeline();
    cont1.to(kor_box, {duration:1.2, y:20, opacity: 1, ease: "power1.out"})
    .to(eng_box, {duration:1.2, y:20, opacity: 1, ease: "power1.out"})
}

window.addEventListener("scroll",function(){
    if(cont2.getBoundingClientRect().left - window.innerHeight*4/4 <= 0){
        let cont2 = gsap.timeline();
        cont2.to(span_text1, {duration:.4, x:5, opacity: 1, ease: "power1.out"})
        cont2.to(span_text2, {duration:.4, x:5, opacity: 1, ease: "power1.out"})
        cont2.to(text1, {duration:.8, y:5, opacity: 1, ease: "power1.out"})
        cont2.to(text2, {duration:.6, y:5, opacity: 1, ease: "power1.out"})
        cont2.to(text3, {duration:.6, y:5, opacity: 1, ease: "power1.out"})
        cont2.to(text4, {duration:.6, y:5, opacity: 1, ease: "power1.out"})
    }
    if(cont4.getBoundingClientRect().left - window.innerHeight*4/4 <= 0){
        let cont4 = gsap.timeline();
        cont4.to(span_text3, {duration:.4, x:5, opacity: 1, ease: "power1.out"})
        cont4.to(text5, {duration:.8, y:5, opacity: 1, ease: "power1.out"})
        cont4.to(text6, {duration:.6, y:5, opacity: 1, ease: "power1.out"})
        cont4.to(a_text1, {duration:.4, y:-4, opacity: 1, ease: "power1.out"})
        cont4.to(text7, {duration:.6, y:5, opacity: 1, ease: "power1.out"})
        cont4.to(a_text2, {duration:.4, y:-4, opacity: 1, ease: "power1.out"})
        cont4.to(text8, {duration:.6, y:5, opacity: 1, ease: "power1.out"})
        cont4.to(a_text3, {duration:.4, y:-4, opacity: 1, ease: "power1.out"})
    }
    if(cont6.getBoundingClientRect().left - this.window.innerHeight*4/4 <= 0){
        let cont6 = gsap.timeline();
        cont6.to(text9, {duration:1.4, x:-30, opacity: 1, ease: "power1.out"})
    }
    if(cont7.getBoundingClientRect().left - this.window.innerHeight*4/4 <= 0){
        let cont7 = gsap.timeline();
        cont7.to(text10, {duration:1.4, x:30, opacity: 1, ease: "power1.out"})
    }
    if(cont8.getBoundingClientRect().left - this.window.innerHeight*4/4 <= 0){
        let cont8 = gsap.timeline();
        cont8.to(text11, {duration:1.4, x:-30, opacity: 1, ease: "power1.out"})
    }
    if(cont9.getBoundingClientRect().left - this.window.innerHeight*4/4 <= 0){
        let cont9 = gsap.timeline();
        cont9.to(text12, {duration:1.4, x:30, opacity: 1, ease: "power1.out"})
    }
    if(cont10.getBoundingClientRect().left - this.window.innerHeight*4/4 <= 0){
        let cont10 = gsap.timeline();
        cont10.to(text13, {duration:1.4, x:-30, opacity: 1, ease: "power1.out"})
    }
    if(cont11.getBoundingClientRect().left - this.window.innerHeight*4/4 <= 0){
        let cont11 = gsap.timeline();
        cont11.to(text14, {duration:1.4, x:30, opacity: 1, ease: "power1.out"})
    }
    if(cont12.getBoundingClientRect().left - this.window.innerHeight*4/4 <= 0){
        let cont12 = gsap.timeline();
        cont12.to(text15, {duration:1.4, x:-30, opacity: 1, ease: "power1.out"})
    }
});

// key event default
window.addEventListener("keydown", function(e) {
    // space and arrow keys
    if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);