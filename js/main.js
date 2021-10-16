'use strict'
const tamaño = window.screen.width;

window.addEventListener("scroll", function(){
    let menu = document.getElementById('cosaloca');
    let trapecio_activado = document.getElementById('trapecio');
    trapecio_activado.classList.toggle("trapecio-activado", window.scrollY > 300);
    if(tamaño > 992){
        menu.classList.toggle('fixed-top', window.scrollY > 200);
    }
    if(tamaño <= 768){
        menu.classList.toggle('fixed-top', window.scrollY > 200);
    }
});
window.addEventListener("load",function () {
    let contenedor = document.getElementById("elemento-padre");
    let hijo = document.getElementsByClassName("elemento-hijo");
    if(tamaño < 992){
        while (contenedor.firstChild) {
            contenedor.removeChild(contenedor.firstChild);
          }
    }
    if(tamaño <= 768){
        menu.classList.toggle('fixed-top');
    }
});


        

