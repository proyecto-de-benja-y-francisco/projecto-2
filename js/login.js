// Obtener elementos del DOM
const loginbtn = document.getElementById('loginbtn');
const result = document.getElementById('result');

function iniciarsesion(action) {
    // Obtener valores de los campos
    var usuario = document.getElementById('usuario').value;
    var contraseña = document.getElementById('contraseña').value;

    // Enviar solicitud AJAX
    $.ajax({
        type: "POST",
        url: "./php/login.php",
        data: {
           
            usuario: usuario,
            contraseña: contraseña,
        },
        success: function(response) {
            console.log(response);
            if(response =="1"){
                window.location.href = 'index.html';
            }else{
                result.innerText="Error de contraseña o usuario";
            }      
        },
    });
var longitudcontraseña = contraseña.length;
var longitudusuario = usuario.length;   
        if (usuario != "" && contraseña != ""   ) {
            if (longitudcontraseña > 3) {
                if (longitudusuario > 3) {
                }else{
                    result.innerText = "Ese usuario es muy corto";
                }
            }else{
                result.innerText = "Esa contraseña es muy corta";
            }
        }else{
            result.innerText = "Por favor complete todos los campos";
        }    
}
$.ajax({
    url: "./php/cerarsesion.php",
    success: function(response) {
        if(response =="1"){
            window.location.href = 'login.html';
        }else{
            console.log("Error al cerrar sesion");
        }      
    },
});



