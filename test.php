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
<fieldset style="border:#3083b8 2px groove;box-shadow:0 0 10px #999; background-color:#f1f1f1; width:700px;margin-top:15px;margin-left:0px;margin-right:5px;font-size:13px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
<div style="padding:0px;width:550px;background-image: linear-gradient(to bottom, #e9e9e9 50%, #bcbaba 100%);border-radius: 10px;-moz-border-radius:10px;-webkit-border-radius:10px;border: 1px solid LightGrey;margin-left:0px; margin-right:0px;margin-top:4px;margin-bottom:0px;line-height:1.6;white-space:normal;">
<h1 id="web-audio-peak-meters" style="color:#00aee8;font: 18pt arial, sans-serif;font-weight:bold; text-shadow: 0.25px 0.25px gray;">test</h1>
<h1>The input element</h1>
<html>
<body>

<form method="post" action="">
  File Root : <input type="text" name="froot">
  File Name : <input type="text" name2="fname">
  <input type="submit">
<?php
  // match all files that have either .html or .php extension
$file_matcher = realpath(dirname(__FILE__)) . '/etc/svxlink/*.{conf}';

foreach( glob($file_matcher, GLOB_BRACE) as $file ) {
  $file_name = basename($file);
  $select .= "<option value='$file'>$file_name</option>\n";
}
?>
<!--  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $filename = $_POST['froot']."/".$_POST['fname'];
  if (empty($filename)) {
    echo "Name is empty";
  } else {
    echo $filename;
  }
}
?>-->
</form>



</body>
</html>
<form action="">
  <label for="file">File name:</label>
  <input type="text" id="file" name="file"><br><br>
  <?php 
$file = "filename";
if (fopen($file,'r'))
      {
  
        $config = parse_ini_file($file,true,INI_SCANNER_RAW);
        print_r($config);
      };

//include(__DIR__."/include/editor.php");
?>
</form>

<p>Click the "Submit" button and the form-data will be sent to a page on the 
server called "editor.php".</p>



 
</div>
</fieldset>
</body>
<footer>

<?php include(__DIR__."/include/buttons.php");?>
</footer>
