<?php

//define('servername', 'localhost');
//define('username', 'jfreela3');
//define('password', 'password2');
//define('dbname', 'jfreela3');

$config = parse_ini_file('/home/jfreela3/public_html/Final-Project/netID/config.ini');

$resid=MySQLi_Connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
					if(MySQLi_Connect_Errno()) {
						echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
					}
					else {
					}
?>