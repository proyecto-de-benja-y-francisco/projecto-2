const divtareaspendientes = document.getElementById("divtareashechas");
 
function mostrar(){
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
mostrar();