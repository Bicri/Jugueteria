const ContenedorModal = document.querySelector("#modalUniversal");
const contenidoModal = document.querySelector("#contenidoModalUniversal");

const modalLista = document.querySelector("#modalLista");
const contenidoModalLista = document.querySelector("#contenidoModalLista");

const modalConfirm = document.querySelector("#modalConfirm");
const cerrarModalConfirm = document.querySelector("#cerrarModalConfirm");
const BTNconfirmacion1 = document.querySelector("#BTNconfirmacion1");
const BTNconfirmacion2 = document.querySelector("#BTNconfirmacion2");

let auxiliar = false;
//const botonCerrarCarrito = document.querySelector("#close-iconUni");
const botonCerrarCarrito = document.querySelector("#close-iconUni");
const closeIconLista = document.querySelector("#closeIconLista");
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

const cantdeseadaLista = document.querySelector("#cantdeseadaLista");

/* -----------EVENTOS DE VALIDACION---------------- */
//No permite el ingreso de el punto decimal
const solonumeros =
  /[a-z|A-Z|/*+ \\|°!#\\"\\'\\$\\^/&\\(\\)=><?¡¿¸}{~\\¨\\´;:_\\-\\,¬@·½\\`\\-\\%\\-⨪|-·\\.|\\-]/g;

//Si permite la entrada del punto decimal mas de una vez
const solodecimal =
  /[a-z|A-Z|/*+ \\|°!#\\"\\'\\$\\^/&\\(\\)=><?¡¿¸}{~\\¨\\´;:_\\-\\,¬@·½\\`\\-\\%\\-⨪|-·|\\-]/g;

//Se encargará de verificar cuantos puntos decimales ingresa
let cuentaPuntos = 0;

//Como solo acepta numeros, no hay ningun cambio
cantAdmin.addEventListener("input", (e) => {
  cantAdmin.value = cantAdmin.value.replace(solonumeros, "");
});
cantdeseadaLista.addEventListener("input", (e) => {
  cantdeseadaLista.value = cantdeseadaLista.value.replace(solonumeros, "");
});

//Permite ingreso de punto decimal mas de una vez
costoAdmin.addEventListener("input", (e) => {
  cuentaPuntos = 0; //Se debe inicializar en cero en cada listener

  fnCuentaNumeros(costoAdmin.value); //Invoca al metodo que cuenta las repeticiones y
  //requiere de argumento la propia caja de texto

  if (costoAdmin.value == ".") {
    costoAdmin.value = "0."; //Si al inicio es un . cambia a 0.
  } else if (cuentaPuntos > 1) {
    //Si se encontró mas de un punto
    costoAdmin.value = costoAdmin.value.slice(0, -1); //Quita el ultimo caracter, es decir el punto
  }
  costoAdmin.value = costoAdmin.value.replace(solodecimal, ""); //Manten la expresion regular
});
precioAdmin.addEventListener("input", (e) => {
  cuentaPuntos = 0; //Se debe inicializar en cero en cada listener

  fnCuentaNumeros(precioAdmin.value); //Invoca al metodo que cuenta las repeticiones y
  //requiere de argumento la propia caja de texto

  if (precioAdmin.value == ".") {
    precioAdmin.value = "0."; //Si al inicio es un . cambia a 0.
  } else if (cuentaPuntos > 1) {
    //Si se encontró mas de un punto
    precioAdmin.value = precioAdmin.value.slice(0, -1); //Quita el ultimo caracter, es decir el punto
  }
  precioAdmin.value = precioAdmin.value.replace(solodecimal, ""); //Manten la expresion regular
});

function fnCuentaNumeros(texto) {
  for (
    let i = 0;
    i < texto.length;
    i++ //Recorre la cadena
  ) {
    if (texto[i] == ".") {
      //Si encuentras u punto, suma 1 a cuentaPuntos
      cuentaPuntos++;
    }
    if (cuentaPuntos > 1) {
      //En caso de encontrar mas de un punto (contado) rompe ciclo
      break; //No tiene casos seguir contando, el objetivo esta hecho
    }
  }
}

/* -------------------EVENTOS DE VALIDACION----------------------------- */

const AgregarNuevobtn = document.querySelector("#agregarNuevo");
const botonCerrar = document.querySelector("#agregarNuevo");
const colorform = document.querySelector("#colorform");
let idViejolet = 0;
let anio = "";
let mes = "";
let dia = "";

const BotonModalLista = document.querySelector("#BotonModalLista");

let flag = false;

const passwordAdmin = document.querySelector("#passwordAdmin");

passwordAdmin.addEventListener("keyup", () => {
  //console.log(flag);
  fetch("Contrasena/Contrasena.php")
    .then((contra) => {
      return contra.json();
    })
    .then((contra2) => {
      //console.log(contra2);

      if (passwordAdmin.value == contra2) {
        flag = true;
        passwordAdmin.style.boxShadow = "0 0 1px 2px rgba(0,255,0,0.5)";
      } else {
        flag = false;
        passwordAdmin.style.boxShadow = "0 0 1px 2px rgba(255,0,0,0.5)";
      }
    })
    .catch((error) => {
      console.log(error);
    });
});

/* ABRIR Y CERRAR MODAL */
const toggleModal = (titulo) => {
  tituloModalAdmin.textContent = titulo;
  contenidoModal.classList.toggle("show");
  ContenedorModal.classList.toggle("showModal");
};

const toggleModalLista = () => {
  modalLista.classList.toggle("show");
  contenidoModalLista.classList.toggle("showModal");
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
document.querySelector("#buscarIDAdmin").addEventListener("keypress", (e) => {
  if (e.keyCode === 13) {
    e.preventDefault();
    fetchID();
  }
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
  let permisoparaAccion = await fetch("Controlador/Almacen.php", {
    method: "POST", // or 'PUT'
    body: JSON.stringify(objetoparaAccion),
    headers: {
      "Content-Type": "application/json", // AQUI indicamos el formato
    }, // data can be `string` or {object}!
  });
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

const resetA4 = () => {
  idAdmin.value = "";
  if (idAdmin.hasAttribute("disabled")) {
    idAdmin.removeAttribute("disabled");
    idAdmin.style.cursor = "text";
    nomAdmin.removeAttribute("disabled");
    nomAdmin.style.cursor = "text";
  }
};
const resetB = () => {
  if (cantAdmin.hasAttribute("disabled")) {
    cantAdmin.removeAttribute("disabled");
    cantAdmin.style.cursor = "text";
    costoAdmin.removeAttribute("disabled");
    costoAdmin.style.cursor = "text";
  }
};

itemsAdmin.addEventListener("click", (e) => {
  elementoProducto = e.target.parentElement.parentElement;
  if (e.target.classList.contains("btn-success")) {
    resetB();
    IDlHelp.textContent = "";
    toggleModal("AÑADIR STOCK A PRODUCTO");
    BotonModalAccion.value = "Guardar";
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
    precioAdmin.value =
      elementoProducto.querySelector("#precioTablaAdmin").textContent;
    costoAdmin.value = "0.00";
  }
  if (e.target.classList.contains("btn-warning") && flag) {
    IDlHelp.textContent = "";
    resetA4();
    auxiliar = false;
    toggleModal("EDITAR PRODUCTO");
    BotonModalAccion.value = "Guardar Cambios";
    BotonModalAccion.dataset.accion = "3";
    idViejolet = elementoProducto.querySelector("#idProdTabla").textContent;
    console.log(BotonModalAccion.dataset.accion);
    if (
      parseInt(
        elementoProducto.querySelector("#cantidadTablaAdmin").textContent
      ) <= 0
    ) {
      BotonModalAccion.dataset.accion = "4";
      auxiliar = true;
      idAdmin.value =
        elementoProducto.querySelector("#idProdTabla").textContent;
      nomAdmin.value =
        elementoProducto.querySelector("#nomProdTabla").textContent;
      cantAdmin.value = "No aplica";
      precioAdmin.value =
        elementoProducto.querySelector("#precioTablaAdmin").textContent;
      costoAdmin.value = "No aplica";
      cantAdmin.setAttribute("disabled", "");
      cantAdmin.style.cursor = "not-allowed";
      costoAdmin.setAttribute("disabled", "");
      costoAdmin.style.cursor = "not-allowed";
      return;
    }
    resetB();
    SolicitarObjeto(
      BotonModalAccion.dataset.accion,
      elementoProducto.querySelector("#idProdTabla").textContent
    )
      .then((objSolicitado) => {
        console.log(objSolicitado);
        idAdmin.value = objSolicitado.codigo;
        nomAdmin.value = objSolicitado.nombre;
        costoAdmin.value = objSolicitado.costo;
        precioAdmin.value = objSolicitado.precio;
        cantAdmin.value = objSolicitado.existencia;
        cantAdmin.setAttribute(
          "title",
          `${objSolicitado.dia}/${objSolicitado.mes}/${objSolicitado.anio}`
        );
        costoAdmin.setAttribute(
          "title",
          `${objSolicitado.dia}/${objSolicitado.mes}/${objSolicitado.anio}`
        );
        BotonModalAccion.dataset.accion = "4";
        anio = objSolicitado.anio;
        mes = objSolicitado.mes;
        dia = objSolicitado.dia;
        console.log(BotonModalAccion.dataset.accion);
        /*nomAdmin.value = elementoProducto.querySelector("#nomProdTabla").textContent; */
      })
      .catch((e) => {
        console.error(e);
      });
  }
  if (e.target.classList.contains("btn-danger") && flag) {
    IDlHelp.textContent = "";
    modalConfirm.classList.toggle("show");
    BTNconfirmacion1.dataset.accion = "6";
    BTNconfirmacion2.dataset.accion = "6";
    let fila = e.target.parentElement.parentElement;
    document.querySelector("#idModalConfirm").textContent =
      fila.querySelector("#idProdTabla").textContent;
    document.querySelector("#nomModalConfirm").textContent =
      fila.querySelector("#nomProdTabla").textContent;
    document.querySelector("#cantModalConfirm").textContent =
      fila.querySelector("#cantidadTablaAdmin").textContent;
    document.querySelector("#precModalConfirm").textContent =
      fila.querySelector("#precioTablaAdmin").textContent;
    SolicitarObjeto("6", fila.querySelector("#idProdTabla").textContent).then(
      (objSolicitado) => {
        console.log(objSolicitado);
        document.querySelector("#costoModal").textContent = objSolicitado.costo;
        BTNconfirmacion1.dataset.accion = "7";
        BTNconfirmacion2.dataset.accion = "7";
        if (objSolicitado.existencia > 0) {
          BTNconfirmacion2.style.display = "block";
          BTNconfirmacion1.textContent = "Si, borralo SIN agregar costos";
          console.log("tiene más de 0");
        } else {
          console.log("tiene 0");
          BTNconfirmacion2.style.display = "none";
          BTNconfirmacion1.textContent = "Si, borralo";
        }
      }
    );
  }

  if (e.target.classList.contains("btn-primary")) {    
    toggleModalLista();
    idLista.value = elementoProducto.querySelector("#idProdTabla").textContent;
    nomLista.value =
      elementoProducto.querySelector("#nomProdTabla").textContent;
    cantLista.value = elementoProducto.querySelector(
      "#cantidadTablaAdmin"
    ).textContent;
    cantdeseadaLista.value = 1;
    BotonModalLista.dataset.accion = "5";
  }

  if (!e.target.classList.contains("btn1")) {
    return false;
  } else if (e.target.classList.contains("btn-danger") && !flag) {
      if(passwordAdmin.value.length===0)
      {
        alert("Ingresa contraseña");
      }else{
        alert("Contraseña incorrecta")
      }
  } else if (e.target.classList.contains("btn-warning") && !flag) {
    if(passwordAdmin.value.length===0)
    {
      alert("Ingresa contraseña");
    }else{
      alert("Contraseña incorrecta")
    }
  }
});
 
/* ---------------------------------------------------------- */
/* ---------------------------------------------------------- */
/* FUNCIÓN UNIVERSAL PARA MANDAR LOS OBJETOS DEL FORMULARIO */

const MandarAccionYObj = async (obj, accion) => {
  let objetoparaAccion = { ...obj };
  let permisoparaAccion = await fetch("Controlador/Almacen.php", {
    method: "POST", // or 'PUT'
    body: JSON.stringify(objetoparaAccion),
    headers: {
      "Content-Type": "application/json", // AQUI indicamos el formato
    }, // data can be `string` or {object}!
  });
  let respuestaUltima = await permisoparaAccion.text();
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
const resetA1 = () => {
  idAdmin.value = "";
  if (idAdmin.hasAttribute("disabled")) {
    idAdmin.removeAttribute("disabled");
    idAdmin.style.cursor = "text";
    nomAdmin.removeAttribute("disabled");
    nomAdmin.style.cursor = "text";
  }
  nomAdmin.value = "";
  cantAdmin.value = 1;
  precioAdmin.value = "0.00";
  costoAdmin.value = "0.00";
};

AgregarNuevobtn.addEventListener("click", (e) => {
  //colorform.style.background = "#90f1f171";
  BotonModalAccion.dataset.accion = "1";
  /* IDlHelp.textContent =
    "**Puede dejar en blanco este campo y el sistema asignará un ID"; */
  toggleModal("AÑADIR NUEVO PRODUCTO");
  BotonModalAccion.value = "Guardar";
  resetA1();
  resetB();
});

BotonModalAccion.addEventListener("click", (e) => {
  document.querySelector("#buscarIDAdmin").focus();
  if (
    nomAdmin == "" ||
    precioAdmin.value <= 0 ||
    precioAdmin == "" ||
    costoAdmin.value <= 0 ||
    costoAdmin == "" ||
    cantAdmin.value <= 0 ||
    cantAdmin == ""
  ) {
    alert("Error en los datos introducidos; deben ser diferentes de 0");
    return;
  }

  if(parseFloat(costoAdmin.value) > parseFloat(precioAdmin.value)){
    alert("El precio de venta sugerido es menor al costo del producto");
    return;
  }
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
    MandarAccionYObj(objAñadirNuevo, accion).then((resp) => {
      if (resp) {
        alert("OPERACIÓN EXITOSA");
        fetchID();
        toggleModal("");
        return true;
      } else {
        alert("ERROR: Este producto ya ha sido agregado.");
      }
    });
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
    console.log("ACCION 4");
    //"anio":"2021","mes":"07","dia":"09"}
    objAñadirNuevo = {
      accion: accion,
      idNuevo: idAdmin.value,
      idViejo: idViejolet,
      nombre: nomAdmin.value,
      precio: parseFloat(precioAdmin.value),
      costo: parseFloat(costoAdmin.value),
      cantidad: parseInt(cantAdmin.value),
      anio: anio,
      mes: mes,
      dia: dia,
    };
    console.log(objAñadirNuevo);
    MandarAccionYObj(objAñadirNuevo, accion).then((resp) => {
      if (resp) {
        alert("OPERACIÓN EXITOSA");
        fetchID();
        toggleModal("");
        return true;
      } else {
        alert("ERROR: Este producto ya ha sido agregado.");
      }
    });
  }
  /* if (accion === "4" && auxiliar) {
    console.log("ACCION 4 aux");
    //"anio":"2021","mes":"07","dia":"09"}
    objAñadirNuevo = {
      accion: accion,
      idNuevo: idAdmin.value,
      idViejo: idViejolet,
      nombre: nomAdmin.value,
      precio: parseFloat(precioAdmin.value),
      costo: 0,
      cantidad: 0,
      anio: anio,
      mes: mes,
      dia: dia,
    };
    console.log(objAñadirNuevo);
    MandarAccionYObj(objAñadirNuevo, accion).then((resp) => {
      if (resp) {
        alert("OPERACIÓN EXITOSA");
        fetchID();
        toggleModal("");
        return true;
      } else {
        alert("ERROR: Este producto ya ha sido agregado.");
      }
    });
  } */
});

ContenedorModal.addEventListener("click", (e) => {
  if (e.target == botonCerrarCarrito) {
    toggleModal();
  }
});

//ACCION 5 AÑADIR A LISTA

BotonModalLista.addEventListener("click", () => {
  document.querySelector("#buscarIDAdmin").focus();
  if (cantdeseadaLista.value == "" || cantdeseadaLista.value <= 0) {
    alert("Introduce la cantidad deseada; debe ser diferente de 0");
    return;
  }
  let objAñadirLista = {};
  let accion = BotonModalLista.dataset.accion;
  console.log(accion);
  //$jugueteRecibido = '{"accion":"5","idNuevo":"123","cantidad":"10"}';
  if (accion === "5") {
    objAñadirLista = {
      accion: accion,
      idNuevo: idLista.value,
      cantidad: parseInt(cantdeseadaLista.value),
    };
    console.log(objAñadirLista);
    if (MandarAccionYObj(objAñadirLista, accion)) {
      alert("OPERACIÓN EXITOSA");
      fetchID();
      toggleModalLista("");
      return true;
    } else console.log("Error en la BD");
  }
});

/* ----------------------- */

modalLista.addEventListener("click", (e) => {
  if (e.target == closeIconLista) {
    toggleModalLista();
  }
});

cerrarModalConfirm.addEventListener("click", (e) => {
  modalConfirm.classList.toggle("show");
});

BTNconfirmacion1.addEventListener("click", (e) => {
  document.querySelector("#buscarIDAdmin").focus();
  let accionConfirm = e.target.dataset.accion;
  let idConfirm =
    e.target.parentElement.parentElement.querySelector(
      "#idModalConfirm"
    ).textContent;
  console.log(accionConfirm);
  //$jugueteRecibido = '{"accion":"7","idNuevo":"123","idViejo":"0"}'; 0 NO AGREGA
  objAñadirNuevo = {
    accion: accionConfirm,
    idNuevo: idConfirm,
    idViejo: 0,
  };
  if (MandarAccionYObj(objAñadirNuevo, accionConfirm)) {
    alert("OPERACIÓN EXITOSA SIN AGREGAR COSTOS");
    fetchID();
    modalConfirm.classList.toggle("show");
    return true;
  } else console.log("Error en la BD");
});
BTNconfirmacion2.addEventListener("click", (e) => {
  document.querySelector("#buscarIDAdmin").focus();
  let accionConfirm = e.target.dataset.accion;
  let idConfirm =
    e.target.parentElement.parentElement.querySelector(
      "#idModalConfirm"
    ).textContent;
  console.log(BTNconfirmacion2.dataset.accion);
  objAñadirNuevo = {
    accion: accionConfirm,
    idNuevo: idConfirm,
    idViejo: 1,
  };
  if (MandarAccionYObj(objAñadirNuevo, accionConfirm)) {
    alert("OPERACIÓN EXITOSA AGREGANDO COSTOS");
    fetchID();
    modalConfirm.classList.toggle("show");
    return true;
  } else console.log("Error en la BD");
});
