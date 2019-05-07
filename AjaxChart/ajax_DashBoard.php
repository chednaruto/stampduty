<?php
	include("../inc/config.php");
	
		$sql_login = "SELECT MONTH(t.sell_datetime) AS mth,SUM(t.stamp_one_bath) AS stamp_one_bath,SUM(t.stamp_five_bath) AS stamp_five_bath,
		SUM(t.stamp_twenty_bath) as stamp_twenty_bath,SUM(t.money) AS money,SUM(t.discount) AS discount,SUM(t.money) - SUM(t.discount) total
		FROM (
			SELECT t.sell_datetime ,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,
			t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,
			if((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20)>=1000,((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20) * 3/100),0) AS discount
			FROM tb_sell_party_transaction t 
			WHERE t.stamp_one_bath + t.stamp_five_bath+t.stamp_twenty_bath > 0 
			AND t.sell_datetime BETWEEN TIMESTAMPADD(MONTH,-9,NOW()) AND NOW() 
		 
			UNION ALL
		
			SELECT t.sell_minor_sub_date,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath, t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,0 AS discount 
			FROM tb_sell_minor_sub_transaction t 
			WHERE t.stamp_one_bath+t.stamp_five_bath+t.stamp_twenty_bath > 0
			AND t.sell_minor_sub_date BETWEEN TIMESTAMPADD(MONTH,-9,NOW()) AND NOW() 
		) t
		GROUP BY YEAR(t.sell_datetime),MONTH(t.sell_datetime) ASC";
		$rs_login = mysql_query($sql_login,$connection);
		$rows = array();
		while($r = mysql_fetch_assoc($rs_login)) {
			getMonth((int)$r['mth']);
			$rows['LABEL'][] = array('label'=>getMonth((int)$r['mth']));
			$rows['ONE'][] = array('value'=>(int)$r['stamp_one_bath']);
			$rows['FIVE'][] = array('value'=>(int)$r['stamp_five_bath']);
			$rows['TWENTY'][] = array('value'=>(int)$r['stamp_twenty_bath']);
			$rows['MONEY'][] = array('value'=>(int)$r['money'] - $r['discount']);
		}
		
		
		$sql = "SELECT DAY(t.sell_datetime) AS dtm,MONTH(t.sell_datetime) AS mth,SUM(t.stamp_one_bath) AS stamp_one_bath,SUM(t.stamp_five_bath) AS stamp_five_bath,
		SUM(t.stamp_twenty_bath) as stamp_twenty_bath,SUM(t.money) AS money,SUM(t.discount) AS discount,SUM(t.money) - SUM(t.discount) total
		FROM (
			SELECT t.sell_datetime ,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,
			t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,
			if((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20)>=1000,((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20) * 3/100),0) AS discount
			FROM tb_sell_party_transaction t 
			WHERE t.stamp_one_bath + t.stamp_five_bath+t.stamp_twenty_bath > 0 
			AND DATE(t.sell_datetime) BETWEEN TIMESTAMPADD(DAY,-15,NOW()) AND NOW()
		 
			UNION ALL
		
			SELECT t.sell_minor_sub_date,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath, t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,0 AS discount 
			FROM tb_sell_minor_sub_transaction t 
			WHERE t.stamp_one_bath+t.stamp_five_bath+t.stamp_twenty_bath > 0
			AND DATE(t.sell_minor_sub_date) BETWEEN TIMESTAMPADD(DAY,-15,NOW()) AND NOW()
		) t
		GROUP BY YEAR(t.sell_datetime),MONTH(t.sell_datetime),DAY(t.sell_datetime) ASC";
		$rs = mysql_query($sql,$connection);
		while($r = mysql_fetch_assoc($rs)) {
			$rows['LABELDAY'][] = array('label'=>$r['dtm']." ".getMonth((int)$r['mth']));
			$rows['ONE_DAY'][] = array('value'=>(int)$r['stamp_one_bath']);
			$rows['FIVE_DAY'][] = array('value'=>(int)$r['stamp_five_bath']);
			$rows['TWENTY_DAY'][] = array('value'=>(int)$r['stamp_twenty_bath']);
			$rows['MONEY_DAY'][] = array('value'=>(int)$r['money'] - $r['discount']);
		}

		$sql = "SELECT MONTH(t.sell_datetime) AS mth,SUM(t.stamp_one_bath) AS stamp_one_bath,SUM(t.stamp_five_bath) AS stamp_five_bath,
		SUM(t.stamp_twenty_bath) as stamp_twenty_bath,SUM(t.money) AS money,SUM(t.discount) AS discount,SUM(t.money) - SUM(t.discount) total
		FROM (
			SELECT t.sell_datetime ,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,
			t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,
			if((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20)>=1000,((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20) * 3/100),0) AS discount
			FROM tb_sell_party_transaction t 
			WHERE t.stamp_one_bath + t.stamp_five_bath+t.stamp_twenty_bath > 0 
			AND YEAR(t.sell_datetime) = YEAR(NOW()) AND MONTH(t.sell_datetime) = MONTH(NOW())
		 
			UNION ALL
		
			SELECT t.sell_minor_sub_date,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath, t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,0 AS discount 
			FROM tb_sell_minor_sub_transaction t 
			WHERE t.stamp_one_bath+t.stamp_five_bath+t.stamp_twenty_bath > 0
			AND YEAR(t.sell_minor_sub_date) = YEAR(NOW()) AND MONTH(t.sell_minor_sub_date) = MONTH(NOW())
		) t";
		$rs = mysql_query($sql,$connection);
		$r = mysql_fetch_assoc($rs);
		$r['mth'] = getMonth((int)$r['mth']);
		$rows['MONEY_SELLTOTAL_LASTMONT'][] = $r;
		$sql = "SELECT MONTH(t.sell_datetime) AS mth,SUM(t.stamp_one_bath) AS stamp_one_bath,SUM(t.stamp_five_bath) AS stamp_five_bath,
		SUM(t.stamp_twenty_bath) as stamp_twenty_bath,SUM(t.money) AS money,SUM(t.discount) AS discount,SUM(t.money) - SUM(t.discount) total
		FROM (
			SELECT t.sell_datetime ,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,
			t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,
			if((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20)>=1000,((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20) * 3/100),0) AS discount
			FROM tb_sell_party_transaction t 
			WHERE t.stamp_one_bath + t.stamp_five_bath+t.stamp_twenty_bath > 0 
			AND YEAR(t.sell_datetime) = YEAR(TIMESTAMPADD(MONTH,-1,NOW())) AND MONTH(t.sell_datetime) = MONTH(TIMESTAMPADD(MONTH,-1,NOW()))
		 
			UNION ALL
		
			SELECT t.sell_minor_sub_date,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath, t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,0 AS discount 
			FROM tb_sell_minor_sub_transaction t 
			WHERE t.stamp_one_bath+t.stamp_five_bath+t.stamp_twenty_bath > 0
			AND YEAR(t.sell_minor_sub_date) = YEAR(TIMESTAMPADD(MONTH,-1,NOW())) AND MONTH(t.sell_minor_sub_date) = MONTH(TIMESTAMPADD(MONTH,-1,NOW()))
		) t";
		$rs = mysql_query($sql,$connection);
		$r = mysql_fetch_assoc($rs);
		$r['mth'] = getMonth((int)$r['mth']);
		$rows['MONEY_SELLTOTAL_BEFO_LASTMONT'][] = $r;
		$sql = "	SELECT DAY(NOW()) dth,MONTH(NOW()) AS mth,SUM(t.stamp_one_bath) AS stamp_one_bath,SUM(t.stamp_five_bath) AS stamp_five_bath,
		SUM(t.stamp_twenty_bath) as stamp_twenty_bath,SUM(t.money) AS money,SUM(t.discount) AS discount,SUM(t.money) - SUM(t.discount) total
		FROM (
			SELECT t.sell_datetime ,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,
			t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,
			if((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20)>=1000,((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20) * 3/100),0) AS discount
			FROM tb_sell_party_transaction t 
			WHERE t.stamp_one_bath + t.stamp_five_bath+t.stamp_twenty_bath > 0 
			AND YEAR(t.sell_datetime) = YEAR(NOW()) AND MONTH(t.sell_datetime) = MONTH(NOW()) AND DAY(t.sell_datetime) = DAY(NOW())
		 
			UNION ALL
		
			SELECT t.sell_minor_sub_date,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath, t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,0 AS discount 
			FROM tb_sell_minor_sub_transaction t 
			WHERE t.stamp_one_bath+t.stamp_five_bath+t.stamp_twenty_bath > 0
			AND YEAR(t.sell_minor_sub_date) = YEAR(NOW()) AND MONTH(t.sell_minor_sub_date) = MONTH(NOW()) AND DAY(t.sell_minor_sub_date) = DAY(NOW())
		) t";
	$rs = mysql_query($sql,$connection);
	$r = mysql_fetch_assoc($rs);
	$r['mth'] = getMonth((int)$r['mth']);
	$rows['MONEY_SELLTOTAL_LASTDAY'][] = $r;	
	$sql = "SELECT DAY(NOW()) AS dth,MONTH(NOW()) AS mth,SUM(t.stamp_one_bath) AS stamp_one_bath,SUM(t.stamp_five_bath) AS stamp_five_bath,
	SUM(t.stamp_twenty_bath) as stamp_twenty_bath,SUM(t.money) AS money,SUM(t.discount) AS discount,SUM(t.money) - SUM(t.discount) total
	FROM (
		SELECT t.sell_datetime ,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,
		t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,
		if((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20)>=1000,((t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20) * 3/100),0) AS discount
		FROM tb_sell_party_transaction t 
		WHERE t.stamp_one_bath + t.stamp_five_bath+t.stamp_twenty_bath > 0 
		AND YEAR(t.sell_datetime) = YEAR(TIMESTAMPADD(DAY,-1,NOW())) AND MONTH(t.sell_datetime) = MONTH(TIMESTAMPADD(DAY,-1,NOW())) 
		AND DAY(t.sell_datetime) = DAY(TIMESTAMPADD(DAY,-1,NOW()))
	 
		UNION ALL
	
		SELECT t.sell_minor_sub_date,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath, t.stamp_one_bath+t.stamp_five_bath*5+t.stamp_twenty_bath*20 AS money,0 AS discount 
		FROM tb_sell_minor_sub_transaction t 
		WHERE t.stamp_one_bath+t.stamp_five_bath+t.stamp_twenty_bath > 0
		AND YEAR(t.sell_minor_sub_date) = YEAR(TIMESTAMPADD(DAY,-1,NOW())) AND MONTH(t.sell_minor_sub_date) = MONTH(TIMESTAMPADD(DAY,-1,NOW())) 
		AND DAY(t.sell_minor_sub_date) = DAY(TIMESTAMPADD(DAY,-1,NOW()))
	) t";	
	$rs = mysql_query($sql,$connection);
	$r = mysql_fetch_assoc($rs);
	$r['mth'] = getMonth((int)$r['mth']);
	$rows['MONEY_SELLTOTAL_BEFO_LASTDAY'][] = $r;
	header('Content-type: application/json');
	echo json_encode($rows);
	

	function getMonth($month){
		$thai_month_arr=array(
			"0"=>"",
			"1"=>"มกราคม",
			"2"=>"กุมภาพันธ์",
			"3"=>"มีนาคม",
			"4"=>"เมษายน",
			"5"=>"พฤษภาคม",
			"6"=>"มิถุนายน", 
			"7"=>"กรกฎาคม",
			"8"=>"สิงหาคม",
			"9"=>"กันยายน",
			"10"=>"ตุลาคม",
			"11"=>"พฤศจิกายน",
			"12"=>"ธันวาคม"                 
		);
		
		return $thai_month_arr[$month];
	}
?>