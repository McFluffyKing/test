<html><!--Jared Dylan Simons L38876914-->
  <head>
    <title>Add Teacher</title>
    <!--Style tag to allow php to include CSS-->
    <style>
    <?php include "styles.css" ?>
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body><!--Navbar with tabs that link to each page-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Rishton Academy Primary School</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
              Student
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="StudentAdd.php">Add Student</a>
              <a class="dropdown-item" href="ViewStudent.php">View Student</a>
              <a class="dropdown-item" href="UpdateStudent.php">Update Student</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
              Parent
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="AddParent.php">Add Parent</a>
              <a class="dropdown-item" href="ViewParent.php">View Parent</a>
              <a class="dropdown-item" href="UpdateParent.php">Update Parent</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
              Teacher <span class="sr-only">(current)</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="AddTeacher.php">Add Teacher</a>
              <a class="dropdown-item" href="ViewTeacher.php">View Teacher</a>
              <a class="dropdown-item" href="UpdateTeacher.php">Update Teacher</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
              Class
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="Class.php">Add Class</a>
              <a class="dropdown-item" href="ViewClass.php">View Class</a>
              <a class="dropdown-item" href="UpdateClass.php">Update Class</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <?php

    //This code connects page to database 'school'
    $link = mysqli_connect("localhost", "root", "", "school");
    
    if ($link === false) {
        die("Connection failed: ");
    }
    ?>

    <!--Html code for creating input form for Teachers Info-->
    <h2>Add New Teacher</h2>
    <div>
      <form method="post" action="AddTeacher.php">
        Name:<br>
        <input type="text" name="firstname" required>
        <br>
        <br>
        Surname:<br>
        <input type="text" name="lastname" required>
        <br>
        <br>
        Contact No:<br>
        <input type="text" name="contact" required>
        <br>
        <br>
        Email:<br>
        <input type="text" name="email" required>
        <br>
        <br>
        Address:<br>
        <input type="text" name="address" required>
        <br>
        <br>
        Background Check:<br>
        <input type="text" name="back" required>
        <br>
        <br>
        <input type="submit" name="submit" value="Add">
      </form>
    </div>
    
    <!--This PHP code takes inputed data from html feilds using (isset($_POST['submit'])) -->
    <?php
    if (isset($_POST['submit'])) {

      //Code uses '$_POST' to retrive data from html feilds according to its names
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $back = $_POST['back'];
      
    //SQL statement 'INSERT INTO' inserts data from fields into corosponding table rows in 'teachers' table
    $sql = "INSERT INTO teachers (fname,lname,contact,email,address,backgroundcheck) VALUES ('$fname','$lname','$contact','$email','$address','$back')";
    if (mysqli_query($link, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error adding record ";
    }
      
    }
    
    //closes link to database
    $link->close();
    ?>
  </body>
  <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</html>