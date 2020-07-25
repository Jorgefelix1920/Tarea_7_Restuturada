<?php 

function cabeza(){
    echo $header = file_get_contents("../pages/header.php");
}

function cola(){
    echo $footer = file_get_contents("pages/footer.php");
}
?>

