<!DOCTYPE html>
<html>
<body>

<?php
include_once "include/config.php";
include_once "include/functions.php";
exec("cd ~");
$filejson = "/etc/svxlink/node_info.json";

if(file_exists('$filejson'))
{

	$filename = '$filejson';
	$data = file_get_contents($filename); //data read from json file
	print_r($data);
	$users = json_decode($data);  //decode a data

	print_r($users); //array format data printing
	 $message = "<h3 class='text-success'>JSON file data</h3>";
} else
	echo "not found";
?>

</body>
</html>