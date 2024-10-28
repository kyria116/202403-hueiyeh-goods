<?php 
	include "quote/template/head.php";
	require_once ("global_include_file.php");
    require_once ("check_login.php");

    if($_COOKIE['member_userid'] == "")
    {
       print "<script>";
       print "location.href='login.php';";
       print "</script>";
       exit;

    }


    if($_POST['submit']!=""){ //送出表單

//show_array($_POST);
//exit;
        $ARR_Update = array();
//        while ( list($Rfield, $Rvalue)=each($_POST) )
        foreach($_POST as $Rfield => $Rvalue)
        {
            if (substr($Rfield,0,3)=="FO_") {
                $Rfield = str_replace ("FO_", "", $Rfield);
                  if (!get_magic_quotes_gpc()) {
                      $Rvalue = AddSlashes($Rvalue);
                  }
                  $ARR_Update[$Rfield] = $Rvalue;
           }
        }
		$ARR_Update['text_field_6'] = $ARR_Update['text_field_6_1']."-".$ARR_Update['text_field_6_2'];
		$ARR_Update['text_field_7_1'] = $_POST['county'];
		$ARR_Update['text_field_7_2'] = $_POST['district'];
		$ARR_Update['text_field_7'] = $ARR_Update['text_field_7_1'].$ARR_Update['text_field_7_2'].$ARR_Update['text_field_7_3'];
//show_array($ARR_Update);
//exit;

        $where_clause="text_field_0 = '".$_COOKIE['member_userid']."'";
        $tbl_name="sys_portal_g2";
        update_data($tbl_name, $where_clause, $ARR_Update);


        $info=array();
        $where_clause="text_field_0 = '".$_COOKIE['member_userid']."'";
        $tbl_name="sys_portal_g2";
        get_data($tbl_name, $where_clause, $info);
        // show_array($info);

        print "<script>";
        print " alert('更改成功');";
        print "</script>";


    }





    $info=array();
    $where_clause="text_field_0 = '".AddSlashes($_COOKIE['member_userid'])."'";
    $tbl_name="sys_portal_g2";
    get_data($tbl_name, $where_clause, $info);
    // show_array($info);

	if($info['text_field_6']=="-")	$info['text_field_6'] = "";
?>
<link rel="stylesheet" href="dist/css/member-profile.css">
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
                            MEMBER
                        </div>
                        <div class="title">
                            會員專區
                        </div>
                    </div>
                    <div class="profile_flex">
                        <div class="member_img">
                            <img src="dist/images/member/member-profile_img.png" alt="member-profile_img">
                        </div>
                        <div class="product_sort">
                            <div id="top-menu-ul-2" class="top-menu-ul-2">
                                <div class="item_Menu">
                                    <div class="item_menu_Box">
                                        <ul class="item_menu_list slides">
                                            <li class="active">
                                                <a href="member-profile.php">會員資料</a>
                                            </li>
                                            <li>
                                                <a href="order.php">訂單紀錄</a>
                                            </li>
                                            <li>
                                                <a href="warranty-list.php">產品保固</a>
                                            </li>
                                            <li>
                                                <a href="coupon.php">我的折價券</a>
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
                        </div>
                    </div>
                    <div class="member_flex">
                        <div class="member_block">
                            <div class="info_flex">
                                <div class="profile_img">
                                    <?if($info['radio_field_3']=="先生"){?>
					                    <img src="dist/images/member/male.png" alt="profile_img_male">
					                <?}else{?>
					                    <img src="dist/images/member/female.png" alt="profile_img_female">
					                <?}?>
                                    <!-- 女生使用female.png -->
