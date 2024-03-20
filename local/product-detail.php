    <?php include "quote/template/head.php"; ?>
    <link rel="stylesheet" href="dist/css/product-detail.css">
</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
    ?>
    <main class="productDetailPage">
        <div class="fixedBuy">
            <div class="fixedLeft">
                <div class="img"><img src="dist/images/productPage/product_1.jpg" alt=""></div>
                <div class="txt">
                    <div class="fixedTitle"><i>伸波眠按摩床墊</i><span>迷霧黑</span></div>
                    <div class="price">
                        <span class="specialOffer">$6,922</span>
                        <span class="originalPrice">$6,600</span>
                    </div>
                </div>
            </div>
            <div class="fixedRight">
                <a href="javascript:;">
                    <div class="cartIcon"></div>
                    <span>加入購物車</span>
                </a>
            </div>
        </div>
        <div class="productBox">
            <div class="container">
                <div class="productBoxSwiper">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="dist/images/productPage/product_1.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="dist/images/productPage/product_1.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="dist/images/productPage/product_1.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="dist/images/productPage/product_1.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="dist/images/productPage/product_1.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="dist/images/productPage/product_1.jpg" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="buyBox"></div>
        <div class="addBox">
            <div class="container">
                <p>加購商品</p>
                <div class="addBoxSwiper">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <input type="checkbox" name="" id="product1">
                                <label for="product1">
                                    <div class="img">
                                        <img src="dist/images/productPage/product_1.jpg" alt="">
                                    </div>
                                    <div class="txt">
                                        <div class="proName">
                                            <span>伸波眠按摩床墊</span>
                                        </div>
                                        <div class="price">
                                            <span class="priceTxt">加購價</span>
                                            <span class="specialOffer">$36,922</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="swiper-slide">
                                <input type="checkbox" name="" id="product2">
                                <label for="product2">
                                    <div class="img">
                                        <img src="dist/images/productPage/product_1.jpg" alt="">
                                    </div>
                                    <div class="txt">
                                        <div class="proName">
                                            <span>伸波眠按摩床墊</span>
                                        </div>
                                        <div class="price">
                                            <span class="priceTxt">加購價</span>
                                            <span class="specialOffer">$36,922</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="swiper-slide">
                                <input type="checkbox" name="" id="product3">
                                <label for="product3">
                                    <div class="img">
                                        <img src="dist/images/productPage/product_1.jpg" alt="">
                                    </div>
                                    <div class="txt">
                                        <div class="proName">
                                            <span>伸波眠按摩床墊</span>
                                        </div>
                                        <div class="price">
                                            <span class="priceTxt">加購價</span>
                                            <span class="specialOffer">$36,922</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="swiper-slide">
                                <input type="checkbox" name="" id="product4">
                                <label for="product4">
                                    <div class="img">
                                        <img src="dist/images/productPage/product_1.jpg" alt="">
                                    </div>
                                    <div class="txt">
                                        <div class="proName">
                                            <span>伸波眠按摩床墊</span>
                                        </div>
                                        <div class="price">
                                            <span class="priceTxt">加購價</span>
                                            <span class="specialOffer">$36,922</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="swiperBtn">
                        <div class="addBoxSwiper-prev"></div>
                        <div class="addBoxSwiper-next"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="infoBox">
            <div class="container">
                <ul class="proMenu">
                    <li><a href="javascript:;">產品介紹</a></li>
                    <li class="active"><a href="javascript:;">產品規格</a></li>
                </ul>
                <ul class="infoPage">
                    <!-- 產品介紹 內容 -->
                    <li style="display: none;">
                        <div class="editor_Content">
                            <div class="editor_box pc_use">
                                <img src="dist/images/productPage/page_kv.jpg" alt="">
                            </div>
                            <div class="editor_box mo_use">
                                <img src="dist/images/productPage/page_kv.jpg" alt="">
                            </div>
                        </div>
                    </li>

                    <!-- 產品規格 內容 -->
                    <li>
                        <!-- 如果沒有寫內容，就刪除li -->
                        <ul class="specificationList">
                            <li>
                                <div class="infoTitle">商品名稱</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">噪音值</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">商品型號</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">標準配件</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">額定電壓</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">冷風功率</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">額定功率</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">遙控器電池</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">商品淨重</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">產品顏色</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">商品毛重</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">負離子</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">商品尺寸</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">供電方式</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">商品尺寸(直立)</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">加熱時間</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">商品尺寸(傾躺)</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">手持重量</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">承重</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">集塵盒容量</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">保固</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">容量</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">BSMI</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">機身材質</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">NCC</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">電源</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">電池容量</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">充電時間</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">自動定時</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">產地</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">材質</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">耐熱溫度</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">頻率</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">使用年齡</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">震幅</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">有機認證</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">額定頻率</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">保存期限</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">除濕力</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">支援系統</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">水箱容量</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">適用機型</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">線長</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">容量</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">適用坪數</div>
                                <div class="infoContent"></div>
                            </li>
                            <li>
                                <div class="infoTitle">工作濕度</div>
                                <div class="infoContent"></div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="likeBox">
            <div class="container">
                <h3>你可能會喜歡</h3>
                <div class="likeSwiper mask">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="javascript:;">
                                    <div class="icon">
                                        <!-- 
                                            icon共有4張 
                                            icon_1  NEW
                                            icon_2  HOT
                                            icon_3  SALE
                                            icon_4  預購
                                        -->
                                        <img src="dist/images/common/icon_1.png" alt="">
                                    </div>
                                    <div class="img">
                                        <div class="svg">
                                            <svg viewBox="0 0 376 414" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 0.5H370C373.038 0.5 375.5 2.96244 375.5 6V408C375.5 411.038 373.038 413.5 370 413.5H6.00001C2.96244 413.5 0.5 411.038 0.5 408V6C0.5 2.96243 2.96243 0.5 6 0.5Z"/>
                                            </svg>
                                        </div>
                                        <!-- 376 * 414 -->

                                        <!-- 預設顯示第一張圖 -->
                                        <img src="dist/images/productPage/product_max_1.jpg" alt="" class="defaultImg">
                                        <!-- hover後顯示的照片 -->
                                        <img src="dist/images/productPage/product_1.jpg" alt="" class="hoverImg">
                                    </div>
                                    <div class="txt">
                                        <div class="proId">HY-950-GY</div>
                                        <div class="proName">
                                            <span>伸波眠按摩床墊</span>
                                        </div>
                                        <div class="price">
                                            <span class="originalPrice">$6,600</span>
                                            <i>｜</i>
                                            <span class="specialOffer">$6,922</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;">
                                    <div class="icon">
                                        <!-- 
                                            icon共有4張 
                                            icon_1  NEW
                                            icon_2  HOT
                                            icon_3  SALE
                                            icon_4  預購
                                        -->
                                        <img src="dist/images/common/icon_1.png" alt="">
                                    </div>
                                    <div class="img">
                                        <div class="svg">
                                            <svg viewBox="0 0 376 414" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 0.5H370C373.038 0.5 375.5 2.96244 375.5 6V408C375.5 411.038 373.038 413.5 370 413.5H6.00001C2.96244 413.5 0.5 411.038 0.5 408V6C0.5 2.96243 2.96243 0.5 6 0.5Z"/>
                                            </svg>
                                        </div>
                                        <!-- 376 * 414 -->

                                        <!-- 預設顯示第一張圖 -->
                                        <img src="dist/images/productPage/product_max_1.jpg" alt="" class="defaultImg">
                                        <!-- hover後顯示的照片 -->
                                        <img src="dist/images/productPage/product_1.jpg" alt="" class="hoverImg">
                                    </div>
                                    <div class="txt">
                                        <div class="proId">HY-950-GY</div>
                                        <div class="proName">
                                            <span>伸波眠按摩床墊</span>
                                        </div>
                                        <div class="price">
                                            <span class="originalPrice">$6,600</span>
                                            <i>｜</i>
                                            <span class="specialOffer">$6,922</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;">
                                    <div class="icon">
                                        <!-- 
                                            icon共有4張 
                                            icon_1  NEW
                                            icon_2  HOT
                                            icon_3  SALE
                                            icon_4  預購
                                        -->
                                        <img src="dist/images/common/icon_1.png" alt="">
                                    </div>
                                    <div class="img">
                                        <div class="svg">
                                            <svg viewBox="0 0 376 414" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 0.5H370C373.038 0.5 375.5 2.96244 375.5 6V408C375.5 411.038 373.038 413.5 370 413.5H6.00001C2.96244 413.5 0.5 411.038 0.5 408V6C0.5 2.96243 2.96243 0.5 6 0.5Z"/>
                                            </svg>
                                        </div>
                                        <!-- 376 * 414 -->

                                        <!-- 預設顯示第一張圖 -->
                                        <img src="dist/images/productPage/product_max_1.jpg" alt="" class="defaultImg">
                                        <!-- hover後顯示的照片 -->
                                        <img src="dist/images/productPage/product_1.jpg" alt="" class="hoverImg">
                                    </div>
                                    <div class="txt">
                                        <div class="proId">HY-950-GY</div>
                                        <div class="proName">
                                            <span>伸波眠按摩床墊</span>
                                        </div>
                                        <div class="price">
                                            <span class="originalPrice">$6,600</span>
                                            <i>｜</i>
                                            <span class="specialOffer">$6,922</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;">
                                    <div class="icon">
                                        <!-- 
                                            icon共有4張 
                                            icon_1  NEW
                                            icon_2  HOT
                                            icon_3  SALE
                                            icon_4  預購
                                        -->
                                        <img src="dist/images/common/icon_1.png" alt="">
                                    </div>
                                    <div class="img">
                                        <div class="svg">
                                            <svg viewBox="0 0 376 414" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 0.5H370C373.038 0.5 375.5 2.96244 375.5 6V408C375.5 411.038 373.038 413.5 370 413.5H6.00001C2.96244 413.5 0.5 411.038 0.5 408V6C0.5 2.96243 2.96243 0.5 6 0.5Z"/>
                                            </svg>
                                        </div>
                                        <!-- 376 * 414 -->

                                        <!-- 預設顯示第一張圖 -->
                                        <img src="dist/images/productPage/product_max_1.jpg" alt="" class="defaultImg">
                                        <!-- hover後顯示的照片 -->
                                        <img src="dist/images/productPage/product_1.jpg" alt="" class="hoverImg">
                                    </div>
                                    <div class="txt">
                                        <div class="proId">HY-950-GY</div>
                                        <div class="proName">
                                            <span>伸波眠按摩床墊</span>
                                        </div>
                                        <div class="price">
                                            <span class="originalPrice">$6,600</span>
                                            <i>｜</i>
                                            <span class="specialOffer">$6,922</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;">
                                    <div class="icon">
                                        <!-- 
                                            icon共有4張 
                                            icon_1  NEW
                                            icon_2  HOT
                                            icon_3  SALE
                                            icon_4  預購
                                        -->
                                        <img src="dist/images/common/icon_1.png" alt="">
                                    </div>
                                    <div class="img">
                                        <div class="svg">
                                            <svg viewBox="0 0 376 414" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 0.5H370C373.038 0.5 375.5 2.96244 375.5 6V408C375.5 411.038 373.038 413.5 370 413.5H6.00001C2.96244 413.5 0.5 411.038 0.5 408V6C0.5 2.96243 2.96243 0.5 6 0.5Z"/>
                                            </svg>
                                        </div>
                                        <!-- 376 * 414 -->

                                        <!-- 預設顯示第一張圖 -->
                                        <img src="dist/images/productPage/product_max_1.jpg" alt="" class="defaultImg">
                                        <!-- hover後顯示的照片 -->
                                        <img src="dist/images/productPage/product_1.jpg" alt="" class="hoverImg">
                                    </div>
                                    <div class="txt">
                                        <div class="proId">HY-950-GY</div>
                                        <div class="proName">
                                            <span>伸波眠按摩床墊</span>
                                        </div>
                                        <div class="price">
                                            <span class="originalPrice">$6,600</span>
                                            <i>｜</i>
                                            <span class="specialOffer">$6,922</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;">
                                    <div class="icon">
                                        <!-- 
                                            icon共有4張 
                                            icon_1  NEW
                                            icon_2  HOT
                                            icon_3  SALE
                                            icon_4  預購
                                        -->
                                        <img src="dist/images/common/icon_1.png" alt="">
                                    </div>
                                    <div class="img">
                                        <div class="svg">
                                            <svg viewBox="0 0 376 414" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 0.5H370C373.038 0.5 375.5 2.96244 375.5 6V408C375.5 411.038 373.038 413.5 370 413.5H6.00001C2.96244 413.5 0.5 411.038 0.5 408V6C0.5 2.96243 2.96243 0.5 6 0.5Z"/>
                                            </svg>
                                        </div>
                                        <!-- 376 * 414 -->

                                        <!-- 預設顯示第一張圖 -->
                                        <img src="dist/images/productPage/product_max_1.jpg" alt="" class="defaultImg">
                                        <!-- hover後顯示的照片 -->
                                        <img src="dist/images/productPage/product_1.jpg" alt="" class="hoverImg">
                                    </div>
                                    <div class="txt">
                                        <div class="proId">HY-950-GY</div>
                                        <div class="proName">
                                            <span>伸波眠按摩床墊</span>
                                        </div>
                                        <div class="price">
                                            <span class="originalPrice">$6,600</span>
                                            <i>｜</i>
                                            <span class="specialOffer">$6,922</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;">
                                    <div class="icon">
                                        <!-- 
                                            icon共有4張 
                                            icon_1  NEW
                                            icon_2  HOT
                                            icon_3  SALE
                                            icon_4  預購
                                        -->
                                        <img src="dist/images/common/icon_1.png" alt="">
                                    </div>
                                    <div class="img">
                                        <div class="svg">
                                            <svg viewBox="0 0 376 414" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 0.5H370C373.038 0.5 375.5 2.96244 375.5 6V408C375.5 411.038 373.038 413.5 370 413.5H6.00001C2.96244 413.5 0.5 411.038 0.5 408V6C0.5 2.96243 2.96243 0.5 6 0.5Z"/>
                                            </svg>
                                        </div>
                                        <!-- 376 * 414 -->

                                        <!-- 預設顯示第一張圖 -->
                                        <img src="dist/images/productPage/product_max_1.jpg" alt="" class="defaultImg">
                                        <!-- hover後顯示的照片 -->
                                        <img src="dist/images/productPage/product_1.jpg" alt="" class="hoverImg">
                                    </div>
                                    <div class="txt">
                                        <div class="proId">HY-950-GY</div>
                                        <div class="proName">
                                            <span>伸波眠按摩床墊</span>
                                        </div>
                                        <div class="price">
                                            <span class="originalPrice">$6,600</span>
                                            <i>｜</i>
                                            <span class="specialOffer">$6,922</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiperBtn">
                        <div class="likeSwiper-prev"></div>
                        <div class="likeSwiper-next"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="backBtn">
            <a href="javascript:history.go(-1);">返回</a>
        </div>
    </main>
    <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>
    <script src="dist/js/product-detail.js"></script>
</body>

</html>