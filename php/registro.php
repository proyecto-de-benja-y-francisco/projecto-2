<?php
require_once('./conexion.php');
$conexion = conectar();

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$email = $_POST['email'];

conectar($conexion);
//hacemos la consulta pidiendo la información del usuario con el nombre de usuario o con el email
$selectemail= "SELECT * FROM usuarios WHERE email='$email' or usuario='$usuario'";
$result_email=mysqli_query($conexion, $selectemail);
if ($result_email = mysqli_fetch_array($result_email)) {
    echo "El mail o usuario ya esta registrado";
}else{
    //usamos el hash para cifrar la contraseña
    $hash =  hash('crc32', $contraseña);
    //insertamos los datos en las columnas correspondientes de la base de datos
    $sql = "INSERT INTO usuarios (usuario, contraseña, email) VALUES ('$usuario','$hash','$email')";
    
    if($result = mysqli_query($conexion, $sql)){
        echo "guardado";
    }else{
        echo "error bd";
    }

}




desconectar ($conexion)



?>
