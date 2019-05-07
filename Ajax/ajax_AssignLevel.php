<?php
	session_start();
	include("../inc/config.php");
		$_SESSION['OFFICEID'] = $_POST['officeid'];
		
		$sql = 'SELECT * FROM tb_office t WHERE t.office_code = "'.$_POST['officeid'].'"';
		$rs = mysql_query($sql,$connection);
		$row = mysql_fetch_assoc($rs);
		$_SESSION['OFFICENAME'] = $row['office_name'];
		$_SESSION['OFFICELEVEL'] = $row['office_level'];

		echo "TRUE";
?>