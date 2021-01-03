<?php
include('session.php');
//$_SESSION['pageStore'] = "profile.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <style >
body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    min-height: 100vh;
    font-family: 'Open Sans',sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color:#f0f0f0;
  font-size:35px; 
  
}
.con{
    width: 400px;
    background-color:white;
    border: 1px solid #BEBEBE;
    border-radius: 10px;
    margin: 30px;
    
    
}
a{
    display:inline-block;
    text-decoration:none;
}
    </style>
</head>
<body >

    <div class="con">
    <?php

if(!isset($_SESSION['login_id'])){
header("location: login.php");
}

echo '<center>Profile
<br> </br>

<p style="color:green">Name</br>' .$session_fullName
.'<br></p>
<a href="index.php"> Home</a></br>
<a href="logout.php" style="color:red;font-size:20px;margin:40px">Logout </a>
</p><center>';

?>
    </div>
</body>
</html>