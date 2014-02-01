<?php
include_once("check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == false){
	header("location: ../message.php?msg=login_first");
    exit();
}
$org = $_GET['u'];
$org_id = mysqli_fetch_array(mysqli_query($db_conx, "SELECT organization_id FROM organization WHERE username='$org'"));
$org_id = $org_id[0];
$user = $_SESSION['user_id'];
$sql = "INSERT INTO organizationmembers(`organization_id`, `user_id`, `type`) VALUES ('$org_id','$user',1)";
$query = mysqli_query($db_conx, $sql);
header('location:../organizations.php');
?>