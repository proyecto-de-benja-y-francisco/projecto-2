<?php
date_default_timezone_set("America/Cordoba");
require_once('./conexion.php');
$conexion = conectar();

// Consulta para seleccionar tareas con estado 1

session_start();
$id = $_SESSION['id_usuario'];
$SQL = "SELECT * FROM tareas WHERE estado='1' AND usuario_id=$id AND importancia='alta'";
$result = mysqli_query($conexion, $SQL);
//Puse es if para verificar la conexion
if (!$result) {
    echo('Error en la consulta: ' . mysqli_error($conexion));
}

// Repite sobre los resultados
while ($row = mysqli_fetch_array($result)) {
    echo "<div class='tareas' style='color: #222b26'>
    <details>
    <summary >" . htmlspecialchars($row['tarea']) . "</summary> 
    <p>" . htmlspecialchars($row['descripcion']) . "</p>
    <p>" . htmlspecialchars($row['pcname']) . "</p>
    
    </details>
        <b>" . htmlspecialchars($row['fecha']) . "</b>
        <b>" . htmlspecialchars($row['hora']) . "</b>      
            <button class='realizado' type='submit'  onclick='cambiarestado(" . $row['id_tarea'] . ")'>Realizado</button> 
        </div>
        ";  
}
$SQL = "SELECT * FROM tareas WHERE estado='1' AND usuario_id=$id AND importancia='media'";
$result = mysqli_query($conexion, $SQL);
//Puse es if para verificar la conexion
if (!$result) {
    echo('Error en la consulta: ' . mysqli_error($conexion));
}

// Repite sobre los resultados
while ($row = mysqli_fetch_array($result)) {
    echo "<div class='tareass' style='color: #222b26'>
    <details>
    <summary >" . htmlspecialchars($row['tarea']) . "</summary> 
    <p>" . htmlspecialchars($row['descripcion']) . "</p>
    <p>" . htmlspecialchars($row['pcname']) . "</p>
    
    </details>
        <b>" . htmlspecialchars($row['fecha']) . "</b>
        <b>" . htmlspecialchars($row['hora']) . "</b>        
            <button class='realizado' type='submit'  onclick='cambiarestado(" . $row['id_tarea'] . ")'>Realizado</button> 
        </div>
        ";  
}
$SQL = "SELECT * FROM tareas WHERE estado='1' AND usuario_id=$id AND importancia='baja'";
$result = mysqli_query($conexion, $SQL);
//Puse es if para verificar la conexion
if (!$result) {
    echo('Error en la consulta: ' . mysqli_error($conexion));
}

// Repite sobre los resultados
while ($row = mysqli_fetch_array($result)) {
    echo "<div class='tareasss' style='color: #222b26'>
    <details>
    <summary >" . htmlspecialchars($row['tarea']) . "</summary> 
    <p>" . htmlspecialchars($row['descripcion']) . "</p>
    <p>" . htmlspecialchars($row['pcname']) . "</p>
    
    </details>
        <b>" . htmlspecialchars($row['fecha']) . "</b>
        <b>" . htmlspecialchars($row['hora']) . "</b>      
            <button class='realizado' type='submit'  onclick='cambiarestado(" . $row['id_tarea'] . ")'>Realizado</button> 
        </div>
        ";  
}

// Desconectar de la base de datos
desconectar($conexion);
?>

