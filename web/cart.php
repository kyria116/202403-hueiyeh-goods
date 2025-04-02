<?php
	require_once ("global_include_file.php");
	if($_GET['test'] == "1"){
		setcookie("test",1);
		$_COOKIE['test']=1;
	}
	$kol_info = array();
    $cnt_id=$_REQUEST['cnt_id'];
    $this_price=$_POST['this_price'];
    $amount=$_POST['amount'];
    $p_size_id=$_POST['p_size_id'];
    $this_price=$_POST['this_price'];
    $product_folder_id=$_POST['product_folder_id'];
    $give_id_arr=(is_array($_POST['give_id']))?$_POST['give_id']:array($_POST['give_id']);  // 贈品
    $addbuy_id_arr=$_POST['addbuy_id'];  // 加購品

    $login_userid=trim($_COOKIE['member_userid']);


	$new_give_id = "";

	if($_SESSION['kol_id']){
        $kol_info=array();
       $where_clause="Fmain_id = '".AddSlashes($_SESSION['kol_id'])."' ";# and is_hide='2'
   //    print $where_clause;
       $tbl_name="sys_portal_j3";
       get_data($tbl_name, $where_clause, $kol_info);
       if($kol_info['product_id']==$cnt_id){
	       if($kol_info['gift_id']=="2" ){
		       $all_cnt_gift_info=array(); //贈品資訊
			   $where_clause="1 and x100_cnt_id ='".$_SESSION['kol_id']."'";
			   $tbl_name="sys_portal_j3_gift";
			   getall_data($tbl_name, $where_clause, $all_cnt_gift_info);
			   $new_give_id = array();
			   for($i=0;$i<count($all_cnt_gift_info);$i++){
				   $new_give_id[] = $all_cnt_gift_info[$i]['Fmain_id'];
			   }
	       }
	        else{
		        #$new_give_id = $_POST['give_id'];#因為不知道為什麼會多贈品，所以拿掉它
	        }
	        $give_id = "";
        }
	}

//if($_SERVER['REMOTE_ADDR']=="114.35.245.43"){
//	show_array($_COOKIE);
//}
    /******************************
    1.取得訂單編號(order_num)  識別驗證碼(uniqid_str) 變動唯一碼(owner_num_other)
  *******************************/
    $_SESSION['owner_num_other'] = new_d12_owner_num_other($global_website_userid); //變動唯一碼


    $is_new = true;
    if($_SESSION['uniqid_str'] && $_SESSION['order_num'])
    {

      //如果is_confirm=1 就清 SESSION
      $check_info=array();
      $where_clause="uniqid_str = '".$_SESSION['uniqid_str']."' and order_num='".$_SESSION['order_num']."'  ";
//      print $where_clause;
//      exit;
      $tbl_name=$MYSQL_TABS['portal_y100'];
      get_data($tbl_name, $where_clause, $check_info);
      //show_array($check_info);


      // print "數量：".count($check_info);

      if(count($check_info)>0){
        if($check_info['is_confirm'] != "1"){
          $is_new = false;
        }else{


          $order_num=new_d12_ordernum(); //取得訂單編號
          $uniqid_str=new_d12_uniqid_str(); //識別驗證碼

          $_SESSION['order_num'] = $order_num;
          $_SESSION['uniqid_str'] = $uniqid_str;
        }
      }

      if($check_info['is_confirm'] != "1" && count($check_info)>0){
        $is_new = false;
      }


    }
    else
    {


      $order_num=new_d12_ordernum(); //取得訂單編號

      $uniqid_str=new_d12_uniqid_str(); //識別驗證碼
      $_SESSION['order_num'] = $order_num;
      $_SESSION['uniqid_str'] = $uniqid_str;
    }

//    $is_new = true;
//    $_SESSION['order_num'] = new_d12_ordernum();
//    $_SESSION['uniqid_str'] = new_d12_uniqid_str();


    if($is_new){
      $add_info=array();
      $add_info['userid']="";
      if(trim($login_userid) != ""){
        $add_info['member_userid']=$login_userid;
      }
      $add_info['website_language_id']="1";
      $add_info['owner_num_other']=$_SESSION['owner_num_other'];

      $add_info['uniqid_str']=$_SESSION['uniqid_str'];
      $add_info['order_num']=$_SESSION['order_num'];

      $add_info['order_time']=date("Y-m-d H:i:s");
      $add_info['pay_state']="未入帳";
      //  $add_info['product_state']="處理中";
      $add_info['product_state']="訂單確認中";
      $add_info['kol_id']=$_SESSION['kol_id'];
      $add_info['ip']=get_ip();
      $tbl_name=$MYSQL_TABS['portal_y100'];
      $return_arr=array();
      $return_arr=add_data($tbl_name,$add_info);
      $id=$return_arr['newrid'];
    }else{

      $update_info=array();
      $update_info['owner_num_other']=$_SESSION['owner_num_other'];
      if($kol_info['product_id']==$cnt_id){
      	$update_info['kol_id']=$_SESSION['kol_id'];
      }
      if(trim($login_userid) != ""){
        $update_info['member_userid']=$login_userid;
      }
      $where_clause="uniqid_str = '".$_SESSION['uniqid_str']."' and order_num='".$_SESSION['order_num']."'  ";
      $tbl_name=$MYSQL_TABS['portal_y100'];
      update_data($tbl_name, $where_clause, $update_info);
    }
    /******************************
      取得會員資訊
    *******************************/
      $member_info=array();
      $where_clause="text_field_0 = '".$login_userid."'";
      $tbl_name="sys_portal_g2";
      get_data($tbl_name, $where_clause, $member_info);
      // show_array($member_info);


    /******************************
      取得訂單資訊
    *******************************/
      $order_info=array();
      $where_clause="uniqid_str = '".$_SESSION['uniqid_str']."' and order_num='".$_SESSION['order_num']."'  ";
//      print $where_clause;
      $tbl_name=$MYSQL_TABS['portal_y100'];
      get_data($tbl_name, $where_clause, $order_info);
      //show_array($order_info);
	  if($order_info['coupon_id']){
		  $coupon = coupon_use($order_info['coupon_id'],$login_userid,$order_info['Fmain_id']);
		  if($coupon['error']){print "error_".$coupon['error'];
			$update_info=array();
			$update_info['coupon_money']="";
			$update_info['use_coupon']="";
			$update_info['coupon_id']="";
			$update_info['coupon_product_id']="";
			$where_clause="Fmain_id='".$order_info['Fmain_id']."'";
			$tbl_name="sys_portal_y100";
			update_data($tbl_name, $where_clause, $update_info);
			$order_info=array();
			$where_clause=" Fmain_id='".$order_info['Fmain_id']."' ";
			//      print $where_clause;
			$tbl_name=$MYSQL_TABS['portal_y100'];
			get_data($tbl_name, $where_clause, $order_info);
		  }
	  }
	  if($order_info['use_code']){
		  $coupon = code_use($order_info['use_code'],$login_userid,$order_info['Fmain_id']);
		  if($coupon['error']){
			$update_info=array();
			$update_info['code_money']="";
			$update_info['code_name']="";
			$update_info['use_code']="";
			$update_info['code_id']="";
			$update_info['code_product_id']="";
			$where_clause="Fmain_id='".$order_info['Fmain_id']."'";
			$tbl_name="sys_portal_y100";
			update_data($tbl_name, $where_clause, $update_info);
			$order_info=array();
			$where_clause=" Fmain_id='".$order_info['Fmain_id']."' ";
			//      print $where_clause;
			$tbl_name=$MYSQL_TABS['portal_y100'];
			get_data($tbl_name, $where_clause, $order_info);
		  }
	  }

	  #檢查加購品，若主商品已砍，則砍掉它
	  $add_buy_info=array();
	  $where_clause=" is_addbuy = '1' and portal_y100_id='".$order_info['Fmain_id']."' ";
	  $tbl_name=$MYSQL_TABS['portal_y100_cnt'];	//$MYSQL_TABS['portal_b2']
	  getall_data($tbl_name, $where_clause, $add_buy_info);
	  for($i=0;$i<count($add_buy_info);$i++){
		  $chk_info=array();
		  $where_clause=" portal_y100_id = '".$order_info['Fmain_id']."' and Fmain_id = '".$add_buy_info[$i]['s_product_id']."' ";
		  $tbl_name=$MYSQL_TABS['portal_y100_cnt'];	//$MYSQL_TABS['portal_b2']
		  getall_data($tbl_name, $where_clause, $chk_info);
		  if(!count($chk_info)){
			  $del_info = array();
			  $del_info['Fmain_id']=$add_buy_info[$i]['Fmain_id'];
			  $del_info['portal_y100_id']=$order_info['Fmain_id'];
			  $del_info['is_addbuy']="1";
			  $tbl_name=$MYSQL_TABS['portal_y100_cnt'];
			  del_data($tbl_name, $del_info);
		  }
		  #檢查庫存
		  $all_cnt_add_buy_info=array(); //加購產品
		  $where_clause="1 and Fmain_id = '".addslashes($add_buy_info[$i]['add_product_id'])."'";
		  $tbl_name="sys_portal_x100_cnt_add_buy";
		  get_data($tbl_name, $where_clause, $all_cnt_add_buy_info);#show_array($all_cnt_add_buy_info);
		  #print $where_clause;
		  $add_info=array();
		  $where_clause=" Fmain_id = '".$all_cnt_add_buy_info['product_id']."' ";
		  $tbl_name="sys_portal_j6";	//$MYSQL_TABS['portal_b2']
		  get_data($tbl_name, $where_clause, $add_info);#show_array($add_buy_info[$i]);
		  if($add_info['text_field_4'] == 0 && strlen($add_info['text_field_4']) == 1){
		  		$del_info = array();
			  $del_info['Fmain_id']=$add_buy_info[$i]['Fmain_id'];
			  $del_info['portal_y100_id']=$order_info['Fmain_id'];
			  $del_info['is_addbuy']="1";
			  $tbl_name=$MYSQL_TABS['portal_y100_cnt'];
			  del_data($tbl_name, $del_info);
			}
	  }

    /******************************
      處理商品資訊
    *******************************/

    $product_info=array();
    $where_clause=" Fmain_id='".$cnt_id."'";
    $tbl_name="sys_portal_x100_cnt";
    get_data($tbl_name, $where_clause, $product_info);#show_array($product_info);
/*
    $give_id = array();
    $gift_info=array();
    $where_clause=" set_product_sale_start <= '".date("Y-m-d")."' and set_product_sale_end >= '".date("Y-m-d")."' and (set_product_sale_range = '1' or set_product_sale_range_product_id = '".$cnt_id."' or set_product_sale_range_product_id like '".$cnt_id.",%' or set_product_sale_range_product_id like '%,".$cnt_id.",%' or set_product_sale_range_product_id like '%,".$cnt_id."' ) ";
    $tbl_name="sys_set_sale_gift_list";	//$MYSQL_TABS['portal_b2']
    getall_data($tbl_name, $where_clause, $gift_info);
    for($i=0;$i<count($gift_info);$i++){
	    $gift_arr = explode("`", $gift_info[$i]['set_gift_id']);
	    foreach($gift_arr as $gift_id){
		    $give_id[] = $gift_id;
	    }
    }
*/
    #print "<BR><BR><BR>123".$cnt_id;
    #show_array($give_id);
/*
    if($product_info['gift_id'] == "2"){
	    $all_cnt_gift_info=array(); //贈品資訊
	    $where_clause="1 and x100_cnt_id ='".$cnt_id."'";
	    $tbl_name="sys_portal_x100_cnt_gift";
	    getall_data($tbl_name, $where_clause, $all_cnt_gift_info);
	    $give_id = array();
	    for($iii=0;$iii<count($all_cnt_gift_info);$iii++){
		    $give_id[] = $all_cnt_gift_info[$iii]['Fmain_id'];
	    }
    }
*/
    #show_array($give_id);
//exit;
	if($p_size_id){
		$add_sql .= " and size_id = '".$p_size_id."' ";
	}

    $check_cnt_info=array();
    $where_clause=" portal_y100_id='".$order_info['Fmain_id']."' and product_id='".$product_info['Fmain_id']."' $add_sql ";
    $tbl_name=$MYSQL_TABS['portal_y100_cnt'];
    get_data($tbl_name, $where_clause, $check_cnt_info);
//     show_array($check_cnt_info);
//exit;

    //----------------------- 產品價格數量處理 ----------------------------
    $product_price = "";
    $normal_price = get_c1_cnt_price_normal($product_info['Fmain_id'],"",$login_userid);
    if($this_price!="" && $normal_price!=$this_price){ //指定價
      $product_price = $this_price;
    }else{



      if($p_size_id!=""){

        $product_price = get_c1_cnt_price_normal($product_info['Fmain_id'],$p_size_id,$login_userid);
      }elseif($p_sizecolor_id!=""){
        $product_price = get_c1_cnt_price_normal($product_info['Fmain_id'],$p_sizecolor_id,$login_userid);
      }else{
        $product_price = $normal_price;
      }


      $this_price = $product_price;

    }




    if($amount == "0" or $amount == ""){
      $amount="1";
    }
    $small_price = (int)($amount*$this_price);

