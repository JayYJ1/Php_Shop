<?php
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	ini_set("display_errors",1);
	
	$page_line=5; //페이지당 라인수
	$page_block=5; ;//블록당 페이지수
	
	$admin_id="admin";//관리자 아이디
	$admin_pw="1234";//관리자 비번
	
	$a_idname=array("전체","이름","ID"); //회원목록관리 검색
	$n_idname=count($a_idname);
	
	$a_menu=array("분류선택","보충제","운동기구","운동장비","건강식품");//상품 메뉴
	$n_menu=count($a_menu);
	
	$a_status=array("상품상태","판매중","판매중지","품절");
	$n_status=count($a_status);

	$a_icon=array("아이콘","New","Hit","Sale");
	$n_icon=count($a_icon);

	$a_text1=array("","제품이름","제품번호");   // for문의 $i는 1부터 시작
	$n_text1=count($a_text1);
	
	$baesongbi=2500;
	$max_baesongbi=100000;

		$a_state=array("전체", "주문신청", "주문확인", "입금확인", "배송중", "주문완료", "주문취소");
	$n_state=count($a_state);


	$a_name=array("","주문번호","고객명", "상품명");
	$n_name=count($a_name);

	$db=mysqli_connect("localhost","shop37","1234","shop37");
	if(!$db)exit("DB연결에러");
	
?>