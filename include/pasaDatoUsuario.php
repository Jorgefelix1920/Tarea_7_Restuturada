<?php
// agregar balidacion de datos
require_once("connection.php");

    $nombre = $_REQUEST['nombre'];
    $telefono = $_REQUEST['tel'];
    $direccion = $_REQUEST['dirrecion'];
    $correo = $_REQUEST['mail'];
    $password=$_SERVER['password'];


  $sql = "INSERT INTO usuarios (nombre, telefono, direccion, mail, passwoerd)
  VALUES ('$nombre', '$telefono', '$direccion', '$correo', 'password')";
  
  
  if ($connection->query($sql) === TRUE) {
    $record= "New record created successfully";

  } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
  }
  
  $connection->close();

?>