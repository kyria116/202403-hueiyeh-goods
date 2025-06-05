<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/coupon.css">
</head>

<body class="lang_tw">
    <?php
    include "quote/template/nav.php";
    ?>
    <main>
        <section class="registration points2">
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
                                                <a href="member-profile.php">會員資料</a>
                                            </li>
                                            <li>
                                                <a href="order.php">訂單紀錄</a>
                                            </li>
                                            <li>
                                                <a href="warranty-list.php">產品保固</a>
                                            </li>
                                            <li>
                                                <a href="coupon.php">我的折價券</a>
                                            </li>
                                            <!-- 20250603 新增 start -->
                                            <li class="active">
                                                <a href="points2.php">積點紀錄</a>
                                            </li>
                                            <!-- 20250603 新增 end -->

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
                    <div class="points_remark_txt">提供最近一年內積點紀錄查詢</div>
                    <div class="form">
                        <ul class="form_title">
                            <li>訂單編號</li>
                            <li>項目</li>
                            <li>日期</li>
                            <li>積點效期</li>
                            <li>累點/扣點</li>
                        </ul>
                        <!-- 狀態已過期的在ul加上class:expired -->
                        <!-- 不限消費金額的在li加上unlimited_budget -->
                        <ul class="form_block">
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>項目</div>
                                <div>生日禮</div>
                            </li>
                            <li>
                                <div>獲得日期</div>
                                <div>2022.10.26</div>
                            </li>
                            <li>
                                <div>日期</div>
                                <div>2022.10.26 - 2023.12.31</div>
                            </li>
                            <li>
                                <div>累點/扣點</div>
                                <div>+200</div>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>項目</div>
                                <div>生日禮</div>
                            </li>
                            <li>
                                <div>獲得日期</div>
                                <div>2022.10.26</div>
                            </li>
                            <li>
                                <div>日期</div>
                                <div>2022.10.26 - 2023.12.31</div>
                            </li>
                            <li>
                                <div>累點/扣點</div>
                                <div>+200</div>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>項目</div>
                                <div>生日禮</div>
                            </li>
                            <li>
                                <div>獲得日期</div>
                                <div>2022.10.26</div>
                            </li>
                            <li>
                                <div>日期</div>
                                <div>2022.10.26 - 2023.12.31</div>
                            </li>
                            <li>
                                <div>累點/扣點</div>
                                <div>+200</div>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>項目</div>
                                <div>生日禮</div>
                            </li>
                            <li>
                                <div>獲得日期</div>
                                <div>2022.10.26</div>
                            </li>
                            <li>
                                <div>日期</div>
                                <div>2022.10.26 - 2023.12.31</div>
                            </li>
                            <li>
                                <div>累點/扣點</div>
                                <div>+200</div>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>項目</div>
                                <div>生日禮</div>
                            </li>
                            <li>
                                <div>獲得日期</div>
                                <div>2022.10.26</div>
                            </li>
                            <li>
                                <div>日期</div>
                                <div>2022.10.26 - 2023.12.31</div>
                            </li>
                            <li>
                                <div>累點/扣點</div>
                                <div>+200</div>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>項目</div>
                                <div>生日禮</div>
                            </li>
                            <li>
                                <div>獲得日期</div>
                                <div>2022.10.26</div>
                            </li>
                            <li>
                                <div>日期</div>
                                <div>2022.10.26 - 2023.12.31</div>
                            </li>
                            <li>
                                <div>累點/扣點</div>
                                <div>+200</div>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>項目</div>
                                <div>生日禮</div>
                            </li>
                            <li>
                                <div>獲得日期</div>
                                <div>2022.10.26</div>
                            </li>
                            <li>
                                <div>日期</div>
                                <div>2022.10.26 - 2023.12.31</div>
                            </li>
                            <li>
                                <div>累點/扣點</div>
                                <div>+200</div>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>項目</div>
                                <div>生日禮</div>
                            </li>
                            <li>
                                <div>獲得日期</div>
                                <div>2022.10.26</div>
                            </li>
                            <li>
                                <div>日期</div>
                                <div>2022.10.26 - 2023.12.31</div>
                            </li>
                            <li>
                                <div>累點/扣點</div>
                                <div>+200</div>
                            </li>
                        </ul>
                        <ul class="form_block expired">
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>項目</div>
                                <div>點數失效</div>
                            </li>
                            <li>
                                <div>獲得日期</div>
                                <div>2022.10.26</div>
                            </li>
                            <li>
                                <div>日期</div>
                                <div>2022.10.26 - 2023.12.31</div>
                            </li>
                            <li>
                                <div>累點/扣點</div>
                                <div>-200</div>
                            </li>
                        </ul>
                        <ul class="form_block expired">
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>項目</div>
                                <div>點數失效</div>
                            </li>
                            <li>
                                <div>獲得日期</div>
                                <div>2022.10.26</div>
                            </li>
                            <li>
                                <div>日期</div>
                                <div>2022.10.26 - 2023.12.31</div>
                            </li>
                            <li>
                                <div>累點/扣點</div>
                                <div>-200</div>
                            </li>
                        </ul>
                        <ul class="form_block expired">
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>項目</div>
                                <div>點數失效</div>
                            </li>
                            <li>
                                <div>獲得日期</div>
                                <div>2022.10.26</div>
                            </li>
                            <li>
                                <div>日期</div>
                                <div>2022.10.26 - 2023.12.31</div>
                            </li>
                            <li>
                                <div>累點/扣點</div>
                                <div>-200</div>
                            </li>
                        </ul>
                    </div>
                    <?php
                    include "quote/template/page_list.php";
                    ?>
                </div>
            </div>
        </section>
    </main>
    <?php
    include "quote/template/footer.php";
    include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>
</body>

</html>