    <?php
	    session_start();
	    include "quote/template/head.php";
	    require_once ("global_include_file.php");

    $cnt_id = $_GET['cnt_id'];
    $num = $_GET['num'];
    $kol_id = $_GET['kol_id'];

    if($kol_id){
	    $_SESSION['kol_id'] = $kol_id;
    }
    else{
	    $_SESSION['kol_id'] = "";
    }


    if($kol_id != "" )
    {
//       $today=date("Y-m-d H:i:s");
       $today=date("Y-m-d");

       $search_info=array();
       $where_clause="Fmain_id = '".AddSlashes($kol_id)."' and (sys_start_date <= '$today' and sys_end_date >= '$today') and radio_field_1!='是'";# and is_hide='2'
//print $where_clause;
//exit;
       $tbl_name="sys_portal_j3";
       get_data($tbl_name, $where_clause, $search_info);
       //show_array($search_info);

       if(count($search_info) <= 0)
       {
           mb_http_output ("UTF-8");
           mb_internal_encoding("UTF-8");
           ob_start ("mb_output_handler");
           print "<script>";
           print "alert('活動已經結束');";
           print "location.href='index.php';";
           print "</script>";
           exit;
       }

       $kol_info=array();
       $kol_info=$search_info;

       $_SESSION['kol_id']=$kol_id;



    }

	if($num){
	    $temp_info=array();
	    $where_clause="text_field_1 = '".AddSlashes($num)."'";# and is_hide='2'
	//    print $where_clause;
	    $tbl_name="sys_portal_x100_cnt";
	    get_data($tbl_name, $where_clause, $temp_info);
	    //show_array($temp_info);

	    if($temp_info['Fmain_id'] != "")
	    $cnt_id=$temp_info['Fmain_id'];
	}


    $today = date("Y-m-d");
    $time_sql = " and sys_start_date<='".$today."' and sys_end_date>='".$today."'";
    $info=array();
    $where_clause="Fmain_id='".$cnt_id."' ".$time_sql." ";# and is_hide='2'
    $tbl_name="sys_portal_x100_cnt";
    get_data($tbl_name, $where_clause, $info);
    #print $_GET['cnt_id'];show_array($info);

    if(count($info) <= 0)
    {
       print "<script>location.replace('error404.php');</script>";
		     exit;
    }

/*
	if($info['is_hide'] == "1" && !$kol_id){
		print "<meta name=\"robots\" content=\"noindex,nofollow\" />";
		print "無此商品";
		print "<script>location.replace('index.php');</script>";
		exit;
	}
*/
    $is_en = "";
    $lang_str= "lang_tw";
    if($_COOKIE['lang_id']=="3"){
        $is_en = 1;
        $lang_str= "lang_en";
    }


//    if($is_en && $info['pic_field_15']!=""){
//        $pic_num = explode(",", $info['pic_field_15'])[0];
//    }else{
        $pic_num = explode(",", $info['pic_field_6'])[0];
//    }

    // $pic_path = get_pic_path_2($pic_num)['pic_file'];
//print $info['Fmain_id'];
//exit;
//    $price_arr = (get_x100_cnt_price($info['Fmain_id']));
    $price_arr = get_x100_cnt_price($info['Fmain_id']);
//    show_array($price_arr);
//exit;
    $all_cnt_about_info=array(); //相關商品
    $where_clause="1 and x100_cnt_id ='".$cnt_id."'";
    $tbl_name="sys_portal_x100_cnt_about";
    getall_data($tbl_name, $where_clause, $all_cnt_about_info);
    // show_array($all_cnt_about_info);exit;


    $all_cnt_add_buy_info=array(); //加購產品
    $where_clause="1 and x100_cnt_id ='".$cnt_id."' order by Fmain_id asc";
    $tbl_name="sys_portal_x100_cnt_add_buy";
    getall_data($tbl_name, $where_clause, $all_cnt_add_buy_info);
    // show_array($all_cnt_add_buy_info);exit;
	#檢查加購品的庫存數
	$new_add_buy = array();
	for($i=0;$i<count($all_cnt_add_buy_info);$i++){
		#show_array($all_cnt_add_buy_info[$i]);
		$add_info=array();
		$where_clause=" Fmain_id = '".$all_cnt_add_buy_info[$i]['product_id']."' ";
		$tbl_name="sys_portal_j6";	//$MYSQL_TABS['portal_b2']
		get_data($tbl_name, $where_clause, $add_info);
		#show_array($add_info);
		if($add_info['text_field_4'] == 0 && strlen($add_info['text_field_4']) == 1){
			#unset($all_cnt_add_buy_info[$i]);
		}
		else{
			$new_add_buy[] = $all_cnt_add_buy_info[$i];
		}
	}
	$all_cnt_add_buy_info = array();
	$all_cnt_add_buy_info = $new_add_buy;
