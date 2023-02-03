<!DOCTYPE html>
<html>
<body>

<h1>The input element</h1>

<form action="#" method="post">
    <input type="text" value="<?php echo $var?>" name="var" />
    <input type="submit" value="Send" />
</form>

<p>click 'submit' </p>

</body>
</html>
<?php

$var = $_POST['var'];
echo $var;


$var= shell_exec("sudo cp /etc/svxlink/svxlink.conf /var/www/html/include/svxlink.txt");
echo shell_exec("echo COMPLETE");
//if(isset($_POST['filename'])) $var=$_POST['filename'];
$a=file_get_contents($var,false);
echo($a);
?>
</html>
