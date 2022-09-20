<?php
   include "main_top.php"
?>

<!-------------------------------------------------------------------------------------------->   
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->   

<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="/~sale11/my/img/main1.jpg" class="d-block w-100" height="150" alt="First slide">
				</div>
				<div class="carousel-item">
				  <img src="/~sale11/my/img/main2.jpg" class="d-block w-100" height="150" alt="Second slide">
				</div>
				<div class="carousel-item">
				  <img src="/~sale11/my/img/main3.jpg" class="d-block w-100" height="150" alt="Third slide">
				</div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div> -->
         <!---- 화면 우측(신상품) 시작 -------------------------------------------------->   
         <?php

            $query="select *from product where icon_new37=1 and status37=1 order by rand() limit 15";
            $num_col=5; $num_row=3; //column수,row수
            $result=mysqli_query($db, $query);
            $count=mysqli_num_rows($result);
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
                           <font color='red'>$row[discount37]%</font>    <a href='product_detail.php?no=$row[no37]'><font color='444444'>$row[name37]</font></a><br>");
                              if($row['icon_sale37']==1){
                                 echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'>");
                                 }
                              if($row['icon_hit37']==1){
                              echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
                              }
                              if($row['icon_new37']==1){
                              echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
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

         <!---- 화면 우측(신상품) 끝 -------------------------------------------------->   
   
<!-------------------------------------------------------------------------------------------->   
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->   

<?php
   include "main_bottom.php"
?>

 
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
<!-- cordingbroker.tistory.com/63 -->
