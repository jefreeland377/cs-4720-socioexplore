<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
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
				<td width='5%'> <a href='index.php'>Home </a></td>
				<td width='5%'> <a href='send_message.php'>Send Message </a></td>
				<td width='5%'> <a href='inbox.php'>Inbox (Only Recent Message)</a></td>
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
				if(IsSet($_SESSION["user_id"])) {
					session_unset();
					session_destroy();
					
					echo "<tr align='center'> <td colspan='5'> <font color='green'> Logged out Successfully! </font> Login again: <a href='login.php'>Login</a> </td> </tr>";
					if(IsSet($_SESSION['user_id'])) {
						}
					else {
						Header("Location: index.php");
					}
				}
				else {
					echo "<tr align='center'> <td colspan='5'> <font color='red'> Sorry, You not Logged in! </font> Login again: <a href='login.php'>Login</a> </td> </tr>";
				}
			?>
		</table>
			<footer align='center'>
			&copy; All Rights Reserved.	Click <a href="http://www.github.com/abhn/simple-php-mysql-project">here</a> for Github original source.	
			</footer>
</body>
</html>
