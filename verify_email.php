<!-- gotcha3 gotcha4 Security AND PHP/MySQL enhancements here -->
<?php
Session_start();
?>
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
				<td width='5%'> <?php Session_start(); if(IsSet($_SESSION["user_id"])) {echo "<a href='user_page.php'>"; } else {echo "<a href='index.php'>";}?>Home </a></td>
				<td width='5%'> <a href='login.php'>Login </a></td>
				<td width='5%'> <a href='secure_signup.php'>Sign-up </a></td> 
				<td width='5%'> <a href='contact-us.html'>Contact Me </a></td>
				<td width='5%'> <a href='about-us.html'>About Me </a></td>
			</tr>
			
			<tr>
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
			</tr>
			
			<?php
			if(IsSet($_SESSION["user_id"]))
			{
				$config = parse_ini_file('/home/jfreela3/public_html/Final-Project/netID/config.ini');
				$resid = MySQLi_Connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
				$user_here = $_SESSION["user_id"];
				
				$code_query = MySQLi_Query($resid, "select code from verify_email where user_id = $user_here");
				$code_here = MySQLi_Fetch_Assoc($code_query);
				
				$email_to = $_SESSION["email"];
				$email_subject = "[AUTOMATED EMAIL] CS4270 Section 01 SMA Email Verification";
				$email_content = "Your email verification code is " . $code_here["code"] . ".";
				$email_headers = "From: jfreela3@students.kennesaw.edu";
				
				$send_mail = mail($email_to, $email_subject, $email_content, $email_headers);
				if($send_mail)
				{
					echo "<tr align='center'> <td colspan='5'> An email with your verification code has been sent to <strong>" . $_SESSION["email"] . "</strong>.</td> </tr>";
				}
				else
				{
					echo "<tr align='center'> <td colspan='5'> Something went wrong! Maybe this server can't send mail after all...</td> </tr>";
				}
				
				echo "<tr align='center'> <td colspan='5'> Enter the verification code in your email here: 
				<form name='verify_form' method='POST' action='view_profile.php'>
					<input type='text' name='code'>
					<input type='submit'>
				</form>
				</td> </tr>";
			}
			else
			{
				echo "<tr align='center'> <td colspan='5'> <font color='red'> Sorry, You not Logged in! </font> Login again: <a href='login.php'>Login</a> </td> </tr>";
			}
			
			
			?>
			
			
		</table>
			<footer align='center'>
			&copy; All Rights Reserved.	Click <a href="http://www.github.com/abhn/simple-php-mysql-project">here</a> for Github original source.	
			</footer>
</body>
</head>
