<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?php
	include "../common.php";
	$no1=$_REQUEST['no1'];
	$no2=$_REQUEST['no2'];
	$name37=$_REQUEST['name37'];
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_new()
	{
		location.href="opts_new.php?no1=<?=$no1;?>";
	}
</script>

</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>

<?php
	$query="select name37 from opt where no37=$no1;" ;
	$result=mysqli_query($db,$query);	//sql실행
	if(!$result)exit("에러: $query"); //에러조사
	#$count=mysqli_num_rows($result); //레코드 개수
	$row1=mysqli_fetch_array($result);
?>

<table width="500" border="0" cellspacing="0" cellpadding="0">
	<tr height="50">
		<td align="left"  width="300" valign="bottom">&nbsp 옵션명 : <font color="#0457A2"><b><?=$row1['name37']?></b></font></td>
		<td align="right" width="200" valign="bottom">
			<input type="button" value="신규입력" onclick="javascript:go_new();"> &nbsp
		</td>
	</tr>
	<tr><td height="5" colspan="2"></td></tr>
</table>
<?php
	$query="select * from opts where opt_no37=$no1 order by no37;";	 $result=mysqli_query($db,$query);	//sql실행
	if(!$result)exit("에러: $query"); //에러조사
	$count=mysqli_num_rows($result); //레코드 개수
?>

<table width="500" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="20"> 
		<td width="100" align="center"><font color="#142712">소옵션번호</font></td>
		<td width="300" align="center"><font color="#142712">소옵션명</font></td>
		<td width="100" align="center"><font color="#142712">수정/삭제</font></td>
	</tr>
	<?php
	 for($i=1; $i<=$count; $i++)
   {
	      $row=mysqli_fetch_array($result); //1레코드 읽기
	echo("<tr bgcolor='#F2F2F2' height='20'>	
		<td width='100' align='center'>$i</td>
		<td width='300' align='left'>$row[name37]</td>
		<td width='100' align='center'>
			<a href='opts_edit.php?no1=$row[opt_no37]&no2=$row[no37]'>수정</a>/
			<a href='opts_delete.php?no1=$row[opt_no37]&no2=$row[no37]' onclick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
		</td>
	</tr>");}
	?>
<!-- 	<tr bgcolor="#F2F2F2" height="20">	 -->
<!-- 		<td width="100" align="center">2</td> -->
<!-- 		<td width="300" align="left">L</td> -->
<!-- 		<td width="100" align="center"> -->
<!-- 			<a href="opts_edit.html?no1=1&no2=2">수정</a>/ -->
<!-- 			<a href="opts_delete.html?no1=1&no2=2" onclick="javascript:return confirm('삭제할까요 ?');">삭제</a> -->
<!-- 			</td> -->
<!-- 	</tr> -->
</table>

</center>

</body>
</html>