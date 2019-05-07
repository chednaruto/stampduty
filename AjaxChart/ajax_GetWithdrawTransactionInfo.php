<?php
	session_start();
	include("../inc/config.php");
	include("../Function/FTSQLMS.php");
	$balanceClass = new FTSQLMS();

	$stampBalance = $balanceClass->GetBalance($_SESSION["OFFICEID"]);
	$officelimitmoney = $balanceClass->GetLimitMoNey($_SESSION["OFFICELEVEL"],$_SESSION["OFFICEID"]);
	
	$rows['LIMITMONEY'] = array(
		"label"=>$_SESSION['OFFICENAME'],
		"seriesname"=>array("อากรคงคลัง","วงเงินเก็บรักษาที่เหลือ"),
		"value"=>array(
			$stampBalance['money_one_bath']+
			$stampBalance['money_five_bath']+
			$stampBalance['money_twenty_bath'],$officelimitmoney
		)
	);
	$rows['BALANCE'][] = array("label"=>"คงเหลือทั้งหมด (ดวง)","value"=>($stampBalance["stamp_one_bath"]+$stampBalance["stamp_five_bath"]+$stampBalance["stamp_twenty_bath"]));
	$rows['BALANCE'][] = array("label"=>"1 บาท","value"=>$stampBalance["stamp_one_bath"]);
	$rows['BALANCE'][] = array("label"=>"5 บาท","value"=>$stampBalance["stamp_five_bath"]);
	$rows['BALANCE'][] = array("label"=>"20 บาท","value"=>$stampBalance["stamp_twenty_bath"]);
	
	
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