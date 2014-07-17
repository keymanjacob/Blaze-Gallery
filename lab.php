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
		
		//echo "dsadasdsa";

	}
?>
<!DOCTYPE html>
<html lang = "en-us">
	<head>
		<title>Photo Upload</title>
		<style>
		div#nimab{
			position: fixed;
			top: 0;
			left: 0;
			  width: 100%;
			  height:100%;
			  background-color: #383838; 
			  overflow: scroll;
			  
			  }
		#xi{height: 500px;width: 610px;}
		body,html{margin:0;padding:0;height: 100%;width: 100%;}
	#xixi{position: relative;top: 0;z-index:1; height: 980px;width: 960px;}
	
		div.welcome{
			color: white;
			position: relative;
			top: 100px;
			left: 3px;
			float: left;
			z-index: 1;



		}
		</style>
		<link href = "pandaa.css" rel = "stylesheet" type = "text/css" media = "screen">
	</head>
	<body link = "#FF9933" vlink = "#FF9933" alink = "#FF9933">
		<div id = "nimab">
		<?php
		include 'Limit.php'; 
		?>

		<div class = "welcome">
				<?php 
				if($welcome==true)
					echo "Welcome back! ".$_SESSION['user'];
			?>
			</div>
		
		<div id = "tiger">

			<form action = "lab.php" method = "post" enctype = "multipart/form-data">
					select image: 
					<br><input type = "file" name = "image"><br>
					

				<h5>name of the picture</h5><h4 style="color:red";><INPUT type="text" name="photoname" value="" size="20" maxlength="40" placeholder="name of your photo"/>*&nbsp;</h4><BR/>
				<h5>photo description</h5><h4 style="color:red";><INPUT type="text" name="description" value="" size="20" maxlength="40" placeholder="describe your photo"/>&nbsp;</h4><BR/>
				<h5>where the photo was taken</h5><h4 style="color:red";><INPUT type="text" name="location" value="" size="20" maxlength="40" placeholder="enter a location"/>&nbsp;</h4><BR/>
				
				<h5>which album this photo belongs</h5><h4 style="color:red";><INPUT type="text" name="album"  size="10" maxlength="40" placeholder="album"/>*&nbsp;</h4><BR/>
				<input type="radio" name="visibility" value="0">public &nbsp;<BR/>
				<input type="radio" name="visibility" value="2">private &nbsp;<BR/>
				<input type="radio" name="visibility" value="1">friends only<BR/><BR/>
				<input type = "submit" name = "upload" value = "upload now">






			</form>









			<?php
			if(isset($_POST['upload']) && isset($_POST['photoname'])&& isset($_POST['visibility']))
			{
				require_once("/Users/fanxiangmin/Sites/newdb.php");
				$db = new database();
				$db->connect();
				$pname = $_POST['photoname'];
				$vb = $_POST['visibility'];
				$username = $_SESSION['user'];
				$user_id = $_SESSION['user_id'];
				$image_name = $_FILES['image']['name'];
				$image_type = $_FILES['image']['type'];
				$image_size = $_FILES['image']['size'];
				$image_extn = strtolower(end(explode('.', $image_name)));
				$image_tmp_name = $_FILES['image']['tmp_name'];
				if($image_name ==''||($image_extn !="jpeg"&&$image_extn !="jpg"&&$image_extn !="png")&&$welcome==true)
				{
					echo "<script>alert('Please choose an image!')</script>";
					
				}
				if(move_uploaded_file($image_tmp_name, "profilepho/$image_name"))
				{
					echo "image upload success!";
					$pic = "profilepho/$image_name";
					if (isset($_POST['description']) && isset($_POST['location']) && isset($_POST['album']))
					{
						$dc = $_POST['description'];
						$ln = $_POST['location'];
						$am = $_POST['album'];
						$sql1 = "insert into photo(photoname, description, user_id, username, location, album_id, visibility, link) values('$pname', '$dc', '$user_id', '$username', '$ln', '$am', '$vb', '$pic')";
						$sql2 = "commit;";
						$res = $db->send_sql($sql1);
						$res = $db->send_sql($sql2);

					}else if(isset($_POST['description']) && isset($_POST['location']))
					{

						$dc = $_POST['description'];
						$ln = $_POST['location'];
						$sql1 = "insert into photo(photoname, description, user_id, username, location, visibility, link) values('$pname', '$dc', '$user_id', '$username', '$ln', '$vb', '$pic')";
						$sql2 = "commit;";
						$res = $db->send_sql($sql1);
						$res = $db->send_sql($sql2);



					}else if (isset($_POST['location']) && isset($_POST['album']))
					{

						$ln = $_POST['location'];
						$am = $_POST['album'];
						$sql1 = "insert into photo(photoname, user_id, username, location, album_id, visibility, link) values('$pname', '$user_id', '$username', '$ln', '$am', '$vb', '$pic')";
						$sql2 = "commit;";
						$res = $db->send_sql($sql1);
						$res = $db->send_sql($sql2);


					}else if (isset($_POST['description']) &&  isset($_POST['album']))
					{
						$dc = $_POST['description'];
						$am = $_POST['album'];
						$sql1 = "insert into photo(photoname, description, user_id, username, album_id, visibility, link) values('$pname', '$dc', '$user_id', '$username', '$am', '$vb', '$pic')";
						$sql2 = "commit;";
						$res = $db->send_sql($sql1);
						$res = $db->send_sql($sql2);

					}else if (isset($_POST['description']))
					{
						$dc = $_POST['description'];
						
						$sql1 = "insert into photo(photoname, description, user_id, username, visibility, link) values('$pname', '$dc', '$user_id', '$username', '$vb', '$pic')";
						$sql2 = "commit;";
						$res = $db->send_sql($sql1);
						$res = $db->send_sql($sql2);

					}else if (isset($_POST['location']))
					{
						
						$ln = $_POST['location'];
						
						$sql1 = "insert into photo(photoname, user_id, username, location, visibility, link) values('$pname', '$user_id', '$username', '$ln', '$vb', '$pic')";
						$sql2 = "commit;";
						$res = $db->send_sql($sql1);
						$res = $db->send_sql($sql2);

					}else if (isset($_POST['album']))
					{
						
						$am = $_POST['album'];
						$sql1 = "insert into photo(photoname, user_id, username, album_id, visibility, link) values('$pname', '$user_id', '$username', '$am', '$vb', '$pic')";
						$sql2 = "commit;";
						$res = $db->send_sql($sql1);
						$res = $db->send_sql($sql2);

					}else
					{
						$sql1 = "insert into photo(photoname, user_id, username, visibility, link) values('$pname', '$user_id', '$username', '$vb', '$pic')";
						$sql2 = "commit;";
						$res = $db->send_sql($sql1);
						$res = $db->send_sql($sql2);

					}


				}else{
					echo "<script>alert('An error has accurred!')</script>";
					

				}
				
				//$pic = "1.png";

			
			}else if($welcome==true&&$_POST['upload']=="upload now")
			{
				echo "<script>alert('Please fill all required fields!')</script>";
			}

		?>




		</div>
		<div id = "panda">
			<img id="xi" src="<?php echo $pic;?>"/>
		</div>
		<div id ="erhu" >
	
					<img id="xixi" src="3.jpg"/>
	
		</div>
	</div>
	
	</body>
</html>
<?php ob_end_flush();?>