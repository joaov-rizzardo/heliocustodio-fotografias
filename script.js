function modal(){
    let imagens = document.querySelectorAll('.imagens')
    //let modal = document.querySelector('.modal-galeria')
    let modal = $('.modal-galeria')
    let imagemModal = document.querySelector('#modal-imagem')
    //let btClose = document.querySelector('#botao-close')
    let srcImg = ""

    for (let i = 0; i < imagens.length; i++) {
        imagens[i].addEventListener('click', () => {
            srcImg = imagens[i].getAttribute('src')
            imagemModal.setAttribute('src', srcImg)
            //modal.classList.toggle('modal-galeria-ativo')
            modal.addClass('modal-galeria-ativo')
        })

    }
    /*
    btClose.addEventListener('click', () => {
        modal.classList.toggle('modal-galeria-ativo')
    })
    */

    $('#botao-close').click(()=>{
        modal.removeClass('modal-galeria-ativo')
    })
}


$(document).ready(function () {
    modal()
    //Posiciona a imagem de acordo com o tamanho do menu
    alturaMenu = $('nav').innerHeight()

    alturaImg = $('#fotos-destaque img').innerHeight()
    $('#fotos-destaque').css("padding-top", alturaMenu)
    $('#fotos-destaque img').css("height", alturaImg - alturaMenu)

    $('#galeria a').click((e) => {
        e.preventDefault()
    })


})

function recuperaFotos(categoria = 1) {
    $.ajax({
        url: 'categorias.php',
        data: `categoria=${categoria}`,
        success: dados => {
            $('#fotos').html(dados)
            modal()
        },
        error: erro => { console.log(erro) }
    })
}



//Abre o modal da imagem

