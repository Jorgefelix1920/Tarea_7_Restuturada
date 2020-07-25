<?php
// agregar balidacion de datos
require_once("../funciones.php");
cabeza();
    // define variables and set to empty values
    $nombreErr = $TelErr = $direccionErr = $generoErr = $emailErr = $passwordErr = $rolErr = $campoeErr = $AlereErr =  "";
    $error = "* El Campos es Requeridos";
    $nombre = $telefono = $direccion = $genero = $email = $password = $confirmPassword = $rol = "";
    
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["nombre"])) {
          $nombreErr = "* El Nombre es Requerido";
          $campoeErr = $error;
          $AlereErr = "alert-danger";
      } else {
          $nombre = test_input($_POST["nombre"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/", $nombre)) {
              $nombreErr = "Este espacio solo puede contener letras ";
          }
      }
      
  
      if (empty($_POST["telefono"])) {
          $TelErr = "* El Telefono es Requerido";
          $campoeErr = $error;
          $AlereErr = "alert-danger";
      } else {
          $telefono = test_input($_POST["telefono"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[0-9+]*$/", $telefono)) {
              $TelErr = "Este espacio solo puede contener numero";
          }
      }
  
  
      /*if (empty($_POST["website"])) {
          $website = "* Campos Requeridos";
          $campoeErr = "* Campos Requeridos";
          $AlereErr = "alert-danger";
      } else {
          $website = test_input($_POST["website"]);
          // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
          if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
              $websiteErr = "Invalid URL";
          }
      }*/
  
      if (empty($_POST["direccion"])) {
          $direccionErr = "* La Dirrecion es Requeridas";
          $campoeErr = $error;
          $AlereErr = "alert-danger";
      } else {
          $direccion = test_input($_POST["direccion"]);
      }
  
      if (!empty($_POST["mail"])) {
          $email = $_POST["mail"];
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Formato de correo invalido";
          }
                 
      } else {
           $emailErr = "* Email es Requerido";
          $campoeErr = $error;
          $AlereErr = "alert-danger";
          }
      // verifica la contraseña
      // revisar esta parte
  
      if (!empty($_POST["password"])) {
          if (!empty($_POST['confirmPassword'])) {
              if ($password != $confirmPassword) {
                  $passwordErr = "* Las Contraseñas deben ser las mismas";
              } else {
                  $password = test_input($_POST["password"]);
              }
              
          } else{
              $passwordErr = "* Segunda Contraseña es Requerida";
              $campoeErr = $error;
              $AlereErr = "alert-danger";
          }
      } else {
          $passwordErr = "* Contraseña es Requerida";
          $campoeErr = $error;
          $AlereErr = "alert-danger";
      }
  
  
  
  
      // verifica los generos
      if (empty($_POST["genero"])) {
          $generoErr = "* El Genero es Requerido";
          $campoeErr = $error;
          $AlereErr = "alert-danger";
      } else {
          $genero = test_input($_POST["genero"]);
      }
  
  
      //verifica los roles
      if (empty($_POST["rol"])) {
          $rolErr = "* El rol es Requerido";
          $campoeErr = $error;
          $AlereErr = "alert-danger";
      } else {
          $rol = test_input($_POST["rol"]);
      }
 // }
  // limpia los caracteres especiales
  function test_input($data)
  {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
  
  if (!empty($nombre)&& 
  !empty($telefono)&& 
  !empty($direccion)&& 
  !empty($genero)&& 
  !empty($email)&& 
  !empty($password)&& 
  !empty($rol))
  {
        
    echo $mensaje= "Estamos dentro";
      header('location:register_user.php');
  
      // insecta datos en usuarios
        /*
        $sql = "INSERT INTO usuarios (nombre, telefono, direccion, mail, password)
        VALUES ('$nombre', '$telefono', '$direccion', '$correo', '$password')";
        
        // insecta datos en genero 
        $sql .= "INSERT INTO genero (genero)
        VALUES ('$genero')";
  
        // insecta datos en roles 
        $sql .= "INSERT INTO roles (rol, )
        VALUES ('$rol');";
  
        if ($connection->query($sql) === TRUE) {
          $record= "New record created successfully";
  
        } else {
          echo "Error: " . $sql . "<br>" . $connection->error;
        }
          $connection->close();*/
  }else {
    echo $mensaje= "No Estamos dentro";
  }
  ?>