<!DOCTYPE html>
<html>
<body>

<?php
exec("cd ~");

$jsonobj = '/etc/svxlink/node_info.json';
$file = fopen($jsonobj, 'r');
while (!feof($file)) {
    $line_of_text = fgets($file);
    $members = explode('\n', $line_of_text);
}
fclose($file);
?>

</body>
</html>