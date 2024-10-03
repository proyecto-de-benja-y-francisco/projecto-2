<?php
session_start();
if (!isset($_SESSION['id_usuario'])){
    //header("Location: ../login.html");
    echo "afuera";
}else{
    echo "adentro";
}
?>