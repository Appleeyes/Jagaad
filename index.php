<?php
// Function to retrieve student data from the JSON file
function getStudentsFromFile()
{
    $filePath = 'students.json';
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
// Get student data from the JSON file
$students = getStudentsFromFile();

// Check if there is an error message or success message in the URL
$error = isset($_GET['error']) ? $_GET['error'] : null;
$message = isset($_GET['message']) ? $_GET['message'] : null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Student Data</title>
</head>

<body>
    <div class="contain">
        <h1 class="text-center my-4">Student Management System</h1>
        <?php if ($error) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if ($message) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <?php
        echo '<table class="table table-success table-striped">';
        if (count($students) > 0) {
            echo '<tr>
                <th>Reg. Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Classroom</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>';
            foreach ($students as $student) {
                echo '<tr>
                <td>' . $student['registration_number'] . '</td>
                <td>' . $student['name'] . '</td>
                <td>' . $student['email'] . '</td>
                <td>' . $student['classroom'] . '</td>
                <td>' . $student['grade'] . '</td>
                <td>
                <a href="edit.php?registration_number=' . $student['registration_number'] . '"><i class="fa-solid fa-pencil"></i></a>
                <a href="delete.php?registration_number=' . $student['registration_number'] . '"><i class="fa-regular fa-trash-can"></i></a>
                </td>     
            </tr>';
            }
        } else {
            echo '<td>No student data available.</td>';
        }
        echo '</table>';
        ?>
        <form action="create.php">
            <button class="form-control" id="btn" name="submit">Add Student</button>
        </form>
    </div>


    <script src="https://kit.fontawesome.com/47027db1aa.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>