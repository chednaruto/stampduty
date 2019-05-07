<?php
	session_start();
	include("../inc/config.php");
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	//$startdate = '2018-09-01';
	//$enddate = '2018-09-08';

	$sql = "SELECT of.office_code,of.office_name,
	SUM(t.stamp_one_bath) AS stamp_one_bath,
	SUM(t.stamp_five_bath) AS stamp_five_bath,
	SUM(t.stamp_twenty_bath) AS stamp_twenty_bath
	FROM tb_office of 
	LEFT JOIN (
		SELECT CONCAT(SUBSTR(t.officeid,1,2),'000000') as officeid,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath
		FROM tb_sell_minor_sub_transaction t 
		WHERE DATE(t.sell_minor_sub_date) BETWEEN '".$startdate."' AND '".$enddate."'
		UNION
		SELECT CONCAT(SUBSTR(t.officeid,1,2),'000000') AS officeid,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath  
		FROM tb_sell_party_transaction t
		WHERE t.sell_datetime BETWEEN '".$startdate."' AND '".$enddate."'
	) as t ON t.officeid = of.office_code
	WHERE of.office_level IN('02') OR of.office_code = '00000000'
	GROUP BY of.office_code";
	
	$rs = mysql_query($sql,$connection);
	$i = 0;
	while($row = mysql_fetch_assoc($rs)){
		$balance = array("office_name"=>$row['office_name'],"stamp_one_bath"=>(int)$row['stamp_one_bath'],"stamp_five_bath"=>(int)$row['stamp_five_bath'],"stamp_twenty_bath"=>(int)$row['stamp_twenty_bath']);
		$ret[$i] = $balance;
		$i++;
	}
		
	echo json_encode($ret);
	
?>