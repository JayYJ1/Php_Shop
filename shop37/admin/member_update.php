<?php
  include "common.php";
  $text1=$_REQUEST['text1'];
	$sel1=$_REQUEST['sel1'];
	$page=$_REQUEST['page'];
  $no=$_REQUEST['no'];
  $uid=$_REQUEST['uid'];
  $pwd=$_REQUEST['pwd'];
  
  $name=$_REQUEST['name'];
  $birthday1=$_REQUEST['birthday1'];
  $birthday2=$_REQUEST['birthday2'];
  $birthday3=$_REQUEST['birthday3'];
  $sm=$_REQUEST['sm']; //sm 음양 출력
  $phone1=$_REQUEST['phone1'];
  $phone2=$_REQUEST['phone2'];
  $phone3=$_REQUEST['phone3'];
  $tel1=$_REQUEST['tel1'];
  $tel2=$_REQUEST['tel2'];
  $tel3=$_REQUEST['tel3'];//tel 합치기
  $email=$_REQUEST['email'];
  $zip=$_REQUEST['zip'];
  $juso=$_REQUEST['juso'];
  $gubun=$_REQUEST['gubun'];
  $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);     
  $phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
  $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);


 $query="update member set pwd37='$pwd',name37='$name', birthday37='$birthday', sm37=$sm, phone37='$phone',tel37='$tel', email37='$email', zip37='$zip', juso37='$juso', gubun37=$gubun where no37=$no;";
   $result=mysqli_query($db,$query);
  // $result = mysql_query($query,$conn);
if($result>0){
 echo "성공";
}else{
 echo "실패";
}
  if(!$result)exit("에러:$query");
  setcookie("cookie_name",$name);
//setcookie_name= << welcome! 이름 바꾸기!
  echo"<script>location.href='member.php?&page=$page&sel1=$sel1&text1=$text1';</script>";
?>

