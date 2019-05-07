<?php
	$CONFIG["shopMail"] = "chednaruto@gmail.com";

	// ------------------------------------------------------------------------
	$CONFIG["server"] = "10.26.17.12";
	$CONFIG["mySQLUsernm"] = "sa";
	$CONFIG["mySQLPasswd"] = "sa";
	$CONFIG["dbname"] = "stampduty";
	$connection = @mysql_pconnect($CONFIG["server"],$CONFIG["mySQLUsernm"],$CONFIG["mySQLPasswd"]) or die('<div style="text-align: center;padding: 100px 0px;">Error Connect mySQL Server</div>');
	if(!@mysql_select_db($CONFIG["dbname"],$connection))
		exit();
	mysql_query("SET NAMES UTF8",$connection);
	

	date_default_timezone_set("Asia/Bangkok");
	$year = "2559";
?>