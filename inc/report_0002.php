<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php"><i class="ace-icon fa fa-home home-icon"></i>หน้าหลัก</a>
                </li>
                <li>
					<a href="index.php?service=MainReport"> รายงานทั้งหมด </a>
				</li>
                <li>
					รายงานการเบิก จ่าย เก็บรักษา และจำหน่ายแสตมป์อากร
				</li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>		
        <div class="page-content">
            <div class="row">
            	<div class="page-header">
                    <h1>
                            รายงานการเบิก จ่าย เก็บรักษา และจำหน่ายแสตมป์อากร
                    </h1>
                </div>
				<div class="space-12"></div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> เลือกช่วงวันที่ </div>
                    <div class="profile-info-value">
                        <span>
                            <div class="input-group col-sm-12">
                                <input class="form-control date-picker center" id="startdate_tf" type="text" data-date-format="yyyy-mm-dd" />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>                                               
                        </span>
                    </div>
                    <div class="profile-info-name" style="width:60px;"> ถึงวันที </div>
                    <div class="profile-info-value">
                        <span>
                            <div class="input-group col-sm-12">
                                <input class="form-control date-picker center" id="enddate_tf" type="text" data-date-format="yyyy-mm-dd" />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                                                                      
                        </span>
                    </div>
                    <div class="profile-info-value">
                        <span>
                        	<div class="input-group col-sm-12">
                                <button type="button" class="btn btn-sm btn-primary btn-white btn-round" style="height:32px;" onclick="displayReport();">
                                     <i class="ace-icon fa fa fa-bar-chart-o bigger-150 middle orange2"></i>
                                    <span class="bigger-110"> แสดงรายงาน </span>
                                </button> 
                                <button type="button" class="btn btn-sm btn-primary btn-white btn-round" style="height:32px;" onclick="ExportExcel('report_table')">
                                     <i class="ace-icon fa fa fa-file-excel-o bigger-150 middle orange2"></i>
                                    <span class="bigger-110"> ส่งออก Excel </span>
                                </button>    
                           	</div>                                          
                        </span>
                    </div>
                </div>

				<div class="col-sm-12" style="overflow-x:scroll;overflow-Y:scroll;">
					<div style="width:2000px;height:500px;">
						<table id="report_table" class="table table-striped table-bordered table-hover" style="width:2000px;" >
							<thead>
								<tr>
									<th rowspan="2" class="center">ลำดับที่</th>
                                    <th rowspan="2" class="center">หน่วยงาน</th>
									<th colspan="2" class="center">ยอดยกมา</th>
                                    <th colspan="3" class="center">เบิก</th>
                                    <th colspan="2" class="center">รวม</th>
									<th colspan="5" class="center">จ่าย/จำหน่าย</th>
                                    <th colspan="2" class="center">คงเหลือ</th>
								</tr>
                                
                                <tr>
                                	<th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    
                                     <th class="center">จำนวนครั้ง</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    
                                    
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    
                                    
                                    <th class="center">จำนวนครั้ง</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    <th class="center">ส่วนลด</th>
                                    <th class="center">รวมจัดเก็บ</th>
                                    
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                </tr>
							</thead>
                            <tbody>
                            </tbody>
						</table>
                        
					</div>
				</div>
			</div><!-- /.row -->
             <div class="row">
            	<div id="chart-containerxx"></div>
            </div>
        </div>
    </div>
