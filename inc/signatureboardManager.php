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
				<li> จัดการผู้มีอำนาจลงนาม </li>
             </ul>
             <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						จัดการผู้มีอำนาจลงนาม
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
                                    <th class="center">ชื่อ-สกุล</th>
									<th class="center">ตำแหน่ง</th>
                                    <th class="center">ตำแหน่งแสดงในเอกสาร</th>
                                    <th class="center">สถานะ</th>
                                    <th class="center">เลือกรายการ</th>
								</tr>
							</thead>
									
							<tbody>
                        	<?php
								
								
								$sql_wb = 'SELECT  t.*
								FROM tb_signature_board t 
								WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"';
									
								$rs_wb = mysql_query($sql_wb,$connection);
								
								$u_index = 1;
								while($row_lm = mysql_fetch_array($rs_wb)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td class="center">'.$row_lm['fullname'].'</td>';
									echo '<td class="center" style="text-align:right">'.$row_lm['position_m'].'</td>';
									echo '<td class="center" style="text-align:right">'.$row_lm['position_display'].'</td>';
									if($row_lm['status']=="Y"){
										echo '<td class="center" style="text-align:right"><i class="ace-icon fa fa-check green" style="margin-left:2px;margin-right:2px;"></i></td>';
									}else{
										echo '<td class="center" style="text-align:right"><i class="ace-icon fa fa-times red" style="margin-left:2px;margin-right:2px;"></i></td>';
									}
									echo '<td class="center">';
									echo '<div class="action-buttons">';
									echo '<a class="green" href="index.php?service=signatureboardEditing&id='.$row_lm['id'].'"><i class="ace-icon fa fa-pencil" style="margin-left:2px;margin-right:2px;"></i></a>';
									
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
							<i class="ace-icon fa fa-user bigger-120 orange"></i> เพิ่มผู้มีอำนาจลงนาม
						</button>
                  	</div>				
              	</div>
         	</div>
        </div>
    </div>
</div>
<script>
	function GoAdding(){
		window.location.href="index.php?service=signatureboardAdding";
	}
</script>
		