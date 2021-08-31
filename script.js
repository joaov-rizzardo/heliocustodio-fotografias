$(document).ready(function () {
    alturaMenu = $('nav').innerHeight()

    alturaImg = $('#fotos-destaque img').innerHeight()
    $('#fotos-destaque').css("padding-top", alturaMenu)
    $('#fotos-destaque img').css("height", alturaImg - alturaMenu)

})
