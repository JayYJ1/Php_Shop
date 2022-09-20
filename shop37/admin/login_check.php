<?php
include "../common.php"; //$admin_id="admin", common.php���� ������ �� 
$adminid=$_REQUEST['adminid'];//login.html���� ������ ��
$adminpw=$_REQUEST['adminpw']; 
 if ($adminid == $admin_id && $adminpw == $admin_pw) { //login.html���� �Է��� ���� == common.php�� admin����
	#  $cookie_admin_id=$admin_id;
	#  $cookie_admin_pw=$admin_pw;
	# setcookie("cookie_admin_id","yes");
	# setcookie("cookie_admin_pw","yes");
	setcookie("cookie_admin","yes");
	 echo("<script>location.href='member.php'</script>");
   #$cookie_admin������ "yes"�� ��Ű ����.
  # member.html�� �̵�.   
  }
else {
#   $cookie_admin���� ����.
 #  index.html�� �̵�.   
 	# setcookie("cookie_admin_id","");
	# setcookie("cookie_admin_pw","");
	setcookie("cookie_admin","");
 echo("<script>location.href='index.html'</script>");
 }
?> 

<!-- 
common.php�� admin_id�� admin_pw�� �����Ͽ���
login.html�� aminid�� adminpw�� �����Ͽ���
include�� admin_id�� admin_pw ���� �ҷ���
$adminid=$_REQUEST[adminid];, $adminpw=$_REQUEST[adminpw];
����� adminid,adminpw ���� �ҷ���
 if ($adminid == $admin_id && $adminpw == $admin_pw)
login.html���� �Է��� ���� == common.php�� admin����
cookie ���� �������� ���� ����(?)$cookie_admin_id=$admin_id;,$cookie_admin_pw=$admin_pw;
-->

<!--
include "../common.php";
$adminid=$_REQUEST[adminid];//�Է� ���� ����
$adminpw=$_REQUEST[adminpw];

 if ($adminid == $admin_id && $adminpw == $admin_pw) { //�Է°��������� ����Ȱ������� �� ������ 
	 setcookie("cookie_admin","yes"); //yes���� ���� cookie_admin �̶�� ��Ű ����!(����?)
	 echo("<script>location.href='member.html'</script>");  //member.html�� �̵�
  }
else {  //����� ���������� �Էµ� ���� ������ �ٸ��� 
 	 setcookie("cookie_admin",""); //cookie_admin�� ���� null�� ����
 echo("<script>location.href='index.html'</script>");//�̵�
 }
-->

