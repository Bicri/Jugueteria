const items = document.querySelector("#items");
const templateCard = document.querySelector("#template-card").content;
const fragment = document.createDocumentFragment();
let carrito = {};
const fethcData = async () => {
  
  try {
    const data = await (await fetch("index.php")).json();
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
const templateSinRes = document.querySelector('#template-sinResultados').content;
const PintarNullCard = ()=>{
  
  templateSinRes.querySelector("h5").textContent = "SIN RESULTADOS";
    const clone = templateSinRes.cloneNode(true);
    fragment.appendChild(clone);
  
  items.appendChild(fragment);
  console.log(items);
};

const fetchID = async (id) => {
  
  const productosPintados = document.querySelectorAll('.producto');
  productosPintados.forEach(element => {
    element.remove();
  });
  try {    
    const data = await (await fetch(`index.php?buscarId=${id}`)).json();
    if(data.items.length==0)PintarNullCard();
    else pintarCards(data);
  } catch (error) {
    console.log(error);
  }
};

document.querySelector('#pruebaID').addEventListener('click',()=>{
  let ID = document.querySelector('#buscarID').value;
  fetchID(ID);
});

/*  */






const pintarCards = (data) => {  
  data.items.forEach((element) => {
    templateCard.querySelector("h5").textContent = element.nombre;
    templateCard.querySelector("#precio").textContent =element.venta;
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

const setCarrito = CardObj => {
    const producto ={
        id:CardObj.querySelector('.boton-card').dataset.codigo,
        nombre:CardObj.querySelector('h5').textContent,
        precio:CardObj.querySelector('#precio').textContent,
        cantidad:parseInt((CardObj.querySelector('#cantidad').textContent))
    }
    console.log(producto)
    if(carrito.hasOwnProperty(producto.id)){
        producto.cantidad = carrito[producto.id].cantidad + 1;
    }

    carrito[producto.id] = {...producto}

    console.log(carrito)

};
