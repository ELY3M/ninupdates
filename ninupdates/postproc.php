<?php

require_once(dirname(__FILE__) . "/config.php");
require_once(dirname(__FILE__) . "/logs.php");
require_once(dirname(__FILE__) . "/db.php");

if($argc<3)
{
	echo("Usage:\nphp postproc.php <reportdate> <system(internal name)>\n");
	exit(1);
}

dbconnection_start();

$reportdate = mysqli_real_escape_string($mysqldb, $argv[1]);
$system = mysqli_real_escape_string($mysqldb, $argv[2]);

$query="SELECT ninupdates_reports.id FROM ninupdates_reports, ninupdates_consoles WHERE ninupdates_reports.reportdate='".$reportdate."' && ninupdates_reports.postproc_runfinished=0 && ninupdates_consoles.system='".$system."' && ninupdates_reports.systemid=ninupdates_consoles.id";
$result=mysqli_query($mysqldb, $query);
$numrows=mysqli_num_rows($result);

if($numrows==0)
{
	dbconnection_end();
	echo("Failed to find the specified report with the input system, where the postproc_runfinished flag is set to 0.\n");
	exit(2);
}

$row = mysqli_fetch_row($result);
$reportid = $row[0];

$postproc_runfinished_updateval = 1;

if(!isset($sitecfg_postproc_cmd))
{
	echo "Config for sitecfg_postproc_cmd is not set, no command will be executed.\n";
}
else
{
	$retval = 0;
	system("$sitecfg_postproc_cmd $reportdate $system", $retval);
	if($retval!==0)$postproc_runfinished_updateval = 0;
}

if($postproc_runfinished_updateval===1)
{
	$query="UPDATE ninupdates_reports SET ninupdates_reports.postproc_runfinished=1 WHERE ninupdates_reports.id=$reportid";
	$result=mysqli_query($mysqldb, $query);

	$msg = "$sitecfg_httpbase/titlelist.php?date=$reportdate&sys=$system&csv=1";
	$tmp_cmd = "echo '" . $msg . "' >> $sitecfg_workdir/lastupdates_postproc_csvurls";
	system($tmp_cmd);
}

dbconnection_end();

?>
