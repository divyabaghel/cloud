<?php
include('session.php');
$_SESSION['pageStore'] = "setting.php";

if(!isset($_SESSION['login_id'])){
header("location: login.php");
}
echo '<div style="font-size: 35px;">
<strong>Setting</strong>
<br>'
. $session_fullName
. '<br>
<a href="profile.php">Profile</a>
<a href="logout.php">Logout</a>
</div>';
?>