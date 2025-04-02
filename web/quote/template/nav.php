<header>
    <div class="header">
        <div class="logo_with_btn">
            <div class="hamMenu mo">
                <div class="burger menu-ham" id="menu-ham">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="closeMenu">
                    <span></span>
                    <span></span>
                </div>
            </div>
            <a href="index.php" class="container-logo">
                <img src="dist/images/common/logo.svg" alt="logo">
            </a>
        </div>
        <div class="menuBox">
            <nav class="container-menu">
                <ul class="menu">
                    <li>
                        <a class="menu-list" href="javascript:;">
                            <span>品牌旗艦館</span>
                        </a>
                        <ul class="menu-second">
                            <?
                            $i2_info = array();
		                    $query_string = "select p.Fmain_id, p.is_hide , p.menu_name, p.the_logo, p.rank, f.parent_source_id , f.source_id , f.source_table from sys_portal_i2 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_i2' and f.parent_source_id= '0' and p.is_hide != '1' group by p.Fmain_id order by p.rank desc";
		                    sql_data($query_string, $i2_info);
		                    for($ii=0;$ii<count($i2_info);$ii++){
			                    $i2_s_info = array();
			                    $query_string = "select p.Fmain_id, p.is_hide, p.menu_name, p.menu_name_en, p.rank, f.parent_source_id , f.source_id , f.source_table from sys_portal_i2 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_i2' and f.parent_source_id= '".$i2_info[$ii]['Fmain_id']."'  and p.is_hide != '1' group by p.Fmain_id order by p.rank desc";
			                    sql_data($query_string, $i2_s_info);
			                    
			                    $pic_url = "";
				                $pic_arr = get_pic_path($i2_info[$ii]['the_logo']);
				                if(count($pic_arr)>0){
				                    $pic_url = "./login_admin/upload_file/".$pic_arr['pic_file'];
				                }
	                    	?>
                            <li class="brand">
                                <a href="brand.php?folder_id=<?=$i2_info[$ii]['Fmain_id']?>">
                                    <span class="pc_991"><?=$i2_info[$ii]['menu_name']?></span>
                                    <?
	                                    if($pic_url){
                                    ?>
                                    <div class="mo_991"><img src="<?=$pic_url?>"></div>
                                    <?
	                                    }
                                    ?>
                                </a>
                                <ul class="pc_991">
                                    <?
	                                    for($jj=0;$jj<count($i2_s_info);$jj++){
                                    ?>
                                    <li>
                                        <a href="brand.php?folder_id=<?=$i2_s_info[$jj]['Fmain_id']?>"><?=$i2_s_info[$jj]['menu_name']?></a>
                                    </li>
                                    <?
	                                    }
                                    ?>
                                </ul>
                            </li>
                            <?
	                            }
                            ?>
                        </ul>
                    </li>
                    <?
	                    $x100_info = array();
	                    $query_string = "select p.Fmain_id, p.is_hide , p.menu_name, p.rank, f.parent_source_id , f.source_id , f.source_table from sys_portal_x100 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_x100' and f.parent_source_id= '0' and p.is_hide != '1' group by p.Fmain_id order by p.rank desc";
	                    sql_data($query_string, $x100_info);
	                    #show_array($x100_info);
	                    for($ii=0;$ii<count($x100_info);$ii++){
                            $x100_s_info = array();
		                    $query_string = "select p.Fmain_id, p.is_hide, p.menu_name, p.menu_name_en, p.rank, f.parent_source_id , f.source_id , f.source_table from sys_portal_x100 AS p inner join sys_folder_record AS f ON f.source_id = p.Fmain_id WHERE f.source_table = 'sys_portal_x100' and f.parent_source_id= '".$x100_info[$ii]['Fmain_id']."'  and p.is_hide != '1' group by p.Fmain_id order by p.rank desc";
		                    sql_data($query_string, $x100_s_info);
		                    #show_array($x100_s_info);
		                    if(count($x100_s_info)){
                    ?>
                    <li>
                        <a class="menu-list" href="javascript:;">
                            <span><?=$x100_info[$ii]['menu_name']?></span>
                        </a>
                        <ul class="menu-second">
                            <?

			                    for($jj=0;$jj<count($x100_s_info);$jj++){
				                    $pic_url = "";
					                $pic_arr = get_pic_path($x100_s_info[$jj]['menu_name_en']);
					                if(count($pic_arr)>0){
					                    $pic_url = "./login_admin/upload_file/".$pic_arr['pic_file'];
					                }
                            ?>
                            <li class="item">
                                <a href="product.php?folder_id=<?=$x100_s_info[$jj]['Fmain_id']?>">
                                    <?
	                                    if($pic_url){
                                    ?>
                                    <div>
                                        <img src="<?=$pic_url?>">
                                    </div>
                                    <?
	                                    }
                                    ?>
                                    <span><?=$x100_s_info[$jj]['menu_name']?></span>
                                </a>
                            </li>
                            <?
	                            }
                            ?>
                        </ul>
                    </li>
                    <?
	                    	}
	                    }
                    ?>
                    <li>
                        <a class="menu-list" href="javascript:;">
                            <span>最新活動</span>
                        </a>
                        <ul class="menu-second">
                            <?
	                            $event_info=array();
	                            $where_clause=" is_hide = '2' order by rank desc ";
	                            $tbl_name="sys_new_event_list";	//$MYSQL_TABS['portal_b2']
	                            getall_data($tbl_name, $where_clause, $event_info);
	                            for($i=0;$i<count($event_info);$i++){
		                            $pic_path = get_pic_path_2($event_info[$i]['new_event'])['pic_file'];
                            ?>
                            <li class="campaign">
                                <a href="new-event.php?v=<?=$event_info[$i]['Fmain_id']?>">
                                    <div>
                                        <img src="<?=$pic_path?>">
                                    </div>
                                    <span><?=$event_info[$i]['set_product_sale_title']?></span>
                                </a>
                            </li>
                            <?
	                            }
                            ?>
                        </ul>
                    </li>
                    <li>
                        <a class="menu-list mo_link" href="flagship-store.php">
                            <span>門市查詢</span>
                        </a>
                        <ul class="menu-second store">
                            <li>
                                <a href="flagship-store.php">
                                    <span>輝葉良品旗艦店</span>
                                </a>
                            </li>
                            <li>
                                <a href="location.php">
                                    <span>實體門市</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="menu-list mo_link" href="javascript:;"></a></li>
                </ul>
            </nav>
        </div>
        <div>
            <ul class="menu_icon">
                <!-- 已登入狀態加上class: login -->
                <li<?=(($_COOKIE['member_userid'] != "")?' class="login"':'')?>>
                    <a href="login.php" class="pc_991">
                        <div class="member_icon"></div>
                    </a>
                    <a href="javascript:;" class="mo_991 member_icon_btn">
                        <div class="member_icon"></div>
                    </a>
                    <div class="member_menu_list">
                        <div class="member_row">
                            <div><a href="member.php">會員專區</a></div>
                            <div class="mo_991 line"></div>
                            <div><a href="logout.php">登出</a></div>
                        </div>
                        <div class="close_member" id="close_member">
                            <div class="close"></div>
                        </div>
                    </div>
                </li>
                <li>
        <?
        $cart_num = 0;
   	    if($_SESSION['uniqid_str']){
   		    $y100_info=array();
   		    $where_clause=" uniqid_str = '".$_SESSION['uniqid_str']."' and is_confirm != '1'  ";
   		    $tbl_name="sys_portal_y100";
   		    get_data($tbl_name, $where_clause, $y100_info);

   		    $y100_cnt_info=array();
   		    $where_clause=" portal_y100_id = '".$y100_info['Fmain_id']."' ";
   		    $tbl_name="sys_portal_y100_cnt";
   		    getall_data($tbl_name, $where_clause, $y100_cnt_info);
   		    $cart_num = count($y100_cnt_info);
   	    }

   	    if($_COOKIE['member_userid'] == "")
   	       $car_a="javascript:alert('您尚未登入會員，請先登入後再進行操作，謝謝!');location.replace('login.php?back_url=".rawurlencode($_SERVER['REQUEST_URI'])."');";
   	    else
   	       $car_a="cart.php";
        ?>
                    <a href="<?=$car_a?>">
                        <div class="shop_icon">
                            <span class="num mcount"><?=$cart_num?></span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" id="search_icon">
                        <div class="search_icon"></div>
                    </a>
                    <div class="searchBox">
	                    <form id='form_s' name='form_s' method='get' action='search.php' >
                        <div class="search_input">
                                                       
                            <input id="search_q" name="q" type="text" Placeholder="請輸入商品名稱、型號等關鍵字">
                            <a href="javascript:$('#button').click();">
                                <div class="search"></div>
                            </a>
                            <input style="display: none;" type='submit' name='button' id='button' value=''>
                            
                        </div>
                        </form>
                        <div class="line"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <script>
	    function send_search(){
		    location.replace("search.php?q="+$('#search_q').val());
	    }
    </script>
</header>