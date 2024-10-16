<?php
    $servidor = "db";
    $usuario = "root";
    $contrasena = "root";
    $base_datos = "mydatabase";
    
    $conn = new mysqli($servidor, $usuario, $contrasena, $base_datos );
    
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
?>