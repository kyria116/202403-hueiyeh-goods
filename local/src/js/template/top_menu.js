window.setTimeout(function () {
    slider_ul_list("top-menu-ul");
}, 1);

var $window = $(window);
var win_W = $window.width();

function slider_ul_list(id) {
    let obj = $('#' + id);
    let menu_box = obj.find('.item_menu_Box').width();
    let total_width = obj.find('ul').width();
    let menu_li = obj.find('li');
    let active = obj.find('.active').index();
    let move = (winW - menu_box) / 2;
    let active_offset = obj.find('li.active').offset().left;

    let sum = 0, i = 0, sclEnd;
    let pos = new Array();
    let sumArray = new Array();
    menu_li.each(function () {
        //pos[i]計算每一個li到window的左邊距離
        pos[i] = $(this).offset().left;
        //sum是每個li在ul的起始位置
        sum = pos[i] - move;
        // total_width是全部li加起來的長度，menu_box是顯示出來的那段的長度，所以兩個相加為尚未顯示li的長度
        if (sum < total_width - menu_box) sclEnd = i;
        sumArray[i] = sum;
        i++;
    });
    //判斷是否有箭頭 
    $window.on('resize', function () {
        win_W = $window.width();
        total_width = obj.find('ul').width();
        menu_box = obj.find('.item_menu_Box').width();
        if (total_width > menu_box) {
            obj.addClass('open_flexslider');
            obj.find('.item_menu_Box').scrollLeft(sumArray[active] );
        } else {
            obj.removeClass('open_flexslider');
        }
    }).resize();
    $('#' + id + ' .rbtn').on('click', function () {
        if (sumArray[active]  < total_width - menu_box) {
            active++;
            obj.find('.item_menu_Box').stop().animate({ scrollLeft: sumArray[active]  }, 600)
        }
    })
    $('#' + id + ' .lbtn').on('click', function () {
        if (sumArray[active]  > 0) {
            active--;
            obj.find('.item_menu_Box').stop().animate({ scrollLeft: sumArray[active]  }, 600)
        }
    })
    //判斷是否第一個或是最後一個            
    $('#' + id + ' .item_menu_Box').on('scroll', function () {
        let newscroll = obj.find('.item_menu_Box').scrollLeft();
        if (newscroll <= 0) {
            obj.addClass('mleft');
            obj.find('.lbtn').addClass('nopage');
            obj.find('.rbtn').removeClass('nopage');
        } else if (newscroll >= sumArray[sclEnd]) {
            obj.addClass('mright');
            obj.find('.rbtn').addClass('nopage');
            obj.find('.lbtn').removeClass('nopage');
        } else {
            obj.removeClass('mleft mright');
            obj.find('.arrow').removeClass('nopage');
        }
    }).scroll();
}