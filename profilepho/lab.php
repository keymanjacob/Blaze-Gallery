<?php
	session_start();
	ob_start();
	
	if(isset($_SESSION['user']))
	{
		//echo "Welcome back! ".$_SESSION['user'];
		$welcome = true;
		
	}
	else
	{
		
		//echo "you cannot see this page without logging in!!!";
		header('Location : http://localhost/~fanxiangmin/login.php');
		exit();
		//echo "dsadasdsa";

	}
?>
<!DOCTYPE html>
<html lang = "en-us">
	<head>
		<title>Panda</title>
		<style>
		#xi{height: 500px;width: 500px;}
		body,html{margin:0;padding:0;height: 100%;width: 100%;}
	#xixi{position: fixed;top: 0;z-index:1; height: 980px;width: 960px;}
	

		</style>
		<link href = "pandaa.css" rel = "stylesheet" type = "text/css" media = "screen">
	</head>
	<body link = "#FF9933" vlink = "#FF9933" alink = "#FF9933">
		<?php
		include 'Limit.php'; 
		?>


		
		<div id = "tiger">

			<form action = "lab.php" method = "post" enctype = "multipart/form-data">
					select image: 
					<br><input type = "file" name = "image"><br>
					<input type = "submit" name = "upload" value = "upload now">
			</form>
			<?php
			if(isset($_POST['upload']))
			{
				$image_name = $_FILES['image']['name'];
				$image_type = $_FILES['image']['type'];
				$image_size = $_FILES['image']['size'];
				$image_extn = strtolower(end(explode('.', $image_name)));
				$image_tmp_name = $_FILES['image']['tmp_name'];
				if($image_name ==''||($image_extn !="jpeg"&&$image_extn !="jpg"&&$image_extn !="png"))
				{
					echo "<script>alert('Please choose an image!')</script>";
					exit();
				}
				move_uploaded_file($image_tmp_name, "profilepho/$image_name");
				echo "image upload success!";

				$pic = "profilepho/$image_name";

			
			}

		?>




		</div>
		<div id = "panda">
			<img id="xi" src=<?php echo $pic;?>/>
		</div>
		<div id ="erhu" >
		<table cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<img id="xixi" src="3.jpg"/>
				</td>
			</tr>
		</table>
	</div>
	
	
	</body>
</html>
<?php ob_end_flush();?>