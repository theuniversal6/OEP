<?php
include_once("check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == true){
	header("location: profile.php?u=".$_SESSION["username"]);
    exit();
}
?><?php
if(isset($_POST["e"])){
	// CONNECT TO THE DATABASE
	include_once("includes/db_conx.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
	$e = mysqli_real_escape_string($db_conx, $_POST['e']);
	$p = md5($_POST['p']);
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', $_SERVER['REMOTE_ADDR']);
	// FORM DATA ERROR HANDLING
	if($e == "" || $p == ""){
		header("location: ../message.php?msg=fields_should_not_be_empty");
        exit();
	} else {
	// END FORM DATA ERROR HANDLING
            $sql = "SELECT id, username, password, type FROM user WHERE email='$e' LIMIT 1";
        $query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($query);
		$db_id = $row[0];
		$db_username = $row[1];
        $db_pass_str = $row[2];
		$db_type = $row[3];
		if($p != $db_pass_str){
			header("location: ../message.php?msg=wrong_password");
            exit();
		} else {
			// CREATE THEIR SESSIONS AND COOKIES
			$_SESSION['user_id'] = $db_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_pass_str;
            $_SESSION['type'] = $db_type;
			setcookie("user_id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
			setcookie("username", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
    		setcookie("password", $db_pass_str, strtotime( '+30 days' ), "/", "", "", TRUE); 
            setcookie("type", $db_type, strtotime( '+30 days' ), "/", "", "", TRUE); 
			if($db_type == 3){
                header("Location:../admin.php?u=$db_username");
                exit();
            }
			header("Location:../profile.php?u=$db_username");
		    exit();
		}
	}
	exit();
}
?>