//    print $small_price;
//    exit;
	$give_info_arr=array();
    // 贈品處理
    if(count($give_id_arr) > 0)
    {
       $give_info_arr=array();#show_array($new_give_id_arr);
       $give_info_arr=get_give_info($give_id_arr);
    }
    #show_array($give_info_arr);show_array($give_id_arr);
/*
    if($new_give_id || count($new_give_id)){
	    $give_info_arr=array();
	    $new_give_id_arr = array();
	    if(is_array($new_give_id))	$new_give_id_arr = $new_give_id;
	    else $new_give_id_arr[] = $new_give_id;
	    $give_info_arr=get_j3_give_info($new_give_id_arr);
    }
*/

/*
if($_GET['test']=="miku" || get_ip() == "111.249.170.37"){
	#$give_info_arr = array();
	#print show_array($give_info_arr);
}
*/
    // 加購品處理
    if(count($addbuy_id_arr) > 0)
    {
       $addbuy_info_arr=array();
       $addbuy_info_arr=get_addbuy_info($addbuy_id_arr);

    }


    //------------------------

    if(count($product_info)>0){


      if(count($check_cnt_info)>0){ //商品已在購物車，先拿掉舊的，再加新的
/*
        $update_info=array();
        $update_info['pic_file']=AddSlashes($product_info['pic_field_6']);


        $update_info['price']=AddSlashes($this_price);
        $update_info['amount']=AddSlashes($check_cnt_info['amount']+$amount);
        $update_info['small_price'] = AddSlashes($small_price);

        $update_info['product_num']=AddSlashes($product_info['text_field_1']);
        $update_info['product_name']=AddSlashes($product_info['text_field_0']);
		if($product_info['radio_field_16'] == "預購")	$update_info['send_time']=AddSlashes($product_info['text_field_11']);
        $update_info['small_price'] = AddSlashes($small_price);

        if($p_size_id != "")
        {
          $update_info['size_id']=$p_size_id;

          $size_id_text="";
          if($p_size_id != "")
          {
              $size_id_text = get_size_id_text($p_size_id);
              $update_info['size_id_text']=AddSlashes($size_id_text);
              $size_id_number = get_size_id_number($p_size_id);
              if($size_id_number)	$update_info['product_num'] = $size_id_number;
          }
        }

        if((count($give_id_arr) > 0 || $new_give_id != "" ) && AddSlashes($give_info_arr['give_text']))  // 贈品
        {
          $update_info['is_give'] = "1";
          $update_info['give_text'] = AddSlashes($give_info_arr['give_text']);
          $update_info['give_text_pic'] = AddSlashes($give_info_arr['give_text_pic']);
          $update_info['give_num'] = AddSlashes($give_info_arr['give_num']);
        }

        $where_clause="Fmain_id='".$check_cnt_info['Fmain_id']."'";
        $tbl_name=$MYSQL_TABS['portal_y100_cnt'];
        update_data($tbl_name, $where_clause, $update_info);
*/
		$del_info = array();
		$del_info['Fmain_id'] = $check_cnt_info['Fmain_id'];
		$tbl_name=$MYSQL_TABS['portal_y100_cnt'];
		del_data($tbl_name, $del_info);
		$del_info = array();
		$del_info['s_product_id'] = $check_cnt_info['Fmain_id'];
		$tbl_name=$MYSQL_TABS['portal_y100_cnt'];
		del_data($tbl_name, $del_info);

      }
      if(1)
      {
        //新增商品
        $add_info=array();
        $add_info['pic_file']=AddSlashes($product_info['pic_field_6']);
        $add_info['portal_y100_id']=$order_info['Fmain_id'];

        $add_info['price']=AddSlashes($this_price);
        $add_info['amount']=AddSlashes($amount);
        $add_info['small_price'] = AddSlashes($small_price);

        $add_info['product_folder_id']=AddSlashes($product_folder_id);



        if((count($give_id_arr) > 0 || $new_give_id != "") && AddSlashes($give_info_arr['give_text']))  // 贈品
        {
          $add_info['is_give'] = "1";
          $add_info['give_text'] = AddSlashes($give_info_arr['give_text']);
          $add_info['give_text_pic'] = AddSlashes($give_info_arr['give_text_pic']);
          $add_info['give_num'] = AddSlashes($give_info_arr['give_num']);

        }


        $add_info['product_num']=AddSlashes($product_info['text_field_1']);
        $add_info['product_name']=AddSlashes($product_info['text_field_0']);
        $add_info['product_id']=AddSlashes($cnt_id);
        $add_info['now_time']=date("Y-m-d H:i:s");
		if($product_info['radio_field_16'] == "預購")	$add_info['send_time']=AddSlashes($product_info['text_field_11']);

        if($p_size_id != "")
        {
          $add_info['size_id']=$p_size_id;

          $size_id_text="";
          if($p_size_id != "")
          {
              $size_id_text = get_size_id_text($p_size_id);
              $add_info['size_id_text']=AddSlashes($size_id_text);
              $size_id_number = get_size_id_number($p_size_id);
              if($size_id_number)	$add_info['product_num'] = $size_id_number;
          }
        }
        if($p_sizecolor_id != "")
          $add_info['sizecolor_id']=$p_sizecolor_id;



        $add_info['sizecolor_id_text']=AddSlashes($sizecolor_id_text);

        $add_info['price']=AddSlashes($this_price);
        $add_info['amount']=AddSlashes($amount);
        $add_info['small_price'] = AddSlashes($small_price);



        $tbl_name=$MYSQL_TABS['portal_y100_cnt'];
        $return_arr=array();

        $return_arr=add_data($tbl_name,$add_info);
        $d12_cnt_id=$return_arr['newrid'];
//        show_array($add_info);
//        //print $d12_cnt_id;
//        exit;
        $check_go_2 = 1;


        // show_array($add_info);
      }

    }


    if(AddSlashes($cnt_id)!=""){
      // 加購品
      $where_val=array();
      $where_val['s_product_id']=AddSlashes(($d12_cnt_id)?$d12_cnt_id:$cnt_id);
      $where_val['portal_y100_id']=$order_info['Fmain_id'];
      $where_val['is_addbuy']="1";
      $tbl_name=$MYSQL_TABS['portal_y100_cnt'];
      del_data($tbl_name, $where_val);


      if(count($addbuy_info_arr) > 0)
      {
         for($k=0;$k<count($addbuy_info_arr);$k++)
         {

           $add_info=array();
           $add_info['portal_y100_id']=$order_info['Fmain_id'];
           $add_info['pic_file']=$addbuy_info_arr[$k]['product_pic'];
           $add_info['price']=AddSlashes($addbuy_info_arr[$k]['add_money']);
           $add_info['amount']="1";
           $add_info['small_price'] = AddSlashes($addbuy_info_arr[$k]['add_money']);
          $add_info['add_product_id']=AddSlashes($addbuy_info_arr[$k]['Fmain_id']);
           $add_info['product_name']=AddSlashes($addbuy_info_arr[$k]['addbuy_text']);
           $add_info['product_num']=AddSlashes($addbuy_info_arr[$k]['addbuy_num']);
           $add_info['is_addbuy'] = "1";
           $add_info['s_product_id'] = AddSlashes(($d12_cnt_id)?$d12_cnt_id:$cnt_id); //這個加購商品是跟著哪個商品的
           $add_info['now_time']=date("Y-m-d H:i:s");
           $tbl_name=$MYSQL_TABS['portal_y100_cnt'];
           add_data($tbl_name,$add_info);
         }
      }
    }



    /******************************
      取得訂單資訊
    *******************************/
      $order_info=array();
      $where_clause="uniqid_str = '".$_SESSION['uniqid_str']."' and order_num='".$_SESSION['order_num']."'  ";
//      print $where_clause;
      $tbl_name=$MYSQL_TABS['portal_y100'];
      get_data($tbl_name, $where_clause, $order_info);
//      show_array($order_info);


      $order_cnt_info=array();
     	$where_clause=" portal_y100_id='".$order_info['Fmain_id']."'";
     	$tbl_name=$MYSQL_TABS['portal_y100_cnt'];
     	getall_data($tbl_name, $where_clause, $order_cnt_info);


    /******************************
      取得更新訂單商品單價
    *******************************/
    for($i=0;$i<count($order_cnt_info);$i++)
    {
        if($order_cnt_info[$i]['is_addbuy'] == "2")
        {
           $product_price = get_c1_cnt_price_normal($order_cnt_info[$i]['product_id'],$order_cnt_info[$i]['size_id'],$login_userid);

           $temp_small_price=$product_price * (int)$order_cnt_info[$i]['amount'];

           $update_info=array();
           $update_info['price']=AddSlashes($product_price);
           $update_info['small_price']=AddSlashes($temp_small_price);
           $where_clause="Fmain_id = '".AddSlashes($order_cnt_info[$i]['Fmain_id'])."' and portal_y100_id='".AddSlashes($order_info['Fmain_id'])."'";
           $tbl_name=$MYSQL_TABS['portal_y100_cnt'];
           update_data($tbl_name, $where_clause, $update_info);
        }
    }

    $order_cnt_info=array();
   	$where_clause=" portal_y100_id='".$order_info['Fmain_id']."'";
   	$tbl_name=$MYSQL_TABS['portal_y100_cnt'];
   	getall_data($tbl_name, $where_clause, $order_cnt_info);


    /******************************
      KOL資訊
    *******************************/
    #先檢查有kol的商品還在不在
    if($order_info['kol_id'] != "")
    {
	    if(!chk_have_kol($order_info['Fmain_id'])){
		    #print "清kol_id";
		    $order_info=array();
			$where_clause=" Fmain_id = '".$order_id."' ";
			$tbl_name=$MYSQL_TABS['portal_y100'];
			get_data($tbl_name, $where_clause, $order_info);
	    }
	    else{
		    #print "KOL_ID".$order_info['kol_id'];
	    }
    }

    if($order_info['kol_id'] != "")
    {
        $kol_info=array();
        $where_clause="Fmain_id = '".AddSlashes($order_info['kol_id'])."' ";# and is_hide='2'
    //    print $where_clause;
        $tbl_name="sys_portal_j3";
        get_data($tbl_name, $where_clause, $kol_info);
        //show_array($kol_info);

        $order_cnt_info=array();
       	$where_clause=" portal_y100_id='".$order_info['Fmain_id']."' order by Fmain_id asc";
       	$tbl_name=$MYSQL_TABS['portal_y100_cnt'];
       	getall_data($tbl_name, $where_clause, $order_cnt_info);

        $s_order_cnt_info=array();
        $s_order_cnt_info=$order_cnt_info;
        $order_cnt_info=array();

       	$s=0;
       	for($r=0;$r<count($s_order_cnt_info);$r++)
       	{
       	   if($kol_info['product_id'] != $s_order_cnt_info[$r]['product_id'])
       	   {
       	      $order_cnt_info[$s]=$s_order_cnt_info[$r];

       	      $s++;
       	   }

       	}

    }


    /******************************
      滿件優惠
    *******************************/
//    if($order_info['kol_id'] == "")
//    {
       $get_set_product_sale_amount_title="";
       $get_set_product_sale_amount_title=get_set_product_sale_amount($order_info,$order_cnt_info);
//    }
//    else
//    {
//       $get_set_product_sale_amount_title="";
//       $get_set_product_sale_amount_title=get_set_product_sale_amount_kol($order_info,$order_cnt_info);

       if($get_set_product_sale_amount_title == "")
       {
          $update_info=array();
         	$update_info['amount_sale_info_money']="";
         	$update_info['amount_sale_info_money_give_name']="";
         	$where_clause="uniqid_str = '".$_SESSION['uniqid_str']."' and order_num='".$_SESSION['order_num']."'";
         	$tbl_name="sys_portal_y100";
         	update_data($tbl_name, $where_clause, $update_info);
      	}
//    }


    /******************************
      滿額優惠
    *******************************/
//    if($order_info['kol_id'] == "")
//    {
       $get_set_product_sale_title="";
       if($get_set_product_sale_amount_title)	$get_set_product_sale_title .= "<br>";
       $get_set_product_sale_title.=get_set_product_sale($order_info,$order_cnt_info);
//    }
//    else
//    {
//       $get_set_product_sale_title="";
//       $get_set_product_sale_title=get_set_product_sale_kol($order_info,$order_cnt_info);

       if($get_set_product_sale_title == "")
       {
           $update_info=array();
          	$update_info['sale_info_money']="";
          	$update_info['sale_info_give_name']="";
          	$where_clause="uniqid_str = '".$_SESSION['uniqid_str']."' and order_num='".$_SESSION['order_num']."'";
          	$tbl_name="sys_portal_y100";
          	update_data($tbl_name, $where_clause, $update_info);
      	}
