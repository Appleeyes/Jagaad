<?php
// Prompt user for grade
$grade = readline("Enter your grade (out of 100): ");

// Calculate percentage score based on number of credits
$percentage = ($grade / 100) * 12;

// Determine letter grade based on grading scale
if ($grade >= 90) {
  $letter_grade = "A";
} elseif ($grade >= 80) {
  $letter_grade = "B";
} elseif ($grade >= 70) {
  $letter_grade = "C";
} elseif ($grade >= 60) {
  $letter_grade = "D";
} else {
  $letter_grade = "F";
}

// Output message with results
echo "Your grade of $grade corresponds to a letter grade of $letter_grade and a percentage score of " . number_format($percentage, 2) . "%.";
