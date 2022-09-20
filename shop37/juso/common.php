
<?
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	ini_set("display_errors",1);

	$page_line=5; //페이지당 라인수
	$page_block=5; ;//블록당 페이지수
	$db=mysqli_connect("localhost","shop37","1234","shop37");
	if(!$db)exit("DB연결에러");
	
?>