</div>
<script>
	function ExportExcel(obj){
		 var htmltable= document.getElementById(obj);
       	var html = htmltable.outerHTML;
       	window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
	}
	FusionCharts.ready(function() {
		var chartProperties = {
			"caption": "วงเงินเก็บรักษาแสตมป์อากรเทียบอากรคงคลัง",
			"showValues":"1",
			//"numberSuffix": "%",
			"xAxisName": "หน่วยงาน",
            "yAxisName": "จำนวนวงเงินเก็บรักษา (บาท)",
			"theme": "fusion",
			"enableMultiSlicing":"1"
		};
		var chartProperties2 = {
			"caption": "แสตมป์อากรคงคลัง",
			"showValues":"1",
			//"numberSuffix": "%",
			"xAxisName": "รายการ",
            "yAxisName": "จำนวน(ดวง)",
			"theme": "fusion",
			"enableMultiSlicing":"1"
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
	function displayReport(){
		var startdate = $('#startdate_tf').val();
		if(startdate.trim()==""){
			$.alert({title: '',content: '<div style="vertical-align:middle;text-align:center;"> ระบบวันที่เริ่มต้น </div>',animation: 'news',closeAnimation: 'news',buttons: {okay: {text: 'ตกลง'}}});
			return false;
		}
		var enddate = $('#enddate_tf').val();
		if(enddate.trim()==""){
			$.alert({title: '',content: '<div style="vertical-align:middle;text-align:center;"> ระบบวันที่สิ้นสุด </div>',animation: 'news',closeAnimation: 'news',buttons: {okay: {text: 'ตกลง'}}});
			return false;
		}
		waitingDialog.show()
		$.ajax({
			type: "POST",
			url: "ajax/ajax_GetReport0003.php",
			data: "startdate="+startdate+"&enddate="+enddate,
			cache: false,
			success: function(data){
				alert(data);
				var stamp_one_bath =0;
				var stamp_five_bath =0;
				var stamp_twenty_bath =0;
				data = JSON.parse(data);
				$('#report_table tbody tr').remove();
				for(var i = 0;i<data.length;i++){
					stamp_one_bath += data[i]['stamp_one_bath'];
					stamp_five_bath += data[i]['stamp_five_bath'];
					stamp_twenty_bath += data[i]['stamp_twenty_bath'];
					$('#report_table').append('<tr>\
					<td>'+(i+1)+'</td>\
					<td>'+data[i]['office_name']+'</td>\
					<td>'+addCommas(data[i]['stamp_one_bath'])+'</td>\
					<td>'+addCommas(data[i]['stamp_five_bath'])+'</td>\
					<td>'+addCommas(data[i]['stamp_twenty_bath'])+'</td>\
					<td>'+addCommas(data[i]['stamp_one_bath']+data[i]['stamp_five_bath']+data[i]['stamp_twenty_bath'])+'</td>\
					</tr>');
				}
				$('#report_table').append('<tr>\
					<td></td>\
					<td>รวม</td>\
					<td>'+addCommas(stamp_one_bath)+'</td>\
					<td>'+addCommas(stamp_five_bath)+'</td>\
					<td>'+addCommas(stamp_twenty_bath)+'</td>\
					<td>'+addCommas(stamp_one_bath+stamp_five_bath+stamp_twenty_bath)+'</td>\
					</tr>');
				
				var chartProperties2 = {
					"caption": "แสตมป์อากรคงคลัง",
					"showValues":"1",
					//"numberSuffix": "%",
					"xAxisName": "รายการ",
					"yAxisName": "จำนวน(ดวง)",
					"theme": "fusion",
					"enableMultiSlicing":"1"
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
							renderAt: 'graph1',
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
				
				waitingDialog.hide()
			}
		});
	}
	function displayReport(){
		var startdate = $('#startdate_tf').val();
		if(startdate.trim()==""){
			$.alert({title: '',content: '<div style="vertical-align:middle;text-align:center;"> ระบบวันที่เริ่มต้น </div>',animation: 'news',closeAnimation: 'news',buttons: {okay: {text: 'ตกลง'}}});
			return false;
		}
		var enddate = $('#enddate_tf').val();
		if(enddate.trim()==""){
			$.alert({title: '',content: '<div style="vertical-align:middle;text-align:center;"> ระบบวันที่สิ้นสุด </div>',animation: 'news',closeAnimation: 'news',buttons: {okay: {text: 'ตกลง'}}});
			return false;
		}
		waitingDialog.show()
		$.ajax({
			type: "POST",
			url: "ajax/ajax_GetReport0002.php",
			data: "startdate="+startdate+"&enddate="+enddate,
			cache: false,
			success: function(data){
				data = JSON.parse(data);
				$('#report_table tbody tr').remove();
				$('#report_table').append('<tr>\
				<td class="center">1</td>\
				<td class="center">ราคาดวงละ 1 บาท</td>\
				<td class="center">'+addCommas(data[0]['balance_one_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['balance_one_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['receive_total_one_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['receive_stamp_one_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['receive_stamp_one_bath']*1)+'</td>\
				<td class="center">'+addCommas(data[0]['balance_one_bath']+data[0]['receive_stamp_one_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['balance_one_bath']+data[0]['receive_stamp_one_bath']*1)+'</td>\
				<td class="center">'+addCommas(data[0]['pay_total_one_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['pay_one_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['pay_one_bath'])+'</td>\
				<td class="center">-</td>\
				<td class="center">-</td>\
				<td class="center">'+addCommas((data[0]['balance_one_bath']+data[0]['receive_stamp_one_bath'])-data[0]['pay_one_bath'])+'</td>\
				<td class="center">'+addCommas((data[0]['balance_one_bath']+data[0]['receive_stamp_one_bath'])-data[0]['pay_one_bath'])+'</td>\
				</tr>');
				
				$('#report_table').append('<tr>\
				<td class="center">2</td>\
				<td class="center">ราคาดวงละ 5 บาท</td>\
				<td class="center">'+addCommas(data[0]['balance_five_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['balance_five_bath']*5)+'</td>\
				<td class="center">'+addCommas(data[0]['receive_total_five_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['receive_stamp_five_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['receive_stamp_five_bath']*5)+'</td>\
				<td class="center">'+addCommas(data[0]['balance_five_bath']+data[0]['receive_stamp_five_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['balance_five_bath']*5+data[0]['receive_stamp_five_bath']*5)+'</td>\
				<td class="center">'+addCommas(data[0]['pay_total_five_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['pay_five_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['pay_five_bath']*5)+'</td>\
				<td class="center">-</td>\
				<td class="center">-</td>\
				<td class="center">'+addCommas((data[0]['balance_five_bath']+data[0]['receive_stamp_five_bath'])-data[0]['pay_five_bath'])+'</td>\
				<td class="center">'+addCommas((data[0]['balance_five_bath']*5+data[0]['receive_stamp_five_bath']*5)-data[0]['pay_five_bath']*5)+'</td>\
				</tr>');
				
				$('#report_table').append('<tr>\
				<td class="center">3</td>\
				<td class="center">ราคาดวงละ 20 บาท</td>\
				<td class="center">'+addCommas(data[0]['balance_twenty_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['balance_twenty_bath']*20)+'</td>\
				<td class="center">'+addCommas(data[0]['receive_total_twenty_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['receive_stamp_twenty_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['receive_stamp_twenty_bath']*20)+'</td>\
				<td class="center">'+addCommas(data[0]['balance_twenty_bath']+data[0]['receive_stamp_twenty_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['balance_twenty_bath']*20+data[0]['receive_stamp_twenty_bath']*20)+'</td>\
				<td class="center">'+addCommas(data[0]['pay_total_twenty_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['pay_twenty_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['pay_twenty_bath']*20)+'</td>\
				<td class="center">-</td>\
				<td class="center">-</td>\
				<td class="center">'+addCommas((data[0]['balance_twenty_bath']+data[0]['receive_stamp_twenty_bath'])-data[0]['pay_twenty_bath'])+'</td>\
				<td class="center">'+addCommas((data[0]['balance_twenty_bath']*20+data[0]['receive_stamp_twenty_bath']*20)-data[0]['pay_twenty_bath']*20)+'</td>\
				</tr>');
				
				$('#report_table').append('<tr>\
				<td class="center"></td>\
				<td class="center">รวม</td>\
				<td class="center">'+addCommas(data[0]['balance_one_bath']+data[0]['balance_five_bath']+data[0]['balance_twenty_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['balance_one_bath']+data[0]['balance_five_bath']*5+data[0]['balance_twenty_bath']*20)+'</td>\
				<td class="center">-</td>\
				<td class="center">'+addCommas(data[0]['receive_stamp_one_bath']+data[0]['receive_stamp_five_bath']+data[0]['receive_stamp_twenty_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['receive_stamp_one_bath']+data[0]['receive_stamp_five_bath']*5+data[0]['receive_stamp_twenty_bath']*20)+'</td>\
				<td class="center">'+addCommas(data[0]['balance_one_bath']+data[0]['balance_five_bath']+data[0]['balance_twenty_bath']+data[0]['receive_stamp_one_bath']+data[0]['receive_stamp_five_bath']+data[0]['receive_stamp_twenty_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['balance_one_bath']+data[0]['balance_five_bath']*5+data[0]['balance_twenty_bath']*20+data[0]['receive_stamp_one_bath']+data[0]['receive_stamp_five_bath']*5+data[0]['receive_stamp_twenty_bath']*20)+'</td>\
				<td class="center">-</td>\
				<td class="center">'+addCommas(data[0]['pay_one_bath']+data[0]['pay_five_bath']+data[0]['pay_twenty_bath'])+'</td>\
				<td class="center">'+addCommas(data[0]['pay_one_bath']+data[0]['pay_five_bath']*5+data[0]['pay_twenty_bath']*20)+'</td>\
				<td class="center">'+addCommas(data[0]['pay_percent'])+'</td>\
				<td class="center">'+addCommas((data[0]['pay_one_bath']+data[0]['pay_five_bath']*5+data[0]['pay_twenty_bath']*20)-data[0]['pay_percent'])+'</td>\
				<td class="center">'+addCommas( ((data[0]['balance_one_bath']+data[0]['receive_stamp_one_bath'])-data[0]['pay_one_bath'])+((data[0]['balance_five_bath']+data[0]['receive_stamp_five_bath'])-data[0]['pay_five_bath'])+((data[0]['balance_twenty_bath']+data[0]['receive_stamp_twenty_bath'])-data[0]['pay_twenty_bath']))+'</td>\
				<td class="center">'+addCommas( ((data[0]['balance_one_bath']+data[0]['receive_stamp_one_bath'])-data[0]['pay_one_bath'])+((data[0]['balance_five_bath']*5+data[0]['receive_stamp_five_bath']*5)-data[0]['pay_five_bath']*5)+((data[0]['balance_twenty_bath']*20+data[0]['receive_stamp_twenty_bath']*20)-data[0]['pay_twenty_bath']*20))+'</td>\
				</tr>');
				
				
				/*for(var i = 0;i<data.length;i++){
					$('#report_table').append('<tr>\
					<td class="center">'+(i+1)+'</td>\
					<td class="left">'+data[i]['officename']+'</td>\
					<td class="center">'+(addCommas(data[i]['balance_one_bath']))+'</td>\
					<td class="center">'+addCommas((data[i]['balance_one_bath']))+'</td>\
					<td class="center">'+addCommas(data[i]['balance_five_bath'])+'</td>\
					<td class="center">'+addCommas((data[i]['balance_five_bath']*5))+'</td>\
					<td class="center">'+addCommas(data[i]['balance_twenty_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['balance_twenty_bath']*20)+'</td>\
					<td class="center">'+addCommas(data[i]['balance_one_bath']+data[i]['balance_five_bath']+data[i]['balance_twenty_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['balance_one_bath']+data[i]['balance_five_bath']*5+data[i]['balance_twenty_bath']*20)+'</td>\
					<td class="center">'+addCommas(data[i]['receive_total_time'])+'</td>\
					<td class="center">'+addCommas(data[i]['receive_stamp_one_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['receive_stamp_one_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['receive_stamp_five_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['receive_stamp_five_bath']*5)+'</td>\
					<td class="center">'+addCommas(data[i]['receive_stamp_twenty_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['receive_stamp_twenty_bath']*20)+'</td>\
					<td class="center">'+addCommas(data[i]['receive_stamp_one_bath']+data[i]['receive_stamp_five_bath']+data[i]['receive_stamp_twenty_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['receive_stamp_one_bath']+data[i]['receive_stamp_five_bath']*5+data[i]['receive_stamp_twenty_bath']*20)+'</td>\
					<td class="center">'+addCommas(data[i]['balance_one_bath']+data[i]['receive_stamp_one_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['balance_one_bath']+data[i]['receive_stamp_one_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['balance_five_bath']+data[i]['receive_stamp_five_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['balance_five_bath']*5+data[i]['receive_stamp_five_bath']*5)+'</td>\
					<td class="center">'+addCommas(data[i]['balance_twenty_bath']+data[i]['receive_stamp_twenty_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['balance_twenty_bath']*20+data[i]['receive_stamp_twenty_bath']*20)+'</td>\
					<td class="center">'+addCommas(data[i]['balance_one_bath']+data[i]['receive_stamp_one_bath']+data[i]['balance_five_bath']+data[i]['receive_stamp_five_bath']+data[i]['balance_twenty_bath']+data[i]['receive_stamp_twenty_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['balance_one_bath']+data[i]['receive_stamp_one_bath']+data[i]['balance_five_bath']*5+data[i]['receive_stamp_five_bath']*5+data[i]['balance_twenty_bath']*20+data[i]['receive_stamp_twenty_bath']*20)+'</td>\
					<td class="center">'+addCommas(data[i]['pay_total_time'])+'</td>\
					<td class="center">'+addCommas(data[i]['pay_one_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['pay_one_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['pay_five_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['pay_five_bath']*5)+'</td>\
					<td class="center">'+addCommas(data[i]['pay_twenty_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['pay_twenty_bath']*20)+'</td>\
					<td class="center">'+addCommas(data[i]['pay_one_bath']+data[i]['pay_five_bath']+data[i]['pay_twenty_bath'])+'</td>\
					<td class="center">'+addCommas(data[i]['pay_one_bath']+data[i]['pay_five_bath']*5+data[i]['pay_twenty_bath']*20)+'</td>\
					<td class="center">'+addCommas(data[i]['pay_percent'])+'</td>\
					<td class="center">'+addCommas((data[i]['pay_one_bath']+data[i]['pay_five_bath']*5+data[i]['pay_twenty_bath']*20)-data[i]['pay_percent'])+'</td>\
					<td class="center">'+addCommas((data[i]['balance_one_bath']+data[i]['receive_stamp_one_bath'])-data[i]['pay_one_bath'])+'</td>\
					<td class="center">'+addCommas((data[i]['balance_one_bath']+data[i]['receive_stamp_one_bath'])-data[i]['pay_one_bath'])+'</td>\
					<td class="center">'+addCommas((data[i]['balance_five_bath']+data[i]['receive_stamp_five_bath'])-data[i]['pay_five_bath'])+'</td>\
					<td class="center">'+addCommas((data[i]['balance_five_bath']*5+data[i]['receive_stamp_five_bath']*5)-data[i]['pay_five_bath']*5)+'</td>\
					<td class="center">'+addCommas((data[i]['balance_twenty_bath']+data[i]['receive_stamp_twenty_bath'])-data[i]['pay_twenty_bath'])+'</td>\
					<td class="center">'+addCommas((data[i]['balance_twenty_bath']*20+data[i]['receive_stamp_twenty_bath']*20)-data[i]['pay_twenty_bath']*20)+'</td>\
					<td class="center">'+addCommas(((data[i]['balance_one_bath']+data[i]['receive_stamp_one_bath'])-data[i]['pay_one_bath'])+((data[i]['balance_five_bath']+data[i]['receive_stamp_five_bath'])-data[i]['pay_five_bath'])+((data[i]['balance_twenty_bath']+data[i]['receive_stamp_twenty_bath'])-data[i]['pay_twenty_bath']))+'</td>\
					<td class="center">'+addCommas(((data[i]['balance_one_bath']+data[i]['receive_stamp_one_bath'])-data[i]['pay_one_bath'])+((data[i]['balance_five_bath']*5+data[i]['receive_stamp_five_bath']*5)-data[i]['pay_five_bath']*5)+((data[i]['balance_twenty_bath']*20+data[i]['receive_stamp_twenty_bath']*20)-data[i]['pay_twenty_bath']*20))+'</td>\
					</tr>');	
				}*/
				waitingDialog.hide()
			}
		});
	}
	function addCommas(nStr)
	{
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}
</script>	