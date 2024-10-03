const result = document.getElementById('result');
  
const usuario = document.getElementById('usuario');
const contraseña = document.getElementById('contraseña');
const contraseñacomfirmar = document.getElementById('contraseñacomfirmar');
const email = document.getElementById('email');


$('#registerbtn').click(function() {    
    if (usuario.value != "" || contraseña.value != ""  || contraseñacomfirmar.value != "" || email.value != ""  ) {
        var longitudcontraseña = contraseña.value.length;
        var longitudusuario = usuario.value.length;
        var longitudemail = email.value.length;
        if (longitudcontraseña > 3) {
            if (longitudusuario > 3) {
                if (longitudemail > 6) {
                    if (contraseña.value == contraseñacomfirmar.value){  
                        $.ajax({
                            type: "POST",
                            url: "./php/registro.php",
                            data: {
                                usuario: usuario.value,
                                contraseña: contraseña.value,
                                email: email.value,
                            },
                            success: function(response) {
                                result.innerText = response;
                                if (response=="guardado"){
                                    result.innerText =dato;
                                    window.location.href = 'login.html'; 
                            }
                            },
                        });                
                    }else {
                        result.innerText ="Las contraseñas no coinciden"
                    }
                } else {
                    result.innerText = "Gmail inválido"; 
                }
            }else{
                result.innerText = "Usuario inválido";
            }
        }else{
            result.innerText = "Esa contraseña es muy corta";
        }
    }else{
        result.innerText = "Por favor complete todos los campos";
    }
  
});
