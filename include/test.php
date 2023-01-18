<!DOCTYPE html>
<html>
<body>

<?php
include_once 'include/functions.php';
exec("cd ~");

$nodeInfoFile = "/etc/svxlink/node_info.json";
if(file_exists($nodeInfoFile))
{
	if (fopen($nodeInfoFile,'r'))
{
	$filedata = file_get_contents($nodeInfoFile);
    print_r($filedata);
	$nodeInfo = json_decode($filedata,true);
    print_r($nodeInfo);
 echo build_ini_string(array($nodeInfo));

};
	echo $nodeInfo[0];
	echo $nodeInfo[1];
	echo $nodeInfo[2];
	echo $nodeInfo[3];
	echo $nodeInfo[4];
	echo $nodeInfo[5];
	echo $nodeInfo[6];
	echo $nodeInfo[7];
	echo $nodeInfo[8];

	 $message = "<h3 class='text-success'>JSON file data</h3>";
}
?>

</body>
</html>