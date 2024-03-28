<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/forgot.css">
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
                            FORGOT PASSWORD
                        </div>
                        <div class="title">
                            忘記密碼
                        </div>
                    </div>
                    <div class="form">
                        <form>
                            <div class="block_flex">
                                <div class="img">
                                    <img src="dist/images/member/forgot_img.png" alt="forgot_img">
                                </div>
                                <ul class="personal">
                                    <!-- 送出必填未填寫會加上 class:required -->
                                    <li class="remind">系統將寄送臨時密碼至您的E-mail，因安全性考量，建議登入後立即更改密碼。</li>
                                    <li class="personal_data required">
                                        <label for="name">
                                            <div>帳號<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="name" name="username" placeholder="請輸入手機/E-mail二擇一" />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn_flex">
                                <a href="javascript:;" class="store_btn">
                                    <div>送出</div>
                                </a>
                            </div>
                        </form>
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
</body>

</html>