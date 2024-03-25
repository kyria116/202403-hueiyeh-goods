<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/login.css">
</head>

<body class="lang_tw">
    <?php
    include "quote/template/nav.php";
    ?>
    <main>
        <section class="registration">
            <div class="container">
                <div class="login_flex">
                    <div class="title_flex">
                        <div class="subtitle">
                            LOGIN
                        </div>
                        <div class="title">
                            會員登入
                        </div>
                    </div>
                    <div class="form">
                        <form>
                            <div class="block_flex">
                                <div class="img">
                                    <img src="dist/images/member/login_img.png" alt="login_img">
                                </div>
                                <ul class="personal">
                                    <!-- 送出必填未填寫會加上 class:required -->
                                    <li class="personal_data required">
                                        <label for="name">
                                            <div>帳號<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="name" name="username" placeholder="請輸入手機/E-mail二擇一" />
                                        </div>
                                    </li>
                                    <li class="personal_data">
                                        <label for="password">
                                            <div>密碼<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="password" name="password" placeholder="請輸入密碼" />
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="btn_flex">
                                <a href="javascript:;" class="store_btn">
                                    <div>登入</div>
                                </a>
                            </div>
                        </form>
                    </div>
                    <ul class="remark">
                        <li><a href="javascript:;">立即註冊</a></li>
                        <li><a href="javascript:;">忘記密碼</a></li>
                    </ul>
                    <ul class="community">
                        <li>
                            <a href="javascript:;"  class="google">
                                <div class="icon">
                                    <img src="dist/images/member/google_icon.png" alt="google_icon">
                                    <img src="dist/images/member/google_icon.png" alt="google_icon">
                                </div>
                                <span>使用Google帳號登入</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;"  class="facebook">
                                <div class="icon">
                                    <img src="dist/images/member/fb_icon.png" alt="facebook_icon">
                                    <img src="dist/images/member/fb_icon_hover.png" alt="facebook_icon">
                                </div>
                                <span>使用Facebook帳號登入</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;"  class="line">
                                <div class="icon">
                                    <img src="dist/images/member/line_icon.png" alt="LINE_icon">
                                    <img src="dist/images/member/line_icon_hover.png" alt="LINE_icon">
                                </div>
                                <span>使用LINE帳號登入</span>
                            </a>
                        </li>
                    </ul>
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