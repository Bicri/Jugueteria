const BtnPeriodo = document.querySelector("#BtnPeriodo");
const BtnSemana = document.querySelector("#BtnSemana");
const fechaInicio = document.querySelector("#fechaInicio");
const fechaFin = document.querySelector("#fechaFin");
const BtnFechas = document.querySelector("#BtnFechas");

const tituloH = document.querySelector("#tituloH");

/* ELEMENTOS PARA DESAPARECER */
const dateInicio = document.querySelector("#dateInicio");
const dateFin = document.querySelector("#dateFin");
const botonFechasMostrar = document.querySelector("#botonFechasMostrar");

const TODOS = document.querySelector("#TODOS");

/* ETIQUETAS */
const lblIngresos = document.querySelector("#lblIngresos");
const lblCDirectos = document.querySelector("#lblCDirectos");
const vigilancia = document.querySelector("#vigilancia");
const comida = document.querySelector("#comida");
const otros = document.querySelector("#otros");
const lblCIndirectos = document.querySelector("#lblCIndirectos");
const tituloUtilidad = document.querySelector("#tituloUtilidad");
const utilidad = document.querySelector("#utilidad");
const almacen = document.querySelector("#almacen");

const finSemana = document.querySelector("#finSemana");
const finAnio = document.querySelector("#finAnio");

const gastosporcentaje = document.querySelector("#gastosporcentaje");

const toggleCosas = () => {
  botonFechasMostrar.classList.toggle("noneObj");
  dateInicio.classList.toggle("noneObj");
  dateFin.classList.toggle("noneObj");
};

const MandarAccionYObj = async (obj) => {
  let objetoparaAccion = { ...obj };
  let permisoparaAccion = await fetch("Controlador/Utilidades.php", {
    method: "POST", // or 'PUT'
    body: JSON.stringify(objetoparaAccion),
    headers: {
      "Content-Type": "application/json", // AQUI indicamos el formato
    }, // data can be `string` or {object}!
  });
  let respuestaUltima = await permisoparaAccion.json();
  ponerDatos(respuestaUltima);
};
const MandarAccionYObj2 = async (obj) => {
  let objetoparaAccion = { ...obj };
  let permisoparaAccion = await fetch("Controlador/Utilidades.php", {
    method: "POST", // or 'PUT'
    body: JSON.stringify(objetoparaAccion),
    headers: {
      "Content-Type": "application/json", // AQUI indicamos el formato
    }, // data can be `string` or {object}!
  });
  //let respuestaUltima = await permisoparaAccion.json();
  return permisoparaAccion;
};

const ponerDatos = (response) => {
  lblIngresos.textContent = response[0].Ingresos;
  lblCIndirectos.textContent = response[0].Costos;  
  vigilancia.textContent = response[1].Ingresos;
  comida.textContent = response[1].Costos;
  otros.textContent = response[1].Indirecto;
  lblCDirectos.textContent = response[0].Indirecto;
  if (response[0].Utilidad < 0) {
    tituloUtilidad.textContent = "Perdida";
    tituloUtilidad.style.color = "red";
  } else {
    tituloUtilidad.style.color = "green";
    tituloUtilidad.textContent = "Utilidad";
  }

  utilidad.textContent = response[0].Utilidad;
  almacen.textContent = response[1].Utilidad;
};

const Limpiar = () => {
  lblIngresos.textContent = "";
  lblCDirectos.textContent = "";
  vigilancia.textContent = "";
  comida.textContent = "";
  otros.textContent = "";
  lblCIndirectos.textContent = "";
  tituloUtilidad.textContent = "Utilidad/Perdida";
  utilidad.textContent = "";
  almacen.textContent = "";
};

document.addEventListener("DOMContentLoaded", () => {
  MandarAccionYObj({ accion: "0" });
});

/* BtnPeriodo.addEventListener("click", () => {
  toggleCosas();
  //tituloUtilidad.textContent = "NUEVO";
  tituloH.textContent = "Utilidad del periodo";
  BtnPeriodo.classList.toggle("noneObj");
  BtnSemana.classList.toggle("noneObj");
  TODOS.classList.toggle("noneObj");
  
  
}); */

/* BtnSemana.addEventListener("click", () => {
  MandarAccionYObj({ accion: "0" });
  toggleCosas();
  tituloH.textContent = "Utilidad de la semana";
  BtnSemana.classList.toggle("noneObj");
  BtnPeriodo.classList.toggle("noneObj");
  if(TODOS.hasAttribute("class")=="noneObj"){
    TODOS.classList.toggle("noneObj");
  }
}); */

BtnFechas.addEventListener("click", () => {
  let fechaI, fechaF;
  let anioI, anioF;
  let mesI, mesF;
  let diaI, diaF;
  let objPeriodo = {};
  if (fechaInicio.value == "" || fechaFin.value == "") {
    alert("Por favor escoge una fecha de inicio y una de fin de periodo");
    return false;
  } else {
    fechaI = fechaInicio.value.split("-");
    fechaF = fechaFin.value.split("-");
    anioI = parseInt(fechaI[0]);
    mesI = parseInt(fechaI[1]);
    diaI = parseInt(fechaI[2]);
    anioF = parseInt(fechaF[0]);
    mesF = parseInt(fechaF[1]);
    diaF = parseInt(fechaF[2]);
    objPeriodo;
    MandarAccionYObj2({
      accion: "1",
      anioI: anioI,
      mesI: mesI,
      diaI: diaI,
      anioF: anioF,
      mesF: mesF,
      diaF: diaF,
    })
      .then((resp) => {
        return resp.json();
      })
      .then((response) => {
        lblIngresos.textContent = response.Ingresos;
        lblCDirectos.textContent = response.Costos;
        lblCIndirectos.textContent = response.Indirecto;
        if (response.Utilidad < 0) {
          tituloUtilidad.textContent = "Perdida";
          tituloUtilidad.style.color = "red";
        } else {
          tituloUtilidad.style.color = "green";
          tituloUtilidad.textContent = "Utilidad";
        }
        utilidad.textContent = response.Utilidad;
        almacen.textContent = response.Almacen;
      })
      .catch((e) => {
        console.log(e);
      });
    //{"accion":"1","anioI":"2021","mesI":"06","diaI":"20","anioF":"2021","mesF":"07","diaF":"03"}
  }
  console.log();
  console.log(fechaF);
});

finSemana.addEventListener("click", () => {
  if (confirm("¿Estás seguro que quieres finalizar la semana?")) {
    //Limpiar();
    MandarAccionYObj2({ accion: "2" }).then(() => {
      MandarAccionYObj({ accion: "0" });
      //alert("Semana finalizada");

    });
  } else return false;
});

finAnio.addEventListener("click", () => {
  if (confirm("¿Estás seguro que quieres finalizar el año?")) {
    Limpiar();
    MandarAccionYObj2({ accion: "3" })
      .then(() => {
        MandarAccionYObj({ accion: "0" });
        //alert("Año finalizado finalizada");
      })
      .catch((e) => {
        console.log(e);
      });
  } else return false;
});
