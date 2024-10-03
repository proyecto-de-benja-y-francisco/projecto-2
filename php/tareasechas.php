<?php
date_default_timezone_set("America/Cordoba");
require_once('./conexion.php');
$conexion = conectar();
session_start();
$id = $_SESSION['id_usuario'];
// Verifica si la conexión se realizó correctamente
if (!$conexion) {
    die('Error en la conexión: ' . mysqli_connect_error());
}

// Consulta para seleccionar tareas con estado 2
$SQL = "SELECT * FROM tareas WHERE estado='2' AND usuario_id=$id";
$result = mysqli_query($conexion, $SQL);

// Verifica si la consulta se realizó correctamente
if (!$result) {
    echo('Error en la consulta: ' . mysqli_error($conexion));
} else {
    // Repite sobre los resultados
    while ($row = mysqli_fetch_array($result)) {

        echo "<div class='tareashechass' style='color: #222b26'>
                  <details>
    <summary >" . htmlspecialchars($row['tarea']) . "</summary> 
    <p>" . htmlspecialchars($row['descripcion']) . "</p>
    <p>" . htmlspecialchars($row['pcname']) . "</p>
    </details>
                <b>" .  ($row['fecharealiz']) . "</b>
                <b>" . ($row['horarealiz']) . "</b>
                <button class='realizado' type='submit' onclick='archivar(" . (int)$row['id_tarea'] . ")'>Archivar</button>
            </div>";
    }
}

// Cierra la conexión
desconectar($conexion);
?>
