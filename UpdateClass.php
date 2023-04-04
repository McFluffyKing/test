<html><!--Jared Dylan Simons L38876914-->
  <head>
    <title>Update Class</title>
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
            <a class="nav-link" href="index.html">Home </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
              Student
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="StudentAdd.php">Add Student</a>
              <a class="dropdown-item" href="ViewStudent.php">View Student</a>
              <a class="dropdown-item" href="UpdateStudent.php">Update / Delete Student</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
            Parent
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="AddParent.php">Add Parent</a>
              <a class="dropdown-item" href="ViewParent.php">View Parent</a>
              <a class="dropdown-item" href="UpdateParent.php">Update / Delete Parent</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
            Teacher
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="AddTeacher.php">Add Teacher</a>
              <a class="dropdown-item" href="ViewTeacher.php">View Teacher</a>
              <a class="dropdown-item" href="UpdateTeacher.php">Update / Delete Teacher</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
            Class <span class="sr-only">(current)</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="Class.php">Add Class</a>
              <a class="dropdown-item" href="ViewClass.php">View Class</a>
              <a class="dropdown-item" href="UpdateClass.php">Update / Delete Class</a>
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
        
    <!--Html code for creating Table containing data entries from class table in database-->
    <h3>Update Classes</h3>
		<table>
		
			<tr>
				<th width="150px">Class ID<br><hr></th>
        <th width="150px">Teacher ID<br><hr></th>
				<th width="250px">Year<br><hr></th>
        <th width="250px">Number of Pupils<br><hr></th>
			</tr>
				
			<?php

			//This PHP code retrives data from lessons table in database and plases them into rows in table to be displayed
      //The SQL query 'mysqli_query($link, "SELECT class_id,teacher_id,year,pupils  FROM lessons")' retrives the datta from lessons table 
			$sql = mysqli_query($link, "SELECT class_id,teacher_id,year,pupils  FROM lessons");
			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
				<th>{$row['class_id']}</th>
				<th>{$row['teacher_id']}</th>
        <th>{$row['year']}</th>
        <th>{$row['pupils']}</th>
			</tr>";
			}
			?>
    </table>
    <br>
    <br>

    <!--This code creates input form under table so records can be updated according to class_id entered-->
    <!--The subject, teacher and number of students can be changed-->
    <h2>Update / Delete Class</h2>
    <div>
      <form method="post" action="UpdateClass.php">
        Class ID:<br>
        <input type="text" name="class_id" required>
        <br>
        <br>
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
          $sql = mysqli_query($link, "SELECT teach_id, fname, lname FROM teachers");
          while ($row = $sql->fetch_assoc()){
          echo "<option value ='{$row['teach_id']}'>{$row['fname']} {$row['lname']}</option>";
          }
          ?>
        </select>
        <br>
        <br>
        Number of Students:<br>
        <input type="text" name="numstudents">
        <br>
        <br>
        <input type="submit" name="submit" value="Update">
        <br>
        <br>
        <input type="submit" name="Delete" value="Delete">
      </form>
    </div>
    
    <?php

    //This PHP code is used to update a record when ubdate button named 'submit' is clicked
    //'isset($_POST)' is used to retriev enterd datas from input feild
    if (isset($_POST['submit'])) {
        
    $id = $_POST['class_id'];
    $teachId = $_POST['teach_id'];
    $subject = $_POST['option'];
    $pupils = $_POST['numstudents'];
      
    //The SQL query 'UPDATE' below will alter each data row with ne data entered into input feilds
    //Updates are done in according to what class_id is entered 'WHERE class_id ='$id'";'
    $sql = "UPDATE lessons SET teacher_id = '$teachId' , year = '$subject' , pupils = '$pupils' WHERE class_id ='$id'";
    if (mysqli_query($link, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error adding record ";
    }
      
    }
        
    //This else statement is then used for delete option.
    //When Delete button is clicked '(isset($_POST['Delete']))' this code will be called
    else if (isset($_POST['Delete'])) {

    $id = $_POST['class_id'];
    $teachId = $_POST['teach_id'];
    $subject = $_POST['option'];
    $pupils = $_POST['numstudents'];
        
    //This sql query '"DELETE FROM lessons WHERE class_id ='$id'";' will delete class record from database
    //Deletion is based off what class id has been entered into class id field 'WHERE class_id ='$id'";'
    $sql = "DELETE FROM lessons WHERE class_id ='$id'";
    if (mysqli_query($link, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error adding record ";
    }
              
    }
        
    //Closes link to database
    $link->close();
    ?>
  </body>
  <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</html>