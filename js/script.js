const menuOpciones = document.querySelector(".navegacion");
const btnMenu = document.getElementById("btn-menu");
btnMenu.addEventListener(
    "click",()=>{
       menuOpciones.classList.toggle("mostrar");
    });