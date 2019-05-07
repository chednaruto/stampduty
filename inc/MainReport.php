<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php" ><i class="ace-icon fa fa-home home-icon"></i>หน้าหลัก</a>
                </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
					ระบบรายงาน
				</h1>
            </div>
            <div class="row">
				<div class="col-sm-12">
                    <div class="dd-draghandle col-sm-12">
                        <ol class="dd-list col-sm-12">
                        	<?php
								if($_SESSION['OFFICELEVEL']==00){
							?>
                                <a href="index.php?service=report_0001">
                                    <li class="dd-item dd2-item" data-id="15">
                                        <div class="dd-handle dd2-handle">
                                            <i class="normal-icon ace-icon fa fa-bars orange bigger-130"></i>
        
                                            <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                        </div>
                                        <div class="dd2-content"> รายงานการเบิก จำหน่าย และแสตมป์อากรคงเหลือ รายหน่วยงาน </div>
                                    </li>
                                </a>
                                <a href="index.php?service=report_0003">
                                    <li class="dd-item dd2-item" data-id="15">
                                        <div class="dd-handle dd2-handle">
                                            <i class="normal-icon ace-icon fa fa-bars orange bigger-130"></i>
        
                                            <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                        </div>
                                        <div class="dd2-content"> รายงานการจำหน่ายแสตมป์อากรแยกตามภาค </div>
                                    </li>
                                </a>
                                <a href="index.php?service=report_0004">
                                    <li class="dd-item dd2-item" data-id="15">
                                        <div class="dd-handle dd2-handle">
                                            <i class="normal-icon ace-icon fa fa-bars orange bigger-130"></i>
        
                                            <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                        </div>
                                        <div class="dd2-content"> รายงานแสตมป์อากรคงและการจำหน่ายแสตมป์อากรแยกตามภาค/พื้นที่/สาขา </div>
                                    </li>
                                </a>
                            <?php
								}else{
							?>
                        		<a href="index.php?service=report_0001">
                                    <li class="dd-item dd2-item" data-id="15">
                                        <div class="dd-handle dd2-handle">
                                            <i class="normal-icon ace-icon fa fa-bars orange bigger-130"></i>
        
                                            <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                        </div>
                                        <div class="dd2-content"> รายงานการเบิก จำหน่าย และแสตมป์อากรคงเหลือ รายหน่วยงาน </div>
                                    </li>
                                </a>
                                <a href="index.php?service=report_0002">
                                    <li class="dd-item dd2-item" data-id="15">
                                        <div class="dd-handle dd2-handle">
                                            <i class="normal-icon ace-icon fa fa-bars orange bigger-130"></i>
        
                                            <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                        </div>
                                        <div class="dd2-content"> รายงานการเบิก จ่าย เก็บรักษา และจำหน่ายแสตมป์อากร </div>
                                    </li>
                                </a>
                            <?php
								}
							?>
                        </ol>
                    </div>
                </div>
			</div><!-- /.row -->
        </div>
    </div>
</div>
		