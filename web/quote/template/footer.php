<?
	require_once ("global_include_file.php");
	$all_folder_info=array();
	$where_clause="1 order by rank desc limit 0,5";
	$tbl_name="sys_portal_c1";
	getall_data($tbl_name, $where_clause, $all_folder_info);
	
    $k5_info=array();
    $where_clause="1";
    $tbl_name="sys_portal_k5";
    get_data($tbl_name, $where_clause, $k5_info);
    // show_array($info);


    $k5_info['content'] = str_replace("<p>", "", $k5_info['content']);
    $k5_info['content'] = str_replace("</p>", "", $k5_info['content']);

    $phone_info=array();
    $where_clause="1 order by Fmain_id asc";
    $tbl_name="sys_portal_k6";
    getall_data($tbl_name, $where_clause, $phone_info);
    // show_array($phone_info);

    $social_info=array();
    $where_clause="1 order by rank desc";
    $tbl_name="sys_portal_k7";
    getall_data($tbl_name, $where_clause, $social_info);
    // show_array($social_info);
?>
<footer>
    <div class="footer">
        <div class="f_left">
            <div class="footerLogo">
                <a href="index.php"><img src="dist/images/common/logo.svg"></a>
            </div>
            <ul class="item_container">
                <li class="item">
                    <div class="item_title">
                        <a href="about.php">
                            關於我們
                        </a>
                    </div>
                    <ul>
                        <li>
                            <!-- 自訂連結外連 -->
                            <a href="<?=$phone_info[3]['text_field_1']?>" target="_blank">人才招募</a></li>
                    </ul>
                </li>
                <li class="item">
                    <div class="item_title">
                        <a href="news.php">
                            品牌消息
                        </a>
                    </div>
                    <ul>
                        <!-- 最多顯示分類前五筆 -->
                        <?
	                        for($iii=0;$iii<count($all_folder_info);$iii++){
                        ?>
                            	<li><a href="<?='news.php?folder_id='.$all_folder_info[$iii]['Fmain_id']?>"><?=$all_folder_info[$iii]['menu_name']?></a></li>
                        <?}?>
                    </ul>
                </li>
                <li class="item">
                    <div class="item_title">
                        會員服務
                    </div>
                    <ul>
                        <!-- 前三個需要先登入會員才能使用(alert提醒) -->
                        <li><a href="contact.php">聯繫我們</a></li>
                        <li><a href="warranty.php">產品保固</a></li>
                        <li><a href="repair.php">產品維修</a></li>
                        <li><a href="faq.php">常見問題</a></li>
                        <!-- <li><a href="points.php">會員積點</a></li> -->
                    </ul>
                </li>
                <li class="item">
                    <div class="item_title">
                        商務洽詢
                    </div>
                    <ul>
                        <li>
                            <a href="cooperation.php">大宗採購</a>
                        </li>
                        <li><a href="cooperation.php#cooperation">異業合作</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="f_right">
            <ul class="icon">
                <?for($iii=0;$iii<count($social_info);$iii++){

                $pic_url = "";
                $pic_arr = get_pic_path($social_info[$iii]['pic_field_0']);
                if(count($pic_arr)>0){
                    $pic_url = "./login_admin/upload_file/".$pic_arr['pic_file'];
                }

                print "<li><a href='".$social_info[$iii]['text_field_1']."' target='_blank'><img src='".$pic_url."'></a></li>";
            }?>
<!--
                <li>
                    <a href="https://www.facebook.com/hueiyeh.goods/" target="_blank">
                        <img src="dist/images/common/fb_icon.svg" alt="facebook">
                    </a>
                </li>
                <li>
                    <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=627yxsje" target="_blank">
                        <img src="dist/images/common/line_icon.svg" alt="line">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/hueiyeh1983/" target="_blank">
                        <img src="dist/images/common/ig_icon.svg" alt="ig">
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UCWeqSt0loBEvTrLnfKADfcg" target="_blank">
                        <img src="dist/images/common/yt_icon.svg" alt="yt">
                    </a>
                </li>
-->
            </ul>
            <div class="phone_num">
                <div><a href="tel:<?=$phone_info[0]['text_field_1']?>"><span>客服電話</span><?=$phone_info[0]['text_field_1']?></a></div>
                <div><a href="tel:<?=$phone_info[1]['text_field_1']?>"><span>手機請撥</span><?=$phone_info[1]['text_field_1']?></a></div>
            </div>
            <div class="ser_time">
                服務時間：<?=$phone_info[2]['text_field_1']?>
            </div>
            <div class="copyright">
                <a href="terms.php">
                    本站條款
                </a><?=$k5_info['content']?>
            </div>
        </div>
    </div>
</footer>