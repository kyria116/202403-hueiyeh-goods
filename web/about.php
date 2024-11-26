    <?php 
	    include "quote/template/head.php"; 
	    require_once ("global_include_file.php");
    ?>
    <link rel="stylesheet" href="dist/css/otherPage.css">
</head>

<body class="lang_tw historyBody">
    <?php
        include "quote/template/added.php";
        include "quote/template/nav.php";
    ?>
    <main class="newsPage">
        <div class="kvTitle">
            <div class="container">
                <div class="enTitle">ABOUT</div>
                <div class="twTitle">關於我們</div>
            </div>
        </div>
        <?
	        $h3_info=array();
	        $where_clause=" Fmain_id = '1' ";
	        $tbl_name="sys_portal_h3";	//$MYSQL_TABS['portal_b2']
	        get_data($tbl_name, $where_clause, $h3_info);
        ?>
        <div class="editor_Content">
            <div class="editor_box pc_use">
                <?=$h3_info['content']?>
            </div>
            <div class="editor_box mo_use">
                <?=(($h3_info['content_m'])?$h3_info['content_m']:$h3_info['content'])?>
            </div>
        </div>
        <div class="history">
            <div class="swiperContainer">
                <div class="yearsBox">
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <?
	                            $first_info = array();
								$query_string = "select p.Fmain_id, p.menu_name, p.rank, f.parent_source_id , f.source_id ,f.source_table from sys_portal_h4 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_h4' and f.parent_source_id = '0' group by p.Fmain_id order by CAST(p.menu_name AS UNSIGNED) desc";
								sql_data($query_string, $first_info);
								for($i=0;$i<count($first_info);$i++){
                            ?>
                            <div class="swiper-slide" data-slide="<?=$i?>"><span><?=$first_info[$i]['menu_name']?></span></div>
                            <?
	                            }
                            ?>
<!--
                            <div class="swiper-slide" data-slide="0"><span>2024</span></div>
                            <div class="swiper-slide" data-slide="1"><span>2023</span></div>
-->

                        </div>
                    </div>
                </div>
                <!-- 圖片 840 * 472 -->
                <div class="monthContent">
                    <div class="gallery-top">
                        <?
	                        $total_print = 0;
	                        for($i=0;$i<count($first_info);$i++){
                        ?>
                        <div class="contentList active">
                            <div class="topMenu">
                                <div class="showMonth">01</div>
                                <div class="monthBox">
                                    <ul>
                                        <?
	                                        $two_info = array();
											$query_string = "select p.Fmain_id, p.menu_name, p.rank, f.parent_source_id , f.source_id ,f.source_table from sys_portal_h4 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_h4' and f.parent_source_id = '".$first_info[$i]['Fmain_id']."' group by p.Fmain_id order by CAST(p.menu_name AS UNSIGNED) desc";
											sql_data($query_string, $two_info);
											$print = 0;
											for($j=0;$j<count($two_info);$j++){
												$info=array();
												$where_clause=" portal_h4_id = '".$two_info[$j]['Fmain_id']."' order by rank desc ";
												$tbl_name="sys_portal_h4_cnt";
												getall_data($tbl_name, $where_clause, $info);
												for($k=0;$k<count($info);$k++){
                                        ?>
                                        <li <?=(($print==0)?' class="active"':'')?>>
                                            <a href="javascript:;" data-month="<?=$two_info[$j]['menu_name']?>"></a>
                                        </li>
                                        <?
	                                        	$print++;
	                                        	}
	                                        }
                                        ?>
                                        <li></li>
                                    </ul>
                                    <div class="monthBtn">
                                        <a href="javascript:;" class="leftBtn noPage"></a>
                                        <span></span>
                                        <a href="javascript:;" class="rightBtn"></a>
                                    </div>
                                </div>
                            </div>
                            <ul class="content">
                                <?
                                    $set_color = array("輝葉"=>"#EFC9B8","輝葉良品"=>"#DFD5C9","KIDMORY"=>"#F6DEB5","HYD"=>"#B1E0D7","decopop"=>"#BCD4EC");
                                    $two_info = array();
									$query_string = "select p.Fmain_id, p.menu_name, p.rank, f.parent_source_id , f.source_id ,f.source_table from sys_portal_h4 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_h4' and f.parent_source_id = '".$first_info[$i]['Fmain_id']."' group by p.Fmain_id order by CAST(p.menu_name AS UNSIGNED) desc";
									sql_data($query_string, $two_info);#show_array($two_info);
									$print = 0;
									for($j=0;$j<count($two_info);$j++){
										$info=array();
										$where_clause=" portal_h4_id = '".$two_info[$j]['Fmain_id']."' order by rank desc ";
										$tbl_name="sys_portal_h4_cnt";
										getall_data($tbl_name, $where_clause, $info);
										for($k=0;$k<count($info);$k++){											
											$pic_arr = explode(",", $info[$k]['pic_field_2']);
			            
								            $pic_info = array();
								            $where_clause = "Fmain_id = '".$pic_arr[0]."'";
								            $tbl_name = "sys_file";
								            get_data($tbl_name, $where_clause, $pic_info);
								            $pic = "login_admin/upload_file/".$pic_info["file_path"];
								            
								            $youtube_url = $info[$k]['text_field_1'];
								            preg_match('/youtube\.com\/(v\/|watch\?v=)([\w\-]+)/', $youtube_url, $match);
								            $youtube_id = $match[2];
								            if(!$youtube_id){
								            	$match=explode("/", $youtube_url);
								            	$youtube_id = $match[count($match)-1];
								            }
								            
								            if($youtube_id){
									            $pic = "http://img.youtube.com/vi/".$youtube_id."/default.jpg";
								            }
								            
                                ?>
                                <li <?=(($print==0)?' class="active"':'')?>>
                                    <div class="txt">
                                        <div class="tag">
                                            <!-- 五個品牌五個不同底色 -->
                                            <span style="background: <?=$set_color[$info[$k]['customer_field_0']]?>;"><?=$info[$k]['customer_field_0']?></span>
                                        </div>
                                        <div class="intro"><?=nl2br($info[$k]['textarea_field_3'])?></div>
                                    </div>
                                    <div class="img" style="background: url('<?=$pic?>') center / contain no-repeat">
                                        <?
	                                        if($youtube_id){
                                        ?>
                                        <div class="video" id="player<?=$total_print?>" data-video="<?=$youtube_id?>"></div>
                                        <?
	                                        	$total_print++;
	                                        }
                                        ?>
                                    </div>
                                </li>
                                <?
                                    		$print++;
                                    	}
                                    }
                                ?>
                                
                            </ul>
                        </div>
                        <?
	                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        include "quote/template/footer.php";
        include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/main.js"></script>
    <script src="dist/js/about.js"></script>
</body>

</html>