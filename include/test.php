<?php
include_once __DIR__.'/config.php';         
include_once __DIR__.'/tools.php';        
include_once __DIR__.'/functions.php';    
include_once __DIR__.'/tgdb.php';   
?>
<body style="background-color: #e1e1e1;font: 11pt arial, sans-serif;">
<center>
<fieldset style="border:#3083b8 2px groove;box-shadow:0 0 10px #999; background-color:#f1f1f1; width:555px;margin-top:15px;margin-left:0px;margin-right:5px;font-size:13px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
<div style="padding:0px;width:550px;background-image: linear-gradient(to bottom, #e9e9e9 50%, #bcbaba 100%);border-radius: 10px;-moz-border-radius:10px;-webkit-border-radius:10px;border: 1px solid LightGrey;margin-left:0px; margin-right:0px;margin-top:4px;margin-bottom:0px;line-height:1.6;white-space:normal;">
<center>
<h1 id="node_info" style="color:#00aee8;font: 18pt arial, sans-serif;font-weight:bold; text-shadow: 0.25px 0.25px gray;">Node Info Configurator</h1>

<span style="font-weight: bold;font-size:14px;">Test Activity</span>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <textarea name="fileContent"><?php
    $filename = "/etc/svxlink/node_info.json";
  echo $filename;
    if ($_SERVER['PHP_SELF'] == 'POST') {
      $file = fopen($filename, "w");
      fwrite($file, $_POST['fileContent']);
      fclose($file);
      $data = json_decode($_POST['fileContent'], true);
    } else {
      $file = fopen($filename, "r");
      $content = fread($file, filesize($filename));
      echo $content;
      fclose($file);
      $data = json_decode($content, true);
    }
  ?></textarea>
  <input type="submit" value="Save">
</form>
<table>
  <?php
    foreach ($data as $key => $value) {
      echo "<tr><td>$key</td><td>$value</td></tr>";
    }
  ?>
</table>
</center>
</div>
</fieldset>
</center>
</body>

