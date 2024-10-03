<?php
require_once('./conexion.php');
$conexion = conectar();
session_start();
$id = $_SESSION['id_usuario'];
$busqueda = $_POST["busqueda"];

$SQL = "SELECT * FROM tareas WHERE estado='3' AND usuario_id=$id AND tarea LIKE '%$busqueda%'";
$result = mysqli_query($conexion, $SQL);

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
?>

