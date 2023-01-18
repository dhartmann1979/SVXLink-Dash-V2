<!DOCTYPE html>
<html>
<body>

<?php
exec("cd ~");

$jsonobj = '/etc/svxlink/node_info.json';
echo $jsonobj;
$j = fopen($jsonobj, 'r');
var_dump(json_decode($jsonobj, true));
echo "$j";
?>

</body>
</html>