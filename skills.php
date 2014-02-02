<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Skills Wise Learning</title>
<link rel="icon" href="../Final OEP/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../Final OEP/css/style.css">
</head>
<body>
<?php include_once("../Final OEP/php/template_pageTop.php"); ?>
<div id="pageMiddle">
<?php
	$query = "SELECT * FROM skills";
	$result = mysqli_query($db_conx, $query);
	?>
    
    <?php while($list = mysqli_fetch_array($result)){?>
    	<div class="main-category"><h3><a href="list.php?id=<?php echo $list[0]; ?>"><?php echo $list[1]; ?></a></h3></div>
    <?php } ?>
</div>
<?php include_once("../Final OEP/php/template_pageBottom.php"); ?>
</body>
</html>