<html>
    <body>
    <?php
$json = file_get_contents("/etc/svxlink/node_info.json",false);
    
$json_array = json_decode($json, true);
    
foreach($json_array as $para) {
    $iterator = new RecursiveArrayIterator($para);
        
    traverseStructure($iterator);
    echo "================\n";
}
function traverseStructure($iterator) {
    while ( $iterator -> valid()) {
        if ($iterator -> hasChildren()) {
                traverseStructure($iterator -> getChildren());
            }
            else {
                echo $iterator -> key() . ' : ' . $iterator->current() . PHP_EOL;
            }
            $iterator->next();
    }
}


?>
</body>
</html>