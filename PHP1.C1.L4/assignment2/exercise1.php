<?php

// Prompt user for input
echo "Input a sentence for the file: ";
$input = readline();

// Open file for writing
$file = fopen("test.txt", "w");

// Write input to file
fwrite($file, $input);

// Close file
fclose($file);

// Print success message
echo "The file test.txt created successfully!\n";
