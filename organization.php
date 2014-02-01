<?php
include_once("php/check_login_status.php");
// Initialize any variables that the page might echo
$u = "";
$usertype = "";

// Make sure the _GET username is set, and sanitize it
if(isset($_GET["u"])){
	$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
} else {
    header("location: index.php");
    exit();	
}
$org_id = mysqli_fetch_array(mysqli_query($db_conx, "SELECT organization_id FROM organization WHERE username='$u'"));
$org_id = $org_id[0];
$sql = "SELECT user_id, type FROM organizationmembers WHERE organization_id='$org_id'";
$query = mysqli_query($db_conx, $sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Donors - Blood Me</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include_once("php/template_pageTop.php"); ?>
<div id="pageMiddle">
    <div>Members</div>
    <table>
        <tr>
            <td><a href="php/do-join.php?u=<?php echo $u; ?>">Join as member!</a></td>
        </tr>
        <tr>
            <td>
                Members
            </td>
        </tr>
        <?php 
            while($row = mysqli_fetch_array($query)){
            $id = $row['user_id'];
            $sql = "SELECT username FROM user WHERE user_id='$id'";
            $result = mysqli_fetch_array(mysqli_query($db_conx, $sql))
        ?>
        <tr>
            <td><a href="profile.php?u=<?php echo $result[0];?>"><?php echo $result[0]; ?></a></td>
        </tr>
        <?php } ?>
    </table>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>