


$(function(){
    //@prepros-prepend template/top_menu.js
    
    $('.searchBtn').on('click', function(){
        search($('.searchBar input').val())
    })
    search($('.searchBar input').val())
    function search(e) {
        let searched = $('.searchBar input').val().trim();
        if (searched !== "") {
            $('.searchItems > li').each(function(){
                let text = $(this).find('.text').html()
                let re = new RegExp(searched,"g")
                let newText = text.replace(re, `<mark class="mark">${searched}</mark>`)
                $(this).find('.text').html(newText)
            })
        }
    }
});