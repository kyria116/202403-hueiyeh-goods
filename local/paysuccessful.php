    <?php include "quote/template/head.php"; ?>
    <link rel="stylesheet" href="dist/css/otherPage.css">
</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
    ?>
    <main class="paysuccessfulPage">
        <div class="kvTitle">
            <div class="container">
                <div class="enTitle">PAYSUCCESSFUL</div>
                <div class="twTitle">訂購成功</div>
            </div>
        </div>
        <div class="content container">
            <div class="leftBox">
                <img src="dist/images/page/paysuccessful.png" alt="">
            </div>
            <div class="rightBox">
                <img src="dist/images/page/success.png" alt="">
                <div class="txt">
                    您已完成訂購！訂單編號為 <span class="red">2102070001</span><br>
                    感謝您對輝葉良品的支持！ 
                </div>
            </div>
        </div>
        <div class="backBtn">
            <a href="order.php">查看訂單紀錄</a>
        </div>
    </main>
    <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>  
</body>

</html>