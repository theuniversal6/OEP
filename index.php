<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Online Education Portal</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>
<body>
<?php include_once("php/template_pageTop.php"); ?>
<div id="pageMiddle">
	<div class="horizontal-space"></div>
<div class="main-body">
    	<div id="upperSection"><img src="images/slide1.png" alt="Lets Learn" width="588" height="300" class="left">
        <div class="left"><br>
        </div>
        <div class="right">
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="320" height="240" id="FLVPlayer">
            <param name="movie" value="FLVPlayer_Progressive.swf" />
            <param name="quality" value="high">
            <param name="wmode" value="opaque">
            <param name="scale" value="noscale">
            <param name="salign" value="lt">
            <param name="FlashVars" value="&amp;MM_ComponentVersion=1&amp;skinName=Clear_Skin_3&amp;streamName=videos/main&amp;autoPlay=false&amp;autoRewind=false" />
            <param name="swfversion" value="8,0,0,0">
            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
            <param name="expressinstall" value="Scripts/expressInstall.swf">
            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="FLVPlayer_Progressive.swf" width="320" height="240">
              <!--<![endif]-->
              <param name="quality" value="high">
              <param name="wmode" value="opaque">
              <param name="scale" value="noscale">
              <param name="salign" value="lt">
              <param name="FlashVars" value="&amp;MM_ComponentVersion=1&amp;skinName=Clear_Skin_3&amp;streamName=videos/main&amp;autoPlay=false&amp;autoRewind=false" />
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
        </div><div class="clear"></div>
        <div class="seperator"></div>
        </div>
        
<div class="clear"></div>
<div>
  <div id="tile">
        <img id="tileIcon" src="images/Calculator-128.png" />
				<div id="tileCaption">
					World of Maths
				</div>
			</div>
  <div id="tile">
  <img id="tileIcon" src="images/my_computer.png" />
				<div id="tileCaption">
					Computer Sciences
				</div>
			</div>
  <div id="tile">
  <img id="tileIcon" src="images/beaker-512.png"  />
				<div id="tileCaption">
					Chemistry
				</div>
			</div>
            <div id="tile">
  <img id="tileIcon" src="images/physics.png"  />
				<div id="tileCaption">
					Physics
				</div>
			</div>
            </div>  <div id="tile">
        <img id="tileIcon" src="images/abc.jpg" />
				<div id="tileCaption">
					English Literature
				</div>
			</div>
  <div id="tile">
  <img id="tileIcon" src="images/urdu.png" />
				<div id="tileCaption">
					Urdu Adab
				</div>
			</div>
  <div id="tile">
  <img id="tileIcon" src="images/history.jpg"  />
				<div id="tileCaption">
					History
				</div>
			</div>
    <div id="tile">
  <img id="tileIcon" src="images/geography.png" />
				<div id="tileCaption">
					Geography
				</div>
			</div>
  </div>

</div>
<div class="clear"></div>
</div>

<?php include_once("php/template_pageBottom.php"); ?>
<script type="text/javascript">
swfobject.registerObject("FLVPlayer");
</script>
</body>
</html>