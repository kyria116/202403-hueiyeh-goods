<?php 
	
    require_once ("global_include_file.php");

    require_once ("global_function_mail.php");
    require_once ('login_admin/library/mail.php');



    if($_POST['submit']!=""){ //送出表單


        $ARR_Update = array();
        while ( list($Rfield, $Rvalue)=each($_POST) ){
            if (substr($Rfield,0,3)=="FO_") {
                $Rfield = str_replace ("FO_", "", $Rfield);
                  if (!get_magic_quotes_gpc()) {
                      $Rvalue = AddSlashes($Rvalue);
                  }
                  $ARR_Update[$Rfield] = $Rvalue;
           }
        }
		$ARR_Update['text_field_6'] = $ARR_Update['text_field_6_1']."-".$ARR_Update['text_field_6_2'];
		$ARR_Update['text_field_7'] = $ARR_Update['text_field_7_1'].$ARR_Update['text_field_7_2'].$ARR_Update['text_field_7_3'];
        $ARR_Update['userid'] = "admin";
        $ARR_Update['now_time'] = date("Y-m-d H:i:s");


        // 新增順序
        $search_info=array();
        $tbl_name="sys_portal_g2";
        $query_string="select max(rank) from $tbl_name";
        sql_data($query_string, $search_info);
        //show_array($search_info);
        //exit;

        if($search_info[0]['max(rank)'] == "")
           $new_id=1;
        else
           $new_id=$search_info[0]['max(rank)']+1;

        $ARR_Update['rank']=$new_id;

        // show_array($ARR_Update);exit;

        $check_info=array();
        $where_clause="text_field_0 = '".$ARR_Update['text_field_0']."'";
        $tbl_name="sys_portal_g2";
        get_data($tbl_name, $where_clause, $check_info);
        // show_array($check_info);

        if(count($check_info)<1){
            $ARR_Update['is_verify']="2";
            $tbl_name="sys_portal_g2";
            $return_arr=array();
            $return_arr=add_data($tbl_name,$ARR_Update);
            $return_id=$return_arr['newrid'];

            if($return_id == "")
            {
                print "<script>";
                print " alert('註冊失敗,請回上一步再試一次,謝謝');";
                print " history.go(-1);";
                print "</script>";

                exit;
            }

            #setcookie("member_userid",$ARR_Update['text_field_0']);

            $mail_info=array();
            $mail_info=get_mail_info("1");
            // show_array($mail_info);
            $v_url = $global_website_url."verify.php?v=".$return_id;
            if($_GET['back_url'])	$v_url .= "&back_url=".urlencode($_GET['back_url']);
            #setcookie("back_url",E_encode($_GET['back_url']));
            $mail_title = "註冊信箱驗證";
            $mail_arr = array();
            if($ARR_Update['text_field_0'])	$mail_arr['帳號'] = $ARR_Update['text_field_0'];
            if($ARR_Update['text_field_2'])	$mail_arr['姓名'] = $ARR_Update['text_field_2'];
            if($ARR_Update['radio_field_3'])	$mail_arr['性別'] = $ARR_Update['radio_field_3'];
            if($ARR_Update['text_field_5'])	$mail_arr['手機'] = $ARR_Update['text_field_5'];
            if($ARR_Update['text_field_6'])	$mail_arr['市內電話'] = $ARR_Update['text_field_6'];
			if($ARR_Update['text_field_7'])	$mail_arr['地址'] = $ARR_Update['text_field_7'];
            $mail_arr['身分驗證'] = "<a href='".$v_url."' target='_blank'>".$v_url."</a><br><font color='red'>*請點擊驗證網址以完成會員註冊身分驗證</font>";
			$mail_content = get_mail_html_content_new($mail_title,$mail_arr);
            $Pdata=array();
			$Pdata['RecvAdd']	= $ARR_Update['text_field_0'];	        // 收件人地址
			$Pdata['RecvTi']    = $ARR_Update['text_field_2'];           // 收件者名稱
			$Pdata['SendAdd']	= $mail_info['sendmail_email'];		    // 寄件人地址
			$Pdata['SendTi']	= $mail_info['sendmail_name'];		    // 寄件人名稱
			$Pdata['Subject']	= $mail_title;			   // 主旨
			$Pdata['MailHTML']	= $mail_content;
			//$Pdata['Encoding']	= "big5";				            // 信件本體編碼
			$Pdata['Encoding']	= "utf-8";				            // 信件本體編碼
			//show_array($Pdata);
			//exit;
			
			if($mail_info['mailserver_type'] == "sendmail"){
			 $err = mail_send ($Pdata);
			}else{
			 $err = mail_smtp ($Pdata);
			}

            /*****************
               生日禮
            ******************/
            $today = date("m");

            $money_info=array();
           	$where_clause="1 and Fmain_id ='2'";
           	$tbl_name="sys_portal_j1";
           	get_data($tbl_name, $where_clause, $money_info);
           	// show_array($money_info);

           	$mail_content = get_default_mail_info(2);
	        $money = (int)$money_info['text_field_1'];


	        $str_arr = explode("-", $ARR_Update['date_field_4']);
		    $birth_date = $str_arr[1];  // 取的會員生日月分

		    if($today == $birth_date && $money>0)
		    {
             $birth_note = date("Y")."會員生日禮";

    			$check_info=array();
    			$where_clause="1 and member_userid ='".$ARR_Update['text_field_0']."' and note ='".$birth_note."' and is_manager_del ='2' and is_del ='2' ";
    			$tbl_name="sys_bonus_log";
    			get_data($tbl_name, $where_clause, $check_info);
    			// show_array($check_info);

    			if(count($check_info)<1)
    			{
     				member_bouns_control($money,$ARR_Update['text_field_0'],"admin","1",$birth_note);


     				$mail_title = "會員生日禮";

     				// 發送郵件
                 $Pdata=array();
                 $Pdata['RecvAdd']	= $ARR_Update['text_field_0'];	        // 收件人地址
                 $Pdata['RecvTi']    = $ARR_Update['text_field_2'];           // 收件者名稱
                 $Pdata['SendAdd']	= $mail_info['sendmail_email'];		    // 寄件人地址
                 $Pdata['SendTi']	= $mail_info['sendmail_name'];		    // 寄件人名稱
                 $Pdata['Subject']	= $mail_title;			   // 主旨
                 $Pdata['MailHTML']	= $mail_content;
                 //$Pdata['Encoding']	= "big5";				            // 信件本體編碼
                 $Pdata['Encoding']	= "utf-8";				            // 信件本體編碼
 			    //show_array($Pdata);
 			    //exit;

                 if($mail_info['mailserver_type'] == "sendmail"){
                     $err = mail_send ($Pdata);
                 }else{
                     $err = mail_smtp ($Pdata);
                 }


            	}

		    }

			##生日發送折價券##
			if($today == $birth_date)
		    {
			    $coupon_set_mail_info = array();
				$where_clause = " Fmain_id = '2' ";
				$tbl_name = "coupon_set_mail";
				get_data($tbl_name, $where_clause, $coupon_set_mail_info);
				
				if($coupon_set_mail_info['set_val']){
					$mail_info=array();
					$mail_info=get_mail_info("1");
					#檢查是否有期限
					$chk_coupon_info = array();
					$where_clause = " Fmain_id = '".$coupon_set_mail_info['set_val']."' ";
					$tbl_name = $MYSQL_TABS['set_sale_coupon_list'];
					get_data($tbl_name, $where_clause, $chk_coupon_info);

					$add_info = array();
					$add_info['coupon_id'] = $coupon_set_mail_info['set_val'];
					$add_info['member_userid'] = $ARR_Update['text_field_0'];
					$add_info['get_date']      = date("Y-m-d");
					if($chk_coupon_info['limit_m'] || $chk_coupon_info['limit_d']){
						$add_info['deadline_date'] = date("Y-m-d",strtotime("+ ".(($chk_coupon_info['limit_m'])?$chk_coupon_info['limit_m']:"0")." months ".(($chk_coupon_info['limit_d'])?$chk_coupon_info['limit_d']:"0")." days"));
              		}
					$tbl_name = "member_coupon_list";
					$return_arr=add_data($tbl_name,$add_info);
					$return_id=$return_arr['newrid'];
					if($return_id){
						$mail_title = ($coupon_set_mail_info['set_title'])?$coupon_set_mail_info['set_title']:"會員生日禮";
						$mail_content = ($coupon_set_mail_info['set_mail'])?$coupon_set_mail_info['set_mail']:"送您折價券一張";
						// 發送郵件
		                $Pdata=array();
		                $Pdata['RecvAdd']	= $ARR_Update['text_field_0'];	        // 收件人地址
		                $Pdata['RecvTi']    = $ARR_Update['text_field_2'];           // 收件者名稱
		                $Pdata['SendAdd']	= $mail_info['sendmail_email'];		    // 寄件人地址
		                $Pdata['SendTi']	= $mail_info['sendmail_name'];		    // 寄件人名稱
		                $Pdata['Subject']	= $mail_title;			   // 主旨
		                $Pdata['MailHTML']	= $mail_content;
		                //$Pdata['Encoding']	= "big5";				            // 信件本體編碼
		                $Pdata['Encoding']	= "utf-8";				            // 信件本體編碼
					    //show_array($Pdata);
					    //exit;
		
		                if($mail_info['mailserver_type'] == "sendmail"){
		                    $err = mail_send ($Pdata);
		                }else{
		                    $err = mail_smtp ($Pdata);
		                }
					}

				}
		    }

            /*****************
               會員註冊禮
            ******************/
            $money_info=array();
            $where_clause="1 and Fmain_id ='1'";
            $tbl_name="sys_portal_j1";
            get_data($tbl_name, $where_clause, $money_info);
            // show_array($money_info);
            $money = (int)$money_info['text_field_1'];

            if($money>0){

                $mail_title = "會員註冊禮";
                $mail_content = get_default_mail_info(1);

                member_bouns_control($money,$ARR_Update['text_field_0'],"admin","1",$mail_title);

                // 發送郵件
                $Pdata=array();
                $Pdata['RecvAdd']   = $ARR_Update['text_field_0'];           // 收件人地址
                $Pdata['RecvTi']    = $ARR_Update['text_field_2'];           // 收件者名稱
                $Pdata['SendAdd']   = $mail_info['sendmail_email'];         // 寄件人地址
                $Pdata['SendTi']    = $mail_info['sendmail_name'];          // 寄件人名稱
                $Pdata['Subject']   = $mail_title;             // 主旨
                $Pdata['MailHTML']  = $mail_content;
                //$Pdata['Encoding']    = "big5";                           // 信件本體編碼
                $Pdata['Encoding']  = "utf-8";                          // 信件本體編碼
                //show_array($Pdata);
                //exit;

                if($mail_info['mailserver_type'] == "sendmail"){
                    $err = mail_send ($Pdata);
                }else{
                    $err = mail_smtp ($Pdata);
                }
            }


			##發送折價券##			
			$coupon_set_mail_info = array();
			$where_clause = " Fmain_id = '1' ";
			$tbl_name = "coupon_set_mail";
			get_data($tbl_name, $where_clause, $coupon_set_mail_info);
			
			if($coupon_set_mail_info['set_val']){
				$mail_info=array();
				$mail_info=get_mail_info("1");
				#檢查是否有期限
				$chk_coupon_info = array();
				$where_clause = " Fmain_id = '".$coupon_set_mail_info['set_val']."' ";
				$tbl_name = $MYSQL_TABS['set_sale_coupon_list'];
				get_data($tbl_name, $where_clause, $chk_coupon_info);

				$add_info = array();
				$add_info['coupon_id'] = $coupon_set_mail_info['set_val'];
				$add_info['get_date']      = date("Y-m-d");
				$add_info['member_userid'] = $ARR_Update['text_field_0'];
				if($chk_coupon_info['limit_m'] || $chk_coupon_info['limit_d']){
	            	$add_info['deadline_date'] = date("Y-m-d",strtotime("+ ".(($chk_coupon_info['limit_m'])?$chk_coupon_info['limit_m']:"0")." months ".(($chk_coupon_info['limit_d'])?$chk_coupon_info['limit_d']:"0")." days"));
            	}
				$tbl_name = "member_coupon_list";
				$return_arr=add_data($tbl_name,$add_info);
				$return_id=$return_arr['newrid'];
				if($return_id){
					$mail_title = ($coupon_set_mail_info['set_title'])?$coupon_set_mail_info['set_title']:"會員註冊禮";
					$mail_content = ($coupon_set_mail_info['set_mail'])?$coupon_set_mail_info['set_mail']:"送您折價券一張";
					// 發送郵件
	                $Pdata=array();
	                $Pdata['RecvAdd']	= $ARR_Update['text_field_0'];	        // 收件人地址
	                $Pdata['RecvTi']    = $ARR_Update['text_field_2'];           // 收件者名稱
	                $Pdata['SendAdd']	= $mail_info['sendmail_email'];		    // 寄件人地址
	                $Pdata['SendTi']	= $mail_info['sendmail_name'];		    // 寄件人名稱
	                $Pdata['Subject']	= $mail_title;			   // 主旨
	                $Pdata['MailHTML']	= $mail_content;
	                //$Pdata['Encoding']	= "big5";				            // 信件本體編碼
	                $Pdata['Encoding']	= "utf-8";				            // 信件本體編碼
				    //show_array($Pdata);
				    //exit;
	
	                if($mail_info['mailserver_type'] == "sendmail"){
	                    $err = mail_send ($Pdata);
	                }else{
	                    $err = mail_smtp ($Pdata);
	                }
				}

			}

            print "<script>";
            print " alert('註冊成功，請收取驗證信');";
            if(substr_count($_GET['back_url'],"ticket")>=1)	print " window.location.href='".$_GET['back_url']."';";
            else	print " window.location.href='index.php';";
            #print " window.location.href='index.php';";
            print "</script>";


            exit;
        }else{


/*
			$mail_info=array();
            $mail_info=get_mail_info("1");
            // show_array($mail_info);
            $v_url = $global_website_url."verify.php?v=".$check_info['Fmain_id'];
            $mail_title = "註冊信箱驗證";
            $mail_arr = array();
            $mail_arr['姓名'] = $check_info['text_field_2'];
            $mail_arr['驗證網址'] = "<a href='".$v_url."' target='_blank'>".$v_url."</a>";
			$mail_content = get_mail_html_content_new($mail_title,$mail_arr);
            $Pdata=array();
			$Pdata['RecvAdd']	= $check_info['text_field_0'];	        // 收件人地址
			$Pdata['RecvTi']    = $check_info['text_field_2'];           // 收件者名稱
			$Pdata['SendAdd']	= $mail_info['sendmail_email'];		    // 寄件人地址
			$Pdata['SendTi']	= $mail_info['sendmail_name'];		    // 寄件人名稱
			$Pdata['Subject']	= $mail_title;			   // 主旨
			$Pdata['MailHTML']	= $mail_content;
			//$Pdata['Encoding']	= "big5";				            // 信件本體編碼
			$Pdata['Encoding']	= "utf-8";				            // 信件本體編碼
			show_array($Pdata);
			//exit;
			
			if($mail_info['mailserver_type'] == "sendmail"){
			 $err = mail_send ($Pdata);
			}else{
			 $err = mail_smtp ($Pdata);
			}
*/
			#show_array($err);
			print "<script>";
            print " alert('帳號重複，請重新確認');";
            print " history.go(-1);";
            print "</script>";
            exit;
        }


    }

	include "quote/template/head.php"; 
