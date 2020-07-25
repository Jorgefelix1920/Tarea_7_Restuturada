<!DOCTYPE html>
<html lang="en">
<?php
/** Nombre:     Jorge Felix Gonzalez 
 *  Fecha:      23/07/2020
 *  Funcion:    Corrección de tarea 7 de luego de verificar que la misma no cumplía con lo solicitado por el maestro 
 */
include("../pages/header.php");
require_once('connection.php');
?>

<?php
// define variables and set to empty values
$nombreErr = $TelErr = $direccionErr = $generoErr = $emailErr = $passwordErr = $rolErr = $campoeErr = $AlereErr =  "";
$error = "* El Campos es Requeridos";
$nombre = $telefono = $direccion = $genero = $email = $password = $confirmPassword = $rol = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
}
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
      

      $sql = "INSERT INTO usuarios (nombre, telefono, direccion, mail, password)
      VALUES ('$nombre', '$telefono', '$direccion', '$email', '$password')";
      
      // insecta datos en genero 
      $sql = "INSERT INTO generos (generos)
      VALUES ('$genero')";

      // insecta datos en roles 
      $sql= "INSERT INTO roles (rol)
      VALUES ('$rol')";

      if ($connection->query($sql) === TRUE) {
       

      } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
      }
        $connection->close();

        $AlereErr = "alert-warning";
        $campoeErr ="El Usuario se creo Correctamete";

    // insecta datos en usuarios
        
}
?>

<div class="container">
    <h2>Registro de Usuario</h2>


    <!-- Alerta-->
    <div class="alert <?php echo $AlereErr; ?>">
        <strong><?php echo $campoeErr; ?> </strong>
    </div>

    <!-- Form de registro-->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for=""> Nombre:</label>
        <br>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>" placeholder="Introduzca su Nombre">
        <span class="error"><?php echo $nombreErr; ?></span>


        <br>
        <label for=""> Telefono:</label>
        <br>
        <input type="text" name="telefono" value="<?php echo $telefono; ?>" placeholder="Introduzca su Telefono">
        <span class="error"><?php echo $TelErr; ?></span>

        <br>
        <label for="">E-mail:</label>
        <br>
        <input type="text" name="mail" value="<?php echo $email;?>" placeholder="Introduzca el Correo">
        <span class="error"><?php echo $emailErr; ?></span>
        <br>
        <label for="">Contraseña:</label>
        <br>
        <input type="password" name="password" placeholder="Introduzca la contraseña">
        <br>
        <input type="password" name="confirmPassword" placeholder="Repita la contraseña">
        <span class="error"><?php echo $passwordErr; ?></span>
        <br>
        <label for="">Dirección</label>
        <br>        
        <textarea placeholder= "Introduzca su Dirección" name="direccion" rows="5" cols="40"><?php echo $direccion;?></textarea>
        <br>
        <label for=""> <?php echo $direccionErr;?> </label>
        <br>
        <label for="">Genero:</label>
        <br>
        <input type="radio" name="genero" <?php if (isset($genero) && $genero == "mujer") echo "checked"; ?> value="mujer"> Mujer
        <input type="radio" name="genero" <?php if (isset($genero) && $genero == "hombre") echo "checked"; ?> value="hombre"> Hombre
        <input type="radio" name="genero" <?php if (isset($genero) && $genero == "otro") echo "checked"; ?> value="otro"> Otros
        <span class="error"><?php echo $generoErr; ?></span>
        <br><br>


        <label for="">Rol de Usuario:</label>
        <br>
        <input type="radio" name="rol" <?php if (isset($rol) && $rol == "admin") echo "checked"; ?> value="1"> Administrador
        <input type="radio" name="rol" <?php if (isset($rol) && $rol == "cliente") echo "checked"; ?> value="2"> Cliente
        <input type="radio" name="rol" <?php if (isset($rol) && $rol == "colaborador") echo "checked"; ?> value="3"> Colaborador
        <span class="error"><?php echo $rolErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    echo "<h2>Your Input:</h2>";
    echo $nombre;
    echo "<br>";
    echo $telefono;
    echo "<br>";
    echo $direccion;
    echo "<br>";
    echo $genero;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $password;
    echo "<br>";
    echo $rol;
    echo "<br>".$AlereErr.$error;
    ?>
</div>
<?php include("../pages/footer.php"); ?>