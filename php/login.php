<?php
require_once('./conexion.php');
session_start();
$conexion = conectar();
$username = $_POST['usuario'];
$password = $_POST['contraseña'];

$hash =  hash('crc32', $password);

//seleccionamos el usuario y la contraseña para hacer la verificacion
$sql= "SELECT * FROM `usuarios` WHERE `usuario` = '".$username."' and `contraseña` = '".$hash."'";
$result=mysqli_query($conexion, $sql);
if ($row = mysqli_fetch_array($result)) {
    $_SESSION["id_usuario"]=$row["id_usuario"];
    $_SESSION["usuario"] = $username;
    echo "1";
    
}else{
    echo "error";
}
desconectar($conexion);

?>