/*
    $all_cnt_gift_info=array(); //贈品資訊
    $where_clause="1 and x100_cnt_id ='".$cnt_id."' order by Fmain_id asc";
    $tbl_name="sys_portal_x100_cnt_gift";
    getall_data($tbl_name, $where_clause, $all_cnt_gift_info);
*/
    // show_array($all_cnt_gift_info);exit;
    $all_cnt_gift_info=array(); //贈品資訊(新)
    $gift_info=array();
    $where_clause=" set_product_sale_start <= '".date("Y-m-d")."' and set_product_sale_end >= '".date("Y-m-d")."' and (set_product_sale_range = '1' or set_product_sale_range_product_id = '".$cnt_id."' or set_product_sale_range_product_id like '".$cnt_id.",%' or set_product_sale_range_product_id like '%,".$cnt_id.",%' or set_product_sale_range_product_id like '%,".$cnt_id."' ) ";
    $tbl_name="sys_set_sale_gift_list";	//$MYSQL_TABS['portal_b2']
    getall_data($tbl_name, $where_clause, $gift_info);
    for($i=0;$i<count($gift_info);$i++){
	    $gift_arr = explode("`", $gift_info[$i]['set_gift_id']);
	    foreach($gift_arr as $gift_id){
		    $j4_info=array();
		    $where_clause=" Fmain_id = '".$gift_id."' ";
		    $tbl_name="sys_portal_j4";	//$MYSQL_TABS['portal_b2']
		    get_data($tbl_name, $where_clause, $j4_info);
		    $all_cnt_gift_info[] = array("Fmain_id"=>$j4_info['Fmain_id'],"x100_cnt_id"=>$cnt_id,"product_name"=>$j4_info['text_field_0'],"product_pic"=>$j4_info['pic_field_1'],"give_num"=>$j4_info['text_field_2'],"add_money"=>$j4_info['text_field_3'],"content"=>$j4_info['textarea_field_4'],"amount"=>((strlen($j4_info['text_field_5'])==0)?"不限":$j4_info['text_field_5']));
	    }
    }

    if($kol_id && $kol_info['product_id']==$cnt_id){
	    $all_cnt_gift_info=array(); //贈品資訊
	    $where_clause="1 and x100_cnt_id ='".$kol_id."'";
	    $tbl_name="sys_portal_j3_gift";
	    getall_data($tbl_name, $where_clause, $all_cnt_gift_info);
	    // show_array($all_cnt_gift_info);exit;
    }


    $all_size_info=array(); //尺寸選擇
    if($info['is_show_size'] == "是")
    {
       $where_clause="1 and portal_x100_cnt_id ='".$cnt_id."'";
       $tbl_name="sys_portal_x100_cnt_size";
       getall_data($tbl_name, $where_clause, $all_size_info);
//        show_array($all_size_info);exit;  // size_name price member_price text_field_10 庫存
    }


    $x100_id_2_arr = explode(",", str_replace("@", "", $info['portal_x100_id_2']));
    $x100_id_2_arr[] = $info['portal_x100_id'];
    #show_array($x100_id_2_arr);
    #分類排序開始#
    $select_info=array();
    $where_clause=" 1 order by rank desc ";
    $tbl_name="sys_portal_x100";
    getall_data($tbl_name, $where_clause, $select_info);
    $new_x100_id_2 = array();
    for($i=0;$i<count($select_info);$i++){
	    if(in_array($select_info[$i]['Fmain_id'], $x100_id_2_arr)){
		    $new_x100_id_2[] = $select_info[$i]['Fmain_id'];
	    }
    }
    $x100_id_2_arr = array();
    $x100_id_2_arr = $new_x100_id_2;
	#分類排序結束#

	$portal_i2_id_arr = explode(",", str_replace("@", "", $info['portal_i2_id']));
	#找出品牌
	$brand_id = "";
	for($iii=0;$iii<count($portal_i2_id_arr);$iii++){
		if($portal_i2_id_arr[$iii]){print "<BR><BR><BR>".$portal_i2_id_arr[$iii]."<BR>";
			$this_owner_num=$info['owner_num'];
			$f1_info=array();
			$where_clause=" source_table = 'sys_portal_i2' and source_id = '".$portal_i2_id_arr[$iii]."' ";
			$tbl_name="sys_folder_record";	//$MYSQL_TABS['portal_b2']
			get_data($tbl_name, $where_clause, $f1_info);
			#show_array($f1_info);
			if($f1_info['parent_source_id'] == "0"){
				$brand_id = $f1_info['source_id'];
			}
			else{
				$f2_info=array();
				$where_clause=" source_table = 'sys_portal_i2' and source_id = '".$f1_info['parent_source_id']."' ";
				$tbl_name="sys_folder_record";	//$MYSQL_TABS['portal_b2']
				get_data($tbl_name, $where_clause, $f2_info);
				if($f2_info['parent_source_id'] == "0"){
					$brand_id = $f2_info['source_id'];
				}
				else{
					$f3_info=array();
					$where_clause=" source_table = 'sys_portal_i2' and source_id = '".$f2_info['parent_source_id']."' ";
					$tbl_name="sys_folder_record";	//$MYSQL_TABS['portal_b2']
					get_data($tbl_name, $where_clause, $f3_info);
					if($f3_info['parent_source_id'] == "0"){
						$brand_id = $f3_info['source_id'];
					}
					else{
						$f4_info=array();
						$where_clause=" source_table = 'sys_portal_i2' and source_id = '".$f3_info['parent_source_id']."' ";
						$tbl_name="sys_folder_record";	//$MYSQL_TABS['portal_b2']
						get_data($tbl_name, $where_clause, $f4_info);
						if($f4_info['parent_source_id'] == "0"){
							$brand_id = $f4_info['source_id'];
						}
					}
				}
			}
		}
	}
	#print "<br><br><br><br><br>MIKU=".$brand_id;

    require_once("include_kol_info.php");



    /******************************
      取得該商品有沒有符合滿件優惠活動
    *******************************/

    if($_SESSION['kol_id'] != "" and $kol_info['product_id'] == $cnt_id)
    {
        $get_product_sale_amount_info=array();
    }
    else
    {

       $get_product_sale_amount_info=get_check_product_sale_amount_info($cnt_id);
//show_array($get_product_sale_amount_info);
//       exit;
    }


    /******************************
      取得該商品有沒有符合滿額優惠活動
    *******************************/
    if($_SESSION['kol_id'] != "" and $kol_info['product_id'] == $cnt_id)
    {

        $get_set_product_sale_info=array();
    }
    else
    {

       $get_set_product_sale_info=get_check_product_sale_info($cnt_id);
    }


    $active_arr = array();

//    if($get_set_product_sale_info['title'] != "")
    for($i=0;$i<count($get_set_product_sale_info);$i++)
    {
        $active_arr[] = ["id"=>$get_set_product_sale_info[$i]['id'],"name"=>$get_set_product_sale_info[$i]['title'],"end_date"=>$get_set_product_sale_info[$i]['end_date'],"type"=>"total"];
    }

//    if($get_product_sale_amount_info['title'] != "")
    for($i=0;$i<count($get_product_sale_amount_info);$i++)
    {
        $active_arr[] = ["id"=>$get_product_sale_amount_info[$i]['id'],"name"=>$get_product_sale_amount_info[$i]['title'],"end_date"=>$get_product_sale_amount_info[$i]['end_date'],"type"=>"amount"];
    }

