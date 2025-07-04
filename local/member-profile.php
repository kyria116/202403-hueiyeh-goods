<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/member-profile.css">
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
                                            <li class="active">
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
                                            <li>
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
                    <div class="member_flex">
                        <div class="member_block">
                            <div class="info_flex">
                                <div class="profile_img">
                                    <!-- 女生使用female.png -->
                                    <img src="dist/images/member/female.png" alt="profile_img_female">
                                    <!-- 男生使用male.png -->
                                    <!-- <img src="dist/images/member/male.png" alt="profile_img_male"> -->
                                </div>
                                <ul class="info">
                                    <!-- 20250603 調整 start -->
                                    <li class="name">
                                        <div>Evora</div>
                                        <div class="member_level">一般會員</div>
                                    </li>
                                    <!-- 20250603 調整 start -->
                                    <li>1993.10.30</li>
                                    <li class="mail">evora@mak66design.com</li>
                                    <li class="change_p">
                                        <a href="edit-password.php">
                                            修改密碼
                                        </a>
                                    </li>
                                </ul>
                            </div>
                              <!-- 20250603 調整 start -->
                            <div class="point_wrap">
                                <ul class="point">
                                    <li class="txt">總積點</li>
                                    <li class="num">1020</li>
                                </ul>
                                <p>您有xxx點將於xxxx/xx/xx到期</p>
                            </div>
                              <!-- 20250603 調整 end -->
                        </div>
                        <div class="form">
                            <form>
                                <ul class="personal">
                                    <!-- 送出必填未填寫會加上 class:required -->
                                    <li class="personal_data">
                                        <label for="phone">
                                            <div>手機<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="phone" name="phone" placeholder="請輸入手機號碼" value="0985811508" />
                                        </div>
                                    </li>
                                    <li class="personal_data2">
                                        <!-- 非必填會加上 class:optional -->
                                        <label for="tel" class="optional">
                                            <div>室內電話<span>必填</span></div>
                                        </label>
                                        <div class="telephone">
                                            <div class="input area_code">
                                                <input type="text" id="area_code" name="area_code" placeholder="區域號碼" value="02" />
                                            </div>
                                            <div class="input tel">
                                                <input type="text" id="tel" name="tel" placeholder="請填寫電話" value="25995528" />
                                            </div>
                                        </div>
                                    </li>

                                    <li class="personal_data address_data">
                                        <label for="district">
                                            <div>地址<span>必填</span></div>
                                        </label>
                                        <div class="city-selector">
                                            <span class="selector">
                                                <select class="county" data-value="臺北市">
                                                </select>
                                                <select class="district2" data-value="103 大同區">
                                                </select>
                                            </span>
                                            <div class="input address">
                                                <input type="text" id="phone" name="phone" placeholder="請填寫地址" value="承德路三段179號4樓" />
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="btn_flex">
                                    <a href="javascript:;" class="store_btn">
                                        <div>儲存修改</div>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    include "quote/template/footer.php";
    include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/tw-city-selector.js"></script>
    <script src="dist/js/main.js"></script>
    <script src="dist/js/registration.js"></script>
</body>

</html>