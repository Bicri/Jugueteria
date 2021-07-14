//contenedor de los elementos (tbody)
const elementosTop = document.querySelector("#elementosTop");
//template
const productoTop = document.querySelector("#productoTop").content;
const fragment = document.createDocumentFragment();


const MandarObj = async (obj,mensaje,color) => {
    let objetoparaAccion = {...obj};
    try {
      let resp = await fetch("Controlador/Top.php", {
        method: "POST", // or 'PUT'
        body: JSON.stringify(objetoparaAccion),
        headers: {
          "Content-Type": "application/json", // AQUI indicamos el formato
        }, // data can be `string` or {object}!
      });
      let data = await resp.json();      
      pintarCards(data,mensaje,color);
      
    } catch (error) {
      console.log(error);
    }
  };

  const pintarCards = (data,mensaje,color) => {
    elementosTop.innerHTML="";
    data.forEach((element) => {
      productoTop.querySelector("#idProdTop").textContent =
        element.codigo;
      productoTop.querySelector("#nomProdTop").textContent =
        element.nombre;
      productoTop.querySelector("#cantidadTop").textContent =
        element.unidades;
      productoTop.querySelector("#ingresoTop").textContent =
        element.ingreso;
        document.querySelector("#tituloH").textContent = `Juguetes ${mensaje}`;
        document.querySelector("#thead").style.background = color;
  
      const clone = productoTop.cloneNode(true);      
      fragment.appendChild(clone);
    });
    elementosTop.appendChild(fragment);    
  };

const Btntop = document.querySelector("#BtnTop");
Btntop.addEventListener("click",()=>{
    MandarObj({accion:"1"},"más vendidos","lightgreen");
});

const Btnbottom = document.querySelector("#bottom");
Btnbottom.addEventListener("click",()=>{
    MandarObj({accion:"0"},"menos vendidos","#FF5353");
});

document.addEventListener("DOMContentLoaded", () => {
    MandarObj({accion:"1"},"más vendidos","lightgreen");
  });