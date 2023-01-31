<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

<?php
//include_once "include/functions.php";



exec("cd ~");
define("SVXCONFPATH", "/etc/svxlink/");
define("nodeInfo", "node_info.json");
$nodeInfoFile = SVXCONFPATH.nodeInfo;
echo $nodeInfoFile;

$object=file_get_contents($nodeInfoFile);
$decoded = json_decode($object, true);
?>
<td><?$decoded['nodeLocation']['hidden']['sysop']['qth']['name'] ; ?>;</td>
<td><?$decoded['pos']['lat']['long']['loc']; ?></td>
<td><?$decoded['rx']['K']['name']['freq']['sqlType']['ant']['comment']['height']['dir']; ?> </td>
<td><?$decoded['tx']['K']['name']['freq']['pwr']['ant']['comment']['height']['dir']['gain']['Antenna_Type']; ?></td>
<table>
<tr> Location : <$= $decoded['nodeLocation'];?>  SYSOP : <$= $decoded['sysop']; ?></tr>
<tr> Coordinates : ?lat? : ?long?   </tr>
<tr> Receiver : ?rx? : ?freq? : ?ant?</tr>
<tr> Transmitter : ?tx? : ?name? : ?freq? MHz: ?Antenna_Type? : ?pwr? Watts</tr>
</table>
</body>
</html>