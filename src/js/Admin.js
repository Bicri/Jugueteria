const ContenedorModal = document.querySelector("#modalUniversal");
const contenidoModal = document.querySelector("#contenidoModalUniversal");

const botonCerrarCarrito = document.querySelector("#close-iconUni");

const AgregarNuevobtn = document.querySelector("#agregarNuevo");
const colorform = document.querySelector("#colorform");
let idViejolet = 0;
let anio = '';
let mes = '';
let dia = '';
/* ELEMENTOS DEL MODAL JALADOS A JavaScript */
//TITULO DEL MODAL
const tituloModalAdmin = document.querySelector("#tituloModalAdmin");
//INPUTS
const idAdmin = document.querySelector("#idAdmin");
const IDlHelp = document.querySelector("#IDlHelp");
const nomAdmin = document.querySelector("#nomAdmin");
const costoAdmin = document.querySelector("#costoAdmin");
const precioAdmin = document.querySelector("#precioAdmin");
const cantAdmin = document.querySelector("#cantAdmin");
const BotonModalAccion = document.querySelector("#BotonModalAccion");

/* ABRIR Y CERRAR MODAL */
const toggleModal = (titulo) => {
  tituloModalAdmin.textContent = titulo;
  contenidoModal.classList.toggle("show");
  ContenedorModal.classList.toggle("showModal");
};

/* LÓGICA PARA PINTAR TODOS LOS PRODUCTOS EN LA TABLA */
const itemsAdmin = document.querySelector("#elementosAdmin");
const templateFila = document.querySelector("#FilaElementoAdmin").content;
const fragment = document.createDocumentFragment();

const fethcData = async () => {
  try {
    const data = await (await fetch("Controlador/Productos.php")).json();
    console.log(data);
    pintarCards(data);
  } catch (error) {
    console.log(error);
  }
};
const fetchID = async () => {
  let id = document.querySelector("#buscarIDAdmin").value;

  itemsAdmin.innerHTML = "";

  try {
    const data = await (
      await fetch(`Controlador/Productos.php?buscarId=${id}`)
    ).json();
    //    if (data.items.length == 0) PintarNullCard();
    pintarCards(data);
  } catch (error) {
    console.log(error);
  }
};
document
  .querySelector("#botonBuscarIDAdmin")
  .addEventListener("click", fetchID);
document.addEventListener("DOMContentLoaded", () => {
  fethcData();
});

const pintarCards = (data) => {
  data.items.forEach((element) => {
    templateFila.querySelector("#idProdTabla").textContent = element.codigo;
    templateFila.querySelector("#nomProdTabla").textContent = element.nombre;
    templateFila.querySelector("#cantidadTablaAdmin").textContent =
      element.existencia;
    templateFila.querySelector("#precioTablaAdmin").textContent = element.venta;

    const clone = templateFila.cloneNode(true);
    fragment.appendChild(clone);
  });
  itemsAdmin.appendChild(fragment);
  console.log(itemsAdmin);
};

const SolicitarObjeto = async (accion, id) => {
  let objetoparaAccion = { accion: accion, idNuevo: id };
  let permisoparaAccion = await fetch(
    "../../jugueteria/Controlador/Almacen.php",
    {
      method: "POST", // or 'PUT'
      body: JSON.stringify(objetoparaAccion),
      headers: {
        "Content-Type": "application/json", // AQUI indicamos el formato
      }, // data can be `string` or {object}!
    }
  );
  let respuestaUltima = await permisoparaAccion.json();
  //console.log(respuestaUltima);
  return respuestaUltima;
  /* if(respuestaUltima==0){    
    return true;
  }
  else{    
    return false;
  }  */
};

itemsAdmin.addEventListener("click", (e) => {
  elementoProducto = e.target.parentElement.parentElement;
  if (e.target.classList.contains("btn-success")) {
    toggleModal("AÑADIR STOCK A PRODUCTO");
    BotonModalAccion.dataset.accion = "2";
    //console.log(elementoProducto.querySelector("#idProdTabla").textContent);
    //todos menos cantidad y precio
    idAdmin.setAttribute("disabled", "");
    idAdmin.style.cursor = "not-allowed";
    nomAdmin.setAttribute("disabled", "");
    nomAdmin.style.cursor = "not-allowed";
    idAdmin.value = elementoProducto.querySelector("#idProdTabla").textContent;
    nomAdmin.value =
      elementoProducto.querySelector("#nomProdTabla").textContent;
    cantAdmin.value = 1;
    precioAdmin.value = "0.00";
    costoAdmin.value = "0.00";
    /* elementoProducto.querySelector("#nomProdTabla").textContent = element.nombre;
    elementoProducto.querySelector("#cantidadTablaAdmin").textContent =
      element.existencia;
      elementoProducto.querySelector("#precioTablaAdmin").textContent = element.venta; */
  }
  if (e.target.classList.contains("btn-warning")) {
    toggleModal("EDITAR PRODUCTO");
    BotonModalAccion.dataset.accion = "3";
    idViejolet = elementoProducto.querySelector("#idProdTabla").textContent;
    console.log(BotonModalAccion.dataset.accion)
    SolicitarObjeto(
      BotonModalAccion.dataset.accion,
      elementoProducto.querySelector("#idProdTabla").textContent
    ).then((objSolicitado) => {
      console.log(objSolicitado);
      idAdmin.value = objSolicitado.codigo;
      nomAdmin.value = objSolicitado.nombre;
      costoAdmin.value = objSolicitado.costo;
      precioAdmin.value = objSolicitado.precio;
      cantAdmin.value = objSolicitado.existencia;
      BotonModalAccion.dataset.accion = "4";
      anio = objSolicitado.anio;
      mes = objSolicitado.mes;
      dia = objSolicitado.dia;
      console.log(BotonModalAccion.dataset.accion)
      /*
      nomAdmin.value = elementoProducto.querySelector("#nomProdTabla").textContent; */
    });    
  }
  if (e.target.classList.contains("btn-danger")) {
    toggleModal("BORRAR UN PRODUCTO");
  }
  if (e.target.classList.contains("btn-primary")) {
    toggleModal("AÑADIR A LISTA");
  }
});

