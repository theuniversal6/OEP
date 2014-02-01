	<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Subjects</title>
<link rel="icon" href="../Blood Donation System/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../Blood Donation System/css/style.css">
</head>
<body>
<?php include_once("../Final OEP/php/template_pageTop.php"); ?>
<div id="pageMiddle">
	<?php
	if(isset($_GET['id'])){ $id = $_GET['id'];
	$query = "SELECT * FROM subjects WHERE category_id='$id'"; } 
	else
	$query = "SELECT * FROM subjects";
	$result = mysqli_query($db_conx, $query);
	?>
    <div>
    <?php while($list = mysqli_fetch_array($result)){?>
    	<a href="../Final OEP/video.php?id=<?php echo $list[0]; ?>"><?php echo $list[1]; ?></a>
    <?php } ?>
    </div>
</div>
<?php include_once("../Final OEP/php/template_pageBottom.php"); ?>
</body>
</html>