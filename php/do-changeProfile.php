<?php
include_once("check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == false){
	header("location: ../message.php?msg=login_first");
    exit();
}
$u = $_SESSION['username'];
if($_SESSION['type'] == "Organization"){
 if(isset($_GET['p'])){
    $change = md5($_GET['p']);
    $sql = "UPDATE organization SET password='$change' WHERE username='$u'";
}else if(isset($_GET['n'])){
    $change = $_GET['n'];
     $sql = "SELECT organization_id FROM organization WHERE username='$u'";
     $id = mysqli_query($db_conx, $sql);
     $id = mysqli_fetch_array($id);
     $id = $id[0];
     $sql = "UPDATE organization SET contactNo='$change' WHERE organization_id='$id'";
}else{
    header("location: ../message.php?msg=values_missing");
    exit();
}
}else{
	if($_SESSION['type'] == "Donor") $t = 1;
	else if($_SESSION['type'] == "Receiver") $t = 2;
	else if($_SESSION['type'] == "Administrator") $t = 3;
	if(isset($_GET['p'])){
		$change = md5($_GET['p']);
		$sql = "UPDATE user SET password='$change' WHERE username='$u' AND type='$t'";
	}else if(isset($_GET['n'])){
		$change = $_GET['n'];
		 $sql = "SELECT user_id FROM user WHERE username='$u' AND type='$t'";
		 $id = mysqli_query($db_conx, $sql);
		 $id = mysqli_fetch_array($id);
		 $id = $id[0];
		 $sql = "UPDATE organization SET contactNo='$change' WHERE organization_id='$id' AND type='$t'";
	}
}

$query = mysqli_query($db_conx, $sql);
header("Location: ../profile.php?u=$log_username");
exit();
?>