<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
		include("../model/Db.class.php");
		include("../controller/shop.class.php");
		$shop = new Shop();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>重新设置密码</title>
	<link rel="stylesheet" href="./css/bio-account.css" />
	<link rel="stylesheet" type="text/css" href="./css/biotherm_footer1.css">
	<link rel="stylesheet" type="text/css" href="./css/header -80percentage.css">
	<link rel="stylesheet" type="text/css" href="./css/bio_detailed1.css">
	<link rel="stylesheet" type="text/css" href="./css/bio_try.css">
	<link rel="stylesheet" type="text/css" href="./css/header.css">
	<link rel="stylesheet" type="text/css" href="./css/user_imformation.css">
	<link rel="stylesheet" type="text/css" href="./css/regs-bio-add.css">
	<link rel="stylesheet" type="text/css" href="./css/E-zine.css">
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="./js/bio-header.js"></script>
    <script type="text/javascript" src="./js/Account-ChangePassword.js"></script>
    <script src="./js/shopUpDown.js"></script>
    <script type="text/javascript" src="./js/E-zine.js"></script>

	<style>
	</style>
	
</head>
<body>
	<div class="subscribe">
		<button class="subscribe_close">×</button>
		<div class="subscribe_ok">订阅成功，感谢您的订阅</div>
		<div class="subscribe_href"><a href="index.v.php">继续购物</a></div>
		<span>还没有账号？</span>
		<div class="subscribe_href"><a href="bio-register.php">立即注册</a></div>
	</div>
	<div class="body_box"></div>
	<div class="E_zine">
			<div class="E_zine_main">
				<button class="close_E-zine" >×</button>
				<div class="E_Zine_cnt">
					<div class="title">
						<span >订阅电子杂志</span><br />
						<span style="font-size: 14px;">提交您的邮箱地址，获取法国碧欧泉最新资讯、官方特惠礼遇！</span>
					</div>
					<div class="cnt_Email">
						<span class="user_email">您的邮箱 </span>
						<input id="user_email" type="text" placeholder="请输入邮箱"/>
						<button class="sub" type="submit"></button>
		
					</div>
					<span class="tips_email"></span><br />
					<div class="E_zine_btm">
		
						<div class="choose_box"><input type="checkbox"  class="choose" name="NO" /></div>
						<div class="choose_box">
							<span>我同意依照本<a href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>对我的个人信息进行收集和使用；我已阅读并确认被给予充</span><br />
							<span>分机会理解该<a href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>的内容。</span><br />
							<span class="tips_choos"></span>
						</div>
						
					</div>
				</div>	
			</div>
	</div>	
	<div class="header">
			<div class="content">
			 	<div class="content_left">
			  		<a href="index.v.php"><img src="./images/header_logo.png" title="Biotherm碧欧泉官方网上商城"></a>
			  	</div>
			  	<div class="content_right">
					<div class="invagation_list">
										
							<?php 
							if (isset($_SESSION['logname'])) {
								echo '
											<div class="shopaddress"><a href="ttt.php" style="padding-right:15px;">注销 </a><a href="bio-shopadd.php">专柜地址</a> </div>
											<div class="service"><a href="bio-service.php">客服中心</a></div>
											<div class="e-magzine"><a id="e-magzine" href="#">订阅电子杂志</a> </div>
								';
								echo '<div class="login-regis" style="color:#fff;font-size:13px;" id="login-regis"><a href="bio-account.php">';
								echo "{$_SESSION['logname']}";
								echo '</a></div>';
							}
							else{
								echo '
											<div class="shopaddress"><a href="bio-shopadd.php">专柜地址</a> </div>
											<div class="service"><a href="bio-service.php">客服中心</a></div>
											<div class="e-magzine"><a id="e-magzine" href="#">订阅电子杂志</a> </div>
								';
								echo '<div class="login-regis" id="login-regis"><a href="#">登陆与注册</a></div>';
							}

						 ?>
							
								<div class="shopping-bag" id="shopping-bag"><a href="bio-shoppingcart.php">购物袋</a>
								<?php
												if(isset($_SESSION['logname'])) {
												$user_phone = $_SESSION['logname'];
												$ikum = $shop->checkUserName($user_phone);//获取整条用户的信息
												$id = $ikum[0]['id'];
												$ikum = $shop->checkShop($id);//获取整条购物车的信息
												$shop_sum = sizeof($ikum);
									
												if($shop_sum!=0){
														echo '<div class="shopping-bag-box" id="shopping-bag-box" >
																		<div class="shopping-bag-box1">
																			<div class="box1"><span class="box1-text" ><strong>您的购物袋有<span id="box1-text1" class="box1-text1">';
														echo 	$shop_sum;
														echo '</span>件产品</strong></span></div>';
														
														for ($i=0; $i < $shop_sum; $i++) {
																$id = $ikum[$i]['goods_id'];
																$roy = $shop->checkGood($id);
																
																echo  '<div class="box2">
																				<div class="box2-img"><a href="detail-bio.php?id=';
																echo  $roy[0]['goods_id'];
																echo '"><img src="./images/goods/';
																echo  $roy[0]['goods_img'];
																echo '"></a></div>
																				<div class="box2-text">
																					<div class="box2-text1">
																						<span class="span1">
																			';
																echo  $roy[0]['goods_name'];
																echo  '</span><span class="span2">规格 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
																echo  $roy[0]['goods_size'];
																echo  'ml中性 <span style="float:right;" id="qianqian'; 
																echo 	$ikum[$i]['shop_id'];
																echo '">'; 
																echo  $roy[0]['goods_price'];
																echo '</span><span style="float:right;"><span style="display:none;" id="how">'; 
																echo $i;
																echo '</span>￥</span></span></div>
																				<div class="box2-text2">
																														<input type="button" id="del';
																				echo 	$ikum[$i]['shop_id'];
																				echo '" value="-" onclick="del(';
																				echo 	$ikum[$i]['shop_id'];
																				echo 								')"/>
																														<input type="text" style="width:40px;" id="text_box';
																				echo 	$ikum[$i]['shop_id'];
																				echo '" class="text_box" value="'; 
																				echo $ikum[$i]['shop_num'];
																				echo '" />
																														<input type="button" value="+" id="add';
																				echo 	$ikum[$i]['shop_id'];
																				echo '" onclick="add(';
																				echo	$ikum[$i]['shop_id'];
																				echo 					')"/>
																				
																							<strong><span class="box2-span">￥<span id="box2-span';
																				echo 	$i;
																				echo '">';
																echo  $roy[0]['goods_price']*$ikum[$i]['shop_num'];
																echo  '</span></span></strong></div>
																			</div>
																		</div>';
													}
														echo	'<div class="box3">
																	<div class="box3-text">
																		<strong><span class="box3-text1">总计：</span>
																		<span class="box3-text2">￥<span id="box3-text2">';
														$sum =0;
														for($i=0; $i < $shop_sum; $i++){
															$id = $ikum[$i]['goods_id'];
															$roy = $shop->checkGood($id);//获取整条商品的信息
															$single_sum = $roy[0]['goods_price']*$ikum[$i]['shop_num'];
															$sum += $single_sum;
														}
														echo $sum;
														echo '</span></span></strong>
																	</div>
																	<div class="box3-input">
																		<button class="input" type="button" onclick="window.location.href=';
														echo  "'bio-shoppingcart.php'";
														echo	'" name="jiesuan" value="立即结算">立即结算</button>
																	</div>
																</div>
															</div>
														</div>';
							}
									else{
								echo '<div class="shopping-bag-box" style="height:200px;" id="shopping-bag-box" >
												<div class="shopping-bag-box1" style="height:150px;">
													<div class="box1"><span class="box1-text"><strong>
															您的购物袋有<span class="box1-text1">0</span>件产品
													</strong></span></div>
													<div>您的购物袋中没有任何商品</div>
												</div>
											</div>';
							}
						}
									else{
							echo '<div class="shopping-bag-box" style="height:200px;" id="shopping-bag-box" >
											<div class="shopping-bag-box1" style="height:150px;">
												<div class="box1"><span class="box1-text"><strong>
														您的购物袋有<span class="box1-text1">0</span>件产品
												</strong></span></div>
												<div>您的购物袋中没有任何商品</div>
											</div>
										</div>';
						}
								?>
								 </div>
					</div>
					<div class="weixin-weibo-all">
				        <img  class="header_weibo" src="./images/weibo.png">
				     	<img  class="header_weixin" src="./images/weixin.png">
				     	<a href="">全部产品</a>
				     	<input type="text" class="search_box" placeholder="绿活泉" name="search"   value=""/>
		            </div>  
		      	</div>
		    </div>				
		</div>  
 	<div class="pcpbbar">	
  		<a href="index.v.php"><img src="./images/wpb201808301.jpg"></a>
	</div>
			     

