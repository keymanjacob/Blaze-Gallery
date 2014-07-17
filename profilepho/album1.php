
<!DOCTYPE html>
<html>
	<head>
		<title>album</title>
		<link href="gallery100.css" rel="stylesheet" />
		<link href="album1.css" rel="stylesheet" />
	</head>
	<body link = "#FF9933" vlink = "#FF9933" alink = "#FF9933">
		<h1>album</h1>
			
		<div class="wrapper">
				<?php include 'Limit.php';?>
				
				<div class="album1" align="left">
					<a href="cover1.php"><img src="images/1.jpg" height="450" width="720" title="album 1"/></a>
					<div class="name1">
						<a href="#" align="center">album 1</a>
					</div>
				</div>
				<div class="album2" align="left">
					<a href="cover1.php"><img src="images/2.jpg" height="450" width="720" title="album 2"/></a>	
					<div class="name2">
						<a href="#">album 2</a>
					</div>					
				</div>
				
		</div>
		<div class="footer">	
			<?php
				include ("footer.php");
			?>
		</div>	
	</body>
</html>