const items = document.querySelector("#items");
const templateCard = document.querySelector("#template-card").content;
const ElementosDebajoCart = document.querySelector("#template-footer").content;
const ElementosDentroCart = document.querySelector(
  "#template-elementos-carrito"
).content;

const confirmarCompra = document.querySelector("#confirmar-compra");
const templateElementosCarrito = document.querySelector("#cardss");
const templateFooterCarrito = document.querySelector("#footer");

const modalComprar = document.querySelector("#modalComprar");
const contenidomodalComprar = document.querySelector("#contenidoModalComprar");
const botonCerrarComprar = document.querySelector("#close-iconComprar");
const botonCerrarCarrito2 = document.querySelector("#close-iconCarrito");

botonCerrarComprar.addEventListener('click',()=>{
  fetchID();
})
botonCerrarCarrito2.addEventListener('click',()=>{
  fetchID();
})
/* pruebaModalInput.addEventListener("click", () => {
    console.log("hola modal");    
  modalComprar.classList.toggle("showModal");
  contenidomodalComprar.classList.toggle("show");
}); */

modalComprar.addEventListener("click", (e) => {
  if (e.target == botonCerrarComprar) {
    modalComprar.classList.toggle("showModal");
    contenidomodalComprar.classList.toggle("show");
  }
});

const fragment = document.createDocumentFragment();
let carrito = {};
const pruebaOBJ = document.querySelector("#pruebaOBJ");

const mandarObjCarrito = async (carritoOBJ) => {
  //PruebaMandar en  carpeta Modelo
  let dataDesdePHP = await fetch(
    "Controlador/ObjetoCarrito.php",
    {
      //Ten cuidado aqui Angel
      method: "POST", // or 'PUT'
      body: JSON.stringify(carritoOBJ),
      headers: {
        "Content-Type": "application/json", // AQUI indicamos el formato
      }, // data can be `string` or {object}!
    }
  );
  let respuestaUltima = await dataDesdePHP.json();
  fetchID();
  console.log(respuestaUltima);
  //window.location.assign('ObjetoCarrito.php');
};
/* pruebaOBJ.addEventListener("click", () => {
  mandarObjCarrito(carrito);
}); */

const fethcData = async () => {
  try {
    const data = await (await fetch("Controlador/Productos.php")).json();
    console.log(data);
    pintarCards(data);
  } catch (error) {
    console.log(error);
  }
};

document.addEventListener("DOMContentLoaded", () => {
  fetchID();
});

/*  */
const templateSinRes = document.querySelector(
  "#template-sinResultados"
).content;
const PintarNullCard = () => {
  templateSinRes.querySelector("h5").textContent = "SIN RESULTADOS";
  const clone = templateSinRes.cloneNode(true);
  fragment.appendChild(clone);

  items.appendChild(fragment);
  console.log(items);
};

