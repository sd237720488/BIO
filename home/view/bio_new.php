<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
		include("../model/Db.class.php");
		include("../controller/shop.class.php");
		$shop = new Shop();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>新品上市</title>
	<link rel="stylesheet" type="text/css" href="./css/bio_new.css">
	<link rel="stylesheet" type="text/css" href="./css/bio_detailed1.css">
	<link rel="stylesheet" type="text/css" href="./css/biotherm_footer1.css">
	<link rel="stylesheet" type="text/css" href="./css/header -80percentage.css">
	<link rel="stylesheet" type="text/css" href="./css/header1.css">
	<link rel="stylesheet" type="text/css" href="./css/user-panel.css">
	<link rel="stylesheet" type="text/css" href="./css/E-zine.css">
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="./js/E-zine.js"></script>
	<script type="text/javascript" src="./js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="./js/bio_new.js"></script>
	<script src="./js/shopUpDown.js"></script>



	<script type="text/javascript">
		function verificationUser(){
			var num=/^[1][\d]{9}[\d]$/g;
			var email=/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/;
			if($(".input-id").val()==""){
				$(".tips-user").text("请输入您的邮箱或手机号");
				$(".input-id").addClass("border-red").removeClass("border-blue");
				
			}else if(num.test($(".input-id").val())||email.test($(".input-id").val())){
				$(".tips-user").text("");
				$(".input-id").addClass("border-blue");
				
			}else {
				$(".tips-user").text("请输入有效的邮箱或手机号");
				$(".input-id").addClass("border-red").removeClass("border-blue");
			}
			
		}
		function verificationPwd(){
			if($(".input-pwd").val()==""){
				$(".tips-pwd").text("请输入您的密码");
				$(".input-pwd").addClass("border-red").removeClass("border-blue");
			}else if($(".input-pwd").val().length<8){
				$(".tips-pwd").text("请输入8-30个字符");
				$(".input-pwd").addClass("border-red").removeClass("border-blue");
			}else {
				$(".tips-pwd").text("");
				$(".input-pwd").addClass("border-blue");
			}
		}
					
		
		
	</script>
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
	<!-- 引入头部 -->
		<?php
		include("./header/headerNavigation.php");
		?>

		<div id="new_main">
			<div id="detailed_body_text">
				<span><a href="index.v.php">首页></a> > 碧欧泉女士 >   <span id="detailed_body_text_span1">新品上市</span></span>
			</div>
			<div id="new_left"></div>
			<div id="new_right">
				<div id="new_right_box">
					<div id="new_main_sort">
						<select name="addr[]" id="sort_select">
							<option value="默认排序">默认排序</option>
							<option value="价格从高到低">价格从高到低</option>
							<option value="价格从低到高">价格从低到高</option>
							<option value="最受欢迎">最受欢迎</option>
							<option value="按销量排序">按销量排序</option>
						</select>
						<span id="sort_text">排序</span>
					</div>
					<div class="new_box_link">
						<div class="dbb_link"></div>
						<div class="dbb_link2">产品列表</div>
						<div class="dbb_link"></div>
					</div>
					<div id="new_list">
						<div id="new_list_box">
							<div class="new_list_box_img1">
								<div class="new_list_box1">
									快速浏览
								</div>
								<img id="new_list_box_img" src="./images/2018-09-13_153110.png">
								<img src="./images/BIO00088.png">
							</div>
							<div id="text1">
								<span id="text1_span1">防晒「小黄瓶」骄阳水润防晒乳SPF50 PA+++</span>
								<span id="text1_span2">WATERLOVER SUN MILK SPF 50</span>
							</div>
							<div id="text2">
								<span id="text2_span1">200ml</span><br>
								<img src="images/2018-09-13_155016.png"><br>
								<span id="text2_span2"><strong>¥395</strong></span>
							</div>
							<div id="text3">
								<a id="text3_a1" href="">了解详情</a>
								<a id="text3_a2" href="">立即购买</a>
							</div>
						</div>
						<div id="new_list_box">
							<div class="new_list_box_img2">
								<div class="new_list_box2">
									快速浏览
								</div>
								<img id="new_list_box_img" src="./images/2018-09-13_153110.png">
								<img src="./images/BIO00082.png">
							</div>
							<div id="text1">
								<span id="text1_span1">碧欧泉活颜清透精华露</span>
								<span id="text1_span2">Skin Oxygen Serum</span>
							</div>
							<div id="text2">
								<span id="text2_span1">50ml</span><br>
								<img src="images/2018-09-13_155016.png"><br>
								<span id="text2_span2"><strong>¥400</strong></span>
							</div>
							<div id="text3">
								<a id="text3_a1" href="">了解详情</a>
								<a id="text3_a2" href="">立即购买</a>
							</div>
						</div>
						<div id="new_list_box">
							<div class="new_list_box_img3">
								<div class="new_list_box3">
									快速浏览
								</div>
								<img id="new_list_box_img" src="./images/2018-09-13_153110.png">
								<img src="./images/BIO00083.png">
							</div>
							<div id="text1">
								<span id="text1_span1">碧欧泉活颜清透洁面啫喱</span>
								<span id="text1_span2">Skin Oxygen Cleanser</span>
							</div>
							<div id="text2">
								<span id="text2_span1">150ml</span><br>
								<img src="images/2018-09-13_155016.png"><br>
								<span id="text2_span2"><strong>¥240</strong></span>
							</div>
							<div id="text3">
								<a id="text3_a1" href="">了解详情</a>
								<a id="text3_a2" href="">立即购买</a>
							</div>
						</div>
					</div>
					<div id="new_list">
						<div id="new_list_box">
							<div class="new_list_box_img4">
								<div class="new_list_box4">
									快速浏览
								</div>
								<img id="new_list_box_img" src="./images/2018-09-13_153110.png">
								<img src="./images/BIO00079.png">
							</div>
							<div id="text1">
								<span id="text1_span1">「奇迹乳」护肤精华乳</span>
								<span id="text1_span2">BIOTHERM LIFE PLANKTON SENSITIVE EMULSION</span>
							</div>
							<div id="text2">
								<span id="text2_span1">75ml</span><br>
								<img src="images/2018-09-13_155016.png"><br>
								<span id="text2_span2"><strong>¥420</strong></span>
							</div>
							<div id="text3">
								<a id="text3_a1" href="">了解详情</a>
								<a id="text3_a2" href="">立即购买</a>
							</div>
						</div>
						<div id="new_list_box">
							<div class="new_list_box_img5">
								<div class="new_list_box5">
									快速浏览
								</div>
								<img id="new_list_box_img" src="./images/2018-09-13_153110.png">
								<img src="./images/BIO10047.png">
							</div>
							<div id="text1">
								<span id="text1_span1">男士净痘精华</span>
								<span id="text1_span2">T-PUR REFINING MICRO-PEEL SERUM</span>
							</div>
							<div id="text2">
								<span id="text2_span1">50ml</span><br>
								<img src="images/2018-09-13_155016.png"><br>
								<span id="text2_span2"><strong>¥450</strong></span>
							</div>
							<div id="text3">
								<a id="text3_a1" href="">了解详情</a>
								<a id="text3_a2" href="">立即购买</a>
							</div>
						</div>
						<div id="new_list_box">
							<div class="new_list_box_img6">
								<div class="new_list_box6">
									快速浏览
								</div>
								<img id="new_list_box_img" src="./images/2018-09-13_153110.png">
								<img src="./images/BIO00086.png">
							</div>
							<div id="text1">
								<span id="text1_span1">美胸紧致乳</span>
								<span id="text1_span2">SUPER BUST TENSE-IN SERUM</span>
							</div>
							<div id="text2">
								<span id="text2_span1">50ml</span><br>
								<img src="images/2018-09-13_155016.png"><br>
								<span id="text2_span2"><strong>¥390</strong></span>
							</div>
							<div id="text3">
								<a id="text3_a1" href="">了解详情</a>
								<a id="text3_a2" href="">立即购买</a>
							</div>
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
								<div id="text_input">
									<input id="input1" type="text" name="" placeholder="输入您的邮箱">
									<input id="input3" type="image" src="images/2018-09-10_202455.png" name="img">
									<input id="input2" type="checkbox" name="NO"><span style="color: #535355;">我同意依照本<a class="subscribe_href_a" href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a class="subscribe_href_a" href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>对我的个人信息进行收集和使用；我已阅读并确认被给予充分机会理解该<a class="subscribe_href_a" href="http://policy.lorealchina.com/termsofusewebsite">使用条款</a>和<a class="subscribe_href_a" href="http://policy.lorealchina.com/privacypolicy">隐私政策</a>的内容。</span><br />
									<span class="tips_1" id="tips_1"></span><span class="tips_2" id="tips_2"></span>
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

			</div>
		</div>
	
	
</body>
<script type="text/javascript" src="./js/bio-header.js"></script>
</html>