<?php
    require '../Models/Usuario.php';
    require '../Models/Conexao.php';

    if($_POST['login'] == '' || $_POST['senha'] == ''){
        header('Location: ../login.php?erro=1');
    }else{
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);

    }

    
    
    
?>