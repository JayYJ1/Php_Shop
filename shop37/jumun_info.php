<?php
	include "main_top.php";
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center"><img src="images/jumun_title.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title2.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td colspan="6" height="2" bgcolor="8B9CBF"></td></tr>
				<tr>
					<td width="37"  bgcolor="F2F2F2" align="center" height="30"></td>
					<td width="395" bgcolor="F2F2F2" align="center">상품명</td>
					<td width="50"  bgcolor="F2F2F2" align="center">수량</td>
					<td width="90"  bgcolor="F2F2F2" align="center">금액</td>
					<td width="90"  bgcolor="F2F2F2" align="center">합계</td>
				</tr>
				<tr><td colspan="6" bgcolor="DEDCDD"></td></tr>

<?php
	$page=$_REQUEST['page'];
	$query="select *, product.name37 as n1, product.no37 as s1, opts1.name37 as n2, opts2.name37 as n3 from jumuns, product, opts as opts1, opts as opts2 where jumuns.product_no37=product.no37 and jumuns.opts_no1=opts1.no37 and jumuns.opts_no2=opts2.no37 and jumuns.jumun_no37='$no';";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $qurey");
	$count=mysqli_num_rows($result);
		for($i=0; $i<$count;$i++)
		{
			$row=mysqli_fetch_array($result);
			$p=number_format($row['cash37']);
			$c=number_format($row['cash37']*$row['num37']);
			echo("
					<tr>
					<td width='37'>
						<a href='product_detail.php?no=$row[s1]'><img src='product/$row[image1_37]' width='50' height='50' border='0'></a>
					</td>
					<td height='52'>
						<a href='jumun_read.html?no=200701010001&page=1'><font color='686868'>$row[n1]</font><br><font color='#0066CC'>[옵션사항]</font> $row[n2] $row[n3]</a>
					</td>
					<td align='center'><font color='686868'>$row[num37]</font></td>
					<td align='right'><font color='686868'>$p 원</font></td>
					<td align='right'><font color='686868'>$c 원</font></td>
				</tr>
				<tr><td colspan='6' background='images/line_dot.gif'></td></tr>");
		}
		echo("<tr><td colspan='6' height='2' bgcolor='8B9CBF'></td></tr>");
?>
			</table>

			<br><br><br>
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
	if($row['bank_kind37']==0) $bkind="국민:000-00-0000-0000"; else $bkind="신한:000-00-0000-0000";
	if($row['pay_method37']==0) $method="카드"; else $method="무통장";
	if($row['card_kind37']==0) $ckind="국민카드"; else if($row['card_kind37']==1) $ckind="신한카드"; else if($row['card_kind37']==2) $ckind="우리카드"; else $ckind="하나카드";
?>
			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title3.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="1" width="685" bgcolor="#EEEEEE" class="cmfont">
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;주문번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$no?><font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;결제금액</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#D06404"><b><?=$total?> 원</b></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;결제방식</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$method?></font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;승인번호</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$row['card_okno37']?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;카드종류</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$ckind?></font></td>
					<?if($row['card_halbu37']==0){ $halbu="일시불";	?>
				    <td width="100" bgcolor="#F2F2F2"><font color="#686868">할부</font></td>
			        <td width="243" bgcolor="#FFFFFF"><?=$halbu?></td>
					<?} else{ ?>
					<td width="100" bgcolor="#F2F2F2"><font color="#686868">할부</font></td>
					<td width="243" bgcolor="#FFFFFF"><?=$row['card_halbu37']?>개월</td>
					<?}?>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;결제방식</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868">온라인 (<?=$bkind?>)</font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;보낸사람</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$row['bank_sender37']?></font></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>

			<br><br><br>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title4.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="1" width="685" bgcolor="#EEEEEE" class="cmfont">
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;주문자명</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row['o_name37']?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;전화번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$o_tel?></font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;휴대폰</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$o_phone?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;이메일</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row['o_email37']?></font></td>
				</tr>
				<tr><td height="1" bgcolor="8B9CBF" colspan="4"></td></tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;수취인명</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row['r_name37']?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;전화번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$r_tel?></font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;휴대폰</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$r_phone?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;배달주소</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868">[<?=$row['r_zip37']?>] &nbsp; <?=$row['r_juso37']?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;메모</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row['memo37']?></font></td>
				</tr>
				
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td height="40" class="cmfont" align="right">
						<img src="images/b_list.gif" border="0" OnClick="location.href='jumun.php?page=<?=$page?>'" style="cursor:hand">&nbsp;&nbsp;&nbsp
					</td>
				</tr>
			</table>


<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?php
	include "main_bottom.php";
?>