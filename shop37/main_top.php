<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?php
   include "common.php";
   $cookie_no=$_COOKIE['cookie_no'];
   $cookie_name=$_COOKIE['cookie_name']; 
   $menu=$_REQUEST['menu'];
   $sort=$_REQUEST['sort'];
   $findtext=$_REQUEST['findtext'];
   $no=$_REQUEST['no'];
   $cart=$_COOKIE['cart'];
   $n_cart=$_COOKIE['n_cart'];
?>
<html>
<head>
<title>BTB</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<script language="Javascript" src="include/common.js"></script>
</head>

<body style="margin:0">
<center>

<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr> 
		<td>
			<!--  상단 왼쪽 로고  -------------------------------------------->
			<table border="0" cellspacing="0" cellpadding="0" width="182">
				<tr>
					<td><a href="index.html"><img src="images/Top_Logo2.gif" width="182" height="30" border="0"></a></td>
				</tr>
			</table>
		</td>
		<td align="right" valign="bottom">
			<!--  상단메뉴 Home/로그인/회원가입/장바구니/주문배송조회/즐겨찾기추가  ---->	
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><a href="index.html"><img src="images/top_menu01.gif" border="0"></a></td>
					<td><img src="images/top_menu_line.gif" width="11"></td>
					<?php
					if(!$cookie_no){
					echo"<td><a href='member_login.php'><img src='images/top_menu02.gif'border='0'></a></td>
					<td><img src='images/top_menu_line.gif' width='11'></td>
					<td><a href='member_agree.php'><img src='images/top_menu03.gif' border='0'></a></td>";
					}else{
						echo"<td><a href='member_logout.php'><img src='images/top_menu02_1.gif' border='0'></a></td>";
						echo"<td><img src='images/top_menu_line.gif' width='11'></td>";
						echo"<td><a href='member_edit.php'><img src='images/top_menu03_1.gif' border='0'></a></td>";
					}?>

					<td><img src="images/top_menu_line.gif" width="11"></td>
					<td><a href="cart.php"><img src="images/top_menu05.gif" border="0"></a></td>
					<td><img src="images/top_menu_line.gif" width="11"></td>
					<td><a href="jumun_login.php"><img src="images/top_menu06.gif" border="0"></a></td>
					<td><img src="images/top_menu_line.gif"width="11"></td>
					<td><img src="images/top_menu08.gif" onclick="javascript:Add_Site();" style="cursor:hand"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<!--  메인 이미지 --------------------------------------------------->
<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td><a href="index.html"><img src="images/Main_Logo1.gif" width="959" height="175" border="0"></a></td>
	</tr>
</table>
<!------------------------------------------------------------------------>
<?php include "main_left.php"; ?>
<!-- 상품 검색 ------------------------------------->
<table width="959" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="1" colspan="5" bgcolor="#00000"></td></tr>
	<tr bgcolor="#F0F0F0">
		<td width="181" align="center" style="font-size:9pt;color:#666666;font-family:돋움;">&nbsp <b> &nbsp;&nbsp 
		<?php
		   if(!$cookie_no)
		   {
			echo("고객");
		   }
		   else
		   echo $cookie_name;
		?>님! 환영합니다!
		</b></td>
		<td style="font-size:9pt;color:#666666;font-family:돋움;padding-left:5px;"></td>
		<td align="right" style="font-size:9pt;color:#666666;font-family:돋움;"><b>상품검색 ▶&nbsp</b></td>
		<!-- form1 시작 -->
		<form name="form1" method="post" action="product_search.php">
		<td width="135">
			<input type="text" name="findtext" maxlength="40" size="17" class="cmfont1">
		</td>
		</form>
		<!-- form1 끝 -->
		<td width="65" align="center"><a href="javascript:Search()"><img src="images/i_search1.gif" border="0"></a></td>
	</tr>
	<tr><td height="1" colspan="5" bgcolor="#E5E5E5"></td></tr>
</table>

<!--<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td height="100%" valign="top">
			<!--  화면 좌측메뉴 시작 (main_left) ------------------------------->
			<!--<table width="181" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td valign="top"> 
				<tr> 
					<td> -->
						<!--  Custom Service 메뉴(QA, FAQ...) -->
					<?php /*echo"	<table width='177'  border='0' cellpadding='2' cellspacing='1' bgcolor='#afafaf'>
							<tr><td height='3'  bgcolor='#a0a0a0'></td></tr>
							<tr><td height='25' bgcolor='#f0f0f0' align='center' style='font-size:11pt;color:#333333'><b><img src='images/List.gif' border='1' width='176'height='25'></b></td></tr>
							<tr>
								<td bgcolor='#FFFFFF'>
									<table width='100%'  border='0' cellspacing='0' cellpadding='0'>
										<tr><td><a href='https://kingkong-factory.com'><img src='images/KING.gif' border='1' width='176'height='49'onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor='#FFFFFF'>
									<table width='100%'  border='0' cellspacing='0' cellpadding='0'>
										<tr><td><a href='https://www.jamietshop.co.kr/main/index'><img src='images/JAMI.gif' border='1' width='176' height='49'onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor='#FFFFFF'>
									<table width='100%'  border='0' cellspacing='0' cellpadding='0'>
										<tr><td><a href='https://www.youtube.com/channel/UCrFFbADYO1jrXxefP9MivWA'><img src='images/JAMI_TV.gif' border='1' width='176'height='49'onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor='#FFFFFF'>
									<table width='100%'  border='0' cellspacing='0' cellpadding='0'>
										<tr><td><a href='http://gptgym.co.kr'><img src='images/GPT_GYM.gif' border='1' width='176'height='49'onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor='#FFFFFF'>
									<table width='100%'  border='0' cellspacing='0' cellpadding='0'>
										<tr><td><a href='https://www.youtube.com/channel/UCoHirUZkTs1nOtyJTNbNJ5g'><img src='images/GPT_TV.gif' border='1' width='176'height='49'onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a></td></tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			";*/?>
			<!--  화면 좌측메뉴 끝 (main_left) --------------------------------->
<!--		</td>
		<td width="10"></td>
		<td valign="top">-->
		<script>
function zoomIn(event){
	event.target.style.transform = "scale(1.2)";
	event.target.style.zIndex=1;
	event.target.style.transition="all 0.5s";
}
function zoomOut(event){
	event.target.style.transform = "scale(1)";
	event.target.style.zIndex=0;
	event.target.style.transition="all 0.5s";
}
</script>
