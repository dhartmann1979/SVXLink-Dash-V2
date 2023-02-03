<!DOCTYPE html>
<html>
<body>

<h1>Working</h1>





</body>
</html>
<?php
global $variable;



$variable= shell_exec("sudo cp /etc/svxlink/svxlink.conf /var/www/html/include/svxlink.txt | ls -l /var/www/html/include/");
echo "<pre>$variable</pre>";
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
