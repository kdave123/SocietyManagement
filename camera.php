<html>

<head>

<link rel="stylesheet" type="text/css" href="kdstylesheet.css">

<title>K TheWay Housing Society management</title>


</head>

<body>
<?php

require("header.php");

?>

<div class="midcontent">
<p class="bigtext">Live Society Camera 24x7</p>



	
	
	<div id="my_camera"></div>
	
	<!-- Only externaL Dependency

		WebcamJS v1.0.25 - http://github.com/jhuckaby/webcamjs - MIT Licensed -->
	<script type="text/javascript" src="webcam.min.js"></script>
	

	<script language="JavaScript">
		Webcam.set({
			width: 600,
			height: 460,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
</div>


<?php

require("footer.html");

?>

</body>

</html>