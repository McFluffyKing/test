<html><!--Jared Dylan Simons L38876914-->
  <head>
    <title>Add Class</title>
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
              Teacher
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="AddTeacher.php">Add Teacher</a>
              <a class="dropdown-item" href="ViewTeacher.php">View Teacher</a>
              <a class="dropdown-item" href="UpdateTeacher.php">Update Teacher</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
              Class <span class="sr-only">(current)</span>
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

    <!--Html code for creating input form for Class Info-->
    <h2>Add New Class</h2>
    <div>
    <!--Selection box with options for Classes to be selected-->
      <form method="post" action="Class.php">
        Subject:<br>
        <select name="option">
          <option value="">--Select Year--</option>
          <option value="RecepYear">Reception Year</option>
          <option value="YearOne">Year One</option>
          <option value="YearTwo">Year Two</option>
          <option value="YearThree">Year Three</option>
          <option value="YearFour">Year Four</option>
          <option value="YearFive">Year Five</option>
          <option value="YearSix">Year Six</option>
        </select>
        <br>
        <br>
        Teacher:<br>
        <select name ="teach_id">
          <?php
          //This PHP code retrives the teachers info from teacher table and fetches its id(teach_id) and name
          //Both teachers first/last name then placed in selection box to be selected by user
          $sql = mysqli_query($link, "SELECT teach_id, fname, lname FROM teachers");
          while ($row = $sql->fetch_assoc()){
          echo "<option value ='{$row['teach_id']}'>{$row['fname']} {$row['lname']}</option>";
          }
          ?>
        </select>
        <br>
        <br>
        <!--Input text for number of students-->
        Number of Students:<br>
        <input type="text" name="numstudents" required>
        <br><br>
        <input type="submit" name="submit">
      </form>
    </div>
    
    <!--This PHP code takes inputed data from html feilds using (isset($_POST['submit'])) -->
    <?php
    if (isset($_POST['submit'])) {

    //Code uses '$_POST' to retrive data from html feilds according to its names
    $teachId = $_POST['teach_id'];
    $subject = $_POST['option'];
    $pupils = $_POST['numstudents'];
      
    //SQL statement 'INSERT INTO' inserts data from fields into corosponding table rows in 'lessons' table
    $sql = "INSERT INTO lessons (teacher_id,year,pupils) VALUES ('$teachId','$subject','$pupils')";
    if (mysqli_query($link, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error adding record ";
    }
      
    }
    
    //Close link to database
    $link->close();
    ?>

  
  </body>
  <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</html>