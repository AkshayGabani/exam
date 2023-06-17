<?php

    include('config.php');

    $helper = new Config();

    $sub_btn = @$_POST['submit'];

    if(isset($sub_btn)) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $course = $_POST['course'];

        $helper->insert($name,$age,$course);
    }

    $stud_data = $helper->fetch_all_data();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script>
        function validateForm() {
            var name = document.forms["myForm"]["name"].value;
            var age = document.forms["myForm"]["age"].value;
            var course = document.forms["myForm"]["course"].value;

            if (name == "" || age == "" || course == "") {
                alert("Field must be filled out");
                return false;
            }
        }
    </script>
</head>
<body>
    <form action="index.php" method="POST" name="myForm" onsubmit="return validateForm()">
        <div class="Container">
            <center><h1>Course Details</h1></center>
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter Your Name"> <br>
            <label for="age" class="form-label">Age</label>
            <input type="number" name="age" id="" class="form-control" placeholder="Enter the Age"> <br>
            <label for="course" class="form-label">Course</label>
            <input type="text" name="course" id="" class="form-control" placeholder="Enter the Course"> <br> <br>
            <center> <input type="submit" value="Submit" name="submit" class="btn btn-success" method="POST"></center> <br> <br> <br>

            <center><h1>Student Details</h1></center>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Course</th>
                <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <?php while($stud = mysqli_fetch_array($stud_data)) {?>
                <tbody>
                    <tr>
                        <th scope="row"> <?php echo $stud['id'] ?> </th>
                        <td> <?php echo $stud['name'] ?> </td>
                        <td> <?php echo $stud['age'] ?> </td>
                        <td> <?php echo $stud['course'] ?> </td>
                        <form action="index.php"></form>
                    </tr>
                </tbody>
            <?php }?>
            </table>
        </div>
    </form>
</body>
</html>
