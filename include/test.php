<!DOCTYPE html>
<html>
<body>

<h1>Working</h1>





</body>
</html>
<?php
global $variable;
$src = "/etc/svxlink/svxlink.conf";
$dest = "var/www/html/include/svxlink.txt";
echo ($src);
echo ($dest);



exec("sudo cp '$src' '$dest'",$output,$return_var);
var_dump($output, $return_var);

$filename = fopen($dest, "r");
$members = array();

while (!feof($file)) {
   $members[] = fgets($filename);
}

fclose($filename);

var_dump($members);
?>
</html>
