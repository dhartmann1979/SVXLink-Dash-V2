<!DOCTYPE html>
<html>
<body>

<?php
exec("cd ~");
$jsonobj = '/etc/svxlink/node_info.json';
 
var_dump(json_decode($jsonobj, true));
?>

</body>
</html>