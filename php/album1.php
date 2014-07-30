<?php
	session_start();
	ob_start();
	
	if(!isset($_SESSION['user']))
	{
		//echo "Welcome back! ".$_SESSION['user'];
		unset($_SESSION['login']);  
      	session_destroy();  
      	$redirect_page = "login.php";
      	header("Cache-Control: private, must-revalidate, max-age=0");
	  	header("Pragma: no-cache");
      	header('Location: '.$redirect_page);
		
		
	}
	else
	{
		
		//echo "you cannot see this page without logging in!!!";
		$welcome = true;
		require_once("/Users/fanxiangmin/Sites/newdb.php");
		$db = new database();
		$db->connect();

		
		//echo "dsadasdsa";

	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>album</title>
		<link href="gallery100.css" rel="stylesheet" />
		<link href="album1.css" rel="stylesheet" />
		<style>
		div.welcome{
			color: white;
			position: relative;
			top: 100px;
			left: 3px;
			float: left;
			z-index: 1;



		}
		</style>
	</head>
	<body link = "#FF9933" vlink = "#FF9933" alink = "#FF9933">
		
			<div class = "welcome">
				<?php 
				if($welcome==true)
					echo "Welcome back! ".$_SESSION['user'];
			?>
			</div>
		<div class="wrapper">
				<?php include 'Limit.php';
					$albumnumber = 5;
					


				?>
				
				<div class="album1" align="left">
					<a href="cover3.php?A=3"><img src="images/1.jpg" height="450" width="720" title="album 1"/></a>
					<div class="name1">
						<a href="cover3.php?A=3" align="center">album 1</a>
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
<?php ob_end_flush();?>