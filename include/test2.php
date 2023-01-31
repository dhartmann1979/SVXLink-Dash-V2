<html>
    <body>
<?php
    $filename = "/etc/svxlink/node_info.json";
    echo $filename."\n";
    
$json = file_get_contents($filename,false);
    
$json_array = json_decode($json, true);
    
foreach($json_array as $para) {
    $iterator = new RecursiveArrayIterator($para);
        
    echo traverseStructure($iterator);
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