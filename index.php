<?php
@session_start();
include("inc/config.php");

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>ระบบบริหารการเบิก จ่าย เก็บรักษา และจำหน่ายแสตมป์อากร - SDMS</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />

		<script src='assets/js/jquery.js'></script>
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="assets/css/select2.css" />
        <link rel="stylesheet" href="assets/css/chosen.css" />
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-editable.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-duallistbox.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/css/jquery-confirm.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />
        
		<style>
			.jconfirm .jconfirm-box.jconfirm-animation-news{s
				transform: rotate(400deg) scale(0);
				-ms-transform: scale(0,0) rotate(400deg); 
			  	-webkit-transform: scale(0,0) rotate(400deg); 
			  	-moz-transform: scale(0,0) rotate(400deg); 
			  	transform: scale(0,0) rotate(400deg); 
			}
		
			/* width */
			::-webkit-scrollbar {
				width: 20px;
			}
			
			/* Track */
			::-webkit-scrollbar-track {
				box-shadow: inset 0 0 5px grey; 
				border-radius: 10px;
			}
			 
			/* Handle */
			::-webkit-scrollbar-thumb {
				background: #0099CC; 
				border-radius: 10px;
			}
			
			/* Handle on hover */
			::-webkit-scrollbar-thumb:hover {
				background: #0099CC; 
			}
        </style>
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
                <script>
					function GoToReport(){window.location.href='index.php?service=MainReport';}
					function GoProfile(){window.location.href='index.php?service=profile';}
					function GoToDash(){window.location.href='index.php?service=dashboard';}
					function GoNew(){window.location.href='index.php?service=News';}
					
				</script>
                <?php
				if(isset($_SESSION['PIN'])){
					echo '<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success" onclick="GoToDash()"><i class="ace-icon fa fa-tachometer"></i></button>
						<button class="btn btn-info" onclick="GoToReport()"><i class="ace-icon fa fa-signal"></i></button>
						<button class="btn btn-warning" onclick="GoProfile()"><i class="ace-icon fa fa-users"></i></button>
						<button class="btn btn-danger" onclick="GoNew()"><i class="ace-icon fa fa-info-circle"></i></button>
					</div>';
				}else{
				?>
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success"><i class="ace-icon fa "></i></button>
						<button class="btn btn-info"><i class="ace-icon fa "></i></button>
						<button class="btn btn-warning"><i class="ace-icon fa "></i></button>
						<button class="btn btn-danger"><i class="ace-icon fa "></i></button>
					</div>
                <?php
				}
				?>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>					
                   	</div>
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
							if(isset($_SESSION['PIN'])){
								if(isset($_GET["service"])){
									if(!@include_once("inc/".$_GET["service"].".php")){
										include_once("inc/error.php");
									}
								}else{
									include_once("inc/main.php");
								}
							}else{
								if($_GET["service"]=="About" || $_GET["service"]=="dashboard" || $_GET["service"]=="Document" || $_GET['service']=='News' || $_GET['service']=='login' || $_GET['service']=='Tracking'){
									include_once("inc/".$_GET["service"].".php");
								}else{
									include_once("inc/News.php");
								}
							}
							
			?>

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">พัฒนาโดย: </span>กองเทคโนโลยีสารสนเทศ 
							 &copy; 2018 The Revenue Department of Thailand. All Rights Reserved.
                        </span>					
               		</div>
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
        <script src="assets/js/chosen.jquery.js"></script>
        <!-- page specific plugin scripts -->
		<script src="assets/js/dataTables/jquery.dataTables.js"></script>
		<script src="assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>
        <script src="assets/js/fuelux/fuelux.spinner.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="assets/js/date-time/bootstrap-timepicker.js"></script>
		<script src="assets/js/date-time/moment.js"></script>
		<script src="assets/js/date-time/daterangepicker.js"></script>
		<script src="assets/js/date-time/bootstrap-datetimepicker.js"></script>

		<!-- ace scripts -->
        
		<script src="assets/js/jquery-confirm.js"></script>
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
		<script src="assets/js/jquery.nestable.js"></script>
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
				
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: false,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					
					$(this).prev().focus();
				});
				
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
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
				
				
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
				
			
				
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
				
				$('.dd').nestable();
				
				var oTable1 = $('#dynamic-table').dataTable({
					"language": {
						"search": "<b>ค้นหา:</b>",
						"lengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
						"info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
						"infoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
						"zeroRecords": "ไม่มีข้อมูล",
						"oPaginate": {
							"sFirst": "หน้าแรก", // This is the link to the first page
							"sPrevious": "ก่อนหน้า", // This is the link to the previous page
							"sNext": "ถัดไป", // This is the link to the next page
							"sLast": "หน้าสุดท้าย" // This is the link to the last page
						}
					}
				});
				var oTable2 = $('#dynamic-table2').dataTable({
					"language": {
						"search": "<b>ค้นหา:</b>",
						"lengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
						"info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
						"infoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
						"zeroRecords": "ไม่มีข้อมูล",
						"oPaginate": {
							"sFirst": "หน้าแรก", // This is the link to the first page
							"sPrevious": "ก่อนหน้า", // This is the link to the previous page
							"sNext": "ถัดไป", // This is the link to the next page
							"sLast": "หน้าสุดท้าย" // This is the link to the last page
						}
					}
				});
				var oTable3 = $('#dynamic-table3').dataTable({
					"language": {
						"search": "<b>ค้นหา:</b>",
						"lengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
						"info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
						"infoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
						"zeroRecords": "ไม่มีข้อมูล",
						"oPaginate": {
							"sFirst": "หน้าแรก", // This is the link to the first page
							"sPrevious": "ก่อนหน้า", // This is the link to the previous page
							"sNext": "ถัดไป", // This is the link to the next page
							"sLast": "หน้าสุดท้าย" // This is the link to the last page
						}
					}
				});
				var oTable3 = $('#dynamic-table25').dataTable({
					"pageLength": 25,
					"language": {
							"search": "<b>ค้นหา:</b>",
							"lengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
							"info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
							"infoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
							"zeroRecords": "ไม่มีข้อมูล",
							"oPaginate": {
								"sFirst": "หน้าแรก", // This is the link to the first page
								"sPrevious": "ก่อนหน้า", // This is the link to the previous page
								"sNext": "ถัดไป", // This is the link to the next page
								"sLast": "หน้าสุดท้าย" // This is the link to the last page
							}
					}
				});
				var oTable3 = $('#dynamic-table100').dataTable({
					"pageLength": 100,
					"language": {
							"search": "<b>ค้นหา:</b>",
							"lengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
							"info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
							"infoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
							"zeroRecords": "ไม่มีข้อมูล",
							"oPaginate": {
								"sFirst": "หน้าแรก", // This is the link to the first page
								"sPrevious": "ก่อนหน้า", // This is the link to the previous page
								"sNext": "ถัดไป", // This is the link to the next page
								"sLast": "หน้าสุดท้าย" // This is the link to the last page
							}
					}
				});
				
				if('userEditing' == '<?php echo $_GET['service']; ?>' || 'AdminuserEditing' == '<?php echo $_GET['service']; ?>'){
					SearchInfo();
				}
				if('stampPartyAdding' == '<?php echo $_GET['service']; ?>' && '<?php echo $_GET['stamp_party_transaction_id'];?>' != ""){
					SearchInfo('stamp_party_cid_tf');
				}
			 	
			} );
			var waitingDialog = waitingDialog || (function ($) {
				'use strict';
			
				// Creating modal dialog's DOM
				var $dialog = $(
					'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
					'<div class="modal-dialog modal-m">' +
					'<div class="modal-content">' +
						'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
						'<div class="modal-body">' +
							'<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
						'</div>' +
					'</div></div></div>');
			
				return {
					/**
					 * Opens our dialog
					 * @param message Custom message
					 * @param options Custom options:
					 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
					 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
					 */
					show: function (message, options) {
						// Assigning defaults
						if (typeof options === 'undefined') {
							options = {};
						}
						if (typeof message === 'undefined') {
							message = 'กรุณารอสักครู่...';
						}
						var settings = $.extend({
							dialogSize: 'm',
							progressType: '',
							onHide: null // This callback runs after the dialog was hidden
						}, options);
			
						// Configuring dialog
						$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
						$dialog.find('.progress-bar').attr('class', 'progress-bar');
						if (settings.progressType) {
							$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
						}
						$dialog.find('h3').text(message);
						// Adding callbacks
						if (typeof settings.onHide === 'function') {
							$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
								settings.onHide.call($dialog);
							});
						}
						// Opening dialog
						$dialog.modal();
					},
					/**
					 * Closes dialog
					 */
					hide: function () {
						$dialog.modal('hide');
					}
				};
			
			})(jQuery);
			
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
        <script>
			function numberWithCommas(x) {
				x = x.toString();
				var pattern = /(-?\d+)(\d{3})/;
				while (pattern.test(x))
					x = x.replace(pattern, "$1,$2");
				return x;
			}
			
			function AjaxLogout(){
				var logout = false;
				$.confirm({
					title: 'SDMS Confirm!',
					content: 'คุณต้องการออกจากระบบใช่หรือไม่',
					animation: 'news',
					closeAnimation: 'news',
					buttons: {
						confirm: function () {
							$.ajax({
								type: "POST",
								url: "Ajax/Ajax_Logout.php",
								cache: false,
								success: function(data){
									if(data=="TRUE"){
										window.location.href = "index.php";
									}
								}
							});
						},cancel: function () {}
					}
				});
			}
		</script>
        
        
	</body>
</html>
<style>
	g[class$='creditgroup'] {
         display:none !important;
    }
	
</style>