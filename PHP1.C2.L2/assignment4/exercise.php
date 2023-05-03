function countStats($filename) {
// Read the file contents
$text = file_get_contents($filename);

// Initialize counters
$wordCount = 0;
$sentenceCount = 0;
$symbolCount = 0;

// Iterate over each character in the string
for ($i = 0; $i < strlen($text); $i++) { $char=$text[$i]; // Check whether the current character is a letter, digit, space, or punctuation mark if (ctype_alnum($char)) { // If the current character is a letter or digit, increment the non-empty symbol count $symbolCount++; } elseif ($char==' ' && $i> 0 && ctype_alnum($text[$i-1])) {
    // If the current character is a space and the previous character was a letter or digit, increment the word count
    $wordCount++;
    } elseif (str_contains('.!?', $char)) {
    // If the current character is a period, exclamation mark, or question mark
    if ($i < strlen($text)-1 && !str_contains('.!?', $text[$i+1])) { // If the next character is not also a period, exclamation mark, or question mark, increment the sentence count $sentenceCount++; } } } // Check whether the last character was a letter or digit if (ctype_alnum($text[strlen($text)-1])) { $wordCount++; $symbolCount++; } // Return an array containing the word count, sentence count, and non-empty symbol count return array( 'wordCount'=> $wordCount,
        'sentenceCount' => $sentenceCount,
        'symbolCount' => $symbolCount
        );
        }