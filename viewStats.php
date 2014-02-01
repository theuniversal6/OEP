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
$sql = "SELECT l.login_id, l.ip_address, l.type, u.username FROM loginactivity l, user u WHERE (l.type = 1 OR l.type = 2) AND l.login_id = u.user_id";
$users = mysqli_query($db_conx, $sql);

$sql = "SELECT l.login_id, l.ip_address, l.type, o.username FROM loginactivity l, organization o WHERE l.type = 3 AND l.login_id = o.organization_id";
$organizations = mysqli_query($db_conx, $sql);

$sql = "SELECT COUNT(*) FROM loginactivity";
$count = mysqli_fetch_array(mysqli_query($db_conx, $sql));
$loginTotal = $count[0];
$sql = "SELECT COUNT(*) FROM user";
$count = mysqli_fetch_array(mysqli_query($db_conx, $sql));
$totalUsers = $count[0];
$sql = "SELECT COUNT(*) FROM organization";
$count = mysqli_fetch_array(mysqli_query($db_conx, $sql));
$totalOrganizations = $count[0];

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Statistics - BloodMe</title>
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
    <table>
        <tr>
      <tr>
          <th colspan="3">
          Login Activity
          </th>
      </tr>
        <tr>
            <th colspan="3">Donors & Receivers</th>
        </tr>
        <tr>
          <td>
              Username
          </td>
          <td>
              Type
          </td>
          <td>
              I-P Address
          </td>
      </tr>
        <?php while($row = mysqli_fetch_array($users)){ ?>
       <tr>
          <td>
              <?php echo $row['username'] ?>
          </td>
          <td>
              <?php if($row['type'] == 1)echo "Donor";
                    else "Receiver";
              ?>
          </td>
          <td>
              <?php echo $row['ip_address']; ?>
          </td>
      </tr> 
        <?php } ?>
        </tr>
        <tr>
        <tr>
            <th colspan="3">Organizations</th>
        </tr>
        <tr>
          <td>
              Username
          </td>
          <td>
              Type
          </td>
          <td>
              I-P Address
          </td>
      </tr>
                <tr></tr>
        <?php while($row = mysqli_fetch_array($organizations)){ ?>
       <tr>
          <td>
              <?php echo $row['username'] ?>
          </td>
          <td>
              <?php if($row['type'] == 3)echo "Organization";
              ?>
          </td>
          <td>
              <?php echo $row['ip_address']; ?>
          </td>
      </tr> 
        <?php } ?>
    <th colspan="3">
          Total
          </th>
                <tr>
                    <td>Total Logins: <?php echo $loginTotal; ?></td>
                    <td>Total Donors/Receivers: <?php echo $totalUsers; ?></td>
                    <td>Total Organizations: <?php echo $totalOrganizations; ?></td>
                </tr>
        </tr>
    </table>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>