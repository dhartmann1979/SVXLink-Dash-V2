<?php

// configuration//



// check if form has been submitted
//$filename = "/etc/svxlink/gpio.conf";
$filename = $_POST['fname'];
$fileroot = $_POST['froot'];
$url = '/edit/'.$filename;
{
    exec("cd " . $fileroot);
    // save the text contents
    file_put_contents($filename, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    //exit();
}

// read the textfile
$text = file_get_contents($filename);

?>
<!-- HTML form -->
<form action="" method="post">
<textarea name="text"><?php echo htmlspecialchars($text); ?></textarea>
<input type="submit" />
<input type="reset" />
</form>
<?php
$fi = fopen($filename, 'r');
explode("\n", fread($fi, filesize($fi)));
print_r($fi, true);

?>
