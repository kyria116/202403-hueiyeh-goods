    <?php include "quote/template/head.php"; ?>
    <link rel="stylesheet" href="dist/css/product-detail.css">
    </head>

    <body class="lang_tw">
        <?php
            include "quote/template/added.php";
            include "quote/template/nav.php";
        ?>
        <main class="testPage">
            <div class="container">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><a href="javascript:;">01</a></div>
                        <div class="swiper-slide"><a href="javascript:;">03</a></div>
                        <div class="swiper-slide"><a href="javascript:;">03</a></div>
                        <div class="swiper-slide"><a href="javascript:;">04</a></div>
                        <div class="swiper-slide"><a href="javascript:;">05</a></div>
                        <div class="swiper-slide"><a href="javascript:;">06</a></div>
                        <div class="swiper-slide"><a href="javascript:;">06</a></div>
                        <div class="swiper-slide"><a href="javascript:;">06</a></div>
                        <div class="swiper-slide"><a href="javascript:;">09</a></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </main>
        <?php
            include "quote/template/footer.php";
            include "quote/template/top_btn.php";
        ?>
        <script src="dist/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 5,
                spaceBetween: 20,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                on:{
                    click: function(e){
                        swiper.slideTo(e.clickedIndex, 1000, false);
                        $('.swiper .swiper-wrapper > div').removeClass('activeThis')
                        $('.swiper .swiper-wrapper > div').eq(e.clickedIndex).addClass('activeThis')
                    },
                },
            });

            let numSwipr = '01'
            $('.swiper .swiper-wrapper > div').each(function(){
                if(numSwipr == $(this).text()){
                    $(this).addClass('repeat')
                }else{
                    numSwipr = $(this).text()
                }
            })
        </script>
    </body>

    </html>