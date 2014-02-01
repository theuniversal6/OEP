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
    <div>Organizations</div>
    <table>
        <?php 
            $sql = "SELECT * FROM organization WHERE activated='1'";
            $query = mysqli_query($db_conx, $sql);
            while($row = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><a href="organization.php?u=<?php echo $row['username'];?>"><?php echo $row['username']; ?></a></td>
        </tr>
        <?php }?>
    </table>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>