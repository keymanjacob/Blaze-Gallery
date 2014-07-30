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
		//$sql = "select * from email where receiver = '$uuid'; ";
		//$res = $db->send_sql($sql);
		$sor = $_GET['srsr'];




		$email_id = $_GET['eid'];
		$to = $_GET['sn'];
		$from = $_GET['sn'];
		$sql = "select * from email where email_id = '$email_id';";
		$res = $db->send_sql($sql);
		$res2 = mysql_fetch_array($res);
		//echo "dsadasdsa";

	}



?>


<!DOCTYPE html>
<html>
	<head>
		<title>checking emails</title>
		<link href = "email.css" rel = "stylesheet" type = "text/css" media = "screen">
		<style>
			div#showmessage{
				border:none;
				font-size: 22px;
				color: black;
				background-color: white;

			}
		</style>
	</head>
	<body link = "#FF9933" vlink = "#FF9933" alink = "#FF9933">
		
		<div class="whole">
			<?php include("Limit.php")?>
			<div class="down">		
				<div class="left">
					<ul id="bar">
						<li class="li1"><a href="email.php">Inbox</a></li>
						<li class="li2"><a href="email-1.php">Compose</a></li>
						<li class="li3"><a href="email-3.php">Sent</a></li>
					</ul>		
				</div>
				<div class="right">
					<div class="content">
						<div id = "showmessage">

						<?php 

						if($sor == 100)
						{
							$subject = $res2['subject'];
						//$to = $res2['receiver'];
						$time = $res2['send_date'];
						$content = $res2['mail'];

						echo '<b>Subject: </b>'.$subject.'<br/><b>From: </b>'.$from.'<br/><b>When: </b>'.$time.'<br/><b>Content: </b><br><p>'.$content.'</p>';

					}else if($sor==201)
					{
						$subject = $res2['subject'];
						//$from = $res2['sender'];
						$time = $res2['send_date'];
						$content = $res2['mail'];

						echo '<b>Subject: </b>'.$subject.'<br/><b>To: </b>'.$to.'<br><b>When: </b>'.$time.'<br/><b>Content: </b><br><p>'.$content.'</p>';
						
					}






						?>



						</div>

					</div>
					
					
				</div>
			</div>
		</div>
		<div class="footer">
			<?php
				include ("footer.php");
			?>
		</div>
	</body>
	<footer>
		
	</footer>
</html>