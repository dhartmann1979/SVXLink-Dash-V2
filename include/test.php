<!DOCTYPE html>
<html>
<body>

<h1>Working</h1>





</body>
</html>
<?php
global $var;



$var= shell_exec("sudo cp /etc/svxlink/svxlink.conf /var/www/html/include/svxlink.txt");
echo "<pre>$var</pre>";
echo "complete";
$filename = fopen("include/svxlink.txt", "r");
$members = array();

while (!feof($file)) {
   $members[] = fgets($filename);
}

fclose($filename);

var_dump($members);
?>
</html>
