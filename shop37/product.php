<?php include "main_top.php";

   $menu=$_REQUEST["menu"];
   $sort=$_REQUEST["sort"];
   $query="select *from product where menu37=$menu";
   $result=mysqli_query($db,$query);
   $count=mysqli_num_rows($result);
?>
<!-------------------------------------------------------------------------------------------->
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->

      <!-- 하위 상품목록 -->

         <!-- form2 시작 -->
         <form name="form2" method="post" action="product.php?menu=<?=$menu?>&sort=<?=$sort?>">
         <input type="hidden" name="menu" value="<?=$menu?>">
         <table border="0" cellpadding="0" cellspacing="0" width="767" class="cmfont" bgcolor="#000000">

            <tr>
                  <td bgcolor="white" align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="751" class="cmfont">
                     <tr>
                        <td align="center" valign="middle">
                           <table border="0" cellpadding="0" cellspacing="0" width="730" height="37" class="cmfont">
                              <tr>
                                 <td width="500" class="cmfont">
                                 <tr><td height="3"  bgcolor="black"></td></tr>
                                    <font  style="font-size:12pt;color:black;"  class="cmfont"><b><?echo("$a_menu[$menu]");?> &nbsp</b></font>&nbsp
                                 </td>
                                 <td align="right" width="274">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                                       <tr>
                                          <td align="right"><font color="black"><b><?=$count?></b> 개의 상품.</font>&nbsp;&nbsp;&nbsp</td>
                                          <td width="100">
                                             <select name="sort" size="1" class="cmfont" onChange="form2.submit()">
                                             <?
                                             if($sort=="new")
                                                echo("<option value='new' selected>신상품순 정렬</option>");
                                             else
                                                echo("<option value='new' >신상품순 정렬</option>");
                                             if($sort=="up")
                                                echo("<option value='up' selected>고가격순 정렬</option>");
                                             else
                                                echo("<option value='up'>고가격순 정렬</option>");
                                             if($sort=="down")
                                                echo("<option value='down' selected>저가격순 정렬</option>");
                                             else
                                                echo("<option value='down'>저가격순 정렬</option>");
                                             if($sort=="name")
                                                echo("<option value='name' selected>상품명 정렬</option>");
                                             else
                                                echo("<option value='name' >상품명 정렬</option>");
                                             ?>

                                             </select>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         </form>


         <!-- form2 -->

         <?php
         if($sort=="up")
            $query="select *from product where menu37=$menu and status37=1 order by price37 desc";

         else if($sort=="down")
            $query="select *from product where menu37=$menu and status37=1 order by price37";

         else if($sort=="name")
            $query="select *from product where menu37=$menu and status37=1 order by name37";

         else
            $query="select *from product where menu37=$menu and status37=1 order by no37";
         $result=mysqli_query($db,$query);


         $num_col=5; $num_row=2;
      
         $page_line=$num_col*$num_row;
         $count=mysqli_num_rows($result);
          $page=$_REQUEST["page"];

         if(!$page)$page=1;
         $pages=ceil($count/$page_line);

         $first=1;
         if($count>0)$first=$page_line*($page-1);

         $page_last=$count-$first;
         if($page_last>$page_line)$page_last=$page_line;

         if($count>0)mysqli_data_seek($result,$first);

         $icount=0;


         echo("<table border='0' cellpadding='0' cellspacing='0'>");
            for($ir=0; $ir<$num_row;$ir++){
               echo("<tr>");
               for($ic=0;$ic<$num_col;$ic++){
                  if($icount<=$page_last-1){
                     $row=mysqli_fetch_array($result);
                     $p=number_format($row["price37"]);
                     $sp=number_format(round($row["price37"]*(100-$row["discount37"])/100,-3));
                     echo("
                     <td width='150' height='205' align='center' valign='top'>
                     <table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>
                      <tr>
                        <tr>
                        <td align='center'>
                           <a href='product_detail.php?no=$row[no37]'><img src='product/$row[image1_37]' width='120' height='137' border='0' onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a>
                        </td>
                     </tr>
                     <tr><td height='5'></td></tr>
                     <tr>
                        <td height='20' align='center'>
                           <a href='product_detail.php?no=$row[no37]'><font color='444444'>$row[name37]</font></a>&nbsp;");
                           if($row["icon_hit37"]==1){
                           echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
                           }
                           if($row["icon_new37"]==1){
                           echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
                           }
                           if($row["icon_sale37"]==1){
                           echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'><font color='red'>$row[discount37]%</font>");
                           }
                        echo("</td>
                     </tr>");

                     if($row["icon_sale37"]==1)
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
//
$blocks = ceil($pages/$page_block);
$block = ceil($page/$page_block);
$page_s = $page_block * ($block-1);
$page_e = $page_block * $block;
if($blocks <= $block) $page_e = $pages;


   echo("<table width='767' border='0'>
      <tr>
         <td height='20' align='center'>");
         if ($block>1)
         {
            $tmp1 = $page_s;
            echo("<a href='product.php?menu=$menu&sort=$sort&page=$page'>
                  <img src = 'images/i_prev.gif' align='absmiddle' border='0'>
                 </a>&nbsp");
         }
         for($i=$page_s+1;$i<=$page_e;$i++)
         {
            if($page==$i)
               echo("<font color='red'><b>$i</b></font>&nbsp");
            else
               echo("<a href='product.php?page=$i&menu=$menu&sort=$sort'>[$i]</a>&nbsp");
         }
         if($block<$blocks)
         {
            $tmp1 = $page_e+1;
            echo("&nbsp<a href='product.php?page=$tmp1&menu=$menu&sort=$sort'>
                  <img src='images/i_next.gif' align='absmiddle' border='0'></a>");
         }

         echo("   </td>
               </tr>
               </table>");


?>
<!-- /////////////////////////// -->
<!-------------------------------------------------------------------------------------------->
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->
<?php include "main_bottom.php"; ?>
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