<?php
include "../common.php";

$no1=$_REQUEST['no1'];
$no2=$_REQUEST['no2'];
$name=$_REQUEST['name'];
$query="update opts set name37='$name' where no37=$no2;";
  $result=mysqli_query($db,$query);
  if(!$result)exit("에러:$query");

  echo("<script>location.href='opts.php?no1=$no1&no2=$no2'</script>");
?>