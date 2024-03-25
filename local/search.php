    <?php include "quote/template/head.php"; ?>
    <link rel="stylesheet" href="dist/css/searchPage.css">
</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
    ?>
    <main class="searchPage">
        <div class="kvTitle">
            <div class="container">
                <div class="enTitle">SEARCH</div>
                <div class="twTitle">搜尋結果</div>
            </div>
        </div>
        <div class="container">
            <div class="searchPageBox">
                <div class="inputBox">
                    <input type="text" name="" id="" placeholder="請輸入商品名稱、型號等關鍵字">
                    <a href="javascript:;"></a>
                </div>
            </div>
        </div>
        <div class="tagMenuBox container">
            <div id="top-menu-ul-2" class="top-menu-ul-2">
                <div class="item_Menu">
                    <div class="item_menu_Box">
                        <ul class="item_menu_list slides">
                            <li class="active">
                                <a href="javascript:;">品牌產品</a>
                            </li>
                            <li>
                                <a href="javascript:;">品牌消息</a>
                            </li>
                            <li>
                                <a href="javascript:;">常見問題</a>
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
        <div class="searchAllBox">
            <div class="container">
                <ul class="box">
                    <!-- 品牌產品 -->
                    <li class="productBox">
                        <!-- 查無結果 -->
                        <div class="noResult" style="display: none">
                            查無搜尋內容
                        </div>

                        <div class="content">
                            <ul>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                            <img src="dist/images/productPage/product_1.jpg" alt="" class="defaultImg">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                                <li>
                                    <a href="product-detail.php">
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
                                </li>
                            </ul>
                            <?php
                                include "quote/template/page_list.php";
                            ?>
                        </div>
                    </li>

                    <!-- 品牌消息 -->
                    <li class="newsBox" style="display: none">
                        <!-- 查無結果 -->
                        <div class="noResult" style="display: none">
                            查無搜尋內容
                        </div>

                        <div class="content">
                            <!-- 702 * 414 -->
                            <ul>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="news-detail.php">
                                        <div class="img">
                                            <img src="dist/images/page/news.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="tagDate">
                                                <span class="date">2023.11.11</span>
                                                <span class="tags">優惠活動</span>
                                            </div>
                                            <div class="newsTitle">
                                                <span>AnyMasaG 按你馬殺機－從肩頸 鬆到你心底</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <?php
                                include "quote/template/page_list.php";
                            ?>
                        </div>
                    </li>

                    <!-- 常見問題 -->
                    <li class="qustionBox" style="display: none">
                        <!-- 查無結果 -->
                        <div class="noResult" style="display: none">
                            查無搜尋內容
                        </div>
                        
                        <div class="content">
                            <ul class="faqBox">
                                <li class="faqLi">
                                    <div class="b_title">購買相關</div>
                                    <ul>
                                        <li class="faqList">
                                            <a href="javascript:;">請問哪裡可以試用體驗?</a>
                                            <div class="txt">
                                                <div class="editor_Content">
                                                    <div class="editor_box pc_use">
                                                        <!-- <img src="dist/images/banner_1.jpg" alt="">
                                                        <p>pcpcpcpcpcpcppcpcpc</p> -->
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <!-- <ul>
                                                            <li>123</li>
                                                            <li>456</li>
                                                        </ul> -->
                                                    </div>
                                                    <div class="editor_box mo_use">
                                                        <!-- <img src="dist/images/banner_2.jpg" alt="">
                                                        <p>momomomomomomom</p> -->
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>  
                                                        <!-- <ul>
                                                            <li>123</li>
                                                            <li>456</li>
                                                        </ul> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="faqList">
                                            <a href="javascript:;">請問哪裡可以試用體驗?</a>
                                            <div class="txt">
                                                <div class="editor_Content">
                                                    <div class="editor_box pc_use">
                                                        <!-- <img src="dist/images/banner_1.jpg" alt="">
                                                        <p>pcpcpcpcpcpcppcpcpc</p> -->
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <!-- <ul>
                                                            <li>123</li>
                                                            <li>456</li>
                                                        </ul> -->
                                                    </div>
                                                    <div class="editor_box mo_use">
                                                        <!-- <img src="dist/images/banner_2.jpg" alt="">
                                                        <p>momomomomomomom</p> -->
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>  
                                                        <!-- <ul>
                                                            <li>123</li>
                                                            <li>456</li>
                                                        </ul> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="faqList">
                                            <a href="javascript:;">請問哪裡可以試用體驗?</a>
                                            <div class="txt">
                                                <div class="editor_Content">
                                                    <div class="editor_box pc_use">
                                                        <!-- <img src="dist/images/banner_1.jpg" alt="">
                                                        <p>pcpcpcpcpcpcppcpcpc</p> -->
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <!-- <ul>
                                                            <li>123</li>
                                                            <li>456</li>
                                                        </ul> -->
                                                    </div>
                                                    <div class="editor_box mo_use">
                                                        <!-- <img src="dist/images/banner_2.jpg" alt="">
                                                        <p>momomomomomomom</p> -->
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>  
                                                        <!-- <ul>
                                                            <li>123</li>
                                                            <li>456</li>
                                                        </ul> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="faqBox">
                                <li class="faqLi">
                                    <div class="b_title">配送相關</div>
                                    <ul>
                                        <li class="faqList">
                                            <a href="javascript:;">請問哪裡可以試用體驗?</a>
                                            <div class="txt">
                                                <div class="editor_Content">
                                                    <div class="editor_box pc_use">
                                                        <!-- <img src="dist/images/banner_1.jpg" alt="">
                                                        <p>pcpcpcpcpcpcppcpcpc</p> -->
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <!-- <ul>
                                                            <li>123</li>
                                                            <li>456</li>
                                                        </ul> -->
                                                    </div>
                                                    <div class="editor_box mo_use">
                                                        <!-- <img src="dist/images/banner_2.jpg" alt="">
                                                        <p>momomomomomomom</p> -->
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>  
                                                        <!-- <ul>
                                                            <li>123</li>
                                                            <li>456</li>
                                                        </ul> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="faqBox">
                                <li class="faqLi">
                                    <div class="b_title">售後服務</div>
                                    <ul>
                                        <li class="faqList">
                                            <a href="javascript:;">請問哪裡可以試用體驗?</a>
                                            <div class="txt">
                                                <div class="editor_Content">
                                                    <div class="editor_box pc_use">
                                                        <!-- <img src="dist/images/banner_1.jpg" alt="">
                                                        <p>pcpcpcpcpcpcppcpcpc</p> -->
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <!-- <ul>
                                                            <li>123</li>
                                                            <li>456</li>
                                                        </ul> -->
                                                    </div>
                                                    <div class="editor_box mo_use">
                                                        <!-- <img src="dist/images/banner_2.jpg" alt="">
                                                        <p>momomomomomomom</p> -->
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>
                                                        <p>臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助-無風管空氣調節機、接風管空氣調節機照明燈具及室內停車場智慧照明申請臺北市服務業汰換節能設備補助</p>  
                                                        <!-- <ul>
                                                            <li>123</li>
                                                            <li>456</li>
                                                        </ul> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>  
    <script src="dist/js/product.js"></script>  
    <script src="dist/js/search.js"></script>  
</body>

</html>