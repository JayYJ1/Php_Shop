<?php
	include "../common.php";

	$no=$_REQUEST['no'];
	$text1=$_REQUEST['text1'];
	$sel1=$_REQUEST['sel1'];
	$sel2=$_REQUEST['sel2'];
	$page=$_REQUEST['page'];
	$day1_y=$_REQUEST['day1_y'];
	$day1_m=$_REQUEST['day1_m'];
	$day1_d=$_REQUEST['day1_d'];
	$day2_y=$_REQUEST['day2_y'];
	$day2_m=$_REQUEST['day2_m'];
	$day2_d=$_REQUEST['day2_d'];
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<?php
	$query="select * from jumun where no37=$no;";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $qurey");
	$row=mysqli_fetch_array($result);
	$total=number_format($row['total_cash37']);
	$o_tel1=trim(substr($row['o_tel37'],0,3));
	$o_tel2=trim(substr($row['o_tel37'],3,4));
	$o_tel3=trim(substr($row['o_tel37'],7,4));
	$o_tel=$o_tel1 . "-" . $o_tel2 . "-" . $o_tel3;
	$o_phone1=trim(substr($row['o_phone37'],0,3));
	$o_phone2=trim(substr($row['o_phone37'],3,4));
	$o_phone3=trim(substr($row['o_phone37'],7,4));
	$o_phone=$o_phone1 . "-" . $o_phone2 . "-" . $o_phone3;
	$r_tel1=trim(substr($row['r_tel37'],0,3));
	$r_tel2=trim(substr($row['r_tel37'],3,4));
	$r_tel3=trim(substr($row['r_tel37'],7,4));
	$r_tel=$r_tel1 . "-" . $r_tel2 . "-" . $r_tel3;
	$r_phone1=trim(substr($row['r_phone37'],0,3));
	$r_phone2=trim(substr($row['r_phone37'],3,4));
	$r_phone3=trim(substr($row['r_phone37'],7,4));
	$r_phone=$r_phone1 . "-" . $r_phone2 . "-" . $r_phone3;
	if($row['pay_method37']==0) $method="카드"; else $method="무통장";
	if($row['card_kind37']==0) $ckind="국민카드"; else if($row['card_kind37']==1) $ckind="신한카드"; else if($row['card_kind37']==2) $ckind="우리카드"; else $ckind="하나카드";
?>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문번호</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE">&nbsp;<font size="3"><b><?=$row['no37']?>(<font color="blue"><?=$a_state[$row['state37']]?></font>)</b></font></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문일</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['jumunday37']?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> <?php
		if($row['member_no37']==0){
		echo("
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>주문자</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$row[o_name37] (비회원)</td>");
		}
		else{
		echo("
		<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>주문자</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$row[o_name37]</td>");
		}
		?>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_tel?></td>
	</tr>
	<tr>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['o_email37']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_phone?></td>
	</tr>
	<tr>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row['o_zip37']?>) <?=$row['o_juso37']?></td>
	</tr>
	</tr>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['r_name37']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_tel?></td>
	</tr>
	<tr>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['r_email37']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_phone?></td>
	</tr>
	<tr>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row['r_zip37']?>) <?=$row['r_juso37']?></td>
	</tr>
	<tr>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">메모</font></td>
        <td width="300" height="50" bgcolor="#EEEEEE" colspan="3"><?=$row['memo37']?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">지불종류</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$method?></td>

        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드승인번호 </font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['card_okno37']?>&nbsp</td>
	</tr>
	<tr>
		<?if($row['card_halbu37']==0){ $halbu="일시불";	?>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드 할부</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$halbu?></td>
		<?} else{ ?>
		<td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드 할부</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['card_halbu37']?>개월</td>
		<?}?>

        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드종류</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$ckind?></td>
	</tr>
	<tr>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">무통장</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE">국민은행:123-12-12345</td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">입금자이름</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['bank_sender37']?></td>
	</tr>
</table>
<br>


<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC">
    <td width="340" height="20" align="center"><font color="#142712">상품명</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">수량</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">단가</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">금액</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">할인</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션1</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션2</font></td>
	</tr>
	<?php
	$query="select *, product.name37 as n1, opts1.name37 as n2, opts2.name37 as n3 from jumuns, product, opts as opts1, opts as opts2 where jumuns.product_no37=product.no37 and jumuns.opts_no1=opts1.no37 and jumuns.opts_no2=opts2.no37 and jumuns.jumun_no37='$no';";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $qurey");
	$count=mysqli_num_rows($result);
		for($i=0; $i<$count;$i++)
		{
			$row=mysqli_fetch_array($result);
			if(!$row['discount37']) $d=""; else $d="$row[discount37] %";
			$p=number_format($row['price37']);
			$c=number_format($row['cash37']);
			echo("
			<tr bgcolor='#EEEEEE' height='20'>
				<td width='340' height='20' align='left'>$row[n1]</td>
				<td width='50'  height='20' align='center'>$row[num37]</td>
				<td width='70'  height='20' align='right'>$p</td>
				<td width='70'  height='20' align='right'>$c</td>
				<td width='50'  height='20' align='center'>$d</td>
				<td width='60'  height='20' align='center'>$row[n2]</td>
				<td width='60'  height='20' align='center'>$row[n3]</td>
			</tr>");
		}
	$query="select * from jumuns where jumun_no37='$no';";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $qurey");
	$count=mysqli_num_rows($result);
		for($i=0; $i<$count;$i++){
			$row1=mysqli_fetch_array($result);
			$bp=number_format($row1['price37']);
			$bc=number_format($row1['cash37']);
		if($row1['product_no37']==0){
			echo("
			<tr bgcolor='#EEEEEE' height='20'>
				<td width='340' height='20' align='left'>택배비</td>
				<td width='50'  height='20' align='center'>$row1[num37]</td>
				<td width='70'  height='20' align='right'>$bp</td>
				<td width='70'  height='20' align='right'>$bc</td>
				<td width='50'  height='20' align='center'></td>
				<td width='60'  height='20' align='center'></td>
				<td width='60'  height='20' align='center'></td>
			</tr>");
			}
		}
?>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr>
	  <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">총금액</font></td>
		<td width="700" height="20" bgcolor="#EEEEEE" align="right"><font color="#142712" size="3"><b><?=$total?></b></font> 원&nbsp;&nbsp</td>
	</tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr>
		<td align="center">
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">&nbsp
			<input type="button" value="프린트" onClick="javascript:print();">
		</td>
	</tr>
</table>

</center>

<br>
</body>
</html>
