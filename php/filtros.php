<?php
require_once('./conexion.php');
$conexion = conectar();
session_start();
$orden = $_POST["orden"] ?? '';
$busqueda = $_POST["busqueda"] ?? '';

// Construcción de la cláusula ORDER BY según el parámetro 'orden'
switch ($orden) {
    case 'nombre_asc':
        $orderBy = "tarea ASC";
        break;
    case 'nombre_desc':
        $orderBy = "tarea DESC";
        break;
    case 'fecha_reciente':
        $orderBy = "fecha DESC";
        break;
    case 'fecha_antigua':
        $orderBy = "fecha ASC";
        break;
    case 'importancia_alta':
        $orderBy = "importancia DESC";
        break;
    case 'importancia_baja':
        $orderBy = "importancia ASC";
        break;
    default:
        $orderBy = "fecha DESC"; // Valor por defecto
        break;
}
$id = $_SESSION['id_usuario'];
$SQL = "SELECT * FROM tareas WHERE estado='3' AND usuario_id=$id AND tarea LIKE '%$busqueda%' ORDER BY $orderBy";


$result = mysqli_query($conexion, $SQL);

if (!$result) {
    echo('Error en la consulta: ' . mysqli_error($conexion));
} else {
    while ($row = mysqli_fetch_assoc($result)) {
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