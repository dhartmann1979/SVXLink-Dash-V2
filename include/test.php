<!DOCTYPE html>
<html>
<body>

<?php
exec("cd ~");

$jsonobj = '/etc/svxlink/node_info.json';
$fp= fopen($jsonobj, 'r');

if ($fp) {
   echo explode("\n", fread($fp, filesize($jsonobj)));}
fclose($fp);
?>

</body>
</html>