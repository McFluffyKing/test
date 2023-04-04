<html><!--Jared Dylan Simons L38876914-->
  <head>
    <title>Update Teacher</title>
    <!--Style tag to allow php to include CSS-->
    <style>
    <?php include "styles.css" ?>
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
              Teacher <span class="sr-only">(current)</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="AddTeacher.php">Add Teacher</a>
                <a class="dropdown-item" href="ViewTeacher.php">View Teacher</a>
                <a class="dropdown-item" href="UpdateTeacher.php">Update / Delete Teacher</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
              Class
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

    <h3>Update Teachers</h3>
    
    <!--Html code for creating Table containing data entries from teacher table in database-->
		<table>
		
			<tr>
				<th width="150px">Teacher ID<br><hr></th>
				<th width="250px">Teacher First Name<br><hr></th>
        <th width="250px">Teacher Last Name<br><hr></th>
        <th width="250px">Contact Number<br><hr></th>
        <th width="250px">Email<br><hr></th>
        <th width="250px">Address<br><hr></th>
        <th width="250px">Background Check<br><hr></th>
			</tr>
				
			<?php
			//This PHP code retrives data from teacher table in database and places them into rows in table to be displayed
      //The SQL query 'mysqli_query($link, "SELECT teach_id,fname,lname,contact,email,address,backgroundcheck  FROM teachers")' retrives the data from teacher table
			$sql = mysqli_query($link, "SELECT teach_id,fname,lname,contact,email,address,backgroundcheck  FROM teachers");
			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
				<th>{$row['teach_id']}</th>
        <th>{$row['fname']}</th>
        <th>{$row['lname']}</th>
        <th>{$row['contact']}</th>
        <th>{$row['email']}</th>
        <th>{$row['address']}</th>
        <th>{$row['backgroundcheck']}</th>
			</tr>";
			}
			?>
    </table>
    <br>
    <br>
    
    <!--This code creates input form under table so teachers records can be updated according to teacher_id entered-->
    <!--The teacher name,surname,contact,email, address, backgorund check can be changed-->
    <h2>Update / Delete Teacher</h2>
    <div>
      <form method="post" action="UpdateTeacher.php">
        Teacher ID:<br>
        <input type="text" name="teach_id" required>
        <br>
        <br>
        Name:<br>
        <input type="text" name="firstname">
        <br>
        <br>
        Surname:<br>
        <input type="text" name="lastname">
        <br>
        <br>
        Contact No:<br>
        <input type="text" name="contact">
        <br>
        <br>
        Email:<br>
        <input type="text" name="email">
        <br>
        <br>
        Address:<br>
        <input type="text" name="address">
        <br>
        <br>
        Background Check:<br>
        <input type="text" name="back">
        <br>
        <br>
        <input type="submit" name="submit" value="Update">
        <br><br>
        <input type="submit" name="Delete" value="Delete">
      </form>
    </div>

    <?php

    //This PHP code is used to update a record when ubdate button named 'submit' is clicked
    //'isset($_POST)' is used to retriev enterd datas from input feild
    if (isset($_POST['submit'])) {

    $id = $_POST['teach_id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $back = $_POST['back'];
    
    //The SQL query 'UPDATE' below will alter each data row with tne data entered into input feilds
    //Updates are done in according to what teacher_id is entered 'WHERE teach_id ='$id'";'
    $sql = "UPDATE teachers SET fname = '$fname' , lname = '$lname' , contact = '$contact' , email = '$email' , address = '$address' , backgroundcheck = '$back' WHERE teach_id ='$id'";
    if (mysqli_query($link, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error adding record ";
    }
      
    }
    
    //This else statement is then used for delete option.
    //When Delete button is clicked '(isset($_POST['Delete']))' this code will be called
    else if (isset($_POST['Delete'])) {

    $id = $_POST['teach_id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $back = $_POST['back'];
    
    //This sql query '"DELETE FROM teacher WHERE tech_id ='$id'";' will delete teacher record from database
    //Deletion is based off what teacher id has been entered into parent id field 'WHERE teach_id ='$id'";
    $sql = "DELETE FROM teachers WHERE teach_id ='$id'";
    if (mysqli_query($link, $sql)) {
      echo "Record deleted successfully";
    } else {
      echo "Error adding record ";
    }
            
    }

    //Closes database connection
    $link->close();
    ?>
  </body>
  <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</html>