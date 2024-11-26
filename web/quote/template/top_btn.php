<?
	include_once("global_include_file.php");
	$l1_info=array();
	$where_clause=" Fmain_id = '1' ";
	$tbl_name="sys_portal_l1";	//$MYSQL_TABS['portal_b2']
	get_data($tbl_name, $where_clause, $l1_info);
?>
<div class="fixBoxBtn">
        <a href="javascript:;" class="fixBtn">
            <div class="txt">TOP</div>
            <div class="arrow"><img src="dist/images/common/go_top_arrow.png" alt="line">
                <div class="line"></div>
            </div>
        </a>
    <div class="line_icon">
        <a href="<?=(($l1_info['content'])?$l1_info['content']:"javascript:void(0)")?>" target="_blank">
            <img src="dist/images/common/line_bt_for_go_top.png" alt="line">
        </a>
    </div>
</div>