/* ---------------------------------------------------------- */
/* ---------------------------------------------------------- */
/* FUNCIÓN UNIVERSAL PARA MANDAR LOS OBJETOS DEL FORMULARIO */

const MandarAccionYObj = async (obj, accion) => {
  let objetoparaAccion = { ...obj };
  let permisoparaAccion = await fetch(
    "../../jugueteria/Controlador/Almacen.php",
    {
      method: "POST", // or 'PUT'
      body: JSON.stringify(objetoparaAccion),
      headers: {
        "Content-Type": "application/json", // AQUI indicamos el formato
      }, // data can be `string` or {object}!
    }
  );
  let respuestaUltima = await permisoparaAccion.json();
  console.log(respuestaUltima);
  if (respuestaUltima == 0) {
    return true;
  } else {
    return false;
  }
  //  return true;
};

/* ---------------------------------------------------------- */
/* ---------------------------------------------------------- */
const resetA1 = ()=>{
  idAdmin.value="";
  if(idAdmin.hasAttribute("disabled")){
    idAdmin.removeAttribute("disabled");  
    idAdmin.style.cursor = "text";
    nomAdmin.removeAttribute("disabled");  
    nomAdmin.style.cursor = "text";
  }    
  nomAdmin.value ="";
  cantAdmin.value = 1;
  precioAdmin.value = '0.00';
  costoAdmin.value = '0.00';
    

}

AgregarNuevobtn.addEventListener("click", (e) => {
  //colorform.style.background = "#90f1f171";
  BotonModalAccion.dataset.accion = "1";
  IDlHelp.textContent = "**Puede dejar en blanco este campo y el sistema asignará un ID";
  toggleModal("AÑADIR NUEVO PRODUCTO");
  resetA1();
  
});

BotonModalAccion.addEventListener("click", (e) => {
  let objAñadirNuevo = {};
  let accion = BotonModalAccion.dataset.accion;
  console.log(accion);
  if (accion === "1") {
    console.log(BotonModalAccion.dataset.accion);
    //$jugueteRecibido = '{"accion":"1","idNuevo":"","nombre":"Batman","precio":"25.5","costo":"10","cantidad":"2"}';
    objAñadirNuevo = {
      accion: accion,
      idNuevo: idAdmin.value,
      nombre: nomAdmin.value,
      precio: parseFloat(precioAdmin.value),
      costo: parseFloat(costoAdmin.value),
      cantidad: parseInt(cantAdmin.value),
    };
    if (MandarAccionYObj(objAñadirNuevo, accion)) {
      alert("OPERACIÓN EXITOSA");
      fetchID();
      toggleModal("");
      return true;
    } else console.log("Error en la BD");
  }
  if (accion === "2") {
    //$jugueteRecibido = '{"accion":"2","idNuevo":"","precio":"25.5","costo":"10","cantidad":"2"}';
    objAñadirNuevo = {
      accion: accion,
      idNuevo: idAdmin.value,
      precio: parseFloat(precioAdmin.value),
      costo: parseFloat(costoAdmin.value),
      cantidad: parseInt(cantAdmin.value),
    };
    console.log(objAñadirNuevo);
    if (MandarAccionYObj(objAñadirNuevo, accion)) {
      alert("OPERACIÓN EXITOSA");
      fetchID();
      toggleModal("");
      return true;
    } else alert("Error en la BD");
  }
  if (accion === "4") {
        console.log("ACCION 4")
        //"anio":"2021","mes":"07","dia":"09"}
        objAñadirNuevo = {
          accion: accion,
          idNuevo: idAdmin.value,
          idViejo:idViejolet,
          nombre: nomAdmin.value,
          precio: parseFloat(precioAdmin.value),
          costo: parseFloat(costoAdmin.value),
          cantidad: parseInt(cantAdmin.value),
          anio: anio,
          mes:mes,
          dia:dia
        };
        console.log(objAñadirNuevo);
        if (MandarAccionYObj(objAñadirNuevo, accion)) {
          alert("OPERACIÓN EXITOSA");
          fetchID();
          toggleModal("");
          return true;
        } else alert("Error en la BD");
        return true;
  }

  else {
    alert("Error interno,accion no especificada");
  }
});

ContenedorModal.addEventListener("click", (e) => {
  if (e.target == botonCerrarCarrito) {
    toggleModal();
  }
});
