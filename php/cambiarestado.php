<?php
date_default_timezone_set("America/Cordoba");
require_once('./conexion.php');

// Conectar a la base de datos
$conexion = conectar();

$fechas = date('y/m/d');
$horas = date('H:i:s');

// Verifica si se recibió un ID
if (isset($_POST['id'])) {
    $id = (int)$_POST['id']; // Asegúrate de que el ID sea un número entero


    $sql = "UPDATE `tareas` SET `fecharealiz`='$fechas',`horarealiz`='$horas' WHERE id_tarea = $id";
    if (mysqli_query($conexion, $sql)) {
        // Si la inserción fue exitosa, actualiza el estado de la tarea
        $SQL = "UPDATE tareas SET estado = '2' WHERE id_tarea = $id";
        
        if (mysqli_query($conexion, $SQL)) {
            // Si la actualización fue exitosa, devolver una respuesta
            echo "si";
        } else {
            echo "Error al actualizar el estado: " . mysqli_error($conexion);
        }
    } else {
        echo "Error al insertar la tarea: " . mysqli_error($conexion);
    }
}

// Desconectar de la base de datos
desconectar($conexion);
?>
