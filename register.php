
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" href="login.css" >
	
</head>
<body >
 
<div class="container">
<?php
session_start();
if(isset($_SESSION['login_id'])){
  if (isset($_SESSION['pageStore'])) {
      $pageStore = $_SESSION['pageStore'];
header("location: $pageStore"); 
    }
}
if (isset($_POST['signUp'])) {
if (empty($_POST['fullName']) || empty($_POST['email']) || empty($_POST['newPassword'])) {
echo "Please fill up all the required field.";
}
else
{

$fullName = $_POST['fullName'];
$email = $_POST['email'];
$password = $_POST['newPassword'];
$hash = password_hash($password, PASSWORD_DEFAULT);

include('config.php');

$sQuery = "SELECT id from account where email=? LIMIT 1";
$iQuery = "INSERT Into account (fullName, email, password) values(?, ?, ?)";


$stmt = $conn->prepare($sQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($id);
$stmt->store_result();
$rnum = $stmt->num_rows;

if($rnum==0) { 
          $stmt->close();
          
          $stmt = $conn->prepare($iQuery);
    	  $stmt->bind_param("sss", $fullName, $email, $hash);
          if($stmt->execute()) {
		echo '<div style="color:green;font-size: 20px;padding:20px "><center>Register successfully</center></div>';
	
	}
        } else { 
       echo '<div style="color:red;font-size: 20px;padding:20px "> <center>email already register</center></div>';
     }
$stmt->close();
$conn->close(); 
}
}

?>
<div class="header">
    <h1>Sign Up</h1>
</div>
	 <form method="post" class="form" oninput='validatePassword()'  >

     <div class="form-group" >
	  <label >Full Name</label>
	  <input type="text" name="fullName" class="form-input" required>
	 </div>
		
	 <div class="form-group">					
	  <label >Email</label>
	  <input type="email" name="email" class="form-input" required >
	 </div>
		
	 <div class="form-group">					
	  <label >Password</label>
	  <input type="password" name="newPassword" id="newPass" class="form-input" required>
     </div>

     <div class="form-group">
	  <label >Conform password</label>
	  <input type="password" name="conformpassword" id="conformPass" class="form-input" required>
     </div>

	  <button class="form-btn" name="signUp" >Sign Up
	  </button>

	  <div class="text-foot">
	   Already have an account? <a href="login.php" >Login</a>
	  </div>
	 
	 </form>
	</div>
   </div>
  </div>
 </div>

	<script>
		function validatePassword(){
  if(newPass.value != conformPass.value) {
    conformPass.setCustomValidity('Passwords do not match.');
  } else {
    conformPass.setCustomValidity('');
  }
}

	</script>
	
</body>
</html>