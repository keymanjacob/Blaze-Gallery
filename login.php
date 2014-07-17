<?php 
	session_start();
	ob_start();
	
?>
<!DOCTYPE html>
<html lang = "en-us">
	<head>
		<title>login</title>
		<style>
		
			div.background
			  {
			  	overflow: scroll;
			  	position: fixed;
			  width: 100%;
			  height:100%;
			  top: 0;
			  left: 0;
			  background:url(9487.jpg) repeat;
			  border:2px solid black;
			  }
			div.transbox
			  {
			  width:900px;
			  height:300px;
			  margin:150px 400px 300px 100px;
			  background-color:#ffffff;
			  
			  opacity:0.7;
			  filter:alpha(opacity=60); /* For IE8 and earlier */
			  }
			div.transbox p
			  {
			  text-align:right;
			  margin:30px 40px;
			  font-weight:bold;
			  color:#000000;
			  }
			  div.new{
			  	position: relative;
			  	padding-left: 30%;


			  }
			  h1{
			  	margin-left:80px;
			  }
			  h4{margin-left:30%;
			  	margin-top:  4%;
			  	color:red;}
			  input#b1{
			  	
			  	top: 310px;
			  	left: 370px;
			  }
			  input#b2{
			  	position: absolute;
			  	top: 160px;
			  	left: 539px;
			  }
		</style>
	</head>
	<body>
		
			
		
		<div class = "background">
			<div class = "transbox">
				
				<div class = "new">
					<h1>login page</h1><br/>
					<FORM action="login.php" method="POST">
					<label for="name" style = "color:black";><b>Username: </b></label><INPUT type="text" name="username" value="" size="40" maxlength="100" placeholder="username"/><BR/>
					<br/>
					<label for="name" style = "color:black";><b>Password:   </b></label><INPUT type="password" name="password" value="" size="40" maxlength="100" placeholder="password"/><BR/>
					<br/><INPUT type="submit" value="Submit"/ id = "b1">
					</form>
					<form action="signup.php" method="POST">
    					<input type="submit" value="Sign up" id = "b2" />
					</form>
				</div>
				
		
		<?php
		if(isset($_GET['logout']))
		{
			session_unset();
			session_destroy();
		}
			require_once("/Users/fanxiangmin/Sites/newdb.php");
			$db = new database();
			$db->connect();
			$jump = false;
			
		if(!isset($_POST["username"]))
		{
			echo "<h4>Please Enter a user name!</h4>";
		}
		else if(!isset($_POST["password"]))
		{
			echo "<h4>Are you kidding me?</h4>";
		}
		else{
			$username = $_POST["username"];
			$password = $_POST["password"];
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			
			$tpassword = md5($password);
			$sql1 = "select * from user_info where username = '$username'";
			$res = $db->send_sql($sql1);
			$res2 = mysql_fetch_array($res);
			if($res2[username] != $username)
			{
				echo "<h4>User Not Exsits!</h4>";
			}else if($res2[password] != $tpassword)
			{
				
				echo "<h4>Wrong Password!</h4>";
				

			}
			else
			{
				

				echo "Hey, you are safe now";
				$_SESSION['user_id'] = $res2[user_id];
				$_SESSION['user'] = $username;
				$_SESSION['login'] = true;
				$jump = true;
				$redirect_page = 'index.html';
				if($jump == true)
				{
					header('Location: '.$redirect_page);
				}
			}


			
		}
		
		?>
			
			</div>


		</div>
		
		
	</body>
</html>
<?php ob_end_flush();?>