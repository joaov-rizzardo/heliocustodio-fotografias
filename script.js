$(document).ready(function () {
    //Posiciona a imagem de acordo com o tamanho do menu
    alturaMenu = $('nav').innerHeight()

    alturaImg = $('#fotos-destaque img').innerHeight()
    $('#fotos-destaque').css("padding-top", alturaMenu)
    $('#fotos-destaque img').css("height", alturaImg - alturaMenu)

})
//Abre o modal da imagem
    let imagens = document.querySelectorAll('.imagens')
    let modal = document.querySelector('.modal-galeria')
    let imagemModal = document.querySelector('#modal-imagem')
    let btClose = document.querySelector('#botao-close')
    let srcImg = ""

    for(let i = 0; i < imagens.length; i++){
        imagens[i].addEventListener('click', () => {
            srcImg = imagens[i].getAttribute('src')
            imagemModal.setAttribute('src', srcImg)
            
            modal.classList.toggle('modal-galeria-ativo')
        })
    
    }
    btClose.addEventListener('click', () => {
        modal.classList.toggle('modal-galeria-ativo')
    })
