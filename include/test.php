<!DOCTYPE html>
<html>
<body>

<?php
exec("cd ~");

$jsonobj = '/etc/svxlink/node_info.json';
$fp= fopen($jsonobj, 'r',true);

if ($fp) {
   $array = explode("\n", fread($fp, filesize($jsonobj)));
    echo $array . "\n";
}
fclose($fp);
?>

</body>
</html>