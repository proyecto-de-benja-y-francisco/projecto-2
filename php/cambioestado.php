<?php
require_once('./conexion.php');
$conexion = conectar();

function cambiarestado($conexion){
    $SQL = "UPDATE tareas SET estado='2' WHERE estado='1'";
    $resultado = mysqli_query($conexion, $SQL);
    if (!$resultado) {
        echo "Error al actualizar: " . mysqli_error($conexion);
    } else {
        
    }
}

cambiarestado($conexion);


mysqli_close($conexion);
?>
