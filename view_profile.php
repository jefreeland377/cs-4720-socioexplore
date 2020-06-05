<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
	<script src='jquery.js'></script>
	<script type='text/javascript'>
	$(document).ready(function() 
	{
		$("#sam").hide(2000);
	});
	</script>
</head>
<body>
		<table cellpadding='3' cellspacing='3' class='tab_main'>
			<!--Logo-->
			<tr>
				<td  colspan='5'>
					<div>
						<img src='images/newlogo.jpeg' width='100%'>
						<div class="logo-text">
							<font style="color:white; font-family:'PT Sans Narrow','Tahoma',sans-serif;">
								<font style="font-size:2em; font-weight:bold;">
									Socioexplore <br>
								</font>
								<font style="font-size=1em; font-weight:normal">
									CS 4270 Internet Programming Final Project
								</font>
							</font>
						</div>
					</div>
				</td>
			</tr>
			<!--Nav_Tabs-->
			<tr align='center' bgcolor='lightgrey' class='td_bor'>
				<td width='5%'> <?php Session_start(); if(IsSet($_SESSION["user_id"])) {echo "<a href='user_page.php'>"; } else {echo "<a href='index.php'>";}?>Home </a></td>
				<td width='5%'> <a href='send_message.php'>Send Message </a></td>
				<td width='5%'> <a href='inbox.php'>Inbox (Only Recent Message) </a></td>
				<td width='5%'> <a href='view_profile.php'>View Profile </a></td>
				<td width='5%'> <a href='signout.php'>Signout </a></td>

			</tr>
			
			<tr>
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
			</tr>
			
			<?php
			Session_start();
			$config = parse_ini_file('/home/jfreela3/public_html/Final-Project/netID/config.ini');
			$resid = MySQLi_Connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
			if(MySQLi_Connect_Errno())
			{
				echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
			}
			
			if(IsSet($_SESSION["user_id"]))
			{
				if ($_SERVER["REQUEST_METHOD"] == "POST")
				// If we arrived to this page from verify_email.php (which redirects here), check if the code the user provided is the code that was provided to them
				{
					$user_here = $_SESSION["user_id"];
					$code_query = MySQLi_Query($resid, "select code from verify_email where user_id = $user_here");
					$code_here = MySQLi_Fetch_Assoc($code_query);
					
					if ($_POST["code"] == $code_here["code"])
					{
						$correct_query = MySQLi_Query($resid, "update verify_email set verified=1 where user_id=$user_here");
						?>
						<script type="text/javascript" src="notify.js"></script>
						<script>
						$(document).ready(function()
						{
						  $.notify(
						  "Email Verified!","success");
						});
						</script>
						<?php
					}
					else
					{
						?>
						<script type="text/javascript" src="notify.js"></script>
						<script>
						$(document).ready(function()
						{
						  $.notify(
						  "Code Invalid! Try Again.","error");
						});
						</script>
						<?php
					}
				}
				
				echo "<tr> <td colspan='5' align='center'> <table align='center'>
					<tr  align='center'>
						<td align='right'>Name: </td> <td align='left'>".$_SESSION["name"]." </td> </tr> 
					<tr align='center'>
						<td align='right'>Email: </td> <td align='left'>".$_SESSION["email"]." </td> </tr>
					<tr align='center'>
						<td align='right'>Gender: </td> <td align='left'>".$_SESSION["gender"]."</td> </tr>
					<tr align='center'>
						<td align='right'>Age: </td> <td align='left'>".$_SESSION["age"]."  </td> </tr>
					<tr align='center'>
						<td align='right'>Password: </td> <td align='left'>".$_SESSION["password"]."  </td> </tr> 
						</table> </td> </tr>";
				
				$user_here = $_SESSION["user_id"];
				$verify_query = MySQLi_Query($resid, "select verified from verify_email where user_id = $user_here");
				$verified_here = MySQLi_Fetch_Assoc($verify_query);
				
				if ($verified_here)
				{
					if ($verified_here["verified"] == 0)
					{
						echo "<tr align='center'> <td colspan='5'> You have not verified your email! You can do so <a href = 'verify_email.php'>here</a>. </td> </tr>";
					}
					else
					{
						echo "<tr align='center'> <td colspan='5'> You have verified your email. </td> </tr>";
					}
				}
				else
				{
					echo "<tr align='center'> <td colspan='5'> You have an account, but not an entry in verify_email?? Panic panic panic abort </td> </tr>";
				}
			}
			else
			{
				echo "<tr align='center'> <td colspan='5'> <font color='red'> Sorry, You not Logged in! </font> Login again: <a href='login.php'>Login</a> </td> </tr>";
			}
			
			MySQLi_Close($resid);
			?>
			
			</table>
			<footer align='center'>
			&copy; All Rights Reserved.	Click <a href="http://www.github.com/abhn/simple-php-mysql-project">here</a> for Github original source.	
			</footer>
</body>
</html>
