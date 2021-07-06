const fondoAdd = document.querySelector("#modalCarrito");
const contenidoModal = document.querySelector("#modalContenidoCarrito");



const botonCerrarCarrito = document.querySelector("#close-iconCarrito");


const VerCarritoBTN = document.querySelector("#verCarrito");
const pruebaModalInput = document.querySelector("#pruebaModalInput");



VerCarritoBTN.addEventListener("click", () => {
  contenidoModal.classList.toggle("show");
  fondoAdd.classList.toggle("showModal");
});

fondoAdd.addEventListener("click", (e) => {
  //console.log(e.target);
  if (e.target == botonCerrarCarrito) {    
    contenidoModal.classList.toggle("show");
    fondoAdd.classList.toggle("showModal");
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