//print count($active_arr);
//exit;
//show_array($active_arr);
//exit;
	$pic_arr = explode(",", $info['pic_field_6']);
	$image_link = get_pic_path_2($pic_arr[0])['pic_file'];

	if($info['pic_bak_6']){
		$big_pic_arr = explode(",", $info['pic_bak_6']);
	}
	else{
		$big_pic_arr = explode(",", $info['pic_field_6']);
	}

	$price_arr = (get_x100_cnt_price($info['Fmain_id']));
//	show_array($price_arr);
//	exit;



 if($_SESSION['kol_id'] != "")
 {
     if($info['Fmain_id'] == "")
     {
        print "<script>location.href='product.php';</script>";
        exit;
     }

     $kol_info=array(); //尺寸選擇
     $where_clause="1 and Fmain_id ='".$_SESSION['kol_id']."' and product_id ='".$info['Fmain_id']."' ";
//print $where_clause;
//exit;
     $tbl_name="sys_portal_j3";
     get_data($tbl_name, $where_clause, $kol_info);
     // show_array($kol_info);exit;

    if(count($kol_info)>0){
        $price_arr['price_3']=$kol_info['price'];
    }

 }
	if($price_arr['price_3'])	$price = $price_arr['price_3'];
	else if($price_arr['price_2'])	$price = $price_arr['price_2'];
	else	$price = $price_arr['price_1'];
//	show_array($price_arr);
//	exit;
	if($info['radio_field_16'] == "預購" and 0)
	   $availability = "OutOfStock";
	else{
		if($info['is_show_size']=="是"){

			$all_size_info2=array();
			$where_clause="1 and portal_x100_cnt_id ='".$info['Fmain_id']."'";
			$tbl_name="sys_portal_x100_cnt_size";
			getall_data($tbl_name, $where_clause, $all_size_info2);

			for($aa=0;$aa<count($all_size_info2);$aa++){
				if($all_size_info2[$aa]['text_field_10']){
					$availability = "InStock";
				}
			}
			if(!$availability)	$availability = "OutOfStock";
		}
		else{
			if($info['stock']){
				$availability = "InStock";
			}
			else{
				$availability = "OutOfStock";
			}
		}
	}
    ?>
    <link rel="stylesheet" href="dist/css/product-detail.css?v06">
    <div>
<div itemtype="http://schema.org/Product" itemscope>
<meta itemprop="name" content="<?=$info['text_field_0']?>" />
<meta itemprop="image" content="<?=$global_website_url.str_replace("./","",$image_link)?>" />
<meta itemprop="description" content="<?=strip_tags(str_replace("@@@","；",$info['html_field_4']))?>" />
<meta itemprop="productID" content="<?=$info['Fmain_id']?>" />
<div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
<meta itemprop="price" content="<?=$price?>" />
<meta itemprop="priceCurrency" content="TWD" />
<meta itemprop="availability" content="<?=$availability?>" />
</div>
</div>
</div>
</head>
<body class="<?=$lang_str?>">
        <!-- 加購商品的查看贈品 start -->
        <div class="modalBgProduct" id="modalBgProduct" style="display: none">
            <?
                for($iii=0;$iii<count($all_cnt_gift_info);$iii++){

/*
                if($all_cnt_gift_info[$iii]['product_id']!=""){
                    $each_info=array();
                    $where_clause="Fmain_id='".$all_cnt_gift_info[$iii]['product_id']."'";
                    $tbl_name="sys_portal_x100_cnt";
                    get_data($tbl_name, $where_clause, $each_info);
                    // show_array($each_info);

                    $product_name = $each_info['text_field_0'];
                    $pic_url = get_pic_path_2(explode(',',$each_info['pic_field_6'])[0])['pic_file'];
                }else{
*/
                    $product_name = $all_cnt_gift_info[$iii]['product_name'];
                    $pic_url = get_pic_path_2($all_cnt_gift_info[$iii]['product_pic'])['pic_file'];
//                             }

            ?>
            <div class="popupProduct" id="popupProduct<?=$all_cnt_gift_info[$iii]['Fmain_id']?>" style="display: none">
                <div class="modal-content">
                    <div class="popupTitle">
                        <?=$gift_info[0]['set_product_sale_title']?>
                    </div>
                    <div class="imgTxt">
                        <div class="img">
                            <!-- 64 * 65 -->
                            <img src="<?=$pic_url?>" alt="">
                        </div>
                        <div class="txt">
                            <div class="proTitle">
                                <i><?=$product_name?></i>
                                <?
                                if($all_cnt_gift_info[$iii]['add_money'] != "")
                                {
                                ?>
                                <span class="price">
                                    市價  $<?=$all_cnt_gift_info[$iii]['add_money']?>
                                </span>
                                <?
                                }
                                ?>
                            </div>
                            <div class="intro">
                                <span>
                                    <?=nl2br($all_cnt_gift_info[$iii]['content'])?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="closeIcon">
                    <img src="dist/images/productPage/close-bt.png">
                </div>
            </div>
            <?
                }
            ?>
        </div>
        <!-- 加購商品的查看贈品 end -->
