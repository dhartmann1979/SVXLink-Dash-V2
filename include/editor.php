<?php

// configuration//
if 



// check if form has been submitted
//$filename = "/etc/svxlink/gpio.conf";
$file = $_POST['fname'];
$fileroot = $_POST['froot'];
$url = '/edit/'.$file;
{
    shell_exec("cd " . $fileroot);
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    //exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<!-- HTML form -->
<form action="" method="post">
<textarea name="text"><?php echo htmlspecialchars($text); ?></textarea>
<input type="submit" />
<input type="reset" />
</form>
<?php
$fi = fopen($file, 'r');
explode("\n", fread($fi, filesize($fi)));
print_r($fi, true);

?>
