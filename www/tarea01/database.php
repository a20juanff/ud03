<?php
    //1. Creamos la conexion
    @$conexion = new mysqli('db', 'root', 'test');

    //2. Comprobamos la conexión
    $error = $conexion->connect_errno;
    if($error !=null){
        die("Fallo en la conexión ".$conexion->connect_error."Con número ".$error);
    }
    echo "Conexión correcta";

    //3. Creamos la base de datos
    $sql_db = "CREATE DATABASE IF NOT EXISTS tienda";
    if($conexion->query($sql_db)){
        echo "Base de datos creada correctamente";
    }else{
        echo "Error creando la base de datos".$conexion->error;
    }

    //4. Seleccionamos la DB
    $conexion->select_db('tienda');

    //5. Creamos la tabla usuarios
    $sql_table = "CREATE TABLE IF NOT EXISTS usuarios(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        apellido VARCHAR(100) NOT NULL,
        edad INT NOT NULL,
        provincia VARCHAR(50) NOT NULL
        )";

    if($conexion->query($sql_table)){
        echo "Table creada correctamente";
    }else{
        echo "Error creando la tabla".$conexion->error;
    }
?>