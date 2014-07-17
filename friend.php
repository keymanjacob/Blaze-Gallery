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
		$uun = $_SESSION['user'];
		require_once("/Users/fanxiangmin/Sites/newdb.php");
		$db = new database();
		$db->connect();
		$sql = "select * from user_info where user_id = '$uuid';";
		$res = $db->send_sql($sql);
		$res2 = mysql_fetch_array($res);
		$whatsup = $res2['whats_up'];
		$jointime = $res2['date_init'];

		$sqlf = "select * from relationship where follower = '$uuid'";
		$resf = $db->send_sql($sqlf);
		
		$sqlx = "select prolink from user_info where user_id = '$uuid';";
		$ree = $db->send_sql($sqlx);
		$reqq = mysql_fetch_array($ree);
		$pic2 = $reqq['prolink']; 
		

		
		//echo "dsadasdsa";

	}



?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		
		<link href="gallery100.css" rel="stylesheet" />
		
		<link href="css/friend.css" rel="stylesheet"/>
		<style>
		h2#bg{
			position: absolute;
			top: 30px;
			left: 50px;
		}
		div#header{
			position: absolute;
			top: 30px;
			left: 250px;
		}
		div.welcome{
			color: white;
			position: relative;
			top: 60px;
			left: 890px;
			float: left;
			z-index: 1;



		}
		</style>
	</head>
	<body link = "#FF9933" vlink = "#FF9933" alink = "#FF9933">
		<h2 id = "bg">Blaze Gallery</h2>
		<div id="header">
		<?php include 'Limit.php';?>
		</div>
		<div class = "welcome">
				<?php 
				if($welcome==true)
					echo "Welcome back! ".$_SESSION['user'];
			?>
			</div>
		<div class="wrapper">
			<div class="content-list">
				<ul class="content-holder-ul">
					<li class="content-holder" id="_1">					
						<div class="user-img">
							<img src="<?php echo $pic2;?>" class="user-img-pic"/>
						</div>
						<div class="content-body">
							<h3 class="username-field"><?echo $_SESSION['user'];?></h3>
							<h4 class="whatsup"><?echo $jointime;?></h4>
							<h4 class="whatsup"><?echo $whatsup;?></h4>	
							<h4 class="whatsup"><form action = "friend.php" method = "post" enctype = "multipart/form-data"><input type = "file" name = "image"/><input type = "submit" name = "upload" value = "upload now"></form></h4>	
						</div>		
					</li>
				</ul>
			</div>
		</div>
		
		<div class="wrapper1">
			<div class="down">
				<div class="tag">
					<ul id="tag-ul">
						<li>Friend's Name</li>
						<li>Public Photos</li>
						<li>When he/she Joined</li>
						<li>what's up</li>
						<li>You list them as</li>
					</ul>
				</div>



				<?php 


				while($resf1 = mysql_fetch_array($resf))
				{

					$myfriend_id = $resf1['followee'];
					$sqlgn = "select * from user_info where user_id = '$myfriend_id';";
					$resgn = $db->send_sql($sqlgn);
					$resgn1 = mysql_fetch_array($resgn);
					$fname = $resgn1['username'];
					$fwup = $resgn1['whats_up'];
					$fidt = $resgn1['date_init'];
					$fp = $resgn1['prolink'];
					$fstatus = "following";


					echo'<div class="friend-list">
					<ul id="friend-holder-ul">
						<li class="friend-holder" id="_1">					
							<div class="user-img">
								<img src="'.$fp.'" class="user-img-pic"/>
							</div>
							<div class="friend-body">
								<h3 class="username-field">'.$fname.'</h3>
								
							</div>		
						</li>
						<li class="friend-holder2">1</li>
						<li class="friend-holder2">'.$fidt.'</li>
						<li class="friend-holder2">'.$fwup.'</li>
						<li class="friend-holder2">'.$fstatus.'</li>
					</ul>
				</div> ';}




				?>
				
<?php
			if(isset($_POST['upload']))
			{
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
					
						
						$sqlk = "update user_info set prolink = '$pic' where user_id = '$uuid';";
						$sqlj = "commit;";
						$resy = $db->send_sql($sqlk);
						$resy = $db->send_sql($sqlj);

					}
					header('location:friend.php');

				}






?>
				
				
			</div>
		</div>
	</body>
</html>
<?php ob_end_flush();?>