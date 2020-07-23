<?php 
// Conexion con la base de datos. nombre crud_tarea7_restructurada

$connection = mysqli_connect(
                            $locate ='localhost',    
                            $user = 'root', 
                            $password = '',
                            $database = 'crud_tarea7_restructurad'
) or die ("Problema con la conexión de la base de Datos ". mysqli_error($connection));
