<?php
	require_once 'config.php';
	$coupon_code = $_POST['coupon'];
	$price = $_POST['price'];
	
	$query = mysqli_query($conn, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code' && `status` = 'Valid'") or die(mysqli_error());
	$count = mysqli_num_rows($query);
	$fetch = mysqli_fetch_array($query);
	$array = array();
	if($count > 0){
		if($price>1000)
{
		$discount=5/100;
		$total=$discount* $price;
		$array['discount'] = 5;
		$array['price'] = $price - $total;
		echo json_encode($array);
	}
	else if($price>2000){
		$discount=8/100;
		$total=$discount* $price;
		$array['discount'] = 8;
		$array['price'] = $price - $total;
		echo json_encode($array);
	}
	else if($price>5000){
		$discount=10/100;
		$total=$discount* $price;
		$array['discount'] = 10;
		$array['price'] = $price - $total;
		echo json_encode($array);
	}
	else if($price>10000){
		$discount=15/100;
		$total=$discount* $price;
		$array['discount'] = 15;
		$array['price'] = $price - $total;
		echo json_encode($array);
	}
	else if($price>50000){
		$discount=20/100;
		$total=$discount* $price;
		$array['discount'] = 20;
		$array['price'] = $price - $total;
		echo json_encode($array);
	}
	else{
		echo "according to company";
	}
		
	}else{
		echo "error";
	}
?>