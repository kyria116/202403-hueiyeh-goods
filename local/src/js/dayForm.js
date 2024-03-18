


$(function(){
    var Days = [31,28,31,30,31,30,31,31,30,31,30,31];// index => month [0-11]
    $(document).ready(function(){
        $('.selectBox select').on('change', function () {
            $(this).css('color', '#221e1f')
        });
        var option = '<option value="day">日</option>';
        var selectedDay="day";
        for (var i=1;i <= Days[0];i++){ //add option days
            option += '<option value="'+ i + '">' + i + '</option>';
        }
        $('#day').append(option);
        $('#day').val(selectedDay);

        var option = '<option value="month">月</option>';
        var selectedMon ="month";
        for (var i=1;i <= 12;i++){
            option += '<option value="'+ i + '">' + i + '</option>';
        }
        $('#month').append(option);
        $('#month').val(selectedMon);
        var d = new Date();
        var option = '<option value="year">年</option>';
        selectedYear ="year";
        for (var i=1930;i <= d.getFullYear();i++){// years start i
            option += '<option value="'+ i + '">' + i + '</option>';
        }
        $('#year').append(option);
        $('#year').val(selectedYear);
    });
    function change_year(select){
        if( isLeapYear( $(select).val() ) )
        {
            Days[1] = 29;
        }
        else {
            Days[1] = 28;
        }
        if( $("#month").val() == 2){
            var day = $('#day');
            var val = $(day).val();
            $(day).empty();
            var option = '<option value="day">日</option>';
            for (var i=1;i <= Days[1];i++){ //add option days
                    option += '<option value="'+ i + '">' + i + '</option>';
            }
            $(day).append(option);
            if( val > Days[ month ] )
            {
                    val = 1;
            }
            $(day).val(val);
        }
    }

    function change_month(select) {
        var day = $('#day');
        var val = $(day).val();
        $(day).empty();
        var option = '<option value="day">日</option>';
        var month = parseInt( $(select).val() ) - 1;
        for (var i=1;i <= Days[ month ];i++){ //add option days
            option += '<option value="'+ i + '">' + i + '</option>';
        }
        $(day).append(option);
        if( val > Days[ month ] ){
            val = 1;
        }
        $(day).val(val);
    }


    function RefreshImage(valImageId) {
        var objImage = document.images[valImageId];
        if (objImage == undefined) {
            return;
        }
        var now = new Date();
        objImage.src = objImage.src.split('?')[0] + '?s=' + new Date().getTime();
    };
});