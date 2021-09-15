<?php
    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 1){
        header('Location: login.php');
    }
?>