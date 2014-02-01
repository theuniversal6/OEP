<?php
include_once("check_login_status.php");
$header = '<a href="login.php">Log In</a> &nbsp; | &nbsp; <a href="register.php">Sign Up</a>';
if($user_ok == true){
    $id = $id[0];
    $count = mysqli_fetch_array(mysqli_query($db_conx, "SELECT COUNT(*) FROM message WHERE reciver_id='$id'"));
    $count = $count[0];
    $messageLink = '<a href="messages.php">Messages ('.$count.')</a>';
	$loginLink = '<a href="profile.php?u='.$log_username.'">Welcome '.$log_username.'</a> &nbsp; | &nbsp; <a href="logout.php">Log Out</a>';
    $header = $messageLink.' | '.$loginLink;
}
?>
<div id="pageTop">
  <div id="pageTopWrap">
    <div id="pageTopLogo">
      <a href="index.php">
        <img src="images/home.png" alt="logo" title="BloodMe">
      </a>
    </div>
    <div id="pageTopRest">
      <div id="menu1">
        <div>
          <?php echo $header; ?>
        </div>
      </div>
      <div id="menu2">
        <div> 
          <a href="categories.php">Categories</a>
          <a href="skills.php">Skills</a>
        </div>
      </div>
    </div>
  </div>
</div>