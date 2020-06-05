<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
		<script type='text/javascript'>
		function sec() {
			var email=document.f1.e1.value;
			var password=document.f1.p1.value;
			
			
			if(email.length==0||password.length==0) {

				if(email.length==0) {
				s1.innerHTML="<font color='red'>Field is Required</font>";
				
				}

				
				if(password.length==0) {
				s2.innerHTML="<font color='red'>Field is Required</font>";
				
				}
			}
			
			else if (email.length>50||password.length>50) {

				if(email.length>50) {
				s3.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				
				}
				
				if(password.length>50) {
				s4.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				
				}
			}
			
			else {
				document.f1.submit();
			}
			
			
			
						
			
		}
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
				<td width='5%'> <a href='index.php'> Home </a></td>
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
			
			<tr align='center'> 
				<td colspan='5'>
					<form method='POST' name='f1' action='user_page.php'>
						<table>
							<tr>
								<td> Email: </td> <td> <input type='email' name='e1' maxlength='50'> </td> <td> <span id='s1'> </span> </td>  <td> <span id='s3'> </span> </td>
							</tr>
							
							<tr>
								<td> Password: </td> <td> <input type='password' name='p1' maxlength='50'> </td> <td> <span id='s2'> </span> </td> <td> <span id='s4'> </span> </td>
							</tr>
							
							<tr>
								<td> </td> <td> <input type='hidden' name='h1' value='holla'>  </td>
							</tr>
							
							<tr>
								<td> <br> <input type='button' value='Login' name='s1' onclick='sec()'> </td> <td> <br> OR <a href='secure_signup.php'>Sign-up</a></td> 
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
		<footer align='center'>
			&copy; All Rights Reserved.	Click <a href="http://www.github.com/abhn/simple-php-mysql-project">here</a> for Github original source.	
			</footer>
</body>
</html>




