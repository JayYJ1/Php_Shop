<?
  include "common.php";

  $no=$_REQUEST[no];
  $name=$_REQUEST[name];
  $tel1=$_REQUEST[tel1];
  $tel2=$_REQUEST[tel2];
  $tel3=$_REQUEST[tel3];//tel 합치기
  $sm=$_REQUEST[sm]; //sm 음양 출력
  $birthday1=$_REQUEST[birthday1];
  $birthday2=$_REQUEST[birthday2];
  $birthday3=$_REQUEST[birthday3];
  $juso=$_REQUEST[juso];
  $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);     
  $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

  $query="update juso set name37='$name', tel37='$tel',sm37=$sm, birthday37='$birthday', juso37='$juso' where no37=$no;";
  $result=mysqli_query($db,$query);
  if(!$result)exit("에러:query");

  echo("<script>location.href='juso_list.php'</script>");
?>

