<?php 
require 'Models/Foto.php';
require 'Models/Conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hélio Custódio - Fotografias</title>

    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
</head>

<body>
    <div class="modal-galeria">
        <span id="botao-close">&times;</span>
        <div class="conteudo-modal">
            <img id="modal-imagem" src="" alt="">
        </div>
    </div>

    <header>
        <nav class="navbar navbar-expand-lg " id="navegacao">
            <div class="container">
                <a id="nome-nav" class="navbar-brand" href="#inicio"><img width="200px" src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-target1">
                    <i class="fas fa-bars text-black"></i>
                </button>
                <div class="collapse navbar-collapse" id="nav-target1">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="#sobreMim">Galeria</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#projetos">Sobre o fotógrafo</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#contato">Contato</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#contato"><i style="font-size: 25px;" class="fab fa-instagram"></i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#contato"><i style="font-size: 25px;" class="fab fa-facebook"></i></a>
                        </li>

                         <li class="nav-item">
                            <a class="nav-link" href="#contato"><i style="font-size: 25px;" class="fab fa-whatsapp"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <section id="fotos-destaque">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $conexao = new Conexao();
                    $foto = new Foto($conexao);
                    $fotos = $foto->recuperaDestaques();
                ?>
                <div class="carousel-item active">
                    <img class="imagens" src="img/<?=$fotos[0]->nome?>">
                </div>

                <?php
                    $i = 0;
                    foreach($fotos as $foto){
                        if($i == 0){
                            $i++;
                            continue;
                        }
                ?>

                <div class="carousel-item">
                    <img class="imagens" src="img/<?=$foto->nome?>">
                </div>
                <?php } ?>

                
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section id="galeria">
        <div class="d-flex justify-content-center mt-3">
            <ul>
                <li><a onclick="recuperaFotos()" href="#">TUDO</a></li>
                <li>|</li>
                <li><a onclick="recuperaFotos('casamento')" href="#">CASAMENTO</a></li>
                <li>|</li>
                <li><a onclick="recuperaFotos('ensaios')" href="#">ENSAIOS</a></li>
                <li>|</li>
                <li><a onclick="recuperaFotos('gastronomicas')" href="#">GASTRÔNOMICAS</a></li>
                <li>|</li>
                <li><a onclick="recuperaFotos('paisagens')" href="#">PAISAGENS</a></li>
            </ul>
        </div>
        
        <div id="fotos" class="d-flex justify-content-around flex-wrap mt-3 imagem-galeria">
            <?php
                $conexao = new Conexao();
                $foto = new Foto($conexao);
                $fotos = $foto->recuperaTodasFotos();

                foreach($fotos as $foto){
            ?>
            <div class="card-img">
                <img class="imagens" src="img/<?=$foto->nome?>" alt="">
            </div>
            <?php } ?>

        </div>
        
    </section>
</body>

</html>