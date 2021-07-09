const ContenedorModal = document.querySelector("#modalUniversal");
const contenidoModal = document.querySelector("#contenidoModalUniversal");



const botonCerrarCarrito = document.querySelector("#close-iconUni");


const AbrirModalbtn = document.querySelector("#agregarNuevo");



AbrirModalbtn.addEventListener("click", () => {
  contenidoModal.classList.toggle("show");
  ContenedorModal.classList.toggle("showModal");
});

ContenedorModal.addEventListener("click", (e) => {
  //console.log(e.target);
  if (e.target == botonCerrarCarrito) {    
    contenidoModal.classList.toggle("show");
    ContenedorModal.classList.toggle("showModal");
    //MenuIcon1.style.opacity=1;
    //console.log(imagenes.length);
  }
});