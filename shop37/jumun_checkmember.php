<?php
	include "common.php";

	$uid = $_REQUEST['uid'];
	$pwd = $_REQUEST['pwd'];

	$query="select no37, name37 from member where uid37='$uid' and pwd37='$pwd';";
	$result=mysqli_query($db,$query);
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	if($count>0)
	{
	setcookie("cookie_no",$row['no37']);
	setcookie("cookie_name",$row['name37']);
	echo("<script>location.href='jumun.php'</script>");
	}
	else echo("<script>location.href='jumun_login.php'</script>");
?>
