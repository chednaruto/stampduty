<?php
	session_start();
	include("../inc/config.php");

	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$sql_c = "SELECT of.office_code,of.office_name,
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
	WHERE of.office_level = '02' OR of.office_code = '00000000'
	GROUP BY of.office_code"; 
	
	$rs_c = mysql_query($sql_c,$connection);
	$rows = array();
	while($r = mysql_fetch_assoc($rs_c)) {
		$rows['LABEL'][] = array('label'=>$r['office_name']);
		$rows['STAMP1'][] = array('value'=>(int)$r['stamp_one_bath']);
		$rows['STAMP5'][] = array('value'=>(int)$r['stamp_five_bath']);
		$rows['STAMP20'][] = array('value'=>(int)$r['stamp_twenty_bath']);
		//$rows['SELL'][] = $r;
	}
	
	header('Content-type: application/json');
	echo json_encode($rows);
	
	
	
	
	
	
	
	
	function GetYearThai($datetime){
	$ret = array(
		"BEGINYEAR"=>"",
		"ENDYEAR"=>""
	);
	$time = strtotime($datetime);
	$year = date('Y',$time);
	$month = date('m',$time);
	
	if(($month-0)<10){
	
		$ret["BEGINYEAR"] = $year-1;
		$ret["ENDYEAR"] = $year;
	}else{

		$ret["BEGINYEAR"] = $year;
		$ret["ENDYEAR"] = $year+1;
	}
	return $ret;
}

?>