<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['Usuario'])) {
    echo '<script>window.location.replace("login.php");</script>';

}



?>

