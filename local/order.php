<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/order.css">
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
                                            <li class="active">
                                                <a href="javascript:;">訂單紀錄</a>
                                            </li>
                                            <li>
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
                    <div class="form">
                        <ul class="form_title">
                            <li>訂單日期</li>
                            <li>訂單編號</li>
                            <li>訂單金額</li>
                            <li>付款方式</li>
                            <li>訂單狀態</li>
                            <li></li>
                        </ul>
                        <!-- 付款方式有五種狀態:
                    1.信用卡付款
                    （＊分期期數 一次付清 /3朋/6期/12期）
                    2.ATM虛擬代碼繳責
                    3.超商條碼
                    4.超商代碼
                    5.貨到付款 -->

                        <!-- 訂單狀態共7種狀態：
                        1. 待付款
                        2. 待出貨
                        3. 已出貨
                        4. 訂單完成
                        5. 訂單取消
                        6. 退貨中
                        7. 已退貨 -->

                        <ul class="form_block">
                            <li>
                                <div>訂單日期</div>
                                <div>2022.0610</div>
                            </li>
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>訂單金額</div>
                                <div>$1,680</div>
                            </li>
                            <li>
                                <div>付款方式</div>
                                <div>貨到付款</div>
                            </li>
                            <li>
                                <div>訂單狀態</div>
                                <div>待出貨</div>
                            </li>
                            <li>
                                <a href="order-detail.php">查看</a>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單日期</div>
                                <div>2022.06.10</div>
                            </li>
                            <li>
                                <div>訂單編號</div>
                                <div>HY211029111</div>
                            </li>
                            <li>
                                <div>訂單金額</div>
                                <div>$3,990</div>
                            </li>
                            <li>
                                <div>付款方式</div>
                                <div>超商代碼</div>
                            </li>
                            <li>
                                <div>訂單狀態</div>
                                <div>訂單取消</div>
                            </li>
                            <li>
                                <a href="order-detail.php">查看</a>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單日期</div>
                                <div>2022.06.10</div>
                            </li>
                            <li>
                                <div>訂單編號</div>
                                <div>HY210525089</div>
                            </li>
                            <li>
                                <div>訂單金額</div>
                                <div>$1,660</div>
                            </li>
                            <li>
                                <div>付款方式</div>
                                <div>貨到付款</div>
                            </li>
                            <li>
                                <div>訂單狀態</div>
                                <div>訂單取消</div>
                            </li>
                            <li>
                                <a href="order-detail.php">查看</a>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單日期</div>
                                <div>2022.05.25</div>
                            </li>
                            <li>
                                <div>訂單編號</div>
                                <div>HY210525089</div>
                            </li>
                            <li>
                                <div>訂單金額</div>
                                <div>$1,660</div>
                            </li>
                            <li>
                                <div>付款方式</div>
                                <div>貨到付款</div>
                            </li>
                            <li>
                                <div>訂單狀態</div>
                                <div>訂單取消</div>
                            </li>
                            <li>
                                <a href="order-detail.php">查看</a>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單日期</div>
                                <div>2022.05.22</div>
                            </li>
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>訂單金額</div>
                                <div>$3,990</div>
                            </li>
                            <li>
                                <div>付款方式</div>
                                <div>貨到付款</div>
                            </li>
                            <li>
                                <div>訂單狀態</div>
                                <div>訂單取消</div>
                            </li>
                            <li>
                                <a href="order-detail.php">查看</a>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單日期</div>
                                <div>2022.05.22</div>
                            </li>
                            <li>
                                <div>訂單編號</div>
                                <div>HY210522029</div>
                            </li>
                            <li>
                                <div>訂單金額</div>
                                <div>$3,990</div>
                            </li>
                            <li>
                                <div>付款方式</div>
                                <div>超商代碼</div>
                            </li>
                            <li>
                                <div>訂單狀態</div>
                                <div>未入帳</div>
                            </li>
                            <li>
                                <a href="order-detail.php">查看</a>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單日期</div>
                                <div>2022.05.22</div>
                            </li>
                            <li>
                                <div>訂單編號</div>
                                <div>HY210522028</div>
                            </li>
                            <li>
                                <div>訂單金額</div>
                                <div>$1,680</div>
                            </li>
                            <li>
                                <div>付款方式</div>
                                <div>超商代碼</div>
                            </li>
                            <li>
                                <div>訂單狀態</div>
                                <div>訂單取消</div>
                            </li>
                            <li>
                                <a href="order-detail.php">查看</a>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單日期</div>
                                <div>2022.05.22</div>
                            </li>
                            <li>
                                <div>訂單編號</div>
                                <div>HY220610034</div>
                            </li>
                            <li>
                                <div>訂單金額</div>
                                <div>$1,680</div>
                            </li>
                            <li>
                                <div>付款方式</div>
                                <div>貨到付款</div>
                            </li>
                            <li>
                                <div>訂單狀態</div>
                                <div>訂單取消</div>
                            </li>
                            <li>
                                <a href="order-detail.php">查看</a>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單日期</div>
                                <div>2022.05.22</div>
                            </li>
                            <li>
                                <div>訂單編號</div>
                                <div>HY210522002</div>
                            </li>
                            <li>
                                <div>訂單金額</div>
                                <div>$1,680</div>
                            </li>
                            <li>
                                <div>付款方式</div>
                                <div>貨到付款</div>
                            </li>
                            <li>
                                <div>訂單狀態</div>
                                <div>訂單取消</div>
                            </li>
                            <li>
                                <a href="order-detail.php">查看</a>
                            </li>
                        </ul>
                        <ul class="form_block">
                            <li>
                                <div>訂單日期</div>
                                <div>2022.05.21</div>
                            </li>
                            <li>
                                <div>訂單編號</div>
                                <div>HY210522001</div>
                            </li>
                            <li>
                                <div>訂單金額</div>
                                <div>$1,680</div>
                            </li>
                            <li>
                                <div>付款方式</div>
                                <div>貨到付款</div>
                            </li>
                            <li>
                                <div>訂單狀態</div>
                                <div>訂單取消</div>
                            </li>
                            <li>
                                <a href="order-detail.php">查看</a>
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