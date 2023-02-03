<!DOCTYPE html>
<html>
<body>

<h1>The input element</h1>

<form action="#">
  <label for="filename">File name:</label>
  <input type='hidden' name='var' value='<?php echo "$var";?>'/> 

</form>

<p>click 'submit' </p>

</body>
</html>

<?php
exec("sudo cp /etc/svxlink/svxlink.conf /var/www/html/include/svxlink.txt");
exec("echo COMPLETE");
//if(isset($_POST['filename'])) $var=$_POST['filename'];
$a=file_get_contents($var,false);
echo($a);
?>
</html>