//    }

    $order_cnt_info=array();
    $order_cnt_info=$s_order_cnt_info;


    /******************************
      優惠金額 => 滿件優惠或者滿額優惠
    *******************************/
    $order_info=array();
    $where_clause="uniqid_str = '".$_SESSION['uniqid_str']."' and order_num='".$_SESSION['order_num']."'  ";
//      print $where_clause;
    $tbl_name=$MYSQL_TABS['portal_y100'];
    get_data($tbl_name, $where_clause, $order_info);
//      show_array($order_info);


    $all_sale_money=(int)$order_info['sale_info_money']+(int)$order_info['amount_sale_info_money'];




	/******************************
      計算積點使用最高數量
    *******************************/
    $j1_4_info=array();
   	$where_clause=" Fmain_id='4'";
   	$tbl_name="sys_portal_j1";
   	get_data($tbl_name, $where_clause, $j1_4_info);
   	#show_array($order_info);
   	#print $all_sale_money;
   	
   	if($j1_4_info['text_field_1']){	
	   	$total = $order_info['old_sum_total']; //商品合計
	   	$total -= $order_info['amount_sale_info_money'];      // 滿件優惠費用      
	   	$total -= $order_info['coupon_money'];	#折價券
	   	$total -= $order_info['code_money'];	#折扣碼
	   	$total -= $order_info['sale_info_money'];  // 滿額優惠費用
	   	$this_bonus = 0;
	   	$this_bonus += floor($total*$j1_4_info['text_field_1']/100);		#無條件捨去
   	}
/*
    $this_bonus = 0;
    for($i=0;$i<count($order_cnt_info);$i++)
    {
        if($order_cnt_info[$i]['is_addbuy'] == "2")
        {
           $product_price = get_c1_cnt_price_normal($order_cnt_info[$i]['product_id'],$order_cnt_info[$i]['size_id'],$login_userid);

           $temp_small_price=$product_price * (int)$order_cnt_info[$i]['amount'];

           $update_info=array();
           $update_info['price']=AddSlashes($product_price);
           $update_info['small_price']=AddSlashes($temp_small_price);
           $where_clause="Fmain_id = '".AddSlashes($order_cnt_info[$i]['Fmain_id'])."' and portal_y100_id='".AddSlashes($order_info['Fmain_id'])."'";
           $tbl_name=$MYSQL_TABS['portal_y100_cnt'];
           update_data($tbl_name, $where_clause, $update_info);
        }
		if($j1_4_info['text_field_1'])	$this_bonus += floor($order_cnt_info[$i]['small_price']*$j1_4_info['text_field_1']/100);		#無條件捨去
    }
*/


    /******************************
      取得免運費資訊
    *******************************/
    $set_shop_info2=array();
   	$where_clause=" Fmain_id = '2'";
   	$tbl_name="sys_portal_j5";
   	get_data($tbl_name, $where_clause, $set_shop_info2);
    // show_array($set_shop_info2);

    $free_traffic_money=0;
    $free_traffic_money=$set_shop_info2['text_field_1'];

    $free_traffic_money_str="";
    if((int)$free_traffic_money > 0)
       $free_traffic_money_str="滿".$free_traffic_money."免運";



   	/******************************
  		取得產品細項
	  *******************************/
    	$order_cnt_info=array();
    	$where_clause=" portal_y100_id='".$order_info['Fmain_id']."' and is_addbuy = '2' order by Fmain_id asc";
    	$tbl_name=$MYSQL_TABS['portal_y100_cnt'];
    	getall_data($tbl_name, $where_clause, $order_cnt_info);
    	//show_array($order_cnt_info);

      // 更新總價
    	$order_info['sum_total'] = update_d12_total($order_info['Fmain_id']);//更新d12價格


    /******************************
      取得運費並更新
    *******************************/
    $traffic_money=0;
    $traffic_money=get_traffic_money($order_info,$order_cnt_info);

//    print $traffic_money;
//    exit;

	include "quote/template/head.php";
?>
<?
	#GA事件追蹤碼
$ga_even_js="";
$ga_even_js.="<script>";
$ga_even_js.="  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){";
$ga_even_js.="  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),";
$ga_even_js.="  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)";
$ga_even_js.=" })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');\n";
$ga_even_js.="  ga('create', '".$google_analytics_id."', 'auto');\n";
$ga_even_js.="  ga('send', 'pageview');\n";
$ga_even_js.="  ga('require', 'ec');\n";
$ga_even_js.="</script>";
if(trim($google_analytics_id) != "")
{
	$ga_even_js.="<script>\n";
	for($j=0;$j<count($order_cnt_info);$j++)
	{
	    $ga_even_js.="ga('ec:addProduct',{\n";
	    $ga_even_js.="  'id':'".$order_cnt_info[$j]['product_num']."',\n";
	    $ga_even_js.="  'name':'".$order_cnt_info[$j]['product_name']."',\n";;
	    $ga_even_js.="  'price':'".$order_cnt_info[$j]['small_price']."',\n";
	    $ga_even_js.="  'quantity':'".$order_cnt_info[$j]['amount']."'\n";
	    $ga_even_js.="});\n";
	}
	$ga_even_js.="ga('ec:setAction','add');\n";
	$ga_even_js.="ga('ec:setAction','checkout',{'step':1});\n";
	$ga_even_js.="ga('send','pageview');\n";
	$ga_even_js.="</script>\n";
}
print $ga_even_js;
?>
<?
// FB 追蹤碼
$FB_Pixel_Code = "900133397417597";
if(trim($FB_Pixel_Code) != "")
{
?>
    <!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '<?=trim($FB_Pixel_Code)?>');
	fbq('track', 'PageView');
	fbq('track', 'AddToCart',{
      content_ids: ['<?=$add_id?>'],
      content_type: 'product',
      value: <?=$add_money?>,
      currency: 'NTD'
    });
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=<?=trim($FB_Pixel_Code)?>&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->

<?
}
?>
<link rel="stylesheet" href="dist/css/cart.css">
</head>

