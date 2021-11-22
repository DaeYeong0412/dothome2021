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
        this.events();
        this.update();
        this.animate();
    }

    update() {
        if (this.supahScroll === null) return;
        document.body.style.height = `${this.supahScroll.getBoundingClientRect().width/2}px`;
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
        window.addEventListener('load', this.update.bind(this));
        window.addEventListener('resize', this.update.bind(this));
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
const cursor = document.querySelector(".cursor");

document.addEventListener("mousemove", e => {
    gsap.to('.cursor', {
        duration: .2,
        left: e.pageX - window.scrollX - w,
        top: e.pageY - window.scrollY - h
    });
});

// clock
function printClock() {

    var clock = document.getElementById("clock");
    var currentDate = new Date();
    var calendar = currentDate.getFullYear() + "-" + (currentDate.getMonth() + 1) + "-" + currentDate.getDate()
    var amPm = 'AM';
    var currentHours = addZeros(currentDate.getHours(), 2);
    var currentMinute = addZeros(currentDate.getMinutes(), 2);

    if (currentHours >= 12) {
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

const $btnSound = $(".btn-sound");
const $themeSong = $("#theme-song")[0];
$btnSound.on("click", function () {
    $(this).find("i").toggleClass("fa fa-volume-up fa fa-volume-off");
    $(this).toggleClass("isPlaying");
    //play
    if ($(this).hasClass("isPlaying")) {
        $themeSong.play();
    } else {
        $themeSong.pause();
    }
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