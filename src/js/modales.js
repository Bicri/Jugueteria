const contenidoModal = document.querySelector(".contenidoModal");
const fondoAdd = document.querySelector(".containerModal");
const botonCerrar = document.querySelector('.close-icon')

const VerCarritoBTN = document.querySelector("#verCarrito");
const pruebaModalInput = document.querySelector("#pruebaModalInput");

/* pruebaModalInput.addEventListener("click", () => {
    contenidoModal.classList.toggle('show');
    fondoAdd.classList.toggle('showModal');
}); */

VerCarritoBTN.addEventListener("click", () => {
    contenidoModal.classList.toggle('show');
    fondoAdd.classList.toggle('showModal');
});

  fondoAdd.addEventListener('click',e=>{    
    //console.log(e.target);
    if(e.target==botonCerrar){
        fondoAdd.classList.toggle("showModal");
        contenidoModal.classList.toggle('show');
        //MenuIcon1.style.opacity=1;
        //console.log(imagenes.length);
    }
});
/* 
function addimagen (img){
    imgAdd.src=img.getAttribute('src');
    
    imgAdd.classList.toggle('showImage');
    MenuIcon1.style.opacity=0;
    //console.log();    
} */