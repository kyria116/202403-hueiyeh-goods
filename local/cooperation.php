    <?php include "quote/template/head.php"; ?>
    <link rel="stylesheet" href="dist/css/news.css">
</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
    ?>
    <main class="cooperationPage">
        <div class="kvTitle">
            <div class="container">
                <div class="enTitle">COOPERATION</div>
                <div class="twTitle">商務洽談</div>
            </div>
        </div>
        <div class="pageImg mo">
            <img src="dist/images/page/cooperation.png" alt="">
        </div>
        <div class="content container">
            <div class="cooperationBox bulk">
                <div class="pageImg pc">
                    <img src="dist/images/page/cooperation.png" alt="">
                </div>
                <div class="b_title">大宗採購</div>
                <ul>
                    <li>
                        <div class="mail">
                            <div class="icon"><img src="dist/images/page/mail.png" alt=""></div>
                            <a href="mailto:gifts@hueiyeh.com.tw">gifts@hueiyeh.com.tw</a>
                        </div>
                    </li>
                    <li>
                        <div class="mail">
                            <div class="icon"><img src="dist/images/page/mail.png" alt=""></div>
                            <a href="mailto:gifts@hueiyeh.com.tw">gifts@hueiyeh.com.tw</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="cooperationBox" id="cooperation">
                <div class="b_title">異業合作</div>
                <ul>
                    <li>
                        <div class="title">輝葉按摩椅</div>
                        <div class="mail">
                            <div class="icon"><img src="dist/images/page/mail.png" alt=""></div>
                            <a href="mailto:gifts@hueiyeh.com.tw">gifts@hueiyeh.com.tw</a>
                        </div>
                    </li>
                    <li>
                        <div class="title">輝葉良品</div>
                        <div class="mail">
                            <div class="icon"><img src="dist/images/page/mail.png" alt=""></div>
                            <a href="mailto:gifts@hueiyeh.com.tw">gifts@hueiyeh.com.tw</a>
                        </div>
                    </li>
                    <li>
                        <div class="title">HYD</div>
                        <div class="mail">
                            <div class="icon"><img src="dist/images/page/mail.png" alt=""></div>
                            <a href="mailto:gifts@hueiyeh.com.tw">gifts@hueiyeh.com.tw</a>
                        </div>
                    </li>
                    <li>
                        <div class="title">decopop</div>
                        <div class="mail">
                            <div class="icon"><img src="dist/images/page/mail.png" alt=""></div>
                            <a href="mailto:gifts@hueiyeh.com.tw">gifts@hueiyeh.com.tw</a>
                        </div>
                    </li>
                    <li>
                        <div class="title">decopop</div>
                        <div class="mail">
                            <div class="icon"><img src="dist/images/page/mail.png" alt=""></div>
                            <a href="mailto:gifts@hueiyeh.com.tw">gifts@hueiyeh.com.tw</a>
                        </div>
                    </li>
                    <li>
                        <div class="title">decopop</div>
                        <div class="mail">
                            <div class="icon"><img src="dist/images/page/mail.png" alt=""></div>
                            <a href="mailto:gifts@hueiyeh.com.tw">gifts@hueiyeh.com.tw</a>
                        </div>
                    </li>
                    <li>
                        <div class="title">decopop</div>
                        <div class="mail">
                            <div class="icon"><img src="dist/images/page/mail.png" alt=""></div>
                            <a href="mailto:gifts@hueiyeh.com.tw">gifts@hueiyeh.com.tw</a>
                        </div>
                    </li>
                    <li>
                        <div class="title">decopop</div>
                        <div class="mail">
                            <div class="icon"><img src="dist/images/page/mail.png" alt=""></div>
                            <a href="mailto:gifts@hueiyeh.com.tw">gifts@hueiyeh.com.tw</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>
    <script>
        if(new URL(location.href).searchParams.get('cooperation') == 'alliance'){
            $('html, body').stop(true).animate({
                scrollTop: $('#cooperation').offset().top - $('header').outerHeight() - 20
            }, 1)
        }
    </script>  
</body>

</html>