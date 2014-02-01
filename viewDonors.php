<?php
include_once("php/check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == false){
	header("location: message.php?msg=login_first");
    exit();
}
if(isset($_GET["u"])){
	$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
} else {
    header("location: index.php");
    exit();
}
if($_SESSION['type'] != "Administrator"){
    header("location: index.php");
    exit();
}
$sqlActiv = "SELECT u.user_id, u.f_name, u.l_name, b.type FROM user u, blood b 
            WHERE 
            (u.activated='1' AND u.type='1')
            AND
            (u.blood_id = b.blood_id)";

$sqlNotActiv = "SELECT u.user_id, u.f_name, u.l_name, b.type FROM user u, blood b 
            WHERE 
            (u.activated='0' AND u.type='1')
            AND
            u.blood_id = b.blood_id";
$noOfActiv = "SELECT COUNT(user_id) FROM user WHERE activated='1' AND type='1'";
$noOfNotActiv = "SELECT COUNT(user_id) FROM user WHERE activated='0' AND type='1'";
$activQuery = mysqli_query($db_conx, $sqlActiv);
$notActivQuery = mysqli_query($db_conx, $sqlNotActiv);
$noOfActiv = mysqli_query($db_conx, $noOfActiv);
$noOfNotActiv = mysqli_query($db_conx, $noOfNotActiv);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $u; ?></title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
</head>
<body>
<?php include_once("php/template_pageTop.php"); ?>
<div id="pageMiddle">
  <br /><br /><br />
  <br /><br /><br />
    <table border="1">
      <tr>
          <th colspan="3">
          Activated
          </th>
          <th colspan="2">
              Total: <?php $count = mysqli_fetch_array($noOfActiv); echo $count[0];?>
          </th>
      </tr>
        <tr>
          <td>
              First Name
          </td>
          <td>
              Last Name
          </td>
          <td>
              Blood Group
          </td>
          <td colspan="2">
              Actions
          </td>
      </tr>
        <?php while($row = mysqli_fetch_array($activQuery)){ ?>
      <tr>
          <td>
              <?php echo $row['f_name']; ?>
          </td>
          <td>
              <?php echo $row['l_name']; ?>
          </td>
          <td>
              <?php echo $row['type']; ?>
          </td>
          <td>
              <a href="php/do-delete.php?u=<?php echo $row['user_id']; ?>">Delete</a>
          </td>
          <td>
              <a href="php/do-deactivate.php?u=<?php echo $row['user_id']; ?>">Deactivate</a>
          </td>
      </tr>
        <?php }?>
  </table>
    <br /><br /><br /><br />
    <table border="1">
      <tr>
          <th colspan="3">
          Not Activated
          </th>
          <th colspan="2">
              Total: <?php $count1 = mysqli_fetch_array($noOfNotActiv); echo $count1[0  ]; ?>
          </th>
      </tr>
        <tr>
          <td>
              First Name
          </td>
          <td>
              Last Name
          </td>
          <td>
              Blood Group
          </td>
          <td colspan="2">
              Actions
          </td>
        <?php 
            while($row = mysqli_fetch_array($notActivQuery)){
        ?>
      <tr>
          <td>
              <?php echo $row['f_name']; ?>
          </td>
          <td>
              <?php echo $row['l_name']; ?>
          </td>
          <td>
              <?php echo $row['type']; ?>
          </td>
          <td>
              <a href="php/do-delete.php?u=<?php echo $row['user_id']; ?>">Delete</a>
          </td>
          <td>
              <a href="php/do-activate.php?u=<?php echo $row['user_id']; ?>">Activate</a>
          </td>
      </tr> 
        <?php }?>
  </table>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>