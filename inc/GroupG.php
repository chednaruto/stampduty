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
				<li> รายชื่อเจ้าหน้าที่กำหนดโครงสร้างประจำหน่วยงาน </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						รายชื่อเจ้าหน้าที่กำหนดโครงสร้างประจำหน่วยงาน
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
                                    <th class="center">ชื่อ-สกุล</th>
                                    <th class="center">หน่วยงาน</th>
								</tr>
							</thead>
									
							<tbody>
                            <?php
								$sqlg = "SELECT t.office_code,t.office_name,e.title,e.fname,e.lname
FROM eoffice_groupg e 
LEFT JOIN tb_office t ON e.officeid = t.office_code
WHERE e.officeid ='".$_SESSION['OFFICEID']."'";
								$rsg = mysql_query($sqlg,$connection);
								$i = 1;
								while($rowg = mysql_fetch_array($rsg)){
									echo '<tr>';
									echo '<td>'.$i.'</td>';
									echo '<td>'.$rowg['title'].$rowg['fname'].' '.$rowg['lname'].'</td>';
									echo '<td>'.$rowg['office_name'].'</td>';
									echo '</tr>';
									$i++;
								}
							?>
                        
							</tbody>
						</table>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
		