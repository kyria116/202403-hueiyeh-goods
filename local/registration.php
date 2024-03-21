<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/registration.css">
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
                            REGISTRATION
                        </div>
                        <div class="title">
                            會員註冊
                        </div>
                    </div>
                    <div class="form">
                        <form>
                            <ul class="personal">
                                <li class="personal_data">
                                    <label for="name">
                                        <div>姓名<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="text" id="name" name="username" placeholder="請輸入真實姓名" />
                                    </div>
                                </li>
                                <li class="personal_data">
                                    <label for="check">
                                        <div>性別<span>必填</span></div>
                                    </label>
                                    <fieldset>
                                        <div class="ckbutton">
                                            <input type="radio" id="male" name="sex" />
                                            <label for="male">先生</label>
                                        </div>
                                        <div class="ckbutton">
                                            <input type="radio" id="female" name="sex" />
                                            <label for="female">小姐</label>
                                        </div>

                                    </fieldset>
                                </li>
                                <li class="personal_data">
                                    <label for="birthday">
                                        <div>生日<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="date" id="birthday" name="birthday" placeholder="年/月/日" />
                                    </div>
                                </li>
                                <li class="personal_data">
                                    <label for="mail">
                                        <div>E-mail<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="email" id="emailAddress" name="emailAddress" placeholder="請輸入常用E-mail" />
                                    </div>
                                </li>
                                <li class="personal_data">
                                    <label for="password">
                                        <div>密碼<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="text" id="password" name="password" placeholder="至少6字元以上" />
                                    </div>
                                </li>
                                <li class="personal_data">
                                    <label for="password_confirm">
                                        <div>密碼確認<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="text" id="password_confirm" name="password_confirm" placeholder="請再次輸入密碼" />
                                    </div>
                                </li>
                                <li class="personal_data">
                                    <label for="phone">
                                        <div>手機<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="text" id="phone" name="phone" placeholder="請輸入手機號碼" />
                                    </div>
                                </li>
                                <li class="personal_data">
                                    <label for="tel" class="optional">
                                        <div>室內電話</div>
                                    </label>
                                    <div class="telephone">
                                        <div class="input area_code">
                                            <input type="text" id="area_code" name="area_code" placeholder="區域號碼" />
                                        </div>
                                        <div class="input tel">
                                            <input type="text" id="tel" name="tel" placeholder="請填寫電話" />
                                        </div>
                                    </div>
                                </li>

                                <li class="personal_data">
                                    <label for="district">
                                        <div>地址<span>必填</span></div>
                                    </label>
                                    <div class="city-selector">
                                        <select class="county">
                                        </select>
                                        <select class="district2">
                                        </select>
                                        <div class="input" style="width:57.6%;">
                                            <input type="text" id="phone" name="phone" placeholder="請填寫地址" />
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
    <script src="dist/js/tw-city-selector.js"></script>
    <script src="dist/js/main.js"></script>
    <script src="dist/js/registration.js"></script>
    <script>
        //區域選擇
        new TwCitySelector({
            el: '.city-selector',
            elCounty: '.county',
            elDistrict: '.district2',
        });


        //select 顏色改變
        $("select").change(function() {
            $(this).css("color", "black");
        });
    </script>
</body>

</html>