const fetchID = async () => {
  /* const productosPintados = document.querySelectorAll(".producto");
  productosPintados.forEach((element) => {
    element.remove();
  }); */

  let id = document.querySelector("#buscarID").value;

  items.innerHTML = "";

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

document.querySelector("#botonBuscarID").addEventListener("click", () => {
  fetchID();
});
document.querySelector("#buscarID").addEventListener("keypress", (e) => {
  if (e.keyCode === 13) {
    e.preventDefault();
    fetchID();
  }
  
});

/*  */

const pintarCards = (data) => {
  data.items.forEach((element) => {
    templateCard.querySelector("h5").textContent = element.nombre;
    templateCard.querySelector("#precio").textContent = element.venta;
    templateCard.querySelector("#cantidad").textContent = element.existencia;
    templateCard.querySelector("#codigo").textContent = element.codigo;
    templateCard.querySelector(".boton-card").dataset.codigo = element.codigo;
    const clone = templateCard.cloneNode(true);
    if (element.existencia === "0") {
      //clone.querySelector('.producto').style.backgroundImage ="linear-gradient(120deg, #f6d46569 0% ,rgba(253, 159, 133, 0.493) 100%)";
      clone.querySelector(".producto").style.boxShadow = "0 0 9px 1px red";
    }
    fragment.appendChild(clone);
  });
  items.appendChild(fragment);
  console.log(items);
};

const cardDentroDeModal = (element) => {
  document.querySelector("#cardenModal").innerHTML = "";
  const clone = element.cloneNode(true);
  clone.style.background = "white";
  fragment.appendChild(clone);
  document.querySelector("#cardenModal").appendChild(fragment);
  document.querySelector("#cardenModal").querySelector(".btn").remove();
};

items.addEventListener("click", (e) => {
  addCarrito(e);
});

const AñadirCompra = document.querySelector("#AñadirCompra");
const inputCantidad = document.querySelector("#inputCantidad");
const inputPrecio = document.querySelector("#inputPrecio");
const addCarrito = (e) => {
  if (
    e.target.classList.contains("boton-card") &&
    parseInt(e.target.parentElement.querySelector("#cantidad").textContent) > 0
  ) {
    modalComprar.classList.toggle("showModal");

    contenidomodalComprar.classList.toggle("show");
    cardDentroDeModal(e.target.parentElement);
    AñadirCompra.dataset.idproducto = e.target.dataset.codigo;
    inputPrecio.value =
      e.target.parentElement.querySelector("#precio").textContent;
    inputCantidad.value = 1;
    /*  */
    console.log(e.target.parentElement);
    //setCarrito(e.target.parentElement);
  } else if (
    e.target.classList.contains("boton-card") &&
    parseInt(e.target.parentElement.querySelector("#cantidad").textContent) <= 0
  ) {
    alert("NO HAY STOCK");
  }
  e.stopPropagation();
};
AñadirCompra.addEventListener("click", (e) => {
  //let ID2 = document.querySelector("#buscarID").value;
  console.log("debugger");
  let producto =
    e.target.parentElement.parentElement.parentElement.parentElement.querySelector(
      ".producto"
    );
  console.log(producto);
  //setCarrito(producto);
  if (setCarrito(producto)) {
    modalComprar.classList.toggle("showModal");
    contenidomodalComprar.classList.toggle("show");
    console.log("AGREGADOOOOOO");

    inputCantidad.value = "";
    inputPrecio.value = "";
  } else {
    alert("almacen insuficiente");
  }
});

/* const setCarrito = (CardObj) => {
  const producto = {
    id: CardObj.querySelector(".boton-card").dataset.codigo,
    nombre: CardObj.querySelector("h5").textContent,
    precio: CardObj.querySelector("#precio").textContent,
    Almacen:parseInt((CardObj.querySelector('#cantidad').textContent)),
    cantidad:0
  };
  console.log(producto);
  if (carrito.hasOwnProperty(producto.id)) {
    producto.cantidad = carrito[producto.id].cantidad + 1;
  }

  carrito[producto.id] = { ...producto };

  console.log(carrito);
}; */

let carritoaBD = {};

const setCarrito = (CardObj) => {
  const producto = {
    id: CardObj.querySelector("#codigo").textContent,
    nombre: CardObj.querySelector("h5").textContent,
    precio: parseFloat(inputPrecio.value),
    Almacen: parseInt(CardObj.querySelector("#cantidad").textContent),
    cantidad: parseInt(inputCantidad.value),
  };
  console.log(producto);
  if (
    !carrito.hasOwnProperty(producto.id) &&
    producto.cantidad <= producto.Almacen
  ) {
    carrito[producto.id] = { ...producto };
    carritoaBD = { ...carrito[producto.id] };
    mandarObjCarrito(carritoaBD);
    //fetchID(ID2);
    pintarCarrito();

    return true;
  }

  if (
    carrito.hasOwnProperty(producto.id) &&
    producto.cantidad <= producto.Almacen
  ) {
    producto.cantidad =
      carrito[producto.id].cantidad + parseInt(inputCantidad.value);
    /* producto.Almacen =
      carrito[producto.id].Almacen - parseInt(inputCantidad.value); */
    carrito[producto.id] = { ...producto };
    carritoaBD = { ...carrito[producto.id] };
    carritoaBD.cantidad = parseInt(inputCantidad.value);
    mandarObjCarrito(carritoaBD);
    //fetchID(ID2);
    pintarCarrito();

    return true;
  } else {
    /* alert("almacen insuficiente"); */
    return false;
  }
};

const pintarCarrito = () => {
  templateElementosCarrito.innerHTML = "";
  console.log(carrito);
  Object.values(carrito).forEach((producto) => {
    ElementosDentroCart.querySelector("#idEnCart").textContent = producto.id;
    ElementosDentroCart.querySelector("#nombreEnCart").textContent =
      producto.nombre;
    ElementosDentroCart.querySelector("#cantidadEnCart").textContent =
      producto.cantidad;

    ElementosDentroCart.querySelector("#Subtotal").textContent =
      (producto.precio * producto.cantidad).toFixed(2);
    ElementosDentroCart.querySelector("#precioEnCart").textContent =
      producto.precio;

    ElementosDentroCart.querySelector("#boton-addCantidad").dataset.id =
      producto.id;
    ElementosDentroCart.querySelector("#boton-restarCantidad").dataset.id =
      producto.id;

    const clone = ElementosDentroCart.cloneNode(true);
    fragment.appendChild(clone);
  });
  templateElementosCarrito.appendChild(fragment);
  pintarFooter();
};

const pintarFooter = () => {
  templateFooterCarrito.innerHTML = "";

  if (Object.keys(carrito).length === 0) {
    templateFooterCarrito.innerHTML = `
      <th scope="row" colspan="6">Carrito vacío, comienza a comprar!</th>
      `;

    confirmarCompra.disabled = true;
    confirmarCompra.style.cursor = "not-allowed";
    return;
  }
  confirmarCompra.disabled = false;
  confirmarCompra.style.cursor = "pointer";

  // sumar cantidad y sumar totales
  const nCantidad = Object.values(carrito).reduce(
    (acc, { cantidad }) => acc + cantidad,
    0
  );
  const nPrecio = Object.values(carrito).reduce((acc, { cantidad, precio }) => (acc + cantidad * precio),0);
  // console.log(nPrecio)

  ElementosDebajoCart.querySelectorAll("td")[0].textContent = nCantidad;
  ElementosDebajoCart.querySelector("span").textContent = nPrecio.toFixed(2);

  const clone = ElementosDebajoCart.cloneNode(true);
  fragment.appendChild(clone);

  templateFooterCarrito.appendChild(fragment);

  

  const boton = document.querySelector("#vaciar-carrito");  
  //VACIAR CARRITO LISTENER CON FUNCIÓN A BD
  boton.addEventListener("click", () => {
    CancelaAgregaCarrito(0);
    carrito = {};
    pintarCarrito();
  });

 

};

const CancelaAgregaCarrito = async (accion) => {
  let objCancelarCarrito = { Total: accion }; //0 para eliminar carrito
  let permisoparaAccion = await fetch(
    "Controlador/CancelaAgregaCarrito.php",
    {
      method: "POST", // or 'PUT'
      body: JSON.stringify(objCancelarCarrito),
      headers: {
        "Content-Type": "application/json", // AQUI indicamos el formato
      }, // data can be `string` or {object}!
    }
  );
  let respuestaUltima = await permisoparaAccion.text();
  console.log(respuestaUltima);
};
confirmarCompra.addEventListener('click',()=>{
  CancelaAgregaCarrito(1);
  carrito = {};
  pintarCarrito();
})

const aumentarCarritoConsultaBD = async (idparaAccion, accion) => {
  let objetoparaAccion = { id: idparaAccion, accion: accion };
  let permisoparaAccion = await fetch(
    "Controlador/UnidadCarrito.php",
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
  if (respuestaUltima == '1') {
    console.log("es uno")
    //alert("NO HAY MÁS!!");
    return false;
  }
  else{return true;}
  //  return true;
};

const btnAumentarDisminuir = (e) => {
  // console.log(e.target.classList.contains('btn-info'))
  let idparaAccion =
    e.target.parentElement.parentElement.querySelector("#idEnCart").textContent;
  if (
    e.target.classList.contains("btn-info")) {
      aumentarCarritoConsultaBD(idparaAccion,1)
      .then((resp) => {
        if(resp){
          const producto = carrito[e.target.dataset.id];
          producto.cantidad++;
          carrito[e.target.dataset.id] = { ...producto };
          pintarCarrito();
          return true;
        }    
        else{alert("No hay más");}

      });
    //if (e.target.classList.contains("btn-info")) {
    
  }  
  if (e.target.classList.contains("btn-danger")) {
    const producto = carrito[e.target.dataset.id];
    if (producto.cantidad > 1 && aumentarCarritoConsultaBD(idparaAccion, 0))
      producto.cantidad--;
    else if (producto.cantidad <= 1 && confirm("are you shure?")) {
      if (aumentarCarritoConsultaBD(idparaAccion, 0)) {
        delete carrito[e.target.dataset.id];
      }
    } else {
      carrito[e.target.dataset.id] = { ...producto };
    }
    pintarCarrito();    
  }
  else{
    return false;
  } 
  e.stopPropagation();
};

templateElementosCarrito.addEventListener("click", (e) => {
  btnAumentarDisminuir(e);
});
