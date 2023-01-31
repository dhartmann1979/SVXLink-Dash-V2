<html>
    <body>
    <?php
$json = file_get_contents("/etc/svxlink/node_info.json",false);
$json_array = json_decode($json, true);
foreach($json_array as $id=>$para)
{
    foreach($para as $key=>$value)
    {
        if(is_array($value))
        {
            foreach($value as $subkey=>$subvalue)
            {
                    echo $subkey . " : " . $subvalue . "\n";
            }
        }
        else
        {
                echo $key . " : " . $value . "\n";
        }
    }
        echo "=================================\n";
}
?>
</body>
</html>