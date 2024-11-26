    <?php 
	    include "quote/template/head.php"; 
	    require_once ("global_include_file.php");

    $folder_id = $_GET['folder_id'];

    $all_folder_info=array();
    $where_clause="1 order by rank desc";
    $tbl_name="sys_portal_f1";
    getall_data($tbl_name, $where_clause, $all_folder_info);
    // show_array($all_folder_info);


    $all_f1_cnt_arr = array();
    for($iii=0;$iii<count($all_folder_info);$iii++){
        $each_info=array();
        $where_clause="1 and portal_f1_id='".$all_folder_info[$iii]['Fmain_id']."' and is_hide='2' order by rank desc";
        $tbl_name="sys_portal_f1_cnt";
        getall_data($tbl_name, $where_clause, $each_info);
        // show_array($each_info);

        $all_f1_cnt_arr[$all_folder_info[$iii]['Fmain_id']] = $each_info;
    }



    ?>
    <link rel="stylesheet" href="dist/css/service.css">
</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
    ?>
    <main class="faqPage">
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
                                <li>
                                    <a href="warranty.php">產品保固</a>
                                </li> 
                                <li>
                                    <a href="repair.php ">產品維修</a>
                                </li>
                                <li class="active">
                                    <a href="javascript:;">常見問題</a>
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
                <div class="subcategory">
                    <div id="top-menu-ul-3" class="top-menu-ul-3">
                        <div class="item_Menu">
                            <div class="item_menu_Box">
                                <ul class="item_menu_list slides">
                                    <?
		                                $active = "";
		                                if(!$folder_id){
		                                    $active = "active";
		                                }
		                            ?>
                                    <li class="<?=$active?>">
                                        <a href="javascript:go_url('0');">全部</a>
                                    </li>
                                    <?
                            for($iii=0;$iii<count($all_folder_info);$iii++){
                                $active = "";
                                if($folder_id==$all_folder_info[$iii]['Fmain_id']){
                                    $active = "active";
                                }
                                $ppp=$iii+1;
                            ?>
                                <li class="<?=$active?>" ><a href="javascript:go_url('<?=$ppp?>');"><?=$all_folder_info[$iii]['menu_name']?></a></li>
                            <?}?>
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
        </div>
        <div class="content">
            <div class="container">
                <?
	                for($iii=0;$iii<count($all_folder_info);$iii++){
	             		if($folder_id == $all_folder_info[$iii]['Fmain_id'] || !$folder_id){   
                ?>
                <ul class="faqBox">
                    <li class="faqLi">
                        <div class="b_title"><?=$all_folder_info[$iii]['menu_name']?></div>
                        <ul>
                            <?  
	                            $now_cnt_arr = $all_f1_cnt_arr[$all_folder_info[$iii]['Fmain_id']];
                                    for($kkk=0;$kkk<count($now_cnt_arr);$kkk++){
                            ?>
                          <li class="faqList">
                                <a href="javascript:;" class="faqContent"><?=$now_cnt_arr[$kkk]['text_field_0']?></a>
                                <div class="txt">
                                    <div class="editor_Content">
                                        <div class="editor_box pc_use">
                                            <?=$now_cnt_arr[$kkk]['html_field_1']?>
                                        </div>
                                        <div class="editor_box mo_use">
                                            <?=(($now_cnt_arr[$kkk]['html_field_2'])?$now_cnt_arr[$kkk]['html_field_2']:$now_cnt_arr[$kkk]['html_field_1'])?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?}?>
                        </ul>
                    </li>
                </ul>
                <?
	                	}
	                }
                ?>
            </div>
        </div>
    </main>
    <script type="text/javascript">
        function go_url(value){
             window.location.href = "faq.php?folder_id="+value;
        }
    </script>
    <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>  
    <script src="dist/js/faq.js"></script>  
</body>

</html>