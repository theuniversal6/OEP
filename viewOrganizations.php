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
$sqlActiv = "SELECT o.organization_id, p.name, p.contactNo, p.url FROM organization o, organizationprofile p 
            WHERE 
            o.activated='1'
            AND
            o.organization_id = p.organization_id";

$sqlNotActiv = "SELECT o.organization_id, p.name, p.contactNo, p.url FROM organization o, organizationprofile p 
            WHERE 
            o.activated='0'
            AND
            o.organization_id = p.organization_id";
$noOfActiv = "SELECT COUNT(organization_id) FROM organization WHERE activated='1'";
$noOfNotActiv = "SELECT COUNT(organization_id) FROM organization WHERE activated='0'";
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
              Total: <?php $count = mysqli_fetch_array($noOfActiv); echo $count[0]; ?>
          </th>
      </tr>
        <tr>
          <td>
              Name
          </td>
          <td>
              URL
          </td>
          <td>
              Phone
          </td>
            <td>Actions</td>
      </tr>
        <?php while($row = mysqli_fetch_array($activQuery)){ ?>
      <tr>
          <td>
              <?php echo $row['name']; ?>
          </td>
          <td>
              <?php echo $row['url']; ?>
          </td>
          <td>
              <?php echo $row['contactNo']; ?>
          </td>
          <td><a href="php/do-deactivateOrg.php?u=<?php echo $row['organization_id']; ?>">Deactivate</a></td>
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
              Total: <?php $count = mysqli_fetch_array($noOfNotActiv); echo $count[0]; ?>
          </th>
      </tr>
        <tr>
          <td>
              Name
          </td>
          <td>
              URL
          </td>
          <td>
              Phone
          </td>
            <td>Actions</td>
      </tr>
        <?php 
            while($row = mysqli_fetch_array($notActivQuery)){
        ?>
            <tr>
          <td>
              <?php echo $row['name']; ?>
          </td>
          <td>
              <?php echo $row['url']; ?>
          </td>
          <td>
              <?php echo $row['contactNo']; ?>
          </td>
          <td><a href="php/do-activateOrg.php?u=<?php echo $row['organization_id']; ?>">Activate</a></td>
      </tr>
        <?php }?>
  </table>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>