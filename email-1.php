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
		h4{
			color: red;
		}
		</style>
	</head>
	<body link = "#FF9933" vlink = "#FF9933" alink = "#FF9933">
		<h1 style="color:white">email</h1>
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
						<li class="li1"><a href="email.php">Inbox</a></li>
						<li class="li2"><a href="email-1.php">Compose</a></li>
						<li class="li3"><a href="email-3.php">Sent</a></li>
					</ul>		
				</div>
				<div class="right">
					<form method="POST" action="email-1.php">Compose your email:<br>
						To:<input type="text" name="receiver" size="50" maxlength="50" placeholder="Kate" />
						<br>Subject:<input type="text" name="subject" size="50" maxlength="100" placeholder="Greeting" />
						<br>Content:<br>
						<textarea name="content" COLS=80 ROWS=15></textarea>
						<input name="submit" type="submit" value="send" />
					</form>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php


				if(isset($_POST['receiver'])&&isset($_POST['subject'])&&isset($_POST['content']))
				{
					$rcr = addslashes($_POST['receiver']);
					$subject = $_POST['subject'];
					$mail = $_POST['content'];
					$sql6 = "select * from user_info where username = '$rcr';";
					$res0 = $db->send_sql($sql6);
					$ress = mysql_fetch_array($res0);
					if($ress['username']==$rcr)
					{$rcd = $ress['user_id'];
					$sql8 = "insert into email(sender,receiver,subject,mail) values('$uuid','$rcd','$subject','$mail');";
					$sql5 = "commit;";
					$res = $db->send_sql($sql8);
					$res2 = $db->send_sql($sql5);
					$red2 = "email-3.php?S=1";
					header('Location: '.$red2);}
					else{
						echo "<h4>You got wrong name</h4>";
					}

				}else{
					echo "<h4>Please complete your email!!!</h4>";
				}

				include ("footer.php");
			?>
		</div>
	</body>
	<footer>
		
	</footer>
</html>