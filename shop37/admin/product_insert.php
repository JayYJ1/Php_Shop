<?php
	include "../common.php";
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
	$image1=$_REQUEST['image1'];
	$image2=$_REQUEST['image2'];
	$image3=$_REQUEST['image3'];
	
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


	if ($_FILES["image1"]["error"]==0)      // 선택한 파일이 있는지 조사
  {
      $fname1=$_FILES["image1"]["name"];
       if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
          "../product/" . $fname1)) exit("업로드 실패");

  }
  if ($_FILES["image2"]["error"]==0)      // 선택한 파일이 있는지 조사
  {
      $fname2=$_FILES["image2"]["name"];
       if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
          "../product/" . $fname2)) exit("업로드 실패");

  }

  if ($_FILES["image3"]["error"]==0)      // 선택한 파일이 있는지 조사
  {
      $fname3=$_FILES["image3"]["name"];
       if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
          "../product/" . $fname3)) exit("업로드 실패");

  }
  


	$query = "insert into product (menu37, code37, name37, coname37, price37, opt1_37, opt2_37, contents37, status37, regday37, icon_new37, icon_hit37, icon_sale37, discount37, image1_37, image2_37, image3_37) values ('$menu', '$code', '$name', '$coname', '$price', '$opt1', '$opt2', '$contents', '$status', '$regday', '$icon_new', '$icon_hit', '$icon_sale', '$discount', '$fname1','$fname2','$fname3');";
	$result=mysqli_query($db,$query);
	if(!$result)exit("에러:$query");
	
	echo("<script>location.href='product.php'</script>");
?>
