<?php
	
	
	class FTSQLMS
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
				"money_twenty_bath"=>0,
				"innit_one_bath"=>0,
				"innit_five_bath"=>0,
				"innit_twen_bath"=>0
			);
			
			$sql_innit = "SELECT 'ADD' target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date FROM tb_innit_stock t WHERE t.officeid = '".$officeid."'";
			$rs_innit = mysql_query($sql_innit,$connection);
			$row_innit= mysql_fetch_assoc($rs_innit);
			
			$ret['innit_one_bath'] = $row_innit['balance_1bath'];
			$ret['innit_five_bath'] = $row_innit['balance_5bath'];
			$ret['innit_twen_bath'] = $row_innit['balance_20bath'];
			
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
				FROM tb_allowed_withdraw_transaction t WHERE t.officeid = '".$officeid."' AND t.pay_document_number IS NOT NULL ".$tawt."
				UNION ALL
				SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
				FROM tb_sell_party_transaction t WHERE t.officeid = '".$officeid."' ".$tspt."
				UNION ALL
				SELECT 'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
				FROM tb_sell_minor_sub_transaction t WHERE t.officeid = '".$officeid."' ".$tsmst."
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
	}
	
?>