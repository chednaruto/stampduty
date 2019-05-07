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
                <li>
					<a href="index.php?service=stampSellManager">รายการขอซื้อแสตมป์อากร (อ.ส.๑๐)</a>
				</li>
				<li> บันทึกรายการขอซื้อแสตมป์อากร (อ.ส.๑๐)</li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix" >
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <strong class="blue">
                                <small> บันทึกรายการขอซื้อแสตมป์อากร (อ.ส.๑๐)</small>
                            </strong>
                  		</div>	
					</div>
					<?php
						$sqlgd = "SELECT t.*,tp.stamp_party_number FROM tb_sell_party_transaction t LEFT JOIN tb_stamp_party tp ON t.stamp_party_transaction_id = tp.stamp_party_transaction_id WHERE t.sell_party_transaction_id = '".$_GET['sell_party_transaction_id']."'";
						$rsgd = mysql_query($sqlgd,$connection);
						$rowgd = mysql_fetch_assoc($rsgd);
					?>
					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
                                	<div class="space-30"></div>
                                    <div class="space-30"></div>
                                    <div class="space-30"></div>
									<!-- #section:pages/profile.picture -->
									<span class="profile-picture">
										<a href="#my-modal-info" class="tooltip-info" title="รายละเอียด" data-toggle="modal"><img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/payment-icon.png"  style="width:200px;"/></a>
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
								<!-- /section:custom/extra.grid -->
								<div class="hr hr16 dotted"></div>
							</div>
                            <div class="col-xs-12 col-sm-9" id="infomation">
								<div class="space-6"></div>
                                <div class="social-or-login center">
                                    <span class="bigger-110"> รายละเอียด </span>
                                </div>
                                <div class="space-6"></div>
                                <div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:200px;"> เลขประจำตัวผู้เสียภาษี (13 หลัก)</div>
										<div class="profile-info-value col-sm-10">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="stamp_party_cid_tf" value="<?php echo $rowgd['stamp_party_cid']; ?>">
                                                    <span class="input-group-addon">
                                                    	<i class="fa fa-user bigger-110"></i>
                                                    </span>
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-value col-sm-2 center">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<button class="btn btn-white btn-warning btn-sm" style="height:33px;" onclick="SearchInfo('stamp_party_cid_tf');">
                                                    	<i class="ace-icon fa fa-search bigger-120 orange"></i>
                                                   	</button>
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:200px;"> เลขประจำตัวผู้เสียภาษี (10 หลัก)</div>
                                        <div class="profile-info-value col-sm-10">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="stamp_party_tin_tf" >
                                                    <span class="input-group-addon">
                                                    	<i class="fa fa-user bigger-110"></i>
                                                    </span>
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-value col-sm-2 center">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<button class="btn btn-white btn-warning btn-sm" style="height:33px;" onclick="SearchInfo('stamp_party_tin_tf');">
                                                    	<i class="ace-icon fa fa-search bigger-120 orange"></i>
                                                   	</button>
												</div>                                                
                                            </span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:200px;"> เลขที่สัญญา </div>
										<div class="profile-info-value col-sm-10">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="stamp_party_number_tf" value="<?php echo $rowgd['stamp_party_number']; ?>">
                                                    <span class="input-group-addon">
                                                    	<i class="fa fa-user bigger-110"></i>
                                                    </span>
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-value col-sm-2 center">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<button class="btn btn-white btn-warning btn-sm" style="height:33px;" onclick="SearchInfo('stamp_party_number_tf');">
                                                    	<i class="ace-icon fa fa-search bigger-120 orange"></i>
                                                   	</button>
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:200px;display:none">รหัสคู่สัญญา</div>
                                        <div class="profile-info-value col-sm-12" style="display:none;">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="stamp_party_transaction_id_tf" >
                                                    <span class="input-group-addon">
                                                    	<i class="fa fa-user bigger-110"></i>
                                                    </span>
												</div>                                                
                                            </span>
										</div>
                                        
									</div>
								</div>
                                <div class="space-10"></div>
                                <div class="profile-user-info profile-user-info-striped">
                                	
									<div class="profile-info-row">
										<div class="profile-info-name"> ผู้ซื้อแสตมป์อากร </div>
										<div class="profile-info-value">
											<span id="fullname_tf"><input class="form-control active center" type="text" id="stamp_party_fullname_tf"></span>
										</div>
                                        <div class="profile-info-name" style="width:50px;"> อายุ </div>
										<div class="profile-info-value" style="width:80px;">
											<span id="fullname_tf"><input class="form-control active center" type="text" id="stamp_party_age_tf"></span>
										</div>
                                        <div class="profile-info-name" style="width:150px;"> ชื่อสถานประกอบการ </div>
                                        <div class="profile-info-value">
											<span id="fullname_tf"><input class="form-control active center" type="text" id="stamp_party_company_tf" ></span>
										</div>
									</div>
								</div>
								<div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
										<div class="profile-info-name"> อาคาร </div>
										<div class="profile-info-value">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_building_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> ห้องเลขที่ </div>
										<div class="profile-info-value">
											<span id="officename_tf" style="width:80px;"><input class="form-control active center" type="text" id="stamp_party_room_number_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> ชั้นที่ </div>
										<div class="profile-info-value">
											<span id="officename_tf" style="width:80px;"><input class="form-control active center" type="text" id="stamp_party_floor_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> หมู่บ้าน </div>
                                        <div class="profile-info-value">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_village_name_tf" ></span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
										<div class="profile-info-name"> เลขที่ </div>
										<div class="profile-info-value" style="width:100px;">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_address_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> หมู่ที่ </div>
										<div class="profile-info-value" style="width:70px;">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_village_moo_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:80px;"> ตรอก/ซอย </div>
										<div class="profile-info-value">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_alley_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> ถนน </div>
                                        <div class="profile-info-value">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_road_tf" ></span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
										<div class="profile-info-name"> จังหวัด </div>
										<div class="profile-info-value" style="width:220px;">
											<span id="officename_tf">
                                            	<div style="220px;">
                                                    <select class="chosen-select form-control" id="stamp_party_province_id_tf" data-placeholder="จังหวัด" onchange="GetDistrice(this.value)">
                                                        <option value="">  </option>
                                                        <?php
															$sql_pv = "SELECT * FROM tb_province";
															$rs_pv = mysql_query($sql_pv,$connection);
															while($row_pv = mysql_fetch_array($rs_pv)){
																echo '<option value="'.$row_pv['province_id'].'">'.$row_pv['province_name'].'</option>';
															}
														?>
                                                    </select>
                                                </div>
                                        	</span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> อำเภอ </div>
										<div class="profile-info-value" style="width:220px;">
											<span id="officename_tf">
                                           		<div style="220px;">
                                                    <select class="chosen-select form-control" id="stamp_party_district_id_tf" data-placeholder="อำเภอ" onchange="GetSubDistrice(this.value)">
                                                        <option value="">  </option>
                                                    </select>
                                              	</div>
                                        	</span>
										</div>
                                        <div class="profile-info-name"  style="width:80px;"> ตำบล </div>
										<div class="profile-info-value">
											<span id="officename_tf">
                                           		<div style="200px;">
                                                    <select class="chosen-select form-control" id="stamp_party_subdistrict_id_tf" data-placeholder="ตำบล">
                                                        <option value="">  </option>
                                                    </select>
                                              	</div>
                                        	</span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
										<div class="profile-info-name"> รหัสไปรษณีย์ </div>
										<div class="profile-info-value">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_postcode_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> โทรศัพท์ </div>
										<div class="profile-info-value">
											<span><input class="form-control active center" type="text" id="stamp_party_telephone_tf" ></span>
										</div>
									</div>
								</div>
                                <div class="space-10"></div>
                                <div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
                                    	<div class="profile-info-name"  style="width:270px;"> จำนวนแสตมป์อากร ราคา ดวงละ 1 บาท </div>
                                        <div class="profile-info-value">
											<span><input type="text" id="stamp_one_bath_tf" class="form-control active center" style="width:100%;" onchange="CallculateMoney()" value="<?php echo $rowgd['stamp_one_bath']; ?>"/></span>
										</div>
                                        <div class="profile-info-name"  style="width:170px;"> จำนวนเงิน </div>
                                        <div class="profile-info-value">
											<span><input type="text" id="money_stamp_one_bath_tf" class="form-control active center" style="width:100%;" disabled="disabled"/></span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
                                    	<div class="profile-info-name"  style="width:270px;"> จำนวนแสตมป์อากร ราคา ดวงละ 5 บาท </div>
                                        <div class="profile-info-value">
											<span><input type="text" id="stamp_five_bath_tf" class="form-control active center" style="width:100%;"  onchange="CallculateMoney()" value="<?php echo $rowgd['stamp_five_bath']; ?>"/></span>
										</div>
                                        <div class="profile-info-name"  style="width:170px;"> จำนวนเงิน </div>
                                        <div class="profile-info-value">
											<span><input type="text" id="money_stamp_five_bath_tf" class="form-control active center" style="width:100%;" disabled="disabled"/></span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
                                    	<div class="profile-info-name"  style="width:270px;"> จำนวนแสตมป์อากร ราคา ดวงละ 20 บาท </div>
                                        <div class="profile-info-value">
											<span><input type="text" id="stamp_twenty_bath_tf" class="form-control active center" style="width:100%;"  onchange="CallculateMoney()" value="<?php echo $rowgd['stamp_twenty_bath']; ?>"/></span>
										</div>
                                        <div class="profile-info-name"  style="width:170px;"> จำนวนเงิน </div>
                                        <div class="profile-info-value">
											<span><input type="text" id="money_stamp_twenty_bath_tf" class="form-control active center" style="width:100%;" disabled="disabled"/></span>
										</div>
									</div>
								</div>
                                
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
                                    	<div class="profile-info-name"  style="width:270px;visibility:hidden;">&nbsp;</div>
                                        <div class="profile-info-value" style="visibility:hidden;">
											<span><input type="text" id="" class="form-control active center" style="width:100%;" /></span>
										</div>
                                        <div class="profile-info-name"  style="width:170px;"> จำนวนเงิน (ก่อนหักส่วนลด) </div>
                                        <div class="profile-info-value">
											<span><input type="text" id="money_sum_tf" class="form-control active center" style="width:100%;" disabled="disabled"/></span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
                                    	<div class="profile-info-name"  style="width:270px;visibility:hidden;">&nbsp;</div>
                                        <div class="profile-info-value" style="visibility:hidden;">
											<span><input type="text" id="" class="form-control active center" style="width:100%;" /></span>
										</div>
                                        <div class="profile-info-name"  style="width:170px;"> <b>หัก*</b> ส่วนลด<b>ร้อยละ 3</b> </div>
                                        <div class="profile-info-value">
											<span><input type="text" id="money_percent_tf" class="form-control active center" style="width:100%;" disabled="disabled"/></span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
                                    	<div class="profile-info-name"  style="width:270px;visibility:hidden;">&nbsp;</div>
                                        <div class="profile-info-value" style="visibility:hidden;">
											<span><input type="text" id="" class="form-control active center" style="width:100%;" /></span>
										</div>
                                        <div class="profile-info-name"  style="width:170px;"> จำนวนเงินสุทธิ </div>
                                        <div class="profile-info-value">
											<span><input type="text" id="money_total_tf" class="form-control active center" style="width:100%;" disabled="disabled"/></span>
										</div>
									</div>
								</div>
                                <div class="space-10"></div>
							</div>
                            <div class="col-xs-12 col-sm-3" id=""></div>
                            <div class="col-xs-12 col-sm-9" id="">
								<!-- /section:pages/profile.info -->
								<div class="space-10"></div>
                                
								<div class="center">
									<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="saveSellStamp();">
										<i class="ace-icon fa fa-floppy-o bigger-150 middle orange2"></i>
										<span class="bigger-110">บันทึกรายการขอซื้อแสตมป์อากร (อ.ส.๑๐)</span>
									</button>
								</div>
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
                                                       	<a href="#">ข้อมูลการกำหนดวงเงินของท่านเทียบอากรคงคลัง</a>  ดังนี้
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
<script type="text/javascript">
	FusionCharts.ready(function() {
		var chkSearchAutoEdit = '<?php echo $_GET['sell_party_transaction_id']; ?>';
		if(chkSearchAutoEdit!=""){
			SearchInfo('stamp_party_number_tf');
		}
		
		CallculateMoney();
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
	function CallculateMoney(){
		var stamp_one_bath = $('#stamp_one_bath_tf').val()-0;
		var stamp_five_bath = $('#stamp_five_bath_tf').val()-0;
		var stamp_twenty_bath = $('#stamp_twenty_bath_tf').val()-0;
		var money_sum = stamp_one_bath+stamp_five_bath*5+stamp_twenty_bath*20
		$('#money_stamp_one_bath_tf').val(stamp_one_bath);
		$('#money_stamp_five_bath_tf').val(stamp_five_bath*5);
		$('#money_stamp_twenty_bath_tf').val(stamp_twenty_bath*20);
		$('#money_sum_tf').val(money_sum);
		if(money_sum>=1000){
			$('#money_percent_tf').val(money_sum*3/100);
			$('#money_total_tf').val(money_sum-(money_sum*3/100));
		}else{
			$('#money_percent_tf').val(0);
			$('#money_total_tf').val(money_sum);
		}
	}
	function GetDistrice(province_id,district_id){
		$('#stamp_party_subdistrict_id_tf').children('option').remove();
		$('#stamp_party_subdistrict_id_tf').trigger('chosen:updated');
		$.ajax({
			type: "POST",
			url: "ajax/ajax_GetDistrict.php",
			data: "province_id="+province_id,
			cache: false,
			success: function(data){
				result = JSON.parse(data);
				$('#stamp_party_district_id_tf').children('option').remove();
				$("#stamp_party_district_id_tf").append('<option value=" "></option>');
				for(var i = 0;i<result.length;i++){
					if(result[i]['district_id'] == district_id){
						$("#stamp_party_district_id_tf").append('<option value="'+result[i]['district_id']+'" selected="selectec">'+result[i]['district_name']+'</option>');
					}else{
						$("#stamp_party_district_id_tf").append('<option value="'+result[i]['district_id']+'">'+result[i]['district_name']+'</option>');
					}
				}
				$('#stamp_party_district_id_tf').trigger('chosen:updated');
			}
		});
	}
	
	function GetSubDistrice(district_id,subdistrict_id){
		$.ajax({
			type: "POST",
			url: "ajax/ajax_GetSubDistrict.php",
			data: "district_id="+district_id,
			cache: false,
			success: function(data){
				result = JSON.parse(data);
				$('#stamp_party_subdistrict_id_tf').children('option').remove();
				$("#stamp_party_subdistrict_id_tf").append('<option value=" "></option>');
				for(var i = 0;i<result.length;i++){
					if(subdistrict_id == result[i]['subdistrict_id']){
						$("#stamp_party_subdistrict_id_tf").append('<option value="'+result[i]['subdistrict_id']+'" selected="selected">'+result[i]['subdistrict_name']+'</option>');
					}else{
						$("#stamp_party_subdistrict_id_tf").append('<option value="'+result[i]['subdistrict_id']+'">'+result[i]['subdistrict_name']+'</option>');
					}
				}
				$('#stamp_party_subdistrict_id_tf').trigger('chosen:updated');
			}
		});
	}
	function SearchInfo(obj){
		var dataSearch = $('#'+obj).val();
		if(dataSearch.trim()!=""){
			$.ajax({
				type: "POST",
				url: "ajax/ajax_GetStampParty.php",
				data: "cid="+dataSearch,
				cache: false,
				success: function(data){
					if(data!="false"){
						result = JSON.parse(data);
						$('#stamp_party_transaction_id_tf').val(result['stamp_party_transaction_id']);
						$('#stamp_party_fullname_tf').val(result['stamp_party_fullname']);
						$('#stamp_party_cid_tf').val(result['stamp_party_cid']);
						$('#stamp_party_tin_tf').val(result['stamp_party_tin']);
						$('#stamp_party_age_tf').val(result['stamp_party_age']);
						$('#stamp_party_company_tf').val(result['stamp_party_company']);
						$('#stamp_party_building_tf').val(result['stamp_party_building']);
						$('#stamp_party_room_number_tf').val(result['stamp_party_room_number']);
						$('#stamp_party_floor_tf').val(result['stamp_party_floor']);
						$('#stamp_party_village_name_tf').val(result['stamp_party_village_name']);
						$('#stamp_party_address_tf').val(result['stamp_party_address']);
						$('#stamp_party_village_moo_tf').val(result['stamp_party_village_moo']);
						$('#stamp_party_alley_tf').val(result['stamp_party_alley']);
						$('#stamp_party_road_tf').val(result['stamp_party_road']);
						$('#stamp_party_province_id_tf').val(result['stamp_party_province_id']).prop('selected', true);
						$('#stamp_party_province_id_tf').trigger('chosen:updated');
						GetDistrice(result['stamp_party_province_id'],result['stamp_party_district_id']);
						GetSubDistrice(result['stamp_party_district_id'],result['stamp_party_subdistrict_id']);
						$('#stamp_party_postcode_tf').val(result['stamp_party_postcode']);
						$('#stamp_party_telephone_tf').val(result['stamp_party_telephone']);
						$('#stamp_party_number_tf').val(result["stamp_party_number"])
					}else{
						$.alert({title: 'SDMS Alert!',content: 'ไม่พบคู่สัญญา หรือ สัญญาหมดอายุ',animation: 'news',closeAnimation: 'news',});
						$('#stamp_party_transaction_id_tf').val(result['stamp_party_transaction_id']);
						$('#stamp_party_fullname_tf').val(result['stamp_party_fullname']);
						$('#stamp_party_cid_tf').val(result['stamp_party_cid']);
						$('#stamp_party_tin_tf').val(result['stamp_party_tin']);
						$('#stamp_party_age_tf').val(result['stamp_party_age']);
						$('#stamp_party_company_tf').val(result['stamp_party_company']);
						$('#stamp_party_building_tf').val(result['stamp_party_building']);
						$('#stamp_party_room_number_tf').val(result['stamp_party_room_number']);
						$('#stamp_party_floor_tf').val(result['stamp_party_floor']);
						$('#stamp_party_village_name_tf').val(result['stamp_party_village_name']);
						$('#stamp_party_address_tf').val(result['stamp_party_address']);
						$('#stamp_party_village_moo_tf').val(result['stamp_party_village_moo']);
						$('#stamp_party_alley_tf').val(result['stamp_party_alley']);
						$('#stamp_party_road_tf').val(result['stamp_party_road']);
						$('#stamp_party_province_id_tf').val(result['stamp_party_province_id']).prop('selected', true);
						$('#stamp_party_province_id_tf').trigger('chosen:updated');
						$('#stamp_party_subdistrict_id_tf').children('option').remove();
						$('#stamp_party_subdistrict_id_tf').trigger('chosen:updated');
						$('#stamp_party_district_id_tf').children('option').remove();
						$('#stamp_party_district_id_tf').trigger('chosen:updated');
						$('#stamp_party_postcode_tf').val(result['stamp_party_postcode']);
						$('#stamp_party_telephone_tf').val(result['stamp_party_telephone']);
						$('#stamp_party_number_tf').val(result["stamp_party_number"])
					}
				}
			});
		}else{
			$.alert({title: 'SDMS Alert!',content: 'กรุณากรอกเลขประจำตะวผู้เสียภาษี 13 หลัก 10 หลัก หรือ สัญญาเลขที่',animation: 'news',closeAnimation: 'news',});
		}
	}
	
	function saveSellStamp(){
		
		var sell_party_transaction_id = '<?php echo $_GET['sell_party_transaction_id']; ?>';
		var stamp_one_bath = $('#stamp_one_bath_tf').val();
		var stamp_five_bath = $('#stamp_five_bath_tf').val();
		var stamp_twenty_bath = $('#stamp_twenty_bath_tf').val();
		var stamp_party_transaction_id = $('#stamp_party_transaction_id_tf').val();
		if(stamp_party_transaction_id!=""){
			$.ajax({
				type: "POST",
				url: "ajax/ajax_SellPartyTransactionAdding.php",
				data: "sell_party_transaction_id="+sell_party_transaction_id+"&stamp_one_bath="+stamp_one_bath+"&stamp_five_bath="+stamp_five_bath+"&stamp_twenty_bath="+stamp_twenty_bath+"&stamp_party_transaction_id="+stamp_party_transaction_id,
				cache: false,
				success: function(data){
					if(data=="TRUE"){
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
										window.location.href= "index.php?service=stampSellManager";
									}
								}
							}
						});
					}else{
						$.alert({title: 'SDMS Alert!',content: data,animation: 'news',closeAnimation: 'news',});
					}
				}
			});
		}else{
			$.alert({title: 'SDMS Alert!',content: 'กรุณาเลือกคู่สัญญา',animation: 'news',closeAnimation: 'news',});
		}
	}
</script>			