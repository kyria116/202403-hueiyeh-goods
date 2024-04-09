    <?php include "quote/template/head.php"; ?>
    <link rel="stylesheet" href="dist/css/otherPage.css">
</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
    ?>
    <main class="ticketsDetailPage">
        <div class="editor_Content">
            <div class="editor_box pc_use">
                <img src="dist/images/page/store.jpg" alt="">
                <img src="dist/images/page/store.jpg" alt="">
                <img src="dist/images/page/store.jpg" alt="">
                <img src="dist/images/page/store.jpg" alt="">
                <img src="dist/images/page/store.jpg" alt="">
                <img src="dist/images/page/store.jpg" alt="">
            </div>
            <div class="editor_box mo_use">
                <img src="dist/images/page/store.jpg" alt="">
                <img src="dist/images/page/store.jpg" alt="">
                <img src="dist/images/page/store.jpg" alt="">
                <img src="dist/images/page/store.jpg" alt="">
                <img src="dist/images/page/store.jpg" alt="">
                <img src="dist/images/page/store.jpg" alt="">
            </div>
        </div>
        <div class="backBtn">
            <!-- 
                後台可以編輯按鈕文字(領取折扣碼 / 折扣碼已發完) 
                如果折扣碼已發完，則會跳出alert且文字可編輯
            -->
            <!-- <a href="javascript:;" target="_blank">領取折扣碼</a> -->
            <a href="javascript:;" target="_blank" onclick="usedUp()">折扣碼已發完</a>
        </div>
    </main>
    <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>  
    <script>
        function usedUp(){
            alert('每組會員限領1次折扣碼')
        }
    </script>
</body>

</html>