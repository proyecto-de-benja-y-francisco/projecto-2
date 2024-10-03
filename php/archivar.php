<?php
date_default_timezone_set("America/Cordoba");
require_once('./conexion.php');

// Conectar a la base de datos
$conexion = conectar();
$fechass = date('y/m/d');
$horass = date('H:i:s');
// Verifica si se recibió un ID
if (isset($_POST['id'])) {
    $id = (int)$_POST['id']; // Asegúra de que el ID sea un número entero

    // Consulta para actualizar el estado de la tarea
    
    $sql = "UPDATE `tareas` SET `fechaarchivada`='$fechass',`horaarchivada`='$horass' WHERE id_tarea = $id";
    if (mysqli_query($conexion, $sql)) {
        // Si la actualización fue exitosa, devolver una respuesta 
        $SQL = "UPDATE tareas SET estado = '3' WHERE id_tarea = $id";
        if (mysqli_query($conexion, $SQL))
        {
            // Si la actualización fue exitosa, devolver una respuesta
            echo "a";
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
