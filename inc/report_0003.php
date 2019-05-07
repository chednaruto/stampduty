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
					รายงานการจำหน่ายแสตมป์อากรแยกตามภาค
				</li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>		
        <div class="page-content">
            <div class="row">
            	<div class="page-header">
                    <h1>
                            รายงานการจำหน่ายแสตมป์อากรแยกตามภาค
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
				<div class="col-sm-12 center">
                    <div id="chart-containerxx"></div>
                </div>
				<div class="col-sm-12">
					<div>
						<table id="report_table" class="table table-striped table-bordered table-hover" >
							<thead>
								<tr>
									<th rowspan="2" class="center">ลำดับที่</th>
                                    <th rowspan="2" class="center">หน่วยงาน</th>
									<th class="center">ราคาดวงละ 1 บาท</th>
                                    <th class="center">ราคาดวงละ 5 บาท</th>
                                    <th class="center">ราคาดวงละ 20 บาท</th>
									<th class="center">รวม</th>
								</tr>
                                
                                <tr>
                                	<th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนดวง</th>
                                </tr>
							</thead>
                            <tbody>
                            </tbody>
						</table>
                        
					</div>
				</div>
			</div><!-- /.row -->
           
        </div>
    </div>
</div>
<div align="right"></div>
<script type="text/javascript" src="fusion_chart/js/fusioncharts.js"></script>
<script type="text/javascript" src="fusion_chart/js/themes/fusioncharts.theme.fusion.js"></script>
<script>
	function ExportExcel(obj){
		 var htmltable= document.getElementById(obj);
       	var html = htmltable.outerHTML;
       	window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
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
			url: "ajax/ajax_GetReport0003.php",
			data: "startdate="+startdate+"&enddate="+enddate,
			cache: false,
			success: function(data){
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
				
				var chartProperties = {
					"caption": "แสดงยอดจำหน่ายแสตมป์อากร",
					"showValues":"0",
					//"numberSuffix": "%",
					"xAxisName": "หน่วยงาน",
					"yAxisName": "ยอดจำหน่าย",
					"theme": "fusion",
					"enableMultiSlicing":"1",
					"numberSuffix":" ดวง",
					"formatNumberScale":"0"
				};
				$.ajax({
					type: "POST",
					url: "AjaxChart/ajax_GetSellInfo.php",
					data: "startdate="+startdate+"&enddate="+enddate,
					cache: false,
					success: function(data){
						var dietChart = new FusionCharts({
							type: 'stackedbar3d',
							renderAt: 'chart-containerxx',
							width: '90%',
							height: '600',
							dataFormat: 'json',
							dataSource: {
							  "chart": chartProperties,
							  "categories": [
								{
								  "category": data['LABEL']
								}
							  ],
							  "dataset": [
								{
								  "seriesname": "ราคา 1 บาท",
								  "data": data['STAMP1']
								},
								{
								  "seriesname": "ราคา 5 บาท",
								  "data": data['STAMP5']
								},
								{
								  "seriesname": "ราคา 20 บาท",
								  "data": data['STAMP20']
								}
							  ]
							}
						}).render();
					}
				});
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
