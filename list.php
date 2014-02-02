<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Online Education Portal</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include_once("php/template_pageTop.php"); ?>
<div id="pageMiddle">
	<div class="horizontal-space"></div>
	<div class="main-body">
    	<?php 
		if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * FROM lectures WHERE subject_id='$id'";
		$result = mysqli_query($db_conx, $sql);
		$num = mysqli_num_rows($result);
		if($num > 0){?>
        <ul class="listVideos">
		<?php
		while($row = mysqli_fetch_array($result)){
		?>
        	<li class="main-li"><a href="video.php?id=<?php echo $row[0]; ?>"><?php echo $row[4]; ?></a></li>
        <?php } ?>
        </ul>
        <?php }else{ ?>
        <p class='nothingFound'>More Videos Comming Soon</p>
        <?php }}?>
  </div>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>