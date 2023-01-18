<!DOCTYPE html>
<html>
<body>

<?php
include_once 'include/functions.php';
exec("cd ~");
echo "testing\n";
$nodeInfoFile = "/etc/svxlink/node_info.json";
if(file_exists($nodeInfoFile))
{
	if (fopen($nodeInfoFile,'r'))
{
	$filedata = file_get_contents($nodeInfoFile);
    print_r($filedata);
	$nodeInfo = json_decode($filedata,true);
    print_r($nodeInfo);
 	build_ini_string(array($filedata));

};
	var_dump($nodeInfo);

	echo "<h3 class='text-success'>JSON file data</h3>";
}
?>

</body>
</html>