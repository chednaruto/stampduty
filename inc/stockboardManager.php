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
				<li> จัดการคณะกรรมการคลัง </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						จัดการคณะกรรมการคลัง
				</h1>
            </div>
            
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
									<th class="center">เลขหนังสือจริง</th>
									<th class="center">ลงวันที่</th>
                                    <th class="center">จำนวนกรรมการ</th>
                                    <th class="center">เลือกรายการ</th>
								</tr>
							</thead>
									
							<tbody>
                        	<?php
								
								
								$sql_wb = 'SELECT  t.*
								FROM tb_stock_document t 
								WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" AND t.stock_document_status="Y"';
									
								$rs_wb = mysql_query($sql_wb,$connection);
								
								$u_index = 1;
								while($row_lm = mysql_fetch_array($rs_wb)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td class="center">'.$row_lm['stock_document_id'].'</td>';
									echo '<td class="center">'.$row_lm['stock_document_number'].'</td>';
									if($row_lm['stock_document_date']=="0000-00-00" || $row_lm['stock_document_date']== ""){
										echo '<td class="center" style="text-align:right"></td>';
									}else{
										echo '<td class="center" style="text-align:right">'.date('d-m-Y',strtotime($row_lm['stock_document_date'])).'</td>';
									}
									
									$rs2 = mysql_query('SELECT COUNT(*) as cc FROM tb_stock_board t WHERE t.stock_document_id="'.$row_lm['stock_document_id'].'"',$connection);
									$row2 = mysql_fetch_assoc($rs2);
									
									echo '<td class="center" style="text-align:right">'.$row2['cc'].'</td>';
									
									echo '<td class="center">';
									echo '<div class="action-buttons">';
									echo '<a class="green" href="index.php?service=stockboardEditing&stock_document_id='.$row_lm['stock_document_id'].'"><i class="ace-icon fa fa-pencil" style="margin-left:2px;margin-right:2px;"></i></a>';
									echo '<a class="green" target="_blank" href="WordTemplate/FSTWordExporter.php?stock_document_id='.$row_lm['stock_document_id'].'"><i class="ace-icon fa fa-file-word-o" style="margin-left:2px;margin-right:2px;"></i></a>';
								?>
                                	<a class="red" href="#" onclick="DeleteStock('<?php echo $row_lm['stock_document_id'];?>')"><i class="ace-icon fa fa-trash" style="margin-left:2px;margin-right:2px;"></i></a>
                                <?php
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
							<i class="ace-icon fa fa-user bigger-120 orange"></i> เพิ่มคำสั่ง
						</button>
                  	</div>				
              	</div>
         	</div>
        </div>
    </div>
</div>
<script>
	function GoAdding(){
		window.location.href="index.php?service=stockboardAdding";
	}
	function DeleteStock(val){
		$.confirm({
					title: '',
					content: 'คุณต้องการลบคำสั่งใช่หรือไม่',
					animation: 'news',
					closeAnimation: 'news',
					buttons: {
						confirm: function () {
							$.ajax({
								type: "POST",
								url: "Ajax/ajax_StockBoardDeleting.php",
								data: "stock_document_id="+val,
								cache: false,
								success: function(data){
									if(data=="TRUE"){
										window.location.href = "index.php?service=stockboardManager";
									}
								}
							});
						},cancel: function () {}
					}
				});
	}
</script>
		