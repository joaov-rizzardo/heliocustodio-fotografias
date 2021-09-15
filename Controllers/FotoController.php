<?php
require '../Models/Foto.php';
require '../Models/Conexao.php';
function instanciaFoto()
{
    $conexao = new Conexao();
    $foto = new Foto($conexao);
    return $foto;
}

function reArrayFiles(&$file_post)
{

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

if (isset($_GET['acao']) && $_GET['acao'] == 'enviar') {

    $fotos = reArrayFiles($_FILES['foto']);

    foreach ($fotos as $fotoFile) {
        $foto = instanciaFoto();
        $foto->__set('diretorio', "../img/" . $fotoFile['name']);
        $foto->__set('nome', $fotoFile['name']);
        $foto->__set('categoria', $_POST['categoria']);
        $contador = count($foto->recuperaFoto());

        if ($contador > 0) {
            header('Location: ../indexAdmin.php?erro=1&foto='.$foto->__get('nome'));
        } else {
            $foto->adicionaFotos();

            move_uploaded_file($fotoFile['tmp_name'], $foto->__get('diretorio'));

            header('Location: ../indexAdmin.php?sucesso=1');
        }
    }
}else if (isset($_GET['acao']) && $_GET['acao'] == 'destaque'){
    $foto = instanciaFoto();
    $foto->__set('id', $_GET['id']);
    $foto->__set('destaque', $_GET['destaque']);
    $foto->destaque();
    
}else if (isset($_GET['acao']) && $_GET['acao'] == 'excluir'){
    $foto = instanciaFoto();
    $foto->__set('id', $_GET['id']);
    $foto->excluirFoto();
}
