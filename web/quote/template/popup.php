<?
$k14_info = array();
$where_clause = " Fmain_id = '1' ";
$tbl_name = "sys_portal_k14";    //$MYSQL_TABS['portal_b2']
get_data($tbl_name, $where_clause, $k14_info);
if ($k14_info['content'] && $_COOKIE['no_pic'] != "1") {
    $use_type = userAgent($_SERVER['HTTP_USER_AGENT']);
    $pic_arr = explode(",", $k14_info['content']);
    $pic_mo_arr = explode(",", ((!$k14_info['url_name']) ? $k14_info['content'] : $k14_info['url_name']));

    $pic_info = array();
    $where_clause = "Fmain_id = '" . $pic_arr[0] . "'";
    $tbl_name = "sys_file";
    get_data($tbl_name, $where_clause, $pic_info);
    
    $pic_mo_info = array();
    $where_clause = "Fmain_id = '" . $pic_mo_arr[0] . "'";
    $tbl_name = "sys_file";
    get_data($tbl_name, $where_clause, $pic_mo_info);
?>
    <div id="modalBg">
        <div id="myModal" class="modal">
            <a href="javascript:setPopup('web_view', 'on');" class="closebtn" id="close">
                <div class="close"></div>
            </a>
            <div class="modal-content">
                <!-- 最大寬度1200px
            高度不限 -->
                <div class="img">
                    <?
                    if ($k14_info['url']) {
                    ?>
                        <a href='<?= $k14_info['url'] ?>'>
                        <?
                    }
                        ?>
                        <span class="pc"><img src="login_admin/upload_file/<?= $pic_info['file_path'] ?>" alt=""></span>

                        <!-- 改成手機板路徑 -->
                        <span class="mo"><img src="login_admin/upload_file/<?= $pic_mo_info['file_path'] ?>" alt=""></span>

                        <?
                        if ($k14_info['url']) {
                        ?>
                        </a>
                    <?
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?
}
setcookie("no_pic", "1", 3600);
$_COOKIE['no_pic'] = "1";
?>