<body class="lang_tw">
    <?php
    include "quote/template/nav.php";
    ?>
    <main>
        <section class="registration">
            <form name="buy_form" method="post" action="cart_end.php">
            <div class="container">
                <div class="registration_flex">
                    <div class="title_flex">
                        <div class="subtitle">
                            CART
                        </div>
                        <div class="title">
                            購物車
                        </div>
                    </div>
                    <div class="profile_flex">
                        <div class="member_img">
                            <img src="dist/images/member/cart_img.png" alt="member-profile_img">
                        </div>
                    </div>
                    <ul class="form_title">
                        <li>購買產品</li>
                        <li></li>
                        <li>規格</li>
                        <li>數量</li>
                        <li>單價</li>
                        <li>小計</li>
                        <li>移除</li>
                    </ul>
                    <!-- 沒有商品時呈現 -->
                    <?
		            $have_hide = 0;
		            if(count($order_cnt_info) <= 0)
		            {
		            ?>
		            <div class="no_commodity">
                        目前購物車內還沒有任何商品
                    </div>
		            <?
		            }
		            else
		            {
		            ?>
                    <div class="form_block_flex">
                        <?
                        for($i=0;$i<count($order_cnt_info);$i++)
                        {
                            // 取加購商品
                            $addbuy_info=array();
                            $where_clause="portal_y100_id = '".$order_info['Fmain_id']."' and s_product_id='".$order_cnt_info[$i]['Fmain_id']."' and is_addbuy = '1'";
                            $tbl_name=$MYSQL_TABS['portal_y100_cnt'];
                            getall_data($tbl_name, $where_clause, $addbuy_info);
                            //show_array($addbuy_info);


                            $each_info=array();
                            $where_clause="Fmain_id = '".$order_cnt_info[$i]['product_id']."'";
                            $tbl_name="sys_portal_x100_cnt";
                            get_data($tbl_name, $where_clause, $each_info);
                            // show_array($each_info); //is_show_size

                            // 取的商品圖片
                            $pic_file_arr=array();
                            $pic_file_arr=explode(",",$order_cnt_info[$i]['pic_file']);
                            $pic_url="";
                            $pic_url = get_pic_path_2($pic_file_arr[0]);


                            // 取得所有商品規格
                            $size_info=array();
                            $where_clause=" portal_x100_cnt_id='".$order_cnt_info[$i]['product_id']."' order by Fmain_id asc ";
                            $tbl_name="sys_portal_x100_cnt_size";
                            getall_data($tbl_name, $where_clause, $size_info);
                            // show_array($size_info);
							if(count($size_info) > 0 && $order_cnt_info[$i]['size_id'] == ""){#若應該有size_id但沒有，則給他第一個
								$order_cnt_info[$i]['size_id'] = $size_info[0]['Fmain_id'];
								$upd_info = array();
								$upd_info['size_id'] = $size_info[0]['Fmain_id'];
								$where_clause=" portal_y100_id='".$order_info['Fmain_id']."' and Fmain_id = '".$order_cnt_info[$i]['Fmain_id']."' ";
								$tbl_name=$MYSQL_TABS['portal_y100_cnt'];
								update_data($tbl_name, $where_clause, $upd_info);
							}
                            // 取得該商品規格
                            $this_size_info=array();
                            $where_clause=" portal_x100_cnt_id='".$order_cnt_info[$i]['product_id']."' and Fmain_id = '".$order_cnt_info[$i]['size_id']."' ";
                            $tbl_name="sys_portal_x100_cnt_size";
                            get_data($tbl_name, $where_clause, $this_size_info);
                            // show_array($this_size_info);

							if($this_size_info['Fmain_id'] && $order_cnt_info[$i]['product_id']==$kol_info['product_id']){#
								$j3_size_info=array();
								$where_clause="portal_j3_id = '".$kol_info['Fmain_id']."' and size_id = '".$this_size_info['Fmain_id']."' ";
								$tbl_name="sys_portal_j3_size";
								get_data($tbl_name, $where_clause, $j3_size_info);
								if($j3_size_info['Fmain_id']){
									$this_size_info['text_field_10'] = $j3_size_info['in_stock'];
								}
							}
							else if($order_cnt_info[$i]['product_id']==$kol_info['product_id']){
								$each_info['stock'] = $kol_info['in_stock'];
							}

                            // 取得該規格數量
                            $max_amount=0;
                            if(strlen($this_size_info['text_field_10'])>0)
                               $max_amount=$this_size_info['text_field_10'];
                            else if(count($this_size_info))
                               $max_amount=10;
                            else if(strlen($each_info['stock'])>0)
                            	$max_amount=$each_info['stock'];
                        	else
                        		$max_amount=10;

							if($max_amount > 10)	$max_amount = 10;

//print $max_amount;
							$hide = 0;
							if($max_amount == 0)
							{

							$hide = 1;
//							print $hide."<hr>";
							}
/*
							else if($each_info['is_hide'] == "1" && $kol_info['product_id']!=$each_info['Fmain_id'] )
							{
								$hide = 1;
//								print $hide."<hr>";
							}
*/
							else if(time()<strtotime($each_info['sys_start_date']." 00:00:00"))
							{
								$hide = 1;
//								print $hide."<hr>";
							}
							else if(time()>strtotime($each_info['sys_end_date']." 23:59:59"))
							{
								$hide = 1;
//								print $hide."<hr>";
							}
							if($hide){
								$max_amount = 0;
								$have_hide = 1;
								$order_cnt_info[$i]['amount'] = 0;
								$order_cnt_info[$i]['small_price'] = 0;
							}
							else if($order_cnt_info[$i]['amount'] == 0){
								$order_cnt_info[$i]['amount'] = 1;
								$order_cnt_info[$i]['small_price'] = $order_cnt_info[$i]['price'];
							}

                        ?>
                        <div class="form_block">
                            <div class="form_item">
                                <div class="del_mo del_cart">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="item_mo">
                                    <!-- 桌機:194 x 214 -->
                                    <!-- 手機:233 x 257 -->
                                    <div class="product_img"><a href="product-detail.php?cnt_id=<?=$each_info['Fmain_id']?>"><img src="<?=$pic_url['pic_file']?>"></a></div>
                                    <div class="product_info_txt">

                                        <ul class="txt_1">
                                            <li class="product_num"><a href="product-detail.php?cnt_id=<?=$each_info['Fmain_id']?>"><?=$order_cnt_info[$i]['product_num']?></a></li>
                                            <li class="product_title"><a href="product-detail.php?cnt_id=<?=$each_info['Fmain_id']?>"><?=$order_cnt_info[$i]['product_name']?></a></li>
                                            <?
												$sale_amount_log_2_arr = explode("@@@", $order_info['sale_amount_log_1']."@@@".$order_info['sale_amount_log_2']);	#滿件折扣log
			                                    foreach($sale_amount_log_2_arr as $sale_amount_log_2){
				                                    $sale_amount_log_1 = explode("`", $sale_amount_log_2);
					                                if($sale_amount_log_1[2]){
														$if_print = 0;
														if(substr_count($sale_amount_log_1[2],",")>=1){
															 $product_id_arr = explode(",", $sale_amount_log_1[2]);
															 if(in_array($order_cnt_info[$i]['product_id'], $product_id_arr)){
															 	$if_print = 1;
														   	 }
														 }
														 else if($sale_amount_log_1[2]==$order_cnt_info[$i]['product_id']){
															 $if_print = 1;
														 }
														if($if_print){
														?>
														<li class="product_event_discounts"><?=$sale_amount_log_1[0]?></li>
														<?
														}
													}
			                                    }

			                                    $sale_amount_log_2_arr = explode("@@@", $order_info['sale_money_log_1']."@@@".$order_info['sale_money_log_2']);	#滿額折扣log
			                                    foreach($sale_amount_log_2_arr as $sale_amount_log_2){
				                                    $sale_amount_log_1 = explode("`", $sale_amount_log_2);
					                                if($sale_amount_log_1[2]){
														$if_print = 0;
														if(substr_count($sale_amount_log_1[2],",")>=1){
															 $product_id_arr = explode(",", $sale_amount_log_1[2]);
															 if(in_array($order_cnt_info[$i]['product_id'], $product_id_arr)){
															 	$if_print = 1;
														   	 }
														 }
														 else if($sale_amount_log_1[2]==$order_cnt_info[$i]['product_id']){
															 $if_print = 1;
														 }
														if($if_print){
														?>
														<li class="product_event_discounts"><?=$sale_amount_log_1[0]?></li>
														<?
														}
													}
			                                    }

												#折價券log
												$product_id_arr = explode(",", $order_info['coupon_product_id']);
												if(in_array($order_cnt_info[$i]['product_id'], $product_id_arr)){
													$if_print = 1;
												}
												if($if_print){
												?>
												<li class="product_event_discounts"><?=$order_info['use_coupon']?></li>
												<?
												}

												#折扣碼log
												$product_id_arr = explode(",", $order_info['code_product_id']);
												if(in_array($order_cnt_info[$i]['product_id'], $product_id_arr)){
													$if_print = 1;
												}
												?>
												<li class="product_event_discounts" id="code_dv_<?=$order_cnt_info[$i]['Fmain_id']?>" class="factive"><?=(($if_print)?$order_info['code_name']:"")?></li>
<!--                                             <li class="product_event_discounts">父親節活動優惠88折</li> -->
                                        </ul>

                                        <ul class="txt_2">
                                            <li class="color">
                                                <?if($each_info['is_show_size']=="是"){?>
                                                <div class="mo_title">規格</div>
                                                <select id="show_size_<?=$order_cnt_info[$i]['Fmain_id']?>" onchange="change_size_or_color('<?=$order_cnt_info[$i]['Fmain_id']?>',this.value);">

                                    <?for($j=0;$j<count($size_info);$j++){
                                        $selected="";
                                        $disabled ="";
                                        if($order_cnt_info[$i]['size_id'] == $size_info[$j]['Fmain_id']){
                                          $selected="selected";
                                        }

                                        if($order_cnt_info[$i]['product_id']==$kol_info['product_id']){
											$j3_size_info=array();
											$where_clause="portal_j3_id = '".$kol_info['Fmain_id']."' and size_id = '".$size_info[$j]['Fmain_id']."' ";
											$tbl_name="sys_portal_j3_size";
											get_data($tbl_name, $where_clause, $j3_size_info);
											if($j3_size_info['Fmain_id']){
												$size_info[$j]['text_field_10'] = $j3_size_info['in_stock'];
											}
										}


                                        if($size_info[$j]['text_field_10']=="0"){
                                          $size_info[$j]['size_name'] = $size_info[$j]['size_name']."(已完售)";
                                          $disabled = "disabled";
                                        }
                                    ?>
                                        <option value="<?=$size_info[$j]['Fmain_id']?>" <?=$selected?> <?=$disabled?> ><?=$size_info[$j]['size_name']?></option>
                                    <?}?>
                                                </select>
                                             <?}
	                                else{
		                                #print "<div></div>";
	                                }
                                ?>
                                            </li>
                                            <li class="quantity">
                                                <div class="mo_title">數量
                                                </div>
                                                <select id="12_cnt_<?=$order_cnt_info[$i]['Fmain_id']?>" onchange="add_or_sub('<?=$order_cnt_info[$i]['Fmain_id']?>',this.value,'<?=$order_cnt_info[$i]['product_id']?>');" >
                                    <?
                                    for($j=1;$j<=$max_amount;$j++)
                                    {
                                        $selected="";
                                        if($j == $order_cnt_info[$i]['amount'])
                                           $selected="selected";

                                    ?>
                                        <option value="<?=$j?>" <?=$selected?>><?=$j?></option>
                                    <?
                                    }
                                    if($max_amount == 0)	print "<option value=''>已售完</option>";
                                    ?>

                                    </select>
                                            </li>
                                            <li class="price_1">
                                                <div class="mo_title">單價</div>
                                                $<em id="price_<?=$order_cnt_info[$i]['Fmain_id']?>"><?=number_format($order_cnt_info[$i]['price'])?></em>
                                            </li>
                                            <li class="price_2">
                                                <div class="mo_title">小計</div>
                                                $<em id="sub_price_<?=$order_cnt_info[$i]['Fmain_id']?>"><?=number_format($order_cnt_info[$i]['small_price'])?></em>
                                            </li>
                                            <li class="del del_cart" onclick="del_d12_cnt('<?=$order_cnt_info[$i]['Fmain_id']?>','<?=$order_cnt_info[$i]['product_id']?>');">
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?
                            if(count($addbuy_info) > 0){

                              for($j=0;$j<count($addbuy_info);$j++){
                                // 取的商品圖片
                                $pic_file_arr=array();
                                $pic_file_arr=explode(",",$addbuy_info[$j]['pic_file']);
                                $pic_url="";
                                $pic_url = get_pic_path_2($pic_file_arr[0]);
                                if($hide)	$addbuy_info[$j]['small_price'] = 0;

                            ?>
                            <div class="form_item moreSth" in_<?=$order_cnt_info[$i]['Fmain_id']?>>
                                <div class="del_mo del_giveaway">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="item_mo">
                                    <div class="giveaway_img">
                                        <div class="add">
                                            <div class="title">加購商品</div>
                                            <div class="img">
                                                <!-- 桌機:100 x 111 -->
                                                <!-- 手機:170 x 187 -->
                                                <img src="<?=$pic_url['pic_file']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="giveaway_info_txt">
                                        <ul class="giveaway_txt_1">
                                            <div class="giveaway_title"><?=$addbuy_info[$j]['product_name']?></div>
                                        </ul>
                                        <ul class="giveaway_txt_2">
                                            <li class="giveaway_color">
                                            </li>
                                            <li class="giveaway_quantity">
                                            </li>
                                            <li class="giveaway_price_1">
                                                <div class="mo_title">單價</div>
                                                $<?=number_format($addbuy_info[$j]['price'])?>
                                            </li>
                                            <li class="giveaway_price_2">
                                                <div class="mo_title">小計</div>
                                                $<?=number_format($addbuy_info[$j]['small_price'])?>
                                            </li>
                                            <li class="del del_giveaway" onclick="del_d12_cnt_add('<?=$addbuy_info[$j]['Fmain_id']?>','<?=$addbuy_info[$j]['s_product_id']?>')">
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?
                                }
                            }
                            ?>
                            <?
                            if($order_cnt_info[$i]['is_give'] == "1" && $order_cnt_info[$i]['give_num'])
                            {
                                $give_num_arr = explode("`", $order_cnt_info[$i]['give_num']);
								$give_text_arr = explode("`", $order_cnt_info[$i]['give_text']);
								$give_text_pic_arr = explode("`", $order_cnt_info[$i]['give_text_pic']);
								foreach($give_text_arr as $give_text_key => $give_text_val){
                                // 取的商品圖片
                                $pic_file_arr=array();
                                $pic_file_arr=explode(",",$give_text_pic_arr[$give_text_key]);
                                $pic_url="";
                                $pic_url = get_pic_path_2($pic_file_arr[0]);

                                $j4_info=array();
							    $where_clause=" text_field_2 = '".$give_num_arr[$give_text_key]."' ";
							    $tbl_name="sys_portal_j4";	//$MYSQL_TABS['portal_b2']
							    get_data($tbl_name, $where_clause, $j4_info);
                            ?>
                            <div class="form_item gift">
                                <div class="item_mo">
                                    <div class="giveaway_img">
                                        <div class="add">
                                            <div class="title">贈品</div>
                                            <div class="img">
                                                <img src="<?=$pic_url['pic_file']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="giveaway_info_txt">
                                        <ul class="giveaway_txt_1">
                                            <div class="giveaway_title">
                                                <div class="title"><?=$give_text_val?></div>
				                                <?
				                                if($j4_info['text_field_3'] != "")
				                                {
				                                ?>
                                                <div class="market_price"><span>市價</span>$<?=number_format($j4_info['text_field_3'])?></div>
                                                <?
                                                }
                                                ?>
                                            </div>
                                        </ul>
                                        <ul class="giveaway_txt_2">
                                            <li class="giveaway_color">
                                            </li>
                                            <li class="giveaway_quantity">
	                                            <?
		                                            if($j4_info['text_field_5'] == "0" && strlen($j4_info['text_field_5'])==1){
	                                            ?>
	                                            <div class="finish">已兌換完畢</div>
	                                            <?
		                                            }
	                                            ?>
                                            </li>
                                            <li class="giveaway_price_1">
                                            </li>
                                            <li class="giveaway_price_2">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?
	                          	}
	                          }
	                          ?>
                        </div>
                        <?
	                        }
                        ?>
<!--
                        <div class="form_block">
                            <div class="form_item">
                                <div class="del_mo del_cart">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="item_mo">
                                    <div class="product_img"><img src="dist/images/member/product_img.jpg"></div>
                                    <div class="product_info_txt">
                                        <ul class="txt_1">
                                            <li class="product_num">HY-5013</li>
                                            <li class="product_title">商務艙PLUS零重力按摩</li>
                                        </ul>
                                        <ul class="txt_2">
                                            <li class="color">
                                                <div class="mo_title">規格</div>
                                                <select name="quantity" id="quantity-select">
                                                    <option value="橘白配色">橘白配色</option>
                                                    <option value="白橘配色">白橘配色</option>
                                                </select>
                                            </li>
                                            <li class="quantity">
                                                <div class="mo_title">數量
                                                </div>
                                                <select name="quantity" id="quantity-select">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </li>
                                            <li class="price_1">
                                                <div class="mo_title">單價</div>
                                                $37,222
                                            </li>
                                            <li class="price_2">
                                                <div class="mo_title">小計</div>
                                                $37,222
                                            </li>
                                            <li class="del del_cart">
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
-->
                    </div>
                    <div class="row_flex">
                        <ul class="discount">
                            <li class="mo_title">享用之優惠</li>
                            <?if($login_userid!="")
                          {
                              if((int)$member_info['bonus_num'] < 0)
                                 $member_info['bonus_num']=0;

                              if((int)$member_info['bonus_num'] >= 0)
                              {
	                              if($this_bonus > $member_info['bonus_num'])	$this_bonus = $member_info['bonus_num'];
	                              if($order_info['use_bonus'] > $this_bonus && strlen($order_info['use_bonus'])>0 && $this_bonus > 0){
		                              $upd_info = array();
		                              $upd_info['use_bonus'] = $this_bonus;
		                              $where_clause = " Fmain_id = '".$order_info['Fmain_id']."' ";
		                              $tbl_name=$MYSQL_TABS['portal_y100'];
		                              update_data($tbl_name, $where_clause, $upd_info);
		                              print "<script>
		                              location.reload();
		                              </script>";
		                              exit;
	                              }
                          ?>
                            <li>
                                <div class="discount_item">使用積點</div>
                                <div class="input">
                                    <input type="text" id="use_bonus" name="use_bonus" value="<?=$order_info['use_bonus']?>" max="<?=$this_bonus?>" pattern="[0-9]">
                                    <div class="remaining_point">總積點 <?=$member_info['bonus_num']?>；本次消費可用 <?=$this_bonus?>積點</div>
                                </div>
                            </li>
                            <?
                             }
                          }
                          ?>
                            <li>
                                <div class="discount_item">使用折價券</div>
                                <div class="input">
<!-- 	                                <input type="text" name="use_coupon" value="<?=$order_info['use_coupon']?>"> -->
                                    <select name="use_coupon" id="use_coupon" onchange="chg_coupon(this.value);">
                                        <option value="">--請選擇--</option>
                                        <? show_array($order_info);
	                                        $coupon_list_info=array();
											$where_clause=" member_userid = '".$_COOKIE['member_userid']."' and use_date = '0000-00-00 00:00:00' order by deadline_date asc ";
											$tbl_name="member_coupon_list";
											getall_data($tbl_name, $where_clause, $coupon_list_info);
											$can_arr = array();	#可使用的
							                $notyet_arr = array();	#尚未生效
							                $cant_arr = array();	#不可使用的
							                for($c=0;$c<count($coupon_list_info);$c++){
							                    $coupon_info=array();
							                    $where_clause=" Fmain_id = '".$coupon_list_info[$c]['coupon_id']."' ";
							                    $tbl_name="sys_set_sale_coupon_list";
							                    get_data($tbl_name, $where_clause, $coupon_info);

							                    $coupon = coupon_use($coupon_info['Fmain_id'],$_COOKIE['member_userid'],"");
							                    $can_use = ($coupon['error'])?0:1;
							                    if($coupon_list_info[$c]['use_date']!='0000-00-00 00:00:00')	$can_use = 2;
							                    if($coupon_list_info[$c]['deadline_date'] != "9999-12-31"){
								                    $coupon_info['set_sale_start'] = $coupon_list_info[$c]['get_date'];
								                    $coupon_info['set_sale_end'] = $coupon_list_info[$c]['deadline_date'];
							                    }
							                    if($coupon_info['set_product_sale_title'] && $coupon_info['set_sale_fixed_deductible']){
							                        if($can_use=="1"){
							                            ?>
							                            <option value="<?=$coupon_info['Fmain_id']?>" <?=(($order_info['coupon_id']==$coupon_info['Fmain_id'])?' selected':'')?>><?=$coupon_info['set_product_sale_title']?></option>
							                            <?
							                        }
								                }
							                }
                                        ?>
                                    </select>
									<div id="coupon_err" class="discount_coupon"></div>
                                </div>
                            </li>
                            <li>
                                <div class="discount_item">使用折扣碼</div>
                                <div class="input">
                                    <input type="text" name="use_code" id="use_code" value="<?=$order_info['use_code']?>">
<!--
                                    <select name="use_code" id="use_code">
                                        <option value="2023HY1111">2023HY1111</option>
                                        <option value="2023HY1111">2023HY1221</option>
                                    </select>
-->
                                    <div id="code_err" class="discount_coupon"></div>
                                </div>
                            </li>
                            <li>
                                <div class="discount_item">優惠活動</div>
                                <div class="more_discount">
<!--
                                    <div>｜年終慶｜全館滿額贈</div>
                                    <div class="full">滿$10,000免運</div>
-->
                                    <div id="promote_str" ><?=$get_set_product_sale_amount_title?><?=$get_set_product_sale_title?></div>
									<div<?=(($traffic_money>0)?" style='color:#797979;'":"")?>><?=$free_traffic_money_str?></div>
                                </div>
                            </li>
                        </ul>
                        <ul class="total">
                            <li>
                                <div>商品金額總計</div>
                                <div>$<i id="show_total"><?=number_format(explode("_",update_d12_total($order_info['Fmain_id'],1))[1])?></i></div>
                            </li>
                            <li>
                                <div>滿件優惠折抵</div>
                                <div>-$<i id="discount_amount"><?=number_format((($order_info['amount_sale_info_money'])?$order_info['amount_sale_info_money']:0))?></i></div>
                            </li>
                            <li>
                                <div>折價券折抵</div>
                                <div>-$<i id="discount_coupon"><?=number_format((($order_info['coupon_money'])?$order_info['coupon_money']:0))?></i></div>
                            </li>
                            <li>
                                <div>折扣碼折抵</div>
                                <div>-$<i id="discount_code"><?=number_format((($order_info['code_money'])?$order_info['code_money']:0))?></i></div>
                            </li>
                            <li>
                                <div>滿額優惠折抵</div>
                                <div>-$<i id="discount_sale"><?=number_format((($order_info['sale_info_money'])?$order_info['sale_info_money']:0))?></i></div>
                            </li>
                            <li>
                                <div>積點折抵</div>
                                <div>-<i id="discount_bonus"><?=number_format((($order_info['use_bonus'])?$order_info['use_bonus']:0))?></i></div>
                            </li>
                            <li>
                                <div>運費</div>
                                <div>$<i id="traffic_money"><?=number_format($traffic_money)?></i></div>
                            </li>
                            <li>
                                <div class="total_price_title">應付金額</div>
                                <div class="total_price">$<i id="total"><?=number_format($order_info['sum_total'])?></i></div>
                            </li>
                        </ul>
                    </div>
                    <div class="recipient">
                        <div class="recipient_title">收件人資料</div>
                        <div class="form">
                            <fieldset>
                                <div class="checkbox">
                                    <input type="checkbox" id="same_member" name="same_member"  onclick="the_samemember();" />
                                    <label for="same_member">同會員資料</a>
                                    </label>
                                </div>
                    <script type="text/javascript">
                      function the_samemember(){
                        if($("#same_member").prop("checked")){
                          $("input[name='FO_send_man']").val("<?=$member_info['text_field_2']?>");
                          $("input[name='FO_send_email']").val("<?=$member_info['text_field_0']?>");
                          $("input[name='FO_recipient_tel']").val("<?=$member_info['text_field_6_1']?>");
                          $("input[name='FO_send_tel']").val("<?=(($member_info['text_field_6_2'])?$member_info['text_field_6_2']:$member_info['text_field_6'])?>");
                          $("input[name='FO_send_handphone']").val("<?=$member_info['text_field_5']?>");
                          $("input[name='FO_send_address']").val("<?=(($member_info['text_field_7_3'])?$member_info['text_field_7_3']:$member_info['text_field_7'])?>");
                          $("select[name='FO_send_city']").val("<?=$member_info['text_field_7_1']?>");
                          $("select[name='FO_send_city']").change();
                          $("select[name='FO_send_area']").val("<?=$member_info['text_field_7_2']?>");
/*
						  $("#twzipcode").twzipcode('set', {
							    'county': '<?=$member_info['text_field_7_1']?>',
							    'district': '<?=$member_info['text_field_7_2']?>'
							});
*/
                        }
                      }
                    </script>
                            </fieldset>

                                <ul class="personal">
                                    <!-- 送出必填未填寫會加上 class:required -->
                                    <li id="FO_send_man_alert" class="personal_data">
                                        <label for="name">
                                            <div>姓名<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="name" name="FO_send_man" placeholder="請輸入真實姓名" value="<?=$order_info['send_man']?>" />
                                        </div>
                                    </li>
                                    <li id="FO_send_email_alert" class="personal_data">
                                        <label for="mail">
                                            <div>E-mail<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="email" id="emailAddress" name="FO_send_email" placeholder="請輸入常用E-mail" required value="<?=$order_info['send_email']?>" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,5}$" />
                                        </div>
                                    </li>
                                    <li id="FO_send_handphone_alert" class="personal_data">
                                        <label for="phone">
                                            <div>手機<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="tel" id="phone" name="FO_send_handphone" placeholder="請輸入手機號碼" value="<?=$order_info['send_handphone']?>" pattern="[0-9]{10}" maxlength="10" />
                                        </div>
                                    </li>
                                    <li class="personal_data">
                                        <!-- 非必填會加上 class:optional -->
                                        <label for="tel" class="optional">
                                            <div>室內電話<span>必填</span></div>
                                        </label>
                                        <div class="telephone">
                                            <div class="input area_code">
                                                <input type="text" id="area_code" name="FO_recipient_tel" placeholder="區域號碼" pattern="[0-9]{2,3}" value="<?=$order_info['recipient_tel']?>" />
                                            </div>
                                            <div class="input tel">
                                                <input type="text" id="tel" name="FO_send_tel" placeholder="請填寫電話"  pattern="[0-9]{6,10}" value="<?=$order_info['send_tel']?>" />
                                            </div>
                                        </div>
                                    </li>
                                    <li id="FO_send_address_alert" class="personal_data">
                                        <label for="district">
                                            <div>地址<span>必填</span></div>
                                        </label>
                                        <div class="city-selector ">
                                            <span class="selector">
                                                <select class="county">
                                                </select>
                                                <select class="district2">
                                                </select>
                                            </span>
                                            <div class="input address">
                                                <input type="text" id="address" name="FO_send_address" placeholder="請填寫地址" value="<?=$order_info['send_address']?>" />
                                            </div>
                                        </div>
                                    </li>
                                    <li class="personal_data">
                                        <!-- 非必填會加上 class:optional -->
                                        <label for="note" class="optional">
                                            <div>備註<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="note" name="FO_send_note" placeholder="請輸入備註" value="<?=$order_info['send_note']?>" />
                                        </div>
                                    </li>
                                </ul>
                        </div>
                        <div class="payment">
                            <div class="personal">
                                <div class="personal_col">
                                    <div class="personal_data">
                    <?
                    $checked1="checked";
                    $checked2="";
                    $checked3="";
                    $checked4="";
                    $checked5="";
                    $checked6="";
                    $checked7="";
                    $checked8="";
                    $checked9="";

                    $display1="";
                    $display2="";

                    if($order_info['pay_type'] == "信用卡付款")
                    {
                        $checked1="checked";
                        $display1="";

                    }
                    elseif($order_info['pay_type'] == "ATM繳費")
                    {
                        $checked1="";
                        $checked2="checked";
                        $display1="none";
                    }
                    elseif($order_info['pay_type'] == "超商條碼")
                    {
                        $checked1="";
                        $checked3="checked";
                        $display1="none";
                    }
                    elseif($order_info['pay_type'] == "超商代碼")
                    {
                        $checked1="";
                        $checked4="checked";
                        $display1="none";
                    }
                    elseif($order_info['pay_type'] == "貨到付款")
                    {
                        $checked1="";
                        $checked5="checked";
                        $display1="none";
                    }
                    elseif($order_info['pay_type'] == "中租零卡分期")
                    {
                        $checked1="";
                        $checked6="checked";
                        $display1="";
                    }
                    elseif($order_info['pay_type'] == "ApplePay")
                    {
                        $checked1="";
                        $checked7="checked";
                        $display1="none";
                    }
                    elseif($order_info['pay_type'] == "街口支付")
                    {
                        $checked1="";
                        $checked8="checked";
                        $display1="none";
                    }
                    elseif($order_info['pay_type'] == "LinePay")
                    {
                        $checked1="";
                        $checked9="checked";
                        $display1="none";
                    }


                    ?>
                                        <label for="check">
                                            <div>付款方式<span>必填</span></div>
                                        </label>
                                        <fieldset>
                                            <div class="ckbutton">
                                                <input type="radio" id="card" name="FO_pay_type" value="信用卡付款" <?=$checked1?> />
                                                <label for="card">信用卡付款</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="ATM" name="FO_pay_type" value="ATM繳費" <?=$checked2?> />
                                                <label for="ATM">ATM虛擬代碼繳費</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="barcode" name="FO_pay_type" value="超商條碼" <?=$checked3?> />
                                                <label for="barcode">超商條碼</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="code" name="FO_pay_type" value="超商代碼" <?=$checked4?> />
                                                <label for="code">超商代碼</label>
                                            </div>
