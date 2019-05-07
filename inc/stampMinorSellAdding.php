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
					<a href="index.php?service=stampMinorSellManager">รายการแบบนำส่งเงินจากการขายปลีกแสตมป์อากร (อ.ส.๑๐.๑)</a>
				</li>
				<li> บันทึกรายการแบบนำส่งเงินจากการขายปลีกแสตมป์อากร (อ.ส.๑๐.๑)</li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>
		<?php
			
				$sell_minor_date = date('d-m-Y');
				$sql_gd = "SELECT * FROM tb_sell_minor_transaction t WHERE t.sell_minor_transaction_id = '".$_GET['sell_minor_transaction_id']."'";
				$rs_gd = mysql_query($sql_gd,$connection);
				$row_gd = mysql_fetch_assoc($rs_gd);
				$sell_minor_cid = $row_gd['sell_minor_cid'];

			
		?>
        <div class="page-content">
            <div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix" >
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <strong class="blue">
                                <small> บันทึกรายการแบบนำส่งเงินจากการขายปลีกแสตมป์อากร (อ.ส.๑๐.๑)</small>
                            </strong>
                  		</div>	
					</div>
					
					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
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
                                <div class="profile-user-info profile-user-info-striped" >
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:200px;"> ประจำวันที่ </div>
										<div class="profile-info-value col-sm-10">
											<span>
                                            	<div class="input-group col-sm-6">
                                                    <input class="form-control active center" type="text" id="sell_minor_date_tf" disabled="disabled" value="<?php echo $sell_minor_date; ?>">
                                                    <span class="input-group-addon">
                                                    	<i class="fa fa-calendar bigger-110"></i>
                                                    </span>
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:200px;"> รหัสหน่วยงาน </div>
										<div class="profile-info-value">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="officeid_tf" disabled="disabled" value="<?php echo $_SESSION['OFFICEID']; ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:200px;"> ชื่อหน่วยงาน </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="officename_tf" disabled="disabled" value="<?php echo $_SESSION['OFFICENAME']; ?>">
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:200px;"> เลขประจำตัวผู้เสียภาษี (13 หลัก)</div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="sell_minor_cid_tf" value="<?php echo $sell_minor_cid; ?>">
                                                    <span class="input-group-addon">
                                                    	<i class="fa fa-user bigger-110"></i>
                                                    </span>
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:200px;"> เลขประจำตัวผู้เสียภาษี (10 หลัก)</div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="sell_minor_tin_tf" value="<?php echo $row_gd['sell_minor_tin']; ?>">
                                                    <span class="input-group-addon">
                                                    	<i class="fa fa-user bigger-110"></i>
                                                    </span>
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
                                
							</div>
                            <div class="col-xs-12 col-sm-3" id=""></div>
                            <div class="col-xs-12 col-sm-12" id="infomation">
								<table id="dynamic-table25" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="center">ลำดับที่</th>
                                            <th colspan="2" class="center">1 บาท</th>
                                            <th colspan="2" class="center">5 บาท</th>
                                            <th colspan="2" class="center">20 บาท</th>
                                            <th colspan="2" class="center">รวมทั้งสิ้น</th>
                                            <th rowspan="2" class="center">เลือกรายการ</th>
                                        </tr>
                                        <tr>
                                            
                                            <th class="center">จำนวนดวง</th>
                                            <th class="center">จำนวนเงิน</th>
                                            <th class="center">จำนวนดวง</th>
                                            <th class="center">จำนวนเงิน</th>
                                           	<th class="center">จำนวนดวง</th>
                                            <th class="center">จำนวนเงิน</th>
                                            <th class="center">จำนวนดวง</th>
                                            <th class="center">จำนวนเงิน</th>
                                        </tr>
                                    </thead>
                                            
                                    <tbody>
                                   		<?php
											$sql_tc = "SELECT *,date(sell_minor_sub_date) as ch FROM tb_sell_minor_sub_transaction ts WHERE ts.sell_minor_transaction_id = '".$row_gd['sell_minor_transaction_id']."'";
											$rs_tc = mysql_query($sql_tc,$connection);
											$transaction_index = 0;
											while($row_tc = mysql_fetch_assoc($rs_tc)){
												echo '<tr>';
												echo '<td>'.($transaction_index+1).'</td>';
												echo '<td>'.($row_tc['stamp_one_bath']).'</td>';
												echo '<td>'.($row_tc['stamp_one_bath']).'</td>';
												echo '<td>'.($row_tc['stamp_five_bath']).'</td>';
												echo '<td>'.($row_tc['stamp_five_bath']*5).'</td>';
												echo '<td>'.($row_tc['stamp_twenty_bath']).'</td>';
												echo '<td>'.($row_tc['stamp_twenty_bath']*20).'</td>';
												echo '<td>'.($row_tc['stamp_one_bath']+$row_tc['stamp_five_bath']+$row_tc['stamp_twenty_bath']).'</td>';
												echo '<td>'.($row_tc['stamp_one_bath']+($row_tc['stamp_five_bath']*5)+($row_tc['stamp_twenty_bath']*20)).'</td>';
												echo '<td class="center">';
												echo '<div class="btn-group">';
												echo '	<button data-toggle="dropdown" class="btn btn-white btn-xs dropdown-toggle" aria-expanded="false">';
												echo '		เลือกรายการ';
												echo '		<span class="ace-icon fa fa-caret-down icon-on-right"></span>';
												echo '	</button>';
												echo '	<ul  class="dropdown-menu dropdown-info dropdown-menu-right">';
												if($row_tc['ch']==date('Y-m-d')){
												?>
                                                
													<li><a href="#" onclick="ShowEditSellMinor('<?php echo $row_tc['sell_minor_sub_transaction_id']; ?>');">แก้ไขรายการ</a></li>
                                                <?php
												}
												
												echo '	</ul>';
												echo '</div>';
												echo '</td>';
												echo '</tr>';
												$transaction_index++;
											}
										?>
                                    </tbody>
                                </table>
                                <div class="center" style="margin-top:20px;">
									<a href="#Sell-Modal"  class="btn btn-sm btn-primary btn-white btn-round" data-toggle="modal">
										<i class="ace-icon fa fa-bolt bigger-150 middle orange2"></i>
										<span class="bigger-110">เพิ่มรายการขาย</span>
									</a>
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