<script type="application/ld+json">
{
"@context": "https://schema.org/",
"@type": "Product",
"name": "<?=$info['text_field_0']?>",
"image":"<?=$global_website_url.str_replace("./","",$image_link)?>",
"description": "<?=strip_tags(str_replace("@@@","；",$info['html_field_4']))?>",
"productID": "<?=$info['Fmain_id']?>",
"offers": {
"price": "<?=$price?>",
"priceCurrency": "TWD",
"availability": "<?=$availability?>"
}
}
</script>
        <?php
            include "quote/template/added.php";
            include "quote/template/nav.php";
        ?>
        <main class="productDetailPage">
        <form name="buy_form" id="formId" target="" method="post" action="cart.php">
            <div class="fixedBuy">
                <div class="fixedLeft">
                    <div class="img"><img src="<?=$image_link?>" alt=""></div>
                    <div class="txt">
                        <?
	                        $first_size_info = array("id"=>"","name"=>"");
	                        for($iii=0;$iii<count($all_size_info);$iii++){

		                        if($all_size_info[$iii]['text_field_10']==""){
                                    if($first_size_info['id']==""){
                                        $first_size_info['id']=$all_size_info[$iii]['Fmain_id'];
                                        $first_size_info['name']=$all_size_info[$iii]['size_name'];
                                    }

                                }elseif($all_size_info[$iii]['text_field_10']>0){
                                    if($first_size_info['id']==""){
                                        $first_size_info['id']=$all_size_info[$iii]['Fmain_id'];
                                        $first_size_info['name']=$all_size_info[$iii]['size_name'];
                                    }
                                }
	                        }
                        ?>
                        <div class="fixedTitle"><i><?=$info['text_field_0']?></i><span id="title_size"><?=$first_size_info['name']?></span></div>
                        <div class="price">
	                        <?if($price_arr['price_3']!=""){?>
		                                <span class="specialOffer">$<?=number_format($price_arr['price_3'])?></span>
		                                <?
			                                if($price_arr['price_1'] && $price_arr['price_1'] != $price_arr['price_3']){
				                        	?>
				                        		<span class="originalPrice">$<?=number_format($price_arr['price_1'])?></span>
											<?
			                                }
			                                else if($price_arr['price_2'] && $price_arr['price_2'] != $price_arr['price_3']){
				                            ?>
				                        		<span class="originalPrice">$<?=number_format($price_arr['price_2'])?></span>
											<?
			                                }
		                                ?>
		                            <?}elseif(count($price_arr)>1){?>
		                                <span class="specialOffer">$<?=number_format($price_arr['price_2'])?></span>
		                                <span class="originalPrice">$<?=number_format($price_arr['price_1'])?></span>
		                            <?}elseif($price_arr['price_1']!=""){?>
		                                <span class="specialOffer">$<?=number_format($price_arr['price_1'])?></span>
		                            <?}elseif($price_arr['price_2']!=""){?>
		                                <span class="specialOffer">$<?=number_format($price_arr['price_2'])?></span>
		                            <?}?>
<!--
                            <span class="specialOffer">$6,922</span>
                            <span class="originalPrice">$6,600</span>
-->
                        </div>
                    </div>
                </div>
                   <!-- 售完加上class+"soldout" -->
                <div class="fixedRight soldout">
                <a href="javascript:submit_shopcar();">
                <div class="cartIcon"></div>
                        <span class="normal">加入購物車</span>
                        <span class="sold_out">售完補貨中</span>
                </a>
                </div>
            </div>
            <?
	            $pic_arr = explode(",", $info['pic_field_6']);
            ?>
            <div class="productBox">
                <div class="container">
                    <div class="productBoxSwiper">
                        <div class="s_imgBox">
                            <!-- 147 * 162 -->
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper">
                                <div class="swiper-wrapper">
	                                <?for($iii=0;$iii<count($big_pic_arr);$iii++){?>
			                            <div class="swiper-slide">
	                                        <img src="<?=get_pic_path_2($big_pic_arr[$iii])['pic_file']?>" />
	                                    </div>
			                        <?}?>
<!--
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/b_img.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_1.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_2.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_3.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_4.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_1.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_2.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_3.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_4.jpg" />
                                    </div>
-->
                                </div>
                            </div>
                        </div>
                        <div class="b_imgBox">
                            <div class="icon">
                                <!--
                                    icon共有4張
                                    icon_1  NEW
                                    icon_2  HOT
                                    icon_3  SALE
                                    icon_4  預購
                                -->
                                <?
	                                if($info['radio_field_16'] == "NEW"){
		                                ?>
		                                <img src="dist/images/common/icon_1.png" alt="">
		                                <?
	                                }
	                                else if($info['radio_field_16'] == "HOT"){
		                                ?>
		                                <img src="dist/images/common/icon_2.png" alt="">
		                                <?
	                                }
	                                else if($info['radio_field_16'] == "SALE"){
		                                ?>
		                                <img src="dist/images/common/icon_3.png" alt="">
		                                <?
	                                }
	                                else if($info['radio_field_16'] == "預購"){
		                                ?>
		                                <img src="dist/images/common/icon_4.png" alt="">
		                                <?
	                                }
                                ?>

                            </div>
                            <!-- 700 * 770 -->
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
	                                <?for($iii=0;$iii<count($big_pic_arr);$iii++){?>
			                            <div class="swiper-slide">
                                        <?
	                                        if($iii==0 && $info['customer_field_69']){
		                                        $j10_info=array();
		                                        $where_clause=" Fmain_id = '".$info['customer_field_69']."' ";
		                                        $tbl_name="sys_portal_j10";	//$MYSQL_TABS['portal_b2']
		                                        get_data($tbl_name, $where_clause, $j10_info);
                                        ?>

                                        <div class="filter_img"><img src="<?=get_pic_path_2($j10_info['pic_field_1'])['pic_file']?>" alt=""></div>
	                                    <?
		                                        }
	                                        ?>
	                                        <img src="<?=get_pic_path_2($big_pic_arr[$iii])['pic_file']?>" class="<?=(($info['customer_field_69'])?"small_img":"big_img")?>" />
	                                    </div>
			                        <?}?>
<!--
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/b_img.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_1.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_2.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_3.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_4.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_1.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_2.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_3.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="dist/images/productPage/product_4.jpg" />
                                    </div>
-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="txtBox">
                        <div class="boxTop">
                            <ul class="tag">
	                            <?
		                            if($brand_id){
			                            $each_info=array();
		                                $where_clause="Fmain_id='".$brand_id."'";
		                                $tbl_name="sys_portal_i2";
		                                get_data($tbl_name, $where_clause, $each_info);
		                                // show_array($each_info);

		                                if(count($each_info)<1 or $each_info['is_hide'] == "1"){
		                                    continue;
		                                }
		                            ?>

		                                <li class="brandTxt">
		                                    <a href="brand.php?folder_id=<?=$each_info['Fmain_id']?>"><?=$each_info['menu_name']?></a>
		                                </li>
		                            <?
		                            }
	                            ?>
	                            <?for($iii=0;$iii<count($x100_id_2_arr);$iii++){

                                $each_info=array();
                                $where_clause="Fmain_id='".$x100_id_2_arr[$iii]."'";
                                $tbl_name="sys_portal_x100";
                                get_data($tbl_name, $where_clause, $each_info);
                                // show_array($each_info);

                                if(count($each_info)<1 or $each_info['is_hide'] == "1"){
                                    continue;
                                }
                            ?>

                                <li>
                                    <a href="product.php?folder_id=<?=$each_info['Fmain_id']?>"><?=$each_info['menu_name']?></a>
                                </li>
                            <?}?>
