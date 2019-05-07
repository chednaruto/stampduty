<?php
	session_start();
	include("../inc/config.php");
	date_default_timezone_set("Asia/Bangkok");
	
	$UID = $_POST['UID'];
	$client = new soapclient('http://wservice.rd.go.th/ServiceEoffice/AuthenUserEofficeECAR.asmx?WSDL',array("trace"=>1,"exceptions"=>0,"cache_wsdl"=>0));
	$client->soap_defencoding = 'UTF-8';
    $client->decode_utf8 = false;
	$params = array('CheckUser' => 'ECARUser', 'CheckPass' => 'ECARPass','UID' => $UID);
	$result = $client->AuthenUser($params);
	$ret =json_encode($result);
	echo $ret;

?>