<div class="profile-social-links align-center">
	<div id="Sell-Modal" class="modal fade" tabindex="-1">
    	<div class="modal-dialog modal-lg">
        	<div class="modal-content">
            	<div class="modal-header" style="color:#99CCCC;">
                	<div class="pull-right onpage-help-modal-buttons">
                    	<button aria-hidden="true" data-dismiss="modal" class="btn btn-white btn-danger btn-sm" type="button">
                        	<i class="ace-icon fa fa-times icon-only"></i>
                       	</button>					  
                  	</div>					  
                    <h4 class="modal-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายการขาย</h4>					
            	</div>
                <div class="modal-footer" style="height:340px;overflow-y:scroll">
                	<div>
                    	<div class="col-sm-12">
                        	<div class="col-xs-12 col-sm-12" id="infomation">
                                <div class="social-or-login center">
                                    <span class="bigger-110"> รายละเอียด </span>
                                </div>
                                <div class="space-6"></div>
                                <div class="profile-user-info profile-user-info-striped" >
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:140px;"> จำนวนดวง 1 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<input class="form-control active center" type="text" id="sell_minor_sub_transaction_id_tf"  style="display:none;" />
                                                    <input class="form-control active center" type="text" id="stamp_one_bath_tf" onchange="CallculateMoney()">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:140px;"> จำนวนเงิน </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="money_one_bath_tf" disabled="disabled">
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" >
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:140px;"> จำนวนดวง 5 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="stamp_five_bath_tf" onchange="CallculateMoney()">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:140px;"> จำนวนเงิน </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="money_five_bath_tf" disabled="disabled">
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" >
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:140px;"> จำนวนดวง 20 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="stamp_twenty_bath_tf" onchange="CallculateMoney()">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:140px;"> จำนวนเงิน </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="money_twenty_bath_tf" disabled="disabled">
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" >
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:140px;"> จำนวนดวงรวมทั้งสิ้น </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="stamp_total_tf" disabled="disabled">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:140px;"> จำนวนเงินรวมทั้งสิ้น </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="money_total_tf" disabled="disabled">
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
                                <div class="center" style="margin-top:20px;">
									<button  class="btn btn-sm btn-primary btn-white btn-round" onclick="SaveSubSellMinor()">
										<span class="bigger-110">บันทึก</span>
									</button>
                                    <a href="#" class="btn btn-sm btn-danger btn-white btn-round" data-dismiss="modal">
										<span class="bigger-110">ยกเลิก</span>
									</a>
								</div>
							</div>
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
	function ShowEditSellMinor(sell_minor_sub_transaction_id){
		$.ajax({
			type: "POST",
			url: "Ajax/ajax_GetSellMinorSubInfo.php",
			cache: false,
			data: "sell_minor_sub_transaction_id="+sell_minor_sub_transaction_id,
			success: function(data){
				selldata = JSON.parse(data);
				$('#sell_minor_sub_transaction_id_tf').val(sell_minor_sub_transaction_id);
				$('#stamp_one_bath_tf').val(selldata['stamp_one_bath']);
				$('#stamp_five_bath_tf').val(selldata['stamp_five_bath']);
				$('#stamp_twenty_bath_tf').val(selldata['stamp_twenty_bath']);
				CallculateMoney();
				$("#Sell-Modal").modal();
			}
		});
	}
	function SaveSubSellMinor(){
		var sell_minor_sub_transaction_id = $('#sell_minor_sub_transaction_id_tf').val();
		var sell_minor_transaction_id = '<?php echo $_GET['sell_minor_transaction_id']; ?>';
		var stamp_one_bath = $('#stamp_one_bath_tf').val()-0;
		var stamp_five_bath = $('#stamp_five_bath_tf').val()-0;
		var stamp_twenty_bath = $('#stamp_twenty_bath_tf').val()-0;
		var dfrom = $("#sell_minor_date_tf").val().split("-")
		var sell_minor_date = dfrom[2]+"-"+dfrom[1]+"-"+dfrom[0];
		var sell_minor_tin =  $('#sell_minor_tin_tf').val();
		var sell_minor_cid =  $('#sell_minor_cid_tf').val();
		var row = <?php echo $transaction_index; ?>;
		var table = $('#dynamic-table25').DataTable();
		
		$.ajax({
			type: "POST",
			url: "Ajax/ajax_SellMinorTransactionAdding.php",
			cache: false,
			data: "sell_minor_date="+sell_minor_date+"&sell_minor_cid="+sell_minor_cid+"&sell_minor_tin="+sell_minor_tin+"&stamp_one_bath="+stamp_one_bath+"&stamp_five_bath="+stamp_five_bath+"&stamp_twenty_bath="+stamp_twenty_bath+"&sell_minor_transaction_id="+sell_minor_transaction_id+"&sell_minor_sub_transaction_id="+sell_minor_sub_transaction_id,
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
									if(sell_minor_transaction_id==""){
										window.location.href="index.php?service=stampMinorSellManager";
									}else{
										window.location.href="index.php?service=stampMinorSellAdding&sell_minor_transaction_id="+sell_minor_transaction_id;
									}
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
	FusionCharts.ready(function() {
		$('#Sell-Modal').on('hidden.bs.modal', function () {
		  	$('#sell_minor_sub_transaction_id_tf').val("");
			$('#stamp_one_bath_tf').val(0);
			$('#stamp_five_bath_tf').val(0);
			$('#stamp_twenty_bath_tf').val(0);
			CallculateMoney();
		});
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
		$('#money_one_bath_tf').val(stamp_one_bath);
		$('#money_five_bath_tf').val(stamp_five_bath*5);
		$('#money_twenty_bath_tf').val(stamp_twenty_bath*20);
		$('#money_total_tf').val(money_sum);
		$('#stamp_total_tf').val(stamp_one_bath+stamp_five_bath+stamp_twenty_bath);
	}
	
</script>			