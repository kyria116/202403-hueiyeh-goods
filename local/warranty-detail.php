<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/warranty-detail.css">
</head>

<body class="lang_tw">
    <?php
    include "quote/template/nav.php";
    ?>
    <main>
        <section class="registration">
            <div class="container">
                <div class="registration_flex">
                    <div class="title_flex">
                        <div class="subtitle">
                            MEMBER
                        </div>
                        <div class="title">
                            會員專區
                        </div>
                    </div>
                    <div class="profile_flex">
                        <div class="member_img">
                            <img src="dist/images/member/member-profile_img.png" alt="member-profile_img">
                        </div>
                        <div class="product_sort">
                            <div id="top-menu-ul-2" class="top-menu-ul-2">
                                <div class="item_Menu">
                                    <div class="item_menu_Box">
                                        <ul class="item_menu_list slides">
                                            <li>
                                                <a href="javascript:;">會員資料</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">訂單紀錄</a>
                                            </li>
                                            <li class="active">
                                                <a href="javascript:;">產品保固</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">我的折價券</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex-direction-nav">
                                    <a href="javascript:;" class="lbtn arrow flex-prev">
                                        <div></div>
                                    </a>
                                    <a href="javascript:;" class="rbtn arrow flex-next">
                                        <div></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page_subtitle">產品保固資訊</div>
                    <div class="warranty_list">
                        <div class="warranty_block">
                            <div class="commodity_flex">
                                <div class="commodity_img"><img src="dist/images/member/product_img.jpg"></div>
                                <div class="commodity_info">
                                    <div class="commodity_num">HY-5013</div>
                                    <div class="commodity_title">商務艙PLUS零重力按摩椅</div>
                                </div>
                            </div>
                            <div class="warranty_info_flex">
                                <div class="warranty_info">
                                    <div class="date">
                                        <span class="info_title">登錄日期</span>
                                        2022.04.18
                                    </div>
                                    <div class="num">
                                        <span class="info_title">訂單編號</span>
                                        HY220610034
                                    </div>
                                    <div class="location">
                                        <span class="info_title">購買通路</span>
                                        門市
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page_subtitle">活動資訊</div>
                    <!-- 編輯器開始 -->
                    <div class="edit">
                        <img src="dist/images/member/cozyfitf.jpg">
                    </div>
                    <!-- 編輯器結尾 -->
                    <div class="btn_flex">
                        <a href="javascript:;" class="store_btn back-btn">
                            <div>返回</div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    include "quote/template/footer.php";
    include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>
    <script>
        document.querySelector('.back-btn').onclick = function() {
            window.history.back();
        }
    </script>
</body>

</html>