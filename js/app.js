$(document).ready(function() {
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

const txttarea = document.getElementById("txttarea");
const inttarea = document.getElementById("inttarea");
const pcname = document.getElementById("intpc");
const importancia= document.getElementById("importancia");



function cartel (){
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("btnguardar");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
      modal.style.display = "block";
    }
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }   
}

$('#btnguardar').click(function() {
    if (inttarea.value != ""){
        if (txttarea.value != ""){
            $.ajax({
                type: "POST",
                url: "./php/tareadoc.php",
                data: {
                    txttarea: txttarea.value,
                    inttarea: inttarea.value,
                    pcname: pcname.value,
                    importancia: importancia.value
                },
                success: function(response) {
                    alert("Se ha guardado la tarea")
                    cartel()
                    document.getElementById("txttarea").value = "";
                    document.getElementById("inttarea").value = "";
                    document.getElementById("intpc").value = "";
                },
        });
        } else{
            alert("Pon al menos una  tarea");
        }
    }else{
        alert("ponle un titulo a la tarea")
    }
})

function cancelar() {
    document.getElementById("txttarea").value = "";
    document.getElementById("inttarea").value = "";
    document.getElementById("intpc").value = "";
}

function postid(id) {
    $.ajax({
        type: "POST",
        url: "./php/mostrar.php",
        data: {
            id_usuario: id_usuario,
        },
        success: 
            console.log(id),
    });
}
postid();




