<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?php
	include "main_top.php"
?>
<html>
<head>
<title>회원 암호 조회</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">

<script language = "javascript">
	function Closeme() 
	{
		self.close();
	}
</script>

<body bgcolor="#FFFFFF" text="#000000"  marginwidth="0" marginheight="0">
<table border="0" width="300" cellspacing="0" cellpadding="0">
	<tr>
		<td  height="30" bgcolor="blue"><font color="white" size="3"><b>&nbsp;회원 암호 확인</b></font></td>
	</tr>
	<tr>
		<td  height="40"></td>
	</tr>
	<tr>
		<td height="50" valign="middle" align="center">
			<font color="#666666">문의하신 암호는 <font color="red">????</font> 입니다.</font>  <br>
			<font color="#666666">문의하신 정보가 없습니다.</font>
		</td>
	</tr>
	<tr>
		<td height="50" align="center">
			<a href="javascript:Closeme()"><img src="images/b_ok1.gif" border="0"></a>
		</td>
	</tr>
</table>
	 
</body>
</html>