<?
  include "common.php";

  
  $no=$_REQUEST[no];  
  $name=$_REQUEST[name];
  $kor=$_REQUEST[kor];
  $eng=$_REQUEST[eng];
  $mat=$_REQUEST[mat];
  $hap=$_REQUEST[hap];
  $avg=$_REQUEST[avg];

  $query="update sj set name37='$name', kor37=$kor,
  				eng37=$eng, mat37=$mat, hap37=$hap,
				avg37=$avg where no37=$no;";
  $result=mysqli_query($db,$query);
  if(!$result)exit("에러:query");

  echo("<script>location.href='sj_list.php'</script>");
?>