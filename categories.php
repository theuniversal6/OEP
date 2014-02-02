	<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Categories Wise Learning</title>
<link rel="icon" href="../Final OEP/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../Final OEP/css/style.css">
</head>
<body>
<?php include_once("../Final OEP/php/template_pageTop.php"); ?>
<div id="pageMiddle">
	<?php
	$query = "SELECT * FROM subject_categories";
	$result1 = mysqli_query($db_conx, $query);
	?>
    <div>
    <?php while($list = mysqli_fetch_array($result1)){?>
    	<div class="main-category"><h3><?php echo $list[1]; ?></h3></div>
    <?php } ?>
    </div>
</div>
<?php include_once("../Final OEP/php/template_pageBottom.php"); ?>
</body>
</html>