<?php

// File path for storing student data
$filePath = 'students.json';

// Function to save student data to a JSON file
function saveStudentsToFile($students) {
    global $filePath;
    $jsonData = json_encode($students, JSON_PRETTY_PRINT);
    file_put_contents($filePath, $jsonData);
}

// Function to retrieve student data from the JSON file
function getStudentsFromFile() {
    global $filePath;
    if (file_exists($filePath)) {
        $jsonData = file_get_contents($filePath);
        $students = json_decode($jsonData, true);
        if ($students === null) {
            $students = [];
        }
    } else {
        $students = [];
    }
    return $students;
}

// Function to generate a random registration number
function generateRegistrationNumber() {
    $prefix = 'REG';
    $suffix = rand(1000, 9999);
    return $prefix . $suffix;
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $classroom = $_POST['classroom'];
    $grade = $_POST['grade'];

    // Calculate grade as per the given ranges
    if ($grade >= 70 && $grade <= 100) {
        $grade = 'A';
    } elseif ($grade >= 60 && $grade < 70) {
        $grade = 'B';
    } elseif ($grade >= 50 && $grade < 60) {
        $grade = 'C';
    } elseif ($grade >= 45 && $grade < 50) {
        $grade = 'D';
    } elseif ($grade >= 40 && $grade < 45) {
        $grade = 'E';
    } elseif ($grade >= 0 && $grade < 39) {
        $grade = 'F';
    } else {
        $grade = 'Invalid';
    }


    // Generate registration number
    $registrationNumber = generateRegistrationNumber();

    // Create student array
    $student = [
        'registration_number' => $registrationNumber,
        'name' => $name,
        'email' => $email,
        'classroom' => $classroom,
        'grade' => $grade
    ];

    // Save student data to the JSON file
    $students = getStudentsFromFile();
    $students[] = $student;
    saveStudentsToFile($students);
}

// Redirect back to the form page with success message
header('Location: index.php?message=Student added successfully.');
exit();
