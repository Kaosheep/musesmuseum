let productwrap = document.querySelector(".productwrap");
let products = document.querySelector(".product");
let isDragging = false , startX, startScrollLeft;

let arrows = document.querySelectorAll(".btn button");
const objectwidth = products.querySelector(".object").offsetWidth;

let productschildrens = [...products.children];

let preview = Math.round(products.offsetWidth/objectwidth);
resizew();
function resizew(){
    products.style.width = (parseInt(Math.floor(document.querySelector('.productwrap').offsetWidth/objectwidth) * objectwidth))+'px';}

window.addEventListener("resize", resizew);


productschildrens.slice(-preview).reverse().forEach(product=>{
    products.insertAdjacentHTML("afterbegin",product.outerHTML);
})
productschildrens.slice(0, preview).forEach(product=>{
    products.insertAdjacentHTML("beforeend",product.outerHTML);
})

arrows.forEach(function(btn){
    btn.addEventListener("click", ()=>{
        if(btn.id === 'left'){
            products.scrollLeft = products.scrollLeft - objectwidth;
        }else{products.scrollLeft = products.scrollLeft + objectwidth;}
    })
}
)

let dragStart = (e) =>{
    isDragging=true;
    products.classList.add("dragging");
    startX = e.pageX;
    startScrollLeft = products.scrollLeft;
}
let dragging = (e)=> {
    if(isDragging == false) return;
    products.scrollLeft = startScrollLeft - (e.pageX - startX) ;
}
let dragStop = () =>{
    isDragging = false;
    products.classList.remove("dragging");
}
let autoplay = () =>{
    timeoutid = setTimeout(() => products.scrollLeft = products.scrollLeft + objectwidth,2500)
}
autoplay();

let infinitescroll = () =>{
    if(products.scrollLeft === 0){
        products.classList.add("no-trans");
        products.scrollLeft = products.scrollWidth - (2 * products.offsetWidth);
        products.classList.remove("no-trans");
    }else if(Math.ceil(products.scrollLeft) === products.scrollWidth - products.offsetWidth){
        products.classList.add("no-trans");
        products.scrollLeft = products.offsetWidth;
        products.classList.remove("no-trans");
    }
    clearTimeout(timeoutid);
    if(!productwrap.matches(":hover")) autoplay();
}


products.addEventListener("mousemove",dragging);
products.addEventListener("mousedown",dragStart);
document.addEventListener("mouseup",dragStop);
products.addEventListener("scroll",infinitescroll);
productwrap.addEventListener("mouseenter",()=>clearTimeout(timeoutid));
productwrap.addEventListener("mouseleave",autoplay);

