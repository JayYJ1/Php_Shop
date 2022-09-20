<?php
include "common.php";
$uid=$_REQUEST["uid"];
$pwd=$_REQUEST["pwd"];
$query="select no37, name37 from member where uid37='$uid' and pwd37='$pwd'";
$result=mysqli_query($db,$query);	//sql실행
if(!$result)exit("에러: $query"); //에러조사
$count=mysqli_num_rows($result); //레코드 개수
if ($count>0) {
   #고객의 번호와 이름을 cookie로 저장(cookie_no, cookie_name)
   $row = mysqli_fetch_array($result); //레코드 읽기
   $cookie_no=$row["no37"];
   $cookie_name=$row["name37"];
   setcookie("cookie_no",$cookie_no); 
   setcookie("cookie_name",$cookie_name);
   echo("<script>location.href='index.html'</script>");
    }
else
     echo("<script>location.href='member_login.php'</script>");
?>