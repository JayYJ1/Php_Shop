<?php
include "../common.php";
  $no1=$_REQUEST['no1'];
  $no2=$_REQUEST['no2'];
  $name=$_REQUEST['name'];
  $query="insert into opts (opt_no37, name37) values('$no1', '$name');";
  $result=mysqli_query($db,$query);
  if(!$result)exit("에러:$query");

  echo"<script>location.href='opts.php?no1=$no1';</script>";
?>
<!-- >