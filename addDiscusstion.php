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
            <p>Fill the form below.</p>
        </div>
        <div class="right">
        	<a href="addDiscusstion.php" id="postBtn"> + Post New Question</a>
        </div>
        <div class="seperator"></div>
        </div>
        <div class="main-category">
            <h3>Start Discussion</h3>
         </div>
         <div id="addform">
         	<form>
            	<input type="text" placeholder="Subject"/>
                <textarea placeholder="Enter text here.."></textarea>
                <input type="text" placeholder="Tags" />
                <input type="button" value="Post"/>
            </form>
         </div>
  </div>
</div>
<?php include_once("php/template_pageBottom.php"); ?>
</body>
</html>