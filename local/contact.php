    <?php include "quote/template/head.php"; ?>
    <link rel="stylesheet" href="dist/css/news.css">
</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
    ?>
    <main class="contactPage">
        <div class="kvTitle">
            <div class="container">
                <div class="enTitle">CONTACT</div>
                <div class="twTitle">聯繫我們</div>
            </div>
        </div>
        <div class="content container">
            <div class="leftBox">
                <img src="dist/images/page/contact.png" alt="">
            </div>
            <div class="rightBox">
                <div class="intro">如有任何問題，歡迎您填寫表單，我們將盡快安排客服專員為您服務。</div>
                <form action="">
                        <!-- 如果沒有填寫，則增加req -->
                    <div class="req">
                        <div class="m_title"><span>*</span>姓名<b>必填</b></div>
                        <input type="text" name="" id="" placeholder="請輸入姓名">
                    </div>
                        <!-- 如果沒有填寫，則增加req -->
                    <div>
                        <div class="m_title"><span>*</span>手機<b>必填</b></div>
                        <input type="text" name="" id="" placeholder="請輸入手機">
                    </div>
                        <!-- 如果沒有填寫，則增加req -->
                    <div>
                        <div class="m_title"><span>*</span>E-mail<b>必填</b></div>
                        <input type="text" name="" id="" placeholder="請輸入E-mail">
                    </div>
                        <!-- 如果沒有填寫，則增加req -->
                    <div class="req">
                        <div class="m_title"><span>*</span>聯絡事項<b>必填</b></div>
                        <select name="" id="">
                            <option value="">請選擇聯絡事項</option>
                            <option value="">聯絡事項1</option>
                            <option value="">聯絡事項2</option>
                        </select>
                    </div>
                        <!-- 如果沒有填寫，則增加req -->
                    <div class="req">
                        <div class="m_title"><span>*</span>內容<b>必填</b></div>
                        <textarea name="" id="" cols="30" rows="10" placeholder="請輸入內容"></textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="backBtn">
            <a href="javascript:;">送出</a>
        </div>
    </main>
    <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>  
    <script>
        $('select').on('change', function(){
            $(this).css('color', '#000')
        })
    </script>
</body>

</html>