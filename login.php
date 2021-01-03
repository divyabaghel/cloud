
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login</title>
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
  if (isset($_POST['signIn'])) {
  if (empty($_POST['email']) || empty($_POST['password'])) {
  echo "Username & Password should not be empty";
  }
  else
  {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  
  include('config.php');
  
  $sQuery = "SELECT id, password from account where email=? LIMIT 1";
  
  
  $stmt = $conn->prepare($sQuery);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($id, $hash);
  $stmt->store_result();
  
  if($stmt->fetch()) { 
    if (password_verify($password, $hash)) {
            $_SESSION['login_id'] = $id;
  
            if (isset($_SESSION['pageStore'])) {
              $pageStore = $_SESSION['pageStore'];
            }
            else {
              $pageStore = "profile.php";
            }
            header("location: $pageStore"); 
            $stmt->close();
            $conn->close();
  
          }
  else {
         echo '<div style="color:red;font-size: 20px;padding:20px "><center>Invalid Username & Password</center></div>';
       }
        } else {
         echo '<div style="color:red;font-size: 20px;padding:20px"><center>Invalid Username & Password</center></div>';
       }
  $stmt->close();
  $conn->close(); 
  }
  }
  ?>
  <div class="header">
    <h1>Login</h1>
</div>
  <form method="post" class="form" >
  
    <div class="form-group">
     <label >Email</label>
     <input type="email" name="email" class="form-input" required>
    </div>
    <div class="form-group ">
     <label >Password</label>
     <input type="password" name="password" class="form-input" required>
    </div>
    <button type="submit" class="form-btn" name="signIn" >Login In
    </button>

    <div class="text-foot" >
    Don't have an account? <a  href="register.php">Sing Up</a>
    </div>
   <!--<a href="index.html" class="btn">Back</a>-->
  </form>
</div>

 </body>
</html>