<?php
include_once __DIR__.'/config.php';         
include_once __DIR__.'/tools.php';        
include_once __DIR__.'/functions.php';    
include_once __DIR__.'/tgdb.php';
$filename = "/etc/svxlink/node_info.json";    
?>
<span style="font-weight: bold;font-size:14px;">Test Activity</span>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <textarea name="fileContent"><?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $file = fopen('$filename', "w");
      fwrite($file, $_POST['fileContent']);
      fclose($file);
      $data = json_decode($_POST['fileContent'], true);
    } else {
      $file = fopen('$filename', "r");
      $content = fread($file, filesize('$filename'));
      echo $content;
      fclose($file);
      $data = json_decode($content, true);
    }
  ?></textarea>
  <input type="submit" value="Save">
</form>
