<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	</head>
	<style>
	.about a{
		color:white;
		background:black;
		margin:15px;
	}

	</style>
<body >
	<nav class="navbar">
		<div class="container-fluid about">
		<a class="navbar-brand" href="About_us.php"> About us</a>
		</div>
	</nav>
	
	<div class="col-md-3"></div>
	<div class="col-md-6 well style="margin:40px">
		<h3 class="text-primary"  style="text-align:center">New Coupon Code</h3>
		
		<a href="index1.php" class="btn btn-primary">Back</a>
		<br />
		<h2  style="text-align:center"> Product</h2>
		<?php
			require 'config.php';
			$query = mysqli_query($conn, "SELECT * FROM `product` WHERE `product_id` = '$_REQUEST[product_id]'") or die(mysqli_error());
			$fetch = mysqli_fetch_array($query);
		?>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<img src="<?php echo $fetch['product_image']?>" width="100%" height="300px"/>
			<center><h3><?php echo $fetch['product_name']?></h3></center>
			<center><h4>&#8369;<?php echo number_format($fetch['product_price'])?></h4></center>
			<div class="form-group">
				<h4 class="text-warning"></h4>
				<label>Coupon Code</label>
				<input class="form-control" type="text" id="coupon"/>
				<input type="hidden" value="<?php echo $fetch['product_price']?>" id="price"/>
				<div id="result"></div>
				<br style="clear:both;"/>
				<button class="btn btn-primary" id="activate">Enter Code</button>
			</div>
			<div class="form-group">
				<label>Total Price</label>
				<input class="form-control" type="number" value="<?php echo $fetch['product_price']?>" id="total" readonly="readonly" lang="en-150"/>
			</div>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
	$(document).ready(function(){
		$('#activate').on('click', function(){
			var coupon = $('#coupon').val();
			var price = $('#price').val();
			if(coupon == ""){
				alert("Please enter a coupon code!");
			}else{
				$.post('get_discount.php', {coupon: coupon, price: price}, function(data){
					if(data == "error"){
						alert("Invalid Coupon Code!");
						$('#total').val(price);
						$('#result').html('');
					}else{
						var json = JSON.parse(data);
						$('#result').html("<h4 class='pull-right text-danger'>"+json.discount+"% Off</h4>");
						$('#total').val(json.price);
					}
				});
			}
		});
	});
</script>
</body>
</html>