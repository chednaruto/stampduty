
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
				<li> <a href="index.php?service=limitmoneyManager">กำหนดวงเงินเก็บรักษา </a></li>
                <li> แก้ไขวงเงินเก็บรักษา </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>แก้ไขวงเงินเก็บรักษา</h1>
            </div>
            <div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <strong class="blue">
                                <small>&nbsp;</small></strong><strong class="red">
                            </strong>
                  		</div>	
					</div>


					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<!-- #section:pages/profile.picture -->
									<span class="profile-picture">
										<a href="#my-modal" class="tooltip-info" title="รายละเอียด" data-toggle="modal"><img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/US-dollar-icon.png" style="width:200px;height:200px;" /></a>
									</span>

									<!-- /section:pages/profile.picture -->
									<div class="space-4"></div>

									<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<b href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
												&nbsp;
												<span class="white">&nbsp;</span>
											</b>
										</div>
									</div>
								</div>

								<div class="space-6"></div>

								<!-- /section:custom/extra.grid -->
								<div class="hr hr16 dotted"></div>
							</div>

							<div class="col-xs-12 col-sm-9">
								<div class="space-12"></div>
								 <?php
									$sql_of = "SELECT * FROM tb_office t WHERE t.office_code LIKE '".$_GET['officeid']."'";
									$rs_of = mysql_query($sql_of,$connection);
									$row_of = mysql_fetch_assoc($rs_of);
								?>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> วงเงินใหม่ </div>
										<div class="profile-info-value col-sm-10">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="moneyLimit_tf" value="<?php echo $row_of['office_limit_money']; ?>">
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">฿</i>
                                                    </span>
                                                 	
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-value col-sm-2 center">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<button class="btn btn-white btn-warning btn-sm" style="height:33px;" onclick="saveMoneylimit();">
                                                    	<i class="ace-icon fa fa-floppy-o bigger-120 orange"></i> บันทึกวงเงิน
                                                   	</button>
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
							</div>
                            <div class="space-10"></div>
                           
                            <div class="col-xs-12 col-sm-9" id="infomation">
								<div class="space-12"></div>
								<!-- #section:pages/profile.info -->
                                <div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลหน่วยงาน </span>
                                </div>
                                <div class="space-10"></div>
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> รหัสหน่วยงาน </div>

										<div class="profile-info-value">
											<span id="fullname_tf"><?php echo $row_of['office_code']; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> ชื่อหน่วยงาน </div>

										<div class="profile-info-value">
											<span id="officename_tf"><?php echo $row_of['office_name']; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> จำนวนวงเงินเดิม </div>

										<div class="profile-info-value">
											<span id="groupname_tf"><?php echo number_format($row_of['office_limit_money'],2); ?> ฿</span>
										</div>
									</div>
								</div>
                                <div class="space-10"></div>
							</div>
						</div>
					</div>
                    <div class="space-10"></div>
                    <div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <strong class="blue">
                                <small>&nbsp;</small></strong>
                  		</div>	
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
        </div>
    </div>
</div>

<div class="profile-social-links align-center">
	<div id="my-modal" class="modal fade" tabindex="-1">
    	<div class="modal-dialog modal-lg">
        	<div class="modal-content">
            	<div class="modal-header" style="color:#99CCCC;">
                	<div class="pull-right onpage-help-modal-buttons">
                    	<button aria-hidden="true" data-dismiss="modal" class="btn btn-white btn-danger btn-sm" type="button">
                        	<i class="ace-icon fa fa-times icon-only"></i>
                       	</button>					  
                  	</div>					  
                    <h4 class="modal-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายละเอียด</h4>					
            	</div>
                <div class="modal-footer">
                	<div>
                    	<div class="col-sm-12">
                        	<div class="widget-box">
                            	<div class="widget-body">
                                	<div class="widget-main no-padding">
                                   		<div class="dialogs">
                                        	<div class="itemdiv dialogdiv">
                                            	<div class="user">
                                               		<img alt="Alexa's Avatar" src="assets/avatars/avatar5.png" />
                                        		</div>
                                               	<div class="body" style="text-align:left;">
                                                	<div class="time">
                                                    	<i class="ace-icon fa fa-clock-o"></i>
                                                    	<span class="green">SYSTEM</span>
                                                   	</div>
                                                  	<div class="name">
                                                       	<a href="#">ข้อมูลการกำหนดวงเงินของท่าน</a>  ดังนี้
                                                 	</div>
                                                    <div class="text">
                                                        <div id="chart-containerxx"></div>
                                                   	</div>
                                               	</div>
                                    		</div>
                                      	</div>
                                  	</div><!-- /.widget-main -->
                               	</div><!-- /.widget-body -->
                         	</div><!-- /.widget-box -->
                     	</div><!-- /.col -->
       				</div>
     			</div>
        	</div>
    	</div>
	</div>
</div>
<script type="text/javascript" src="fusion_chart/js/fusioncharts.js"></script>
<script type="text/javascript" src="fusion_chart/js/themes/fusioncharts.theme.fusion.js"></script>
<script>
	FusionCharts.ready(function() {

		var chartProperties = {
			"caption": "วงเงินเก็บรักษาแสตมป์อากร",
			"showValues":"1",
			//"numberSuffix": "%",
			"xAxisName": "หน่วยงาน",
            "yAxisName": "จำนวนวงเงินเก็บรักษา",
			"theme": "fusion",
			"enableMultiSlicing":"1"
		};
		$.ajax({
			type: "POST",
			url: "AjaxChart/ajax_GetOfficeLimitMoney.php",
			cache: false,
			success: function(data){
				var dietChart = new FusionCharts({
					type: 'bar3d',
					renderAt: 'chart-containerxx',
					width: '100%',
					height: '500',
					dataFormat: 'json',
					dataSource: {
					  "chart": chartProperties,
					  "data": data
					}
				}).render();
			}
		});
		
	});
	function saveMoneylimit(){
		var office_limit_money = $('#moneyLimit_tf').val();
		var office_code = '<?php echo $_GET[officeid]; ?>';
		$.ajax({
			type: "POST",
			url: "ajax/ajax_SetOfficeLimitMoney.php",
			data: "office_code="+office_code+"&office_limit_money="+office_limit_money,
			cache: false,
			success: function(data){
				if(data == "TRUE"){
					$.confirm({
						title: 'SDMS Alert!',
						content: 'บันทึกข้อมูลเรียบร้อย',
						animation: 'news',
						closeAnimation: 'news',
						buttons: {
							somethingElse: {
								text: 'ตกลง',
								btnClass: 'btn-blue',
								keys: ['enter', 'shift'],
								action: function(){
									window.location.href="index.php?service=limitmoneyManager";
								}
							}
						}
					});
					
				}else{
					$.alert({title: 'SDMS Alert!',content: data,animation: 'news',closeAnimation: 'news',});
				}
			}
		});
	}
	
</script>
			