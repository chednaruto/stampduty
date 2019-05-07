<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <ul class="breadcrumb">
            	<li>
					<i class="ace-icon fa fa-home home-icon"></i><a href="#">หน้าหลัก</a>
				</li>
				<li> รายการขอซื้อแสตมป์อากร (อ.ส.๑๐)</li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>
			<?php
				
				if($_SESSION['OFFICELEVEL']=="00"){
					$sql_dash = 'SELECT COUNT(*) as ch,SUM(tb.office_limit_money) AS sh,COUNT(CASE WHEN tb.office_limit_money<>0 THEN tb.office_code END) cm FROM tb_office tb WHERE tb.office_level = "02" AND tb.office_active_status = "Y"';
				
				}else if($_SESSION['OFFICELEVEL']=='02'){
					$sql_dash = 'SELECT COUNT(*) as ch,SUM(tb.office_limit_money) AS sh,COUNT(CASE WHEN tb.office_limit_money<>0 THEN tb.office_code END) cm FROM tb_office tb WHERE tb.office_level = "03" AND tb.office_active_status = "Y" AND office_code LIKE "'.substr($_SESSION['OFFICEID'],0,2).'%"';
				}else if($_SESSION['OFFICELEVEL']=='03'){
					$sql_dash = 'SELECT COUNT(*) as ch,SUM(tb.office_limit_money) AS sh,COUNT(CASE WHEN tb.office_limit_money<>0 THEN tb.office_code END) cm FROM tb_office tb WHERE tb.office_level = "04" AND tb.office_active_status = "Y" AND office_code LIKE "'.substr($_SESSION['OFFICEID'],0,5).'%"';
				}
				$rs_dash = mysql_query($sql_dash,$connection);
				$row_dash = mysql_fetch_assoc($rs_dash);
				if($_SESSION['OFFICEID']=='00005000'){
					$sql_dash2 = 'SELECT * FROM (
				SELECT "ADD" target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date 
				FROM tb_innit_stock t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				UNION  ALL
				SELECT "ADD" target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,tb.allowed_withdraw_transaction_date 
				FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" AND tb.allowed_withdraw_status = "Y" 
				UNION  ALL
				SELECT "ADD" target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.receive_date
				FROM tb_receive_transaction t
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				UNION  ALL
				SELECT "PAY" target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
				FROM tb_allowed_withdraw_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" AND t.allowed_withdraw_status = "Y"
				UNION  ALL
				SELECT "PAY" target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
				FROM tb_sell_party_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				UNION  ALL 
				SELECT "PAY" target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
				FROM tb_sell_minor_sub_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				) as tb_transaction ORDER BY tb_transaction.stock_date ASC';
				}else{
				$sql_dash2 = 'SELECT * FROM (
				SELECT "ADD" target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date 
				FROM tb_innit_stock t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				UNION  ALL
				SELECT "ADD" target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,tb.allowed_withdraw_transaction_date 
				FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" AND tb.allowed_withdraw_status = "Y" 
				UNION  ALL 
				SELECT "PAY" target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
				FROM tb_allowed_withdraw_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" AND t.allowed_withdraw_status = "Y"
				UNION  ALL
				SELECT "PAY" target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
				FROM tb_sell_party_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				UNION  ALL 
				SELECT "PAY" target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
				FROM tb_sell_minor_sub_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				) as tb_transaction ORDER BY tb_transaction.stock_date ASC';
				}
				$rs_dash2 = mysql_query($sql_dash2,$connection);
				$stamp = 0;
				$stamp_one_bath = 0;
				$stamp_five_bath = 0;
				$stamp_twenty_bath = 0;
				while($row_dash2 = mysql_fetch_assoc($rs_dash2)){
					if($row_dash2['target']=="ADD"){
						$stamp += (int)$row_dash2['balance_1bath']+(int)$row_dash2['balance_5bath']*5+(int)$row_dash2['balance_20bath']*20;
						$stamp_one_bath += (int)$row_dash2['balance_1bath'];
						$stamp_five_bath += (int)$row_dash2['balance_5bath'];
						$stamp_twenty_bath += (int)$row_dash2['balance_20bath'];
					}else{
						$stamp -= (int)$row_dash2['balance_1bath']+(int)$row_dash2['balance_5bath']*5+(int)$row_dash2['balance_20bath']*20;
						$stamp_one_bath -= (int)$row_dash2['balance_1bath'];
						$stamp_five_bath -= (int)$row_dash2['balance_5bath'];
						$stamp_twenty_bath -= (int)$row_dash2['balance_20bath'];
					}
				}
			?>
        <div class="page-content">
            <div class="page-header">
                <h1>
						รายการขอซื้อแสตมป์อากร (อ.ส.๑๐)
				</h1>
            </div>
            <div class="row">
				<div class="space-12"></div>

				<div class="col-sm-12 infobox-container">
					<!-- #section:pages/dashboard.infobox -->
					 
                    <div class="infobox infobox-blue2">
                    	<div class="infobox-icon">
							<i class="ace-icon fa fa-dollar"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-text">แสตม์อากรคงคลัง</span>
							<div class="infobox-content">
								<span class="bigger-110">&nbsp;</span>
								<?php echo number_format($stamp,2); ?> ฿
							</div>
						</div>
					</div>

					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="ace-icon fa  fa-dollar"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number">ราคา 1 บาท</span>
							<div class="infobox-content">คงเหลือ <?php echo number_format($stamp_one_bath); ?> ดวง</div>
						</div>

						<div class="badge badge-success"></div>
					</div>

					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="ace-icon fa  fa-dollar"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number">ราคา 5 บาท</span>
							<div class="infobox-content">คงเหลือ <?php echo number_format($stamp_five_bath); ?> ดวง</div>
						</div>

						<div class="badge badge-success"></div>
					</div>
                    
					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="ace-icon fa  fa-dollar"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number">ราคา 20 บาท</span>
							<div class="infobox-content">คงเหลือ <?php echo number_format($stamp_twenty_bath); ?> ดวง</div>
						</div>

						<div class="badge badge-success"></div>
					</div>
					

					
					<div class="space-6"></div>
				</div>
			</div><!-- /.row -->
            <div class="row">
				<div class="col-xs-12">		
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
                    

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center">ลำดับที่</th>
									<th class="center">เลขอ้างอิงในระบบ</th>
									<th class="center">ผู้ซื้อ</th>
                                    <th class="center">จำนวน ราคา 1 บาท</th>
                                    <th class="center">จำนวน ราคา 5 บาท</th>
                                    <th class="center">จำนวน ราคา 20 บาท</th>
                                    <th class="center">วันที่ซื้อ</th>
									<th class="center">เลือกรายการ</th>
								</tr>
							</thead>
									
							<tbody>
                        	<?php
							
								$sql_u = "SELECT ts.sell_party_transaction_id,ts.officeid,ts.stamp_one_bath,ts.stamp_five_bath,ts.stamp_twenty_bath,ts.sell_datetime,tp.*
								FROM tb_sell_party_transaction ts
								LEFT JOIN tb_stamp_party tp ON ts.stamp_party_transaction_id = tp.stamp_party_transaction_id 
								WHERE ts.officeid = '".$_SESSION['OFFICEID']."'
								ORDER BY ts.sell_datetime DESC";
								$rs_u = mysql_query($sql_u,$connection);
								$u_index = 1;
								while($row_u = mysql_fetch_array($rs_u)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td class="center">'.$row_u['sell_party_transaction_id'].'</td>';
									echo '<td class="center">'.$row_u['stamp_party_fullname'].'</td>';
									echo '<td class="center">'.$row_u['stamp_one_bath'].'</td>';
									echo '<td class="center">'.$row_u['stamp_five_bath'].'</i></td>';
									echo '<td class="center">'.$row_u['stamp_twenty_bath'].'</i></td>';
									if(date("Y-m-d",strtotime($row_u['sell_datetime']))==date('Y-m-d')){
										echo '<td class="center"><b class=" btn-xs btn-success">'.date('d-m-Y H:i:s',strtotime($row_u['sell_datetime'])).'</b></i></td>';
									}else{
										echo '<td class="center"><b class=" btn-xs btn-light">'.date('d-m-Y H:i:s',strtotime($row_u['sell_datetime'])).date(strtotime($row_u['sell_datetime']),'Y-m-d').'</b></i></td>';
									}
									
									
									echo '<td class="center">';
									echo '<div class="btn-group">';
									echo '	<button data-toggle="dropdown" class="btn btn-white btn-xs dropdown-toggle" aria-expanded="false">';
									echo '		เลือกรายการ';
									echo '		<span class="ace-icon fa fa-caret-down icon-on-right"></span>';
									echo '	</button>';
									echo '	<ul  class="dropdown-menu dropdown-info dropdown-menu-right">';
									if(date("Y-m-d",strtotime($row_u['sell_datetime']))==date('Y-m-d')){
									echo '		<li><a href="index.php?service=stampSellAdding&sell_party_transaction_id='.$row_u['sell_party_transaction_id'].'">แก้ไขรายการ</a></li>';
									}
									echo '		<li><a href="WordTemplate/FSSWordExporter.php?sell_party_transaction_id='.$row_u['sell_party_transaction_id'].'">พิมพ์แบบขอซื้อแสตมป์อากร</a></li>';
									echo '	</ul>';
									echo '</div>';
									echo '</td>';
									echo '</tr>';
									$u_index++;
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
                                
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-block alert-success" style="text-align:center;">
                        <button class="btn btn-white btn-warning btn-bold" onclick="GoAdding()">
							<i class="ace-icon fa fa-user bigger-120 orange"></i> เพิ่มรายการขอซื้อแสตมป์อากร (อ.ส.๑๐)
                  	</div>				
              	</div>
         	</div>
            
        </div>
    </div>
</div>
<script>
	function GoAdding(){
		window.location.href="index.php?service=stampSellAdding";
	}
</script>		