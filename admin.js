$(document).ready(() => {
    let alturaMenu = $('header').innerHeight()
    $('#conteudo').css('top', alturaMenu)
    $('#menu-side').css('top', alturaMenu)
    $(window).resize(()=>{
        setTimeout(()=>{
            let larguraMenu = $('#menu-side').innerWidth()
        $('#conteudo').css('left', larguraMenu)
        },100)
        
        console.log('resize')
    })
   
    $('#hamburguer').click(() => {
        $('#menu-side').toggleClass('menu-side')
        $('#menu-side').toggleClass('menu-side-ativo')
        setTimeout(() => {
            let larguraMenu = $('#menu-side').innerWidth()
            $('#conteudo').css('left', larguraMenu)
        },120)
        
    })

    $('#clique').click(() => {
        $.ajax({
            url: 'teste.php',
            success: dados => {
                $('#ajax').html(dados)
            },
            error: erro => {console.log(erro)}
        })
        
        
    })
    
})
