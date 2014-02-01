<?php
include_once("check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == true){
	header("location: profile.php?u=".$_SESSION["username"]);
    exit();
}
$name = $_POST['name'];
$gender = $_POST['gender'];
$blood = $_POST['blood'];
$city = $_POST['city'];
$phone = $_POST['mobile'];
$email = $_POST['email'];
$sql = "SELECT blood_id FROM blood WHERE type='$blood'";
$query = mysqli_query($db_conx, $sql);
$query = mysqli_fetch_array($query);
$blood = $query[0];
$sql = "INSERT INTO request(blood_id, name, phone, email, city) VALUES ('$blood','$name','$phone','$email','$city')";
$query = mysqli_query($db_conx, $sql);

?>