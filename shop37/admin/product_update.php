<?php
   include "../common.php";
   $text1=$_REQUEST['text1'];
   $sel1=$_REQUEST['sel1'];
   $sel2=$_REQUEST['sel2'];
   $sel3=$_REQUEST['sel3'];
   $sel4=$_REQUEST['sel4'];
   $page=$_REQUEST['page'];

	$no=$_REQUEST['no'];
	$menu=$_REQUEST['menu'];
	$code=$_REQUEST['code'];
	$name=$_REQUEST['name'];
	$coname=$_REQUEST['coname'];
	$price=$_REQUEST['price'];
	$discount=$_REQUEST['discount'];
	$contents = $_REQUEST['contents'];
	$opt1=$_REQUEST['opt1'];
	$opt2=$_REQUEST['opt2'];
	$status=$_REQUEST['status'];
	$regday1=$_REQUEST['regday1'];
	$regday2=$_REQUEST['regday2'];
	$regday3=$_REQUEST['regday3'];
	$imagename1=$_REQUEST['imagename1'];
	$imagename2=$_REQUEST['imagename2'];
	$imagename3=$_REQUEST['imagename3'];
	


	$checkno1=$_REQUEST['checkno1'];//1,2,3 이거만하면되네요
	$checkno2=$_REQUEST['checkno2'];
	$checkno3=$_REQUEST['checkno3'];
	
	$contents = stripslashes($contents);
	$name = stripslashes($name);
	$icon_new=$_REQUEST['icon_new'];
	$icon_hit=$_REQUEST['icon_hit'];
	$icon_sale=$_REQUEST['icon_sale'];

	if($icon_new) $icon_new=1; else $icon_new=0;
	if($icon_hit) $icon_hit=1; else $icon_hit=0;
	if($icon_sale) $icon_sale=1; else $icon_sale=0;

	$contents = addslashes($contents);
	$name = addslashes($name);
	$regday = sprintf("%-4s%-2s%-2s", $regday1, $regday2, $regday3);
	
	$fname1=$imagename1;
	if ($checkno1=="1") $fname1=""; 
	if ($_FILES["image1"]["error"]==0)      // 선택한 파일이 있는지 조사
  {
      $fname1=$_FILES["image1"]["name"];
       if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
          "../product/" . $fname1)) exit("업로드 실패1");

  }
$fname2=$imagename2;
if ($checkno2=="1") $fname2=""; 
  if ($_FILES["image2"]["error"]==0)      // 선택한 파일이 있는지 조사
  {
      $fname2=$_FILES["image2"]["name"];
       if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
          "../product/" . $fname2)) exit("업로드 실패2");

  }
  $fname3=$imagename3;
if ($checkno3=="1") $fname3="";
  if ($_FILES["image3"]["error"]==0)      // 선택한 파일이 있는지 조사
  {
      $fname3=$_FILES["image3"]["name"];
       if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
          "../product/" . $fname3)) exit("업로드 실패3");

  }
  


	$query = "update  product set menu37=$menu, code37='$code', name37='$name', coname37='$coname', price37=$price, opt1_37=$opt1, opt2_37=$opt2, contents37='$contents', status37=$status, regday37='$regday', icon_new37=$icon_new, icon_hit37=$icon_hit, icon_sale37=$icon_sale, discount37=$discount, image1_37='$fname1', image2_37='$fname2', image3_37='$fname3' where no37=$no;";
	$result=mysqli_query($db,$query);
	if(!$result)exit("에러:$query");
	
	echo("<script>location.href='product.php?sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page'</script>");
?>
