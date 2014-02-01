<?php
include_once("php/check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == false){
	header("location: message.php?msg=login_first");
    exit();
}
if(isset($_GET["u"])){
	$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
} else {
    header("location: index.php");
    exit();
}
if($log_username == $u){
    $type = $log_type;
    if($type == "Organization"){
        $type = "<p>You are an organization!</p>";
    }else{
        $type = "<p>You are a User!</p>";
    }
}else{
    header("location: message.php?msg=Not_allowed");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Blood Me</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include_once("php/template_pageTop.php");?>
<div id="pageMiddle">
  <p>Welcome To Edit Page</p>
    <?php echo $type; ?>
    <div>Change Password</div>
    <br /><div>New Password</div>
    <form action="php/do-changeProfile.php" method="post">
        <input type="password" name="p" maxlength="100">
        <input type="submit"/>
    </form>
    <div>Change Contact Info</div>
    <br/>
    <div>New Contact#</div>
    <form action="php/do-changeProfile.php" method="post">
        <input type="number" name="n" maxlength="16">
        <input type="submit">
    </form>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>