<?php
include_once("php/check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == true){
	header("location: profile.php?u=".$_SESSION["username"]);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Log In</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
</head>
<body>
<?php include_once("php/template_pageTop.php"); ?>
<div id="pageMiddle">
  <h3>Log In Here</h3>
  <!-- LOGIN FORM -->
  <form id="loginform" action="php/do-login.php" method="post">
    <div>Email Address:</div>
    <input type="email" name="e" maxlength="88">
    <div>Password:</div>
    <input type="password" name="p" maxlength="100">
    <br /><br />
    <button id="loginbtn" type="submit">Log In</button> 
    <p id="status"></p>
    <a href="#">Forgot Your Password?</a>
  </form>
  <!-- LOGIN FORM -->
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>