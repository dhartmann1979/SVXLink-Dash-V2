<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    
    <link href="/css/css.php" type="text/css" rel="stylesheet" />
<style type="text/css">
body {
  background-color: #eee;
  font-size: 18px;
  font-family: Arial;
  font-weight: 300;
  margin: 2em auto;
  max-width: 40em;
  line-height: 1.5;
  color: #444;
  padding: 0 0.5em;
}
h1, h2, h3 {
  line-height: 1.2;
}
a {
  color: #607d8b;
}
.highlighter-rouge {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: .2em;
  font-size: .8em;
  overflow-x: auto;
  padding: .2em .4em;
}
pre {
  margin: 0;
  padding: .6em;
  overflow-x: auto;
}

#player {
    position:relative;
    width:205px;
    overflow: hidden;
    direction: ltl;
}

textarea {
    background-color: #111;
    border: 1px solid #000;
    color: #ffffff;
    padding: 1px;
    font-family: courier new;
    font-size:10px;
}




</style>
</head>
<body style="background-color: #e1e1e1;font: 11pt arial, sans-serif;">
<center>
<fieldset style="border:#3083b8 2px groove;box-shadow:0 0 10px #999; background-color:#f1f1f1; width:555px;margin-top:15px;margin-left:0px;margin-right:5px;font-size:13px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
<div style="padding:0px;width:550px;background-image: linear-gradient(to bottom, #e9e9e9 50%, #bcbaba 100%);border-radius: 10px;-moz-border-radius:10px;-webkit-border-radius:10px;border: 1px solid LightGrey;margin-left:0px; margin-right:0px;margin-top:4px;margin-bottom:0px;line-height:1.6;white-space:normal;">
<center>
<h1 id="node_info" style="color:#00aee8;font: 18pt arial, sans-serif;font-weight:bold; text-shadow: 0.25px 0.25px gray;">Node Info Configurator</h1>


<?php
include_once('include/functions.php');
/*
//$svxConfigFile = '/etc/svxlink/svxlink.conf';
$nodeInfoFile = '/etc/svxlink/node_info.json';?>
<!--<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <textarea name="fileContent"><?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $file = fopen("data.json", "w");
      fwrite($file, $_POST['fileContent']);
      fclose($file);
      $data = json_decode($_POST['fileContent'], true);
    echo $data . "1";
    } else {
      $file = fopen("data.json", "r");
      $content = fread($file, filesize("data.json"));
      echo $content;
      fclose($file);
      $data = json_decode($content, true);
    echo $data. "2";
    }
    $retval = null;
    $screen = null;

$nodeInfo["Location"] = $_POST['inLocation']; 
$nodeInfo["Locator"] = $_POST['inLocator'];
$nodeInfo["SysOp"] = $_POST['inSysOp'];
$nodeInfo["LAT"] = $_POST['inLAT']; 
$nodeInfo["LONG"] = $_POST['inLONG'];
$nodeInfo["RXFREQ"] = $_POST['inRXFREQ'];
$nodeInfo["TXFREQ"] = $_POST['inTXFREQ']; 
$nodeInfo["Website"] = $_POST['inWebsite'];
$nodeInfo["Mode"] = $_POST['inMode'];
$nodeInfo["Type"] = $_POST['inType']; 
$nodeInfo["Echolink"] = $_POST['inEcholink'];
$nodeInfo["nodeLocation"] = $_POST['innodeLocation'];
$nodeInfo["Compound"] = $_POST['inCompound'];
$nodeInfo["CTCSS"] = $_POST['inCTCSS'];
$nodeInfo["LinkedTo"] = $_POST['inLinkedTo'];

$jsonNodeInfo = json_encode($nodeInfo);
exec("sudo touch /var/www/html/NodeInfo/node_info.json");

file_put_contents("/var/www/html/nodeInfo/node_info.json", $jsonNodeInfo ,FILE_USE_INCLUDE_PATH);

    $retval = null;
    $screen = null;

  ?></textarea>
  <input type="submit" value="Save">
</form>-->*/
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <?php
    $file = "/etc/svxlink/node_info.json";
    $nodeInfo = json_decode(file_get_contents($file), true);
    foreach ($nodeInfo as $key => $value) {
      if (is_array($value)) {
        foreach ($value as $k => $v) {
          echo "<label>$k</label><input type='text' name='$key-$k' value='$v'><br>";
        }
      } else {
        echo "<label>$key</label><input type='text' name='$key' value='$value'><br>";
      }
    }
  ?>
  <input type="submit" name="submit" value="Save">
</form>
<!--
In the PHP code, the $file variable stores the path to the node_info.json file. 
The file_get_contents() function reads the contents of the file and returns it as a string. 
The json_decode() function is then used to convert the string into a PHP associative array. 
The resulting array is stored in the $nodeInfo variable.

The outer foreach loop iterates over each key-value pair in the $nodeInfo array. 
If the value is an array, an inner foreach loop is used to iterate over the nested elements, creating a form field for each one. 
A label with the key name is displayed, followed by a text input with the corresponding value. 
The name of each input is set to a combination of the outer key and inner key, 
separated by a hyphen, so that the values can be retrieved in the PHP code after the form is submitted.

If the value is not an array, a form field is created with the key name as the label and the value as the text input.

