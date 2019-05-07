<?php
	include("../inc/config.php");
	
		$sql_c = "SELECT 
'กำหนดวงเงินเก็บรักษา' AS target,
COUNT(DISTINCT CASE WHEN t.LimitStatus = 'Y' THEN t.office_code END) STY,
COUNT(DISTINCT CASE WHEN t.LimitStatus = 'N' THEN t.office_code END) STN
FROM (
	SELECT t.office_code,t.office_name,t.office_limit_money,if(t.office_limit_money>0,'Y','N') AS LimitStatus,ti.balance_1bath,ti.balance_5bath,ti.balance_20bath,
	if(ti.balance_1bath+ti.balance_5bath+ti.balance_20bath>0,'Y','N') AS BalanceStatus
	FROM tb_office t 
	LEFT JOIN tb_innit_stock ti ON t.office_code = ti.officeid
	WHERE t.office_level IN('02','03','04')
) as t
UNION ALL
SELECT 
'บันทึกยอดยกมา' AS target,
COUNT(DISTINCT CASE WHEN t.BalanceStatus  = 'Y' THEN t.office_code END) STY,
COUNT(DISTINCT CASE WHEN t.BalanceStatus = 'N' THEN t.office_code END) STN
FROM (
	SELECT t.office_code,t.office_name,t.office_limit_money,if(t.office_limit_money>0,'Y','N') AS LimitStatus,ti.balance_1bath,ti.balance_5bath,ti.balance_20bath,
	if((ti.balance_1bath+ti.balance_5bath+ti.balance_20bath)>=0 AND ti.balance_1bath IS NOT NULL,'Y','N') AS BalanceStatus
	FROM tb_office t 
	LEFT JOIN tb_innit_stock ti ON t.office_code = ti.officeid
	WHERE t.office_level IN('02','03','04')
) as t";
	
	
	
	$rs_c = mysql_query($sql_c,$connection);
	$rows = array();
	while($r = mysql_fetch_assoc($rs_c)) {
		$rows['LABEL'][] = array('label'=>$r['target']);
		$rows['STY'][] = array('value'=>(int)$r['STY']);
		$rows['STN'][] = array('value'=>(int)$r['STN']);
		
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