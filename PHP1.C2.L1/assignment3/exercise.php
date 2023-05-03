<?php
$input = readline("Enter a string of comma-separated words: ");

$words = explode(",", $input);

$word_to_digit = array(
    "zero" => 0,
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "four" => 4,
    "five" => 5,
    "six" => 6,
    "seven" => 7,
    "eight" => 8,
    "nine" => 9
);

$output = "";

foreach ($words as $word) {
    if (array_key_exists($word, $word_to_digit)) {
        $output .= $word_to_digit[$word];
    }
}

echo "Output: " . $output . "\n";
