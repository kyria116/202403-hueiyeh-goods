<?php
include "quote/template/head.php";
require_once("global_include_file.php");


if ($_COOKIE['lang_id'] == "3") { //英文版
    $lang_id = 3;
    $lang_str = "lang_en";
} else {
    $lang_id = 1;
    $lang_str = "lang_tw";
}


$all_product_info = array();
$where_clause = "1 order by rank desc";
$tbl_name = "sys_portal_x100";
getall_data($tbl_name, $where_clause, $all_product_info);
// show_array($all_product_info);

$slide_info = array();
$where_clause = "is_hide != '1' and sys_start_date <= '" . date("Y-m-d") . "' and sys_end_date >= '" . date("Y-m-d") . "' order by rank desc";
$tbl_name = "sys_portal_k3";
getall_data($tbl_name, $where_clause, $slide_info);
// show_array($slide_info); // text_field_0 pic_field_1 text_field_2  //text_field_3  pic_field_4 text_field_5

$text_info = array();
$where_clause = "1 order by rank desc";
$tbl_name = "sys_portal_k8";
getall_data($tbl_name, $where_clause, $text_info);
?>
<link rel="stylesheet" href="dist/css/index.css">
</head>

<body class="<?= $lang_str ?>">
    <?php
    include "quote/template/nav.php";
    include "quote/template/popup.php";
    ?>
    <main>
        <section class="text_ticker">
            <div class="swiper strip-ads">
                <div class="swiper-wrapper">
                    <?
                    for ($i = 0; $i < count($text_info); $i++) {
                        $this_url = ($text_info[$i]['text_field_1']) ? $text_info[$i]['text_field_1'] : "javascript:void(0);";
                    ?>
                        <div class="swiper-slide"><a href="<?= $this_url ?>" <?= (($text_info[$i]['text_field_1']) ? ' target="_blank"' : '') ?>><i><?= $text_info[$i]['text_field_0'] ?></i></a></div>
                    <?
                    }
                    ?>
                </div>
            </div>
            <div class="closebtn" id="close_ad">
                <div class="close"></div>
            </div>
        </section>
        <section class="section_1">
            <!-- 桌機:1920 x 970 -->
            <!-- 手機:768 x 820 -->
            <div class="swiper mySwiper1">
                <div class="swiper-wrapper">
                    <? for ($iii = 0; $iii < count($slide_info); $iii++) {

                        if ($lang_id == "3") {
                            /*
                        if($global_ua == "mobile")
                        {
*/
                            $pic_mo = $slide_info[$iii]['pic_field_7'];
                            /*
                        }
                        else
                        {
*/
                            $pic = $slide_info[$iii]['pic_field_4'];
                            //                         }
                            $title = $slide_info[$iii]['text_field_3'];
                            $url = $slide_info[$iii]['text_field_5'];
                        } else {
                            /*
                       if($global_ua == "mobile")
                       {
*/
                            $pic_mo = $slide_info[$iii]['pic_field_8'];
                            /*
                       }
                       else
                       {
*/
                            $pic = $slide_info[$iii]['pic_field_1'];

                            //                        }

                            $title = $slide_info[$iii]['text_field_0'];
                            $url = $slide_info[$iii]['text_field_2'];
                        }
                        if (!$pic_mo)    $pic_mo = $pic;

                        $pic_arr = get_pic_path($pic);
                        $pic = "./login_admin/upload_file/" . $pic_arr['pic_file'];

                        $pic_mo_arr = get_pic_path($pic_mo);
                        $pic_mo = "./login_admin/upload_file/" . $pic_mo_arr['pic_file'];

                    ?>
                        <div class="swiper-slide">
                            <div class="pc"><a href="<?= $url ?>"><img src="<?= $pic ?>" alt="<?= $title ?>"></a></div>
                            <div class="mo"><a href="<?= $url ?>"><img src="<?= (($pic_mo) ? $pic_mo : $pic) ?>" alt="<?= $title ?>"></a></div>
                        </div>
                    <? } ?>
                    <!--
                    <div class="swiper-slide">
                        <div class="pc"><a href="./"><img src="dist/images/index/banner.png" alt=""></a></div>
                        <div class="mo"><a href="./"><img src="dist/images/index/banner_mb.png" alt=""></a></div>
                    </div>
