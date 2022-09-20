<?php
	include "common.php";
	$no=$_REQUEST['no'];
	$opts1=$_REQUEST['opts1'];
	$opts2=$_REQUEST['opts2'];
	$num=$_REQUEST['num'];
	$num1=$_REQUEST['num'];
	$pos=$_REQUEST['pos'];
	$cart=$_COOKIE['cart'];
	$n_cart=$_COOKIE['n_cart'];
	$kind=$_REQUEST['kind'];
	if(!$n_cart) $n_cart=0;
	switch($kind)
	{
		case "insert":
			$n_cart++;
			$cart[$n_cart]=implode("^",array($no, $num, $opts1, $opts2));
			setcookie("cart[$n_cart]",$cart[$n_cart]);
			setcookie("n_cart",$n_cart);
			break;
		case "order":
			$n_cart++;
			$cart[$n_cart]=implode("^",array($no, $num, $opts1, $opts2));
			setcookie("cart[$n_cart]",$cart[$n_cart]);
			setcookie("n_cart",$n_cart);
			break;
		case "delete":
			setcookie("cart[$pos]",null);
			break;
		case "update":
			list($no, $num, $opst1, $opts2)=explode("^", $cart[$pos]);
			$cart[$pos]=implode("^",array($no, $num1, $opst1, $opts2));
			setcookie("cart[$pos]",$cart[$pos]);
			break;
		case "deleteall":
			for($i=1;$i<=$n_cart;$i++){
				if($cart[$i]) setcookie("cart[$i]",null);
			}
			$n_cart=0;
			setcookie("n_cart",$n_cart);
			break;
	}
	if($kind=="order")
	echo("<script>location.href='order.php'</script>");
	else
	echo("<script>location.href='cart.php'</script>");
?>