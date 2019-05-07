<?php
@session_start();
include("inc/config.php")
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Financial System-ระบบการเงินการคลังสำนักงานสาธารณสุขจังหวัดบุรีรัมย์</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="assets/css/select2.css" />
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-editable.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-duallistbox.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-multiselect.css" />
        

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.js"></script>
		<![endif]-->
                            <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
	</head>

	<body class="no-skin">
		
		<?php  include("inc/headerMenu.php"); ?>
        
		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>					</div>
				</div><!-- /.sidebar-shortcuts -->

				<?php
                	include("inc/leftMenu.php")
                ?>

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<?php
							if(isset($_SESSION['employer_level_id'])){
								if(isset($_GET["service"])){
									if(!@include_once("inc/".$_GET["service"].".php")){
										include_once("inc/error.php");
									}
								}else{
									include_once("inc/main.php");
								}
							}else{
								
								if(strpos($_GET['service'],'report')!==false || strpos($_GET['service'],'dash')!==false || !isset($_GET['service'])){
									if(!isset($_GET["service"])){
										include_once("inc/main.php");
									}else{
										if(!@include_once("inc/".$_GET["service"].".php")){
											include_once("inc/error.php");
										}
									}
								}else{
									include_once("inc/login.php");
								}
							}
							
			?>

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">CFO</span>
							Application &copy; By BRO ICT						</span>					</div>
					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>			</a>		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
        

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.js"></script>
		<script src="assets/js/jquery.easypiechart.js"></script>
		<script src="assets/js/jquery.sparkline.js"></script>
		<script src="assets/js/flot/jquery.flot.js"></script>
		<script src="assets/js/flot/jquery.flot.pie.js"></script>
		<script src="assets/js/flot/jquery.flot.resize.js"></script>
        <!-- page specific plugin scripts -->
		<script src="assets/js/dataTables/jquery.dataTables.js"></script>
		<script src="assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace/elements.scroller.js"></script>
		<script src="assets/js/ace/elements.colorpicker.js"></script>
		<script src="assets/js/ace/elements.fileinput.js"></script>
		<script src="assets/js/ace/elements.typeahead.js"></script>
		<script src="assets/js/ace/elements.wysiwyg.js"></script>
		<script src="assets/js/ace/elements.spinner.js"></script>
		<script src="assets/js/ace/elements.treeview.js"></script>
		<script src="assets/js/ace/elements.wizard.js"></script>
		<script src="assets/js/ace/elements.aside.js"></script>
		<script src="assets/js/ace/ace.js"></script>
		<script src="assets/js/ace/ace.ajax-content.js"></script>
		<script src="assets/js/ace/ace.touch-drag.js"></script>
		<script src="assets/js/ace/ace.sidebar.js"></script>
		<script src="assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="assets/js/ace/ace.submenu-hover.js"></script>
		<script src="assets/js/ace/ace.widget-box.js"></script>
		<script src="assets/js/ace/ace.settings.js"></script>
		<script src="assets/js/ace/ace.settings-rtl.js"></script>
		<script src="assets/js/ace/ace.settings-skin.js"></script>
		<script src="assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="assets/js/ace/ace.searchbox-autocomplete.js"></script>
        <script src="assets/js/jquery.inputlimiter.1.3.1.js"></script>
		<script src="assets/js/jquery.maskedinput.js"></script>
		<script src="assets/js/bootstrap-tag.js"></script>
		
		<!-- inline scripts related to this page -->
        
		<script>
			$(document).ready(function() {
			
			
				
				
			
				$('.modal.aside').ace_aside();
				
				$('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});
				
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove before leaving page
					$('.modal.aside').remove();
					$(window).off('.aside')
				});
				
				$('.search').DataTable( {
					"iDisplayLength": 25,
					initComplete: function () {
						this.api().columns().every( function () {
							var column = this;
							var select = $('<select><option value=""></option></select>')
								.appendTo( $(column.footer()).empty() )
								.on( 'change', function () {
									var val = $.fn.dataTable.util.escapeRegex(
										$(this).val()
									);
			 
									column
										.search( val ? '^'+val+'$' : '', true, false )
										.draw();
								} );
			 
							column.data().unique().sort().each( function ( d, j ) {
								select.append( '<option value="'+d+'">'+d+'</option>' )
							} );
						} );
					}
				} );
				
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				
				<?php
					$sql_dep = "SELECT d.department_id,d.department_name,COUNT(DISTINCT p.project_id) AS total_project,
COUNT(DISTINCT CASE WHEN p.project_level_id=1 THEN p.project_id END) AS total_project_cup,
COUNT(DISTINCT CASE WHEN p.project_level_id=2 THEN p.project_id END) AS total_project_sso,
COUNT(DISTINCT CASE WHEN p.project_level_id=3 THEN p.project_id END) AS total_project_hos,
COUNT(DISTINCT CASE WHEN p.project_level_id=4 THEN p.project_id END) AS total_project_cup_split
FROM department d 
LEFT JOIN project p on d.department_id = p.department_id AND p.project_number NOT BETWEEN '99601' AND '99623'
WHERE d.department_group_id = 2
GROUP BY d.department_id";
					$rs_dep = mysql_query($sql_dep,$connection);
					$row_n = mysql_num_rows($rs_dep);
					$i = 0;
					$text = "var d1 = [";
					$text2 = "var d2 = [";
					$text3 = "var d3 = [";
					$text4 = "var d4 = [";
					$text5 = "var d5 = [";
					$text_se = "var amp = [";
					while($row_dep=mysql_fetch_array($rs_dep)){
							$text .="";
						if($i==$row_n-1){
							$text .= '['.$i.','.$row_dep['total_project'].']];';
							$text_se .= '"'.$row_dep['department_name'].'"];';
							$text2 .= '['.$i.','.$row_dep['total_project_cup'].']];';
							$text3 .= '['.$i.','.$row_dep['total_project_sso'].']];';
							$text4 .= '['.$i.','.$row_dep['total_project_hos'].']];';
							$text5 .= '['.$i.','.$row_dep['total_project_cup_split'].']];';
						}else{
							$text .='['.$i.','.$row_dep['total_project'].'],';
							$text2 .='['.$i.','.$row_dep['total_project_cup'].'],';
							$text3 .='['.$i.','.$row_dep['total_project_sso'].'],';
							$text4 .='['.$i.','.$row_dep['total_project_hos'].'],';
							$text5 .='['.$i.','.$row_dep['total_project_cup_split'].'],';
							$text_se .= '"'.$row_dep['department_name'].'",';
						}
						$i++;
					}
					echo $text;
					echo $text2;
					echo $text3;
					echo $text4;
					echo $text5;
					echo $text_se;
				?>
				
				var ds_ampur = $('#ds-plan_ampur').css({'width':'100%' , 'height':'220px'});
				$.plot("#ds-plan_ampur", [{ label: "ทั้งหมด", data: d1 },{ label: "คปสอ.", data: d2 },{ label: "สสอ.", data: d3 },{ label: "รพ.", data: d4 },{ label: "CUP SPLIT", data: d5 }], {
					hoverable: true,
					shadowSize: 0,
					
					series: {
						
						lines: { 
							show: true
						},
						points: { show: true }
						
					},
					xaxis: {
						ticks: [[0,amp[0].replace("คปสอ.","").replace("สสอ.","")],
								[1,amp[1].replace("คปสอ.","").replace("สสอ.","")],
								[2,amp[2].replace("คปสอ.","").replace("สสอ.","")],
								[3,amp[3].replace("คปสอ.","").replace("สสอ.","")],
								[4,amp[4].replace("คปสอ.","").replace("สสอ.","")],
								[5,amp[5].replace("คปสอ.","").replace("สสอ.","")],
								[6,amp[6].replace("คปสอ.","").replace("สสอ.","")],
								[7,amp[7].replace("คปสอ.","").replace("สสอ.","")],
								[8,amp[8].replace("คปสอ.","").replace("สสอ.","")],
								[9,amp[9].replace("คปสอ.","").replace("สสอ.","")],
								[10,amp[10].replace("คปสอ.","").replace("สสอ.","")],
								[11,amp[11].replace("คปสอ.","").replace("สสอ.","")],
								[12,amp[12].replace("คปสอ.","").replace("สสอ.","")],
								[13,amp[13].replace("คปสอ.","").replace("สสอ.","")],
								[14,amp[14].replace("คปสอ.","").replace("สสอ.","")],
								[15,amp[15].replace("คปสอ.","").replace("สสอ.","")],
								[16,amp[16].replace("คปสอ.","").replace("สสอ.","")],
								[17,amp[17].replace("คปสอ.","").replace("สสอ.","")],
								[18,amp[18].replace("คปสอ.","").replace("สสอ.","")],
								[19,amp[19].replace("คปสอ.","").replace("สสอ.","")],
								[20,amp[20].replace("คปสอ.","").replace("สสอ.","")],
								[21,amp[21].replace("คปสอ.","").replace("สสอ.","")],
								[22,amp[22].replace("คปสอ.","").replace("สสอ.","")] 
								],
						tickLength: 23,
						axisLabelUseCanvas: true,
						tickFormatter: function (val, axis) {            
							return amp[val];
						}
						
						
					},
					yaxis: {
						ticks: 10
					},
					grid: {
						hoverable: true, 
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					},
					legend: {
						show: true
					}
				});
				
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  ds_ampur.on('plothover', function (event, pos, item) {
			  	
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex; 
						var tip = amp[parseInt(item.datapoint[0].toFixed(2))]+" ["+item.series['label']+"] : " + parseInt(item.datapoint[1].toFixed(2))+' โครงการ';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
				
				
								
				
				<?php
					$sql_dep = "SELECT m.month_id,m.month_name,m.month_number,d.M,d.project_budget_total,IFNULL(pp.project_pay_total,0) AS project_pay_total,
(
	SELECT SUM(pb.project_budget_total) AS project_budget_total
	FROM project_budget pb 
	LEFT JOIN charge_type ct ON pb.charge_type_id = ct.charge_type_id
	LEFT JOIN project p ON pb.projec_id = p.project_id
	WHERE pb.project_activity_type_id IN(1,2,3) AND ct.budget_group_id = 1 AND p.project_number NOT BETWEEN '991' AND '999'
	AND  MONTH(pb.project_budget_end_date) BETWEEN 1 AND 12
) AS budget_total
FROM mon_qauter_rep m
LEFT JOIN (
	SELECT MONTH(pb.project_budget_end_date) AS M,
	SUM(pb.project_budget_total) AS project_budget_total
	FROM project_budget pb 
	LEFT JOIN charge_type ct ON pb.charge_type_id = ct.charge_type_id
	LEFT JOIN project p ON pb.projec_id = p.project_id
	WHERE pb.project_activity_type_id IN(1,2,3) AND ct.budget_group_id = 1 AND p.project_number NOT BETWEEN '991' AND '999'
	AND  MONTH(pb.project_budget_start_date) BETWEEN 1 AND 12
	GROUP BY MONTH(pb.project_budget_end_date)
) d ON d.M = m.month_number
LEFT JOIN (
	SELECT MONTH(pp.project_pay_enddate) AS month_number ,SUM(pp.project_pay_total) AS project_pay_total
	FROM project_pay pp
	LEFT JOIN project_budget pb ON pp.project_budget_id = pb.project_budget_id
	LEFT JOIN charge_type ct ON ct.charge_type_id = pb.charge_type_id
	WHERE ct.budget_group_id = 1 AND pp.project_pay_active = 'Y' AND pb.project_activity_type_id IN(1,2,3)
	GROUP BY MONTH(pp.project_pay_enddate)
) AS pp ON m.month_number = pp.month_number
ORDER BY m.month_id ASC";
					$rs_dep = mysql_query($sql_dep,$connection);
					$row_n = mysql_num_rows($rs_dep);
					$i = 0;
					$text = "var d1 = [";
					
					$text_se = "var monthList = [";
					$text_pe = "var pay = [";
					$budget_total = 0;
					$pay_total = 0;
					while($row_dep=mysql_fetch_array($rs_dep)){
							$text .="";
							$budget_total += $row_dep['project_budget_total'];
							$pay_total += $row_dep['project_pay_total'];
						if($i==$row_n-1){
							$text .= '['.$i.','.$budget_total*100/$row_dep['budget_total'].']];';
							$text_pe .= '['.$i.','.$pay_total*100/$row_dep['budget_total'].']];';
							$text_se .= '"'.$row_dep['month_name'].'"];';
						}else if($i==0){
							$text .='['.$i.','.$budget_total*100/$row_dep['budget_total'].'],';
							$text_pe .= '['.$i.','.$pay_total*100/$row_dep['budget_total'].'],';
							$text_se .= '"'.$row_dep['month_name'].'",';
						}else{
							$text .='['.$i.','.$budget_total*100/$row_dep['budget_total'].'],';
							$text_pe .= '['.$i.','.$pay_total*100/$row_dep['budget_total'].'],';
							$text_se .= '"'.$row_dep['month_name'].'",';
						}
						$i++;
					}
					echo $text;
					echo $text_pe;
					echo $text_se;
				?>
				
				var ds_plan_prachoom = $('#ds-plan_prachoom').css({'width':'100%' , 'height':'220px'});
				$.plot("#ds-plan_prachoom", [{ label: "แผนงานประชุม อบรม สัมนา", data: d1 },{ label: "เบิกจ่ายแล้ว", data: pay }], {
					hoverable: true,
					shadowSize: 0,
					
					series: {
						lines: { 
							show: true	
						},
						
						points: { show: true }
						
					},
					xaxis: {
						
						tickLength: 0,
						tickFormatter: function (val, axis) {            
							return monthList[val];
						}
						
						
					},
					yaxis: {
						ticks: 11,
						max:100,
						min:0
					},
					grid: {
						hoverable: true, 
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						markings: [
							{xaxis: {from: 0, to: 3}, yaxis: {from: 0, to: 100}, color: "#eeeeff"},
							{xaxis: {from: 3, to: 6}, yaxis: {from: 0, to: 100}, color: "#eeffee"},
							{xaxis: {from: 6, to: 9}, yaxis: {from: 0, to: 100}, color: "#eeeeff"},
							{xaxis: {from: 9, to: 11}, yaxis: {from: 0, to: 100}, color: "#eeffee"},
							{xaxis: {from: 0, to: 3},yaxis: { from: 30.0, to: 30.0 },color: "rgba(140,2,28,0.5)"},
							{xaxis: {from: 3, to: 6},yaxis: { from: 52.0, to: 52.0 },color: "rgba(140,2,28,0.5)"},
							{xaxis: {from: 6, to: 9},yaxis: { from: 73.0, to: 73.0 },color: "rgba(140,2,28,0.5)"},
							{xaxis: {from: 9, to: 11},yaxis: { from: 96.0, to: 96.0 },color: "rgba(140,2,28,0.5)"}
							
						],
						borderColor:'#555'
					}
				});
				
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  ds_plan_prachoom.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.datapoint[1].toFixed(2)+'';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
				
				
				<?php
					$sql_dep = "SELECT d.department_name,SUM(pb.project_budget_total) project_budget_total,db.dispense_budget_total
FROM department d
LEFT JOIN project p ON p.department_id = d.department_id
LEFT JOIN project_budget pb ON pb.projec_id = p.project_id
LEFT JOIN charge_type ct ON ct.charge_type_id = pb.charge_type_id
LEFT JOIN (
	SELECT p.department_id,SUM(db.dispense_budget_total) AS dispense_budget_total  FROM dispense_budget db 
	LEFT JOIN project p ON p.project_id = db.project_id
	GROUP BY p.department_id
) AS db ON db.department_id = p.department_id
WHERE d.department_group_id = 1 AND ct.budget_group_id = 1
GROUP BY d.department_id";
					$rs_dep = mysql_query($sql_dep,$connection);
					$row_n = mysql_num_rows($rs_dep);
					$i = 0;
					$text = "var d1 = [";
					
					$text_se = "var xist = [";
					while($row_dep=mysql_fetch_array($rs_dep)){
							$text .="";
						if($i==$row_n-1){
							$text .= '['.$i.','.$row_dep['dispense_budget_total']*100/$row_dep['project_budget_total'].']];';
							
							$text_se .= '"'.$row_dep['department_name'].'"];';
						}else{
							$text .='['.$i.','.$row_dep['dispense_budget_total']*100/$row_dep['project_budget_total'].'],';
							
							$text_se .= '"'.$row_dep['department_name'].'",';
						}
						$i++;
					}
					echo $text;
					echo $text_se;
				?>
				
				var ds_charts = $('#ds-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#ds-charts", [{ label: "ร้อยละที่จัดสรรแล้ว", data: d1 }], {
					hoverable: true,
					shadowSize: 0,
					
					series: {
						lines: { 
							show: true	
						},
						points: { show: true }
						
					},
					xaxis: {
						
						tickLength: 0,
						tickFormatter: function (val, axis) {            
							return xist[val];
						}
						
						
					},
					yaxis: {
						ticks: 11,
						max:100,
						min:0
					},
					grid: {
						hoverable: true, 
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						
						borderColor:'#555'
					}
				});
				
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  ds_charts.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.datapoint[1].toFixed(2)+'';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
				
				
				
				
				<?php
					$sql_dep = "SELECT p.department_id,d.department_name,
COUNT(DISTINCT p.project_id) AS total_project,
SUM(pb.project_budget_total) AS project_budget_total,
(SELECT SUM(pbs.project_budget_total) FROM project_budget pbs 
	LEFT JOIN project ps ON pbs.projec_id = ps.project_id WHERE ps.department_id = d.department_id ) AS budget_total
FROM department d 
LEFT JOIN project p ON d.department_id = p.department_id
LEFT JOIN project_budget pb ON pb.projec_id = p.project_id
LEFT JOIN charge_type ct ON pb.charge_type_id = ct.charge_type_id
WHERE d.department_group_id = 1 AND ct.budget_group_id = 1
GROUP BY d.department_id";
					$rs_dep = mysql_query($sql_dep,$connection);
					$row_n = mysql_num_rows($rs_dep);
					$i = 0;
					$text = "var d1 = [";
					$text2 = "var d2 = [";
					$text_se = "var xist = [";
					while($row_dep=mysql_fetch_array($rs_dep)){
							$text .="";
						if($i==$row_n-1){
							$text .= '['.$i.','.$row_dep['project_budget_total']*100/$row_dep['budget_total'].']];';
							$text2 .= '['.$i.','.($row_dep['budget_total']-$row_dep['project_budget_total'])*100/$row_dep['budget_total'].']];';
							$text_se .= '"'.$row_dep['department_name'].'"];';
						}else{
							$text .='['.$i.','.$row_dep['project_budget_total']*100/$row_dep['budget_total'].'],';
							$text2 .= '['.$i.','.($row_dep['budget_total']-$row_dep['project_budget_total'])*100/$row_dep['budget_total'].'],';
							$text_se .= '"'.$row_dep['department_name'].'",';
						}
						$i++;
					}
					echo $text;
					echo $text2;
					echo $text_se;
				?>
				
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [{ label: "งบดำเนินงาน", data: d1 },{ label: "งบอื่นๆ", data: d2 }], {
					hoverable: true,
					shadowSize: 0,
					
					series: {
						lines: { 
							show: true,
							
							label: {
								show: true,
								formatter: function(label,point){
									 return('xxxx');
								 }
							}	
						},
						points: { show: true }
						
					},
					xaxis: {
						
						tickLength: 0,
						tickFormatter: function (val, axis) {            
							return xist[val];
						}
						
						
					},
					yaxis: {
						ticks: 11,
						max:100,
						min:0
					},
					grid: {
						hoverable: true, 
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
				
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  sales_charts.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.datapoint[1].toFixed(2)+'';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
				
				
				
				
				
				
				
			 var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				<?php
					$sql = "SELECT s.strategic_name,sum(IFNULL(pb.project_budget_total,0)) AS project_budget_strategic_total,(SELECT SUM(pbs.project_budget_total) FROM project_budget pbs) AS project_budget_total
FROM strategic s
LEFT JOIN project p ON s.strategic_id = p.strategic_id
LEFT JOIN project_budget pb ON p.project_id = pb.projec_id 
GROUP BY s.strategic_id
ORDER BY s.strategic_id ASC";
					$rs = mysql_query($sql,$connection);
					$color_s=array();
					$i = 0;
					while($row = mysql_fetch_array($rs)){
						$color_s[$i]= "#".substr(md5(rand()), 0, 6);
						if($i==3){
							echo '{ label: "'.$row['strategic_name'].'",  data: '.number_format($row['project_budget_strategic_total']*100/$row['project_budget_total'],2).', color: "'.$color_s[$i].'"}';
						}else{
							echo '{ label: "'.$row['strategic_name'].'",  data: '.number_format($row['project_budget_strategic_total']*100/$row['project_budget_total'],2).', color: "'.$color_s[$i].'"},';
						}
						$i++;
					}
				
				?>			  	
			  ]
			  
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			 
			 
			
			 
			 
			 
			  var placeholder = $('#piechart-charge').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				<?php
					$sql = "SELECT  cm.charge_mode_name,SUM(IFNULL(pb.project_budget_total,0)) AS project_budget_total,
(SELECT SUM(project_budget_total) FROM project_budget pbs) total_budget
FROM charge_mode cm 
INNER JOIN charge_type ct ON cm.charge_mode = ct.charge_mode
INNER JOIN project_budget pb ON pb.charge_type_id = ct.charge_type_id
GROUP BY cm.charge_mode";
					$rs = mysql_query($sql,$connection);
					$color = array('#68BC31','#2091CF','#AF4E96','#DA5430');
					$i = 0;
					while($row = mysql_fetch_array($rs)){
						if($i==8){
							echo '{ label: "'.$row['charge_mode_name'].'",  data: '.number_format($row['project_budget_total']*100/$row['total_budget'],2).', color: "#'.substr(md5(rand()), 0, 6).'"}';
						}else{
							echo '{ label: "'.$row['charge_mode_name'].'",  data: '.number_format($row['project_budget_total']*100/$row['total_budget'],2).', color: "#'.substr(md5(rand()), 0, 6).'"},';
						}
						$i++;
					}
				
				?>			  	
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: { 
							show: true,
							tilt:0.8,
							radius: 1,
							label: {
								show: true,
								radius: 1,
								background: {
									color: '#fff',
									opacity: 0.0
								},
								formatter: function(label,point){
									 return(point.percent.toFixed(2) + '%');
								 }
							},
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 1
							
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			 
			 
			 if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			 
			} );
			
			</script>
            

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="assets/js/themes/sunburst.css" />
		<script>
			function validate(evt) {
			  var theEvent = evt || window.event;
			  var key = theEvent.keyCode || theEvent.which;
			  key = String.fromCharCode( key );
			  var regex = /[0-9]|\./;
			  if( !regex.test(key) ) {
				theEvent.returnValue = false;
				if(theEvent.preventDefault) theEvent.preventDefault();
			  }
			}
		</script>
		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="assets/js/ace/elements.onpage-help.js"></script>
		<script src="assets/js/ace/ace.onpage-help.js"></script>
		<script src="docs/assets/js/rainbow.js"></script>
		<script src="docs/assets/js/language/generic.js"></script>
		<script src="docs/assets/js/language/html.js"></script>
		<script src="docs/assets/js/language/css.js"></script>
		<script src="docs/assets/js/language/javascript.js"></script>
        
        
        
	</body>
</html>
