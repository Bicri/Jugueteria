const ContenedorModal = document.querySelector("#modalUniversal");
const contenidoModal = document.querySelector("#contenidoModalUniversal");

const botonCerrarCarrito = document.querySelector("#close-iconUni");

const AgregarNuevobtn = document.querySelector("#agregarNuevo");
const colorform = document.querySelector("#colorform");

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
const toggleModal = () => {
  contenidoModal.classList.toggle("show");
  ContenedorModal.classList.toggle("showModal");
};
/* ---------------------------------------------------------- */
/* ---------------------------------------------------------- */
/* FUNCIÓN UNIVERSAL PARA MANDAR LOS OBJETOS DEL FORMULARIO */

const MandarAccionYObj = async (obj, accion) => {
  let objetoparaAccion = { ...obj };
  let permisoparaAccion = await fetch(
    "Controlador/Almacen.php",
    {
      method: "POST", // or 'PUT'
      body: JSON.stringify(objetoparaAccion),
      headers: {
        "Content-Type": "application/json", // AQUI indicamos el formato
      }, // data can be `string` or {object}!
    }
  );
  let respuestaUltima = await permisoparaAccion.text();
  console.log(respuestaUltima);
  //  return true;
};

/* ---------------------------------------------------------- */
/* ---------------------------------------------------------- */

AgregarNuevobtn.addEventListener("click", (e) => {
 
  colorform.style.background = "#90f1f171";
  BotonModalAccion.dataset.accion = "1";
  IDlHelp.textContent = "Descripcion desde boton 'Agregar nuevo'";
  toggleModal();
});

BotonModalAccion.addEventListener("click", (e) => {
  let accion = BotonModalAccion.dataset.accion;
  console.log(BotonModalAccion.dataset.accion);
   // $jugueteRecibido = '{"accion":"1","idNuevo":"","nombre":"Batman","precio":"25.5","costo":"10","cantidad":"2"}';
  let objAñadirNuevo = {
    accion: accion,
    idNuevo: idAdmin.value,
    nombre: nomAdmin.value,
    precio: parseFloat(precioAdmin.value),
    costo: parseFloat(costoAdmin.value),
    cantidad: parseInt(cantAdmin.value),
  };
  MandarAccionYObj(objAñadirNuevo, accion);
});

ContenedorModal.addEventListener("click", (e) => {
  if (e.target == botonCerrarCarrito) {
    toggleModal();
  }
});

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
    if (data.items.length == 0) PintarNullCard();
    else pintarCards(data);
  } catch (error) {
    console.log(error);
  }
};
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

itemsAdmin.addEventListener("click", (e) => {
  //addCarrito(e);
  console.log("Listener de toda la tabla de elementos");
});
