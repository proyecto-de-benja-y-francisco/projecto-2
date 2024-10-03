<?php

    /**
     * Crea la conexión a la base de datos de la oficina virtual
     * 
     * @access public
     * @return $conexion Conexion a la base de datos
     */
    function conectar(){
        //Abre una conexión al Servidor de MySQL que está en ejecución.
        $conexion=mysqli_connect('localhost', 'root', '', 'tareas');
        return $conexion;
    }
    
    /**
     * Cierra la conexión a la base de datos
     * 
     * @access public
     * @param object $conexion Conexion a la base de datos
     * @return void
     */
    function desconectar($conexion){
        mysqli_close($conexion); //Cierra una conexión previamente abierta a la base de datos
    }
    /*
     if(conectar()){
        echo "la conexion se ha realizado <br><br>";
    }else{
        echo "error de conexion a la base de datos";
    } */ 
    
?>
