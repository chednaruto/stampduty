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
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>		
        <div class="page-content">
            <div class="page-header">
                <h1>
					<b>DASHBOARD</b>
				</h1>
            </div>
            <div class="row">
                <div class="space-6"></div>
    
                <div class="col-sm-12 infobox-container">
                    <!-- #section:pages/dashboard.infobox -->
                    <div class="infobox infobox-green">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-shopping-cart"></i>
                        </div>
                        <div class="infobox-data">
                            <div class="infobox-content" id="month_tf"></div>
                            <span class="stat stat-success" id="total_money_tf"></span>
                        </div>
    
                        
                        <div class="stat stat-success" id="percentage_up_tf" style="display:none;">&nbsp;</div>
    					<div class="stat stat-important" id="percentage_down_tf" style="display:none;">&nbsp;</div>
                        
                    </div>
                    <div class="infobox infobox-green">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-shopping-cart"></i>
                        </div>
                        <div class="infobox-data">
                            <div class="infobox-content" id="day_tf"></div>
                            <span class="stat stat-success" id="total_money_day_tf"></span>
                        </div>
    
                        
                        <div class="stat stat-success" id="percentage_day_up_tf" style="display:none;">&nbsp;</div>
    					<div class="stat stat-important" id="percentage_day_down_tf" style="display:none;">&nbsp;</div>
                        
                    </div>
                    <div class="space-6"></div>
                </div>
            </div>
            <div class="row">
            	<div class="col-sm-6">
                	<div class="widget-box">
                        <div class="widget-header widget-header-flat widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-signal"></i>
                                รายงานยอดจำหน่ายแสตมป์อากร รายเดือน (จำนวนดวง)
                            </h5>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <div id="Gsellmonth"></div>
                            </div><!-- /.widget-main -->
                        </div><!-- /.widget-body -->
                    </div>
                </div>
                <div class="col-sm-6">
                	<div class="widget-box">
                        <div class="widget-header widget-header-flat widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-signal"></i>
                                รายงานยอดวงจำหน่ายแสตมป์อากร รายเดือน (จำนวนเงิน)
                            </h5>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <div id="GsellmonthM"></div>
                            </div><!-- /.widget-main -->
                        </div><!-- /.widget-body -->
                    </div>
                </div>
                <div class="col-sm-6">
                	<div class="widget-box">
                        <div class="widget-header widget-header-flat widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-signal"></i>
                                รายงานยอดจำหน่ายแสตมป์อากร รายวัน (จำนวนดวง)
                            </h5>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <div id="GsellDay"></div>
                            </div><!-- /.widget-main -->
                        </div><!-- /.widget-body -->
                    </div>
                </div>
                <div class="col-sm-6">
                	<div class="widget-box">
                        <div class="widget-header widget-header-flat widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-signal"></i>
                                รายงานยอดจำหน่ายแสตมป์อากร รายวัน (จำนวนเงิน)
                            </h5>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <div id="GsellDayM"></div>
                            </div><!-- /.widget-main -->
                        </div><!-- /.widget-body -->
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
		var graphTrackingProperties = {
			//"caption": "สถานะการติดตามการบันทึกข้อมูล",
			"showValues":"0",
			"numberSuffix": " (ดวง)",
			//"xAxisName": "การบันทึกข้อมูล",
			///"yAxisName": "จำนวนหน่วยงาน",
			"theme": "fusion",
			"numberSuffix":" ",
			"formatNumberScale":"0",
			//"palettecolors":"008000,FF0000"
		};
		
		var graphTrackingPropertiesM = {
			//"caption": "สถานะการติดตามการบันทึกข้อมูล",
			"showValues":"1",
			//"numberSuffix": " (บาท)",
			//"xAxisName": "การบันทึกข้อมูล",
			///"yAxisName": "จำนวนหน่วยงาน",
			"theme": "fusion",
			//"numberSuffix":" บาท",
			"formatNumberScale":"0",
			"palettecolors":"E6E600"
		};
		$.ajax({
			type: "POST",
			url: "AjaxChart/ajax_DashBoard.php",
			cache: false,
			success: function(data){
				var dietChart = new FusionCharts({
					type: 'mscolumn3d',
					renderAt: 'Gsellmonth',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
					  "chart": graphTrackingProperties,
					  "categories": [
						{
						  "category": data['LABEL']
						}
					  ],
					  "dataset": [
						{
						  "seriesname": "ราคา 1 บาท",
						  "data": data['ONE']
						},
						{
						  "seriesname": "ราคา 5 บาท",
						  "data": data['FIVE']
						  
						},
						{
						  "seriesname": "ราคา 20 บาท",
						  "data": data['TWENTY']
						}
					  ]
					}
				}).render();
				var dietChart = new FusionCharts({
					type: 'mscolumn3d',
					renderAt: 'GsellmonthM',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
					  "chart": graphTrackingPropertiesM,
					  "categories": [
						{
						  "category": data['LABEL']
						}
					  ],
					  "dataset": [
						{
						  "seriesname": "ยอดเงินหักส่วนลดแล้ว",
						  "data": data['MONEY']
						}
					  ]
					}
				}).render();
				
				var dietChart = new FusionCharts({
					type: 'mscolumn3d',
					renderAt: 'GsellDay',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
					  "chart": graphTrackingProperties,
					  "categories": [
						{
						  "category": data['LABELDAY']
						}
					  ],
					  "dataset": [
						{
						  "seriesname": "ราคา 1 บาท",
						  "data": data['ONE_DAY']
						},
						{
						  "seriesname": "ราคา 5 บาท",
						  "data": data['FIVE_DAY']
						  
						},
						{
						  "seriesname": "ราคา 20 บาท",
						  "data": data['TWENTY_DAY']
						}
					  ]
					}
				}).render();
				
				var dietChart = new FusionCharts({
					type: 'mscolumn3d',
					renderAt: 'GsellDayM',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
					  "chart": graphTrackingPropertiesM,
					  "categories": [
						{
						  "category": data['LABELDAY']
						}
					  ],
					  "dataset": [
						{
						  "seriesname": "ยอดเงินหักส่วนลดแล้ว",
						  "data": data['MONEY_DAY']
						}
					  ]
					}
				}).render();

				$('#month_tf').append("ขาย : "+data['MONEY_SELLTOTAL_LASTMONT'][0]['mth']);
				$('#total_money_tf').append(formatMoney(data['MONEY_SELLTOTAL_LASTMONT'][0]['total'])+" บาท");
				if((data['MONEY_SELLTOTAL_LASTMONT'][0]['total']-data['MONEY_SELLTOTAL_BEFO_LASTMONT'][0]['total'])*100/data['MONEY_SELLTOTAL_BEFO_LASTMONT'][0]['total']>0){
					$('#percentage_up_tf').show();
				}else{
					$('#percentage_down_tf').show();
				}
				$('#day_tf').append("ขาย : "+data['MONEY_SELLTOTAL_LASTDAY'][0]['dth']+" "+data['MONEY_SELLTOTAL_LASTDAY'][0]['mth']);
				$('#total_money_day_tf').append(formatMoney(data['MONEY_SELLTOTAL_LASTDAY'][0]['total'])+" บาท");
				if((data['MONEY_SELLTOTAL_LASTDAY'][0]['total']-data['MONEY_SELLTOTAL_BEFO_LASTDAY'][0]['total'])*100/data['MONEY_SELLTOTAL_BEFO_LASTDAY'][0]['total']>0){
					$('#percentage_day_up_tf').show();
				}else{
					$('#percentage_day_down_tf').show();
				}
				
			}
		});	
	});
	
	function formatMoney(n, c, d, t) {
	  var c = isNaN(c = Math.abs(c)) ? 2 : c,
		d = d == undefined ? "." : d,
		t = t == undefined ? "," : t,
		s = n < 0 ? "-" : "",
		i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
		j = (j = i.length) > 3 ? j % 3 : 0;
	
	  return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	};
</script>		