-->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <?
        $k9_info = array();
        $where_clause = "1 order by Fmain_id asc";
        $tbl_name = "sys_portal_k9";
        getall_data($tbl_name, $where_clause, $k9_info);
        ?>
        <section class="section_1-5 mo_991">
            <ul class="flex_1">
                <li class="icon_flex" onclick="location.replace('<?= $k9_info[0]['text_field_2'] ?>');">
                    <div class="icon"><img src="dist/images/index/s_icon_1.png"></div>
                    <div class="txt">舒壓按摩</div>
                </li>
                <li class="icon_flex" onclick="location.replace('<?= $k9_info[1]['text_field_2'] ?>');">
                    <div class="icon"><img src="dist/images/index/s_icon_2.png"></div>
                    <div class="txt">運動戶外</div>
                </li>
                <li class="icon_flex" onclick="location.replace('<?= $k9_info[2]['text_field_2'] ?>');">
                    <div class="icon"><img src="dist/images/index/s_icon_3.png"></div>
                    <div class="txt">美型家電</div>
                </li>
            </ul>
            <ul class="flex_2">
                <li class="icon_flex" onclick="location.replace('<?= $k9_info[3]['text_field_2'] ?>');">
                    <div class="icon"><img src="dist/images/index/s_icon_4.png"></div>
                    <div class="txt">母嬰婦幼</div>
                </li>
                <li class="icon_flex" onclick="location.replace('<?= $k9_info[4]['text_field_2'] ?>');">
                    <div class="icon"><img src="dist/images/index/s_icon_5.png"></div>
                    <div class="txt">生活傢俱</div>
                </li>
                <li class="icon_flex" onclick="location.replace('<?= $k9_info[5]['text_field_2'] ?>');">
                    <div class="icon"><img src="dist/images/index/s_icon_6.png"></div>
                    <div class="txt">限時搶購</div>
                </li>
            </ul>
        </section>
        <section class="section_2">
            <!-- 桌機: 800 x 404 -->
            <!-- 手機:634 x 322 -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?
                    $k10_info = array();
                    $where_clause = "1 order by rank desc";
                    $tbl_name = "sys_portal_k10";
                    getall_data($tbl_name, $where_clause, $k10_info);
                    //				    show_array($k10_info);
                    for ($i = 0; $i < count($k10_info); $i++) {
                        $pic_arr = get_pic_path($k10_info[$i]['pic_field_0']);
                        //					    show_array($pic_arr);
                        $pic = "./login_admin/upload_file/" . $pic_arr['pic_file'];

                        $pic_mo_arr = get_pic_path($k10_info[$i]['pic_field_0']);
                        $pic_mo = "./login_admin/upload_file/" . $pic_mo_arr['pic_file'];
                        $use_type = userAgent($_SERVER['HTTP_USER_AGENT']);
                        //print $use_type;
                        $url = ($k10_info[$i]['text_field_5']) ? $k10_info[$i]['text_field_5'] : "javascript:void(0);";
                    ?>
                        <div class="swiper-slide">
                            <a href="<?= $url ?>" <?= (($url != "javascript:void(0);") ? ' target="_blank"' : '') ?>>
                                <img src="<?= (($use_type == "desktop") ? $pic : $pic_mo) ?>">
                                <div class="txt" style="color: <?= (($k10_info[$i]['customer_field_4']) ? $k10_info[$i]['customer_field_4'] : "#fff") ?>;">
                                    <div class="title"><?= $k10_info[$i]['text_field_2'] ?></div>
                                    <div class="subtitle"><?= $k10_info[$i]['text_field_3'] ?></div>
                                </div>
                            </a>
                        </div>
                    <?
                    }
                    /*for($i=0;$i<count($k10_info)&&$i<2;$i++){
					    $pic_arr = get_pic_path($k10_info[$i]['pic_field_0']);
//					    show_array($pic_arr);
	                    $pic = "./login_admin/upload_file/".$pic_arr['pic_file'];

	                    $pic_mo_arr = get_pic_path($k10_info[$i]['pic_field_0']);
	                    $pic_mo = "./login_admin/upload_file/".$pic_mo_arr['pic_file'];
	                    $use_type=userAgent($_SERVER['HTTP_USER_AGENT']);
	                    //print $use_type;
	                    $url = ($k10_info[$i]['text_field_5'])?$k10_info[$i]['text_field_5']:"javascript:void(0);";
			        ?>
                    <div data-hash="slide1" class="swiper-slide">
                        <a href="<?=$url?>" <?=(($url!="javascript:void(0);")?' target="_blank"':'')?>>
	                        <img src="<?=(($use_type == "desktop")?$pic:$pic_mo)?>">
                        <div class="txt" style="color: <?=(($k10_info[$i]['customer_field_4'])?$k10_info[$i]['customer_field_4']:"#fff")?>;">
                            <div class="title"><?=$k10_info[$i]['text_field_2']?></div>
                            <div class="subtitle"><?=$k10_info[$i]['text_field_3']?></div>
                        </div>
                        </a>
                    </div>
                    <?
                    }*/
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination mo_991"></div>
            </div>
        </section>
        <?
        $i2_info = array();
        $query_string = "select p.Fmain_id, p.menu_name, p.rank, f.parent_source_id , f.source_id ,f.source_table from sys_portal_i2 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_i2' and f.parent_source_id = '0' group by p.Fmain_id order by p.rank desc";
        sql_data($query_string, $i2_info);
        ?>
        <section class="section_3">
            <div class="product_sort">
                <div class="container">
                    <div id="top-menu-ul-2" class="top-menu-ul-2">
                        <div class="item_Menu">
                            <div class="item_menu_Box">
                                <ul class="item_menu_list slides">
                                    <?
                                    for ($i = 0; $i < count($i2_info); $i++) {
                                    ?>
                                        <li id="i2_li_<?= $i2_info[$i]['Fmain_id'] ?>" class="i2_li <?= (($i == 0) ? " active" : "") ?>">
                                            <a href="javascript:$('.i2_div').hide();$('#i2_div_<?= $i ?>').show();$('.i2_li').removeClass('active');$('#i2_li_<?= $i2_info[$i]['Fmain_id'] ?>').addClass('active');"><?= $i2_info[$i]['menu_name'] ?></a>
                                        </li>
                                    <?
                                    }
                                    ?>
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
            <?
            $l2_info = array();
            $where_clause = "1 order by rank desc";
            $tbl_name = "sys_portal_l2";
            getall_data($tbl_name, $where_clause, $l2_info);
            for ($i = 0; $i < count($l2_info); $i++) {
            ?>
                <div class="productBox i2_div" id="i2_div_<?= $l2_info[$i]['Fmain_id'] ?>" style="<?= (($i == 0) ? "" : "display:none;") ?>">
                    <div class="container">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <?
                                $i2_cnt_info = array();
                                $where_clause = " portal_l2_id = '" . $l2_info[$i]['Fmain_id'] . "' order by rank desc ";
                                $tbl_name = "sys_portal_l2_cnt";    //$MYSQL_TABS['portal_b2']
                                getall_data($tbl_name, $where_clause, $i2_cnt_info);
                                #$arr_id = find_folder_Fmain_id("sys_portal_i2",$i2_info[$i]['Fmain_id']);
                                #show_array($arr_id);
                                for ($j = 0; $j < count($i2_cnt_info); $j++) {
                                    $each_info = array();
                                    $where_clause = "Fmain_id = '" . $i2_cnt_info[$j]['customer_field_0'] . "'";
                                    $tbl_name = "sys_portal_x100_cnt";
                                    get_data($tbl_name, $where_clause, $each_info);
                                    $i2_arr = explode("@", $each_info['portal_i2_id']);
                                    if (1) {
                                        $pic_num = explode(",", $each_info['pic_field_6'])[0];
                                        $pic_path = get_pic_path_2($pic_num)['pic_file'];

                                        $pic_num2 = explode(",", $each_info['pic_field_6'])[1];
                                        $pic_path2 = get_pic_path_2($pic_num2)['pic_file'];
                                        if (!$pic_path2)    $pic_path2 = $pic_path;

                                        $price_arr = get_x100_cnt_price($each_info['Fmain_id']);
                                        $cnt_id = $each_info['Fmain_id'];
                                ?>
                                        <div class="swiper-slide">
                                            <a href="product-detail.php?cnt_id=<?= $each_info['Fmain_id'] ?>"><!-- <?= $each_info['text_field_1'] ?>.html-->
                                                <div class="icon">
                                                    <!--
                                    icon共有4張
                                    icon_1  NEW
                                    icon_2  HOT
                                    icon_3  SALE
                                    icon_4  預購
                                -->
                                                    <?
                                                    if ($each_info['radio_field_16'] == "NEW") {
                                                    ?>
                                                        <img src="dist/images/common/icon_1.png" alt="">
                                                    <?
                                                    }
                                                    if ($each_info['radio_field_16'] == "HOT") {
                                                    ?>
                                                        <img src="dist/images/common/icon_2.png" alt="">
                                                    <?
                                                    }
                                                    if ($each_info['radio_field_16'] == "SALE") {
                                                    ?>
                                                        <img src="dist/images/common/icon_3.png" alt="">
                                                    <?
                                                    }
                                                    if ($each_info['radio_field_16'] == "預購") {
                                                    ?>
                                                        <img src="dist/images/common/icon_4.png" alt="">
                                                    <?
                                                    }
                                                    ?>
                                                </div>
                                                <div class="img">
                                                    <div class="svg">
                                                        <svg viewBox="0 0 376 414" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 0.5H370C373.038 0.5 375.5 2.96244 375.5 6V408C375.5 411.038 373.038 413.5 370 413.5H6.00001C2.96244 413.5 0.5 411.038 0.5 408V6C0.5 2.96243 2.96243 0.5 6 0.5Z" />
                                                        </svg>
                                                    </div>
                                                    <!-- 376 * 414 -->

                                                    <div class="space_block">
                                                        <!-- 預設顯示第一張圖 -->
                                                        <? if ($pic_path) { ?><img src="<?= $pic_path ?>" alt="" class="defaultImg"><? } ?>
                                                        <!-- hover後顯示的照片 -->
                                                        <? if ($pic_path2) { ?><img src="<?= $pic_path2 ?>" alt="" class="hoverImg"><? } ?>
                                                    </div>
                                                </div>
                                                <div class="txt">
                                                    <div class="proId"><?= $each_info['text_field_1'] ?></div>
                                                    <div class="proName">
                                                        <span><?= $each_info['text_field_0'] ?></span>
                                                    </div>
                                                    <?
                                                    $o_price = "";
                                                    $price = "";
                                                    if ($price_arr['price_3'] != "") {
                                                        $price = number_format($price_arr['price_3']);
                                                    } else if (count($price_arr) > 1) {
                                                        $o_price = number_format($price_arr['price_1']);
                                                        $price = number_format($price_arr['price_2']);
                                                    } else if ($price_arr['price_1'] != "") {
                                                        $price = number_format($price_arr['price_1']);
                                                    } else if ($price_arr['price_2'] != "") {
                                                        $price = number_format($price_arr['price_2']);
                                                    }
                                                    ?>
                                                    <div class="price">
                                                        <?
                                                        if ($o_price) {
                                                        ?>
                                                            <span class="originalPrice">$<?= $o_price ?></span>
                                                            <i>｜</i>
                                                        <?
                                                        }
                                                        ?>
                                                        <span class="specialOffer">$<?= $price ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                <?
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="btn_flex">
                            <a href="all-brand.php" class="store_btn">
                                <div>全部商品</div>
                            </a>
                        </div>
                    </div>
                </div>
            <?
            }
            ?>
        </section>
        <section class="section_4">
            <?
            $k11_info = array();
            $where_clause = "1 order by rank desc";
            $tbl_name = "sys_portal_k11";
            get_data($tbl_name, $where_clause, $k11_info);
            $pic_path = get_pic_path_2($k11_info['pic_field_0'])['pic_file'];

            $this_url = ($k11_info['text_field_2']) ? $k11_info['text_field_2'] : "javascript:void(0);";

            $youtube_url = $k11_info['text_field_1'];
            preg_match('/youtube\.com\/(v\/|watch\?v=)([\w\-]+)/', $youtube_url, $match);
            $youtube_id = $match[2];
            if (!$youtube_id) {
                $match = explode("/", $youtube_url);
                $youtube_id = $match[count($match) - 1];
            }

            ?>
            <div class="container">
                <div class="video_flex">
                    <?
                    if ($youtube_id) {
                    ?>
                        <div id="YouTubeVideoPlayerAPI"></div>
                    <?
                    } else {
                    ?>
                        <a href="<?= $this_url ?>" <?= (($k11_info['text_field_2']) ? ' target="_blank"' : '') ?>><img src="<?= $pic_path ?>" alt="youtube"></a>
                    <?
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="section_5">
            <div class="container">
                <div class="img_flex">
                    <?
                    $k12_info = array();
                    $where_clause = "1 order by rank desc";
                    $tbl_name = "sys_portal_k12";
                    get_data($tbl_name, $where_clause, $k12_info);
                    $pic_path = get_pic_path_2($k12_info['pic_field_0'])['pic_file'];
                    $mo_path = get_pic_path_2($k12_info['pic_field_1'])['pic_file'];

                    $this_url = ($k12_info['text_field_4']) ? $k12_info['text_field_4'] : "javascript:void(0);";
                    ?>
                    <div class="first_img">
                        <a href="<?= $this_url ?>" <?= (($k12_info['text_field_4']) ? ' target="_blank"' : '') ?>>
                            <!-- 桌機:1096 x 740 -->
                            <!-- 手機:671 x 454 -->
                            <div class="img"><img src="<?= (($use_type == "desktop") ? $pic_path : $mo_path) ?>" alt=""></div>
                            <div class="txt">
                                <div class="title"><?= $k12_info['text_field_2'] ?></div>
                                <div class="subtitle"><?= $k12_info['text_field_3'] ?></div>
                            </div>
                        </a>
                    </div>
                    <ul class="sec_img">
                        <!-- 桌機:452 x 268 -->
                        <!-- 手機:672 x 398 -->
                        <?
                        $k2_info = array();
                        $where_clause = "1 order by rank desc";
                        $tbl_name = "sys_portal_k2";
                        getall_data($tbl_name, $where_clause, $k2_info);
                        #show_array($k2_info);
                        for ($i = 0; $i < count($k2_info); $i++) {
                            $c1_cnt_info = array();
                            $where_clause = " Fmain_id = '" . $k2_info[$i]['id'] . "'  ";
                            $tbl_name = "sys_portal_c1_cnt";    //$MYSQL_TABS['portal_b2']
                            get_data($tbl_name, $where_clause, $c1_cnt_info);
                            $pic_path = get_pic_path_2($c1_cnt_info['pic_field_2'])['pic_file'];
                            $mo_path = get_pic_path_2($c1_cnt_info['pic_field_2'])['pic_file'];

                            $this_url = "news-detail.php?folder_id=" . $c1_cnt_info['portal_c1_id'] . "&detail_id=" . $c1_cnt_info['Fmain_id'] . "&now_folder=" . $c1_cnt_info['portal_c1_id'];
                        ?>
                            <li class="block">
                                <a href="<?= $this_url ?>">
                                    <div class="img"><img src="<?= (($use_type == "desktop") ? $pic_path : $mo_path) ?>" alt=""></div>
                                    <div class="txt"><?= $c1_cnt_info['text_field_1'] ?></div>
                                </a>
                            </li>
                        <?
                        }
                        ?>
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
    <script async src="//www.youtube.com/iframe_api"></script>
    <script src="dist/js/index.js"></script>
    <script>
        <?php if ($youtube_id): ?>
            // 載入 YouTube IFrame API
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // 定義 onYouTubeIframeAPIReady 函式
            function onYouTubeIframeAPIReady() {
                var player;
                player = new YT.Player('YouTubeVideoPlayerAPI', {
                    videoId: "<?= $youtube_id ?>",
                    width: '100%', // 播放器寬度 (px)
                    height: '100%', // 播放器高度 (px)
                    playerVars: {
                        autoplay: 1, // 自動播放影片
                        controls: 0, // 隱藏控制
                        showinfo: 0, // 隱藏影片標題
                        modestbranding: 0, // 隱藏YouTube Logo
                        loop: 1, // 重覆播放
                        playlist: "<?= $youtube_id ?>", // 當使用影片要重覆播放時，需再輸入影片ID
                        fs: 0, // 隱藏全螢幕按鈕
                        cc_load_policy: 0, // 隱藏字幕
                        iv_load_policy: 3, // 隱藏影片註解
                        autohide: 0 // 影片播放時，隱藏影片控制列
                    },
                    events: {
                        onReady: function(e) {
                            e.target.mute(); // 播放時靜音
                            e.target.playVideo(); // 強制播放(手機才會自動播放，但僅限於 Android)
                        }
                    }
                });
            }
        <?php endif; ?>
    </script>

</body>

</html>