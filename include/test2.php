<html>
    <body>
    <?php
$getjson = file_get_contents("/etc/svxlink/node_info.json");
$getjson_array = json_decode($getjson, true);
function traverseGeoJSON($iterator) {
    while ( $iterator -> valid() ) {
        if ($iterator->hasChildren())
            traversegeoJSON($iterator->getChildren());
        elseif ($iterator->key() === "name")
            echo $iterator->current() . PHP_EOL;
        $iterator->next();
        }
}
foreach($geoJSON_array as $location)
{
    $iterator = new RecursiveArrayIterator($location);
    traverseGeoJSON($iterator);
}
?>
</body>
</html>