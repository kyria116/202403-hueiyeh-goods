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
                        EDIT PASSWORD
                        </div>
                        <div class="title">
                            修改密碼
                        </div>
                    </div>
                    <div class="form">
                        <form>
                            <div class="block_flex">
                                <div class="img">
                                    <img src="dist/images/member/edit-password_img.png" alt="login_img">
                                </div>
                                <ul class="personal">
                                    <!-- 送出必填未填寫會加上 class:required -->
                                    <li class="personal_data required">
                                        <label for="name">
                                            <div>原密碼<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="name" name="username" placeholder="請輸入原密碼" />
                                        </div>
                                    </li>
                                    <li class="personal_data">
                                        <label for="password">
                                            <div>新密碼<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="password" name="password" placeholder="至少6字元以上" />
                                        </div>
                                    </li>
                                    <li class="personal_data">
                                        <label for="password">
                                            <div>密碼確認<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="password" name="password" placeholder="請再次輸入新密碼" />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn_flex">
                                <a href="javascript:;" class="store_btn">
                                    <div>密碼修改</div>
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