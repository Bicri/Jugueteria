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



const MandarObjGastos = async () => {
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
