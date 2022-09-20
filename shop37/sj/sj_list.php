<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	ini_set("display_errors",1);
?>
<?
	include "common.php";
	$text1=$_REQUEST[text1];
	$page=$_REQUEST[page];
?>

<html>
<head>
	<title>성적처리 프로그램</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="400" border="0">
	<form name="form1" method="post" action="sj_list.php">
<tr>
<td>
	이름 : <input type="text" name="text1" size="5" value="<?=$text1 ?>">
	<input type="button" value="검색"onClick="javascript:form1.submit();">
</td>
	<td align="right"><a href="sj_new.html">입력</a>&nbsp</td>
</tr>
</form>
</table>

<table width="400" border="1" cellpadding="1" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="100" align="center">이름</td>
    <td width="50"  align="center">국어</td>
    <td width="50"  align="center">영어</td>
    <td width="50"  align="center">수학</td>
    <td width="50"  align="center">총점</td>
    <td width="50"  align="center">평균</td>
	<td width="50"  align="center">삭제</td>
  </tr>
  <?
  if(!$text1)
	    $query="select*from sj order by name37;";  //sql정의
	else
		$query="select*from sj where name37 like '%$text1%' order by name37;";

    $result=mysqli_query($db,$query);	//sql실행
	if(!$result)exit("에러: $query"); //에러조사

	$count=mysqli_num_rows($result); //레코드 개수
	$page=$_REQUEST[page];
	if(!$page) $page=1;
	$pages = ceil($count/$page_line); //전체페이지수
	$first=1;
	if($count>0) $first=$page_line*($page-1); //현재페이지 row위치
	$page_last=$count-$first;
	if($page_last>$page_line) $page_last=$page_line; //현재 페이지 라인 수

		if($count>0) mysqli_data_seek($result,$first); //현재 페이지 첫줄로 이동

	for($i=0;$i<$page_last; $i++)
	{
		$row=mysqli_fetch_array($result);  //레코드읽기

		$avg=sprintf("%6.1f",$row[avg37]);

		echo("<tr bgcolor='lightyellow'>
			  <td align='center'>
			    <a href='sj_edit.php?no=$row[no37]'>$row[name37]
				</a>
		      </td>
		      <td width='50'  align='right'>$row[kor37]</td>
		      <td width='50'  align='right'>$row[eng37]</td>
		      <td width='50'  align='right'>$row[mat37]</td>
		      <td width='50'  align='right'>$row[hap37]</td>
		      <td width='50'  align='right'>$avg</td>
			  <td align='center'>
			     <a href='sj_delete.php?no=$row[no37]'
			        onClick='javascript:return confirm(\"삭제할까요 ?\");'>
				  삭제
			     </a>
			  </td>

		      </tr>");
	}
	
	echo("<table width='400' border='0' cellspacing='0' cellpadding='0'>
		  <tr>
		   <td height='20' align='center'>");
	$blocks =ceil($pages/$page_block); //전체블록수
	$block= ceil($page/$page_block);  //현재 블록
	$page_s=$page_block*($block-1);   //현재 페이지
	$page_e=$page_block*$block;         //마지막페이지
	if($blocks <= $block) $page_e=$pages; 
		   if($block>1)//이전블록으로
		   {
			   $tmp = $page_s;
			   echo("<a href='sj_list.php?page=$tmp&text1=$text1'>
				<img src='images/i_prev.gif' align='absmiddle' border='0'>
				</a>&nbsp");
		   }
	for($i=$page_s+1; $i<=$page_e; $i++) //현재 블록의 페이지
	{
	 if($page==$i)
		 echo("<b>$i</b></font color='red'>&nbsp");
	 else
		 echo("<a href='sj_list.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}
	if($block< $blocks) //다음블록으로
    {
      $tmp = $page_e+1;
    echo("<a href='sj_list.php?page=$tmp&text1=$text1'>    
		 <img src='images/i_next.gif' align='absmiddle' border='0'> 
                </a>");
    }
	echo("</td>
		</tr>
		</table>");
	?>
</table>
</body>
</html>
