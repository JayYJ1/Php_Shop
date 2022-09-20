<?php
	include "common.php";
	$cookie_no=$_COOKIE['cookie_no'];
	$o_no=$_REQUEST['o_no'];
	$o_name=$_REQUEST['o_name'];
	$o_tel=$_REQUEST['o_tel'];
	$o_phone=$_REQUEST['o_phone'];
	$o_email=$_REQUEST['o_email'];
	$o_zip=$_REQUEST['o_zip'];
	$o_juso=$_REQUEST['o_juso'];
	$r_name=$_REQUEST['r_name'];
	$r_tel=$_REQUEST['r_tel'];
	$r_phone=$_REQUEST['r_phone'];
	$r_email=$_REQUEST['r_email'];
	$r_zip=$_REQUEST['r_zip'];
	$r_juso=$_REQUEST['r_juso'];
	$memo=$_REQUEST['memo'];
	$cart=$_COOKIE['cart'];
	$n_cart=$_COOKIE['n_cart'];
	$pay_method=$_REQUEST['pay_method'];
	$card_kind=$_REQUEST['card_kind'];
	$card_halbu=$_REQUEST['card_halbu'];	
	$bank_kind=$_REQUEST['bank_kind'];
	$bank_sender=$_REQUEST['bank_sender'];
	$product_nums=0;
	$product_names="";
	$total_cash=0;

	$query="select no37 from jumun where jumunday37=curdate() order by no37 desc";
	$result=mysqli_query($db,$query);
	$row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	$jumun_no=$row['no37'];
	$jumun_no=substr("$jumun_no",-4);
	
	if($count>0){
		$jumun_no=date("ymd").$jumun_no+1;
	}
	else{
		$jumun_no=date("ymd")."0001";
	}
	$jumunday=substr("$jumun_no",0,6);

	for($i=1;$i<=$n_cart;$i++){
			if($cart[$i]){
			list($no, $num, $opts1, $opts2)=explode("^", $cart[$i]);
			$query="select *from product where no37=$no";
			$result=mysqli_query($db,$query);
			$row=mysqli_fetch_array($result);
			$cash = round($row['price37']*(100-$row['discount37'])/100,-3);
			$query="insert into jumuns (jumun_no37, product_no37, num37, price37, cash37, discount37, opts_no1, opts_no2)
								values ('$jumun_no', $no, $num, $row[price37], $cash, $row[discount37], $opts1, $opts2);";
	
			$result=mysqli_query($db,$query);
			if (!$result) exit("에러: $query");
			
			setcookie("cart[$i]",null);

			$total_cash=$total_cash+($cash*$num);
			$product_nums=$product_nums+1;
			if($product_nums==1)$product_names=$row['name37'];
		}
	}
	$n_cart = 0;
	setcookie("n_cart",$n_cart);

	if($product_nums>1){
		$tmp=$product_nums;
		$tmp=$tmp-1;
		$product_names=$product_names." 외 ".$tmp;
	}

	if($total_cash<$max_baesongbi){
		$query="insert into jumuns (jumun_no37, product_no37, num37, price37, cash37, discount37, opts_no1, opts_no2)
								values ($jumun_no, 0, 1, $baesongbi, $baesongbi, 0, 0, 0);";
		$result=mysqli_query($db,$query);
		if (!$result) exit("에러: $query");
		$total_cash=$total_cash+$baesongbi;
	}

	if($cookie_no) $member_no=$cookie_no;
	else $member_no=0;

	$query="insert into jumun (no37, member_no37, jumunday37, product_names37, product_nums37, o_name37, o_tel37, o_phone37, o_email37, o_zip37, o_juso37, r_name37, r_tel37, r_phone37, r_email37, r_zip37, r_juso37, memo37, pay_method37, card_okno37, card_halbu37, card_kind37, bank_kind37, bank_sender37, total_cash37, state37)
								values ('$jumun_no', $member_no, '$jumunday', '$product_names', $product_nums, '$o_name', '$o_tel', '$o_phone', '$o_email', '$o_zip', '$o_juso', '$r_name', '$r_tel', '$r_phone', '$r_email', '$r_zip', '$r_juso', '$memo', $pay_method, '123456789', $card_halbu, $card_kind, $bank_kind, '$bank_sender', $total_cash, 1);";
	
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $query");

	echo("<script>location.href='order_ok.php'</script>");
?>