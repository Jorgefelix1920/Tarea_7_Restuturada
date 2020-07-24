<!DOCTYPE html>
<html lang="en">
<?php
/** Nombre:     Jorge Felix Gonzalez 
 *  Fecha:      23/07/2020
 *  Funcion:    Corrección de tarea 7 de luego de verificar que la misma no cumplía con lo solicitado por el maestro 
 */
include("../pages/header.php");
//require_once('connection.php');
?>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $campoeErr = $AlereErr = $password ="";
$name = $email = $gender = $direccion = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "* Name is required";
        $campoeErr = "* Campos Requeridos";
        $AlereErr = "alert-danger";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "* Email is required";
        $campoeErr = "* Campos Requeridos";
        $AlereErr = "alert-danger";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["website"])) {
        $website = "* Campos Requeridos";
        $campoeErr = "* Campos Requeridos";
        $AlereErr = "alert-danger";
    } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "Invalid URL";
        }
    }

    if (empty($_POST["comment"])) {
        $direccion = "* Campos Requeridos";
        $campoeErr = "* Campos Requeridos";
        $AlereErr = "alert-danger";
    } else {
        $direccion = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "* Gender is required";
        $campoeErr = "* Campos Requeridos";
        $AlereErr = "alert-danger";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
        <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Introduzca su Nombre">
        <span class="error"><?php echo $nameErr; ?></span>

        <label for="">E-mail:</label>
        <input type="text" name="mail" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>

        <label for="">Contraseña:</label>
        <input type="text" name="password" value="<?php echo $password;?>" placeholder="Introduzca la contraseña">
        <span class="error"><?php echo $password; ?></span>

        <br><br>

        Website: <input type="text" name="website" value="<?php echo $website; ?>">
        <span class="error"><?php echo $websiteErr; ?></span>
        <br><br>
        
        <label for="">Dirección</label>
        <textarea placeholder="Introduzca su Dirección" name="comment" rows="5" cols="40"><?php echo $direccion; ?></textarea>
        
        <label for="">Genero:</label>  
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Mujer") echo "checked"; ?> value="mujer">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Hombre") echo "checked"; ?> value="hombre">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Otro") echo "checked"; ?> value="otro">Other
        <span class="error"><?php echo $genderErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $direccion;
    echo "<br>";
    echo $gender;
    ?>
</div>
<?php include("../pages/footer.php"); ?>