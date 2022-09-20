
<?php
   if(!$menu) $menu = 0; 


echo("<table width='959' height='25' border='0' cellspacing='0' cellpadding='0' align='center'>
   <tr>
      <td align='center' bgcolor='#F7F7F7'>
         <table border='0' cellspacing='0' cellpadding='0'>
            <tr>
               <td><a href='product.php?menu=1'><img src='images/top2_1.gif' width='150' height='30' border='2'   onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a></td>
               <td><a href='product.php?menu=2'><img src='images/top3_1.gif' width='150' height='30' border='2'  onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a></td>
               <td><a href='product.php?menu=3'><img src='images/top4_1.gif' width='150' height='30' border='2'  onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a></td>
               <td><a href='product.php?menu=4'><img src='images/top1_1.gif' width='150' height='30' border='2'  onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a></td>
               <td><a href='product.php?menu=5'><img src='images/top5_1.gif' width='150' height='30' border='2'  onmouseenter='zoomIn(event)' onmouseleave='zoomOut(event)'></a></td>
               
               
            </tr>
         </table>
      </td>
   </tr>
</table>");
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