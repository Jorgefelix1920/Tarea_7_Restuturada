<!DOCTYPE html>
<? 
/** Nombre:     Jorge Felix Gonzalez 
 *  Fecha:      23/07/2020
 *  Funcion:    Corrección de tarea 7 de luego de verificar que la misma no cumplía con lo solicitado por el maestro 
*/
?>
<html lang="en">
<?php
// llama el header
include 'pages/header.php'; ?>

<body class="text-center">
    <form class="form-signin">
        <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Inicia Sesión</h1>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me">Recordar Usuario 
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>






    <?php
    // llama el footer
    include('pages/footer.php'); ?>
</body>

</html>