<?php
include_once("php/check_login_status.php");
// Initialize any variables that the page might echo
if($user_ok == false) {
    header("location: index.php");
    exit();	
}
$id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Inbox</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
</head>
<body>
<?php include_once("php/template_pageTop.php"); ?>
<div id="pageMiddle">
  <h3>Inbox</h3>
  <table border="1">
      <tr>
          <td>
            From: 
          </td>
          <td>
              Subject: 
          </td>
          <td>
              Message: 
          </td>
          <td>
              Date-Time:
          </td>
		  <td>
			Action
		  </td>
      </tr>
      <?php
            $sql = "SELECT * FROM message WHERE reciver_id='$id'";
            $query = mysqli_query($db_conx, $sql);
            while($row = mysqli_fetch_array($query)){
      ?>
      <tr>
          <td>
            <?php echo $row['sender_id'];
              ?>
          </td>
          <td>
              <?php echo $row['subject']; ?>
          </td>
          <td>
              <?php echo $row['text'];?>
          </td>
          <td>
              <?php echo $row['datetime']; ?>
          </td>
		  <td>
			<a href="php/do-deleteMessage.php?i=<?php echo $row['msg_id'];?>">Delete</a>
		  </td>
      </tr>
    <?php }?>
  </table>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>