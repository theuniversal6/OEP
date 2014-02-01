<?php
session_start();
include_once("includes/db_conx.php");
// Files that inculde this file at the very top would NOT require 
// connection to database or session_start(), be careful.
// Initialize some vars
$user_ok = false;
$log_id = "";
$log_username = "";
$log_password = "";
$log_type = "";
// User Verify function
function evalLoggedUser($conx,$id,$u,$p){
        $sql = "SELECT * FROM users WHERE username='$u' AND password='$p' LIMIT 1";
    $query = mysqli_query($conx, $sql);
    $numrows = mysqli_num_rows($query);
	if($numrows > 0){
		return true;
	} else{
		return false;
	}
}
if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"]) && isset($_SESSION["type"])) {
	$log_id = preg_replace('#[^0-9]#', '', $_SESSION['userid']);
	$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
    $log_type = preg_replace('#[^a-z0-9]#i', '', $_SESSION['type']);
	// Verify the user
	$user_ok = evalLoggedUser($db_conx,$log_id,$log_username,$log_password, $log_type);
} else if(isset($_COOKIE["user_id"]) && isset($_COOKIE["username"]) && isset($_COOKIE["password"]) && isset($_COOKIE['type'])){
	$_SESSION['user_id'] = preg_replace('#[^0-9]#', '', $_COOKIE['user_id']);
    $_SESSION['username'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['username']);
    $_SESSION['password'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['password']);
    $_SESSION['type'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['type']);
	$log_id = $_SESSION['user_id'];
	$log_username = $_SESSION['username'];
	$log_password = $_SESSION['password'];
    $log_type = $_SESSION['type'];
	// Verify the user
	$user_ok = evalLoggedUser($db_conx,$log_id,$log_username,$log_password,$log_type);
}
?>