<?php
include_once("php/check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == false){
	header("location: message.php?msg=login_first");
    exit();
}
if(isset($_POST['s'])){
    if(isset($_POST['t'])){
        $subject = $_POST['s'];
        $text = $_POST['t'];
        $sender = $_SESSION['user_id'];
        $receiver = $_GET['u'];
        if($_SESSION['type'] == "Donor" || $_SESSION['type'] == "Receiver" || $_SESSION['type'] == "Administrator"){
            $s_type = 1;
        }else if($_SESSION['type'] == "Organization"){
            $s_type = 2;
        }
        $sql = "SELECT user_id FROM user WHERE username='$receiver'";
        $sql1 = "SELECT organization_id FROM organization WHERE username='$receiver'";
        if(mysqli_num_rows(mysqli_query($db_conx, $sql)) > 0){
            $query = mysqli_fetch_array(mysqli_query($db_conx, $sql));
            $receiver = $query[0];
            $r_type = 1;
        }else if(mysqli_num_rows(mysqli_query($db_conx, $sql1)) > 0){
            $query = mysqli_fetch_array(mysqli_query($db_conx, $sql1));
            $receiver = $query[0];
            $r_type = 2;
        }
        if($s_type == 1 && $r_type == 1){
            $type = 1;
        }else if($s_type == 1 && $r_type == 2){
            $type = 2;
        }else if($s_type == 2 && $r_type == 1){
            $type = 3;
        }else{
            $type = 4;
        }
        $sqlw = "INSERT INTO `message`(`sender_id`, `reciver_id`, `subject`, `text`, `datetime`, `type`) VALUES ('$sender','$receiver','$subject','$text',now(),'$type')";
        $query = mysqli_query($db_conx, $sqlw);
        if($query){
        header('location: message.php?msg=message_sent');
		}
        else{
            echo mysqli_error($db_conx);
        }
    }else{
        header("location: message.php?msg=text_missing");
        exit();
    }
}else{
    $u = $_GET['u'];
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Log In</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
</head>
<body>
<?php include_once("php/template_pageTop.php"); ?>
<div id="pageMiddle">
  <h3>Send Message To: <?php echo $u; ?></h3>
  <form id="messageForm" action="sendMessage.php?u=<?php echo $u; ?>" method="post">
    <div>Subject:</div>
    <input type="text" name="s" maxlength="88">
    <div>Text:</div>
    <textarea name="t"></textarea>
    <br /><br />
    <button id="loginbtn" type="submit">Send Message</button> 
    <p id="status"></p>
  </form>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>