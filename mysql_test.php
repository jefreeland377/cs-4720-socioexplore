<html>

<!-- 
This was a test script I wrote to get the hang of making MySQL queries. It doesn't detract from the rest of the project, so I left it in. This is still accessible if you type it into the URL, if you'd like to see it in action for whatever reason.

- Jacob Freeland
-->

<?php
$config = parse_ini_file('/home/jfreela3/public_html/Final-Project/netID/config.ini');
$resid = MySQLi_Connect($config['servername'],$config['username'],$config['password'],$config['dbname']);

if(MySQLi_Connect_Error())
{
	echo "whoops lol";
}
else
{
	$query = "select * from students";
	$result = MySQLi_Query($resid, $query);
	
	if (!$result)
	{
		echo "Failed to connect to MySQL: " . MySQLi_Error($resid);
	}
	else
	{
		while($element = MySQLi_Fetch_Row($result))
		{
			echo $element[1] . " " .
				$element[2] . " " .
				$element[3] . " " .
				$element[4] . " " .
				$element[5] . "<br>";
		}
	}
}
?>
</html>