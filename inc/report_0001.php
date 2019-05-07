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
					รายงานการเบิก จำหน่าย และแสตมป์อากรคงเหลือ รายหน่วยงาน  
				</li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>		
        <div class="page-content">
            <div class="row">
            	<div class="page-header">
                    <h1>
                            รายงานการเบิก จำหน่าย และแสตมป์อากรคงเหลือ รายหน่วยงาน  
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
                    <?php
					if($_SESSION['OFFICELEVEL']==00){
					?>
                    <div class="profile-info-name" style="width:60px;"> ภาค </div>
                    <div class="profile-info-value" style="width:250px;">
                        <span>
                            <div class="input-group col-sm-12" >
                               	<select class="col-sm-12" id="off_tf">
                                <option value="00">กองบริหารการคลังและรายได้</option>
                                <option value="01">สำนักงานสรรพากรภาค 1</option>
                                <option value="02">สำนักงานสรรพากรภาค 2</option>
                                <option value="03">สำนักงานสรรพากรภาค 3</option>
                                <option value="04">สำนักงานสรรพากรภาค 4</option>
                                <option value="05">สำนักงานสรรพากรภาค 5</option>
                                <option value="06">สำนักงานสรรพากรภาค 6</option>
                                <option value="07">สำนักงานสรรพากรภาค 7</option>
                                <option value="08">สำนักงานสรรพากรภาค 8</option>
                                <option value="09">สำนักงานสรรพากรภาค 9</option>
                                <option value="10">สำนักงานสรรพากรภาค 10</option>
                                <option value="11">สำนักงานสรรพากรภาค 11</option>
                                <option value="12">สำนักงานสรรพากรภาค 12</option>
                                 <option value="99">ทั้งหมด</option>
                                </select>
                            </div>
                                                                      
                        </span>
                    </div>
                    <?php
					}
					?>
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
					<div style="width:4000px;height:500px;">
						<table id="report_table" class="table table-striped table-bordered table-hover" style="width:4000px;" >
							<thead>
								<tr>
									<th rowspan="3" class="center">ลำดับที่</th>
                                    <th rowspan="3" class="center">หน่วยงาน</th>
									<th colspan="8" class="center">ยอดยกมา</th>
                                    <th colspan="9" class="center">เบิก</th>
                                    <th colspan="8" class="center">รวม</th>
									<th colspan="11" class="center">จ่าย/จำหน่าย</th>
                                    <th colspan="8" class="center">คงเหลือ</th>
								</tr>
                                <tr>
                                	<th colspan="2" class="center">ราคาดวงละ 1 บาท</th>
                                    <th colspan="2" class="center">ราคาดวงละ 5 บาท</th>
                                    <th colspan="2" class="center">ราคาดวงละ 20 บาท</th>
                                    <th colspan="2" class="center">รวม</th>
                                    
                                    <th rowspan="2" class="center">จำนวนครัง</th>
                                    <th colspan="2" class="center">ราคาดวงละ 1 บาท</th>
                                    <th colspan="2" class="center">ราคาดวงละ 5 บาท</th>
                                    <th colspan="2" class="center">ราคาดวงละ 20 บาท</th>
                                    <th colspan="2" class="center">รวม</th>
                                    
                                    <th colspan="2" class="center">ราคาดวงละ 1 บาท</th>
                                    <th colspan="2" class="center">ราคาดวงละ 5 บาท</th>
                                    <th colspan="2" class="center">ราคาดวงละ 20 บาท</th>
                                    <th colspan="2" class="center">รวม</th>
                                    
                                    <th rowspan="2" class="center">จำนวนครัง</th>
                                    <th colspan="2" class="center">ราคาดวงละ 1 บาท</th>
                                    <th colspan="2" class="center">ราคาดวงละ 5 บาท</th>
                                    <th colspan="2" class="center">ราคาดวงละ 20 บาท</th>
                                    <th colspan="4" class="center">รวม</th>
                                    
                                    <th colspan="2" class="center">ราคาดวงละ 1 บาท</th>
                                    <th colspan="2" class="center">ราคาดวงละ 5 บาท</th>
                                    <th colspan="2" class="center">ราคาดวงละ 20 บาท</th>
                                    <th colspan="2" class="center">รวม</th>
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
                                    
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    <th class="center">จำนวนดวง</th>
                                    <th class="center">จำนวนเงิน</th>
                                    <th class="center">ส่วนลด</th>
                                    <th class="center">รวมจัดเก็บ</th>
                                    
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
                            </tbody>
						</table>
                        
					</div>
				</div>
			</div><!-- /.row -->
        </div>
    </div>
</div>
<script>
	
	function ExportExcel(obj){
		 	var htmltable= document.getElementById(obj);
       		var html = htmltable.outerHTML;
			setTimeout(function(){ window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html)) }, 2000);
       		
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
		var off = $('#off_tf').val();
		waitingDialog.show()
		$.ajax({
			type: "POST",
			url: "ajax/ajax_GetReport0001.php",
			data: "startdate="+startdate+"&enddate="+enddate+"&OFF="+off,
			cache: false,
			success: function(data){
				data = JSON.parse(data);
				$('#report_table tbody tr').remove();
				for(var i = 0;i<data.length;i++){
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
				}
				waitingDialog.hide();
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