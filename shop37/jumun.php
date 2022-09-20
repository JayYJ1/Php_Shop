<?php
   include "main_top.php";
?>
<!-------------------------------------------------------------------------------------------->
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->
<?php
   $name=$_REQUEST['name'];
   $email=$_REQUEST['email'];
   $page=$_REQUEST['page'];
?>

         <table border="0" cellpadding="0" cellspacing="0" width="747">
            <tr><td height="13"></td></tr>
            <tr>
               <td height="30" align="center"><img src="images/jumun_title.gif" width="746" height="30" border="0"></td>
            </tr>
            <tr><td height="20"></td></tr>
         </table>
         <table border="0" cellpadding="0" cellspacing="0" width="690">
            <tr>
               <td><img src="images/jumun_title1.gif" border="0" align="absmiddle"></td>
            </tr>
            <tr><td height="10"></td></tr>
         </table>

         <table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
            <tr><td colspan="5" height="3" bgcolor="black"></td></tr>
            <tr bgcolor="F2F2F2">
               <td width="80" height="30" align="center">주문일</td>
               <td width="100"  align="center">주문번호</td>
               <td width="290" align="center">제품명</td>
               <td width="100" align="center">금액</td>
               <td width="115" align="center">주문상태</td>
            </tr>
            <tr><td colspan="5" bgcolor="DEDCDD"></td></tr>
<?php
   if($cookie_no)
      $query="select * from jumun where member_no37=$cookie_no order by no37 desc;";
   else
      $query="select * from jumun where o_name37='$name' and o_email37='$email' order by no37 desc;";

   $result=mysqli_query($db,$query);
   if (!$result) exit("에러: $qurey");
   $count=mysqli_num_rows($result);

   if(!$page)$page=1;
   $pages=ceil($count/$page_line);

   $first=1;
   if($count>0)$first=$page_line*($page-1);

   $page_last=$count-$first;
   if($page_last>$page_line)$page_last=$page_line;

   if($count>0)mysqli_data_seek($result,$first);
   for($i=0; $i<$page_last;$i++)
   {
      $row=mysqli_fetch_array($result);
      $p=number_format($row['total_cash37']);
      $state=$row['state37'];
      $color="black";
	  if($state==4) $color="green";
      if($state==5) $color="blue";
      if($state==6) $color="red";
      echo("
      <tr>
         <td height='30' align='center'><font color='686868'>$row[jumunday37]</font></td>
         <td align='center'>
            <a href='jumun_info.php?no=$row[no37]&page=$page'><font color='#0066CC'>$row[no37]</font></a>
         </td>
         <td><font color='686868'>$row[product_names37]</font></td>
         <td align='right'><font color='686868'>$p 원</font></td>
         <td align='center'><font color='$color'>$a_state[$state]</font></td>
      </tr>
      <tr><td colspan='5' background='images/line_dot.gif'></td></tr>");
   }

      echo("<tr><td colspan='5' height='2' bgcolor='black'></td></tr>");
?>
      </table>
   <br>
<?php
   $blocks = ceil($pages/$page_block);
   $block = ceil($page/$page_block);
   $page_s = $page_block * ($block-1);
   $page_e = $page_block * $block;
   if($blocks <= $block) $page_e = $pages;

   echo("<table border='0' cellpadding='0' cellspacing='0' width='690'>
      <tr>
         <td height='30' align='center'>");
         if ($block>1)
         {
            $tmp1 = $page_s;
            echo("<a href='jumun.php?page=$tmp1'>
                  <img src = 'images/i_prev.gif' align='absmiddle' border='0'>
                 </a>&nbsp");
         }
         for($i=$page_s+1;$i<=$page_e;$i++)
         {
            if($page==$i)
               echo("<font color='red'><b>$i</b></font>&nbsp");
            else
               echo("<a href='jumun.php?page=$i'>[$i]</a>&nbsp");
         }
         if($block<$blocks)
         {
            $tmp1 = $page_e+1;
            echo("&nbsp<a href='jumun.php?page=$tmp1'>
                  <img src='images/i_next.gif' align='absmiddle' border='0'></a>");
         }

         echo("   </td>
               </tr>
               </table>");
?>
<!-------------------------------------------------------------------------------------------->
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->
<?php
   include "main_bottom.php";
?>
