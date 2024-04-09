    <?php include "quote/template/head.php"; ?>
    <link rel="stylesheet" href="dist/css/service.css">
</head>

<body class="lang_tw">
    <!-- 產品序號 start -->
    <div class="modalBgProduct" id="modalBgProduct" style="display: none">
        <div class="popupProduct" id="popupProduct">
            <div class="modal-content">
                <div class="popupTitleWarranty">
                    保固登錄產品序號位置示意圖
                    <span>(靠近電線或是商品底座下方)</span>
                </div>
                <div class="imgWarranty">
                    <img src="dist/images/page/warranty.jpg" alt="">
                </div>
            </div>
            <div class="closeIcon">
                <img src="dist/images/productPage/close-bt.png">
            </div>
        </div>
    </div>
    <!-- 產品序號 end -->
    <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
    ?>
    <main class="warrantyPage">
        <div class="kvTitle">
            <div class="container">
                <div class="enTitle">SERVICE</div>
                <div class="twTitle">會員服務</div>
            </div>
        </div>
        <div class="pageImg">
            <img src="dist/images/page/service.png" alt="">
        </div>
        <div class="sort">
            <div class="container">
                <div id="top-menu-ul-2" class="top-menu-ul-2">
                    <div class="item_Menu">
                        <div class="item_menu_Box">
                            <ul class="item_menu_list slides">
                                <li class="active">
                                    <a href="javascript:;">產品保固</a>
                                </li> 
                                <li>
                                    <a href="repair.php">產品維修</a>
                                </li>
                                <li>
                                    <a href="faq.php">常見問題</a>
                                </li>
                                <li>
                                    <a href="points.php">會員積點</a>
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
        <div class="content">
            <div class="container">
                <div class="topBox">
                    <!-- 如果沒有填寫，則增加req -->
                    <div class="leftBox">
                        <div class="m_title"><span>*</span>品牌分類<b>必填</b></div>
                        <select name="" id="">
                            <option value="">請選擇品牌</option>
                            <option value="">品牌1</option>
                            <option value="">品牌2</option>
                        </select>
                    </div>
                    <div class="rightBox">
                        <!-- 如果沒有填寫，則增加req -->
                        <div class="product">
                            <div class="m_title"><span>*</span>購買產品 <a href="javascript:;">產品序號<i></i></a><b>必填</b></div>
                            <div class="box">
                                <div class="flex">
                                    <select name="" id="" class="select_1">
                                        <option value="">請選擇購買產品</option>
                                        <option value="">品牌1</option>
                                        <option value="">品牌2</option>
                                    </select>
                                    <!-- 刪除的程式碼在L170 -->
                                    <div class="inputDel">
                                        <input type="text" name="" id="" placeholder="請輸入產品序號">
                                        <a href="javascript:;"></a>
                                    </div>
                                </div>
                            </div>
                            <!-- 新增的程式碼在L181 -->
                            <a href="javascript:;" class="addProduct">
                                <span></span>
                                新增產品
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bottomBox">
                    <div class="leftBox">
                        <!-- 如果沒有填寫，則增加req -->
                        <div>
                            <div class="m_title"><span>*</span>購買日期<b>必填</b></div>
                            <input type="date" name="" id="">
                        </div>

                        <!-- 如果沒有填寫，則增加req -->
                        <div>
                            <div class="m_title"><span>*</span>購買通路<b>必填</b></div>
                            <ul class="radio">
                                <li>
                                    <input type="radio" name="radio" id="store" checked>
                                    <label for="store">實體門市</label>
                                </li>
                                <li>
                                    <input type="radio" name="radio" id="website">
                                    <label for="website">網路平台/官網</label>
                                </li>
                                <li>
                                    <input type="radio" name="radio" id="tvshop">
                                    <label for="tvshop">電視購物</label>
                                </li>
                                <li>
                                    <input type="radio" name="radio" id="other">
                                    <label for="other">其他</label>
                                </li>
                            </ul>
                            <!-- 顯示內容程式碼，請見L191 -->
                            <select name="" id="storeSelect">
                                <option value="">請選擇實體門市</option>
                                <option value="">門市1</option>
                                <option value="">門市2</option>
                            </select>
                            <!-- 當選擇其他選項選項的時候才會顯示 -->
                            <input type="text" name="" id="otherTxt" placeholder="請輸入其他" style="display: none">
                        </div>

                        <!-- 如果沒有填寫，則增加req -->
                        <div class="req">
                            <div class="m_title"><span>*</span>訂單編號 / 發票號碼<b>必填</b></div>
                            <input type="text" name="" id="" placeholder="請輸入訂單編號 / 發票號碼 二擇一">
                        </div>
                    </div>
                    <div class="rightBox">
                        <div class="m_title">其他建議</div>
                        <textarea name="" id="" cols="30" rows="10" placeholder="請輸入建議內容"></textarea>
                    </div>
                </div>
                <div class="backBtn">
                    <a href="javascript:;">送出</a>
                </div>
            </div>
        </div>
    </main>
    <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>  
    <script src="dist/js/chosen.jquery.min.js"></script>  
    <script>
        
        //刪除產品序號
        $('body').on('click', '.inputDel a', function () {
            $(this).parent().parent().remove()
        });

        $(window).on('resize', function () {
            $('.select_1').chosen();
        });

        $('.select_1').chosen();

        //增加產品序號
        $('.addProduct').on('click', function () {
            $('.select_1').chosen('destroy')
            $('.topBox .rightBox .box >div:nth-child(1)').clone().appendTo('.box')
            $('.select_1').chosen();
            $('.chosen-single').css('color', '#000')
        });

        let $idAry = [
            ['請選擇實體門市','門市1','門市2'],
            ['請選擇網路平台/官網','網路平台','官網'], 
            ['請選擇電視購物','東森','寰宇']
        ]

        let $idNum
        let $idStr = ``
        function radioChange(){
            $('input[name="radio"]').each(function(i){
                if($(this).prop('checked')){
                    $idNum = i
                    if(i == 3){
                        $('#otherTxt').css('display', 'block')
                        $('#storeSelect').css('display', 'none')
                    }else{
                        $('#otherTxt').css('display', 'none')
                        $('#storeSelect').css('display', 'block')
                        $idStr = ``
                        for(let i=0; i<$idAry[$idNum].length; i++){
                            $idStr += `<option value="">${$idAry[$idNum][i]}</option>`
                        }
                        $('#storeSelect').html($idStr)
                    }
                }
            })
        }
        radioChange()
        $('input[name="radio"]').on('change', function () {
            radioChange()
        });

    </script>
    <script src="dist/js/warranty.js"></script>  
</body>

</html>