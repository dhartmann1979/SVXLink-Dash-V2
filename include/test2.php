<html>
    <body>
    <?php
$json = file_get_contents("/etc/svxlink/node_info.json",false);
    echo '$json';
$json_array = json_decode($json, true);
    echo '$json_array';
foreach($json_array as $para) {
    $iterator = new RecursiveArrayIterator($para);
        echo '$iterator';
    traverseStructure($iterator);
    echo "================\n";
}
function traverseStructure($iterator){
    while ( $iterator -> valid()){
        if ($iterator -> hasChildren()) {
                traverseStructure($iterator->getChildren());
            }
            else {
                echo $iterator->key() . ' : ' . $iterator;
            }
            $iterator->next();
    }
}


?>
</body>
</html>