<div id="detailed_main1">
		<div id="detailed_main">
			<div id="navigation">
				<div id="navigation_main">
					<ul>
						<li>品牌资讯
							<div id="detailed_box1">
								<div id="detailed_box">
									<div id="li_box1">
										<table id="li_box1_table">
											<tr>
												<td><a href="bio_try.php">免费试用</a></td>
											</tr>
											<tr>
												<td><a href="bio_new.php">新品上市</a></td>
											</tr>
											<tr>
												<td><a href="healing_community.v.php">愈颜社区</a></td>
											</tr>
											<tr>
												<td><a href="bio_brand_activity.php">品牌活动</a></td>
											</tr>
											<tr>
												<td></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</li>
						<li>脸部护理
							<div id="detailed2_box1">
									<div id="detailed2_box">
										<div id="li_box2">
											<table id="li_box2_table">
												<tr id="li_box2_table_tr1">
													<td><img src="./images/secondary-skincare-slot-1.jpg"></td>
													<td><img src="./images/secondary-skincare-slot-2.jpg"></td>
													<td><img src="./images/secondary-skincare-slot-3.jpg"></td>
												</tr>
												<tr id="li_box2_table_tr2">
													<td><a href="goods-list.v.php">按类型</a></td>
													<td><a href="goods-list.v.php">按功能</a></td>
													<td><a href="goods-list.v.php">按系列</a></td>
												</tr>
												<tr id="li_box2_table_tr3">
													<td>清洁</td>
													<td>保湿</td>
													<td>水动力系列</td>
												</tr>
												<tr id="li_box2_table_tr3">
													<td>爽肤</td>
													<td>控油</td>
													<td>蓝钻系列</td>
												</tr>
												<tr id="li_box2_table_tr3">
													<td>护肤</td>
													<td>亮肤</td>
													<td>清爽控油系列</td>
												</tr>
												<tr id="li_box2_table_tr3">
													<td>精华</td>
													<td>抗衰老</td>
													<td>亮肤清透系列</td>
												</tr>
												<tr id="li_box2_table_tr3">
													<td>眼部护理</td>
													<td>抗氧化</td>
													<td>橄榄青春系列</td>
												</tr>
												<tr id="li_box2_table_tr3">
													<td></td>
													<td>抗倦容</td>
													<td>焕能润泽系列</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
						</li>
						<li>身体护理
							<div id="detailed3_box1">
								<div id="detailed3_box">
									<div id="li_box3">
										<table id="li_box3_table">
											<tr id="li_box3_table_tr1">
												<td><a href="goods-list.v.php">按类型</a></td>
												<td><a href="goods-list.v.php">按功能</a></td>
												<td><a href="goods-list.v.php">按系列</a></td>
											</tr>
											<tr id="li_box3_table_tr2">
												<td>身体护理</td>
												<td>润肤</td>
												<td>特殊护理</td>
											</tr>
											<tr id="li_box3_table_tr2">
												<td>面部护理</td>
												<td>沐浴</td>
												<td></td>
											</tr>
											<tr id="li_box3_table_tr2">
												<td>塑身美体</td>
												<td>剃须</td>
												<td></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</li>
						<li>防晒隔离</li>
						<li><a href="bio-mostloved.php">明星产品</a></li>
						<li><a href="member_center.bio.php">会员中心</a></li>
						<li>特惠礼盒</li>
						<li><img src="./images/2018-09-11_173448.png"><a href="manindex.v.php">碧欧泉女士</a>
							<div id="detailed_box1">
								<div id="detailed_box">
									<div id="li_box5">
										<table id="li_box5_table">
											<tr>
												<td><img src="./images/primary-face-slot-1.jpg"></td>
												<td><img src="./images/primary-face-slot-2.jpg"></td>
												<td><img src="./images/primary-face-slot-3_1.jpg"></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="acc_cnt">
				<div class="acc_main">
					<div class="cnt_top">
						<br />
						<a class="cnt_top_a" href="index.v.php">首页	>	</a>
						<a class="cnt_top_a" href="bio-account.php">我的账户 >	</a>
						<span class="cnt_top_span">个人资料</span>
						<h1 class="cnt_top_h1">我的账户</h1>	
					</div>
					<div class="cnt_left">
						<div id="links_box">
							<a href="bio-account.php">个人资料</a>
							<a href="user_imformation_myAddress.php">收货地址</a>
							<a href="user_imformation_myOrder.php">我的订单</a>
							<a href="user_imformation_myTry.php">我的试用装</a>
							<a href="user_imformation_myCollect.php">我的收藏夹</a>
						</div>
						
					</div>
					<div class="cnt_right">
						<div class="split-line-div1">
							<span class="split-line1"></span>
							<span class="split-line-text1">重新设置密码</span>
							<span class="split-line1"></span>
						</div>
						<form action="../api/information.api.php?act=update" method="post">	
							<?php
								if(isset($_SESSION['logname'])) {
									$okuser = $shop->checkUserName($user_phone);
									$pwd123 = $okuser[0]['pwd'];
									
									echo '
											<input class="password_box" id="old_pwd" type="password" name="old_pwd" placeholder="旧密码:" onblur="checkold_pwd()" value="'; 
									echo $pwd123;
									echo '" />
									';
								}else{
									echo '
											<input class="password_box" id="old_pwd" type="password" name="old_pwd" placeholder="旧密码:" onblur="checkold_pwd()" '; 
									echo ' />';
								}
							?>
								<div class="old_pwd" style="float: left;position: relative;left: 109px;color: #f00;top: -4px;width: 400px;height: 10px;"></div>

							<input class="password_box"  id="pwd" name="pwd" type="password" maxlength="30" placeholder="新密码:" onblur="checkpwd1()"/>
							<div class="pwdstrong">
								<div style="width:440px;height: 20px; border-left: 4px #D9534F solid;border-radius: 5px;">
									<div id="strong1" class="strong">密码强度</div>
								</div>
								<div class="pwd" style="color: #f00;""></div>
							</div>
							<input class="password_box" id="pwd2" name="pwd" type="password" maxlength="30" placeholder="确认新密码:" onblur="checkpwd2()"/>
							<div class="pwdstrong">
								<div style="width:440px;height: 20px; border-left: 4px #D9534F solid;border-radius: 5px;">
									<div id="strong2"  class="strong">密码强度</div>
								</div>
								<div class="pwd2" style="float: left;color: #f00;"></div>
							</div>
							<div style="color: #ADACAC; font-size: 12px;float: right; margin: 0 120px">8-30个字符</div>
							<div class="button_box">
								
								<a href="bio-account.php" class="pwdbutton1">取消</a>
								<input type="submit"  class="pwdbutton2" value="提交"  onclick="return changePwd();"/>
							</div>
						
						</form>
					</div>
					
						
				</div>
			</div>	
		</div>
	</div>

	








