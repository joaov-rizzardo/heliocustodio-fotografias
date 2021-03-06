<?php
require 'Models/Foto.php';
require 'Models/Conexao.php';
require 'Controllers/ValidaAuth.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hélio Custódio - Fotografias</title>

    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="admin.js" defer></script>
</head>

<body>
    <header>
        <nav>
            <i id="hamburguer" class="fas fa-bars"></i>
            <a style="float: right;" href="Controllers/AuthController.php?acao=logoff">Sair <i class="fas fa-sign-out-alt"></i></a>
            <div style="clear: both;"></div>
        </nav>
    </header>
    <nav id="menu-side" class="menu-side">
        <div id="menu-logo">
            <img src="img/logo.png" width="85%" alt="">
        </div>

        <div class="item-menu" id="fotosAdmin">
            <a href="#">Gerenciar fotos</a>
        </div>

        <div class="item-menu">
            <a href="">Adicionar novas fotos</a>
        </div>


    </nav>

    <section id="conteudo">
        <div class="ml-5 mt-3">
            <div>
                <h4>Adicionar novas fotos</h4>
                <form action="Controllers/FotoController.php?acao=enviar" method="post" enctype="multipart/form-data">
                    <select class="btn btn-light" name="categoria" id="">
                        <option value="">-- Selecione a categoria --</option>
                        <option value="casamento">Casamento</option>
                        <option value="ensaios">Ensaios</option>
                        <option value="gastronomicas">Gastrônomicas</option>
                        <option value="paisagens">Paisagens</option>
                    </select>
                    <input multiple="multiple" accept=".png, .jpg" name="foto[]" id="foto" type="file">
                    <label class="btn btn-primary" for="foto"><i class="fas fa-plus"></i></label>
                    <button type="submit" id="enviar" class="btn btn-secondary">Enviar</button>
                </form>
                <?php if (isset($_GET['erro']) && $_GET['erro'] == 1) { ?>
                    <div class="text-danger">
                        Uma foto com esse mesmo nome já existe (<?= $_GET['foto'] ?>)
                    </div>
                <?php } ?>
                <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) { ?>
                    <div class="text-success">
                        Fotos adicionadas com sucesso
                    </div>
                <?php } ?>
            </div>
        </div>
        <div id="fotos">
            <?php
            $conexao = new Conexao();
            $foto = new Foto($conexao);
            $fotos = $foto->recuperaTodasFotos();

            foreach ($fotos as $foto) {
            ?>
                <div id="foto<?=$foto->id?>" class="card-fotos">
                    <img src="img/<?= $foto->nome ?>" alt="">
    
                    <?php if ($foto->destaque == 0) { ?>
                            <button id="destaque<?=$foto->id?>" onclick="adicionarDestaque(<?= $foto->id ?>)" class="btn btn-primary">Adicionar aos destaques <i class="fas fa-plus"></i></button>
                        <?php } else if ($foto->destaque == 1) { ?>
                            <button id="destaque<?=$foto->id?>" onclick="removerDestaque(<?= $foto->id ?>)" class="btn btn-primary">Remover dos destaques <i class="fas fa-times"></i></button>
                        <?php } ?>
                    
        
                    <button onclick="excluirFoto(<?=$foto->id?>)" class="btn btn-danger">Excluir foto <i class="fas fa-trash"></i></button>
                </div>

            <?php } ?>


        </div>

    </section>
</body>

</html>