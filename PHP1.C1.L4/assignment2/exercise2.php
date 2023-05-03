<?php

$filename = readline("Input the file name to be opened: ");

if (file_exists($filename)) {
  $file_content = file_get_contents($filename);
  echo "The content of the file $filename is: " . $file_content;
} else {
  echo "The file $filename does not exist.";
}
