<?php
include_once("check_login_status.php");
$header = '<div id="login"><a href="login.php">Log In</a> &nbsp; | &nbsp; <a href="register.php">Sign Up</a></div>';
if($user_ok == true){
    /*$id = $_SESSION['userid'];
    $count = mysqli_fetch_array(mysqli_query($db_conx, "SELECT COUNT(*) FROM message WHERE reciver_id='$id'"));
    $count = $count[0];
    $messageLink = '<a href="messages.php">Messages ('.$count.')</a>';*/
	$loginLink = '<div id="loggedIn"><a href="profile.php?u='.$log_username.'">'.$log_username.'</a> &nbsp; | &nbsp; <a href="logout.php">Log Out</a></div>';
    $header = $loginLink;
}
?>
<div id="pageTop">
  <div id="pageTopWrap">
    <div id="pageTopLogo">
      <a href="index.php">
        <img src="images/home.png" alt="logo" title="Oinline Education Portal">
      </a>
    </div>
    <div id="pageTopRest">
      <div id="menu1">
          <?php echo $header; ?>
      </div>
      <div id="menu2">
        <div> 
          <a href="categories.php">Learn</a>
          <a href="skills.php">Skills</a>
          <a href="discussion.php">Discussion Board</a>
          <form>
          	<input id="searchBar" type="text" placeholder="Search.." />
            <input id="searchBtn" type="button" value="Go!"  />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>