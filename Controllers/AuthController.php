<?php
    require '../Models/Usuario.php';
    require '../Models/Conexao.php';
    if(isset($_GET['acao']) && $_GET['acao'] == 'logar'){
        if($_POST['login'] == '' || $_POST['senha'] == ''){
            header('Location: ../login.php?erro=1');
        }else{
            $login = $_POST['login'];
            $senha = md5($_POST['senha']);
    
            $conexao = new Conexao();
            $usuario = new Usuario($conexao);
            $usuario->__set('login',$login);
            $usuario->__set('senha',$senha);
    
            $usuarios = $usuario->recuperaUsuario();
    
            if($usuarios != '' && $usuario->__get('senha') == $usuarios->senha){
                session_start();
                $_SESSION['autenticado'] = 1;
                $_SESSION['id_usuario'] = $usuarios->id;
                header('Location: ../indexAdmin.php');
            }else{
                header('Location: ../login.php?erro=1');
            }
        }
    }else if(isset($_GET['acao']) && $_GET['acao'] == 'logoff'){
        session_start();
        session_destroy();
        header('Location: ../login.php');
    }
    

    
    
    
?>