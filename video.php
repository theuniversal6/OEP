<?php ini_set('memory_limit','64M');?>	<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Video</title>
<link rel="icon" href="../Blood Donation System/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../Blood Donation System/css/style.css">
</head>
<body>
<?php include_once("../Final OEP/php/template_pageTop.php"); ?>
<div id="pageMiddle">
	<?php
	if(isset($_GET['id'])){ $id = $_GET['id'];
	$query = "SELECT * FROM lectures WHERE subject_id='$id'"; 
	$num = mysqli_num_rows(mysqli_query($db_conx,$query));
	}
	else
	$query = "SELECT * FROM lectures";
	$result = mysqli_query($db_conx, $query);
	?>
    <div>
    <?php if($num > 0){ while($list = mysqli_fetch_array($result)){?>
    	<p><?php echo $list[4]; ?></p>
        <video width="320" height="240" controls>
  <source src="http://vimeo.com/85266653">
  <source src="http://vimeo.com/85266653" >
Your browser does not support video
</video><p></p>
    <?php }}else echo "<p>Got Nothing</p>"; ?>
    </div>
</div>
<?php include_once("../Final OEP/php/template_pageBottom.php"); ?>
</body>
</html>