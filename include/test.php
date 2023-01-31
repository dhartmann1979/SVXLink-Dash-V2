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
$nodeInfoFile = SVXCONFPATH . nodeInfo;

$object=file_get_contents($nodeInfoFile);
$decoded = json_decode($object, true);
?>
<td><?= $decoded['nodeLocation']['hidden']['sysop']['qth']['name'] ; ?>;</td>
<td><?= $decoded['pos']['lat']['long']['loc']; ?></td>
<td><?= $decoded['rx']['K']['name']['freq']['sqlType']['ant']['comment']['height']['dir']; ?> </td>
<td><?= $decoded['tx']['K']['name']['freq']['pwr']['ant']['comment']['height']['dir']['gain']['Antenna_Type']; ?></td>
<table>
<tr> Location : <td><?= $decoded['nodeLocation']; ?> SYSOP : <?= $decoded['sysop']; ?></td> </tr>
<tr> Coordinates : <td><?= $decoded['pos']['lat']['long']['loc']; ?></td>
</tr>

<tr> Receiver : <td><?= $decoded['rx']['K']['name']['freq']['sqlType']['ant']['comment']['height']['dir']; ?> </td>
</tr>

<tr> Transmitter : <td><?= $decoded['tx']['K']['name']['freq']['pwr']['ant']['comment']['height']['dir']['gain']['Antenna_Type']; ?></td>
</tr>
</table>
</body>
</html>