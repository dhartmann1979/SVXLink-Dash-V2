<!DOCTYPE html>
<html>
<body>

<?php
exec("cd ~");

$jsonobj = "/etc/svxlink/node_info.json";
if(file_exists($jsonobj))
{
	$filename = $jsonobj;
	$data = file_get_contents($filename); //data read from json file
	print_r($data);
	$users = json_decode($data);  //decode a data

	print_r($users); //array format data printing
	 $message = "<h3 class='text-success'>JSON file data</h3>";
}
?>

</body>
</html>