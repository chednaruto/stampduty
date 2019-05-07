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
				<li> รายการรับอากรแสตมป์ </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						รายการรับอากรแสตมป์
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
                                    <th class="center">วันที่</th>
									<th class="center">จำนวนแสตมป์อากร 1 บาท</th>
                                    <th class="center">จำนวนแสตมป์อากร 5 บาท</th>
                                    <th class="center">จำนวนแสตมป์อากร 20 บาท</th>
                                    <th class="center">เลือกรายการ</th>
								</tr>
							</thead>
									
							<tbody>
                        	<?php
								
								
								$sql_wb = 'SELECT  t.*
								FROM tb_receive_transaction t 
								WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"';
									
								$rs_wb = mysql_query($sql_wb,$connection);
								
								$u_index = 1;
								while($row_lm = mysql_fetch_array($rs_wb)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td class="center">'.date('d-m-Y',strtotime($row_lm['receive_date'])).'</td>';
									echo '<td class="center" style="text-align:right">'.$row_lm['stamp_one_bath'].'</td>';
									echo '<td class="center" style="text-align:right">'.$row_lm['stamp_five_bath'].'</td>';
									echo '<td class="center" style="text-align:right">'.$row_lm['stamp_twenty_bath'].'</td>';
									
									echo '<td class="center">';
									echo '<div class="hidden-sm hidden-xs action-buttons">';
									echo '<a class="green" href="index.php?service=receivestampEditing&receive_transaction_id='.$row_lm['receive_transaction_id'].'"><i class="ace-icon fa fa-pencil" style="margin-left:2px;margin-right:2px;"></i></a>';
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
							<i class="ace-icon fa fa-floppy-o bigger-120 orange"></i> บันทึกรับอากรแสตมป์
						</button>
                  	</div>				
              	</div>
         	</div>
        </div>
    </div>
</div>
<script>
	function GoAdding(){
		window.location.href="index.php?service=receivestampAdding";
	}
</script>
		