const modalGastosF = document.querySelector("#modalGastosF");
const cerrarModalGastos = document.querySelector("#cerrarModalGastos");
const botonGastos = document.querySelector("#gastos");

const BTNgastos = document.querySelector("#BTNgastos");
const vigilanciaInput = document.querySelector("#vigilanciaInput");
const comidanput = document.querySelector("#comidanput");
const otrosInput = document.querySelector("#otrosInput");

botonGastos.addEventListener("click", (e) => {
  modalGastosF.classList.toggle("show");
  vigilanciaInput.value="";
  comidanput.value="";
  otrosInput.value="";
  e.preventDefault();
});

modalGastosF.addEventListener("click", (e) => {
  if (e.target == cerrarModalGastos) {
    modalGastosF.classList.toggle("show");
  }
});

/* -----------EVENTOS DE VALIDACION---------------- */

//Si permite la entrada del punto decimal mas de una vez
const solodecimal2 =
  /[a-z|A-Z|/*+ \\|°!#\\"\\'\\$\\^/&\\(\\)=><?¡¿¸}{~\\¨\\´;:_\\-\\,¬@·½\\`\\-\\%\\-⨪|-·|\\-]/g;

//Se encargará de verificar cuantos puntos decimales ingresa

//Permite ingreso de punto decimal mas de una vez
vigilanciaInput.addEventListener("input", (e) => {
  cuentaPuntos = 0; //Se debe inicializar en cero en cada listener

  fnCuentaNumeros(vigilanciaInput.value); //Invoca al metodo que cuenta las repeticiones y
  //requiere de argumento la propia caja de texto

  if (vigilanciaInput.value == ".") {
    vigilanciaInput.value = "0."; //Si al inicio es un . cambia a 0.
  } else if (cuentaPuntos > 1) {
    //Si se encontró mas de un punto
    vigilanciaInput.value = vigilanciaInput.value.slice(0, -1); //Quita el ultimo caracter, es decir el punto
  }
  vigilanciaInput.value = vigilanciaInput.value.replace(solodecimal2, ""); //Manten la expresion regular
});
comidanput.addEventListener("input", (e) => {
  cuentaPuntos = 0; //Se debe inicializar en cero en cada listener

  fnCuentaNumeros(comidanput.value); //Invoca al metodo que cuenta las repeticiones y
  //requiere de argumento la propia caja de texto

  if (comidanput.value == ".") {
    comidanput.value = "0."; //Si al inicio es un . cambia a 0.
  } else if (cuentaPuntos > 1) {
    //Si se encontró mas de un punto
    comidanput.value = comidanput.value.slice(0, -1); //Quita el ultimo caracter, es decir el punto
  }
  comidanput.value = comidanput.value.replace(solodecimal2, ""); //Manten la expresion regular
});
otrosInput.addEventListener("input", (e) => {
  cuentaPuntos = 0; //Se debe inicializar en cero en cada listener

  fnCuentaNumeros(otrosInput.value); //Invoca al metodo que cuenta las repeticiones y
  //requiere de argumento la propia caja de texto

  if (otrosInput.value == ".") {
    otrosInput.value = "0."; //Si al inicio es un . cambia a 0.
  } else if (cuentaPuntos > 1) {
    //Si se encontró mas de un punto
    otrosInput.value = otrosInput.value.slice(0, -1); //Quita el ultimo caracter, es decir el punto
  }
  otrosInput.value = otrosInput.value.replace(solodecimal2, ""); //Manten la expresion regular
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

const MandarObjGastos = async () => {
  if(vigilanciaInput.value=="" && otrosInput.value=="" && comidanput==""){
    alert("Ingrese al menos un gasto; debe ser diferente de 0");
    return;
  }
  let objetoparaAccion = {
    vigilancia: vigilanciaInput.value ==""? 0 : parseInt(vigilanciaInput.value),
    comida: comidanput.value ==""? 0 : parseInt(comidanput.value),
    otros: otrosInput.value ==""? 0 : parseInt(otrosInput.value),
  };
  try {
    let resp = await fetch("Controlador/Indirecto.php", {
      method: "POST", // or 'PUT'
      body: JSON.stringify(objetoparaAccion),
      headers: {
        "Content-Type": "application/json", // AQUI indicamos el formato
      }, // data can be `string` or {object}!
    });
    let data = await resp.text();    
    alert(data);
    if(data =="Gastos ingresados correctamente"){
        modalGastosF.classList.toggle("show");
    }
    //FetchData();
  } catch (error) {
    console.log(error);
  }
};

BTNgastos.addEventListener("click", () => {      
    MandarObjGastos();
});