<!--
                                            <div class="ckbutton">
                                                <input type="radio" id="cash" name="FO_pay_type" value="貨到付款" <?=$checked5?> />
                                                <label for="cash">貨到付款</label>
                                            </div>
-->
                                            <!--<div class="ckbutton">
                                                <input type="radio" id="cash" name="FO_pay_type" value="中租零卡分期" <?=$checked6?> />
                                                <label for="cash">中租零卡分期</label>
                                            </div>-->
                                            <?
	                                            if((substr_count($_SERVER['HTTP_USER_AGENT'],"Chrome")==0 && substr_count($_SERVER['HTTP_USER_AGENT'],"CriOS")==0)  && substr_count($_SERVER['HTTP_USER_AGENT'],"Safari")>=1 ){
                                            ?>
                                            <div class="ckbutton">
                                                <input type="radio" id="apple" name="FO_pay_type" value="ApplePay" <?=$checked7?> />
                                                <label for="apple">Apple Pay</label>
                                            </div>
                                            <?
	                                            }
                                            ?>
                                            <div class="ckbutton">
                                                <input type="radio" id="street" name="FO_pay_type" value="街口支付" <?=$checked8?> />
                                                <label for="street">街口支付</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="line" name="FO_pay_type" value="LinePay" <?=$checked9?> />
                                                <label for="line">Line Pay</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <!-- 只有信用卡付款才會顯示 -->
                                    <div class="personal_data row" id="installment">
                                        <label for="check">
                                            <div>分期期數<span>必填</span></div>
                                        </label>
                    <?
                    $max_num=count($order_cnt_info);
                    $credit_arr = [["title"=>"一次付清","value"=>"一次付清"],["title"=>"三期","value"=>"三期"],["title"=>"六期","value"=>"六期"],["title"=>"十二期","value"=>"十二期"]];

                    #新的設定在總金額
                    $new_credit_arr=array("一次付清");
                    $j9_info=array();
                    $where_clause=" 1 order by Fmain_id asc ";
                    $tbl_name="sys_portal_j9";	//$MYSQL_TABS['portal_b2']
                    getall_data($tbl_name, $where_clause, $j9_info);
                    for($iii=0;$iii<count($j9_info);$iii++){
	                    if($order_info['sum_total']*1 >= $j9_info[$iii]['text_field_1']*1){
		                    $new_credit_arr[] = $j9_info[$iii]['text_field_0'];
	                    }
                    }

                    ?>
                                        <fieldset>
                                            <div class="ckbutton">
                                                <input type="radio" id="once" name="FO_credit_card_split" checked />
                                                <label for="once">一次付清</label>
                                            </div>
                            <?for($iii=1;$iii<count($new_credit_arr);$iii++){
                              $check = "";
//                              if($iii==0){
//                                $check = "checked";
//                              }


                              if($new_credit_arr[$iii])#$credit_num[$credit_arr[$iii]] == $max_num
                              {

                          ?>
                            <div class="ckbutton">
                              <input type="radio" id="<?=$new_credit_arr[$iii]?>" name="FO_credit_card_split" value="<?=$new_credit_arr[$iii]?>0利率" <?=$check?> >
                              <label for="<?=$new_credit_arr[$iii]?>"><?=$new_credit_arr[$iii]?>0利率</label>
                            </div>
                             <?}?>
                          <?}?>
