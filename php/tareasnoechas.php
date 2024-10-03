<?php 
// Consulta SQL para seleccionar las tareas con estado igual a 1
$sql = "SELECT descripcion FROM tareas WHERE estado =1 ";

require_once('./conexion.php');

// Conectar a la base de datos
$conexion = conectar();

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si la consulta fue exitosa
if (!$resultado) {
    echo "Error en la consulta: " . mysqli_error($conexion);
} else {
    // Mientras existan tareas y haya una conexión, muestra la tarea
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "Tarea: " . $fila['descripcion'] . "<br>";
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>

