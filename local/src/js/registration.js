        //區域選擇
        new TwCitySelector({
            el: '.city-selector',
            elCounty: '.county',
            elDistrict: '.district2',
            standardWords: true,
        });

        //select 顏色改變
        $("select").change(function() {
            $(this).css("color", "black");
        });
        //日期 顏色改變
        $("input[type='date']").change(function() {
            $(this).css("color", "black");
        });

        //刪除購物車商品
        var delCartElements = document.getElementsByClassName('del_cart');

        for (var i = 0; i < delCartElements.length; i++) {
            delCartElements[i].addEventListener('click', function() {
                var formBlock = this.closest('.form_block');
                if (formBlock) {
                    formBlock.remove();
                }
            });
        }
        
        //刪除加購商品
        var delGiveawayElements = document.getElementsByClassName('del_giveaway');

        for (var i = 0; i < delGiveawayElements.length; i++) {
            delGiveawayElements[i].addEventListener('click', function() {
                var formItem = this.closest('.form_item');
                if (formItem) {
                    formItem.remove();
                }
            });
        }

        //分期期數顯示
        $('input').on('change', function() {
            if ($('.ckbutton input:checked').attr('id') != 'card') {
                $('#installment').hide();
            } else {
                $('#installment').css('display', 'flex');
            }
        });
       