<!--
                                            <div class="ckbutton">
                                                <input type="radio" id="three" name="card" />
                                                <label for="three">3期</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="six" name="card" />
                                                <label for="six">6期</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="twelve" name="card" />
                                                <label for="twelve">12期</label>
                                            </div>
-->
                                        </fieldset>
                                    </div>
                                </div>
                                
                                
                                <div class="personal_col">
                                            <div class="personal_data">
                                                <label for="check">
                                                    <div>發票資訊<span>必填</span></div>
                                                </label>
                                                <fieldset class="mo_block">
                                                    <div class="ckbutton">
                                                        <input type="radio" id="member" name="FO_invoice_type" value="會員載具" checked="" />
                                                        <label for="member">會員載具</label>
                                                    </div>
                                                    <!-- <div class="member_num2">
                                                        <label for="check">
                                                            <div>中獎發票將以電子信件通知</div>
                                                        </label>
                                                    </div> -->
                                                    <div class="ckbutton">
                                                        <input type="radio" id="mobile" name="FO_invoice_type" value="手機條碼" />
                                                        <label for="mobile">手機條碼</label>
                                                    </div>
<!--
                                                    <div class="mobile_num2">
                                                        <div class="input">
                                                            <input type="text" id="mobile_num" name="mobile_num" placeholder='輸入"/"與後7碼' />
                                                        </div>
                                                    </div>
-->
                                                    <div class="ckbutton">
                                                        <input type="radio" id="citizen" name="FO_invoice_type" value="自然人憑證" />
                                                        <label for="citizen">自然人憑證</label>
                                                    </div>
                                                    <!-- <div class="citizen_num2">
                                                        <label for="check">
                                                            <div>自然人憑證卡號<i>(2個英文字母+14個數字)</i><span>必填</span></div>
                                                        </label>
                                                        <div class="input">
                                                            <input type="text" id="citizen_num" name="citizen_num" placeholder="輸入16碼卡號" />
                                                        </div>
                                                    </div> -->
                                                    <div class="ckbutton">
                                                        <input type="radio" id="company" name="FO_invoice_type" value="公司發票" />
                                                        <label for="company">公司發票</label>
                                                    </div>
<!--
                                                    <div class="company_num2">
                                                        <label for="check">
                                                            <div>統一編號<span>必填</span></div>
                                                        </label>
                                                        <div class="input">
                                                            <input type="text" id="company_num" name="company_num" placeholder="請輸入統一編號" />
                                                        </div>
                                                        <label for="check">
                                                            <div>發票抬頭<span>必填</span></div>
                                                        </label>
                                                        <div class="input">
                                                            <input type="text" id="company_num2" name="company_num2" placeholder="請輸入發票抬頭" />
                                                        </div>
                                                        <label for="check">
                                                            <div>發票收取E-mail<span>必填</span></div>
                                                        </label>
                                                        <div class="input">
                                                            <input type="text" id="company_num3" name="company_num3" placeholder="請輸入E-mail" />
                                                        </div>
                                                    </div>
-->
                                                    <div class="ckbutton">
                                                        <input type="radio" id="donate" name="FO_invoice_type" value="捐贈發票" />
                                                        <label for="donate">捐贈發票</label>
                                                    </div>
                                                    <!-- <div class="donate_num2">
                                                        <div class="input">
                                                            <input type="text" id="donate_num" name="donate_num" placeholder="請輸入社福代碼或關鍵字" />
                                                        </div>
                                                        <select name="quantity" id="quantity-select2">
                                                            <option value="0" selected disabled hidden>選項</option>
                                                        </select>
                                                    </div> -->
                                                    <!-- <div class="ckbutton">
                                                        <input type="radio" id="cloud" name="FO_invoice_type" value="雲端發票" <?= (($order_info['invoice_type'] == "雲端發票" || !$order_info['invoice_type']) ? " checked" : "") ?> />
                                                        <label for="cloud">雲端發票</label>
                                                    </div>
                                                    <div class="ckbutton">
                                                        <input type="radio" id="double" name="FO_invoice_type" value="紙本發票-二聯式" <?= (($order_info['invoice_type'] == "紙本發票-二聯式") ? " checked" : "") ?> />
                                                        <label for="double">紙本 - 二聯式發票</label>
                                                    </div>
                                                    <div class="ckbutton">
                                                        <input type="radio" id="triple" name="FO_invoice_type" value="紙本發票-三聯式" <?= (($order_info['invoice_type'] == "紙本發票-三聯式") ? " checked" : "") ?> />
                                                        <label for="triple">紙本 - 三聯式發票</label>
                                                    </div> -->
                                                </fieldset>
                                            </div>
                                            <div class="personal_data">
                                                <div class="member_num">
                                                    <label for="check">
                                                        <div>中獎發票將以電子信件通知</div>
                                                    </label>
                                                </div>
                                                <div class="mobile_num">
                                                    <div class="input">
                                                        <input type="text" id="mobile_num" name="FO_cloud_num" placeholder='輸入"/"與後7碼' pattern="/[a-zA-Z0-9._%+-]{7}" />
                                                    </div>
                                                </div>
                                                <div class="citizen_num">
                                                    <label for="check">
                                                        <div>自然人憑證卡號<i>(2個英文字母+14個數字)</i><span>必填</span></div>
                                                    </label>
                                                    <div class="input">
                                                        <input type="text" id="citizen_num" name="FO_citizen_num" placeholder="輸入16碼卡號" />
                                                    </div>
                                                </div>
                                                <div class="company_num">
                                                    <label for="check">
                                                        <div>統一編號<span>必填</span></div>
                                                    </label>
                                                    <div class="input">
                                                        <input type="text" id="company_num" name="FO_unification_num" placeholder="請輸入統一編號" />
                                                    </div>
                                                    <label for="check">
                                                        <div id="FO_invoice_title_alert">發票抬頭<span>必填</span></div>
                                                    </label>
                                                    <div class="input">
                                                        <input type="text" id="company_num2" name="FO_invoice_title" placeholder="請輸入發票抬頭" />
                                                    </div>
                                                    <label for="check">
                                                        <div>發票收取E-mail<span>必填</span></div>
                                                    </label>
                                                    <div class="input">
                                                        <input type="text" id="company_num3" name="FO_invoice_mail" placeholder="請輸入E-mail" />
                                                    </div>
                                                </div>
                                                <div class="donate_num">
                                                    <div class="input">
                                                        <input type="text" id="donate_search" name="donate_search" placeholder="請輸入社福代碼或關鍵字" onblur="chk_donate(this.value);" onkeyup="chk_donate(this.value);" />
                                                    </div>
                                                    <select name="FO_donate_num" id="FO_donate_num">
                                                        <option value="" selected disabled hidden>選項</option>
                                                    </select>
                                                </div>

                                            </div>
<!--
                                <div class="personal_col">
                                    <div class="personal_data">
                                        <label for="check">
                                            <div>發票資訊<span>必填</span></div>
                                        </label>
                                        <fieldset>
                                            <div class="ckbutton">
                                                <input type="radio" id="cloud" name="FO_invoice_type" value="雲端發票" <?=(($order_info['invoice_type']=="雲端發票" || !$order_info['invoice_type'])?" checked":"")?> />
                                                <label for="cloud">雲端發票</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="cloud" name="FO_invoice_type" value="雲端發票" <?=(($order_info['invoice_type']=="雲端發票" || !$order_info['invoice_type'])?" checked":"")?> />
                                                <label for="cloud">雲端發票</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="double" name="FO_invoice_type" value="紙本發票-二聯式" <?=(($order_info['invoice_type']=="紙本發票-二聯式")?" checked":"")?> />
                                                <label for="double">紙本 - 二聯式發票</label>
                                            </div>
                                            <div class="ckbutton">
                                                <input type="radio" id="triple" name="FO_invoice_type" value="紙本發票-三聯式" <?=(($order_info['invoice_type']=="紙本發票-三聯式")?" checked":"")?> />
                                                <label for="triple">紙本 - 三聯式發票</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="personal_data">
                                        <div id="FO_cloud_num_alert" class="cloud_num">
                                            <label for="check">
                                                <div>載具號碼<span>必填</span></div>
                                            </label>
                                            <div class="input">
                                                <input type="text" id="cloud_num" name="FO_cloud_num" placeholder="請輸入載具號碼" />
                                            </div>
                                        </div>
                                        <div id="FO_recipient_address_alert" class="double_num">
                                            <label for="check">
                                                <div>發票地址<span>必填</span></div>
                                            </label>
                                            <div class="city-selector2 city-flex">
                                                <span class="selector">
                                                    <select class="county2 county_width">
                                                    </select>
                                                    <select class="district3 district_width">
                                                    </select>
                                                </span>
                                                <div class="input address">
                                                    <input type="text" id="phone" name="FO_recipient_address" placeholder="請填寫地址" value="<?=$order_info['recipient_address']?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="FO_recipient_address_alert_2" class="triple_num">
                                            <label for="check">
                                                <div>發票地址<span>必填</span></div>
                                            </label>
                                            <div class="city-selector3 city-flex">
                                                <span class="selector">
                                                    <select class="county3 county_width">
                                                    </select>
                                                    <select class="district4 district_width">
                                                    </select>
                                                </span>
                                                <div class="input address">
                                                    <input type="text" id="phone" name="FO_recipient_address_2" placeholder="請填寫地址" value="<?=$order_info['recipient_address']?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="triple_num2">
                                            <div id="FO_invoice_title_alert" class="company_name">
                                                <label for="check">
                                                    <div>公司抬頭<span>必填</span></div>
                                                </label>
                                                <div class="input">
                                                    <input type="text" id="cloud_num" name="FO_invoice_title" placeholder="公司抬頭" />
                                                </div>
                                            </div>
                                            <div id="FO_unification_num_alert" class="company_num">
                                                <label for="check">
                                                    <div>公司統編<span>必填</span></div>
                                                </label>
                                                <div class="input">
                                                    <input type="text" id="cloud_num" name="FO_unification_num" placeholder="公司統編" />
                                                </div>
                                            </div>
