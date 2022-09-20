<?php
  include "common.php";
  $no=$_REQUEST['no'];
  #$uid=$_REQUEST[uid];
  $pwd=$_REQUEST['pwd'];
  $pwd1=$_REQUEST['pwd1'];
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
  $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);     
  $phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
  $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);
  $cookie_no=$_COOKIE['cookie_no'];
  $cookie_name=$_COOKIE['cookie_name'];

if(!$pwd1){// 변경 X
 $query=" update member set name37='$name', birthday37='$birthday', sm37=$sm, phone37='$phone',tel37='$tel', email37='$email', zip37='$zip', juso37='$juso' where no37=$cookie_no;";
 //  $result=mysqli_query($db,$query);
   $result=mysqli_query($db,$query) or die(mysqli_error($db));
  if(!$result)exit("에러:$query");
// $count=mysqli_num_rows($result); //레코드 개수
}else{ //변경 pwd1로
  $query=" update member set pwd37='$pwd1',name37='$name', birthday37='$birthday', sm37=$sm, phone37='$phone',tel37='$tel', email37='$email', zip37='$zip', juso37='$juso' where no37=$cookie_no;";
 $result=mysqli_query($db,$query) or die(mysqli_error($db));
  //if(!$result)die("에러:$query");
  //$count=mysqli_num_rows($result); //레코드 개수
  //if(!$result || mysqli_num_rows($result)==0);
}
setcookie("cookie_name",$name);
  echo"<script>location.href='member_edit.php';</script>";
?>

