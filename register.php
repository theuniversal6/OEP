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
<title>Sign Up</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
</head>
<body>
<?php include_once("php/template_pageTop.php"); ?>
<div id="pageMiddle">
  <h3>Sign Up Here</h3>
  <form name="signupform" action="php/do-register.php" id="signupform" method="post">
    <div>Username: </div>
    <input id="username" type="text" name="u" maxlength="16">
    <span id="unamestatus"></span>
    <div>Email Address:</div>
    <input id="email" type="email" name="e" maxlength="88">
    <div>Create Password:</div>
    <input id="pass" type="password" name="p" maxlength="16">
    <br /><br />
    <button id="signupbtn" type="submit">Create Account</button>
    <span id="status"></span>
  </form>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>