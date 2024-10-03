<?php
require_once('./conexion.php');
$conexion = conectar();
session_start();
$id = $_SESSION['id_usuario'];

// Consulta para seleccionar tareas con estado 3
$SQL = "SELECT * FROM tareas WHERE estado='3' AND usuario_id=$id";
$result = mysqli_query($conexion, $SQL);
//puse es if para verificar la conexion
if (!$result) {
    echo('Error en la consulta: ' . mysqli_error($conexion));
} else {
    while ($row = mysqli_fetch_array($result)) {

        echo "<div class='archivostareas' id='divarchivo'>
                  <details>
    <summary >" . htmlspecialchars($row['tarea']) . "</summary> 
    <p>" . htmlspecialchars($row['descripcion']) . "</p>
    <p>" . htmlspecialchars($row['pcname']) . "</p>
    </details>
                <b>" .  ($row['fechaarchivada']) . "</b>
                <b>" . ($row['horaarchivada']) . "</b>
            </div>";
    }
}
desconectar($conexion);