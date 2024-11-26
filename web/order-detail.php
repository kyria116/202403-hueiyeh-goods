<?php
include "quote/template/head.php";
require_once("global_include_file.php");


if ($_COOKIE['member_userid'] == "") {
    print "<script>";
    print "location.href='login.php';";
    print "</script>";
    exit;
}

$order_id = $_GET['order_id'];

$info = array();
$where_clause = "member_userid = '" . AddSlashes($_COOKIE['member_userid']) . "' and is_confirm = '1' and Fmain_id = '" . AddSlashes($order_id) . "'";
$tbl_name = "sys_portal_y100";
get_data($tbl_name, $where_clause, $info);
// show_array($info);


$order_time_arr = array();
$order_time_arr = explode(" ", $info['order_complate_time']);
$order_date = str_replace("-", ".", $order_time_arr[0]);

/******************************
      優惠金額 => 滿件優惠或者滿額優惠
 *******************************/
$all_sale_money = (int)$info['sale_info_money'] + (int)$info['amount_sale_info_money'];

if ($info['use_bonus'] == "")
    $info['use_bonus'] = 0;


$order_cnt_info = array();
$where_clause = "portal_y100_id = '" . AddSlashes($info['Fmain_id']) . "' and is_addbuy = '2' order by Fmain_id asc";
$tbl_name = "sys_portal_y100_cnt";
getall_data($tbl_name, $where_clause, $order_cnt_info);
//    show_array($order_cnt_info);

