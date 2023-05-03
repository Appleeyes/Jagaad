<?php

// Prompt user for number of lines
echo "Input the number of lines to be written: ";
$num_lines = readline();

// Open file for writing
$file = fopen("test1.txt", "w");

// Loop through and write each line
for ($i = 1; $i <= $num_lines; $i++) {
    echo "Enter line $i: ";
    $line = readline();
    fwrite($file, $line . "\n");
}

// Close file
fclose($file);

// Display file contents
echo "The content of the file test1.txt is:\n";
echo file_get_contents("test1.txt");
