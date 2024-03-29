$('#modalBg').css('display', 'block');
$('body').addClass('modal-open')
$('html').addClass('popup-open')

$('#close').on('click', function () {
    $('html').removeClass('popup-open')
    $('#modalBg').css('display', 'none')
    $('body').removeClass('modal-open')
})
const outer = document.getElementById('modalBg')
const inner = document.getElementById('myModal')
outer.addEventListener("click", function (e) {
    $('html').removeClass('popup-open')
    $('#modalBg').css('display', 'none')
    $('body').removeClass('modal-open')

    player.stopVideo();
    e.stopPropagation();
}, false);
inner.addEventListener('click', function (e) {
    e.stopPropagation();
}, false);