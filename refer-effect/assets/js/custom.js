//Code view
document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('pre code').forEach((el) => {
        hljs.highlightElement(el);
    });
});

//Code tab menu
const viewT = document.querySelectorAll(".view-title ul li");
const viewC = document.querySelectorAll(".view-cont > div");

viewT.forEach((element, index)=> {
    element.addEventListener("click", function(){
        viewT.forEach(el => {
            el.classList.remove("active");
        });
        element.classList.add("active");

        viewC.forEach(el => {
            el.style.display = "none";
        })
        viewC[index].style.display = "block";
    });
});

// Modal
document.querySelector(".info button").addEventListener("click",()=>{ 
    document.querySelector("#modal").classList.add("show");
    document.querySelector("#modal.hide").classList.remove("hide");
});

document.querySelector(".modal-cont button").addEventListener("click",()=>{
    document.querySelector("#modal").classList.add("hide");
});
