<?
  include "common.php";

  $name=$_REQUEST[name];
  $kor=$_REQUEST[kor];
  $eng=$_REQUEST[eng];
  $mat=$_REQUEST[mat];
  $hap=$_REQUEST[hap];
  $avg=$_REQUEST[avg];

  $query="insert into sj (name37, kor37, eng37, mat37, hap37, avg37)
		   values('$name',$kor,$eng,$mat,$hap,$avg);";
  $result=mysqli_query($db,$query);
  if(!$result)exit("에러:query");

  echo("<script>location.href='sj_list.php'</script>");
?>