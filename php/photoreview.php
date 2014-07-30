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


		$uuid = $_SESSION['user_id'];
			$uun = $_SESSION['user'];
		$pho_id = $_GET['PD'];
		$pho_ownerid = $_GET['PN'];
		$photaker = $_GET['PT'];
		$pho_name = $_GET['PE'];
		$pho = $_GET['PK'];
		$friend = 0;
		//$sql = "select * from photo"
		//echo "dsadasdsa";
		$sql91 = "select * from user_info where user_id = '$pho_ownerid';";
		$sql = "select * from comment where photo_id = '$pho_id'";
		$sql5 = "select * from relationship where follower = '$uuid' and followee = '$pho_ownerid'";
		$res = $db->send_sql($sql);
		$res3 = $db->send_sql($sql5);
		$res7 = $db->send_sql($sql91);
		$rrr = mysql_fetch_array($res7);
		$poc = $rrr['prolink'];
		if($pho_ownerid==$uuid)
		{
			$friend = 2;
		}
		else if(mysql_fetch_array($res3))
		{
			$friend = 1;
		}else{
			$friend = 0;
		}

		//$res2 = mysql_fetch_array($res);


	}
?>
<!DOCTYPE html>
<html lang = "en-us">
	<head><title>Photo Review</title>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/lightbox-2.6.min.js"></script>
	<link href="css/lightbox.css" rel="stylesheet" />
	<link href = "rr.css" rel = "stylesheet" type = "text/css" media = "screen">
	<style>

	div#tname{
		color: black;
		position: relative;
		width: 160px;
		height: ;
		top:-65px;
		left: 790px;
		
		background-color: white;
		z-index: 3;
	}
	div#tname ul{
		list-style-type: none;
	}
	
	div.welcome{
			color: white;
			position: relative;
			top: 100px;
			left: 3px;
			float: left;
			z-index: 1;
	}


			#pic{height: 550px; width:1000px;
			position:relative; top: 125px; left: 250px; z-index: 2;}
			body,html{margin:0;padding:0;height: 100%;width: 100%;}
			
			div#photoinfo{
				position: relative;
				width: 1000px;
				height: 80px;
				top: 140px;
				left: 250px;
				
				z-index: 1;
				background-color: white;
				
			}

			div#phtaker{
				border: 1px solid white;
				position: relative;
				top:-20px;
				left: 700px;
				width: 80px;
				height: 78px;
				z-index: 2;

			}
			div#comment{
				position: relative;
				
				width: 1000px;
				top:140px;
				left: 250px;
				min-height: 100px;
				z-index: 10;
				
				background-color: white;

			}
			

			
	div#bacc{
		
		overflow: scroll;
		background-color: black;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
	}

	
			div.mc{
			position: relative;
			top: 5px;
			left: 5px;


		}
		div.mc .tx{
			position: relative;
			top: 0px;
			left: 0px;
		}
		div.mc #sb{
			position: relative;
			top: 0px;
			left: 30px;

		}
		div .mc #dsb{
			position: relative;
			top: 0px;
			left: 5px;
		}



		div.cm{
			position: relative;
			top: 5px;
			left: 5px;

		}
		div .p{
			position: relative;
			width: 400px;
			min-height: 80px;
			left: 100px;
			top: -80px;
			color: black;
			
		}
		div.cm .tx{
			position: relative;
			top: -82px;
			left: 90px;
		}
		div.cm #sb{
			position: relative;
			top: -60px;
			left: 30px;

		}
		div .cm #dsb{
			position: relative;
			top: -80px;
			left: 5px;
		}


	</style>

	</head>

	<body link = "#FF9933" vlink = "#FF9933" alink = "#FF9933">
		<div id = "bacc">
			<?php include 'Limit.php';?>
			<div class = "welcome">
					<?php 
					if($welcome==true)
						echo "Welcome back! ".$_SESSION['user'];
					//echo $pho."dsadsad===".$pho_id;
				?>
			</div>
			
			

			
				<a href="<?php echo $pho;?>" data-lightbox="roadtrip" title="Click on the right side of the image to move forward.">
				<img id="pic" src="<?php echo $pho;?>"/></a>
			
			<div id="photoinfo">
				<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>".$pho_name."</b>";?>
				<div id ="phtaker">
					
						<img style= "width:80px;height:80px;" src="<?php echo $poc;?>"/>
					
				</div>
				<div id="tname">
					<ul>
						<li><?php echo $photaker;?></li>
						<li> <?php echo '<form action="photoreview.php?PK='.$pho.'&PD='.$pho_id.'&PT='.$photaker.'&PE='.$pho_name.'&PN='.$pho_ownerid.'" method="POST">';?>
							
							<?php if($friend==0)
							{
								echo '<input type="submit" name="addfriend" value="follow" /></form>';
								if("follow"==$_POST['addfriend'])
						{
							$sql6 = "insert into relationship (follower, followee) values('$uuid','$pho_ownerid');";
							//$sql7 = "commit";
							$res9 = $db->send_sql($sql6);
							//$res = $db->send_sql($sql7);
							$red2 = "photoreview.php?PK=".$pho."&PD=".$pho_id."&PT=".$photaker."&PE=".$pho_name.'&PN='.$pho_ownerid;
				header('Location: '.$red2);
						}
							}else if($friend==1)
							{
								echo '<input type="submit" name="addfriend" value="stop following" /></form>';
								if("stop following"==$_POST['addfriend'])
						{
							$sql6 = "delete from relationship where follower = '$uuid' and followee = '$pho_ownerid';";
							//$sql7 = "commit";
							$res9 = $db->send_sql($sql6);
							//$res = $db->send_sql($sql7);
							$red2 = "photoreview.php?PK=".$pho."&PD=".$pho_id."&PT=".$photaker."&PE=".$pho_name.'&PN='.$pho_ownerid;
				header('Location: '.$red2);
						}
							}

							?>

														
							
						</li>
					</ul>
				</div>
				<div id="des">
					<?php echo $pho_name;?>

				</div>



				
			</div>

			<div id="comment">

				<?php while($res2 = mysql_fetch_array($res))
				{
					$commenter = $res2['username'];
					$content = $res2['comments'];
					$time = $res2['date_start'];

					$sqlw = "select * from user_info where username = '$commenter';";
					$ssd = $db->send_sql($sqlw);
					$ssl = mysql_fetch_array($ssd);
					$ppj = $ssl['prolink'];





					echo "<HR/><BR/><div class = \"cm\"><img style= \"width:80px;height:80px;\"src =\"$ppj\"/><div class = \"p\">".$content."<br><br><h5 style = \"color:#505050;float:left bottom;\";>".$time."</h5></div><div id = \"dsb\">".$commenter."<br></div></div><BR/>";
				}?>



				<?php 
				$sqlq = "select * from user_info where user_id = '$uuid';";
				$ssc = $db->send_sql($sqlq);
				$ssb = mysql_fetch_array($ssc);
				$ppl = $ssb['prolink'];


				?>
				<div class = "mc"><img style= "width:80px;height:80px;"src ="<?php echo $ppl;?>"/><form action="<?php echo "photoreview.php?PK=".$pho."&PD=".$pho_id."&PT=".$photaker."&PE=".$pho_name."&PN=".$pho_ownerid;?>" method ="POST"><textarea class="tx" name = "comm" rows="6" cols="90" value="" size="140" maxlength="140"  placeholder="Leave your comment here."></textarea><input  type="submit" value="submit"/></form><div id = "dsb"><?php echo $uun;?></div></div><BR/>
			</div>

			<?php 
			
			if(isset($_POST['comm'])&&(!empty($_POST['comm'])))
			{
				$cons=$_POST['comm'];
				$sql3 = "insert into comment (photo_id, user_id, comments,username ) values ('$pho_id', '$uuid','$cons','$uun');";
				$sql4 = "commit";
				$res = $db->send_sql($sql3);
				$res = $db->send_sql($sql4);
				$red2 = "photoreview.php?PK=".$pho."&PD=".$pho_id."&PT=".$photaker."&PE=".$pho_name.'&PN='.$pho_ownerid;
				header('Location: '.$red2);
							
			}else{
				echo "Please at least write something.";
			}



			?>


		

			
		</div>


	</body>
</html>
<?php ob_end_flush();?>