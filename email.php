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
		$sql = "select * from email where receiver = '$uuid'; ";
		$res = $db->send_sql($sql);

		
		//echo "dsadasdsa";

	}



?>




<!DOCTYPE html>
<html>
	<head>
		<title>email</title>
		<link href = "email.css" rel = "stylesheet" type = "text/css" media = "screen">
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
		
		<div class="whole">
			<?php include("Limit.php")?>

			<div class = "welcome">
				<?php 
				if($welcome==true)
					echo "Welcome back! ".$_SESSION['user'];
			?>
			</div>





			<div class="down">		
				<div class="left">
					<ul id="bar">
						<li class="li1"><a href = "email.php">Inbox</a></li>
						<li class="li2"><a href = "email-1.php">Compose</a></li>
						<li class="li3"><a href = "email-3.php">Sent</a></li>
					</ul>		
				</div>
				<div class="right">
					<div class="tag">
						<ul id="tag-ul">
							<li class="holder1">From</li>
							<li class="holder2">Subject</li>
							<li class="holder1">Time</li>
						</ul>
					</div>
					




					


					<?php 
					while($res2=mysql_fetch_array($res)){
						$sender_id = $res2['sender'];
						$email_id = $res2['email_id'];
						$sql7 = "select username from user_info where user_id = '$sender_id';";
						$res3 = $db->send_sql($sql7);
						$res4 = mysql_fetch_array($res3);
						$sname = $res4['username'];
						$sending = 100;
/*echo "<div class=\"content\"><ul id=\"content-ul\"><li class=\"holder1\">".$res4['username']."</li>
							<a href='emailst.php?eid=".$email_id."&sn=".$sname."&srsr=".$sending."><li class=\"holder2\">".$res2['subject']."</li></a>
							<li class=\"holder1\">".$res2['send_date']."</li>
						</ul>
					</div>";*/
					echo "<div class=\"content\"><ul id=\"content-ul\"><li class=\"holder1\">".$res4['username']."</li>
							<a href='emailst.php?eid=".$email_id."&sn=".$sname."&srsr=".$sending."'><li class=\"holder2\">".$res2['subject']."</li></a>
														<li class=\"holder1\">".$res2['send_date']."</li>
						</ul>
					</div>";

					}
						
					?>









				</div>
			</div>
		</div>
		
		<?php include 'footer.php';?>
	</body>
	
		
	
</html>