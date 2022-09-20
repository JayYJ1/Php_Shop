<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 php)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	


<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	
<?php
	include "main_top.php";
	$findtext=$_REQUEST['findtext'];
	$query = "select * from product where name37 like '%$findtext%' order by name37;";
	$result=mysqli_query($db,$query); //sql 실행
	if (!$result){
		exit("에러: $query");  //에러조사
	}
	$count=mysqli_num_rows($result);  
?>
			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language="javascript">
				function SearchProduct() {
					form2.submit();
				}
			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
			  <tr><td height="13"></td></tr>
			  <tr>
			    <td height="30" align="center"><p><img src="images/search_title.gif" width="746" height="30" border="0" /></p></td>
			  </tr>
			  <tr><td height="13"></td></tr>
			</table>

			<table width="730" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center" valign="middle" colspan="3" height="5">
						<table border="0" cellpadding="0" cellspacing="0" width="690">
							<tr><td class="cmfont"><img src="images/search_title1.gif" border="0"></td></tr>
      			  <tr><td height="10"></td></tr>
			      </table>
					</td>
				</tr>
				<tr>
					<td width="730" align="center" valign="top" bgcolor="#FFFFFF"> 

        
						<table width="730" border="0" cellpadding=0 cellspacing=0 class="cmfont">

							<tr bgcolor="8B9CBF"><td height="3" colspan="5"></td></tr>
							<tr height="29" bgcolor="EEEEEE"> 
								<td width="80"  align="center">그림</td>
								<td align="center">상품명</td>
								<td width="150" align="right">가격</td>
								<td width="20"></td>
							</tr>
							<tr bgcolor="8B9CBF"><td height="1" colspan="5"  bgcolor="AAAAAA"></td></tr>
							
							<?php

									$num_col=5; $num_row=3; //column수,row수
									$icount=0;

									echo("<table border='0' cellpadding='0' cellspacing='0'>");
									for($ir=0; $ir<$num_row;$ir++){
										echo("<tr>");
										for($ic=0;$ic<$num_col;$ic++){
											if($icount<$count){
												$row=mysqli_fetch_array($result);
												$p=number_format($row['price37']);
												$sp=number_format(round($row['price37']*(100-$row['discount37'])/100,-3));
												echo("
												<td width='150' height='205' align='center' valign='top'>
												<br>
												<table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>
												<tr>
												<tr> 
												<td align='center'> 
													<a href='product_detail.php?no=$row[no37]'><img src='product/$row[image1_37]' width='120' height='140' border='2'
													onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a>
												</td>
												</tr>
												<tr><td height='5'></td></tr>
												<tr> 
												<td width='40' height='20' align='center'>
													<a href='product_detail.php?no=$row[no37]'><font color='444444'>$row[name37]</font></a>&nbsp;");
													if($row['icon_hit37']==1){
													echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
													}
													if($row['icon_new37']==1){
													echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
													}
													if($row['icon_sale37']==1){
													echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'><font color='red'>$row[discount37]%</font>");
													}
												echo("</td>
												</tr>");
												
												if($row['icon_sale37']==1)
												echo("<tr><td height='20' align='center'><strike>$p 원</strike><br><b>$sp 원</b></td></tr>");
												else
												echo("<tr><td height='20' align='center'><b>$p 원</b></td></tr>");
												echo("
												</tr>
												</table></td>");
											}
											else
												echo("<td></td>");
											$icount++;
										}
										echo("</tr>
										<tr><td height='10'></td></tr>");
									}
									echo("</table>");
									?>
						

							<tr bgcolor="8B9CBF"><td height="3" colspan="5"></td></tr>
						</table>
					</td>
				</tr>
			</table>
			<!-- <table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td height="30" class="cmfont" align="center">
						<img src="images/i_prev.gif" align="absmiddle" border="0"> 
						<font color="#FC0504"><b>1</b></font>&nbsp;
						<a href="product_search.php?page=2"><font color="#7C7A77">[2]</font></a>&nbsp;
						<a href="product_search.php?page=3"><font color="#7C7A77">[3]</font></a>&nbsp;
						<img src="images/i_next.gif" align="absmiddle" border="0">
					</td>
				</tr>
			</table> -->
<?php
	include "main_bottom.php";
?>

