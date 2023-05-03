<?php
// Function to generate an array of random integers
function generateRandomArray($numElements) {
  $arr = array();
  for ($i = 0; $i < $numElements; $i++) {
    $arr[] = rand(1, 100);
  }
  return $arr;
}

// Bubble Sort function
function bubbleSort($arr) {
  $n = count($arr);
  for ($i = 0; $i < $n-1; $i++) {
    for ($j = 0; $j < $n-$i-1; $j++) {
      if ($arr[$j] > $arr[$j+1]) {
        // Swap elements
        $temp = $arr[$j];
        $arr[$j] = $arr[$j+1];
        $arr[$j+1] = $temp;
      }
    }
  }
  return $arr;
}

// Prompt user for input
$numElements = readline("Enter the number of elements to generate: ");

// Generate random array of integers
$arr = generateRandomArray($numElements);

// Display unsorted array
echo "Unsorted Array:\n";
echo "[" . implode(", ", $arr) . "]\n\n";

// Sort array using Bubble Sort
$arr = bubbleSort($arr);

// Display sorted array
echo "Sorted Array:\n";
echo "[" . implode(", ", $arr) . "]\n";
?>
