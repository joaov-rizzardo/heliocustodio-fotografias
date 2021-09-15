<?php
require 'Models/Foto.php';
require 'Models/Conexao.php';

$categoria = $_GET['categoria'];

$conexao = new Conexao();
$foto = new Foto($conexao);
if($categoria == 1){
    $fotos = $foto->recuperaTodasFotos();
}else {
    $foto->__set('categoria', $categoria);
    $fotos = $foto->recuperaFotosCategoria();
}

foreach ($fotos as $foto) {
?>
    <div class="card-img">
        <img class="imagens" src="img/<?= $foto->nome ?>" alt="">
    </div>

<?php } ?>