-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <fieldset>
                            <div class="checkbox">
                                <input type="checkbox" id="agree"  name="check_box"  value="Y" />
                                <label for="agree">
                                    <span>我已詳細閱讀 <a href="terms.php" target="_blank"><span>基本保固條款</span></a> 及 <a href="terms.php" target="_blank"><span>退換貨原則</span></a> ，並同意接受內容所有款項規定</span>
                                </label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="btn_flex">
                        <a href="javascript:<?=(($_COOKIE['member_userid'])?"form_submit();":"alert('請先登入會員！');location.replace('login.php?back_url=cart.php');")?>" class="store_btn">
                            <div>進行付款</div>
                        </a>
                    </div>
                    <?
			            }
		            ?>
                </div>
            </div>
            </form>
        </section>
    </main>
    <?php
    include "quote/template/footer.php";
    include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/tw-city-selector.js"></script>
    <script src="dist/js/main.js"></script>
    <script src="dist/js/registration.js"></script>
    <script>
        document.querySelector('.back-btn').onclick = function() {
            window.history.back();
        }
    </script>
    <script>
	    document.addEventListener('DOMContentLoaded', function() {
            var memberRadio = document.getElementById('member');
            var mobileRadio = document.getElementById('mobile');
            var citizenRadio = document.getElementById('citizen');
            var companyRadio = document.getElementById('company');
            var donateRadio = document.getElementById('donate');

            var memberNumInput = document.querySelector('.member_num');
            var mobileNumInput = document.querySelector('.mobile_num');
            var citizenNumInput = document.querySelector('.citizen_num');
            var companyNumInput = document.querySelector('.company_num');
            var donateNumInput = document.querySelector('.donate_num');

            var memberNumInput2 = document.querySelector('.member_num2');
            var mobileNumInput2 = document.querySelector('.mobile_num2');
            var citizenNumInput2 = document.querySelector('.citizen_num2');
            var companyNumInput2 = document.querySelector('.company_num2');
            var donateNumInput2 = document.querySelector('.donate_num2');

            function setUpEventListeners() {
                // 移除舊的事件監聽器以避免重複綁定
                memberRadio.onclick = mobileRadio.onclick = citizenRadio.onclick = companyRadio.onclick = donateRadio.onclick = null;

                if (window.innerWidth > 991) {
                    memberRadio.addEventListener('click', function() {
                        memberNumInput.style.display = 'block';
                        mobileNumInput.style.display = 'none';
                        citizenNumInput.style.display = 'none';
                        companyNumInput.style.display = 'none';
                        donateNumInput.style.display = 'none';
                    });

                    mobileRadio.addEventListener('click', function() {
                        memberNumInput.style.display = 'none';
                        mobileNumInput.style.display = 'block';
                        citizenNumInput.style.display = 'none';
                        companyNumInput.style.display = 'none';
                        donateNumInput.style.display = 'none';
                    });

                    citizenRadio.addEventListener('click', function() {
                        memberNumInput.style.display = 'none';
                        mobileNumInput.style.display = 'none';
                        citizenNumInput.style.display = 'flex';
                        companyNumInput.style.display = 'none';
                        donateNumInput.style.display = 'none';
                    });

                    companyRadio.addEventListener('click', function() {
                        memberNumInput.style.display = 'none';
                        mobileNumInput.style.display = 'none';
                        citizenNumInput.style.display = 'none';
                        companyNumInput.style.display = 'flex';
                        donateNumInput.style.display = 'none';
                    });

                    donateRadio.addEventListener('click', function() {
                        memberNumInput.style.display = 'none';
                        mobileNumInput.style.display = 'none';
                        citizenNumInput.style.display = 'none';
                        companyNumInput.style.display = 'none';
                        donateNumInput.style.display = 'flex';
                    });
                } else {
                    memberRadio.addEventListener('click', function() {
                        memberNumInput.style.display = 'block';
                        mobileNumInput.style.display = 'none';
                        citizenNumInput.style.display = 'none';
                        companyNumInput.style.display = 'none';
                        donateNumInput.style.display = 'none';
                    });

                    mobileRadio.addEventListener('click', function() {
                        memberNumInput.style.display = 'none';
                        mobileNumInput.style.display = 'block';
                        citizenNumInput.style.display = 'none';
                        companyNumInput.style.display = 'none';
                        donateNumInput.style.display = 'none';
                    });

                    citizenRadio.addEventListener('click', function() {
                        memberNumInput.style.display = 'none';
                        mobileNumInput.style.display = 'none';
                        citizenNumInput.style.display = 'flex';
                        companyNumInput.style.display = 'none';
                        donateNumInput.style.display = 'none';
                    });

                    companyRadio.addEventListener('click', function() {
                        memberNumInput.style.display = 'none';
                        mobileNumInput.style.display = 'none';
                        citizenNumInput.style.display = 'none';
                        companyNumInput.style.display = 'flex';
                        donateNumInput.style.display = 'none';
                    });

                    donateRadio.addEventListener('click', function() {
                        memberNumInput.style.display = 'none';
                        mobileNumInput.style.display = 'none';
                        citizenNumInput.style.display = 'none';
                        companyNumInput.style.display = 'none';
                        donateNumInput.style.display = 'flex';
                    });
                }
            }

            // 初始呼叫
            setUpEventListeners();

            // 視窗大小改變時重新呼叫
            window.addEventListener('resize', setUpEventListeners);
        });
/*
        document.addEventListener('DOMContentLoaded', function() {
            var cloudRadio = document.getElementById('cloud');
            var doubleRadio = document.getElementById('double');
            var tripleRadio = document.getElementById('triple');

            var cloudNumInput = document.querySelector('.cloud_num');
            var doubleNumInput = document.querySelector('.double_num');
            var tripleNumInput = document.querySelector('.triple_num');
            var tripleNumInput2 = document.querySelector('.triple_num2');


            cloudRadio.addEventListener('click', function() {
                cloudNumInput.style.display = 'flex';
                doubleNumInput.style.display = 'none';
                tripleNumInput.style.display = 'none';
                tripleNumInput2.style.display = 'none';

            });

            doubleRadio.addEventListener('click', function() {
                cloudNumInput.style.display = 'none';
                doubleNumInput.style.display = 'flex';
                tripleNumInput.style.display = 'none';
                tripleNumInput2.style.display = 'none';

            });

            tripleRadio.addEventListener('click', function() {
                cloudNumInput.style.display = 'none';
                doubleNumInput.style.display = 'none';
                tripleNumInput.style.display = 'flex';
                tripleNumInput2.style.display = 'flex';

            });
        });
*/
    </script>
    <script>
        const citySelector1 = new TwCitySelector({
            el: '.city-selector',
            elCounty: '.county',
            elDistrict: '.district2',
            countyFieldName: 'FO_send_city',
            districtFieldName: 'FO_send_area',
            standardWords: true,
            hiddenZipcode: true
        });

        const citySelector2 = new TwCitySelector({
            el: '.city-selector2',
            elCounty: '.county2',
            elDistrict: '.district3',
            countyFieldName: 'city_1',
            districtFieldName: 'area_1',
            standardWords: true,
        });

        const citySelector3 = new TwCitySelector({
            el: '.city-selector3',
            elCounty: '.county3',
            elDistrict: '.district4',
            countyFieldName: 'city_2',
            districtFieldName: 'area_2',
            standardWords: true,
        });
    </script>
    <script type="text/javascript">

  $("input[name='FO_pay_type']").change(function() {
    if($("input[name='FO_pay_type']:checked").val()=="信用卡付款" || $("input[name='FO_pay_type']:checked").val()=="中租零卡分期"){
      $("#credit_count").show();
    }else{
      $("#credit_count").hide();
    }
  });
<?
if($have_hide){
?>
$(function() {
// 	alert('請您確認商品數量，謝謝！');
// 	$(".fmbtn").attr('disabled', 'disabled');
});
<?
}
?>
<?
if($_GET['show_hide']){
?>
$(function() {
// 	alert('請您確認商品數量，謝謝！');
// 	$(".fmbtn").attr('disabled', 'disabled');
});
<?
}
?>
$(function() {
	load_coupon();
});
</script>


<script type="text/javascript">
  function formatNumber(number)
  {
     var num = number.toString();
     var pattern = /(-?\d+)(\d{3})/;

     while(pattern.test(num))
     {
      num = num.replace(pattern, "$1,$2");

     }
     return num;
  }

  function add_or_sub(id,value,product_id){

    var this_amount = parseInt($("#12_cnt_"+id).val());

    $.post("ajax_change_product_amount.php",{
      y100_cnt_id: id,
      amount:this_amount,
      product_id:product_id,
      action:'amount',
    },function(data, status){
      console.log(data);
      data = data.trim();
      if(data!=''){
        if(data.indexOf("shortage") >= 0 ){
          alert("庫存不足");
          $("#12_cnt_"+id).val(data.replace('shortage', ''));
        }else{
          arr=data.split('_');



          $("#show_total").html(formatNumber(arr[1]));
          $("#total").html(formatNumber(arr[0]));
          $("#discount").html(formatNumber(arr[2]));
          $("#traffic_money").html(formatNumber(arr[3]));
          $("#sub_price_"+id).html(formatNumber(arr[4]));
          $("#12_cnt_"+id).val(this_amount);
          if(arr[3] == "0"){
	          $("#traffic_str").attr("style","font-weight:bold;");
          }
          else{
	          $("#traffic_str").attr("style","color:#797979;");
          }

          // 更新優惠訊息
          a=Math.floor(Math.random()*(100000-0));
          dataSource = '&parm='+new Date().getTime()+a;

          $.post('ajax_check_sale_info.php?'+dataSource+'',{},function(data,textStatus,XMLHttpRequest)
          {
              //alert(data);
              if(data != "")
              {
                  $("#promote_str").html(data);
              }


          });

          // 更新免運訊息
          a=Math.floor(Math.random()*(100000-0));
          dataSource = '&parm='+new Date().getTime()+a;

          $.post('ajax_check_traffic_money_info.php?'+dataSource+'',{},function(data,textStatus,XMLHttpRequest)
          {
              //alert(data);
              if(data != "")
              {
                  $("#traffic_str").html(data);
              }


          });



        }

        check_promote_str();
        chg_code();
        load_coupon();
        chg_coupon($('#coupon_id').val());
      }
    });

  }
  $("#use_code").change(function(){
		chg_code();
  });

  function chg_code(){
	  var url = "cart.php";
	  $.post("ajax_change_code.php",{
        	code_num: $("#use_code").val()
		},function(data){
		 //console.log(data.error);
			<?
			$order_cnt_info=array();
			$where_clause=" portal_y100_id='".$order_info['Fmain_id']."' and is_addbuy = '2' order by Fmain_id asc";
			$tbl_name=$MYSQL_TABS['portal_y100_cnt'];
			getall_data($tbl_name, $where_clause, $order_cnt_info);
			?>
			if($("#use_code").val()==""){
				$("#code_err").html("");
			    $("#discount_code").html("0");
			    $("#total").html(data.sum_total);
			    <?
				for($j=0;$j<count($order_cnt_info);$j++){
				?>
					$("#code_dv_<?=$order_cnt_info[$j]['Fmain_id']?>").html('');
				<?
				}
			    ?>
			    <?
				    if($order_info['use_code']){
					    ?>
					    window.location.href = url;
					    <?
				    }
			    ?>
			    
			}
			else if(data.error!=''){
			    $("#code_err").html(data.error);
			    $("#discount_code").html("0");
			    $("#total").html(data.sum_total);
			    <?
				for($j=0;$j<count($order_cnt_info);$j++){
				?>
					$("#code_dv_<?=$order_cnt_info[$j]['Fmain_id']?>").html('');
				<?
				}
			    ?>
			    <?
				    if($order_info['use_code']){
					    ?>
					    window.location.href = url;
					    <?
				    }
			    ?>
			}
			else{
			    $("#discount_code").html(data.code_money);
			    $("#total").html(data.sum_total);
			    $("#code_err").html("");
			    <?
				for($j=0;$j<count($order_cnt_info);$j++){
				?>
					if(data.code_dv_<?=$order_cnt_info[$j]['Fmain_id']?> == '1'){
						$("#code_dv_<?=$order_cnt_info[$j]['Fmain_id']?>").html(data.code_name);
					}
				<?
				}
			    ?>
			    window.location.href = url;
			}
		}, "json");
  }

  function chg_coupon(id){
	 var url = "cart.php";

    $.post("ajax_change_coupon.php",{
        coupon_id: id
    },function(data, status){
        // console.log(data);
        data = data.trim();
        if(data!=''){
	        $("#coupon_err").html(data);
	        $("#discount_coupon").html('0');
        }
        else{
	        window.location.href = url;
        }
    });
  }

  function del_d12_cnt(id,product_id){

    var url = "cart.php";

    $.post("ajax_change_product_amount.php",{
        d12_cnt_id: id,
        product_id:product_id,
        action:'remove',
    },function(data, status){
        // console.log(data);
        data = data.trim();
        if(data!=''){
          window.location.href = url;
          // $("#product_show_"+id).remove();
          // $("#show_total").html(data);
        }
        else{
	        alert('此筆訂單已成立，將幫您導回首頁繼續瀏覽，謝謝！');
	        location.replace('index.php');
        }
    });

  }

  function del_d12_cnt_add(id,product_id){

    var url = "cart.php";

    $.post("ajax_change_product_amount.php",{
        d12_cnt_id: id,
        product_id:product_id,
        action:'add_remove',
    },function(data, status){
        console.log(data);
        data = data.trim();
        if(data!=''){
          window.location.href = url;
          // $("#product_show_"+id).remove();
          // $("#show_total").html(data);
          check_promote_str();
        }
        else{
	        alert('此筆訂單已成立，將幫您導回首頁繼續瀏覽，謝謝！');
	        location.replace('index.php');
        }
    });

  }


  function change_size_or_color(cnt_id,value,type_id){

    $.post("ajax_change_product_amount.php",{
      action: "change_size_or_color",
      d12_cnt_id:cnt_id,
      size_id:value,
      amount:$("#12_cnt_"+cnt_id).val(),
    },
    function(data, status){

      console.log(data);
      data = data.trim();
      if(data!=''){
        if(data.indexOf("shortage") >= 0 ){
          alert("庫存不足");
          $("#show_size_"+cnt_id).val(data.replace('shortage', ''));
        }else if(data.indexOf("repeat") >= 0 ){
          alert("品項重複");
          $("#show_size_"+cnt_id).val(data.replace('repeat', ''));
        }else{

          arr=data.split('_');

          $("#price_"+cnt_id).html(formatNumber(arr[4]));
          $("#sub_price_"+cnt_id).html(formatNumber(arr[5]));
          $("#traffic_money").html(formatNumber(arr[3]));
          $("#discount").html(formatNumber(arr[2]));
          $("#show_total").html(formatNumber(arr[1]));
          $("#total").html(formatNumber(arr[0]));
          if(arr[3] == "0"){
	          $("#traffic_str").attr("style","font-weight:bold;");
          }
          else{
	          $("#traffic_str").attr("style","color:#797979;");
          }

          if(parseInt(arr[6])>0){
            var str = "";
            for (var i = 1; i <= arr[6]; i++){
              var select = "";
              if(i==$("#12_cnt_"+cnt_id).val()){
                select = "selected";
              }
              str += "<option value='"+i+"' "+select+" >"+i+"</option>";
            }

            $("#12_cnt_"+cnt_id).html(str);
			$(".in_"+cnt_id).removeClass("opa5");
// 			$(".fmbtn").removeAttr('disabled');
          }
		  else if(parseInt(arr[6]) == 0){
			  $("#12_cnt_"+cnt_id).html("<option value=''>已售完</option>");
			  $(".in_"+cnt_id).addClass("opa5");
// 			  alert('請您確認商品數量，謝謝！');
// 			  $(".fmbtn").attr('disabled', 'disabled');
		  }

        }

        check_promote_str();
        load_coupon();
        chg_code();
        chg_coupon($('#coupon_id').val());
      }
    });
  }



  $("#use_bonus").change(function(){
    if(this.value == "")
       var the_value = 0;
    else
       var the_value = parseInt(this.value);


    the_value=Math.abs(the_value);
    $(this).val(the_value);

    if($.isNumeric(the_value)){

      $.post("ajax_change_product_amount.php",{
        bonus:the_value,
        max_bonus:<?=$this_bonus?>,
        action:'use_bonus',
      },function(data, status){
        console.log(data);
        data = data.trim();

        if(data!=''){
          if(data.indexOf("shortage") >= 0 ){
            alert("點數不足");
            $("#use_bonus").val("");
          }else if(data.indexOf("over") >= 0 ){

            data = data.replace('over', '')
            arr=data.split('_');

            $("#discount_bonus").html(formatNumber(arr[1]));
            $("#use_bonus").val(arr[1]);

            $("#total").html(formatNumber(arr[0]));

          }else{
            arr=data.split('_');

            $("#discount_bonus").html(formatNumber(arr[1]));
            $("#total").html(formatNumber(arr[0]));
          }
		  location.reload();
		  //load_coupon();
          //check_promote_str();
          //chg_code();
          //chg_coupon($('#coupon_id').val());
        }

      });

    }else{
      $("#use_bonus").val("");
    }


  });

  function load_coupon(){
	  $.post("iframe_coupon.php",{},
	    function(data){
			$("#scrbx").html(data);
	    }, "html");
  }

  function check_promote_str(){

    console.log("test");
    //$("#promote_str").html("");
    //sale_info_give_name amount_sale_info_money_give_name
  }

