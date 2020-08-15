<?php
include("/Users/mohamad.elbohsaly/Downloads");

//Reads entire file into a string
//Not suitable for large files - instead it allocates maxlen in RAM
echo file_get_contents("/Users/mohamad.elbohsaly/Downloads/Order-Details");

$fileResource = fopen("/Users/mohamad.elbohsaly/Downloads/Order-Details", 'r');

if ($fileResource === false) {
    exit(sprintf('Cannot read [%s] file.', __DIR__."Order-Details"));
}

$iterations = 0;
$readingLength = 64;

while(!feof($fileResource)) {
    $iterations++;
    $chunk = fread($fileResource, $readingLength);

    $line = fgets($fileResource); //1 line at a time

    echo $chunk;
}

fclose($fileResource);
echo sprintf("\n%d iteration(s)", $iterations);


?>