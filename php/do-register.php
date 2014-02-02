<?php
session_start();
// If user is logged in, header them away
if(isset($_SESSION["username"])){
	header("location: ../message.php?msg=NO to that weenis");
    exit();
}
?><?php
if(isset($_POST["usernamecheck"])){
	include_once("php/includes/db_conx.php");
	$username = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);
	$sql = "SELECT id FROM users WHERE username='$username' LIMIT 1";
    $query = mysqli_query($db_conx, $sql); 
    $uname_check = mysqli_num_rows($query);
    if (strlen($username) < 3 || strlen($username) > 16) {
	    echo '<strong style="color:#F00;">3 - 16 characters please</strong>';
	    exit();
    }
	if (is_numeric($username[0])) {
	    echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
	    exit();
    }
    if ($uname_check < 1) {
	    echo '<strong style="color:#009900;">' . $username . ' is OK</strong>';
	    exit();
    } else {
	    echo '<strong style="color:#F00;">' . $username . ' is taken</strong>';
	    exit();
    }
}
?><?php
if(isset($_POST["u"])){
	// CONNECT TO THE DATABASE
	include_once("includes/db_conx.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES
	$u = preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
	$e = mysqli_real_escape_string($db_conx, $_POST['e']);
	$p = md5($_POST['p']);
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', $_SERVER['REMOTE_ADDR']);
	// DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
        $sql = "SELECT id FROM users WHERE username='$u' LIMIT 1";
        $query = mysqli_query($db_conx, $sql); 
        $u_check = mysqli_num_rows($query);
        // -------------------------------------------
        $sql = "SELECT id FROM users WHERE email='$e' LIMIT 1";
        $query = mysqli_query($db_conx, $sql); 
        $e_check = mysqli_num_rows($query);
    }
	// FORM DATA ERROR HANDLING
	if($u == "" || $e == "" || $p == ""){
		echo "The form submission is missing values.";
        exit();
	} else if ($u_check > 0){ 
        echo "The username you entered is alreay taken";
        exit();
	} else if ($e_check > 0){ 
        echo "That email address is already in use in the system";
        exit();
	} else if (strlen($u) < 3 || strlen($u) > 16) {
        echo "Username must be between 3 and 16 characters";
        exit(); 
    } else if (is_numeric($u[0])) {
        echo 'Username cannot begin with a number';
        exit();
    } else {
	// END FORM DATA ERROR HANDLING
	    // Begin Insertion of data into the database
		// Add user info into the database table for the main site table
            $sql = "INSERT INTO users (username, email, password, type) VALUES('$u','$e','$p',1)";
            $query = mysqli_query($db_conx, $sql); 
            $uid = mysqli_insert_id($db_conx);
            // Create directory(folder) to hold each user's files(pics, MP3s, etc.)
            if (!file_exists("../user/$u")) {
                mkdir("../user/$u", 0755);
            }
        }
		header("Location:login.php");
		exit();
?>