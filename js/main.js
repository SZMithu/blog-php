var goTop = document.querySelector(".top-move");

window.addEventListener("scroll", () => {
    
    if(window.scrollY > 200){
        goTop.classList.add("active");
   }else{
    goTop.classList.remove("active");
   }
})