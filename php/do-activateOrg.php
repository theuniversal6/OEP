<?php
include_once("check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == false){
	header("location: ../message.php?msg=login_first");
    exit();
}
if(isset($_GET["u"])){
	$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
} else {
    header("location: ../index.php");
    exit();
}
if($_SESSION['type'] != "Administrator"){
    header("location: ../index.php");
    exit();
}

$sql = "UPDATE organization SET activated='1' WHERE organization_id='$u'";
$query = mysqli_query($db_conx, $sql);
header("Location: ../admin.php?u=$log_username");
exit();
?>