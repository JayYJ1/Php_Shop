<!-------------------------------------------------------------------------------------------->
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->
<?php
   include"common.php";
   $text1=$_REQUEST['text1']; 
   $page=$_REQUEST['page'];
   $sel1=$_REQUEST['sel1']; // << sel1이란 변수에 sel1의 값을 받아옴 
  
?>

<html>
<head>
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>
<br>
<script> document.write(menu());</script>

<?php
   if (!$text1&&!$sel1)
      $query="select * from member order by name37;";
   else
    if ($sel1==1)
          $query="select * from member where name37 like '%$text1%' order by name37;";
    else
          $query="select * from member where uid37 like '%$text1%' order by uid37;";


          $result=mysqli_query($db,$query); //sql 실행
          if(!$result) exit("에러: $query");  //에러조사
          $count=mysqli_num_rows($result); //레코드개수

 ?>

<table width="800" border="0">
   <form name="form1" method="post" action="member.php">
   <tr height="40">
      <td width="200" valign="bottom">&nbsp 회원수 : <font color="#FF0000"><?=$count;?></font></td>
      <td width="540" align="right" valign="bottom">


<?php
         echo("<select name='sel1'>");
               for ($i=1; $i<$n_idname; $i++)
               {
                  if ($sel1==$i)
                      echo("<option value='$i' selected>$a_idname[$i]</option>");
                  else
                      echo("<option value='$i'>$a_idname[$i]</option>");
               }
         echo("</select>");

?>

         <input type="text" name="text1" size="15" value="<?=$text1 ?>" class="font9">&nbsp
      </td>
      <td width="60" valign="bottom">
         <input type="button" value="검색" onclick="javascript:form1.submit();">&nbsp
      </td>
   </tr>
   </form>
</table>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
   <tr bgcolor="#CCCCCC" height="23">
      <td width="100" align="center">ID</td>
      <td width="100" align="center">이름</td>
      <td width="100" align="center">전화</td>
      <td width="100" align="center">핸드폰</td>
      <td width="200" align="center">E-Mail</td>
      <td width="100" align="center">회원구분</td>
      <td width="100" align="center">수정/삭제</td>
   </tr>
<?php
if (!$page) $page=1;
$pages = ceil($count/$page_line); //전체 페이지 수
$first = 1;
if($count>0) $first = $page_line*($page-1);   //현재 페이지 row 위치
$page_last=$count-$first;
if ($page_last>$page_line) $page_last=$page_line;   //현재 페이지 line수

if ($count>0) mysqli_data_seek($result,$first);   //현재 페이지 첫줄로 이동

   for($i=0; $i<$page_last; $i++)
   {
      $row=mysqli_fetch_array($result); //1레코드 읽기

      if ($row['gubun37']==0)  $gubun="회원";  else   $gubun="탈퇴";
          $tel1=trim(substr($row['tel37'],0,3));        // 0번 위치에서 3자리 문자열 추출
          $tel2=trim(substr($row['tel37'],3,4));        // 3번 위치에서 4자리
          $tel3=trim(substr($row['tel37'],7,4));        // 7번 위치에서 4자리
             $tel = $tel1 . "-". $tel2 . "-" . $tel3;

             $phone1=trim(substr($row['phone37'],0,3));        // 0번 위치에서 3자리 문자열 추출
             $phone2=trim(substr($row['phone37'],3,4));        // 3번 위치에서 4자리
             $phone3=trim(substr($row['phone37'],7,4));        // 7번 위치에서 4자리
                $phone = $phone1 . "-" . $phone2 . "-" . $phone3;


       echo("   <tr bgcolor=''#F2F2F2' height='23'>
             <td width='100'>&nbsp $row[uid37]</td>
             <td width='100'>&nbsp $row[name37]</td>
             <td width='100'>&nbsp $tel</td>
             <td width='100'>&nbsp $phone</td>
             <td width='200'>&nbsp $row[email37]</td>
             <td width='100' align='center'>$gubun</td>
             <td width='100' align='center'>
                <a href='member_edit.php?no=$row[no37]'>수정</a>/
                <a href='member_delete.php?no=$row[no37]' onclick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
             </td>
          </tr>");
      }

      $blocks = ceil($pages/$page_block); //전체 블록수
      $block = ceil($page/$page_block);   //현재 블록
      $page_s = $page_block*($block-1);   //현재 페이지
      $page_e = $page_block*$block;   //마지막 페이지
      if($blocks <= $block) $page_e=$pages;

         echo("<table width='600' border='0' cellspacing='0' cellpadding='0'>
               <tr>
                  <td height='20' align='center'>");


   if ($block > 1)   //이전 블록으로
   {
      $tmp = $page_s;
      echo("<a href='member.php?page=$tmp&sel1=$sel1&text1=$text1'>
            <img src='images/i_prev.gif' align='absmiddle' border='0'>
            </a>&nbsp");
   }

   for($i=$page_s+1;$i<=$page_e;$i++)   //현재 블록 페이지
   {
      if($page == $i)
         echo("<font color='red'><b>$i</b></font>&nbsp");
      else
         echo("<a href='member.php?page=$i&sel1=$sel1&text1=$text1'>[$i]</a>&nbsp");
   }

   if($block < $blocks)   //다음 블록으로
   {
      $tmp = $page_e+1;
      echo("&nbsp<a href='member.php?page=$tmp&sel1=$sel1&text1=$text1'>
            <img src='images/i_next.gif' align='absmiddle' border='0'>
            </a>");
   }

   echo("   </td>
         </tr>
         </table>");
         ?>
</table>
</center>
</body>
</html>