<?php
// edit.php

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

// Function to retrieve student by registration number
function getStudentByRegistrationNumber($registrationNumber)
{
    $students = getStudentsFromFile();
    foreach ($students as $index => $student) {
        if ($student['registration_number'] === $registrationNumber) {
            return $student;
        }
    }
    return null;
}

// Check if the registration number is provided in the URL
if (isset($_GET['registration_number'])) {
    $registrationNumber = $_GET['registration_number'];

    // Retrieve student by registration number
    $student = getStudentByRegistrationNumber($registrationNumber);

    if ($student) {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Update student data
            $student['name'] = $_POST['name'];
            $student['email'] = $_POST['email'];
            $student['classroom'] = $_POST['classroom'];
            $student['grade'] = $_POST['grade'];

            // Retrieve all students
            $students = getStudentsFromFile();

            // Find the index of the student in the students array
            $index = array_search($student, $students);

            // Update the student data in the students array
            $students[$index] = $student;

            // Save the updated students array back to the JSON file
            saveStudentsToFile($students);

            // Redirect back to index page with success message
            header("Location: index.php?message=Student edited successfully.");
            exit();
        }
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Edit Student</title>
</head>

<body>
    <form action="edit.php?registration_number=<?php echo $registrationNumber; ?>" method="POST">
        <h1 class="text-center my-4">Edit:: <?php echo $student['name']; ?></h1>
        <div class="container">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="<?php echo $student['name']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput2" value="<?php echo $student['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput4" class="form-label">Classroom</label>
                <select name="classroom" id="classroom" class="form-control">
                    <option>Select</option>
                    <option value="Backend" ' . ($student[' classroom']==='Backend' ? 'selected' : '' ) . '>Backend</option>
                    <option value="Frontend" ' . ($student['classroom']==='Frontend' ? 'selected' : '' ) . '>Frontend</option>
                    <option value="Backend" ' . ($student[' classroom']==='FullStack' ? 'selected' : '' ) . '>FullStack</option>
                    <option value="Analytics" ' . ($student['classroom']==='Analytics' ? 'selected' : '' ) . '>Analytics</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Grade</label>
                <input type="text" name="grade" class="form-control" id="exampleFormControlInput3" value="<?php echo $student['grade']; ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary data-toggle="modal" data-target="#staticBackdrop"">Save Changes</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
                <!-- Modal -->
               <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
               <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Successful!</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You are successfully signed in
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Understood</button>
                </div>
            </div>
        </div>
      </div>
            </div>
        </div>
    </form>
</body>

</html>