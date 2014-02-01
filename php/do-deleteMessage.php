<?php
include_once("check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == false){
	header("location: ../message.php?msg=login_first");
    exit();
}
	if(isset($_GET['i'])){
		$u = $_GET['i'];
		$sql = "DELETE FROM message WHERE msg_id='$u'";
		$query = mysqli_query($db_conx, $sql);
		if($query){
			header("location: ../messages.php");
		}
        else{
            echo mysqli_error($db_conx);
        }
	}else{
		header("location: ../message.php?msg=wrong_headers");
		exit();
	}
?>