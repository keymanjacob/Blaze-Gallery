<?php ob_start();?>
<!DOCTYPE html>

<html lang = "en-us">
	<head>
		<title>sign up</title>
		<style>
			div.background
			  {
			  	position: fixed;
			  	top: 0;
			  	left: 0;
			  width:100% ;
			  height:100%;
			  background:url(11208.png) repeat;
			  overflow: scroll;
			  
			  }
			div.transbox
			  {
			  width:500px;
			  height:;
			  margin:70px 500px 300px 130px;
			  padding-left: 16px;
			  background-color:#ffffff;
			  
			  opacity:0.7;
			  
			  }
			div.transbox p
			  {
			  margin:30px 40px;
			  font-weight:bold;
			  color:#000000;
			  }
			  h5{
			  	color: red;
			  }
		</style>
	</head>
	<body>
		<div class = "background">
			<div class  = "transbox">
				<h1>Sign up page</h1><br/>
				<FORM action="signup.php" method="POST">

				<h4 style="color:red";><label for="name" style = "color:black";>Nick Name: </label><INPUT type="text" name="username" value="" size="40" maxlength="40" placeholder="enter your username"/>*&nbsp;</h4><BR/>
				<h4 style="color:red";><label for="name" style = "color:black";>Your Password : </label><INPUT type="password" name="password" value="" size="40" maxlength="40" placeholder="enter your password"/>*&nbsp;</h4><BR/>
				<h4 style="color:red";><label for="name" style = "color:black";>Confirm Your Password : </label><INPUT type="password" name="password2" value="" size="40" maxlength="40" placeholder="confirm your password"/>*&nbsp;</h4><BR/>
				<h4 style="color:red";><label for="name" style = "color:black";>Email Address : </label><INPUT type="text" name="email" value="" size="40" maxlength="40" placeholder="enter your email"/>*&nbsp;</h4><BR/>
				<h4 style="color:red";><label for="name" style = "color:black";>Confirm Email Address : </label><INPUT type="text" name="email2" value="" size="40" maxlength="40" placeholder="confirm your email"/>*&nbsp;</h4><BR/>
				<label for="name" style = "color:black";><h4>Gender : </h4></label><input type="radio" name="sex" value="male">Male &nbsp;
				<input type="radio" name="sex" value="female">Female<BR/><BR/>
				<label for="name" style = "color:black";><h4>what's up : </h4></label><br><textarea name = "whatsup" rows="4" cols="50" value="" size="80" maxlength="140" placeholder="What's on my mind?"></textarea><br/>
				<INPUT type="submit" value="Submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset Signup Information above"/><BR>
				</form>
				<p>
				<?php

					$jump = false;
					require_once("/Users/fanxiangmin/Sites/newdb.php");
					$db = new database();
					$db->connect();
					$blank = 0;
					
					if (empty($_POST["username"]))
					{
						$blank ++;
						
					}
					 if (empty($_POST["password"]))
					{
						$blank ++;
						
					}
					 if (empty($_POST["password2"]))
					{
						$blank ++;
						
					}
					 if (empty($_POST["email"]))
					{
						$blank ++;
						
					}
					 if (empty($_POST["email2"]))
					{
						$blank ++;
					}
					 if($blank == 0)
					{
						$valid = 0;
						$username = $_POST["username"];
						$sql1 = "select * from user_info where username = '$username'";
						$res = $db->send_sql($sql1);
						$res2 = mysql_fetch_array($res);
						if($res2[username] == $_POST["username"])
						{
							echo "<h5>User Already Exsits! Please choose another name</h5>";
						}
						else
						{
							$valid ++;
						}
						if($_POST["password"] != $_POST["password2"])
						{
							echo "<h5>Password setup invalid. You should put in two identical passwords!</h5>";
						}
						else
						{
							$password = $_POST["password"];
							$password = md5($password);
							$valid ++;
						}
						if(($_POST["email"] != $_POST["email2"])|| !preg_match("/^[-a-z0-9_]+(\.[-a-z0-9_]+)*@[-a-z0-9_]+(\.[-a-z0-9]+)+$/", $_POST["email"]))
						{
							echo "<h5>Email address is invalid, or you may have entered two identical email addresses! Please try again.</h5>";
						}else
						{
							$email = $_POST["email"];
							$valid++;
						}
						if($valid == 3)
						{
							echo "<h5>you are all set</h5>";
							if(empty($_POST["sex"])&&empty($_POST["whatsup"]))
							{
								$sql3 = "insert into user_info (username, password, email) values ('$username', '$password','$email');";
							
							}
							else if(empty($_POST["whatsup"]))
							{
								$sex = $_POST["sex"];
								$sql3 = "insert into user_info (username, password, email, gender) values ('$username', '$password','$email','$sex');";
							
							}
							else
							{
								$whatsup = $_POST["whatsup"];
								$sql3 = "insert into user_info (username, password, email, gender, whats_up) values ('$username', '$password','$email','$sex', '$whatsup');";
							

							}
							$sql4 = "commit;";
							$res3 = $db->send_sql($sql3);
							$res4 = $db->send_sql($sql4);
							$jump = true;
							$redirect_page = 'http://localhost/~fanxiangmin/login.php';
							if($jump == true)
							{
								header('Location: '.$redirect_page);
							}
							//header('Location: /Users/fanxiangmin/Sites/login.php');
							
						}
					}
					else
					{
						echo "<h5>Please complete!<h5>";
					}




				
				?>

				</p>
			</div>
		</div>
		
	</body>
</html>
<?php ob_get_flush();?>