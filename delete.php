<?php
// delete.php

// Function to retrieve student data from the JSON file
function getStudentsFromFile()
{
    $data = file_get_contents('students.json');
    return json_decode($data, true);
}

// Function to save student data to the JSON file
function saveStudentsToFile($students)
{
    $data = json_encode($students, JSON_PRETTY_PRINT);
    file_put_contents('students.json', $data);
}

// Check if the registration number is provided in the URL
if (isset($_GET['registration_number'])) {
    $registrationNumber = $_GET['registration_number'];

    // Retrieve all students
    $students = getStudentsFromFile();

    // Find the index of the student in the students array
    $index = null;
    foreach ($students as $key => $student) {
        if ($student['registration_number'] === $registrationNumber) {
            $index = $key;
            break;
        }
    }

    if ($index !== null) {
        // Remove the student from the students array
        unset($students[$index]);

        // Re-index the array to maintain sequential keys
        $students = array_values($students);

        // Save the updated students array back to the JSON file
        saveStudentsToFile($students);

        // Redirect back to index page with success message
        header("Location: index.php?message=Student deleted successfully.");
        exit();
    } else {
        // Redirect back to index page with error message
        header("Location: index.php?error=Student not found.");
        exit();
    }
} else {
    // Redirect back to index page with error message
    header("Location: index.php?error=Registration number not provided.");
    exit();
}
