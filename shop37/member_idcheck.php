<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?php
	include "common.php";
?>
<html>
<head>
<title>중복ID 조회</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">

<script language = "javascript">
	function Close_me(v)
	{
		opener.form2.check_id.value = v;
		self.close();
	}
</script>

<body bgcolor="#FFFFFF" text="#000000"  marginwidth="0" marginheight="0">
<table border="0" width="300" cellspacing="0" cellpadding="0">
	<tr>
		<td  height="30" bgcolor="blue"><font color="white" size="3"><b>&nbsp;중복 ID 조사</b></font></td>
	</tr>
	<tr><td  height="40"></td></tr>

<!-- 중복 아이디가 없는 경우 -->
	<tr>
		<td height="50" valign="middle" align="center">
<?php
	$uid=$_REQUEST['uid'];
	$query="select * from member where uid37='$uid';";
	$result=mysqli_query($db,$query);	//sql실행
	if(!$result)exit("에러: $query"); //에러조사
	$count=mysqli_num_rows($result);
	if($count==0)
		echo("<font color='#666666'><b>$uid</b>는 사용 가능한 아이디입니다.</font>
		<a href='javascript:Close_me(\" \");'>닫기</a>");
	else
		echo("<font color='#666666'><b>$uid</b>는 사용 불가능한 아이디입니다.</font>
		<a href='javascript:Close_me(\" \");'>닫기</a>");
?>
		</td>
	</tr>
</table>	 
</body>
</html>