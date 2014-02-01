 
    <script type="text/javascript" src="fancybox/jquery.js"></script>
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
    /*$(".example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});*/
			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

    		});
	</script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<style type="text/css">
    .gallery_item{ text-align:center;
		width:265px; height:180px; margin:10px; padding:5px; background-color:#fccece; float:left;    border:1px solid #ccc;  
-moz-border-radius:4px;
    -webkit-border-radius:4px;
    border-radius:4px; 
		}
		.gallery_item:hover{ opacity:0.8; border:1px solid #f73963;}
    </style>
    
 
    <div class="gallery_item">
    <a class="example2" rel="example_group" href="http://vimeo.com/85266653" title=" ">Play Video</a>
    
    </div>
    
   
     