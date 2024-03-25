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