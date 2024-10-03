<?php
session_start();
date_default_timezone_set("America/Cordoba");

$txttarea = $_POST["txttarea"];
$pcname = $_POST["pcname"];
$inttarea = $_POST["inttarea"];
$importancia= $_POST["importancia"];

$usuario_id = $_SESSION['id_usuario'];

require_once('./conexion.php');
$conexion = conectar();

// Obtener fecha y hora
$fecha = date('y/m/d');
$hora = date('H:i:s');

// Definir la consulta SQL
$SQL = "INSERT INTO tareas (descripcion, estado, fecha, hora, tarea, pcname, importancia, usuario_id) VALUES ('$txttarea', '1', '$fecha', '$hora', '$inttarea', '$pcname', '$importancia', '$usuario_id')";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $SQL);

// Verificar si la consulta fue exitosa
if (!$resultado) {
    echo "Error al insertar: " . mysqli_error($conexion);
} else {
    echo "Tarea guardada correctamente.";
}

// Cerrar la conexión
desconectar($conexion);
?>


