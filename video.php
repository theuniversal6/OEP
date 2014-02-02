<?php ini_set('memory_limit','64M');?>	<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Video</title>
<link rel="icon" href="../Final OEP/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../Final OEP/css/style.css">
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>
<body>
<?php include_once("../Final OEP/php/template_pageTop.php"); ?>
<div id="pageMiddle">
	<?php
	if(isset($_GET['id'])){ $id = $_GET['id'];
	$query = "SELECT * FROM lectures WHERE id='$id'"; 
	$num = mysqli_num_rows(mysqli_query($db_conx,$query));
	}
	$result = mysqli_query($db_conx, $query);
	?>
    <div>
    <?php if($num > 0){ $list = mysqli_fetch_array($result)?>
    	<h3><?php echo $list[4]; ?></h3>
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="874" height="531" id="FLVPlayer">
          <param name="movie" value="FLVPlayer_Progressive.swf" />
          <param name="quality" value="high">
          <param name="wmode" value="opaque">
          <param name="scale" value="noscale">
          <param name="salign" value="lt">
          <param name="FlashVars" value="&amp;MM_ComponentVersion=1&amp;skinName=Halo_Skin_3&amp;streamName=videos/<?php echo $list[5]; ?>&amp;autoPlay=false&amp;autoRewind=false" />
          <param name="swfversion" value="8,0,0,0">
          <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
          <param name="expressinstall" value="Scripts/expressInstall.swf">
          <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="FLVPlayer_Progressive.swf" width="874" height="531">
            <!--<![endif]-->
            <param name="quality" value="high">
            <param name="wmode" value="opaque">
            <param name="scale" value="noscale">
            <param name="salign" value="lt">
            <param name="FlashVars" value="&amp;MM_ComponentVersion=1&amp;skinName=Halo_Skin_3&amp;streamName=videos/<?php echo $list[5]; ?>&amp;autoPlay=false&amp;autoRewind=false" />
            <param name="swfversion" value="8,0,0,0">
            <param name="expressinstall" value="Scripts/expressInstall.swf">
            <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
            <div>
              <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
              <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
            </div>
            <!--[if !IE]>-->
          </object>
          <!--<![endif]-->
      </object>
      <input id="commentBox" placeholder="Your Comment Here.." type="text"><button id="commentBtn" type="submit">Post</button><button id="commentBtn" type="submit">Next</button>
<?php }else echo "<p class='nothingFound'>More Videos Comming Soon</p>"; ?>
    </div>
</div>
<?php include_once("../Final OEP/php/template_pageBottom.php"); ?>
<script type="text/javascript">
swfobject.registerObject("FLVPlayer");
</script>
</body>
</html>