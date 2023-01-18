<!DOCTYPE html>
<html>
<body>

<?php
include_once "include/functions.php";

exec("cd ~");
define("SVXCONFPATH", "/etc/svxlink/");
define("nodeInfo", "node_info.json");
echo SVXCONFPATH;
echo nodeInfo."\n";
$nodeInfoFile = SVXCONFPATH.nodeInfo;


if(fopen($nodeInfoFile,'r'))
{
	$filedata = file_get_contents($nodeInfoFile); //data read from json file
	print_r($filedata);
	echo ("stage one \n");
	$nodeInfo = json_decode($filedata,true);  //decode a data

	print_r($nodeInfo); //array format data printing
	echo ("stage two \n");
	echo build_ini_string(array($nodeInfo));

	 $message = "<h3 class='text-success'>JSON file data</h3>";
} else
	echo "not found";
?>

</body>
</html>