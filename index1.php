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
<body>



	<nav class="navbar ">
		<div class="container-fluid about">
			<a class="navbar-brand" href="About_us.php"> About us</a>
		</div>
	</nav>

	<div class="col-md-3"></div>
	<div class="col-md-6 well " style="margin:40px">
		<h3 class="text-primary" style="text-align:center">Coupon Code</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_coupon"><span class="glyphicon glyphicon-plus"></span> Generate Coupon</button>
		<br />
		<?php
			require 'config.php';
			$query = mysqli_query($conn, "SELECT * FROM `product`") or die(mysqli_error());
			while($fetch = mysqli_fetch_array($query)){
		?>
			<div class="col-md-3" style="border:1px solid #ccc; padding:10px; margin:23px; height:auto;">
				<img src="<?php echo $fetch['product_image']?>" width="100%"/>
				<center><h5><?php echo $fetch['product_name']?></h5></center>
				<center><h5>&#8369;<?php echo number_format($fetch['product_price'])?></h5></center>
				<br />
				<center><a href="purchase.php?product_id=<?php echo $fetch['product_id']?>" class="btn btn-primary"> Find</a></center>
			</div>
		<?php		
			}
		?>
	</div>
	<div class="modal fade" id="form_coupon" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<form action="save_coupon.php" method="POST">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Coupon Code</label>
								<input type="text" class="form-control" name="coupon" id="coupon" readonly="readonly" required="required"/>
								<br />
								<button id="generate" class="btn btn-success" type="button"><span class="glyphicon glyphicon-random"></span> Generate</button>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#generate').on('click', function(){
			$.get("get_coupon.php", function(data){
				$('#coupon').val(data);
			});
		});
	});
</script>
</body>
</html>