<!--
                                <li class="brandTxt">輝葉</li>
                                <li>按摩器材</li>
                                <li>生活家電</li>
                                <li>按摩墊</li>
-->
                            </ul>
                            <div class="info">
                                <div class="proId"><?=$info['text_field_1']?></div>
                                <div class="proName">
                                    <?=$info['text_field_0']?>
                                </div>
                                <div class="price">
                                    <?if($price_arr['price_3']!=""){?>
		                                <span class="specialOffer"><i>專屬特惠價</i>$<?=number_format($price_arr['price_3'])?></span>
		                                <?
			                                if($price_arr['price_1'] && $price_arr['price_1'] != $price_arr['price_3']){
				                        	?>
				                        		<span class="originalPrice">原價 <i>$<?=number_format($price_arr['price_1'])?></i></span>
											<?
			                                }
			                                else if($price_arr['price_2'] && $price_arr['price_2'] != $price_arr['price_3']){
				                            ?>
				                        		<span class="originalPrice">原價 <i>$<?=number_format($price_arr['price_2'])?></i></span>
											<?
			                                }
		                                ?>
		                            <?}elseif(count($price_arr)>1){?>
		                                <span class="specialOffer"><i>特惠價</i>$<?=number_format($price_arr['price_2'])?></span>
		                                <span class="originalPrice">原價 <i>$<?=number_format($price_arr['price_1'])?></i></span>
		                            <?}elseif($price_arr['price_1']!=""){?>
		                                <span class="specialOffer"><i>原價</i>$<?=number_format($price_arr['price_1'])?></span>
		                            <?}elseif($price_arr['price_2']!=""){?>
		                                <span class="specialOffer"><i>特惠價</i>$<?=number_format($price_arr['price_2'])?></span>
		                            <?}?>
<!--
                                    <span class="specialOffer"><i>特惠價</i>$6,922</span>
                                    <span class="originalPrice">原價<i>$6,600</i></span>
