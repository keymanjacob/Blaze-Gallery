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
		$uuid = $_SESSION['user_id'];

require_once("/Users/fanxiangmin/Sites/newdb.php");
			$db = new database();
			$db->connect();
		
		//echo "dsadasdsa";

	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>gallery</title>
	<link href="gallery1.css" type="text/css" rel="stylesheet" /> 

	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/lightbox-2.6.min.js"></script>
	<link href="css/lightbox.css" rel="stylesheet" />
	<link href="gallery100.css" rel="stylesheet" />
	<style>
	div#backg{
		overflow: scroll;

	}
		div#backg{
			background:black;
			position: fixed;
			top:0;
			left: 0;
			width: 100%;
			height: 100%;
		}
		h2#bg{
			position: absolute;
			top: 50px;
			left: 40px;
		}
		div#header{
			position: absolute;
			top: 30px;
			left: 250px;
		}

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
	<div id = "backg">
		<h2 id = "bg">Blaze Gallery</h2>
<div id="header">
	
	<?php include 'Limit4ga.php';?>
	
</div>
<div class = "welcome">
				<?php 
				if($welcome==true)
					echo "Welcome back! ".$_SESSION['user'];
			?>
			</div>
<div id="content">
<?php

$sql1 = "select * from photo where visibility = '2' and user_id = '$uuid' ";
$y = 0;
			$res = $db->send_sql($sql1);
			while($res2 = mysql_fetch_array($res))
			{
				$phototaker[$y] = $res2['user_id'];
				$ptname[$y] = $res2['username'];
				$description[$y] = $res2['description'];
				$photoname[$y] = $res2['photoname'];
				$phid[$y] = $res2['photo_id'];
				$date[$y] = $res2['date_upload'];
				$url[$y] = $res2['link'];
				//echo '<h1 style="color:white">'.$phid[$y].'</h1>';
				//echo '<h1 style="color:white">'.$url[$y].'</h1>';
				//echo '<h1 style="color:red">'.$y.'</h1>';
				if($y<2)
				{echo '<div class="gallerybox galleryMarginRight">
				<a href="photoreview.php?PK='.$url[$y].'&PD='.$phid[$y].'&PN='.$phototaker[$y].'&PT='.$ptname[$y].'&PE='.$photoname[$y].' ">
				<img src="'.$url[$y].'" height="270" width="430"/></a>
				</div>';}
				else if($y == 2)
				{
					echo '<div class="gallerybox">
				<a href="photoreview.php?PK='.$url[$y].'&PD='.$phid[$y].'&PN='.$phototaker[$y].'&PT='.$ptname[$y].'&PE='.$photoname[$y].' ">
				<img src="'.$url[$y].'" height="270" width="430"/></a>
				</div>';
				}else if((($y+1)%3)==0)
				{
					echo '<div class="gallerybox galleryMarginTop">
				<a href="photoreview.php?PK='.$url[$y].'&PD='.$phid[$y].'&PN='.$phototaker[$y].'&PT='.$ptname[$y].'&PE='.$photoname[$y].' ">
				<img src="'.$url[$y].'" height="270" width="430"/></a>
				</div>';

				}else
				{
					echo '<div class="gallerybox galleryMarginRight galleryMarginTop">
				<a href="photoreview.php?PK='.$url[$y].'&PD='.$phid[$y].'&PN='.$phototaker[$y].'&PT='.$ptname[$y].'&PE='.$photoname[$y].' ">
				<img src="'.$url[$y].'" height="270" width="430"/></a>
				</div>';
				}
				$y++;
			}









	?>
	
 

	
</div>


</div>
</body> 
</html>