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
    	<div id="upperSection">
        <div class="left">
        	<h3>Discussion Board</h3><br>
            <p>Post any query or answer others.</p>
        </div>
        <div class="right">
        	<a href="addDiscusstion.php" id="postBtn"> + Post New Question</a>
        </div>
        <div class="seperator"></div>
        </div>
        <div class="main-category">
            <h3>Top Questions</h3>
         </div>
         <div class="main-category"><h3>Newest Questions</h3></div>
         <div class="main-category"><h3>Answered Most</h3></div>
  </div>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>