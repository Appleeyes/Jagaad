<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>form</title>
</head>

<body>
    <form action="create-logic.php" method="POST">
        <h1 class="text-center my-4">Student Form</h1>
        <div class="container">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="John Doe">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput2" placeholder="johndoe@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Classroom</label>
                <select name="classroom" id="classroom" class="form-control">
                    <option>Select</option>
                    <option value="Backend">Backend</option>
                    <option value="Frontend">Frontend</option>
                    <option value="Fullstack">FullStack</option>
                    <option value="Analytics">Analytics</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput4" class="form-label">Your Grade</label>
                <input type="number" name="grade" class="form-control" id="exampleFormControlInput4" placeholder="enter your grade(must contain number)">
            </div>
            <button class="form-control" id="btn" name="submit">Submit</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>