<!--                                     <img src="dist/images/member/female.png" alt="profile_img_female"> -->
                                    <!-- 男生使用male.png -->
                                    <!-- <img src="dist/images/member/male.png" alt="profile_img_male"> -->
                                </div>
                                <ul class="info">
                                    <li class="name"><?=$info['text_field_2']?></li>
                                    <li><?=str_replace("-",".",$info['date_field_4'])?></li>
                                    <li class="mail"><?=$info['text_field_0']?></li>
                                    <li class="change_p">
                                        <a href="edit-password.php">
                                            修改密碼
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="point">
                                <li class="txt">總積點</li>
                                <li class="num"><?
                        if((int)$info['bonus_num'] < 0)
                           $info['bonus_num']=0;

                        print $info['bonus_num'];

                        ?></li>

                            </ul>
                        </div>
                        <div class="form">
                            <form action="member-profile.php" method="post">
                                <ul class="personal">
                                    <!-- 送出必填未填寫會加上 class:required -->
                                    <li id="FO_text_field_5_str" class="personal_data">
                                        <label for="phone">
                                            <div>手機<span>必填</span></div>
                                        </label>
                                        <div class="input">
                                            <input type="text" id="phone" name="FO_text_field_5" placeholder="請輸入手機號碼" value="<?=$info['text_field_5']?>" maxlength="10" pattern="[0-9]{10}" />
                                        </div>
                                    </li>
                                    <li class="personal_data2">
                                        <!-- 非必填會加上 class:optional -->
                                        <label for="tel" class="optional">
                                            <div>室內電話<span>必填</span></div>
                                        </label>
                                        <div class="telephone">
                                            <div class="input area_code">
                                                <input type="tel" id="area_code" name="FO_text_field_6_1" placeholder="區域號碼" pattern="[0-9]{2,3}" value="<?=$info['text_field_6_1']?>" />
                                            </div>
                                            <div class="input tel">
                                                <input type="tel" id="tel" name="FO_text_field_6_2" placeholder="請填寫電話" pattern="[0-9]{6,10}" value="<?=(($info['text_field_6_2'])?$info['text_field_6_2']:$info['text_field_6'])?>" />
                                            </div>
                                        </div>
                                    </li>

                                    <li id="FO_text_field_7_str" class="personal_data address_data">
                                        <label for="district">
                                            <div>地址<span>必填</span></div>
                                        </label>
                                        <div class="city-selector">
                                            <span class="selector">
                                                <select class="county" data-value="<?=$info['text_field_7_1']?>">
                                                </select>
                                                <select class="district2" data-value="<?=$info['text_field_7_2']?>">
                                                </select>
                                            </span>
                                            <div class="input address">
                                                <input type="text" id="phone" name="FO_text_field_7_3" placeholder="請填寫地址" value="<?=(($info['text_field_7_3'])?$info['text_field_7_3']:$info['text_field_7'])?>" />
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="btn_flex">
                                    <a href="javascript:send_fn();" class="store_btn">
                                        <div>儲存修改</div>
                                    </a>
                                </div>
                                <input type="submit" id="submit" name="submit" style="display: none">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    include "quote/template/footer.php";
    include "quote/template/top_btn.php";
    ?>
    <script src="dist/js/tw-city-selector.js"></script>
    <script src="dist/js/main.js"></script>
    <script src="dist/js/registration.js"></script>
    <script type="text/javascript">

        function send_fn(){
            if(check_data()){
                $("#submit").click();
            }
        }

        function check_data(){

            var is_flat = 0;
			var the_alert = "";


            if($("input[name='FO_text_field_5']").val()=="" ){ //手機
                $("#FO_text_field_5_str").addClass("required");
                is_flat = 1;
                the_alert += "手機必填！\n";
            }else{
				var a=$("input[name='FO_text_field_5']").val();
                var b=a.slice(0,2);
                if(b != "09")
                {
                    is_flat = 1;
                    $("#FO_text_field_5_str").html("*格式錯誤，請輸入09開頭的十碼數字");
                    $("#FO_text_field_5_str").addClass("required");
                    the_alert += "手機格式錯誤，請輸入09開頭的十碼數字！\n";
                }
                else if(!checkNumber($("input[name='FO_text_field_5']").val()) || $("input[name='FO_text_field_5']").val().length<10 ){
//                     $("#FO_text_field_5_str").html("*格式錯誤，請輸入09開頭的十碼數字");
                    $("#FO_text_field_5_str").addClass("required");
                    the_alert += "手機格式錯誤，請輸入09開頭的十碼數字！\n";
                    is_flat = 1;
                }else{
                    $("#FO_text_field_5_str").removeClass("required");
                }

            }
            
            if($("input[name='FO_text_field_7_3']").val()=="" ){ //地址
                $("#FO_text_field_7_str").addClass("required");
                is_flat = 1;
                the_alert += "地址必填！\n";
            }
            else if($("select[name='county']").val()=="" ){ //地址
                $("#FO_text_field_7_str").addClass("required");
                is_flat = 1;
                the_alert += "地址必填！\n";
            }
            else if($("select[name='district']").val()=="" ){ //地址
                $("#FO_text_field_7_str").addClass("required");
                is_flat = 1;
                the_alert += "地址必填！\n";
            }
            else{
                $("#FO_text_field_7_str").removeClass("required");
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
</body>

</html>