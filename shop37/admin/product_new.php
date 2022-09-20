<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?php
	include "../common.php";
	$text1=$_REQUEST['text1'];
	$regday1 = date("Y");
	$regday2 = date("m");
	$regday3 = date("d");
?>
<html>
<head>
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<form name="form1" method="post" action="product_insert.php" enctype="multipart/form-data">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품분류</td>
		<td width="700" bgcolor="#F2F2F2">
		
<?php
	echo("<select name='menu'>");
		for($i=0;$i<$n_menu;$i++){
			echo("<option value='$i'>$a_menu[$i]</option>");
			}
					
	echo("</select>"); echo("&nbsp");
?>
			
		</td>
	</tr>
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품코드</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="code" value="" size="20" maxlength="20">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품명</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="name" value="" size="60" maxlength="60">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제조사</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="coname" value="" size="30" maxlength="30">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">판매가</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="price" value="" size="12" maxlength="12"> 원
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">옵션</td>
    <td width="700" bgcolor="#F2F2F2">
<?php
	$query="select * from opt order by name37";//옵션선택부분------------
	$result=mysqli_query($db,$query); 
	if (!$result) exit("에러:$query");
	$count=mysqli_num_rows($result);    // 레코드개수   

     echo("<select name='opt1'> 
     <option value='0' selected>옵션선택</option>");       //옵션선택1 시작  
     for($i=1; $i<=$count; $i++){
     $row=mysqli_fetch_array($result); //1레코드 읽기
     if ($i==$opt1)
     echo("<option value='$row[no37]' selected>$row[name37]</option>);" );
	 else
      echo("<option value='$row[no37]'>$row[name37]</option>);" ); 
      }
          echo(" </select> &nbsp;"); //옵션선택1 끝
		  ?>
<?php
$query="select * from opt order by name37";//옵션선택부분------------
	$result=mysqli_query($db,$query); 
	if (!$result) exit("에러:$query");
	$count=mysqli_num_rows($result);
	 echo("<select name='opt2'>
     <option value='0' selected>옵션선택</option>"); //옵션선택2 시작 
	// mysqli_data_seek($result,0);
     for($i=1; $i<=$count; $i++){
     $row=mysqli_fetch_array($result); //1레코드 읽기
     if ($i==$opt2)
     echo("<option value='$row[no37]' selected>$row[name37]</option>);" );
	 else
      echo("<option value='$row[no37]'>$row[name37]</option>);" ); 
      }
          echo(" </select> &nbsp; &nbsp;"); //옵션선택2 끝
	?>

		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제품설명</td>
		<td width="700" bgcolor="#F2F2F2">
			<textarea name="contents" rows="10" cols="80"></textarea>
		</td>
	</tr>
	<tr> 
		
	<td width="100" bgcolor="#CCCCCC" align="center">상품상태</td>
    <td width="700" bgcolor="#F2F2F2">
				<?php
			for($i=1;$i<$n_status;$i++){
					echo("<input type='radio' name='status' value='$i'>$a_status[$i]</option>");
				}
			?>
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">아이콘</td>
<?php
		echo("<td width='700' bgcolor='#F2F2F2'>");
			echo("<input type='checkbox' name='icon_new' value='1'> New &nbsp;&nbsp");
			echo("<input type='checkbox' name='icon_hit' value='1'> Hit &nbsp;&nbsp");
			echo("<input type='checkbox' name='icon_sale' value='1'> Sale &nbsp;&nbsp");
			echo("할인율 : <input type='text' name='discount' value='0' size='3' maxlength='3'> %");
		echo("</td>");
?>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">등록일</td>
		<td width="700" bgcolor="#F2F2F2">

			<input type='text' name='regday1' value='<?=$regday1?>' size='4' maxlength='4'> 년 &nbsp
			<input type='text' name='regday2' value='<?=$regday2?>' size='2' maxlength='2'> 월 &nbsp
			<input type='text' name='regday3' value='<?=$regday3?>' size='2' maxlength='2'> 일
		</td> 

	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">이미지</td>
		<td width="700" bgcolor="#F2F2F2">
			<b>이미지1</b>: <input type="file" name="image1" size="30" value="찾아보기"><br>
			<b>이미지2</b>: <input type="file" name="image2" size="30" value="찾아보기"><br>
			<b>이미지3</b>: <input type="file" name="image3" size="30" value="찾아보기"><br>
		</td>
	</tr>
</table>
<table width="800" border="0" cellspacing="0" cellpadding="7">	
	<tr> 
		<td align="center">
			<input type="submit" value="등록하기"> &nbsp;&nbsp
			<input type="button" value="이전화면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

</body>
</html>