</script>
<script>
// Email
function checkEmail(string) {
  re = /^.+@.+\..{2,3}$/;
  if (re.test(string))
   return true;
 }

// 數字
function checkNumber(string) {
  re = /^\d+$/;
  if (re.test(string))
   return true;
 }
 
//台灣公司統一編號(由8位數字組成)
function isCompanyId(string) {
	var regexp = /^[0-9]{8}$/;
	return regexp.test(string);
}

//台灣自然人憑證(2碼英文字母加上14碼數字)
function isCertificated(string) {
	var regexp = /^[a-zA-Z]{2}[0-9]{14}$/;
	return regexp.test(string);
}

//電子發票手機條碼(斜線(/)加上7碼數字或大寫字母)
function isInvoice(string) {
	var regexp = /^\/{1}[A-Z0-9._%+-]{7}$/;
	return regexp.test(string);
}

function form_submit(){

 var error_sn=0;
 var the_alert = "";
/*
 if($("input[name=FO_send_man]").size() > 0)
 {
*/
	 if($("input[name=FO_send_man]").val() == "")
	 {
	     $("#FO_send_man_alert").addClass("required");
	     error_sn=1;
	     the_alert += "姓名必填！\n";
	 }
	 else{
		 $("#FO_send_man_alert").removeClass("required");
	 }
//  }

/*
 if($("input[name=FO_send_email]").size() > 0)
 {
*/
	 if($("input[name=FO_send_email]").val() == "")
	 {
	     $("#FO_send_email_alert").addClass("required");
	     error_sn=1;
	     the_alert += "Email必填！\n";
	 }
	 else
	 {
	     var email_str=$("input[name=FO_send_email]").val();

	     if(!checkEmail(email_str)){
	        $("#FO_send_email_alert").html("*請輸入正確格式Email");
	        $("#FO_send_email_alert").addClass("required");
	        error_sn = 1;
	        the_alert += "請輸入正確格式Email！\n";
	    }
	    else{
			 $("#FO_send_email_alert").removeClass("required");
		 }

	 }
//  }

if($("input[name='FO_send_handphone']").val()=="" ){ //手機
    $("#FO_send_handphone_alert").addClass("required");
    error_sn = 1;
    the_alert += "手機必填！\n";
}else{

    var a=$("input[name='FO_send_handphone']").val();
	var b=a.slice(0,2);

    if(b != "09")
    {
        error_sn = 1;
        the_alert += "手機格式錯誤，請輸入09開頭的十碼數字！\n";
        $("#FO_send_handphone_alert").html("*格式錯誤，請輸入09開頭的十碼數字");
        $("#FO_send_handphone_alert").addClass("required");
    }
    else if(!checkNumber($("input[name='FO_send_handphone']").val()) || $("input[name='FO_send_handphone']").val().length<10 ){
        $("#FO_send_handphone_alert").html("*格式錯誤，請輸入09開頭的十碼數字");
        $("#FO_send_handphone_alert").addClass("required");
        error_sn = 1;
        the_alert += "手機格式錯誤，請輸入09開頭的十碼數字！\n";
    }
	else{
		 $("#FO_send_handphone_alert").removeClass("required");
	 }
}

 if($("select[name=FO_send_city]").find(":selected").val() == "")
 {
     $("#FO_send_address_alert").addClass("required");
     error_sn=1;
     the_alert += "縣市必填！\n";
 }
 else{
	 $("#FO_send_address_alert").removeClass("required");
 }
 if($("select[name=FO_send_area]").find(":selected").val() == "")
 {
     $("#FO_send_address_alert").addClass("required");
     error_sn=1;
     the_alert += "鄉鎮市區必填！\n";
 }
 else{
	 $("#FO_send_address_alert").removeClass("required");
 }

/*
 if($("input[name=FO_send_address]").size() > 0)
 {
*/
	 if($("input[name=FO_send_address]").val() == "")
	 {
	     $("#FO_send_address_alert").addClass("required");
	     error_sn=1;
	     the_alert += "地址必填！\n";
	 }
	 else{
		 $("#FO_send_address_alert").removeClass("required");
	 }
//  }

 var invoice_type_str = $('input[name=FO_invoice_type]:checked').val();

 if(invoice_type_str == "公司發票")
 {

	     if($("input[name=FO_invoice_mail]").val() == "")
	     {
	         $("#FO_invoice_mail_alert").addClass("required");
	         error_sn=1;
	         the_alert += "發票收取E-mail必填！\n";
		 }
	     else{
			 var email_str=$("input[name=FO_invoice_mail]").val();

		     if(!checkEmail(email_str)){
		        $("#FO_invoice_mail_alert").html("*請輸入正確格式Email");
		        $("#FO_invoice_mail_alert").addClass("required");
		        error_sn = 1;
		        the_alert += "發票收取E-mail請輸入正確格式！\n";
		    }
		    else{
				 $("#FO_invoice_mail_alert").removeClass("required");
			 }
		 }


	     if($("input[name=FO_unification_num]").val() == "")
	     {
	         $("#FO_unification_num_alert").addClass("required");
	         error_sn=1;
	         the_alert += "公司統編必填！\n";
	     }
	     else{
			 var unification_str=$("input[name=FO_unification_num]").val();

		     if(!isCompanyId(unification_str)){
		        $("#FO_unification_num_alert").html("*請輸入正確格式公司統編");
		        $("#FO_unification_num_alert").addClass("required");
		        error_sn = 1;
		        the_alert += "請輸入正確格式公司統編！\n";
		    }
		    else{
				 $("#FO_unification_num_alert").removeClass("required");
			 }
		 }



	     if($("input[name=FO_invoice_title]").val() == "")
	     {
	         $("#FO_invoice_title_alert").addClass("required");
	         error_sn=1;
	         the_alert += "發票抬頭必填！\n";
	     }
	     else{
			 $("#FO_invoice_title_alert").removeClass("required");
		 }

 }
 if(invoice_type_str == "自然人憑證")
 {
	     if($("input[name=FO_citizen_num]").val() == "")
	     {
	         $("#FO_citizen_num_alert").addClass("required");
	         error_sn=1;
	         the_alert += "自然人憑證卡號必填！\n";
	     }
	     else{
			 var citizen_str=$("input[name=FO_citizen_num]").val();

		     if(!isCertificated(citizen_str)){
		        $("#FO_citizen_num_alert").html("*請輸入自然人憑證卡號正確格式");
		        $("#FO_citizen_num_alert").addClass("required");
		        error_sn = 1;
		        the_alert += "請輸入自然人憑證卡號正確格式：2個英文字母+14個數字！\n";
		    }
		    else{
				 $("#FO_citizen_num_alert").removeClass("required");
			 }
			 //$("#FO_citizen_num_alert").removeClass("required");
		 }
 }

 if(invoice_type_str == "手機條碼")
 {
	     if($("input[name=FO_cloud_num]").val() == "")
	     {
	         //$("#FO_cloud_num_alert").addClass("required");
	         error_sn=1;
	         the_alert += "手機條碼必填！\n";
	     }
	     else{
			 var cloud_num_str=$("input[name=FO_cloud_num]").val();

		     if(!isInvoice(cloud_num_str)){
		        $("#FO_cloud_num_alert").html("*請輸入手機條碼正確格式：輸入/與後7碼");
		        $("#FO_cloud_num_alert").addClass("required");
		        error_sn = 1;
		        the_alert += "請輸入手機條碼正確格式：輸入/與後7碼！\n";
		    }
		    else{
				 $("#FO_cloud_num_alert").removeClass("required");
			 }
			 //$("#FO_cloud_num_alert").removeClass("required");
		 }

 }

 if(invoice_type_str == "捐贈發票")
 {
	     if($("input[name=FO_donate_num]").val() == "")
	     {
	         $("#FO_donate_num_alert").addClass("required");
	         error_sn=1;
	         the_alert += "捐贈單位必填！\n";
	     }
	     else{
			 $("#FO_donate_num_alert").removeClass("required");
		 }
 }
 
 if($("#agree:checked").val() == undefined)
 {
     $("#check_box_alert").addClass("required");
     error_sn=1;
     the_alert += "詳細閱讀條款必勾！\n";
 }
 else{
	 $("#check_box_alert").removeClass("required");
 }

 if(error_sn == 1){
	 alert(the_alert);
	 return false;
 }


 if($("input[name='FO_pay_type']:checked").val() == "信用卡付款"){
	 alert("刷卡過程中請耐心等候，請避免於離開付款頁面或重整網頁，以避免交易失敗或遺失付款紀錄！");
 }

 if(error_sn==0)
 {
    $(".fmbtn").hide();
    $("#show_load").show();
    document.buy_form.submit();
 }

}
function chk_donate(val){	
	$.post("ajax_chk_donate.php",{word:val},
	  function(data){
	    //alert(data);
	    //console.log(data);
	    eval(data);
	  }, "text");
}
$(function() {
	chk_donate($("#donate_search").val());
});
</script>
<!--
<script src="dist/js/jquery.twzipcode.min.js"></script>
<script src="dist/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
    $("#twzipcode").twzipcode({
        zipcodeIntoDistrict: true,
        hideCounty:['金門縣','連江縣','澎湖縣'],

    });
    $(window).on("load",function(){
        $("#scrbx").mCustomScrollbar();
    });
    $('.coup_box').on('click',function(){
        $('.popupBox').addClass('in-view');
        $('html,body').css('overflow', 'hidden');
    });
    $('.rmicon').on('click',function(){
        $('.popupBox').removeClass('in-view');
        $('html,body').removeAttr('style');
    });
    $('.vwbtn').on('click',function(){
        $('.popupContent .vwbtn').removeClass('active');
        $(this).toggleClass('active');
    });
</script>
-->
</body>

</html>