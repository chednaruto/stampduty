<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <ul class="breadcrumb">
                <li>
					<i class="ace-icon fa fa-home home-icon"></i><a href="index.php"> หน้าหลัก </a>
				</li>
                <li>
					<a href="index.php?service=withdrawtransactionManager"> รายการเบิกแสตมป์อากร (อ.ส.01) </a>
				</li>
				<li> เพิ่มรายการเบิกแสตมป์อากร (อ.ส.01) </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1> เพิ่มรายการเบิกแสตมป์อากร (อ.ส.01) </h1>
            </div>
    
            <div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <strong class="blue">
                                
                            </strong>
                  		</div>	
					</div>


					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<!-- #section:pages/profile.picture -->
                                    <div class="space-20"></div>
									<span class="profile-picture">
										<a href="#my-modal-info" class="tooltip-info" title="รายละเอียด" data-toggle="modal"><img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/withdrawlogo.png" style="width:200px;height:200px;" /></a>
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
								<div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลคำขอเบิกแสตมป์อากร (อ.ส.01) </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> คำขอเบิกแสตมป์อากรที่ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-6">
                                                    <input class="form-control center" type="text" id="withdraw_document_id_tf" >
												</div>                                                
                                            </span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> ลงวันที่ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-6">
													<input class="form-control date-picker center" id="withdraw_document_date_tf" type="text" data-date-format="dd-mm-yyyy" />
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>                                               
                                            </span>
										</div>
									</div>
								</div>
							</div>
                            <div class="col-xs-12 col-sm-9">
								<div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110">รายละเอียดจำนวนที่ขอเบิก (ดวง) </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:150px;"> ราคาดวงละ 1 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="amount_withdraw_one_bath_tf" style="width:100%;" onchange="CallMoney(this.value,1,'one')">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<input class="form-control center" type="text" id="money_one_bath_tf" style="width:100%;" readonly="readonly">
                                                </div>
                                           	</span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:150px;"> ราคาดวงละ 5 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="amount_withdraw_five_bath_tf" style="width:100%;" onchange="CallMoney(this.value,5,'five')">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<input class="form-control center" type="text" id="money_five_bath_tf" style="width:100%;" readonly="readonly">
                                                </div>
                                           	</span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:150px;"> ราคาดวงละ 20 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="amount_withdraw_twenty_bath_tf" style="width:100%;" onchange="CallMoney(this.value,20,'twenty')">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<input class="form-control center" type="text" id="money_twenty_bath_tf" style="width:100%;" readonly="readonly">
                                                </div>
                                           	</span>
										</div>
									</div>
								</div>
							</div>
                            
                            <div class="col-xs-12 col-sm-12">
                            	<div class="space-12"></div>
                                <div class="social-or-login center">
                                    <span class="bigger-110"> คณะกรรมการเบิกแสตมป์อากร </span>
                                </div>
                                <div class="space-12"></div>
                                <div id="list"> 
                                    <div class="profile-user-info profile-user-info-striped profile1">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;height:40px;">
                                                <span>
                                                    <div class="input-group  col-sm-12">
                                                    	<select style="width:100%;" onchange="GetInfoWithdrawBoard(1)" id="withdraw_id1_tf">
                                                        	<option value="" ></option>
                                                    	<?php
															$sql_wb = "SELECT * ,tbt.withdraw_board_type_name
															FROM (
																SELECT * 
																FROM tb_withdraw_document t 
																WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
																ORDER BY t.withdraw_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
															LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
															$rs_wb = mysql_query($sql_wb,$connection);
															while($row_wb = mysql_fetch_array($rs_wb)){
																echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['withdraw_board_type_name'].']</option>';
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m1_tf">&nbsp;</span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img1_tf"></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped profile2">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;height:40px;">
                                                <span>
                                                    <div class="input-group  col-sm-12">
                                                    	<select style="width:100%;" onchange="GetInfoWithdrawBoard(2)" id="withdraw_id2_tf">
                                                        	<option value="" ></option>
                                                    	<?php
															$sql_wb = "SELECT * ,tbt.withdraw_board_type_name
															FROM (
																SELECT * 
																FROM tb_withdraw_document t 
																WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
																ORDER BY t.withdraw_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
															LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
															$rs_wb = mysql_query($sql_wb,$connection);
															while($row_wb = mysql_fetch_array($rs_wb)){
																echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['withdraw_board_type_name'].']</option>';
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m2_tf">&nbsp;</span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img2_tf"></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped profile3">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;height:40px;">
                                                <span>
                                                    <div class="input-group  col-sm-12">
                                                    	<select style="width:100%;" onchange="GetInfoWithdrawBoard(3)" id="withdraw_id3_tf">
                                                        	<option value="" ></option>
                                                    	<?php
															$sql_wb = "SELECT * ,tbt.withdraw_board_type_name
															FROM (
																SELECT * 
																FROM tb_withdraw_document t 
																WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
																ORDER BY t.withdraw_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
															LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
															$rs_wb = mysql_query($sql_wb,$connection);
															while($row_wb = mysql_fetch_array($rs_wb)){
																echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['withdraw_board_type_name'].']</option>';
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m3_tf">&nbsp;</span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img3_tf"></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                               	</div>
                                <div class="space-10"></div>
							</div>
                            <div class="space-10"></div>
                            <div class="col-xs-12 col-sm-12">
								<div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110"> ผู้มีอำนาจลงนาม </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> ผู้มีอำนาจลงนาม </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <select class="form-control" id="signature_id_tf" style="width:100%;">
                                                    	<option value=""></option>
                                                    	<?php
															$sql3 = "SELECT t.id,t.fullname,t.position_display FROM tb_signature_board t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.`status` = 'Y'";
															$rs3 = mysql_query($sql3,$connection);
															while($row3 = mysql_fetch_array($rs3)){
																if($row1['signature_id']==$row3['id']){
																	echo '<option value="'.$row3[id].'" selected="selected">'.$row3['fullname'].' ['.$row3['position_display'].']'.'</option>';
																}else{
																	echo '<option value="'.$row3[id].'">'.$row3['fullname'].' ['.$row3['position_display'].']'.'</option>';
																}
																
															}
														?>
													</select>
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
                                <div class="space-10"></div>
                                <div class="social-or-login center">
                                    <span class="bigger-110"> </span>
                                </div>
                                <div class="space-10"></div>
							</div>
						</div>
					</div>
                    <div class="space-10"></div>
                    <div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <div class="center">
								<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="SaveWithdrawTransaction()">
									<i class="ace-icon fa fa-floppy-o bigger-150 middle orange2"></i>
									<span class="bigger-110">บันทึก</span>
								</button>
							</div>
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
		var chartProperties = {
			"caption": "วงเงินเก็บรักษาเทียบจำนวนแสตมป์อากรคงคลัง",
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
	function GetInfoWithdrawBoard(tag){
		var id = $('#withdraw_id'+tag+'_tf').val();
		if(id.trim()!=""){
			$.ajax({
				type: "POST",
				url: "ajax/ajax_GetWithdrawBoardInfo.php",
				data: "id="+id,
				cache: false,
				success: function(data){
					var info = JSON.parse(data);
					$('#sinature_img'+tag+'_tf').empty();
					$('#position_m'+tag+'_tf').text('');
					$('#sinature_img'+tag+'_tf').append('<img src="http://eoffice.rd.go.th/e_office/signature/'+id+'.jpg" style="height:32px;"/>')
					$('#position_m'+tag+'_tf').text(info['position_m']);
				}
			});
		}else{
			$('#sinature_img'+tag+'_tf').empty();
			$('#position_m1_'+tag+'f').text('');
		}
	}
	function CallMoney(val,multiply,tag){
		var number = val*multiply;
		$('#money_'+tag+"_bath_tf").val(number);
	}
	function SaveWithdrawTransaction(){
		var withdraw_document_id = $('#withdraw_document_id_tf').val();
		if($("#withdraw_document_date_tf").val()!=""){ 
			var dfrom = $("#withdraw_document_date_tf").val().split("-")
			var withdraw_document_date = dfrom[2]+"-"+dfrom[1]+"-"+dfrom[0];		
		}else{
			var withdraw_document_date = "0000-00-00";
		}
		var amount_withdraw_one_bath = $('#amount_withdraw_one_bath_tf').val();
		var amount_withdraw_five_bath = $('#amount_withdraw_five_bath_tf').val();
		var amount_withdraw_twenty_bath = $('#amount_withdraw_twenty_bath_tf').val();
		var signature_id = $('#signature_id_tf').val();
		var withdraw_id1 = $('#withdraw_id1_tf').val();
		var withdraw_id2 = $('#withdraw_id2_tf').val();
		var withdraw_id3 = $('#withdraw_id3_tf').val();
		var officeid = '<?php echo $_SESSION['OFFICEID']; ?>';
		

		$.ajax({
				type: "POST",
				url: "ajax/ajax_WithdrawTransactionAdding.php",
				data: "withdraw_document_id="+withdraw_document_id+"&withdraw_document_date="+withdraw_document_date+"&amount_withdraw_one_bath="+amount_withdraw_one_bath
				+"&amount_withdraw_five_bath="+amount_withdraw_five_bath+"&amount_withdraw_twenty_bath="+amount_withdraw_twenty_bath+"&signature_id="+signature_id+"&withdraw_id1="+withdraw_id1+"&withdraw_id2="+withdraw_id2+"&withdraw_id3="+withdraw_id3+"&officeid="+officeid,
				cache: false,
				success: function(data){
					if(data == "TRUE"){
						$.confirm({
							title: '',
							content: 'บันทึกข้อมูลเรียบร้อย',
							animation: 'news',
							closeAnimation: 'news',
							buttons: {
								somethingElse: {
									text: 'ตกลง',
									btnClass: 'btn-blue',
									keys: ['enter', 'shift'],
									action: function(){
										window.location.href="index.php?service=withdrawtransactionManager";
									}
								}
							}
						});
					}else{
						$.alert({title: '',content: '<div style="vertical-align:middle;text-align:center;"> '+data+' </div>',animation: 'news',closeAnimation: 'news',buttons: {okay: {text: 'ตกลง'}}});
					}
				}
			});
	}
	
	
</script>			