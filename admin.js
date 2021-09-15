
$(document).ready(() => {
    let alturaMenu = $('header').innerHeight()
    $('#conteudo').css('top', alturaMenu)
    $('#menu-side').css('top', alturaMenu)
    $(window).resize(()=>{
        setTimeout(()=>{
            let larguraMenu = $('#menu-side').innerWidth()
            let largura = $('body').innerWidth()
            $('#conteudo').css('left', larguraMenu)
            $('#conteudo').css('width',largura-larguraMenu)
        },100)
        
    })
   
    $('#hamburguer').click(() => {
        $('#menu-side').toggleClass('menu-side')
        $('#menu-side').toggleClass('menu-side-ativo')
        setTimeout(() => {
            let larguraMenu = $('#menu-side').innerWidth()
            let largura = $('body').innerWidth()
            $('#conteudo').css('left', larguraMenu)
            $('#conteudo').css('width',largura-larguraMenu)
        },120)
        
    })

    $('#fotosAdmin a').click((e)=>{
        e.preventDefault();
    })

    $('#fotosAdmin').click(() => {
        
        $.ajax({
            url: 'fotosAdmin.php',
            success: dados => {
                $('#conteudo').html(dados)
            },
            error: erro => {console.log(erro)}
        }) 
    })


 
})

function adicionarDestaque(id){
    $.ajax({
        url: `Controllers/FotoController.php?acao=destaque&id=${id}&destaque=1`,
        success: () =>{
            let botao = document.getElementById('destaque'+id)
            botao.innerHTML = 'Remover dos destaques <i class="fas fa-times"></i>'
            botao.setAttribute('onclick', `removerDestaque(${id})`)
        }
        
    })
}

function removerDestaque(id){
    
    $.ajax({
        url: `Controllers/FotoController.php?acao=destaque&id=${id}&destaque=0`,
        success: () =>{
            let botao = document.getElementById('destaque'+id)
            botao.innerHTML = 'Adicionar aos destaques <i class="fas fa-plus"></i>'
            botao.setAttribute('onclick', `adicionarDestaque(${id})`)
        }
        
    })   
}

function excluirFoto(id){
    $.ajax({
        url: `Controllers/FotoController.php?acao=excluir&id=${id}`,
        success: () =>{
            let elemento = document.getElementById('foto'+id)
            elemento.remove()
            
        }
        
    }) 
}