<div id="footer">
		<div id="footer_box">
			<div class="cart_footer" >
			<img style="margin-bottom: 30px;" src="./images/footer.png">
			<div class="footer_content">
			<div id="footer_box_mailbox">
				<div id="footer_box_mailbox1">
					<div id="text1">
						<span>订阅电子杂志</span>
					</div>
					
				</div>
				<div id="footer_box_mailbox2">
					<table>
						<tr id="height_td">
							<td>脸部护理</td>
							<td>身体护理</td>
							<td>防晒隔离</td>
							<td>品牌故事</td>
							<td>帮助中心</td>
							<td>快速订单查询</td>
						</tr>
						<tr id="height_td1">
							<td>活泉系列-保湿</td>
							<td>凝乳丝滑系列-润肤</td>
							<td>防晒</td>
							<td>碧欧泉故事</td>
							<td>快速订单查询</td>
							<td id="rowspan_td" rowspan="5">
								<img src="images/weibo_icon_primary.jpg">
								<img src="images/wechat_icon_primary.jpg">
								<img id="td_img" src="images/weibo_icon_primary.jpg">
								<img src="images/mobile_icon_primary.jpg">
							</td>
						</tr>
						<tr id="height_td1">
							<td>蓝源系列-抗老</td>
							<td>光感纤体系列-塑身</td>
							<td>隔离</td>
							<td>逾60年致力于护肤</td>
							<td>常见问题</td>
						</tr>
						<tr id="height_td1">
							<td>奇迹系列-修护</td>
							<td>保湿香氛系列-香氛</td>
							<td>气垫</td>
							<td>碧欧泉灵魂成分</td>
							<td>联系我们</td>
						</tr>
						<tr id="height_td1">
							<td>滢澈皙白系列-美白</td>
							<td>阳光欢愉系列-清爽</td>
							<td></td>
							<td>碧欧泉的承诺</td>
							<td>法律信息</td>
						</tr>
						<tr id="height_td1">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>网站地图</td>
						</tr>
					</table>
				</div>
			</div>
			<div id="footer_box_safety">
				<img src="images/footer_payment_methods_icon.jpg">&nbsp;
				<span>安全支付保障</span>
			</div>
			<div id="footer_box_term">
				<div id="footer_box_term1">
					<div id="img1">
						<img src="images/police_badge_icon.jpg">
						<span>沪ICP备08100043号-26 ©L'Oreal China 欧莱雅 (中国)有限公司版权所有</span>
						<img src="images/police.png">
						<span>沪公网安备 31010602001504号</span>
					</div>
					<div id="img2">
						<span>使用条款 | cookies政策 | 隐私声明 | 隐私声明</span>
					</div>
				</div>
			</div>
		</div>
	</div>




	 <script type="text/javascript">
								  
  $("#pwd").keyup(function() { 
						
  	switch($("#pwd").val().length ){
  		case 0: $("#strong1").text("密码强度");
  				$("#strong1").removeClass();
          		break;
    	case 1: $("#strong1").text("非常弱");
    			$("#strong1").removeClass();
    			$("#strong1").addClass("mrbq-red1");
          		break;
        case 2: $("#strong1").text("非常弱");
    			$("#strong1").removeClass();
    			$("#strong1").addClass("mrbq-red1");
          		break;
        case 3: $("#strong1").text("非常弱");
    			$("#strong1").removeClass();
    			$("#strong1").addClass("mrbq-red1");
          		break;
        case 4: $("#strong1").text("非常弱");
    			$("#strong1").removeClass();
    			$("#strong1").addClass("mrbq-red1");
          		break;
         case 5:$("#strong1").text("非常弱");
         		$("#strong1").removeClass();
    			$("#strong1").addClass("mrbq-red1");
          		break;	
    	case 6: $("#strong1").text("普通");
    			$("#strong1").removeClass();
             	$("#strong1").addClass("mrbq-red2");
            	break;
        case 7: $("#strong1").text("普通");
          		$("#strong1").removeClass();
             	$("#strong1").addClass("mrbq-red21");
            	break;
    	case 8: $("#strong1").text("中等");
    			$("#strong1").removeClass();
            	$("#strong1").addClass("mrbq-red3");
            	break;
        case 9: $("#strong1").text("中等");
          		$("#strong1").removeClass();
            	$("#strong1").addClass("mrbq-red31");
            	break;
        case 10:$("#strong1").text("中等");
          		$("#strong1").removeClass();
            	$("#strong1").addClass("mrbq-red32");
            	break;
        case 11:$("#strong1").text("中等");
          		$("#strong1").removeClass();
            	$("#strong1").addClass("mrbq-red33");
            	break;
    	case 12:$("#strong1").text("强");
    			$("#strong1").removeClass();
             	$("#strong1").addClass("mrbq-red4");
             	break;
        case 13:$("#strong1").text("强");
          		$("#strong1").removeClass();
             	$("#strong1").addClass("mrbq-red41");
            	break;
        case 14:$("#strong1").text("强");
          		$("#strong1").removeClass();
             	$("#strong1").addClass("mrbq-red42");
            	break;

        default:$("#strong1").text("非常强");
             	$("#strong1").addClass("mrbq-red5");
            	break;
   
   }
 });

	</script> 
	<script type="text/javascript">
		  $("#pwd2").keyup(function() { 

	    	switch($("#pwd2").val().length ){
	    		case 0: $("#strong2").text("密码强度");
	    				$("#strong2").removeClass();
	            		break;
	      		case 1: $("#strong2").text("非常弱");
	      				$("#strong2").removeClass();
	      				$("#strong2").addClass("mrbq-red1");
	            		break;
	            case 2: $("#strong2").text("非常弱");
	      				$("#strong2").removeClass();
	      				$("#strong2").addClass("mrbq-red1");
	            		break;
	           	case 3: $("#strong2").text("非常弱");
	      				$("#strong2").removeClass();
	      				$("#strong11").addClass("mrbq-red1");
	            		break;
	            case 4: $("#strong2").text("非常弱");
	      				$("#strong2").removeClass();
	      				$("#strong2").addClass("mrbq-red1");
	            		break;
	           	case 5: $("#strong2").text("非常弱");
	           			$("#strong2").removeClass();
	      				$("#strong2").addClass("mrbq-red1");
	            		break;	
	      		case 6: $("#strong2").text("普通");
	      				$("#strong2").removeClass();
	               		$("#strong2").addClass("mrbq-red2");
	              		break;
	            case 7: $("#strong2").text("普通");
	            		$("#strong2").removeClass();
	               		$("#strong2").addClass("mrbq-red21");
	              		break;
	      		case 8: $("#strong2").text("中等");
	      				$("#strong2").removeClass();
	              		$("#strong2").addClass("mrbq-red3");
	              		break;
	            case 9: $("#strong2").text("中等");
	            		$("#strong2").removeClass();
	              		$("#strong2").addClass("mrbq-red31");
	              		break;
	            case 10:$("#strong2").text("中等");
	            		$("#strong2").removeClass();
	              		$("#strong2").addClass("mrbq-red32");
	              		break;
	            case 11:$("#strong2").text("中等");
	            		$("#strong2").removeClass();
	              		$("#strong2").addClass("mrbq-red33");
	              		break;
	      		case 12:$("#strong2").text("强");
	      				$("#strong2").removeClass();
	               		$("#strong2").addClass("mrbq-red4");
	               		break;
	            case 13:$("#strong2").text("强");
	            		$("#strong2").removeClass();
	               		$("#strong2").addClass("mrbq-red41");
	              		break;
	            case 14:$("#strong2").text("强");
	            		$("#strong2").removeClass();
	               		$("#strong2").addClass("mrbq-red42");
	              		break;

	            default:$("#strong2").text("非常强");
	               		$("#strong2").addClass("mrbq-red5");
	              		break;
	     
	     }
	   });
	</script>
</body>
</html></body>
</html>