-->
                                </div>
                            </div>

                                    <?
			                        if(count($active_arr)>0)
			                        {
			                        ?>
			                <div class="activity">
                                <ul class="box">

			                            <?for($kkk=0;$kkk<count($active_arr);$kkk++){?>
	                                <li>
                                        <div class="name">
			                                <a href="product-event.php?type=<?=$active_arr[$kkk]['type']?>&id=<?=$active_arr[$kkk]['id']?>" target="_blank"><?=$active_arr[$kkk]['name']?></a>
			                            </div>
			                            <div class="date">活動至<?=$active_arr[$kkk]['end_date']?>截止</div>
                                    </li>
			                            <?}?>
<!--
                                    <li>
                                        <div class="name">
                                            <a href="product-event.php">｜年終慶｜全館滿額贈</a>
                                        </div>
                                        <div class="date">活動至2024.02.20截止</div>
                                    </li>
                                    <li>
                                        <div class="name"><a href="product-event.php">新年促銷優惠開跑囉！滿額送點</a></div>
                                        <div class="date">活動至2024.02.28截止</div>
                                    </li>
                                    <li>
                                        <div class="name"><a href="product-event.php">新年促銷優惠開跑囉！滿額送點</a></div>
                                        <div class="date">活動至2024.02.28截止</div>
                                    </li>
-->
			                    </ul>
                            </div>

			                        <?
			                        }
			                        ?>


                        </div>
                        <div class="contentBox">
	                        <ul>
	                        <?
		                        $field_4_arr = explode("@@@", $info['html_field_4']);
		                        foreach($field_4_arr as $field_4){
			                        if($field_4){
				                        print "<li>".$field_4."</li>";
			                        }
		                        }
	                        ?>
                        	</ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="buyBox">

                <div class="container">
            <?
                if(count($all_cnt_gift_info) > 0)
                {
            ?>
                    <!-- 如果是單選樣式 buyLeft 增加 class="hasRadio" -->
                    <div class="buyLeft <?=(($gift_info[0]['is_add'] == "2")?" hasRadio":"")?>">

                        <div class="buyTitle">
                            贈品<span>期間 <?=str_replace("-","/",$gift_info[0]['set_product_sale_start'])?>至<?=str_replace("-","/",$gift_info[0]['set_product_sale_end'])?></span>
                        </div>
                        <ul>
                            <?
	                        $has_checked = "";
	                        for($iii=0;$iii<count($all_cnt_gift_info);$iii++){

/*
                            if($all_cnt_gift_info[$iii]['product_id']!=""){
                                $each_info=array();
                                $where_clause="Fmain_id='".$all_cnt_gift_info[$iii]['product_id']."'";
                                $tbl_name="sys_portal_x100_cnt";
                                get_data($tbl_name, $where_clause, $each_info);
                                // show_array($each_info);

                                $product_name = $each_info['text_field_0'];
                                $pic_url = get_pic_path_2(explode(',',$each_info['pic_field_6'])[0])['pic_file'];
                            }else{
*/
                                $product_name = $all_cnt_gift_info[$iii]['product_name'];
                                $pic_url = get_pic_path_2($all_cnt_gift_info[$iii]['product_pic'])['pic_file'];
//                             }
							if(strlen($has_checked)==0 && $all_cnt_gift_info[$iii]['amount']!="0"){
								$has_checked = $iii;
							}
                        ?>
                            <li>
                                <?
                                    if( $gift_info[0]['is_add'] == "2"){
                                ?>
                                <input type="radio" name="give_id" id="hasRadio<?=($iii+1)?>"  value="<?=$all_cnt_gift_info[$iii]['Fmain_id']?>" <?=(($all_cnt_gift_info[$iii]['amount']=="0")?" disabled":(($iii==$has_checked)?" checked":""))?> >
                                <?
	                                    }
	                                    else{
		                                    ?>
		                            <input type="checkbox" name="give_id[]" value="<?=$all_cnt_gift_info[$iii]['Fmain_id']?>" checked style="display: none;" >
		                                    <?
	                                    }
                                    ?>
                                <label for="hasRadio<?=($iii+1)?>" class="s_title">
                                    <span><?=$product_name?></span>
                                </label>
                                <!-- 兌換完畢 a 加上 class="sellout" -->
                                <a href="javascript:$('.popupProduct').hide();$('#popupProduct<?= $all_cnt_gift_info[$iii]['Fmain_id'] ?>').show();" <?=(($all_cnt_gift_info[$iii]['amount']=="0")?" class='sellout'":"")?>>
                                    <span class="view">查看贈品</span>
                                    <span class="finish">已兌換完畢</span>
                                </a>
                            </li>
                        <?
	                        }
                        ?>
<!--
                            <li>
                                <input type="radio" name="hasRadio" id="hasRadio2">
                                <label for="hasRadio2" class="s_title">
                                    <span>贈【輝葉】隔音避震專用地墊HY-B02</span>
                                </label>
                                <a href="javascript:;">查看贈品</a>
                            </li>
-->

                        </ul>

                    </div>
				<?
                }
                else{
	                ?>
	                <div class="buyLeft" style="background-color: #FFF;"></div>
	                <?
                }
                ?>
                    <div class="buyRight">
                        <?if(count($all_size_info)>0){
                            //size_name price member_price text_field_10 庫存
                            $stock_num = 0;
                            $size_arr = array();

                        ?>
                        <div class="specification">
                            <div>規格</div>
                            <ul>
                                <?for($iii=0;$iii<count($all_size_info);$iii++){

                                        $select = "";
                                        $salt_out_str = "";
										if($kol_info['Fmain_id']){
											$j3_size_info=array();
											$where_clause="portal_j3_id = '".$kol_info['Fmain_id']."' and size_id = '".$all_size_info[$iii]['Fmain_id']."' ";
											$tbl_name="sys_portal_j3_size";
											get_data($tbl_name, $where_clause, $j3_size_info);
											if($j3_size_info['Fmain_id']){
												$all_size_info[$iii]['text_field_10'] = $j3_size_info['in_stock'];
											}
										}

										if($first_size_info['id'] == $all_size_info[$iii]['Fmain_id'])	$select = " checked";
                                        if($all_size_info[$iii]['text_field_10']==""){
                                            if($stock_num==0){
                                                $stock_num = 10;
                                            }

                                        }elseif($all_size_info[$iii]['text_field_10']>0){

                                            if($stock_num==0){
                                                #print $stock_num."<br>";
                                                if($all_size_info[$iii]['text_field_10']>10){
                                                    $stock_num = 10;
                                                }else{
                                                    $stock_num = $all_size_info[$iii]['text_field_10'];
                                                }
                                            }

                                        }else{
                                            $salt_out_str = "(已完售)";
                                            $select = "disabled";
                                        }

                                        if($all_size_info[$iii]['text_field_10']=="" || $all_size_info[$iii]['text_field_10']>10){
                                            $size_arr[$all_size_info[$iii]['Fmain_id']] = 10;
                                        }else{
                                            $size_arr[$all_size_info[$iii]['Fmain_id']] = $all_size_info[$iii]['text_field_10'];
                                        }


                                    ?>
                                <li>
                                    <input type="radio" name="p_size_id" id="specification<?=($iii+1)?>" value="<?=$all_size_info[$iii]['Fmain_id']?>" onclick="select_size('<?=$all_size_info[$iii]['Fmain_id']?>');$('#title_size').html('<?=$all_size_info[$iii]['size_name']?>');" <?=$select?>>
                                    <label for="specification<?=($iii+1)?>" <?=(($salt_out_str)?" style='color:#797979;'":"")?>><?=$all_size_info[$iii]['size_name'].$salt_out_str?></label>
                                </li>
                                    <?}?>

<!--
                                <li>
                                    <input type="radio" name="specification" id="specification2">
                                    <label for="specification2">松林綠</label>
                                </li>
                                <li>
                                    <input type="radio" name="specification" id="specification3">
                                    <label for="specification3">珊瑚粉</label>
                                </li>
-->
                            </ul>
                        </div>
                        	<script type="text/javascript">

                                var size_arr = <?php echo json_encode($size_arr);?>;

                                function select_size(size_id){
	                                $("#max_num").val(size_arr[size_id]);
	                                $("#select_amount").val("1");
			                        $("#now_number").html("1");
			                        $(".plus").removeClass("hidden");
			                        $(".minus").addClass("hidden");
/*

                                    var str = "";

                                    for (var i = 0; i < size_arr[size_id]; i++) {
                                        num = i+1;
                                        str+= "<option value='"+num+"'>"+num+"</option>";
                                    }

                                    $("#select_amount").html(str);
*/
                                }
                            </script>
                        <?}else{
                            if($kol_info['in_stock']){
	                            $info['stock'] = $kol_info['in_stock'];
                            }
                            $stock_num = 0;
                            if($info['stock']==""){
                                $stock_num = 10;
                            }elseif($info['stock']>0){
                                $stock_num = $info['stock'];
                            }

                        }

                        ?>
                        <?if($stock_num>0){?>
                        <script>
	                        function change_num(the_way){
		                        var now_num = $("#select_amount").val();
		                        if(the_way == "de"){
			                        if(now_num > 1){
				                        now_num = now_num*1 - 1;				                        
			                        }
		                        }
		                        else if(the_way == "add"){
			                        if(now_num*1 < $("#max_num").val()*1){
				                        now_num = now_num*1 + 1;	                        				                        
			                        }
		                        }
		                        if(now_num == 1){
			                        $(".minus").addClass("hidden");
		                        }
		                        else{
			                        $(".minus").removeClass("hidden");
		                        }
		                        if(now_num == $("#max_num").val()){
			                        $(".plus").addClass("hidden");
		                        }
		                        else{
			                        $(".plus").removeClass("hidden");
		                        }
		                        $("#select_amount").val(now_num);
		                        $("#now_number").html(now_num);
	                        }
                        </script>
                        <input type="hidden" name="amount" id="select_amount" value="1">
                        <input type="hidden" name="max_num" id="max_num" value="<?=$stock_num?>">
                        <div class="numBox">
                            <div>數量</div>
                            <div class="num">
                                <a href="javascript:change_num('de');" class="minus hidden"></a>
                                <span class="number" id="now_number">1</span>
                                <a href="javascript:change_num('add');" class="plus"></a>
                            </div>
                        </div>
                        <?}else if(0){?>
                            <div>
                                <span>已售完</span>
                            </div>
                        <?}?>
                        <?if($info['radio_field_16']=="預購"){?><div class="s_txt">最快出貨時間 <?=str_replace("/",".",$info['text_field_11'])?></div><?}?>
