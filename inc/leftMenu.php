<ul class="nav nav-list">
	<li>
		<a href="index.php">
        	<i class="menu-icon fa fa-home blue"></i><span class="menu-text blue"> หน้าหลัก </span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php
		if($_SESSION['OFFICELEVEL']=='00'){
	?>
    <li>
		<a href="index.php?service=dashboard">
        	<i class="menu-icon fa fa-tachometer blue"></i><span class="menu-text blue">DASHBOARD</span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php
	}
		if($_SESSION['SETLIMIT'] == "Y" || $_SESSION['SELL'] == "Y" || $_SESSION['WITHDRAW'] == "Y" || $_SESSION['DEPOSIT'] == "Y" || $_SESSION['AGREEMENT'] == "Y" || $_SESSION['BOARD'] == "Y" || $_SESSION['USERMANAGE'] == "Y"){
	?>
    <li <?php if($_GET['service'] == "limitmoneyManager" || $_GET['service'] == 'limitmoneyShowing' || $_GET['service'] == 'limitmoneyEditing'){ echo 'class="active"';} ?> >
    	<a href="#" class="dropdown-toggle">
        	<i class="menu-icon fa fa-money blue"></i>
           	<span class="menu-text blue">จัดการวงเงินเก็บรักษา</span><b class="arrow fa fa-angle-down"></b>
       	</a>
        <b class="arrow"></b>
		<ul class="submenu">
        	<?php
				if($_SESSION['SETLIMIT'] == "Y"){
			?>
        	<li <?php if($_GET['service'] == "limitmoneyManager" || $_GET['service'] == 'limitmoneyEditing'){ echo 'class="active"';} ?> >
            	<a href="index.php?service=limitmoneyManager" class="green"><i class="menu-icon fa fa-caret-right"></i> กำหนดวงเงินเก็บรักษา </b></a>
           		<b class="arrow"></b>
        	</li>
            <?php
				}
			?>
          	<li <?php if($_GET['service'] == "limitmoneyShowing"){ echo 'class="active"';} ?>>
          		<a href="index.php?service=limitmoneyShowing" class="green"><i class="menu-icon fa fa-caret-right"></i> ตรวจสอบวงเงินเก็บรักษา </b></a>
          		<b class="arrow"></b>
          	</li>
      	</ul>
	</li>
    <?php
		}
		if($_SESSION['WITHDRAW'] == 'Y'){
	?>
	<li <?php if(in_array($_GET['service'] ,array("withdrawtransactionManager","withdrawtransactionAdding","withdrawtransactionEditing"))){ echo 'class="active"';} ?>>
    	<a href="#" class="dropdown-toggle">
        	<i class="menu-icon fa fa-desktop blue"></i>
           	<span class="menu-text blue"> เบิกแสตมป์อากร </span><b class="arrow fa fa-angle-down"></b>
       	</a>
        <b class="arrow"></b>
		<ul class="submenu">
          	<li <?php if(in_array($_GET['service'] ,array("withdrawtransactionManager","withdrawtransactionAdding","withdrawtransactionEditing"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=withdrawtransactionManager" class="green"><i class="menu-icon fa fa-caret-right"></i>เบิกแสตมป์อากร (อ.ส.01)</b></a>
          		<b class="arrow"></b>
          	</li>
      	</ul>
	</li>
    <?php
		}
		if($_SESSION['DEPOSIT'] == 'Y'){
	?>
    <li <?php if(in_array($_GET['service'] ,array("receivestampManager","receivestampAdding","receivestampEditing","innitstockManager","allowedwithdrawtransactionManager","allowedwithdrawtransactionadding","allowedwithdrawtransactionEditing","paytransactionManager","paytransactionAdding","paytransactionEditing","receivetransactionManager","receivetransactionAdding","deliverManager","deliverAdding"))){ echo 'class="active"';} ?>>
    	<a href="#" class="dropdown-toggle">
        	<i class="menu-icon fa fa-desktop blue"></i>
           	<span class="menu-text blue"> รับ/จ่ายแสตมป์อากร </span><b class="arrow fa fa-angle-down"></b>
       	</a>
        <b class="arrow"></b>
		<ul class="submenu">
        	<!--<li <?php if($_GET['service'] == "innitstockManager"){ echo 'class="active"';} ?>>
            	<a href="index.php?service=innitstockManager" class="green"><i class="menu-icon fa fa-caret-right"></i> ตั้งยอดยกมา </b></a>
           		<b class="arrow"></b>
        	</li>-->
         <?php 
		 	if($_SESSION['OFFICELEVEL']!="04"){
		 ?>
          	<li <?php if(in_array($_GET['service'] ,array("allowedwithdrawtransactionManager","allowedwithdrawtransactionadding","allowedwithdrawtransactionEditing"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=allowedwithdrawtransactionManager" class="green"><i class="menu-icon fa fa-caret-right"></i>ขออนุญาตจ่าย (อ.ส.01.6)</b></a>
          		<b class="arrow"></b>
          	</li>
        	
            <li <?php if(in_array($_GET['service'] ,array("paytransactionManager","paytransactionAdding","paytransactionEditing"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=paytransactionManager" class="green"><i class="menu-icon fa fa-caret-right"></i>จ่ายแสตมป์อากร (อ.ส.01.7)</b></a>
          		<b class="arrow"></b>
          	</li>
           <?php
		   		}
				if($_SESSION['OFFICELEVEL']=="02" || $_SESSION['OFFICELEVEL'] =='03' || $_SESSION['OFFICELEVEL'] == '04'){
			?>
            <li <?php if(in_array($_GET['service'] ,array("deliverManager","deliverAdding"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=deliverManager" class="green"><i class="menu-icon fa fa-caret-right"></i>ส่งมอบ ฯ (อ.ส.01.4)</b></a>
          		<b class="arrow"></b>
          	</li>
            <?php
				}
				if($_SESSION['OFFICELEVEL']=="00"){
			?>
            <li <?php if(in_array($_GET['service'] ,array("receivestampManager","receivestampAdding","receivestampEditing"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=receivestampManager" class="green"><i class="menu-icon fa fa-caret-right"></i>บันทึกรับแสตมป์อากร</b></a>
          		<b class="arrow"></b>
          	</li>
            <?php
				}else{
			?>
            <li <?php if(in_array($_GET['service'] ,array("receivetransactionManager","receivetransactionAdding"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=receivetransactionManager" class="green"><i class="menu-icon fa fa-caret-right"></i>ตอบรับ (อ.ส.01.8)</b></a>
          		<b class="arrow"></b>
          	</li>
            <?php
				}
			?>
      	</ul>
	</li>
    <?php
		}
		if($_SESSION['SELL']=='Y'){
	?>
    <li <?php if(in_array($_GET['service'] ,array("stampPartyManager","stampPartyAdding","stampSellManager","stampSellAdding","stampMinorSellManager","stampMinorSellAdding"))){ echo 'class="active"';} ?>>
    	<a href="#" class="dropdown-toggle">
        	<i class="menu-icon fa fa-desktop blue"></i>
           	<span class="menu-text blue"> จำหน่ายแสตมป์อากร </span><b class="arrow fa fa-angle-down"></b>
       	</a>
        <b class="arrow"></b>
		<ul class="submenu">
          	<li <?php if(in_array($_GET['service'] ,array("stampSellManager","stampSellAdding"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=stampSellManager" class="green"><i class="menu-icon fa fa-caret-right"></i> ขายแสตมป์อากร (คู่สัญญา) </b></a>
          		<b class="arrow"></b>
          	</li>
            <li <?php if(in_array($_GET['service'] ,array("stampMinorSellManager","stampMinorSellAdding"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=stampMinorSellManager" class="green"><i class="menu-icon fa fa-caret-right"></i> ขายแสตมป์อากร (รายย่อย) </b></a>
          		<b class="arrow"></b>
          	</li>
            <li <?php if(in_array($_GET['service'] ,array("stampPartyManager","stampPartyAdding"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=stampPartyManager" class="green"><i class="menu-icon fa fa-caret-right"></i> แบบสัญญาซื้อ </b></a>
          		<b class="arrow"></b>
          	</li>
            
      	</ul>
	</li>
    <?php
		}
		if($_SESSION['BOARD']=='Y'){
	?>
    <li <?php if(in_array($_GET['service'] ,array("withdrawboardManager","withdrawboardAdding","withdrawboardEditing","stockboardManager","stockboardAdding","stockboardEditing","signatureboardManager","signatureboardAdding","signatureboardEditing"))){ echo 'class="active"';} ?>>
    	<a href="#" class="dropdown-toggle">
        	<i class="menu-icon fa fa-user blue"></i>
           	<span class="menu-text blue"> จัดการกรรมการ </span><b class="arrow fa fa-angle-down"></b>
       	</a>
        <b class="arrow"></b>
		<ul class="submenu">
        	<li <?php if(in_array($_GET['service'] ,array("withdrawboardManager","withdrawboardAdding","withdrawboardEditing"))){ echo 'class="active"';} ?>>
            	<a href="index.php?service=withdrawboardManager" class="green"><i class="menu-icon fa fa-caret-right"></i> จัดการคณะกรรมการเบิก </b></a>
           		<b class="arrow"></b>
        	</li>
          	<li <?php if(in_array($_GET['service'] ,array("stockboardManager","stockboardAdding","stockboardEditing"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=stockboardManager" class="green"><i class="menu-icon fa fa-caret-right"></i>จัดการคณะกรรมการคลัง</b></a>
          		<b class="arrow"></b>
          	</li>
            <li <?php if(in_array($_GET['service'] ,array("signatureboardManager","signatureboardAdding","signatureboardEditing"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=signatureboardManager" class="green"><i class="menu-icon fa fa-caret-right"></i>จัดการผู้มีอำนาจลงนาม</b></a>
          		<b class="arrow"></b>
          	</li>
      	</ul>
	</li>
 	<?php
		}
		if($_SESSION['ISADMIN'] == 'Y' /*|| $_SESSION['USERMANAGE'] == 'Y'*/){
	?>
    <li <?php if(in_array($_GET['service'] ,array("userManager","UserAdding","userEditing"))){ echo 'class="active"';} ?> >
    	<a href="#" class="dropdown-toggle">
        	<i class="menu-icon fa fa-user blue"></i>
           	<span class="menu-text blue"> จัดการข้อมูลพื้นฐาน </span><b class="arrow fa fa-angle-down"></b>
       	</a>
        <b class="arrow"></b>
		<ul class="submenu">
          	<li <?php if(in_array($_GET['service'] ,array("userManager","UserAdding","userEditing"))){ echo 'class="active"';} ?> >
          		<a href="index.php?service=userManager" class="green"><i class="menu-icon fa fa-caret-right"></i>ข้อมูลผู้ใช้งาน</b></a>
          		<b class="arrow"></b>
          	</li>
      	</ul>
	</li>
    <?php
		}
		if($_SESSION['SETLIMIT'] == "Y" || $_SESSION['SELL'] == "Y" || $_SESSION['WITHDRAW'] == "Y" || $_SESSION['DEPOSIT'] == "Y" || $_SESSION['AGREEMENT'] == "Y" || $_SESSION['BOARD'] == "Y" || $_SESSION['USERMANAGE'] == "Y" || $_SESSION['OFFICELEVEL']=="00"){
	?>
    <li <?php if(in_array($_GET['service'] ,array("MainReport")) || substr($_GET['service'],0,6) === "report"){ echo 'class="active"';} ?>>
    	<a href="#" class="dropdown-toggle">
        	<i class="menu-icon fa fa-bar-chart blue"></i>
           	<span class="menu-text blue"> รายงาน </span><b class="arrow fa fa-angle-down"></b>
       	</a>
        <b class="arrow"></b>
		<ul class="submenu">
            <li <?php if(in_array($_GET['service'] ,array("MainReport")) || substr($_GET['service'],0,6) === "report"){ echo 'class="active"';} ?>>
          		<a href="index.php?service=MainReport" class="green"><i class="menu-icon fa fa-caret-right"></i> รายงานทั้งหมด </b></a>
          		<b class="arrow"></b>
          	</li>
      	</ul>
	</li>
    <?php
		}
		
	?>
    <li <?php if($_GET['service']=='About'){ echo 'class="active"';} ?>>
    	<a href="index.php?service=About">
        	<i class="menu-icon fa fa-info-circle blue"></i><span class="menu-text blue"> ติดต่อ </span>
        </a>
        <b class="arrow"></b>
	</li>
    <li <?php if($_GET['service']=='Document'){ echo 'class="active"';} ?>>
    	<a href="index.php?service=Document">
        	<i class="menu-icon fa fa-info-circle blue"></i><span class="menu-text blue"> คู่มือการใช้งานระบบ </span>
        </a>
        <b class="arrow"></b>
	</li>
    <li <?php if($_GET['service']=='News'){ echo 'class="active"';} ?>>
    	<a href="index.php?service=News">
        	<i class="menu-icon fa fa-info-circle blue"></i><span class="menu-text blue"> แจ้งข่าวสาร </span>
        </a>
        <b class="arrow"></b>
	</li>
    <?php
    if(!isset($_SESSION['PIN'])){
	?>
	<li <?php if($_GET['service']=='login'){ echo 'class="active"';} ?> >
    	<a href="index.php?service=login">
        	<i class="menu-icon fa fa-lock blue"></i><span class="menu-text blue">เข้าสู่ระบบ</span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php
		}else{
	?>
    <li <?php if($_GET['service']=='login'){ echo 'class="active"';} ?> >
    	<a href="#" onclick="AjaxLogout()">
        	<i class="menu-icon fa fa-unlock blue"></i><span class="menu-text blue">ออกจากระบบ</span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php
		}
	?>
    <?php
		if($_SESSION['ID']=='150378' || $_SESSION['ID']=='352451' || $_SESSION['ID']=='154963'){
	?>
   	<li <?php if(in_array($_GET['service'] ,array("AdminuserManager","AdminLogManager","AdminuserEditing","AdminAssignLevel","AdminWithdrawTransaction"))){ echo 'class="active"';} ?>>
    	<a href="#" class="dropdown-toggle">
        	<i class="menu-icon fa fa-desktop blue"></i>
           	<span class="menu-text blue"> System Admin </span><b class="arrow fa fa-angle-down"></b>
       	</a>
        <b class="arrow"></b>
		<ul class="submenu">
            <li <?php if(in_array($_GET['service'] ,array("AdminuserManager","AdminuserEditing"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=AdminuserManager" class="green"><i class="menu-icon fa fa-caret-right"></i> จัดการสิทธิ์ทั้งหมด </b></a>
          		<b class="arrow"></b>
          	</li>
      	</ul>
        <ul class="submenu">
            <li <?php if(in_array($_GET['service'] ,array("AdminLogManager"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=AdminLogManager" class="green"><i class="menu-icon fa fa-caret-right"></i> จัดการ Log</b></a>
          		<b class="arrow"></b>
          	</li>
      	</ul>
        <ul class="submenu">
            <li <?php if(in_array($_GET['service'] ,array("AdminAssignLevel"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=AdminAssignLevel" class="green"><i class="menu-icon fa fa-caret-right"></i> จำลองสิทธิ์หน่วยงานอื่น </b></a>
          		<b class="arrow"></b>
          	</li>
      	</ul>
        <ul class="submenu">
            <li <?php if(in_array($_GET['service'] ,array("AdminWithdrawTransaction"))){ echo 'class="active"';} ?>>
          		<a href="index.php?service=AdminWithdrawTransaction" class="green"><i class="menu-icon fa fa-caret-right"></i> จัดการรายการเบิกจ่าย </b></a>
          		<b class="arrow"></b>
          	</li>
      	</ul>
	</li>
    <?php
		}
	?>
</ul>
