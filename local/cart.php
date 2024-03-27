<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/cart.css">
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
                            CART
                        </div>
                        <div class="title">
                            購物車
                        </div>
                    </div>
                    <div class="profile_flex">
                        <div class="member_img">
                            <img src="dist/images/member/cart_img.png" alt="member-profile_img">
                        </div>
                    </div>
                    <ul class="form_title">
                        <li>購買產品</li>
                        <li></li>
                        <li>規格</li>
                        <li>數量</li>
                        <li>單價</li>
                        <li>小計</li>
                        <li>移除</li>
                    </ul>
                    <!-- 沒有商品時呈現 -->
                    <div class="no_commodity" style="display: none;">
                        目前購物車內還沒有任何商品
                    </div>
                    <div class="form_block_flex">
                        <div class="form_block">
                            <div class="form_item">
                                <div class="del_mo del_cart">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="item_mo">
                                    <div class="product_img"><img src="dist/images/member/product_img.jpg"></div>
                                    <div class="product_info_txt">
                                        <ul class="txt_1">
                                            <li class="product_num">HY-5013</li>
                                            <li class="product_title">商務艙PLUS零重力按摩椅</li>
                                            <li class="product_event_discounts">父親節活動優惠88折</li>
                                        </ul>
                                        <ul class="txt_2">
                                            <li class="color">
                                                <div class="mo_title">規格</div>
                                                <select name="quantity" id="quantity-select">
                                                    <option value="橘白配色">橘白配色</option>
                                                    <option value="白橘配色">白橘配色</option>
                                                </select>
                                            </li>
                                            <li class="quantity">
                                                <div class="mo_title">數量
                                                </div>
                                                <select name="quantity" id="quantity-select">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </li>
                                            <li class="price_1">
                                                <div class="mo_title">單價</div>
                                                $37,222
                                            </li>
                                            <li class="price_2">
                                                <div class="mo_title">小計</div>
                                                $37,222
                                            </li>
                                            <li class="del del_cart">
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form_item">
                                <div class="del_mo del_giveaway">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="item_mo">
                                    <div class="giveaway_img">
                                        <div class="add">
                                            <div class="title">加購商品</div>
                                            <div class="img">
                                                <img src="dist/images/member/product_img.jpg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="giveaway_info_txt">
                                        <ul class="giveaway_txt_1">
                                            <div class="giveaway_title">商務艙PLUS零重力按摩椅</div>
                                        </ul>
                                        <ul class="giveaway_txt_2">
                                            <li class="giveaway_color">
                                            </li>
                                            <li class="giveaway_quantity">
                                            </li>
                                            <li class="giveaway_price_1">
                                                <div class="mo_title">單價</div>
                                                $1,680
                                            </li>
                                            <li class="giveaway_price_2">
                                                <div class="mo_title">小計</div>
                                                $1,680
                                            </li>
                                            <li class="del del_giveaway">
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form_item">
                                <div class="item_mo">
                                    <div class="giveaway_img">
                                        <div class="add">
                                            <div class="title">贈品</div>
                                            <div class="img">
                                                <img src="dist/images/member/product_img.jpg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="giveaway_info_txt">
                                        <ul class="giveaway_txt_1">
                                            <div class="giveaway_title">
                                                <div class="title">商務艙PLUS零重力按摩椅</div>
                                                <div class="market_price"><span>市價</span>$1,680</div>
                                            </div>
                                        </ul>
                                        <ul class="giveaway_txt_2">
                                            <li class="giveaway_color">
                                            </li>
                                            <li class="giveaway_quantity">
                                            </li>
                                            <li class="giveaway_price_1">
                                            </li>
                                            <li class="giveaway_price_2">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_block">
                            <div class="form_item">
                                <div class="del_mo del_cart">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="item_mo">
                                    <div class="product_img"><img src="dist/images/member/product_img.jpg"></div>
                                    <div class="product_info_txt">
                                        <ul class="txt_1">
                                            <li class="product_num">HY-5013</li>
                                            <li class="product_title">商務艙PLUS零重力按摩椅</li>
                                            <li class="product_event_discounts">父親節活動優惠88折</li>
                                        </ul>
                                        <ul class="txt_2">
                                            <li class="color">
                                                <div class="mo_title">規格</div>
                                                <select name="quantity" id="quantity-select">
                                                    <option value="橘白配色">橘白配色</option>
                                                    <option value="白橘配色">白橘配色</option>
                                                </select>
                                            </li>
                                            <li class="quantity">
                                                <div class="mo_title">數量
                                                </div>
                                                <select name="quantity" id="quantity-select">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </li>
                                            <li class="price_1">
                                                <div class="mo_title">單價</div>
                                                $37,222
                                            </li>
                                            <li class="price_2">
                                                <div class="mo_title">小計</div>
                                                $37,222
                                            </li>
                                            <li class="del del_cart">
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row_flex">
                        <ul class="discount">
                            <li class="mo_title">享用之優惠</li>
                            <li>
                                <div class="discount_item">使用積點</div>
                                <div class="input">
                                    <input type="text" id="point" name="point" />
                                    <div class="remaining_point">可用積點300</div>
                                </div>
                            </li>
                            <li>
                                <div class="discount_item">使用折價券</div>
                                <div class="input">
                                    <select name="coupon-select" id="coupon-select">
                                        <option value="生日禮">生日禮</option>
                                        <option value="會員加入禮">會員加入禮</option>
                                    </select>
                                    <div class="discount_coupon">88HAPPY折價券</div>
                                </div>
                            </li>
                            <li>
                                <div class="discount_item">使用折扣碼</div>
                                <div class="input">
                                    <select name="coupon-code-select" id="coupon-code-select">
                                        <option value="2023HY1111">2023HY1111</option>
                                        <option value="2023HY1111">2023HY1221</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="discount_item">優惠活動</div>
                                <div class="more_discount">
                                    <div>｜年終慶｜全館滿額贈</div>
                                    <div class="full">滿$10,000免運</div>
                                </div>
                            </li>
                        </ul>
                        <ul class="total">
                            <li>
                                <div>總計</div>
                                <div>$1,680</div>
                            </li>
                            <li>
                                <div>滿件優惠折抵</div>
                                <div>-$0</div>
                            </li>
                            <li>
                                <div>積點折抵</div>
                                <div>-$200</div>
                            </li>
                            <li>
                                <div>折價券折抵</div>
                                <div>-$0</div>
                            </li>
                            <li>
                                <div>折扣碼折抵</div>
                                <div>-$0</div>
                            </li>
                            <li>
                                <div>滿額優惠折抵</div>
                                <div>-$0</div>
                            </li>
                            <li>
                                <div>運費</div>
                                <div>$0</div>
                            </li>
                            <li>
                                <div class="total_price_title">應付金額</div>
                                <div class="total_price">$1,480</div>
                            </li>
                        </ul>
                    </div>
                    <div class="recipient">
                        <div class="recipient_title">收件人資料</div>
                        <div class="form">
                            <fieldset>
                                <div class="checkbox">
                                    <input type="checkbox" id="same_member" name="same_member" checked />
                                    <label for="same_member">同會員資料</a>
                                    </label>
                                </div>
                            </fieldset>
                            <form>
                                <ul class="personal">
                                    <!-- 送出必填未填寫會加上 class:required -->
                                    <li class="personal_data required">
                                        <label for="name">
                                            <div>姓名<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="name" name="username" placeholder="請輸入真實姓名" />
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
                                        <label for="phone">
                                            <div>手機<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="phone" name="phone" placeholder="請輸入手機號碼" />
                                        </div>
                                    </li>
                                    <li class="personal_data">
                                        <!-- 非必填會加上 class:optional -->
                                        <label for="tel" class="optional">
                                            <div>室內電話<span>必填</span></div>
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
                                            <span class="selector">
                                                <select class="county">
                                                </select>
                                                <select class="district2">
                                                </select>
                                            </span>
                                            <div class="input address">
                                                <input type="text" id="phone" name="phone" placeholder="請填寫地址" />
                                            </div>
                                        </div>
                                    </li>
                                    <li class="personal_data">
                                        <!-- 非必填會加上 class:optional -->
                                        <label for="note" class="optional">
                                            <div>備註<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="note" name="note" placeholder="請輸入備註" />
                                        </div>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div class="payment">
                            <div class="personal">
                                <div class="personal_col">
                                    <div class="personal_data">
                                        <label for="check">
                                            <div>付款方式<span>必填</span></div>
                                        </label>
                                        <fieldset>
                                            <div class="ckbutton">
                                                <input type="radio" id="card" name="pay" />
                                                <label for="card">信用卡付款</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="ATM" name="pay" />
                                                <label for="ATM">ATM虛擬代碼繳費</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="barcode" name="pay" />
                                                <label for="barcode">超商條碼</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="code" name="pay" />
                                                <label for="code">超商代碼</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="cash" name="pay" />
                                                <label for="cash">貨到付款</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="personal_data row">
                                        <label for="check">
                                            <div>分期期數<span>必填</span></div>
                                        </label>
                                        <fieldset>
                                            <div class="ckbutton">
                                                <input type="radio" id="once" name="card" />
                                                <label for="once">一次付清</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="three" name="card" />
                                                <label for="three">3期</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="six" name="card" />
                                                <label for="six">6期</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="twelve" name="card" />
                                                <label for="twelve">12期</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="personal_col">
                                    <div class="personal_data">
                                        <label for="check">
                                            <div>發票資訊<span>必填</span></div>
                                        </label>
                                        <fieldset>
                                            <div class="ckbutton">
                                                <input type="radio" id="cloud" name="bill" />
                                                <label for="cloud">雲端發票</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="double" name="bill" />
                                                <label for="double">紙本 - 二聯式發票</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="triple" name="bill" />
                                                <label for="triple">紙本 - 三聯式發票</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="personal_data row">
                                        <label for="check">
                                            <div>發票資訊<span>必填</span></div>
                                        </label>
                                        <div class="input cloud_num">
                                            <input type="text" id="cloud_num" name="cloud_num" placeholder="請輸入載具號碼" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <fieldset>
                                <div class="checkbox">
                                    <input type="checkbox" id="agree" name="agree" checked />
                                    <label for="agree">
                                        <span>我已詳細閱讀&ensp;
                                            <a href="./"><span> 基本保固條款</span></a>
                                            &ensp;及&ensp;
                                            <a href="./"><span>退換貨原則</span></a>，並同意接受內容所有款項規定</span>
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="btn_flex">
                            <a href="javascript:;" class="store_btn">
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
    <script src="dist/js/tw-city-selector.js"></script>
    <script src="dist/js/main.js"></script>
    <script src="dist/js/registration.js"></script>

</body>

</html>