After the form is submitted, the PHP code can check if the $_POST['submit'] variable is not empty:-->
<?php
if (!empty($_POST['submit'])) {
  $nodeInfo = array();
  foreach ($_POST as $key => $value) {
    if (strpos($key, "-") !== false) {
      list($k, $v) = explode("-", $key);
      $nodeInfo[$k][$v] = $value;
    } else {
      $nodeInfo[$key] = $value;
    }
  }
  $json = json_encode($nodeInfo, JSON_PRETTY_PRINT);
  file_put_contents($file, $json);
  echo "Changes saved successfully.";
}
?>
<!-- In this example, the updated values are stored in the $_POST array. 
A new associative array $nodeInfo is created, which will store the updated data in the correct structure. 
The strpos() function is used to check if a hyphen is present in the key name, indicating that it's a nested value. 
If a hyphen is present, the `explode' function stores the $key -->
<!--
<?php
        

	///file manipulation section
		//archive the current config
		exec('sudo cp /etc/svxlink/node_info.json /etc/svxlink/node_info.json.' .date("YmdThis"), $screen, $retval);
		//move generated file to current config
		exec('sudo mv /var/www/html/nodeInfo/node_info.json /etc/svxlink/node_info.json', $screen, $retval);
        	//Service SVXlink restart
       	exec('sudo service svxlink restart 2>&1',$screen,$retval);



  	$inLocation = $nodeInfo["nodeLocation"];
    $inLocator = $nodeInfo["loc"]; 
    $inSysOp = $nodeInfo["sysop"];
	  $inLAT = $nodeInfo["lat"];
    $inLONG = $nodeInfo["long"]; 
    $inRXFREQ = $nodeInfo["freq"];
	  $inTXFREQ = $nodeInfo["TXFREQ"];
    $inWebsite = $nodeInfo["Website"]; 
    $inMode = $nodeInfo["Mode"];
	  $inType = $nodeInfo["Type"];
    $inEcholink = $nodeInfo["Echolink"]; 
    $innodeLocation = $nodeInfo["nodeLocation"];
	  $inSysop = $nodeInfo["Sysop"]; 
    $inCTCSS = $nodeInfo["CTCSS"];
	  $inLinkedTo = $nodeInfo["LinkedTo"];
    
?>
-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<table>
        <tr>
        <th width = "380px">Node Info Input</th>
	<th width = "100px">Action</th>
        </tr>
<tr>
<TD>

<Table style="border-collapse: collapse; border: none;">
        <tr style="border: none;">
                <th width = "30%"></th>
                <th width = "70%"></th>
        </tr>
        <tr style="border: none;"> 
        <td style="border: none;">Location
        </td>
        <td style="border: none;">
        <input type="text" name="inLocation" style="width:98%" value="<?php echo $inLocation;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">Locator</td>
        <td style="border: none;">
        <input  type="text" name="inLocator" style="width:98%" value="<?php echo $inLocator;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">SysOp</td>
        <td style="border: none;">
        <input  type="text" name="inSysOp" style="width:98%" value="<?php echo $inSysOp;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">Lat</td>
        <td style="border: none;">
        <input  type="text" name="inLAT" style="width:98%" value="<?php echo $inLAT;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">Long</td>
        <td style="border: none;">
        <input  type="text" name="inLONG" style="width:98%" value="<?php echo $inLONG;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">Rx Freq</td>
        <td style="border: none;">
        <input  type="text" name="inRXFREQ" style="width:98%" value="<?php echo $inRXFREQ;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">Tx Freq</td>
        <td style="border: none;">
        <input  type="text" name="inTXFREQ" style="width:98%" value="<?php echo $inTXFREQ;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">Website</td>
        <td style="border: none;">
        <input  type="text" name="inWebsite" style="width:98%" value="<?php echo $inWebsite;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">Mode</td>
        <td style="border: none;">
        <input  type="text" name="inMode" style="width:98%" value="<?php echo $inMode;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">Type</td>
        <td style="border: none;">
        <input  type="text" name="inType" style="width:98%" value="<?php echo $inType;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">EchoLink</td>
        <td style="border: none;">
        <input  type="text" name="inEcholink" style="width:98%" value="<?php echo $inEcholink;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">Node Location</td>
        <td style="border: none;">
        <input  type="text" name="innodeLocation" style="width:98%" value="<?php echo $innodeLocation;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">Sysop</td>
        <td style="border: none;">
        <input  type="text" name="inSysop" style="width:98%" value="<?php echo $inSysop;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">Compound</td>
        <td style="border: none;">
        <input  type="text" name="inCompound" style="width:98%" value="<?php echo $inCompound;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">LinkedTo</td>
        <td style="border: none;">
        <input  type="text" name="inLinkedTo" style="width:98%" value="<?php echo $inLinkedTo;?>">
        </td></tr>
        <tr style="border: none;"> 
        <td style="border: none;">CTCSS</td>
        <td style="border: none;">
        <input  type="text" name="inCTCSS" style="width:98%" value="<?php echo $inCTCSS;?>">
        </td></tr>
    </table>
</td>
<td> 
	<button name="btnSave" type="submit" class="red" style="height:100px; width:105px; font-size:12px;">Save <BR><Br> & <BR><BR> ReLoad</button>
</td>
</tr>
</table>


</form>

<p style="margin: 0 auto;"></p>
<p style="margin-bottom:-2px;"></p>

</body>
</html>