?>
<link rel="stylesheet" href="dist/css/order-detail.css">
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
                                                <a href="member-profile.php">會員資料</a>
                                            </li>
                                            <li class="active">
                                                <a href="order.php">訂單紀錄</a>
                                            </li>
                                            <li>
                                                <a href="warranty-list.php">產品保固</a>
                                            </li>
                                            <li>
                                                <a href="coupon.php">我的折價券</a>
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
                    <div class="page_subtitle">訂單明細</div>
                    <ul class="top_title">
                        <li>
                            <div>訂單日期</div>
                            <div><?= $order_date ?></div>
                        </li>
                        <li>
                            <div>訂單編號</div>
                            <div><?= $info['order_num'] ?></div>
                        </li>
                        <li>
                            <div>訂單狀態</div>
                            <div><?= $info['pay_state'] ?></div>
                        </li>
                        <li>
                            <div>應付金額</div>
                            <div>$<?= number_format($info['sum_total']) ?></div>
                        </li>
                    </ul>
                    <ul class="form_title">
                        <li>購買產品</li>
                        <li></li>
                        <li>規格</li>
                        <li>數量</li>
                        <li>單價</li>
                        <li>小計</li>
                    </ul>
                    <div class="form_block_flex">
                        <?
                        $product_total = 0;
                        for ($i = 0; $i < count($order_cnt_info); $i++) {
                            $show_str = "";
                            if ($order_cnt_info[$i]['pic_file']) {
                                $pic_temp_arr = array();
                                $pic_temp_arr = explode(",", $order_cnt_info[$i]['pic_file']);

                                $pic_info = array();
                                $where_clause = "Fmain_id = '" . $pic_temp_arr[0] . "'";
                                $tbl_name = $MYSQL_TABS['sys_file'];
                                get_data($tbl_name, $where_clause, $pic_info);
                                //show_array($pic_info);

                                if ($pic_info['file_path'] != "")
                                    $show_str = "" . $global_website_url . "login_admin/upload_file/" . $pic_info['file_path'] . "";
                            }
                            if (!$show_str) {
                                $temp_info = array();
                                $where_clause = "Fmain_id = '" . $order_cnt_info[$i]['product_id'] . "'";
                                $tbl_name = "sys_portal_x100_cnt";
                                get_data($tbl_name, $where_clause, $temp_info);

                                if ($temp_info['pic_field_6'] != "") {
                                    $pic_temp_arr = array();
                                    $pic_temp_arr = explode(",", $temp_info['pic_field_6']);

                                    $pic_info = array();
                                    $where_clause = "Fmain_id = '" . $pic_temp_arr[0] . "'";
                                    $tbl_name = $MYSQL_TABS['sys_file'];
                                    get_data($tbl_name, $where_clause, $pic_info);
                                    //show_array($pic_info);

                                    if ($pic_info['file_path'] != "")
                                        $show_str = "" . $global_website_url . "login_admin/upload_file/" . $pic_info['file_path'] . "";
                                }
                            }


                            // 加購品
                            $order_addbuy_info = array();
                            $where_clause = "portal_y100_id = '" . AddSlashes($info['Fmain_id']) . "' and is_addbuy = '1' and s_product_id = '" . $order_cnt_info[$i]['product_id'] . "' order by  Fmain_id asc";
                            //                        print $where_clause;
                            $tbl_name = "sys_portal_y100_cnt";
                            getall_data($tbl_name, $where_clause, $order_addbuy_info);
                            // show_array($order_addbuy_info);

                        ?>
                            <div class="form_block">
                                <div class="form_item">
                                    <!-- 桌機:194 x 214 -->
                                    <!-- 手機:233 x 257 -->
                                    <div class="product_img"><img src="<?= $show_str ?>"></div>
                                    <div class="product_info_txt">
                                        <ul class="txt_1">
                                            <li class="product_num"><?= $order_cnt_info[$i]['product_num'] ?></li>
                                            <li class="product_title"><?= $order_cnt_info[$i]['product_name'] ?></li>
                                            <?
                                            $sale_amount_log_2_arr = explode("@@@", $order_info['sale_amount_log_1'] . "@@@" . $order_info['sale_amount_log_2']);    #滿件折扣log
                                            foreach ($sale_amount_log_2_arr as $sale_amount_log_2) {
                                                $sale_amount_log_1 = explode("`", $sale_amount_log_2);
                                                if ($sale_amount_log_1[2]) {
                                                    $if_print = 0;
                                                    if (substr_count($sale_amount_log_1[2], ",") >= 1) {
                                                        $product_id_arr = explode(",", $sale_amount_log_1[2]);
                                                        if (in_array($order_cnt_info[$i]['product_id'], $product_id_arr)) {
                                                            $if_print = 1;
                                                        }
                                                    } else if ($sale_amount_log_1[2] == $order_cnt_info[$i]['product_id']) {
                                                        $if_print = 1;
                                                    }
                                                    if ($if_print) {
                                            ?>
                                                        <li class="product_event_discounts"><?= $sale_amount_log_1[0] ?></li>
                                                    <?
                                                    }
                                                }
                                            }

                                            $sale_amount_log_2_arr = explode("@@@", $order_info['sale_money_log_1'] . "@@@" . $order_info['sale_money_log_2']);    #滿額折扣log
                                            foreach ($sale_amount_log_2_arr as $sale_amount_log_2) {
                                                $sale_amount_log_1 = explode("`", $sale_amount_log_2);
                                                if ($sale_amount_log_1[2]) {
                                                    $if_print = 0;
                                                    if (substr_count($sale_amount_log_1[2], ",") >= 1) {
                                                        $product_id_arr = explode(",", $sale_amount_log_1[2]);
                                                        if (in_array($order_cnt_info[$i]['product_id'], $product_id_arr)) {
                                                            $if_print = 1;
                                                        }
                                                    } else if ($sale_amount_log_1[2] == $order_cnt_info[$i]['product_id']) {
                                                        $if_print = 1;
                                                    }
                                                    if ($if_print) {
                                                    ?>
                                                        <li class="product_event_discounts"><?= $sale_amount_log_1[0] ?></li>
                                                <?
                                                    }
                                                }
                                            }

                                            #折價券log
                                            $product_id_arr = explode(",", $order_info['coupon_product_id']);
                                            if (in_array($order_cnt_info[$i]['product_id'], $product_id_arr)) {
                                                $if_print = 1;
                                            }
                                            if ($if_print) {
                                                ?>
                                                <li class="product_event_discounts"><?= $order_info['use_coupon'] ?></li>
                                            <?
                                            }

                                            #折扣碼log
                                            $product_id_arr = explode(",", $order_info['code_product_id']);
                                            if (in_array($order_cnt_info[$i]['product_id'], $product_id_arr)) {
                                                $if_print = 1;
                                            }
                                            ?>
                                            <li class="product_event_discounts" id="code_dv_<?= $order_cnt_info[$i]['Fmain_id'] ?>" class="factive"><?= (($if_print) ? $order_info['code_name'] : "") ?></li>
                                            <!--                                         <li class="product_event_discounts">父親節活動優惠88折</li> -->
                                        </ul>
                                        <ul class="txt_2">
                                            <li class="color">
                                                <div class="mo_title">規格</div>
                                                <div><?= $order_cnt_info[$i]['size_id_text'] ?></div>
                                            </li>
                                            <li class="quantity">
                                                <div class="mo_title">數量
                                                </div>
                                                <?= $order_cnt_info[$i]['amount'] ?>
                                            </li>
                                            <li class="price_1">
                                                <div class="mo_title">單價</div>
                                                $<?= number_format($order_cnt_info[$i]['price']) ?>
                                            </li>
                                            <li class="price_2">
                                                <div class="mo_title">小計</div>
                                                $<?= number_format($order_cnt_info[$i]['small_price']) ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- 加購商品加class:moreSth -->
                                <?
                                for ($j = 0; $j < count($order_addbuy_info); $j++) {
                                    $show_str = "";
                                    $pic_temp_arr = array();
                                    $pic_temp_arr = explode(",", $order_addbuy_info[$j]['pic_file']);

                                    $pic_info = array();
                                    $where_clause = "Fmain_id = '" . $pic_temp_arr[0] . "'";
                                    $tbl_name = $MYSQL_TABS['sys_file'];
                                    get_data($tbl_name, $where_clause, $pic_info);
                                    //show_array($pic_info);

                                    if ($pic_info['file_path'] != "")
                                        $show_str = "" . $global_website_url . "login_admin/upload_file/" . $pic_info['file_path'] . "";

                                ?>
                                    <div class="form_item moreSth">
                                        <div class="giveaway_img">
                                            <div class="add">
                                                <div class="title">加購商品</div>
                                                <!-- 桌機:100 x 111 -->
                                                <!-- 手機:170 x 187 -->
                                                <div class="img">
                                                    <img src="<?= $show_str ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="giveaway_info_txt">
                                            <ul class="giveaway_txt_1">
                                                <div class="giveaway_title"><?= $order_addbuy_info[$j]['product_name'] ?></div>
                                            </ul>
                                            <ul class="giveaway_txt_2">
                                                <li class="giveaway_color">
                                                </li>
                                                <li class="giveaway_quantity">
                                                </li>
                                                <li class="giveaway_price_1">
                                                    <div class="mo_title">單價</div>
                                                    $<?= number_format($order_addbuy_info[$j]['price']) ?>
                                                </li>
                                                <li class="giveaway_price_2">
                                                    <div class="mo_title">小計</div>
                                                    $<?= number_format($order_addbuy_info[$j]['small_price']) ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?
                                }
                                ?>

                                <?
                                if ($order_cnt_info[$i]['is_give'] == "1") {

                                    $give_num_arr = explode("`", $order_cnt_info[$i]['give_num']);
                                    $give_text_arr = explode("`", $order_cnt_info[$i]['give_text']);
                                    $give_text_pic_arr = explode("`", $order_cnt_info[$i]['give_text_pic']);

                                    foreach ($give_text_arr as $give_text_key => $give_text_val) {
                                        $show_str = "";
                                        $pic_temp_arr = array();
                                        $pic_temp_arr = explode(",", $give_text_pic_arr[$give_text_key]);

                                        $pic_info = array();
                                        $where_clause = "Fmain_id = '" . $pic_temp_arr[0] . "'";
                                        $tbl_name = $MYSQL_TABS['sys_file'];
                                        get_data($tbl_name, $where_clause, $pic_info);
                                        //show_array($pic_info);

                                        if ($pic_info['file_path'] != "")
                                            $show_str = "" . $global_website_url . "login_admin/upload_file/" . $pic_info['file_path'] . "";

                                        $j4_info = array();
                                        $where_clause = " text_field_2 = '" . $give_num_arr[$give_text_key] . "' ";
                                        $tbl_name = "sys_portal_j4";    //$MYSQL_TABS['portal_b2']
                                        get_data($tbl_name, $where_clause, $j4_info);

                                ?>
                                        <!-- 贈品加class:gift -->
                                        <div class="form_item gift">
                                            <div class="giveaway_img">
                                                <div class="add">
                                                    <div class="title">贈品</div>
                                                    <div class="img">
                                                        <!-- 桌機:100 x 111 -->
                                                        <!-- 手機:170 x 187 -->
                                                        <img src="<?= $show_str ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="giveaway_info_txt">
                                                <ul class="giveaway_txt_1">
                                                    <div class="giveaway_title">
                                                        <div class="title"><?= $give_text_val ?></div>
                                                        <?
                                                        if ($j4_info['text_field_3'] != "") {
                                                        ?>
                                                            <div class="market_price"><span>市價</span>$<?= number_format($j4_info['text_field_3']) ?></div>
                                                        <?
                                                        }
                                                        ?>
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
                                <?
                                    }
                                }
                                ?>
                            </div>
                        <?
                            $product_total = $product_total + $order_cnt_info[$i]['small_price'];
                        }
                        ?>
                    </div>
                    <div class="row_flex">
                        <ul class="discount">
                            <li class="mo_title">享用之優惠</li>
                            <li>
                                <div class="discount_item">使用積點</div>
                                <div><?= $info['use_bonus'] ?></div>
                            </li>
                            <li>
                                <div class="discount_item">使用折價券</div>
                                <div><?= $info['use_coupon'] ?></div>
                            </li>
                            <li>
                                <div class="discount_item">使用折扣碼</div>
                                <div><?= $info['use_code'] ?></div>
                            </li>
                            <li>
                                <div class="discount_item">優惠活動</div>
                                <div class="more_discount">
                                    <div>
                                        <?
                                        $log_arr = explode("<br>", $info['sale_info_log']);
                                        foreach ($log_arr as $log_key => $log_val) {
                                            $val_arr = explode("折抵", $log_val);
                                            if (substr_count($val_arr[0], "#333") >= 1) {
                                                #print "<font style='color:#333;'>".strip_tags($val_arr[0])."</font><br>";
                                            } else {
                                                print "" . strip_tags($val_arr[0]) . "<br>";
                                            }
                                            /*
			                                $new_val = "";
			                                for($r=0;$r<count($val_arr)-1;$r++){
				                                if($r>0)	$new_val .= "折抵";
				                                $new_val .= $val_arr[$r];
			                                }
			                                $log_arr[$log_key] = $new_val;
*/
                                        }
                                        #print implode ("<br>", $log_arr);
                                        ?>
                                    </div>
                                    <div>
                                        <?
                                        $log_arr = explode("<br>", $info['amount_sale_info_log']);
                                        foreach ($log_arr as $log_key => $log_val) {
                                            $val_arr = explode("折抵", $log_val);
                                            if (substr_count($val_arr[0], "#333") >= 1) {
                                                #print "<font style='color:#333;'>".strip_tags($val_arr[0])."</font><br>";
                                            } else {
                                                print "" . strip_tags($val_arr[0]) . "<br>";
                                            }
                                            /*
			                                $new_val = "";
			                                for($r=0;$r<count($val_arr)-1;$r++){
				                                if($r>0)	$new_val .= "折抵";
				                                $new_val .= $val_arr[$r];
			                                }
			                                $log_arr[$log_key] = $new_val;
*/
                                        }
                                        #print implode ("<br>", $log_arr);
                                        ?>
                                    </div>
                                    <!--                                     <div class="full">滿$10,000免運</div> -->
                                </div>
                            </li>
                        </ul>
                        <ul class="total">
                            <li>
                                <div>商品金額總計</div>
                                <div>$<?= number_format($product_total) ?></div>
                            </li>
                            <li>
                                <div>滿件優惠折抵</div>
                                <div>-$<?= number_format(($info['amount_sale_info_money']) ? $info['amount_sale_info_money'] : 0) ?></div>
                            </li>

                            <li>
                                <div>折價券折抵</div>
                                <div>-$<?= number_format(($info['coupon_money']) ? $info['coupon_money'] : 0) ?></div>
                            </li>
                            <li>
                                <div>折扣碼折抵</div>
                                <div>-$<?= number_format(($info['code_money']) ? $info['code_money'] : 0) ?></div>
                            </li>
                            <li>
                                <div>滿額優惠折抵</div>
                                <div>-$<?= number_format(($info['sale_info_money']) ? $info['sale_info_money'] : 0) ?></div>
                            </li>
                            <li>
                                <div>積點折抵</div>
                                <div>-<?= number_format(($info['use_bonus']) ? $info['use_bonus'] : 0) ?></div>
                            </li>
                            <li>
                                <div>運費</div>
                                <div>$<?= number_format($info['traffic_money']) ?></div>
                            </li>
                            <li>
                                <div class="total_price_title">應付金額</div>
                                <div class="total_price">$<?= number_format($info['sum_total']) ?></div>
                            </li>
                        </ul>
                    </div>
                    <div class="recipient">
                        <div class="recipient_title">收件人資料</div>
                        <div class="recipient_info">
                            <ul class="info_block">
                                <li>
                                    <div>姓名</div>
                                    <div><?= $info['send_man'] ?></div>
                                </li>
                                <li>
                                    <div>手機</div>
                                    <div><?= $info['send_handphone'] ?></div>
                                </li>
                                <li>
                                    <div>E-mail</div>
                                    <div><?= $info['send_email'] ?></div>
                                </li>
                                <li>
                                    <div>室內電話</div>
                                    <div><?= (($info['recipient_tel']) ? $info['recipient_tel'] . "-" : "") ?><?= $info['send_tel'] ?></div>
                                </li>
                                <li>
                                    <div>地址</div>
                                    <div><?= $info['send_city'] ?><?= $info['send_area'] ?><?= $info['send_address'] ?></div>
                                </li>
                            </ul>
                            <ul class="info_block">
                                <li>
                                    <div>備註</div>
                                    <div><?= $info['send_note'] ?></div>
                                </li>
                                <li>
                                    <div>付款方式</div>
                                    <div>
                                        <?= $info['pay_type'] ?>
                                        <?
                                        if ($info['pay_type'] == "信用卡付款") {
                                            if ($info['credit_card_split'] != "一次") {
                                        ?>
                                                (<?= $info['credit_card_split'] ?>期)
                                        <?
                                            }
                                        }
                                        ?>
                                        <?
                                        if ($info['pay_type'] == "超商條碼") {
                                        ?>
                                            <iframe src="https://www.hueiyeh.com.tw/login_admin/print_code.php?id=<?= $info['Fmain_id'] ?>" name="mainframe" width="100%" marginwidth="0" marginheight="0" onload="Javascript:SetCwinHeight()" scrolling="No" frameborder="0" id="mainframe"></iframe>

                                            <script type="text/javascript">
                                                function SetCwinHeight() {
                                                    var iframeid = document.getElementById("mainframe"); //iframe id
                                                    if (document.getElementById) {
                                                        if (iframeid && !window.opera) {
                                                            if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight) {
                                                                iframeid.height = iframeid.contentDocument.body.offsetHeight;
                                                            } else if (iframeid.Document && iframeid.Document.body.scrollHeight) {
                                                                iframeid.height = iframeid.Document.body.scrollHeight;
                                                            }
                                                        }
                                                    }
                                                }
                                            </script>
                                        <?
                                        }
                                        ?>
                                        <?
                                        if ($info['pay_type'] == "ATM繳費" or $info['pay_type'] == "超商代碼") {
                                        ?>
                                            <div>
                                                <?
                                                if ($info['pay_type'] == "超商代碼") {
                                                ?>
                                                    <?= $info['PaymentNo'] ?>
                                                <?
                                                }
                                                ?>

                                                <?
                                                if ($info['pay_type'] == "ATM繳費") {
                                                ?>
                                                    <div style="padding-top:10px">
                                                        銀行：<?= $info['vmatm_bankname'] ?><br>
                                                        代碼：<?= $info['vmatm_bankcode'] ?><br>
                                                        帳號：<?= $info['vmatm_account'] ?></div>
                                                <?
                                                }
                                                ?>
                                            </div>
                                        <?
                                        }
                                        ?>
                                    </div>
                                </li>
                                <li>
                                    <div>發票資訊</div>
                                    <ul class="cloud">
                                        <li><?= $info['invoice_type'] ?></li>
                                        <?
                                        if ($info['cloud_num']) {
                                        ?>
                                            <li>載具 <?= $info['cloud_num'] ?></li>
                                        <?
                                        }
                                        ?>
                                        <?
                                        if ($info['invoice_num']) {
                                        ?>
                                            <li><?= $info['invoice_num'] ?> <?= (($info['invoice_time']) ? " (" . $info['invoice_time'] . "開立)" : "") ?></li>
                                        <?
                                        }
                                        ?>

                                        <?
                                        if ($info['invoice_type'] == "三聯式") {
                                        ?>
                                            <li>公司抬頭 <?= $info['invoice_title'] ?></li>
                                            <li>公司統編 <?= $info['unification_num'] ?></li>
                                        <?
                                        }
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="btn_flex">
                        <a href="order.php" class="store_btn">
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
    <script src="dist/js/main.js"></script>
</body>

</html>