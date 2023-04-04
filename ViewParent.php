<html><!--Jared Dylan Simons L38876914-->
  <head>
    <title>View Parent</title>
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
              Parent <span class="sr-only">(current)</span>
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

    <!--Html code for creating Table containing data entries from parents table in database-->
    <h3>View Parents</h3>
	
		<table>
		
			<tr>
				<th width="150px">Parent ID<br><hr></th>
        <th width="150px">Parent First Name<br><hr></th>
				<th width="250px">Parent Last Name<br><hr></th>
        <th width="250px">Contact Number<br><hr></th>
        <th width="250px">Email<br><hr></th>
        <th width="250px">Address<br><hr></th>
			</tr>
				
			<?php

			//This PHP code retrives data from parent table in database and places them into rows in table to be displayed
      //The SQL query 'mysqli_query($link, "SELECT parent_id,fname,lname,contact,email,address  FROM parent")' retrives the data from parent table
			$sql = mysqli_query($link, "SELECT parent_id,fname,lname,contact,email,address  FROM parent");
			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
				<th>{$row['parent_id']}</th>
				<th>{$row['fname']}</th>
        <th>{$row['lname']}</th>
        <th>{$row['contact']}</th>
        <th>{$row['email']}</th>
        <th>{$row['address']}</th>
			</tr>";
			}
			?>
    </table>
    
  </body>
  <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</html>