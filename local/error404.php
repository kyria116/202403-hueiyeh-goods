    <?php include "quote/template/head.php"; ?>
    <link rel="stylesheet" href="dist/css/otherPage.css">
</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
    ?>
    <main class="noPage">
        <div class="kvTitle">
            <div class="container">
                <div class="enTitle">PAGE NOT FOUND</div>
                <div class="twTitle">查無此頁</div>
            </div>
        </div>
        <div class="content container">
            <div class="img">
                <img src="dist/images/page/404.png" alt="">
            </div>
            <div class="txt">
                很抱歉！無法找到您所連結的頁面，歡迎您返回首頁，繼續您的瀏覽
            </div>
        </div>
        <div class="backBtn">
            <a href="./">回首頁</a>
        </div>
    </main>
    <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>  
</body>

</html>