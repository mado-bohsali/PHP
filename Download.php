<?php

$filePath = 'https://people.sc.fsu.edu/~jburkardt/data/csv/addresses.csv';
header('Content-Type: text-csv');
header('Content-Length: ' . filesize($filePath));
header(sprintf('Content-Disposition: attachment; filename="%s"',basename($filePath))); //returns last component within filepath
readfile($filePath); //output file name