<!--                         <div class="s_txt">最快出貨時間 2024.02.28-2024.03.04</div> -->
                        <?if(!$is_en){?>
                              <!-- 售完加上class+"soldout" -->
                              <div class="btnCart soldout">
		                        <?if($stock_num>0){?>
		                            <a href="javascript:submit_shopcar();">
                                    <div class="cartIcon"></div>
                                <span>加入購物車</span>
		                            </a>
		                            <input type="hidden" name="can_add" id="can_add" value="yes">
		                        <?}else if(0){?>
		                            <div class="back fgry">售完補貨中</div>
		                            <input type="hidden" name="can_add" id="can_add" value="no">
		                        <?}?>

		                    </div>
		                <?}?>
<!--
                        <div class="btnCart">
                            <a href="cart.php">
                                <div class="cartIcon"></div>
                                <span>加入購物車</span>
                            </a>
                        </div>
-->
                    </div>
                </div>
            </div>
            <?if(!$is_en ){?>

                <?
                if(count($all_cnt_add_buy_info) > 0)
                {
                ?>
            <div class="addBox">
                <div class="container">
                    <p>加購商品</p>
                    <div class="addBoxSwiper">
                        <!-- 98 * 98 -->
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                        <?for($iii=0;$iii<count($all_cnt_add_buy_info);$iii++){

/*
                            if($all_cnt_add_buy_info[$iii]['product_id']!=""){
                                $each_info=array();
                                $where_clause="Fmain_id='".$all_cnt_add_buy_info[$iii]['product_id']."'";
                                $tbl_name="sys_portal_x100_cnt";
                                get_data($tbl_name, $where_clause, $each_info);
                                // show_array($each_info);

                                $product_name = $each_info['text_field_0'];
                                $pic_url = get_pic_path_2(explode(',',$each_info['pic_field_6'])[0])['pic_file'];
                            }else{
*/
                                $product_name = $all_cnt_add_buy_info[$iii]['product_name'];
                                $pic_url = get_pic_path_2($all_cnt_add_buy_info[$iii]['product_pic'])['pic_file'];
//                             }

                        ?>
                                <div class="swiper-slide">
                                    <input type="checkbox" name="addbuy_id[]" id="product<?=($iii+1)?>" value="<?=$all_cnt_add_buy_info[$iii]['Fmain_id']?>">
                                    <label for="product<?=($iii+1)?>">
                                        <div class="img">
                                            <img src="<?=$pic_url?>" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="proName">
                                                <span><?=$product_name?></span>
                                            </div>
                                            <div class="price">
                                                <span class="priceTxt">加購價</span>
                                                <span class="specialOffer">$<?=$all_cnt_add_buy_info[$iii]['add_money']?></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            <?}?>
<!--
                                <div class="swiper-slide">
                                    <input type="checkbox" name="" id="product2">
                                    <label for="product2">
                                        <div class="img">
                                            <img src="dist/images/productPage/product_1.jpg" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="proName">
                                                <span>伸波眠按摩床墊</span>
                                            </div>
                                            <div class="price">
                                                <span class="priceTxt">加購價</span>
                                                <span class="specialOffer">$36,922</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
-->

                            </div>
                        </div>
                        <div class="swiperBtn">
                            <div class="addBoxSwiper-prev"></div>
                            <div class="addBoxSwiper-next"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?
                }
            }
            ?>
            <div class="infoBox">
                <div class="container">
                    <ul class="proMenu">
                        <li class="active"><a href="javascript:;">產品介紹</a></li>
                        <li><a href="javascript:;">產品規格</a></li>
                    </ul>
                    <ul class="infoPage">
                        <!-- 產品介紹 內容 -->
                        <li>
                            <div class="editor_Content">
                                <div class="editor_box pc_use">
                                    <?
	                                    $info['html_field_7'] = str_replace("https://plus.webdo.com.tw/userfiles/hueiyeh1983/image/", "/userfiles/temp/image/", $info['html_field_7']);
										print $info['html_field_7'];
		                            ?>
                                </div>
                                <div class="editor_box mo_use">
                                    <?
                                    $info['html_field_17'] = str_replace("https://plus.webdo.com.tw/userfiles/hueiyeh1983/image/", "/userfiles/temp/image/", $info['html_field_17']);
		                            print (($info['html_field_17'])?$info['html_field_17']:$info['html_field_7']);
		                            ?>
                                </div>
                            </div>
                        </li>

                        <!-- 產品規格 內容 -->
                        <li style="display: none;">
                            <!-- 如果沒有寫內容，就刪除li -->
                            <ul class="specificationList">
                                <?
// 取得功能欄位
$INI_FIELDS=array();
$INI_FIELDS=get_all_field("1","30");
#show_array($INI_FIELDS);
                            foreach($INI_FIELDS as $INI_val){
	                            if(substr_count($INI_val['欄位分類'],"產品規格")>=1 && $info[$INI_val['欄位代碼']] && $INI_val['欄位代碼']!="customer_field_71"){
		                            ?>
		                        <li>
                                    <div class="infoTitle"><?=$INI_val['欄位名稱']?></div>
                                    <div class="infoContent"><?=$info[$INI_val['欄位代碼']]?></div>
                                </li>
		                            <?
	                            }
                            }
                            if($info['customer_field_71']!=""){
	                            $field_71_arr = explode("`", $info['customer_field_71']);
	                            foreach($field_71_arr as $field_71){
		                            $s_arr = explode("@@@", $field_71);
		                            ?>
	                            <li>
                                    <div class="infoTitle"><?=$s_arr[0]?></div>
                                    <div class="infoContent"><?=$s_arr[1]?></div>
                                </li>
		                            <?
	                            }
                            }

                                ?>
