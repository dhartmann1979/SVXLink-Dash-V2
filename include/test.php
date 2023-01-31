<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

<?php
//include_once "include/functions.php";



exec("cd ~");
define("SVXCONFPATH", "/etc/svxlink/");
define("nodeInfo", "node_info.json");
$nodeInfoFile = SVXCONFPATH.nodeInfo;
echo $nodeInfoFile;

$object=file_get_contents($nodeInfoFile);
$decoded = json_decode($object, true);
var_dump($decoded);  ?>

</body>
</html>