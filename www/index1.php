<?php

/** MYSQL Orientado a Objetos */

//1. Crear la conexion
@$conexion = new mysqli('db', 'root', 'test', 'myDB');

//2. Comprobar conexión
$error = $conexion->connect_errno;
if($error !=null){
    die("Fallo en la conexión ".$conexion->connect_error."Con número ".$error);
}
echo "Conexión correcta";

//3. Crear base de datos
$sql = "CREATE DATABASE myDB";
if($conexion->query($sql)){
    echo "Base de datos creada correctamente";
}else{
    echo "Error creando la base de datos".$conexion->error;
}

$conexion->select_db('myDB');
echo "Cambio de base de datos";

//4. Crear una tabla
$sql = "CREATE TABLE clientes(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(50)
    )";

if($conexion->query($sql)){
    echo "Table creada correctamente";
}else{
    echo "Error creando la tabla".$conexion->error;
}

//5. Insertar datos
$sql= "INSERT INTO clientes (nombre, apellido, email) VALUES ('Juan', 'Framil', 'a20juanff@iessanclemente.net')";

if($conexion->query($sql)){
    echo "Se ha creado un nuevo registro";
}else{
    echo "No se pudo crear el registro".$conexion->error;
}

//6. Cierre de la conexión
$conexion->close();


