const items = document.querySelector("#items");
const templateCard = document.querySelector("#template-card").content;
const ElementosDebajoCart = document.querySelector("#template-footer").content;
const ElementosDentroCart = document.querySelector(
  "#template-elementos-carrito"
).content;
const confirmarCompra = document.querySelector('#confirmar-compra');
const templateElementosCarrito = document.querySelector("#cardss");
const templateFooterCarrito = document.querySelector("#footer");

const fragment = document.createDocumentFragment();
let carrito = {};
const pruebaOBJ = document.querySelector("#pruebaOBJ");

const mandarObjCarrito = async (carritoOBJ) => {
  //PruebaMandar en  carpeta Modelo
  let dataDesdePHP = await fetch(
    "/Jugueteria/Controlador/pruebaMandar.php?ALGO=2&DOS=2",
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
  console.log(respuestaUltima);
  //window.location.assign('ObjetoCarrito.php');
};
pruebaOBJ.addEventListener("click", () => {
  mandarObjCarrito(carrito);
});

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
  fethcData();
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

const fetchID = async (id) => {
  /* const productosPintados = document.querySelectorAll(".producto");
  productosPintados.forEach((element) => {
    element.remove();
  }); */
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

document.querySelector("#pruebaID").addEventListener("click", () => {
  let ID = document.querySelector("#buscarID").value;
  fetchID(ID);
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
    fragment.appendChild(clone);
  });
  items.appendChild(fragment);
  console.log(items);
};

items.addEventListener("click", (e) => {
  addCarrito(e);
});

const addCarrito = (e) => {
  if (e.target.classList.contains("boton-card")) {
    setCarrito(e.target.parentElement);
  }
  e.stopPropagation();
};

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
const setCarrito = (CardObj) => {
  const producto = {
    id: CardObj.querySelector(".boton-card").dataset.codigo,
    nombre: CardObj.querySelector("h5").textContent,
    precio: CardObj.querySelector("#precio").textContent,
    Almacen: parseInt(CardObj.querySelector("#cantidad").textContent),
    cantidad: 1,
  };
  console.log(producto);
  if (!carrito.hasOwnProperty(producto.id)) {
    carrito[producto.id] = { ...producto };
    pintarCarrito();
    return true;
  }

  if (
    carrito.hasOwnProperty(producto.id) &&
    carrito[producto.id].cantidad < 6
  ) {
    producto.cantidad = carrito[producto.id].cantidad + 1;
    carrito[producto.id] = { ...producto };
    pintarCarrito();
    return true;
  } else {
    console.log("NO AGREGADO");
    return false;
  }

  pintarCarrito();
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
    ElementosDentroCart.querySelector("#precioEnCart").textContent =
      producto.precio * producto.cantidad;

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
      confirmarCompra.disabled=true;
      confirmarCompra.style.cursor = 'not-allowed';
    return;
  }
  confirmarCompra.disabled=false;
      confirmarCompra.style.cursor = 'pointer';
  // sumar cantidad y sumar totales
  const nCantidad = Object.values(carrito).reduce(
    (acc, { cantidad }) => acc + cantidad,
    0
  );
  const nPrecio = Object.values(carrito).reduce(
    (acc, { cantidad, precio }) => acc + cantidad * precio,
    0
  );
  // console.log(nPrecio)

  ElementosDebajoCart.querySelectorAll("td")[0].textContent = nCantidad;
  ElementosDebajoCart.querySelector("span").textContent = nPrecio;

  const clone = ElementosDebajoCart.cloneNode(true);
  fragment.appendChild(clone);

  templateFooterCarrito.appendChild(fragment);

  const boton = document.querySelector("#vaciar-carrito");
  boton.addEventListener("click", () => {
    carrito = {};
    pintarCarrito();
  });

  

};

const btnAumentarDisminuir = (e) => {
  // console.log(e.target.classList.contains('btn-info'))
  if (e.target.classList.contains("btn-info")) {
    const producto = carrito[e.target.dataset.id];
    producto.cantidad++;
    carrito[e.target.dataset.id] = { ...producto };
    pintarCarrito();
  }

  if (e.target.classList.contains("btn-danger")) {
    const producto = carrito[e.target.dataset.id];
    producto.cantidad--;
    if (producto.cantidad === 0) {
      delete carrito[e.target.dataset.id];
    } else {
      carrito[e.target.dataset.id] = { ...producto };
    }
    pintarCarrito();
  }
  e.stopPropagation();
};

templateElementosCarrito.addEventListener("click", (e) => {
  btnAumentarDisminuir(e);
});
