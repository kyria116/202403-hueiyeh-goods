    <?php include "quote/template/head.php"; ?>
    <link rel="stylesheet" href="dist/css/product.css">
    </head>

    <body class="lang_tw">
        <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?order=" . $_GET['order'] . "&folder_id=" . $_GET['folder_id'];
        $folder_id = $_GET['folder_id'];
        if (!$folder_id) {
            print "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
            print "<script>";
            print "location.href='index.php';";
            print "</script>";
            exit;
        }
        $my_info = array();
        $query_string = "select p.Fmain_id, p.menu_name, p.rank, f.parent_source_id , f.source_id ,f.source_table from sys_portal_i2 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_i2' and f.source_id = '" . $folder_id . "' group by p.Fmain_id order by p.rank desc";
        sql_data($query_string, $my_info);
        #show_array($my_info);
        $father_info = array();
        $query_string = "select p.Fmain_id, p.menu_name, p.rank, f.parent_source_id , f.source_id ,f.source_table from sys_portal_i2 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_i2' and f.source_id = '" . $my_info[0]['parent_source_id'] . "' group by p.Fmain_id order by p.rank desc";
        sql_data($query_string, $father_info);
        $son_info = array();
        $query_string = "select p.Fmain_id, p.menu_name, p.rank, f.parent_source_id , f.source_id ,f.source_table from sys_portal_i2 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_i2' and f.parent_source_id = '" . $folder_id . "' group by p.Fmain_id order by p.rank desc";
        sql_data($query_string, $son_info);
        $main_id = "";    #主品牌id
        $first_id = "";    #第一層id
        if ($my_info[0]['parent_source_id'] == "0") {
            $main_id = $folder_id;
            $first_id = $son_info[0]['source_id'];
            $folder_id = $first_id;
            $son_info = array();
            $query_string = "select p.Fmain_id, p.menu_name, p.rank, f.parent_source_id , f.source_id ,f.source_table from sys_portal_i2 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_i2' and f.parent_source_id = '" . $folder_id . "' group by p.Fmain_id order by p.rank desc";
            sql_data($query_string, $son_info);
        } else if ($father_info[0]['parent_source_id'] == "0") {
            $main_id = $father_info[0]['source_id'];
            $first_id = $folder_id;
        } else {
            $main_id = $father_info[0]['parent_source_id'];
            $first_id = $father_info[0]['source_id'];
        }
        #print "<BR><BR><BR><BR><BR><BR>".$main_id;
        $main_info = array();
        $where_clause = " Fmain_id = '" . $main_id . "'  ";
        $tbl_name = "sys_portal_i2";
        get_data($tbl_name, $where_clause, $main_info);
        ?>
        <main class="brandPage">
            <h1 style="position: absolute;top: 0;left: 0;z-index: -1;"><?= $main_info['menu_name'] ?></h1>
            <div class="pageKv">
                <!-- 
                桌機 1920 * 520 
                手機 768 * 631
            -->
                <?
                if ($main_info['the_banner']) {
                    $pic_arr = explode(",", $main_info['the_banner']);

                    $pic_info = array();
                    $where_clause = "Fmain_id = '" . $pic_arr[0] . "'";
                    $tbl_name = "sys_file";
                    get_data($tbl_name, $where_clause, $pic_info);

                    if ($main_info['banner_url']) {
                        print "<a href='" . $main_info['banner_url'] . "'>";
                    }
                ?>
                    <img src="login_admin/upload_file/<?= $pic_info['file_path'] ?>" alt="<?= $main_info['menu_name'] ?>" class="pc" />
                <?
                    if ($main_info['banner_url']) {
                        print "</a>";
                    }
                }
                ?>
                <!--             <img src="dist/images/productPage/page_kv.jpg" alt="" class="pc"> -->
                <?
                if ($main_info['mob_banner']) {
                    $pic_arr = explode(",", $main_info['mob_banner']);

                    $pic_info = array();
                    $where_clause = "Fmain_id = '" . $pic_arr[0] . "'";
                    $tbl_name = "sys_file";
                    get_data($tbl_name, $where_clause, $pic_info);

                    if ($main_info['banner_url']) {
                        print "<a href='" . $main_info['banner_url'] . "'>";
                    }
                ?>
                    <img src="login_admin/upload_file/<?= $pic_info['file_path'] ?>" alt="<?= $main_info['menu_name'] ?>" class="mo" />
                <?
                    if ($main_info['banner_url']) {
                        print "</a>";
                    }
                }
                ?>
                <!--             <img src="dist/images/productPage/page_kv_mo.jpg" alt="" class="mo"> -->
            </div>
            <div class="brandBox container">
                <!-- 230 * 206 -->
                <div class="img pc">
                    <?
                    if ($main_info['the_logo']) {
                        $pic_arr = explode(",", $main_info['the_logo']);

                        $pic_info = array();
                        $where_clause = "Fmain_id = '" . $pic_arr[0] . "'";
                        $tbl_name = "sys_file";
                        get_data($tbl_name, $where_clause, $pic_info);
                    ?>
                        <img src="login_admin/upload_file/<?= $pic_info['file_path'] ?>" alt="<?= $main_info['menu_name'] ?>" />
                    <?
                    }
                    ?>
                </div>
                <div class="txt">
                    <div class="intro">
                        <span class="txt_wrap"><?= nl2br($main_info['content']) ?></span>
                    </div>
                    <div class="btn mo">
                        <a href="javascript:;" id="view_more_btn">View More</a>
                    </div>
                    <div class="iconBox">
                        <!--
                        32 * 32
                        如果沒有連結則直接刪除li
                    -->
                        <ul>
                            <?
                            if ($main_info['fb_icon']) {
                            ?>
                                <li>
                                    <a href="<?= $main_info['fb_icon'] ?>" target="_blank" style="mask-image: url('dist/images/common/fb_icon.svg');"></a>
                                </li>
                            <?
                            }
                            if ($main_info['line_icon']) {
                            ?>
                                <li>
                                    <a href="<?= $main_info['line_icon'] ?>" target="_blank" style="mask-image: url('dist/images/common/line_icon.svg');"></a>
                                </li>
                            <?
                            }
                            if ($main_info['ig_icon']) {
                            ?>
                                <li>
                                    <a href="<?= $main_info['ig_icon'] ?>" target="_blank" style="mask-image: url('dist/images/common/ig_icon.svg');"></a>
                                </li>
                            <?
                            }

                            if ($main_info['yt_icon']) {
                            ?>
                                <li>
                                    <a href="<?= $main_info['yt_icon'] ?>" target="_blank" style="mask-image: url('dist/images/common/yt_icon.svg');"></a>
                                </li>
                            <?
                            }
                            /*
	                        $temp_arr=explode("@@@",$main_info['the_icon']);
	                        foreach($temp_arr as $temp_val){
		                        $temp_arr2=explode("###",$temp_val);
		                        if($temp_arr2[0] && $temp_arr2[1]){
			                        $pic_arr = explode(",", $temp_arr2[0]);
			            
						            $pic_info = array();
						            $where_clause = "Fmain_id = '".$pic_arr[0]."'";
						            $tbl_name = "sys_file";
						            get_data($tbl_name, $where_clause, $pic_info);
						            if($pic_info['file_path']){
							            ?>
						<li>
                            <a href= "<?=$temp_arr2[1]?>" target="_blank" style="mask-image: url('login_admin/upload_file/<?=$pic_info["file_path"]?>');"></a>
                        </li>
							            <?
						            }
		                        }
	                        }
*/
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product_sort">
                <div class="container">
                    <div id="top-menu-ul-2" class="top-menu-ul-2">
                        <div class="item_Menu">
                            <div class="item_menu_Box">
                                <ul class="item_menu_list slides">
                                    <?
                                    $first_info = array();
                                    $query_string = "select p.Fmain_id, p.menu_name, p.rank, f.parent_source_id , f.source_id ,f.source_table from sys_portal_i2 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_i2' and f.parent_source_id = '" . $main_id . "' group by p.Fmain_id order by p.rank desc";
                                    sql_data($query_string, $first_info);
                                    for ($i = 0; $i < count($first_info); $i++) {
                                    ?>
                                        <li <?= (($first_info[$i]['Fmain_id'] == $first_id) ? ' class="active"' : '') ?>>
                                            <a href="brand.php?folder_id=<?= $first_info[$i]['Fmain_id'] ?>"><?= $first_info[$i]['menu_name'] ?></a>
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
                    <div class="subcategory">
                        <div id="top-menu-ul-3" class="top-menu-ul-3">
                            <div class="item_Menu">
                                <div class="item_menu_Box">
                                    <ul class="item_menu_list slides">
                                        <li <?= (($first_id == $folder_id) ? ' class="active"' : '') ?>>
                                            <a href="brand.php?folder_id=<?= $first_id ?>">全部</a>
                                        </li>
                                        <?
                                        $two_info = array();
                                        $query_string = "select p.Fmain_id, p.menu_name, p.rank, f.parent_source_id , f.source_id ,f.source_table from sys_portal_i2 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_i2' and f.parent_source_id = '" . $first_id . "' group by p.Fmain_id order by p.rank desc";
                                        sql_data($query_string, $two_info);
                                        for ($i = 0; $i < count($two_info); $i++) {
                                        ?>
                                            <li <?= (($two_info[$i]['Fmain_id'] == $folder_id) ? ' class="active"' : '') ?>>
                                                <a href="brand.php?folder_id=<?= $two_info[$i]['Fmain_id'] ?>"><?= $two_info[$i]['menu_name'] ?></a>
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
                    <select name="order_by" onchange="location.replace('brand.php?folder_id=<?= $main_id ?>&order='+this.value);">
                        <option value="0">依時間排序</option>
                        <option value="1" <?= (($_GET['order'] == "1") ? " selected" : "") ?>>依人氣排序</option>
                        <option value="2" <?= (($_GET['order'] == "2") ? " selected" : "") ?>>價格低至高</option>
                        <option value="3" <?= (($_GET['order'] == "3") ? " selected" : "") ?>>價格高至低</option>
                    </select>
                </div>
            </div>
            <?
            $today = date("Y-m-d");
            $add_sql = "";
            if (count($son_info)) {
                for ($i = 0; $i < count($son_info); $i++) {
                    if ($add_sql != "")    $add_sql .= " or ";
                    $add_sql .= " ( td.portal_i2_id = '" . $son_info[$i]['source_id'] . "' and t.portal_i2_id like '%" . $son_info[$i]['source_id'] . "%') ";
                }
            } else {
                $add_sql = "td.portal_i2_id = '" . $folder_id . "' and t.portal_i2_id like '%" . $folder_id . "%'";
            }
            $add_sql = " ( " . $add_sql . " ) ";
            $add_sql .= " and t.sys_start_date<='" . $today . "' and t.sys_end_date>='" . $today . "' and t.is_hide='2'";
            $x100_cnt_info = array();
            $query_string = "SELECT t.*, td.rank AS new_rank FROM `sys_portal_x100_cnt` AS t INNER JOIN " . $MYSQL_TABS['portal_i2_cnt_rank'] . " AS td ON t.Fmain_id = td.portal_x100_cnt_id WHERE " . $add_sql . " ";
            if ($_GET['order'] == "1") {
                $query_string .= " order by hit_count desc";
            } else if ($_GET['order'] == "2") {
                $query_string .= " order by CAST(t.text_field_3 AS UNSIGNED) asc, CAST(t.text_field_2 AS UNSIGNED) asc";
            } else if ($_GET['order'] == "3") {
                $query_string .= " order by CAST(t.text_field_3 AS UNSIGNED) desc, CAST(t.text_field_2 AS UNSIGNED) desc";
            } else {
                $query_string .= " order by new_rank desc";
            }
            sql_data($query_string, $x100_cnt_info);
            #print $query_string;
            /***************
             *  分頁
             **************/
            $URL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?1";
            $each_page_num = 20;
            $pageNum = $_GET['pageNum'];

            if ($pageNum == "") {
                $info = array();
                for ($i = 0; $i < $each_page_num; $i++) {
                    if (isset($x100_cnt_info[$i])) {
                        $info[$i] = $x100_cnt_info[$i];
                    }
                }
            } else {
                $Si = $pageNum * $each_page_num;
                $Ei = $Si + $each_page_num;
                $info = array();
                $ii = 0;
                for ($i = $Si; $i < $Ei; $i++) {
                    if (isset($x100_cnt_info[$i])) {
                        $info[$ii] = $x100_cnt_info[$i];
                    }
                    $ii++;
                }
            }

            $all_info = $x100_cnt_info;
            ?>
            <div class="productBox">
                <div class="container">
                    <ul>
                        <?
                        for ($iii = 0; $iii < count($info); $iii++) {
                            $pic_num = explode(",", $info[$iii]['pic_field_6'])[0];
                            $pic_path = get_pic_path_2($pic_num)['pic_file'];

                            $pic_num2 = explode(",", $info[$iii]['pic_field_6'])[1];
                            $pic_path2 = get_pic_path_2($pic_num2)['pic_file'];
                            if (!$pic_path2)    $pic_path2 = $pic_path;

                            $price_arr = get_x100_cnt_price($info[$iii]['Fmain_id']);
                            $cnt_id = $info[$iii]['Fmain_id'];

                            #include("include_kol_info.php");
                        ?>
                            <li>
                                <a href="<?= $info[$iii]['text_field_1'] ?>.html"><!-- product-detail.php?cnt_id=<?= $info[$iii]['Fmain_id'] ?> -->
                                    <div class="icon">
                                        <!-- 
                                    icon共有4張 
                                    icon_1  NEW
                                    icon_2  HOT
                                    icon_3  SALE
                                    icon_4  預購
                                -->
                                        <?
                                        if ($info[$iii]['radio_field_16'] == "NEW") {
                                        ?>
                                            <img src="dist/images/common/icon_1.png" alt="">
                                        <?
                                        }
                                        if ($info[$iii]['radio_field_16'] == "HOT") {
                                        ?>
                                            <img src="dist/images/common/icon_2.png" alt="">
                                        <?
                                        }
                                        if ($info[$iii]['radio_field_16'] == "SALE") {
                                        ?>
                                            <img src="dist/images/common/icon_3.png" alt="">
                                        <?
                                        }
                                        if ($info[$iii]['radio_field_16'] == "預購") {
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
                                        <div class="proId"><?= $info[$iii]['text_field_1'] ?></div>
                                        <div class="proName">
                                            <span><?= $info[$iii]['text_field_0'] ?></span>
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
                            </li>
                        <?
                        }
                        ?>
                    </ul>

                    <?php
                    include "quote/template/page_list_2.php";
                    ?>
                </div>
            </div>
        </main>
        <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
        ?>
        <script src="dist/js/main.js"></script>
        <script src="dist/js/product.js"></script>
        <script>
            $(function() {
                window.setTimeout(function() {
                    slider_ul_list("top-menu-ul-3");
                }, 1);
            });
        </script>
      <script>
            document.addEventListener("DOMContentLoaded", () => {
                const txtWrap = document.querySelector(".txt_wrap");
                const viewMoreBtn = document.getElementById("view_more_btn");
                // 計算元素實際的高度和限制的高度
                const lineHeight = parseFloat(getComputedStyle(txtWrap).lineHeight); // 獲取行高
                const maxHeight = lineHeight * 4; // 計算4行高度限制

                // 檢查是否超出最大高度
                if (txtWrap.scrollHeight > maxHeight) {
                    viewMoreBtn.classList.add("show_btn"); // 如果超過四行，添加class
                }

                viewMoreBtn.addEventListener("click", function() {
                    const spanElement = document.querySelector(" .txt_wrap");
                    if (spanElement.style.display === "block") {
                        spanElement.style.display = "";
                    } else {
                        spanElement.style.display = "block";
                    }
                    viewMoreBtn.classList.remove("show_btn");
                });



            });
        </script>
    </body>

    </html>