<!--
                                <li>
                                    <div class="infoTitle">商品名稱</div>
                                    <div class="infoContent"></div>
                                </li>
-->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <?
            if(count($all_cnt_about_info) > 0)
            {
            ?>
            <div class="likeBox">
                <div class="container">
                    <h3>你可能會喜歡</h3>
                    <div class="likeSwiper mask">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                    <?for($iii=0;$iii<count($all_cnt_about_info);$iii++){

                        $each_info = get_x100_cnt_product_info($all_cnt_about_info[$iii]['product_id'],$is_en);

                        if($each_info['Fmain_id']){

	                        $pic_num = explode(",", $each_info['pic_field_6'])[0];
		                    $pic_path = get_pic_path_2($pic_num)['pic_file'];

		                    $pic_num2 = explode(",", $each_info['pic_field_6'])[1];
		                    $pic_path2 = get_pic_path_2($pic_num2)['pic_file'];
		                    if(!$pic_path2)	$pic_path2 = $pic_path;

		                    $price_arr = get_x100_cnt_price($each_info['Fmain_id']);
		                    $cnt_id = $each_info['Fmain_id'];

                    ?>
                                <div class="swiper-slide">
                                    <a href="<?=$each_info['text_field_1']?>.html"><!-- product-detail.php?cnt_id=<?=$each_info['Fmain_id']?>-->
                            <div class="icon">
                                <!--
                                    icon共有4張
                                    icon_1  NEW
                                    icon_2  HOT
                                    icon_3  SALE
                                    icon_4  預購
                                -->
                                <?
                                	if($each_info['radio_field_16'] == "NEW"){
                                ?>
                                <img src="dist/images/common/icon_1.png" alt="">
                                <?
	                                }
	                                if($each_info['radio_field_16'] == "HOT"){
                                ?>
                                <img src="dist/images/common/icon_2.png" alt="">
                                <?
	                                }
	                                if($each_info['radio_field_16'] == "SALE"){
                                ?>
                                <img src="dist/images/common/icon_3.png" alt="">
                                <?
	                                }
	                                if($each_info['radio_field_16'] == "預購"){
                                ?>
                                <img src="dist/images/common/icon_4.png" alt="">
                                <?
	                                }
                                ?>
                            </div>
                            <div class="img">
                                <div class="svg">
                                    <svg viewBox="0 0 376 414" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 0.5H370C373.038 0.5 375.5 2.96244 375.5 6V408C375.5 411.038 373.038 413.5 370 413.5H6.00001C2.96244 413.5 0.5 411.038 0.5 408V6C0.5 2.96243 2.96243 0.5 6 0.5Z"/>
                                    </svg>
                                </div>
                                <!-- 376 * 414 -->


                                <div class="space_block">
                                <!-- 預設顯示第一張圖 -->
                                <? if($pic_path){ ?><img src="<?=$pic_path?>" alt="" class="defaultImg"><? } ?>
                                <!-- hover後顯示的照片 -->
                                <? if($pic_path2){ ?><img src="<?=$pic_path2?>" alt="" class="hoverImg"><? } ?>
                                </div>
                            </div>
                            <div class="txt">
                                <div class="proId"><?=$each_info['text_field_1']?></div>
                                <div class="proName">
                                    <span><?=$each_info['text_field_0']?></span>
                                </div>
                                <?
	                                $o_price = "";	$price = "";
	                                if($price_arr['price_3']!=""){
		                                $price = number_format($price_arr['price_3']);
	                                }
	                                else if(count($price_arr)>1){
		                                $o_price = number_format($price_arr['price_1']);
		                                $price = number_format($price_arr['price_2']);
	                                }
	                                else if($price_arr['price_1']!=""){
		                                $price = number_format($price_arr['price_1']);
		                            }
		                            else if($price_arr['price_2']!=""){
			                            $price = number_format($price_arr['price_2']);
		                            }
                                ?>
                                <div class="price">
                                    <?
	                                    if($o_price){
                                    ?>
                                    <span class="originalPrice">$<?=$o_price?></span>
                                    <i>｜</i>
                                    <?
	                                    }
                                    ?>
                                    <span class="specialOffer">$<?=$price?></span>
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
                        <div class="swiperBtn">
                            <div class="likeSwiper-prev"></div>
                            <div class="likeSwiper-next"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?}?>
            <div class="backBtn">
                <a href="javascript:history.go(-1);">返回</a>
            </div>
            <input type="hidden" name="cnt_id" value="<?=$info['Fmain_id']?>">
            <input type="hidden" name="global_addbuy_id" id="global_addbuy_id" value="">
            <input type="hidden" name="give_text" id="give_text" value="">
            <input type="hidden" name="product_folder_id" id="product_folder_id" value="<?=$info['portal_x100_id']?>">
        </form>
        </main>
        <?php
            include "quote/template/footer.php";
            include "quote/template/top_btn.php";
        ?>
        <script src="dist/js/main.js"></script>
        <script src="dist/js/product-detail.js"></script>
        <script>
        function submit_shopcar()
        {
			if($("#can_add").val() == "yes"){
	            <?
	            if($_COOKIE['member_userid'] == "" and 0)
	            {
	            ?>

	                alert("您尚未登入會員，請先登入後再進行操作!");
	                return false;

	            <?
	            }
	            else
	            {
	            ?>
					//$('#formId').submit();
	            $.ajax({
	                cache: true,
	                type: "POST",
	                url:"cart.php",
	                data:$('#formId').serialize(),// 你的formid
	                async: false,
	                error: function(request) {
	                    alert("Connection error:"+request.error);
	                },
	                success: function(data) {
	                    alert("已加入購物車");

	                    a=Math.floor(Math.random()*(100000-0));
	                    dataSource = '&parm='+new Date().getTime()+a;

	                    // 不帶第二個參數
	                    $.get('get_cart_num.php?&userid1=test1&userid2=test2'+dataSource+'','',function(data,textStatus,XMLHttpRequest)
	                    {
	                        //alert(data);
	                        if(data != "")
	                        {
	                            $(".mcount").text(data);
	                        }


	                    });
	                }
	            });

	            <?
	            }
	            ?>
            }
            else{
	            alert("售完補貨中");
            }
        }
        </script>
    </body>

    </html>