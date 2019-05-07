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
				<li> บันทึกการส่งมอบ-รับมอบแสตมป์อากร/ลูกกุญแจ (อ.ส.๐๑.๔) </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						บันทึกการส่งมอบ-รับมอบแสตมป์อากร/ลูกกุญแจ (อ.ส.๐๑.๔)
				</h1>
            </div>
            
            <div class="row">
				<div class="col-xs-12">
										
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table25" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center">ลำดับที่</th>
                                    <th class="center">เลขอ้างอิงในระบบ</th>
									<th class="center">ลงวันที่่</th>
                                    <th class="center">แสตมป์อากร</th>
									<th class="center">ราคา 1 บาท</th>
                                    <th class="center">ราคา 5 บาท</th>
                                    <th class="center">ราคา 20 บาท</th>
                                    <th class="center">ลูกกุญแจ/รหัสลับ</th>
                                    <th class="center">รายการ</th>
								</tr>
							</thead>
									
							<tbody>
                            
                        	<?php
								
								
								
								$sql_lm = "SELECT * FROM tb_deliver_transaction d WHERE d.officeid = '".$_SESSION['OFFICEID']."' ORDER BY d.deliver_transaction_date DESC";
								
								$rs_lm = mysql_query($sql_lm,$connection);
								$u_index = 1;
								while($row_lm = mysql_fetch_array($rs_lm)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td class="center">'.$row_lm['deliver_transaction_id'].'</td>';
									echo '<td class="center">'.date('d-m-Y',strtotime($row_lm['deliver_date'])).'</td>';
									if($row_lm['stamp_status']=="Y"){
										echo '<td class="center"><span class="green"><i class="ace-icon fa fa-check bigger-110"></i></span></td>';
									}else{
										echo '<td class="center"><span class="red"><i class="ace-icon fa fa-times bigger-110"></i></span></td>';
									}
									echo '<td align="right">'.number_format($row_lm['stamp_one_bath']).'</td>';
									echo '<td align="right">'.number_format($row_lm['stamp_five_bath']).'</td>';
									echo '<td align="right">'.number_format($row_lm['stamp_twenty_bath']).'</td>';
									if($row_lm['key_status']=="Y"){
										echo '<td class="center"><span class="green"><i class="ace-icon fa fa-check bigger-110"></i></span></td>';
									}else{
										echo '<td class="center"><span class="red"><i class="ace-icon fa fa-times bigger-110"></i></span></td>';
									}
									
									echo '<td class="center">';
									echo '<div class="btn-group">';
									echo '	<button data-toggle="dropdown" class="btn btn-white btn-xs dropdown-toggle" aria-expanded="false">';
									echo '		เลือกรายการ';
									echo '		<span class="ace-icon fa fa-caret-down icon-on-right"></span>';
									echo '	</button>';
									echo '	<ul  class="dropdown-menu dropdown-info dropdown-menu-right">';
											
									echo '		<li><a href="WordTemplate/FDVWordExporter.php?deliver_transaction_id='.$row_lm['deliver_transaction_id'].'">พิมพ์บันทึกการส่งมอบ-รับมอบแสตมป์อากร/ลูกกุญแจ (อ.ส.๐๑.๔)</a></li>';	
									?>
                                    
									<li><a href="#" onclick="DeleteDeliver('<?php echo $row_lm['deliver_transaction_id']; ?>');">ลบรายการ</a></li>
                                    <?php
									
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
							<i class="ace-icon fa fa-user bigger-120 orange"></i> เพิ่มบันทึกการส่งมอบ-รับมอบแสตมป์อากร/ลูกกุญแจ
						</button>
                  	</div>				
              	</div>
         	</div>
        </div>
    </div>
</div>
<script>
	function DeleteDeliver(deliver_transaction_id){
		$.confirm({
			title: '',
			content: 'คุณต้องการลบข้อมูลใช่หรือไม่',
			animation: 'news',
			closeAnimation: 'news',
			buttons: {
				confirm: function () {
					$.ajax({
						type: "POST",
						url: "Ajax/ajax_DeliverDeleting.php",
						data: "deliver_transaction_id="+deliver_transaction_id,
						cache: false,
						success: function(data){
							if(data=="TRUE"){
								window.location.href = "index.php?service=deliverManager";
							}
						}
					});
				},cancel: function () {}
			}
		});
	}
	function GoAdding(){
		window.location.href="index.php?service=deliverAdding";
	}
</script>	