?>
<link rel="stylesheet" href="dist/css/registration.css">
</head>

<body class="lang_tw">
    <?php
    include "quote/template/nav.php";
    ?>
    <main>
        <section class="registration">
            <div class="container">
                <div class="registration_flex">
                    <div class="title_flex">
                        <div class="subtitle">
                            REGISTRATION
                        </div>
                        <div class="title">
                            會員註冊
                        </div>
                    </div>
                    <div class="form">
                        <form action="registration.php?back_url=<?=urlencode($_GET['back_url'])?>" method="post">
                            <ul class="personal">
                                <!-- 送出必填未填寫會加上 class:required -->
                                <li id="FO_text_field_2_str" class="personal_data">
                                    <label for="name">
                                        <div>姓名<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="text" id="name" name="FO_text_field_2" placeholder="請輸入真實姓名" />
                                    </div>
                                </li>
                                <li id="FO_radio_field_3_str"i class="personal_data">
                                    <label for="check">
                                        <div>性別<span>必填</span></div>
                                    </label>
                                    <fieldset>
                                        <div class="ckbutton">
                                            <input type="radio" id="male" name="FO_radio_field_3" value="先生" />
                                            <label for="male">先生</label>
                                        </div>
                                        <div class="ckbutton">
                                            <input type="radio" id="female" name="FO_radio_field_3" value="小姐" />
                                            <label for="female">小姐</label>
                                        </div>

                                    </fieldset>
                                </li>
                                <li id="FO_date_field_4_str" class="personal_data">
                                    <label for="birthday">
                                        <div>生日<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="date" id="birthday" name="FO_date_field_4" placeholder="年/月/日" />
                                    </div>
                                </li>
                                <li id="FO_text_field_0_str" class="personal_data">
                                    <label for="mail">
                                        <div>E-mail<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="email" id="emailAddress" name="FO_text_field_0" placeholder="請輸入常用E-mail" />
                                    </div>
                                </li>
                                <li id="FO_text_field_1_str" class="personal_data">
                                    <label for="password">
                                        <div>密碼<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="text" id="password" name="FO_text_field_1" placeholder="至少6字元以上" />
                                    </div>
                                </li>
                                <li id="pwdcheck_str" class="personal_data">
                                    <label for="password_confirm">
                                        <div>密碼確認<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="text" id="password_confirm" name="pwdcheck" placeholder="請再次輸入密碼" />
                                    </div>
                                </li>
                                <li id="FO_text_field_5_str" class="personal_data">
                                    <label for="phone">
                                        <div>手機<span>必填</span></div>
                                    </label>
                                    <div class="input">
                                        <input type="text" id="phone" name="FO_text_field_5" placeholder="請輸入手機號碼" pattern="[0-9]{10}" />
                                    </div>
                                </li>
                                <li class="personal_data">
                                    <!-- 非必填會加上 class:optional -->
                                    <label for="tel" class="optional">
                                        <div>室內電話<span>必填</span></div>
                                    </label>
                                    <div class="telephone">
                                        <div class="input area_code">
                                            <input type="text" id="area_code" name="FO_text_field_6_1" placeholder="區域號碼" pattern="[0-9]{2,3}" />
                                        </div>
                                        <div class="input tel">
                                            <input type="text" id="tel" name="FO_text_field_6_2" placeholder="請填寫電話" pattern="[0-9]{6,10}" />
                                        </div>
                                    </div>
                                </li>

                                <li id="FO_text_field_7_str" class="personal_data">
                                    <label for="district">
                                        <div>地址<span>必填</span></div>
                                    </label>
                                    <div class="city-selector">
                                        <span class="selector">
                                            <select class="county" name="FO_text_field_7_1" id="FO_text_field_7_1">
                                            </select>
                                            <select class="district2" name="FO_text_field_7_2" id="FO_text_field_7_2">
                                            </select>
                                        </span>
                                        <div class="input address">
                                            <input type="text" id="address" name="FO_text_field_7_3" placeholder="請填寫地址" />
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <fieldset>
                                <div class="checkbox">
                                    <input type="checkbox" id="is_confirm" name="is_confirm" required="required" />
                                    <label for="is_confirm">我同意<a href="terms.php"><span>輝葉良品相關條款</span></a>
                                    </label>
                                </div>
                            </fieldset>
                            <div class="btn_flex">
                        <a href="javascript:send_fn();" class="store_btn">
                            <div>註冊</div>
                        </a>
                    </div>
                    <input type="submit" id="submit" name="submit" style="display: none">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript">
                function send_fn(){
                    if(check_data()){
                        $("#submit").click();
                    }
                }

                function check_data(){

                    var is_flat = 0;
					var the_alert = "";
                    if($("input[name='FO_text_field_2']").val()==""){ //姓名
                        $("#FO_text_field_2_str").addClass("required");
                        is_flat = 1;
                        the_alert += "姓名必填！\n";
                    }else{
                        $("#FO_text_field_2_str").removeClass("required");
                    }


                    if($("input[name='FO_date_field_4']").val()==""){ //生日
                        $("#FO_date_field_4_str").addClass("required");
                        is_flat = 1;
                        the_alert += "生日必填！\n";
                    }else{
                        $("#FO_date_field_4_str").removeClass("required");
                    }



                    if($("input[name='FO_text_field_0']").val()=="" ){ //帳號
                        $("#FO_text_field_0_str").addClass("required");
                        is_flat = 1;
                        the_alert += "帳號必填！\n";
                    }else{

                        if(!checkEmail($("input[name='FO_text_field_0']").val())){
                            //$("#FO_text_field_0_str").html("*請輸入正確格式Email");
                            $("#FO_text_field_0_str").addClass("required");
                            is_flat = 1;
                            the_alert += "請輸入正確格式Email！\n";

                        }else{
                            $("#FO_text_field_0_str").removeClass("required");
                        }

                    }

                    if($("input[name='FO_text_field_1']").val()=="" || $("input[name='FO_text_field_1']").val().length<6){ //密碼
                        $("#FO_text_field_1_str").addClass("required");
                        is_flat = 1;
                        the_alert += "密碼必填！\n";
                    }else{

                        $("#FO_text_field_1_str").removeClass("required");

                    }



                    if($("input[name='pwdcheck']").val()=="" || $("input[name='pwdcheck']").val().length<6){ //密碼
                        $("#pwdcheck_str").addClass("required");
                        is_flat = 1;
                        the_alert += "密碼必填！\n";
                    }else{

                        if($("input[name='FO_text_field_1']").val()!=$("input[name='pwdcheck']").val()){
                            // $("#FO_text_field_1_str").html("*兩次密碼輸入不同");
                            // $("#FO_text_field_1_str").addClass("required");
                            //$("#pwdcheck_str").html("*兩次密碼輸入不同");
                            $("#pwdcheck_str").addClass("required");
							the_alert += "兩次密碼輸入不同！\n";
                            is_flat = 1;

                        }else{
                            $("#FO_text_field_1_str").removeClass("required");
                            $("#pwdcheck_str").removeClass("required");
                        }

                    }




                    if($("input[name='FO_text_field_5']").val()=="" ){ //手機
                        $("#FO_text_field_5_str").addClass("required");
                        is_flat = 1;
                        the_alert += "手機必填！\n";
                    }else{

                        var a=$("input[name='FO_text_field_5']").val();
                        var b=a.slice(0,2);
//                        alert(b);

                        if(b != "09")
                        {
                            is_flat = 1;
                            the_alert += "手機格式錯誤，請輸入09開頭的十碼數字！\n";
                            $("#FO_text_field_5_str").html("*格式錯誤，請輸入09開頭的十碼數字");
                            $("#FO_text_field_5_str").addClass("required");
                        }
                        else
                        {
                           if(!checkNumber($("input[name='FO_text_field_5']").val()) || $("input[name='FO_text_field_5']").val().length<10){
                               //$("#FO_text_field_5_str").html("*格式錯誤，請輸入09開頭的十碼數字");
                               $("#FO_text_field_5_str").addClass("required");
                               is_flat = 1;
                               the_alert += "手機格式錯誤，請輸入09開頭的十碼數字！\n";
                           }
                           else{
                               $("#FO_text_field_5_str").removeClass("required");
                           }
                        }

                    }

//                     if($("input[name='FO_text_field_6']").val()=="" ){ //市內電話
//                         $("#FO_text_field_6_str").addClass("required");
//                         is_flat = 1;
//                     }else{
//
//                         var a=$("input[name='FO_text_field_6']").val();
//                         var b=a.slice(0,1);
//
//                         if(b != "0")
//                         {
//                             is_flat = 1;
//                             $("#FO_text_field_6_str").html("*格式錯誤");
//                             $("#FO_text_field_6_str").addClass("required");
//                         }
//                         else{
//                             $("#FO_text_field_6_str").removeClass("required");
//                         }
//
//                     }


                    if($("textarea[name='FO_text_field_7']").val()==""){// 地址
                        $("#FO_text_field_7_str").addClass("required");
                        is_flat = 1;
                        the_alert += "地址必填！\n";
                    }
                    else if($("#FO_text_field_7_1").val()==""){
                        $("#FO_text_field_7_str").addClass("required");
                        is_flat = 1;
                        the_alert += "地址必填！\n";
                    }
                    else if($("#FO_text_field_7_2").val()==""){
                        $("#FO_text_field_7_str").addClass("required");
                        is_flat = 1;
                        the_alert += "地址必填！\n";
                    }
                    else{
                        $("#FO_text_field_7_str").removeClass("required");
                    }
                    


                    if(!$("#is_confirm").prop("checked")){// 輝葉相關條款
                        $("#is_confirm_str").addClass("required");
                        is_flat = 1;
                        the_alert += "輝葉相關條款需同意！\n";
                    }else{
                        $("#is_confirm_str").removeClass("required");
                    }






                    if(is_flat==0){
                        return true;
                    }else{
                        alert(the_alert);
                        return false;
                    }


                }

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
            </script>
    <?php
    include "quote/template/footer.php";
    include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/tw-city-selector.js"></script>
    <script src="dist/js/main.js"></script>
    <script src="dist/js/registration.js"></script>
</body>

</html>