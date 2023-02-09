<?php
$progname = basename($_SERVER['SCRIPT_FILENAME'],".php");
include_once __DIR__.'/config.php';         
include_once __DIR__.'/tools.php';        
include_once __DIR__.'/functions.php';

$svxConfigFile = '/etc/svxlink/svxlink.conf';
    if (fopen($svxConfigFile,'r'))
       { $svxconfig = parse_ini_file($svxConfigFile,true,INI_SCANNER_RAW);  
        $callsign = $svxconfig['ReflectorLogic']['CALLSIGN'];
        $fmnetwork =$svxconfig['ReflectorLogic']['FMNET'];
        $tgUri = $svxconfig['ReflectorLogic']['TG_URI'];
} else {
    $callsign = "NOCALL";
    $fmnetwork = "Not Registered";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" lang="en">
<head>
    <meta name="robots" content="index" />
    <meta name="robots" content="follow" />
    <meta name="language" content="English" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="generator" content="SVXLink" />
    <meta name="Author" content="G4NAB, SP2ONG, SP0DZ" />
    <meta name="Description" content="Dashboard for SVXLink by G4NAB, SP2ONG, SP0DZ" />
    <meta name="KeyWords" content="SVXLink,G4NAB, SP2ONG, SP0DZ" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
<link rel="shortcut icon" href="images/favicon.ico" sizes="16x16 32x32" type="image/png">

<?php echo ("<title>" . $callsign ." ". $fmnetwork . " Dashboard</title>"); ?>

<?php include_once "include/browserdetect.php"; ?>
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/functions.js"></script>
    <script type="text/javascript" src="scripts/pcm-player.min.js"></script>
    <script type="text/javascript">
      $.ajaxSetup({ cache: false });
    </script>
    <link href="css/featherlight.css" type="text/css" rel="stylesheet" />
    <script src="scripts/featherlight.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body style="background-color: #e1e1e1;font: 11pt arial, sans-serif;">
<center>
<fieldset style="box-shadow:5px 5px 20px #999; background-color:#f1f1f1; width:0px;margin-top:15px;margin-left:0px;margin-right:5px;font-size:13px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
<div class="container"> 
<div class="header">
<div class="parent">
    <div class="img" style="padding-left:30px"><img src="images/svxlink.ico" /></div>
    <div class="text"style="padding-right:230px">
<center><p style="margin-top:5px;margin-bottom:0px;">
<span style="font-size: 32px;letter-spacing:4px;font-family: &quot;sans-serif&quot;, sans-serif;font-weight:500;color:PaleBlue"><?php echo $callsign; ?></span>
<p style="margin-top:0px;margin-bottom:0px;">
<span style="font-size: 18px;letter-spacing:4px;font-family: &quot;sans-serif&quot;, sans-serif;font-weight:500;color:PaleBlue"><?php echo $fmnetwork; ?></span>
</p></center>
</div></div>
</div>
<?php include_once __DIR__."/include/top_menu.php"; ?>
<div class="content"><center>
<div style="margin-top:8px;">
</div></center>
</div>
<?php
if (MENUBUTTON=="TOP") {
include_once __DIR__."/include/buttons.php"; 
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username"><br><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Submit">
</form>
<?php
if (!empty($_POST)) {
  // form has been submitted
}
$username = $_POST['username'];
$password = $_POST['password'];

$command = "echo $password | sudo -S whoami";
$output = exec($command);

if (trim($output) === $username) {
  // login successful
} else {
  // login failed
  echo "Incorrect username or password.";
}
?>
<?php
// configuration//
$id = $_POST['id'];
if($id="svxlink") {
    shell_exec("cd /etc/svxlink/");
    $file = "svxlink.conf";
    echo "svxlink.conf";
}
if($id="gpio") {
    shell_exec("cd /etc/svxlink/");
    $file = "gpio.conf";
    echo "gpio.conf";
}
if($id="echolink"){
    shell_exec("cd /etc/svxlink/svxlink.d/");
    $file = "ModuleEchoLink.conf";
    echo "EchoLink.conf";
}
if($if="metarinfo"){
    shell_exec("cd /etc/svxlink/svxlink.d");
    $file = "ModuleMetarInfo.conf";
    echo "metarinfo.conf";
}
// check if form has been submitted
//$filename = by choice;

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."editor.php";
if (isset($_POST['text']))
{
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<!-- HTML form -->
<form action="/include/editor.php" method="post">
<textarea name="text"><?php echo htmlspecialchars($text); ?></textarea>
<input type="submit" />
<input type="reset" />
</form>
<?php
$fi = fopen($file, 'r');
explode("\n", fread($fi, filesize($fi)));
print_r($fi, true);
echo '<table style="margin-bottom:0px;border:0; border-collapse:collapse; cellspacing:0; cellpadding:0; background-color:#f1f1f1;"><tr style="border:none;background-color:#f1f1f1;">';
echo '<td width="200px" valign="top" class="hide" style="height:auto;border:0;background-color:#f1f1f1;">';
echo '<div class="nav" style="margin-bottom:1px;margin-top:1px;">'."\n";

echo '<script type="text/javascript">'."\n";
echo 'function reloadStatusInfo(){'."\n";
echo '  $("#statusInfo").load("include/status.php",function(){ setTimeout(reloadStatusInfo,3000) });'."\n";
echo '}'."\n";
echo 'setTimeout(reloadStatusInfo,3000);'."\n";
echo '$(window).trigger(\'resize\');'."\n";
echo '</script>'."\n";
echo '<div id="statusInfo" style="margin-bottom:30px;">'."\n";
include 'include/status.php';
echo '</div>'."\n";
echo '</div>'."\n";
echo '</td>'."\n";

echo '<td valign="middle"  style="height:495px; width=620px; text-align: center; border:none;  background-color:#f1f1f1;">';
echo '<iframe src="/nodeInfo"  style="width:615px; height:490px"></iframe>';
echo '</td>';
?>
