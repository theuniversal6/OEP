<?php
include_once("php/check_login_status.php");
// Initialize any variables that the page might echo
$u = "";
$usertype = "";

// Make sure the _GET username is set, and sanitize it
if(isset($_GET["u"])){
	$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
} else {
    header("location: index.php");
    exit();	
}
// Select the member from the users table
$sql = "SELECT * FROM users WHERE username='$u' LIMIT 1";
// Now make sure that user exists in the table
$num = mysqli_num_rows(mysqli_query($db_conx, $sql));
if($num < 1){
	echo "That user does not exist or is not yet activated, press back";
    exit();	
}else if($num == 1){
    	$row = mysqli_fetch_array(mysqli_query($db_conx, $sql));
        $userId = $row["id"];
}
$sql = "SELECT * FROM profile WHERE user_id='$userId' LIMIT 1";
$row = mysqli_fetch_array(mysqli_query($db_conx, $sql));
$fName = $row[2];
$lName = $row[3];
$country = $row[6];
// Check to see if the viewer is the account owner
$isOwner = "no";
if($u == $log_username && $user_ok == true){
	$isOwner = "yes";
}
// Fetch the user row from the query above

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $u; ?></title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
</head>
<body>
<?php include_once("php/template_pageTop.php"); ?>
<div id="pageMiddle">
  <h3><?php echo $fName . " " . $lName; ?></h3>
  <?php 
    if($isOwner == "yes"){
    ?><p><a href="edit.php?u=<?php echo $u; ?>">Edit Profile</a></p>
    <?php
    }else{
    ?>
    <p><a href="sendMessage.php?u=<?php echo $u; ?>">Send Message</a></p>
    <?php }?>
    <div>
    <p>Country: <?php echo $country; ?></p>
    </div>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>