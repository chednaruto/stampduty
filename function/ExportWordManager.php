<?php	
	class DATAINFO
	{
		public function GetLimitMoNey($officelevel,$officeid){
			include("../inc/config.php");
			$ret = 0;
			if($officelevel=="00"){
				$sql = "SELECT 5000000000 AS office_limit_money ";
			}else{
				$sql = "SELECT t.office_limit_money FROM tb_office t WHERE t.office_code LIKE '".$officeid."'";
			}
			$rs = mysql_query($sql,$connection);
			$row = mysql_fetch_assoc($rs);
			$ret = $row['office_limit_money']-0;
			return $ret;
		}
		
		public function GetBalance($officeid){
			include("../inc/config.php");
			$ret = array(
				"stamp_one_bath" => 0,
				"stamp_five_bath" => 0,
				"stamp_twenty_bath" =>0,
				"money_one_bath"=>0,
				"money_five_bath"=>0,
				"money_twenty_bath"=>0
			);
			if($officeid=='00005000'){
				$sql = "SELECT * FROM ( 
				SELECT 'ADD' target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date FROM tb_innit_stock t WHERE t.officeid = '".$officeid."'
				UNION ALL
				SELECT 'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,tb.allowed_withdraw_transaction_date 
				FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
				WHERE t.officeid = '".$officeid."' AND tb.allowed_withdraw_status = 'Y'
				UNION ALL 
				SELECT 'ADD' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.receive_date
				FROM tb_receive_transaction t
				WHERE t.officeid = '".$officeid."'
				UNION ALL
				SELECT 'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
				FROM tb_allowed_withdraw_transaction t WHERE t.officeid = '".$officeid."' AND t.pay_document_number IS NOT NULL ".$tawt."
				UNION ALL
				SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
				FROM tb_sell_party_transaction t WHERE t.officeid = '".$officeid."' ".$tspt."
				UNION ALL
				SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
				FROM tb_sell_minor_sub_transaction t WHERE t.officeid = '".$officeid."' ".$tsmst."
			) as tb_transaction ORDER BY tb_transaction.stock_date ASC";
			}else{
			$sql = "SELECT * FROM ( 
				SELECT 'ADD' target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date FROM tb_innit_stock t WHERE t.officeid = '".$officeid."'
				UNION ALL
				SELECT 'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,tb.allowed_withdraw_transaction_date 
				FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
				WHERE t.officeid = '".$officeid."' AND tb.allowed_withdraw_status = 'Y'
				UNION ALL 
				SELECT 'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
				FROM tb_allowed_withdraw_transaction t WHERE t.officeid = '".$officeid."' AND t.allowed_withdraw_status = 'Y'
				UNION ALL
				SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
				FROM tb_sell_party_transaction t WHERE t.officeid = '".$officeid."'
				UNION ALL
				SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
				FROM tb_sell_minor_sub_transaction t WHERE t.officeid = '".$officeid."'
			) as tb_transaction ORDER BY tb_transaction.stock_date ASC";
			}
			$rs = mysql_query($sql,$connection);
			while($row = mysql_fetch_array($rs)){
				if($row['target']=="ADD"){
					$ret['stamp_one_bath'] += ($row['balance_1bath']-0);
					$ret['stamp_five_bath'] += ($row['balance_5bath']-0);
					$ret['stamp_twenty_bath'] += ($row['balance_20bath']-0);
					$ret['money_one_bath'] += ($row['balance_1bath']-0);
					$ret['money_five_bath'] += ($row['balance_5bath']*5);
					$ret['money_twenty_bath'] += ($row['balance_20bath']*20);
				}else{
					$ret['stamp_one_bath'] -= ($row['balance_1bath']-0);
					$ret['stamp_five_bath'] -= ($row['balance_5bath']-0);
					$ret['stamp_twenty_bath'] -= ($row['balance_20bath']-0);
					$ret['money_one_bath'] -= ($row['balance_1bath']-0);
					$ret['money_five_bath'] -= ($row['balance_5bath']*5);
					$ret['money_twenty_bath'] -= ($row['balance_20bath']*20);
				}
			}
			
			return $ret;
		}
		
		public function GetBalanceDate($officeid,$transaction_date){
			$dateStart = $this->GetDateTimeStart($transaction_date);
			include("../inc/config.php");
			$ret = array(
				"stamp_one_bath" => 0,
				"stamp_five_bath" => 0,
				"stamp_twenty_bath" =>0,
				"money_one_bath"=>0,
				"money_five_bath"=>0,
				"money_twenty_bath"=>0
			);
			$sql = "SELECT * FROM ( 
				SELECT 'ADD' target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date FROM tb_innit_stock t WHERE t.officeid = '".$officeid."'
				UNION ALL
				SELECT 'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,tb.allowed_withdraw_transaction_date 
				FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
				WHERE t.officeid = '".$officeid."' AND tb.allowed_withdraw_status = 'Y'  AND tb.allowed_withdraw_transaction_date <= '".$transaction_date."'
				UNION ALL 
				SELECT 'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
				FROM tb_allowed_withdraw_transaction t WHERE t.officeid = '".$officeid."' AND t.allowed_withdraw_status = 'Y' AND
				t.allowed_withdraw_transaction_date <= '".$transaction_date."'
				UNION ALL
				SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
				FROM tb_sell_party_transaction t WHERE t.officeid = '".$officeid."'  AND t.sell_datetime <= '".$transaction_date."' 
				UNION ALL
				SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
				FROM tb_sell_minor_sub_transaction t WHERE t.officeid = '".$officeid."' AND t.sell_minor_sub_date <= '".$transaction_date."' 
			) as tb_transaction ORDER BY tb_transaction.stock_date ASC";
			$rs = mysql_query($sql,$connection);
			while($row = mysql_fetch_array($rs)){
				if($row['target']=="ADD"){
					$ret['stamp_one_bath'] += ($row['balance_1bath']-0);
					$ret['stamp_five_bath'] += ($row['balance_5bath']-0);
					$ret['stamp_twenty_bath'] += ($row['balance_20bath']-0);
					$ret['money_one_bath'] += ($row['balance_1bath']-0);
					$ret['money_five_bath'] += ($row['balance_5bath']*5);
					$ret['money_twenty_bath'] += ($row['balance_20bath']*20);
				}else{
					$ret['stamp_one_bath'] -= ($row['balance_1bath']-0);
					$ret['stamp_five_bath'] -= ($row['balance_5bath']-0);
					$ret['stamp_twenty_bath'] -= ($row['balance_20bath']-0);
					$ret['money_one_bath'] -= ($row['balance_1bath']-0);
					$ret['money_five_bath'] -= ($row['balance_5bath']*5);
					$ret['money_twenty_bath'] -= ($row['balance_20bath']*20);
				}
			}
			
			return $ret;
		}
		public function GetBalanceNotIn($officeid,$table,$id){
			include("../inc/config.php");
			$ret = array(
				"stamp_one_bath" => 0,
				"stamp_five_bath" => 0,
				"stamp_twenty_bath" =>0,
				"money_one_bath"=>0,
				"money_five_bath"=>0,
				"money_twenty_bath"=>0
			);
			if($table == "tb_sell_party_transaction"){
				$tspt = " AND sell_party_transaction_id NOT IN('".$id."')";
			}else if($table == "tb_sell_minor_sub_transaction"){
				$tsmst = " AND sell_minor_transaction_id NOT IN('".$id."')";
			}else if($table == "tb_receive_transaction"){
				$trt = " AND receive_transaction_id NOT IN('".$id."')";
			}else if($table == "tb_allowed_withdraw_transaction"){
				$tawt = " AND allowed_withdraw_transaction_id NOT IN('".$id."')";
			}
			$sql = "SELECT * FROM ( 
				SELECT 'ADD' target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date FROM tb_innit_stock t WHERE t.officeid = '".$officeid."'
				UNION ALL
				SELECT 'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,tb.allowed_withdraw_transaction_date 
				FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
				WHERE t.officeid = '".$officeid."' AND tb.allowed_withdraw_status = 'Y'
				UNION ALL 
				SELECT 'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
				FROM tb_allowed_withdraw_transaction t WHERE t.officeid = '".$officeid."' AND t.allowed_withdraw_status = 'Y' ".$tawt."
				UNION ALL
				SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
				FROM tb_sell_party_transaction t WHERE t.officeid = '".$officeid."' ".$tspt."
				UNION ALL
				SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
				FROM tb_sell_minor_sub_transaction t WHERE t.officeid = '".$officeid."' ".$tsmst."
			) as tb_transaction ORDER BY tb_transaction.stock_date ASC";
			$rs = mysql_query($sql,$connection);
			while($row = mysql_fetch_array($rs)){
				if($row['target']=="ADD"){
					$ret['stamp_one_bath'] += ($row['balance_1bath']-0);
					$ret['stamp_five_bath'] += ($row['balance_5bath']-0);
					$ret['stamp_twenty_bath'] += ($row['balance_20bath']-0);
					$ret['money_one_bath'] += ($row['balance_1bath']-0);
					$ret['money_five_bath'] += ($row['balance_5bath']*5);
					$ret['money_twenty_bath'] += ($row['balance_20bath']*20);
				}else{
					$ret['stamp_one_bath'] -= ($row['balance_1bath']-0);
					$ret['stamp_five_bath'] -= ($row['balance_5bath']-0);
					$ret['stamp_twenty_bath'] -= ($row['balance_20bath']-0);
					$ret['money_one_bath'] -= ($row['balance_1bath']-0);
					$ret['money_five_bath'] -= ($row['balance_5bath']*5);
					$ret['money_twenty_bath'] -= ($row['balance_20bath']*20);
				}
			}
			return $ret;
		}
		
		public function GetUsage($officeid,$transaction_date){
			include("../inc/config.php");
			$ret = array(
				"usebefo_1bath"=>0,
				"usebefo_5bath"=>0,
				"usebefo_20bath"=>0,
				"usesum_1bath"=>0,
				"usesum_5bath"=>0,
				"usesum_20bath"=>0
			);
			$dateStart = $this->GetDateTimeStart($transaction_date);
			//usesum
			$sql = "SELECT SUM(t.usesum_1bath) AS usesum_1bath,
			SUM(t.usesum_5bath) AS usesum_5bath,
			SUM(t.usesum_20bath) AS usesum_20bath
			FROM (
				SELECT t.usesum_1bath,t.usesum_5bath,t.usesum_20bath FROM tb_innit_stock t 
				WHERE t.stock_date BETWEEN '".$dateStart."' AND '".$transaction_date."' AND t.officeid = '".$officeid."'
				UNION ALL
				SELECT ta.allowed_withdraw_one_bath,ta.allowed_withdraw_five_bath,ta.allowed_withdraw_twenty_bath 
				FROM tb_withdraw_transaction t
				LEFT JOIN tb_allowed_withdraw_transaction ta ON t.withdraw_transaction_id = ta.withdraw_transaction_id 
				WHERE t.officeid = '".$officeid."' AND t.withdraw_transaction_date BETWEEN '".$dateStart."' AND '".$transaction_date."' 
				AND t.withdraw_transaction_date < '".$transaction_date."'
				AND ta.allowed_withdraw_status = 'Y' AND ta.pay_document_number <> ''
			) as	 t";
			
			$rs = mysql_query($sql,$connection);
			while($row = mysql_fetch_assoc($rs)){
				$ret['usesum_1bath'] += $row['usesum_1bath'];
				$ret['usesum_5bath'] += $row['usesum_5bath'];
				$ret['usesum_20bath'] += $row['usesum_20bath'];
			}
			$sql = "SELECT * FROM tb_innit_stock tb WHERE tb.officeid = '".$officeid."' AND tb.stock_date BETWEEN '".$dateStart."' AND '".$transaction_date."'";
			$rs = mysql_query($sql,$connection);
			$row = mysql_fetch_assoc($rs);
			if($row['officeid']!=""){
				$ret['usebefo_1bath'] += $row['usebefo_1bath'];
				$ret['usebefo_5bath'] += $row['usebefo_5bath'];
				$ret['usebefo_20bath'] += $row['usebefo_20bath'];
			}else{
				$datebetween = $this->GetDateTimeBefoYear($transaction_date);
				$sql = "SELECT * FROM (
						SELECT 'PAY' target,t.allowed_withdraw_one_bath AS stamp_one_bath,t.allowed_withdraw_five_bath AS stamp_five_bath,
							t.allowed_withdraw_twenty_bath AS stamp_twenty_bath,t.allowed_withdraw_transaction_date AS transaction_date 
						FROM tb_allowed_withdraw_transaction t WHERE t.officeid = '".$officeid."' AND t.allowed_withdraw_status = 'Y'
					
						UNION ALL
					
						SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
						FROM tb_sell_party_transaction t WHERE t.officeid = '".$officeid."'
						
						UNION ALL
					
						SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
						FROM tb_sell_minor_sub_transaction t WHERE t.officeid = '".$officeid."'
						
						UNION ALL 
						
						SELECT 'PAY' AS target,t.usebefo_1bath,t.usebefo_5bath,t.usebefo_20bath,t.stock_date FROM tb_innit_stock t 
						WHERE t.officeid = '".$officeid."'
					) as tb_transaction 
					WHERE tb_transaction.transaction_date BETWEEN '".$datebetween["start_date"]."' and '".$datebetween["end_date"]."'
					ORDER BY tb_transaction.transaction_date ASC";
					$rs = mysql_query($sql,$connection);
					while($row = mysql_fetch_assoc($rs)){
						$ret['usebefo_1bath'] += $row['stamp_one_bath'];
						$ret['usebefo_5bath'] += $row['stamp_five_bath'];
						$ret['usebefo_20bath'] += $row['stamp_twenty_bath'];
					}
			}
			
			return $ret;
		}
		
		public function GetDateTimeStart($date){
			$date = strtotime($date);
			$month = (int)date("m",$date);
			if($month>10){
				$ret = date("Y",$date)."-10-01 00:00:00";
			}else{
				$ret = (date("Y",$date)-1)."-10-01 00:00:00";
			}
			return $ret;
		}
		public function GetDateTimeBefoYear($date){
			$ret = array(
				"start_date"=>"",
				"end_date"=>""
			);
			$date = strtotime($date);
			$month = (int)date("m",$date);
			if($month>10){
				$ret["start_date"] = (date("Y",$date)-1)."-10-01 00:00:00";
				$ret['end_date'] = (date("Y",$date))."-09-30 59:59:00";
			}else{
				$ret['start_date'] = (date("Y",$date)-2)."-10-01 00:00:00";
				$ret['end_date'] = (date("Y",$date)-1)."-09-60 59:59:00";
			}
			return $ret;
		}
		
	}
	$test = new DATAINFO();
	$test->GetUsage("01001010","2018-09-04 13:32:12");
?>