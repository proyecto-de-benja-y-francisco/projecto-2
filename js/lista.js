
// Obtiene el elemento div para tareas pendientes
const divtareaspendientes = document.getElementById("divtareaspendientes");
const divtareashechas = document.getElementById("divtareashechas");
const divarchivo = document.getElementById("divarchivo");

// Función para mostrar tareas pendientes
function mostrar() {
    $.ajax({
        type: "POST",
        url: "./php/mostrar.php",
        data: {
            realizado: 'asd',
        },
        success: function(dato) {
            divtareaspendientes.innerHTML = dato;
        }
    });
}
function echas() {
    $.ajax({
        type: "POST",
        url: "./php/tareasechas.php",
        data: {
            realizado: 'asd',
        },
        success: function(dato) {
            divtareashechas.innerHTML = dato;
        }
    });
}
function archivo() {
    $.ajax({
        type: "POST",
        url: "./php/archivado.php",
        data: {
            realizado: 'asd',
        },
        success: function(dato) {
            divarchivo.innerHTML = dato;
        }
    });
}



$(document).ready(function() {
    mostrar();
    echas();
    archivo();
    $.ajax({
        type: "POST",
        url: "./php/comprobacion.php",
        data: {
            realizado: 'asd',
        },
        success: function(dato) {
            if(dato == "afuera"){
                window.location.href = 'login.html';
            }
        }
    });
});
// Llama a la función 

//archivar();
// Función para cambiar el estado de una tarea a 2
function cambiarestado(id) {
    $.ajax({
        type: "POST",
        url: "./php/cambiarestado.php",
        data: {
            id: id,
        },
        success: function(response) {
            if(response =="si"){
                mostrar();
                echas();
            }else{
                console.log(response);
            }
            
        }
    });
}
function archivar(id) {
    $.ajax({
        type: "POST",
        url: "./php/archivar.php",
        data: {
            id: id,
        },
        success: function(response) {
            if(response =="a"){
                echas();
                archivo()
            }else{
                console.log(response);
            }
            
        }
    });
}
