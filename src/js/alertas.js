const elementosAlert = document.querySelector("#elementosAlert");
//template
const productoAlert = document.querySelector("#productoAlert").content;
const fragment = document.createDocumentFragment();

const fethcData = async () => {
  try {
    const data = await (await fetch("Controlador/Alertas.php")).json();
    console.log(data);
    pintarCards(data);
  } catch (error) {
    console.log(error);
  }
};
document.addEventListener("DOMContentLoaded", () => {
  fethcData();
});

const pintarCards = (data) => {
    elementosAlert.innerHTML="";
    data.forEach((element) => {
      productoAlert.querySelector("#idProdTop").textContent =
        element.codigo;
      productoAlert.querySelector("#nomProdTop").textContent =
        element.nombre;
      productoAlert.querySelector("#cantidadTop").textContent =
        element.existencia;
      
  
      const clone = productoAlert.cloneNode(true);      
      fragment.appendChild(clone);
    });
    elementosAlert.appendChild(fragment);    
  };