<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <ul class="breadcrumb">
            	<li>
					<i class="ace-icon fa fa-home home-icon"></i><a href="index.php">หน้าหลัก</a>
				</li>
				<li> คำขอเบิกแสตมป์อากร (อ.ส.01) </li>
           </ul>
           <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						รายการคำขอเบิกแสตมป์อากร (อ.ส.01)
				</h1>
            </div>
            <?php
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
				UNION ALL
				SELECT "PAY" target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
				FROM tb_sell_minor_sub_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				) as tb_transaction ORDER BY tb_transaction.stock_date ASC';
				}else{
				$sql_dash2 = 'SELECT * FROM (
				SELECT "ADD" target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date 
				FROM tb_innit_stock t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				UNION ALL
				SELECT "ADD" target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,tb.allowed_withdraw_transaction_date 
				FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" AND tb.allowed_withdraw_status = "Y" 
				UNION  ALL
				SELECT "PAY" target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
				FROM tb_allowed_withdraw_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" AND t.allowed_withdraw_status = "Y"
				UNION ALL
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
                                    <th class="center">เลขอ้างอิงคำขอเบิกแสตมป์อากร</th>
									<th class="center">คำขอเบิกแสตมป์อากรที่</th>
									<th class="center">ลงวันที่</th>
                                    <th class="center">จำนวนดวงราคา 1 บาท</th>
                                    <th class="center">จำนวนดวงราคา 5 บาท</th>
                                    <th class="center">จำนวนดวงราคา 20 บาท</th>
                                    <th class="center">รายการ</th>
								</tr>
							</thead>
									
							<tbody>
                        	<?php
								
								
								$sql_wb = 'SELECT t.*,ta.allowed_withdraw_transaction_id FROM tb_withdraw_transaction t 
								LEFT JOIN tb_allowed_withdraw_transaction ta ON t.withdraw_transaction_id = ta.withdraw_transaction_id  
								WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" ORDER BY t.withdraw_transaction_id DESC';
									
								$rs_wb = mysql_query($sql_wb,$connection);
								
								$u_index = 1;
								while($row_lm = mysql_fetch_array($rs_wb)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td class="center">'.$row_lm['withdraw_transaction_id'].'</td>';
									echo '<td class="center">'.$row_lm['withdraw_document_id'].'</td>';
									if($row_lm['withdraw_document_date']=="0000-00-00" || $row_lm['withdraw_document_date'] == ""){
										echo '<td class="center" style="text-align:right"></td>';	
									}else{
										echo '<td class="center" style="text-align:right">'.date('d-m-Y',strtotime($row_lm['withdraw_document_date'])).'</td>';	
									}
																
									echo '<td class="center" style="text-align:right">'.number_format($row_lm['amount_withdraw_one_bath']).'</td>';
									echo '<td class="center" style="text-align:right">'.number_format($row_lm['amount_withdraw_five_bath']).'</td>';
									echo '<td class="center" style="text-align:right">'.number_format($row_lm['amount_withdraw_twenty_bath']).'</td>';
									
									echo '<td class="center">';
									echo '<div class="action-buttons">';
									
									echo '<div class="btn-group">';
									echo '	<button data-toggle="dropdown" class="btn btn-white btn-xs dropdown-toggle" aria-expanded="false">';
									echo '		เลือกรายการ';
									echo '		<span class="ace-icon fa fa-caret-down icon-on-right"></span>';
									echo '	</button>';
									echo '	<ul  class="dropdown-menu dropdown-info dropdown-menu-right">';
									if($row_lm['allowed_withdraw_transaction_id']==""){
										echo '	<li><a href="index.php?service=withdrawtransactionEditing&withdraw_transaction_id='.$row_lm['withdraw_transaction_id'].'">แก้ไขรายการ</a></li>';
									?>
                                    
										<li><a href="#" onclick="DeleteWithdrawTransaction('<?php echo $row_lm['withdraw_transaction_id']; ?>')">ลบรายการ</a></li>
                                    <?php
									}
									echo '		<li><a href="WordTemplate/FWTWordExporter.php?withdraw_transaction_id='.$row_lm['withdraw_transaction_id'].'">พิมพ์แบบคำขอเบิกแสตมป์อากร</a></li>';
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
							<i class="ace-icon fa fa-user bigger-120 orange"></i> เพิ่มรายการคำขอเบิกแสตมป์อากร (อ.ส.01)
						</button>
                  	</div>				
              	</div>
         	</div>
        </div>
    </div>
</div>
<script>
	function DeleteWithdrawTransaction(withdraw_transaction_id){
		$.confirm({
			title: '',
			content: 'คุณต้องการลบข้อมูลใช่หรือไม่',
			animation: 'news',
			closeAnimation: 'news',
			buttons: {
				confirm: function () {
					$.ajax({
						type: "POST",
						url: "Ajax/ajax_WithdrawTransactionDeleting.php",
						data: "withdraw_transaction_id="+withdraw_transaction_id,
						cache: false,
						success: function(data){
							if(data=="TRUE"){
								window.location.href = "index.php?service=withdrawTransactionManager";
							}
						}
					});
				},cancel: function () {}
			}
		});
	}
	function GoAdding(){
		window.location.href="index.php?service=withdrawtransactionAdding";
	}
	function DeleteWithdraw(val){
		$.confirm({
					title: '',
					content: 'คุณต้องการลบข้อมูลใช่หรือไม่',
					animation: 'news',
					closeAnimation: 'news',
					buttons: {
						confirm: function () {
							$.ajax({
								type: "POST",
								url: "Ajax/ajax_WithdrawBoardDeleting.php",
								data: "withdraw_document_id="+val,
								cache: false,
								success: function(data){
									if(data=="TRUE"){
										window.location.href = "index.php?service=withdrawboardManager";
									}
								}
							});
						},cancel: function () {}
					}
				});
	}
</script>
		