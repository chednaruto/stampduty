
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
                <li> ตั้งยอดยกมาที่ใช้ในปีงบประมาณก่อน </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>
		
        <div class="page-content">
            <div class="page-header">
                <h1>ยอดยกมาที่ใช้ในปีงบประมาณก่อน</h1>
            </div>
            <div class="space-6"></div>
            <div class="row">
				<div class="col-xs-12">
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
										<a href="#my-modal-info" class="tooltip-info" title="รายละเอียด" data-toggle="modal"><img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/safe-icon.png" style="width:200px;height:200px;" /></a>
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
                           
                            <div class="col-xs-12 col-sm-9" id="infomation">
								<!-- #section:pages/profile.info -->
                                <div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลหน่วยงาน </span>
                                </div>
                                <div class="space-10"></div>
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> รหัสหน่วยงาน </div>

										<div class="profile-info-value">
											<span id="fullname_tf"><?php echo $_SESSION['OFFICEID']; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> ชื่อหน่วยงาน </div>

										<div class="profile-info-value">
											<span id="officename_tf"><?php echo $_SESSION['OFFICENAME']; ?></span>
										</div>
									</div>
								</div>
                                <div class="space-10"></div>
							</div>
                            
                            <?php
								$sql_innit = "SELECT * FROM tb_innit_stock s WHERE s.officeid = '".$_SESSION['OFFICEID']."'";
								$rs_innit = mysql_query($sql_innit,$connection);
								$row_innit = mysql_fetch_assoc($rs_innit);
							?>
                            <div class="col-xs-12 col-sm-9" id="infomation">
								<!-- #section:pages/profile.info -->
                                <div class="social-or-login center">
                                    <span class="bigger-110 red"> ยอดยกมาแสตมป์อากร</span>
                                </div>
                                <div class="space-10"></div>
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:200px;"> ที่ใช้ในปีงบประมาณก่อน :</div>
										<div class="profile-info-name" style="width:80px;">ราคา 1 บาท </div>
										<div class="profile-info-value">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="usebefo_1bath_tf" value="<?php echo $row_innit['usebefo_1bath']; ?>" readonly="readonly">
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">ดวง</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:80px;">ราคา 5 บาท </div>
                                        <div class="profile-info-value">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="usebefo_5bath_tf" value="<?php echo $row_innit['usebefo_5bath']; ?>" readonly="readonly">
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">ดวง</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:90px;">ราคา 20 บาท </div>
                                        <div class="profile-info-value">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="usebefo_20bath_tf" value="<?php echo $row_innit['usebefo_20bath']; ?>" readonly="readonly">
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">ดวง</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> เบิกแล้วตั้งแต่ต้นปีถึงวันที่ขอเบิกนี้ :</div>
										<div class="profile-info-name" style="width:80px;">ราคา 1 บาท </div>
										<div class="profile-info-value">
											<span id="officename_tf">
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="usesum_1bath_tf" value="<?php echo $row_innit['usesum_1bath']; ?>" readonly="readonly">
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">ดวง</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:80px;">ราคา 5 บาท </div>
                                        <div class="profile-info-value">
											<span id="officename_tf">
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="usesum_5bath_tf" value="<?php echo $row_innit['usesum_5bath']; ?>" readonly="readonly">
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">ดวง</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:90px;">ราคา 20 บาท </div>
                                        <div class="profile-info-value">
											<span id="officename_tf">
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="usesum_20bath_tf" value="<?php echo $row_innit['usesum_20bath']; ?>" readonly="readonly">
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">ดวง</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
									</div>
                                    
                                    <div class="profile-info-row">
										<div class="profile-info-name"> ที่มีอยู่ในขณะขอเบิก(ยกมา) :</div>
										<div class="profile-info-name" style="width:80px;">ราคา 1 บาท </div>
										<div class="profile-info-value">
											<span id="officename_tf">
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="balance_1bath_tf" value="<?php echo $row_innit['balance_1bath']; ?>"  onchange="CallMoney(this.value,1);">
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">ดวง</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:80px;">ราคา 5 บาท </div>
                                        <div class="profile-info-value">
											<span id="officename_tf">
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" onchange="CallMoney(this.value,5)" id="balance_5bath_tf" value="<?php echo $row_innit['balance_5bath']; ?>" >
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">ดวง</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:90px;">ราคา 20 บาท </div>
                                        <div class="profile-info-value">
											<span id="officename_tf">
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" onchange="CallMoney(this.value,20)" id="balance_20bath_tf" value="<?php echo $row_innit['balance_20bath']; ?>" >
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">ดวง</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
									</div>
                                    
                                    <div class="profile-info-row">
										<div class="profile-info-name"> มูลค่าคงเหลือ(บาท) </div>
										<div class="profile-info-name" style="width:80px;">ราคา 1 บาท </div>
										<div class="profile-info-value">
											<span id="officename_tf">
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="money_1bath_tf" value="<?php echo number_format($row_innit['balance_1bath']); ?>" disabled="disabled">
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">฿</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:80px;">ราคา 5 บาท </div>
                                        <div class="profile-info-value">
											<span id="officename_tf">
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="money_5bath_tf"  value="<?php echo number_format($row_innit['balance_5bath']*5); ?>" readonly="readonly">
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">฿</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:90px;">ราคา 20 บาท </div>
                                        <div class="profile-info-value">
											<span id="officename_tf">
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="money_20bath_tf" value="<?php echo number_format($row_innit['balance_20bath']*20); ?>" readonly="readonly">
                                                    <span class="input-group-addon">
                                                    	<i class="fa bigger-110">฿</i>
                                                    </span>
												</div> 
                                            </span>
										</div>
									</div>
                                    
								</div>
                                <div class="space-10"></div>
							</div>
						</div>
					</div>
                    
                    <div class="space-10"></div>
                    
                    <div class="center">
						<button type="button" class="btn btn-sm btn-primary btn-white btn-round" id="edit_b" onclick="activeGui('TRUE')">
							<i class="ace-icon fa fa-pencil bigger-150 middle green"></i>
							<span class="bigger-110">แก้ไข</span>
						</button>
                        <button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="saveInnitStock()" id="save_b" >
							<i class="ace-icon fa fa-floppy-o bigger-150 middle blue"></i>
							<span class="bigger-110">บันทึก</span>
						</button>
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
	<div id="my-modal-info" class="modal fade" tabindex="-1">
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
                <div class="modal-footer" style="height:640px;overflow-y:scroll">
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
                                                       	<a href="#">ข้อมูลแสตมป์อากรคงคลัง</a>  ดังนี้
                                                 	</div>
                                                    <div class="text">
                                                        <div id="chart-container2"></div>
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
			"caption": "วงเงินเก็บรักษาแสตมป์อากรเทียบอากรคงคลัง",
			"showValues":"1",
			//"numberSuffix": "%",
			"xAxisName": "หน่วยงาน",
            "yAxisName": "จำนวนวงเงินเก็บรักษา (บาท)",
			"theme": "fusion",
			"enableMultiSlicing":"1",
			"numberSuffix":" บาท",
			"formatNumberScale":"0"
		};
		var chartProperties2 = {
			"caption": "แสตมป์อากรคงคลัง",
			"showValues":"1",
			//"numberSuffix": "%",
			"xAxisName": "รายการ",
            "yAxisName": "จำนวน(ดวง)",
			"theme": "fusion",
			"enableMultiSlicing":"1",
			"numberSuffix":" ดวง",
			"formatNumberScale":"0"
		};
		$.ajax({
			type: "POST",
			url: "AjaxChart/ajax_GetWithdrawTransactionInfo.php",
			cache: false,
			success: function(data){
				var dietChart = new FusionCharts({
					type: "stackedbar3d",
					renderAt: "chart-containerxx",
					width: "100%",
					height: "300px",
					dataFormat: "json",
					dataSource: {
					  "chart": chartProperties,
					  "categories": [
						{
						  "category": [
							{
							  "label": data['LIMITMONEY']['label']
							}
						  ]
						}
					  ],
					  "dataset": [
						{
						  "seriesname": data['LIMITMONEY']['seriesname'][0],
						  "data": [
							{
							  "value": data['LIMITMONEY']['value'][0]
							}
						  ]
						},
						{
						  "seriesname": data['LIMITMONEY']['seriesname'][1],
						  "data": [
							{
							  "value": data['LIMITMONEY']['value'][1]
							}
						  ]
						}
					  ]
					}
				}).render();
				
				var dietChart = new FusionCharts({
					type: 'column3d',
					renderAt: 'chart-container2',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
					  "chart": chartProperties2,
					  "data": data['BALANCE']
					}
				}).render();
			}
		});
		
	});
	function activeGui(val){
		if(val=='TRUE'){
			//$('#usebefo_1bath_tf').removeAttr('readonly');
			//$('#usebefo_5bath_tf').removeAttr('readonly');
			//$('#usebefo_20bath_tf').removeAttr('readonly');
			//$('#usesum_1bath_tf').removeAttr('readonly');
			//$('#usesum_5bath_tf').removeAttr('readonly');
			//$('#usesum_20bath_tf').removeAttr('readonly');
			$('#balance_1bath_tf').removeAttr('readonly');
			$('#balance_5bath_tf').removeAttr('readonly');
			$('#balance_20bath_tf').removeAttr('readonly');
		}
	}
	function saveInnitStock(){
		var officeid = '<?php echo $_SESSION['OFFICEID']; ?>';
		var id = '<?php echo $_SESSION['ID']; ?>';
		var balance_1bath = $('#balance_1bath_tf').val();
		var balance_5bath = $('#balance_5bath_tf').val();
		var balance_20bath = $('#balance_20bath_tf').val();
		var usebefo_1bath = $('#usebefo_1bath_tf').val();
		var usebefo_5bath = $('#usebefo_5bath_tf').val();
		var usebefo_20bath = $('#usebefo_20bath_tf').val();
		var usesum_1bath = $('#usesum_1bath_tf').val();
		var usesum_5bath = $('#usesum_5bath_tf').val();
		var usesum_20bath = $('#usesum_20bath_tf').val();
		$.ajax({
			type: "POST",
			url: "ajax/ajax_InnitStockAdding.php",
			data: "officeid="+officeid+"&id="+id+"&balance_1bath="+balance_1bath+"&balance_5bath="+balance_5bath+"&balance_20bath="+balance_20bath+"&usebefo_1bath="+usebefo_1bath+"&usebefo_5bath="+usebefo_5bath+"&usebefo_20bath="+usebefo_20bath+"&usesum_1bath="+usesum_1bath+"&usesum_5bath="+usesum_5bath+"&usesum_20bath="+usesum_20bath,
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
									window.location.href="index.php?service=innitstockManager";
								}
							}
						}
					});
				}else{
					$.alert({title: 'SDMS Alert!',content: data,animation: 'news',closeAnimation: 'news',});
				}
			}
		})
		
	}
	function CallMoney(val,multiple){
		$('#money_'+multiple+"bath_tf").val(numberWithCommas(val*multiple));
	}
	
</script>
		