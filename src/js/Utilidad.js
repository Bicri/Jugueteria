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

BtnFechas.addEventListener("click",()=>{
    let fechaI = fechaInicio.value.split("-");
    let fechaF = fechaFin.value.split("-");
    console.log(fechaI);
    console.log(fechaF);
});

const toggleCosas= ()=>{
    botonFechasMostrar.classList.toggle("noneObj");
    dateInicio.classList.toggle("noneObj");
    dateFin.classList.toggle("noneObj");
}

BtnPeriodo.addEventListener("click",()=>{
    toggleCosas();

    tituloH.textContent="Utilidad del periodo";
    BtnPeriodo.classList.toggle("noneObj");
    BtnSemana.classList.toggle("noneObj");
    TODOS.classList.toggle("noneObj");
});


BtnSemana.addEventListener("click",()=>{
    toggleCosas();
    tituloH.textContent ="Utilidad de la semana";
    BtnSemana.classList.toggle("noneObj");
    BtnPeriodo.classList.toggle("noneObj");
});