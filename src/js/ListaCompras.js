/* INPUTS LADO IZQUIERDO */
const nomLista = document.querySelector("#nomLista");
const cantLista = document.querySelector("#cantLista");
const BtnAgregar = document.querySelector("#BtnAgregar");

/* BOTONES Y TABLA LADO DERECHO */
const BtnImprimir = document.querySelector("#BtnImprimir");
const BtnBorrar = document.querySelector("#BtnBorrar");

//contenedor de los elementos (tbody)
const elementosAdmin = document.querySelector("#elementosAdmin");
//template
const FilaElementoLista = document.querySelector("#FilaElementoLista").content;
const fragment = document.createDocumentFragment();

const FetchData = async () => {  
    elementosAdmin.innerHTML = "";
    try {
      const data = await (
        await fetch(`Controlador/AdminListaFetch.php`)
      ).json();
      console.log(data)
      pintarCards(data);
      if (data.length > 0){
        BtnImprimir.classList.toggle("disabled");
        BtnBorrar.removeAttribute("disabled");
      }
      //else pintarCards(data);
    } catch (error) {
      console.log(error);
    }
};
const MandarObj = async (obj) => {
    let objetoparaAccion = { ...obj };
    try {
      let resp = await fetch("Controlador/AdminLista.php", {
        method: "POST", // or 'PUT'
        body: JSON.stringify(objetoparaAccion),
        headers: {
          "Content-Type": "application/json", // AQUI indicamos el formato
        }, // data can be `string` or {object}!
      });
      let data = await resp.json();
      console.log(data);
      //FetchData();
      
    } catch (error) {
      console.log(error);
    }
  };

const pintarCards = (data) => {
  data.forEach((element) => {
    FilaElementoLista.querySelector("#idProdLista").textContent =
      element.codigo;
    FilaElementoLista.querySelector("#nomProdLista").textContent =
      element.nombre;
    FilaElementoLista.querySelector("#cantidadProdLista").textContent =
      element.existencia;
    FilaElementoLista.querySelector("#cantidadDeseadaLista").textContent =
      element.deseado;

    const clone = FilaElementoLista.cloneNode(true);
    fragment.appendChild(clone);
  });
  elementosAdmin.appendChild(fragment);
  console.log(elementosAdmin);
};

document.addEventListener("DOMContentLoaded", () => {
  FetchData();
});

const btnAumentarDisminuir = (e) => {
    let objAccionLista = {};
    const elementoFilaO = e.target.parentElement.parentElement;
    const id = elementoFilaO.querySelector("#idProdLista").textContent;
    const nom = elementoFilaO.querySelector("#nomProdLista").textContent;
    let cant = parseInt(elementoFilaO.querySelector("#cantidadDeseadaLista").textContent);
    //{"accion":"2","idNuevo":"","nombre":"Lorem","flag":"1"}    
    if (e.target.classList.contains("btn-info")) {
        if (id=== "Sin codigo") {            
            objAccionLista = {accion:"2",idNuevo:"",nombre:nom,flag:"1"}
        }else{
            objAccionLista = {accion:"2",idNuevo:id,nombre:"",flag:"1"}
        }        
        MandarObj(objAccionLista)
        .then(()=>{
            cant +=1;
            elementoFilaO.querySelector("#cantidadDeseadaLista").textContent = cant;            
        });                
    }
    if (e.target.classList.contains("btn-danger")) {
        if (id=== "Sin codigo") {            
            objAccionLista = {accion:"2",idNuevo:"",nombre:nom,flag:"0"}
        }else{
            objAccionLista = {accion:"2",idNuevo:id,nombre:"",flag:"0"}
        }        
        MandarObj(objAccionLista)
        .then(()=>{
            if(cant >1){
                cant -=1;
                elementoFilaO.querySelector("#cantidadDeseadaLista").textContent = cant;            
            }else(e.target.parentElement.parentElement.remove());
        });
      
    }      
    else{
      return false;
    } 
    e.stopPropagation();
  };

elementosAdmin.addEventListener("click", (e) => {  
  btnAumentarDisminuir(e);
});


BtnAgregar.addEventListener("click",()=>{
    let objetoaccion1 = {accion:"1",idNuevo:"",nombre:nomLista.value,cantidad:parseInt(cantLista.value)};    
    MandarObj(objetoaccion1).then(()=>{
        alert("Producto agregado");
        FetchData();
    });
});

BtnBorrar.addEventListener("click",()=>{
    let objetoaccion1 = {accion:"3"}
    MandarObj(objetoaccion1).then(()=>{
        alert("Correcto: Lista borrada");
        FetchData();
    });
});