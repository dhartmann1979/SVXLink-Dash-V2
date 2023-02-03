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
echo ($src."\n\r");
echo ($dest."\n\r");
echo exec("whoami")."\n\r";



exec("sudo cp '$src' '$dest'",$output,$return_var);
var_dump($output, $return_var);

$filename = fopen("/var/www/html/include/svxlink.txt", "r");
$members = array();

while (!feof($file)) {
   $members[] = fgets($filename);
}

fclose($filename);

var_dump($members);
?>
</html>
