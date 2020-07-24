<?php 
// Conexion con la base de datos. nombre crud_tarea7_restructurada

$connection = mysqli_connect(
                            $servername ='localhost',    
                            $user = 'root', 
                            $password = '',
                            $database = 'crud_tarea7_restructurada'
) or die ("Problema con la conexión de la base de Datos ". mysqli_error($connection));

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }else
  echo "Connected successfully";
  ?>


