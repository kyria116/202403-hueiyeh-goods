    <?php include "quote/template/head.php"; ?>
    <link rel="stylesheet" href="dist/css/otherPage.css">
</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
    ?>
    <main class="ticketsDetailPage">
        <div class="content container">
            <div class="leftBox">
                <img src="dist/images/page/ticketsDetailPage.png" alt="">
            </div>
            <div class="rightBox">
                <div class="titleBox">
                    <div class="icon">
                        <img src="dist/images/page/successfulTicket.png" alt="">
                    </div>
                    <div class="txt">
                        <div class="enTxt">SUCCESSFUL</div>
                        <div class="twTxt">恭喜! 獲得折扣碼</div>
                    </div>
                </div>
                <ul class="ticketBox">
                    <li>
                        <div class="m_title">折扣碼</div>
                        <div class="m_info">ZRF0220J</div>
                    </li>
                    <li>
                        <div class="m_title">姓名</div>
                        <div class="m_info">Evora</div>
                    </li>
                    <li>
                        <div class="m_title">手機</div>
                        <div class="m_info">0985777777</div>
                    </li>
                    <li>
                        <div class="m_title">E-mail</div>
                        <div class="m_info">evora@mak66design.com</div>
                    </li>
                </ul>
                <div class="intro">
                    <div class="introTitle">
                        溫馨提醒
                    </div>
                    <div class="editor_Content">
                        <div class="editor_box pc_use">
                            <ol>
                                <li>
                                    折扣碼使用期間為11.06-11.08。 
                                </li>
                                <li>
                                    折扣碼僅能使用於指定商品，結帳時，輸入折扣碼，即享早鳥優惠再折$1,111。每筆結帳限使用乙次。
                                </li>
                                <li>
                                    每項指定商品限量20組。
                                </li>
                            </ol>
                        </div>
                        <div class="editor_box mo_use">
                            <ol>
                                <li>
                                    折扣碼使用期間為11.06-11.08。 
                                </li>
                                <li>
                                    折扣碼僅能使用於指定商品，結帳時，輸入折扣碼，即享早鳥優惠再折$1,111。每筆結帳限使用乙次。
                                </li>
                                <li>
                                    每項指定商品限量20組。
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="backBtn">
            <a href="newTicketsPage.php">活動詳情</a>
        </div>
    </main>
    <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>  
</body>

</html>