<!DOCTYPE html>
<html>
<body>

<h1>Working</h1>





</body>
</html>
<?php




$var= shell_exec("sudo cp /etc/svxlink/svxlink.conf /var/www/html/include/svxlink.txt");
echo "<pre>$var</pre>";
$filename = "include/svxlink.txt";
//if(isset($_POST['filename'])) $var=$_POST['filename'];
$output = fopen($filename, '+');
print_r(fgets($output, true));
?>
</html>
