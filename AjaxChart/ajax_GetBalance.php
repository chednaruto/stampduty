<?php
	session_start();
	include("../inc/config.php");
	if($_SESSION['OFFICELEVEL']=='00'){
		$sql_c = "SELECT t.office_code,t.office_name,SUM(tc.balance_1bath) AS balance_1bath,SUM(tc.balance_5bath) AS balance_5bath,SUM(tc.balance_20bath) AS balance_20bath
		FROM tb_office t 
		LEFT JOIN (
			SELECT * FROM (
			SELECT if(SUBSTR(t.officeid,1,2)='00','00005000',CONCAT(SUBSTR(t.officeid,1,2),'000000')) AS officeid,'ADD' target,t.balance_1bath,t.balance_5bath*5 AS balance_5bath,t.balance_20bath*20 AS balance_20bath,t.stock_date FROM tb_innit_stock t 
			UNION
			SELECT if(SUBSTR(t.officeid,1,2)='00','00005000',CONCAT(SUBSTR(t.officeid,1,2),'000000')) AS officeid,'ADD' target,t.stamp_one_bath,t.stamp_five_bath*5,t.stamp_twenty_bath*20,t.receive_transaction_date FROM tb_receive_transaction t 
			UNION 
			SELECT if(SUBSTR(t.officeid,1,2)='00','00005000',CONCAT(SUBSTR(t.officeid,1,2),'000000')) AS officeid,'PAY' target,0-t.allowed_withdraw_one_bath,(0-t.allowed_withdraw_five_bath)*5,(0-t.allowed_withdraw_twenty_bath)*20,t.allowed_withdraw_transaction_date FROM tb_allowed_withdraw_transaction t WHERE t.pay_document_number IS NOT NULL
			UNION
			SELECT if(SUBSTR(t.officeid,1,2)='00','00005000',CONCAT(SUBSTR(t.officeid,1,2),'000000')) AS officeid,'PAY' target,0-t.stamp_one_bath,(0-t.stamp_five_bath)*5,(0-t.stamp_twenty_bath)*20,t.sell_datetime FROM tb_sell_party_transaction t 
			UNION 
			SELECT if(SUBSTR(t.officeid,1,2)='00','00005000',CONCAT(SUBSTR(t.officeid,1,2),'000000')) AS officeid,'PAY' target,0-t.stamp_one_bath,(0-t.stamp_five_bath)*5,(0-t.stamp_twenty_bath)*20,t.sell_minor_sub_date FROM tb_sell_minor_sub_transaction t 
			) as tb_transaction ORDER BY tb_transaction.stock_date ASC
		) AS tc ON t.office_code = tc.officeid
		WHERE t.office_level = '02'
		OR t.office_code LIKE '00005000'
		GROUP BY t.office_code"; 
	}else if($_SESSION['OFFICELEVEL']=="02"){
		$sql_c = "SELECT t.office_code,t.office_name,SUM(tc.balance_1bath) AS balance_1bath,SUM(tc.balance_5bath) AS balance_5bath,SUM(tc.balance_20bath) AS balance_20bath
		FROM tb_office t 
		LEFT JOIN (
			SELECT if(SUBSTR(t.officeid,1,5)='00','00005000',CONCAT(SUBSTR(t.officeid,1,5),'000')) AS officeid,'ADD' target,t.balance_1bath,t.balance_5bath*5 AS balance_5bath,t.balance_20bath*20 AS balance_20bath,t.stock_date FROM tb_innit_stock t 
			UNION
			SELECT t.t.officeid,'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath*5,tb.allowed_withdraw_twenty_bath*20,tb.allowed_withdraw_transaction_date 
			FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
			WHERE tb.allowed_withdraw_status = 'Y'
			UNION 
			SELECT if(SUBSTR(t.officeid,1,5)='00','00005000',CONCAT(SUBSTR(t.officeid,1,5),'000')) AS officeid,'PAY' target,0-t.allowed_withdraw_one_bath,(0-t.allowed_withdraw_five_bath)*5,(0-t.allowed_withdraw_twenty_bath)*20,t.allowed_withdraw_transaction_date FROM tb_allowed_withdraw_transaction t WHERE t.pay_document_number IS NOT NULL
			UNION
			SELECT if(SUBSTR(t.officeid,1,5)='00','00005000',CONCAT(SUBSTR(t.officeid,1,5),'000')) AS officeid,'PAY' target,0-t.stamp_one_bath,(0-t.stamp_five_bath)*5,(0-t.stamp_twenty_bath)*20,t.sell_datetime FROM tb_sell_party_transaction t 
			UNION 
			SELECT if(SUBSTR(t.officeid,1,5)='00','00005000',CONCAT(SUBSTR(t.officeid,1,5),'000')) AS officeid,'PAY' target,0-t.stamp_one_bath,(0-t.stamp_five_bath)*5,(0-t.stamp_twenty_bath)*20,t.sell_minor_sub_date FROM tb_sell_minor_sub_transaction t 
		) AS tc ON t.office_code = tc.officeid
		WHERE t.office_level = '03'
		AND t.office_code LIKE '".substr($_SESSION['OFFICEID'],0,2)."%'
		GROUP BY t.office_code";
		
	}else if($_SESSION['OFFICELEVEL']=="03"){
		$sql_c = "SELECT t.office_code,t.office_name,SUM(tc.balance_1bath) AS balance_1bath,SUM(tc.balance_5bath) AS balance_5bath,SUM(tc.balance_20bath) AS balance_20bath
		FROM tb_office t 
		LEFT JOIN (
			SELECT t.officeid AS officeid,'ADD' target,t.balance_1bath,t.balance_5bath*5 AS balance_5bath,t.balance_20bath*20 AS balance_20bath,t.stock_date FROM tb_innit_stock t 
			UNION ALL
			SELECT t.t.officeid,'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,tb.allowed_withdraw_transaction_date 
			FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
			WHERE tb.allowed_withdraw_status = 'Y'
			UNION 
			SELECT t.officeid,'PAY' target,0-t.allowed_withdraw_one_bath,(0-t.allowed_withdraw_five_bath)*5,(0-t.allowed_withdraw_twenty_bath)*20,t.allowed_withdraw_transaction_date FROM tb_allowed_withdraw_transaction t WHERE t.pay_document_number IS NOT NULL
			UNION
			SELECT t.officeid,'PAY' target,0-t.stamp_one_bath,(0-t.stamp_five_bath)*5,(0-t.stamp_twenty_bath)*20,t.sell_datetime FROM tb_sell_party_transaction t 
			UNION 
			SELECT t.officeid,'PAY' target,0-t.stamp_one_bath,(0-t.stamp_five_bath)*5,(0-t.stamp_twenty_bath)*20,t.sell_minor_sub_date FROM tb_sell_minor_sub_transaction t 
		) AS tc ON t.office_code = tc.officeid
		WHERE t.office_level = '04'
		AND t.office_code LIKE '".substr($_SESSION['OFFICEID'],0,5)."%'
		GROUP BY t.office_code";
	}else{
		$sql_c = "SELECT t.office_code,t.office_name,SUM(tc.balance_1bath) AS balance_1bath,SUM(tc.balance_5bath) AS balance_5bath,SUM(tc.balance_20bath) AS balance_20bath
		FROM tb_office t 
		LEFT JOIN (
			SELECT t.officeid AS officeid,'ADD' target,t.balance_1bath,t.balance_5bath*5 AS balance_5bath,t.balance_20bath*20 AS balance_20bath,t.stock_date FROM tb_innit_stock t 
			UNION
			SELECT t.t.officeid,'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,tb.allowed_withdraw_transaction_date 
			FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
			WHERE tb.allowed_withdraw_status = 'Y'
			UNION 
			SELECT t.officeid,'PAY' target,0-t.allowed_withdraw_one_bath,(0-t.allowed_withdraw_five_bath)*5,(0-t.allowed_withdraw_twenty_bath)*20,t.allowed_withdraw_transaction_date FROM tb_allowed_withdraw_transaction t WHERE t.pay_document_number IS NOT NULL
			UNION
			SELECT t.officeid,'PAY' target,0-t.stamp_one_bath,(0-t.stamp_five_bath)*5,(0-t.stamp_twenty_bath)*20,t.sell_datetime FROM tb_sell_party_transaction t 
			UNION 
			SELECT t.officeid,'PAY' target,0-t.stamp_one_bath,(0-t.stamp_five_bath)*5,(0-t.stamp_twenty_bath)*20,t.sell_minor_sub_date FROM tb_sell_minor_sub_transaction t 
		) AS tc ON t.office_code = tc.officeid
		WHERE t.office_level = '04'
		AND t.office_code LIKE '".$_SESSION['OFFICEID']."%'
		GROUP BY t.office_code";
	}
	
	
	$rs_c = mysql_query($sql_c,$connection);
	$rows = array();
	while($r = mysql_fetch_assoc($rs_c)) {
		$rows['LABEL'][] = array('label'=>$r['office_name']);
		$rows['STAMP1'][] = array('value'=>(int)$r['balance_1bath']);
		$rows['STAMP5'][] = array('value'=>(int)$r['balance_5bath']);
		$rows['STAMP20'][] = array('value'=>(int)$r['balance_20bath']);
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