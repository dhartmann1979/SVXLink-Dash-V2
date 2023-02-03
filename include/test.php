<!DOCTYPE html>
<html>
<body>

<h1>The input element</h1>

<form action="/action_page.php">
  <label for="filename">File name:</label>
  <input type="text" id="filename" name="filename"><br><br>
  <input type="submit" value="Submit">
</form>

<p>Click the "Submit" button and the form-data will be sent to a page on the 
server called "action_page.php".</p>

</body>
</html>

<?php
if(isset($_POST['filename'])) $var=$_POST['filename'];
$a=file_get_contents($var,false);
echo($a);
?>
</html>
