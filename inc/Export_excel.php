$strExcelFileName="Member-All.xls";
05.
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
06.
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
07.
header("Pragma:no-cache");