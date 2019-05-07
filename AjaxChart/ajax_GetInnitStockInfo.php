<?php
	session_start();
	include("../inc/config.php");

	if($_SESSION['OFFICELEVEL']=="00"){
		$sql_c = "SELECT (SELECT office_name FROM tb_office t WHERE t.office_code LIKE '".$_SESSION['OFFICEID']."') AS label,sum(office_limit_money) AS value FROM tb_office t WHERE t.office_level LIKE '02'";
	}else if($_SESSION['OFFICELEVEL']=="02"){
		$sql_c = "SELECT office_name AS label,office_limit_money AS value FROM tb_office t WHERE t.office_code LIKE '".$_SESSION['OFFICEID']."'";
	}else if($_SESSION['OFFICELEVEL']=="03"){
		$sql_c = "SELECT office_name AS label,office_limit_money AS value FROM tb_office t WHERE t.office_code LIKE '".$_SESSION['OFFICEID']."'";
	}else if($_SESSION['OFFICELEVEL']=="04"){
		$sql_c = "SELECT office_name AS label,office_limit_money AS value FROM tb_office t WHERE t.office_code LIKE '".$_SESSION['OFFICEID']."'";
	}
	$yearBegin = GetYearThai(date('Y-m-d'));
	if($_SESSION['OFFICELEVEL']=="00"){
		$sql_c2 = "SELECT t.officeid,
		IFNULL(SUM(t.balance),0)-IFNULL(SUM(p.pay),0) AS balance,
		IFNULL(SUM(t.balance_1bath),0)-IFNULL(SUM(p.pay1bath),0) AS balance1bath,
		IFNULL(SUM(t.balance_5bath),0)-IFNULL(SUM(p.pay5bath),0) AS balance5bath,
		IFNULL(SUM(t.balance_20bath),0)-IFNULL(SUM(p.pay20bath),0) AS balance20bath
		FROM (
			SELECT t.officeid,t.balance_1bath+t.balance_5bath+t.balance_20bath AS balance,t.balance_1bath,t.balance_5bath,t.balance_20bath
			FROM tb_innit_stock t 
			WHERE t.officeid = '".$_SESSION['OFFICEID']."' 
			UNION 
			SELECT t.officeid,t.stamp_one_bath+t.stamp_five_bath+t.stamp_twenty_bath AS balance,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath 
			FROM tb_receive_transaction t 
			WHERE t.officeid = '".$_SESSION['OFFICEID']."' 
			AND t.receive_date <= NOW() 
		)AS t LEFT JOIN (
			SELECT t.officeid,t.allowed_withdraw_one_bath+t.allowed_withdraw_five_bath+t.allowed_withdraw_twenty_bath AS pay,
			t.allowed_withdraw_one_bath AS pay1bath,t.allowed_withdraw_five_bath AS pay5bath,t.allowed_withdraw_twenty_bath AS pay20bath
			FROM tb_allowed_withdraw_transaction t WHERE t.allowed_withdraw_date <= NOW() AND t.officeid = '".$_SESSION['OFFICEID']."'
		) as p ON t.officeid = p.officeid";
	}else if($_SESSION['OFFICELEVEL']=="02"){
		$sql_c2 = "SELECT t.officeid,
		IFNULL(SUM(t.balance),0)-IFNULL(SUM(p.pay),0) AS balance,
		IFNULL(SUM(t.balance_1bath),0)-IFNULL(SUM(p.pay1bath),0) AS balance1bath,
		IFNULL(SUM(t.balance_5bath),0)-IFNULL(SUM(p.pay5bath),0) AS balance5bath,
		IFNULL(SUM(t.balance_20bath),0)-IFNULL(SUM(p.pay20bath),0) AS balance20bath
		FROM (
			SELECT t.officeid,t.balance_1bath+t.balance_5bath+t.balance_20bath AS balance,t.balance_1bath,t.balance_5bath,t.balance_20bath
			FROM tb_innit_stock t 
			WHERE t.officeid = '".$_SESSION['OFFICEID']."' 
			UNION 
			SELECT t.officeid,t.stamp_one_bath+t.stamp_five_bath+t.stamp_twenty_bath AS balance,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath 
			FROM tb_receive_transaction t 
			WHERE t.officeid = '".$_SESSION['OFFICEID']."' 
			AND t.receive_date <= NOW() 
		)AS t LEFT JOIN (
			SELECT t.officeid,t.allowed_withdraw_one_bath+t.allowed_withdraw_five_bath+t.allowed_withdraw_twenty_bath AS pay,
			t.allowed_withdraw_one_bath AS pay1bath,t.allowed_withdraw_five_bath AS pay5bath,t.allowed_withdraw_twenty_bath AS pay20bath
			FROM tb_allowed_withdraw_transaction t WHERE t.allowed_withdraw_date <= NOW() AND t.officeid = '".$_SESSION['OFFICEID']."'
		) as p ON t.officeid = p.officeid";
	}else if($_SESSION['OFFICELEVEL']=="03"){
		$sql_c2 = "SELECT t.officeid,
		IFNULL(SUM(t.balance),0)-IFNULL(SUM(p.pay),0) AS balance,
		IFNULL(SUM(t.balance_1bath),0)-IFNULL(SUM(p.pay1bath),0) AS balance1bath,
		IFNULL(SUM(t.balance_5bath),0)-IFNULL(SUM(p.pay5bath),0) AS balance5bath,
		IFNULL(SUM(t.balance_20bath),0)-IFNULL(SUM(p.pay20bath),0) AS balance20bath
		FROM (
			SELECT t.officeid,t.balance_1bath+t.balance_5bath+t.balance_20bath AS balance,t.balance_1bath,t.balance_5bath,t.balance_20bath
			FROM tb_innit_stock t 
			WHERE t.officeid = '".$_SESSION['OFFICEID']."' 
			UNION 
			SELECT t.officeid,t.stamp_one_bath+t.stamp_five_bath+t.stamp_twenty_bath AS balance,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath 
			FROM tb_receive_transaction t 
			WHERE t.officeid = '".$_SESSION['OFFICEID']."' 
			AND t.receive_date <= NOW() 
		)AS t LEFT JOIN (
			SELECT t.officeid,t.allowed_withdraw_one_bath+t.allowed_withdraw_five_bath+t.allowed_withdraw_twenty_bath AS pay,
			t.allowed_withdraw_one_bath AS pay1bath,t.allowed_withdraw_five_bath AS pay5bath,t.allowed_withdraw_twenty_bath AS pay20bath
			FROM tb_allowed_withdraw_transaction t WHERE t.allowed_withdraw_date <= NOW() AND t.officeid = '".$_SESSION['OFFICEID']."'
		) as p ON t.officeid = p.officeid";
	}else if($_SESSION['OFFICELEVEL']=="04"){
		$sql_c2 = "SELECT t.officeid,
		IFNULL(SUM(t.balance),0)-IFNULL(SUM(p.pay),0) AS balance,
		IFNULL(SUM(t.balance_1bath),0)-IFNULL(SUM(p.pay1bath),0) AS balance1bath,
		IFNULL(SUM(t.balance_5bath),0)-IFNULL(SUM(p.pay5bath),0) AS balance5bath,
		IFNULL(SUM(t.balance_20bath),0)-IFNULL(SUM(p.pay20bath),0) AS balance20bath
		FROM (
			SELECT t.officeid,t.balance_1bath+t.balance_5bath+t.balance_20bath AS balance,t.balance_1bath,t.balance_5bath,t.balance_20bath
			FROM tb_innit_stock t 
			WHERE t.officeid = '".$_SESSION['OFFICEID']."' 
			UNION 
			SELECT t.officeid,t.stamp_one_bath+t.stamp_five_bath+t.stamp_twenty_bath AS balance,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath 
			FROM tb_receive_transaction t 
			WHERE t.officeid = '".$_SESSION['OFFICEID']."' 
			AND t.receive_date <= NOW() 
		)AS t LEFT JOIN (
			SELECT t.officeid,t.allowed_withdraw_one_bath+t.allowed_withdraw_five_bath+t.allowed_withdraw_twenty_bath AS pay,
			t.allowed_withdraw_one_bath AS pay1bath,t.allowed_withdraw_five_bath AS pay5bath,t.allowed_withdraw_twenty_bath AS pay20bath
			FROM tb_allowed_withdraw_transaction t WHERE t.allowed_withdraw_date <= NOW() AND t.officeid = '".$_SESSION['OFFICEID']."'
		) as p ON t.officeid = p.officeid";
	}
	
	$rs_c = mysql_query($sql_c,$connection);
	$rows = array();
	while($r = mysql_fetch_assoc($rs_c)) {
		$rows['LIMITMONEY'][] = $r;
	}
	$rs_c2 = mysql_query($sql_c2,$connection);

	if($row_c2 = mysql_fetch_assoc($rs_c2)){
		
		$rows['BALANCE'][] = array("label"=>"คงเหลือทั้งหมด (ดวง)","value"=>$row_c2['balance']);
		$rows['BALANCE'][] = array("label"=>"1 บาท","value"=>$row_c2['balance1bath']);
		$rows['BALANCE'][] = array("label"=>"5 บาท","value"=>$row_c2['balance5bath']);
		$rows['BALANCE'][] = array("label"=>"20 บาท","value"=>$row_c2['balance20bath']);
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