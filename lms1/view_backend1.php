<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="font-awesome.css">
<title>Admin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.home{
  color : #2a9df4;
}

.logout {
  color : #2a9df4;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Container for flexboxes */
section {
  display: -webkit-flex;
  display: flex;
}

/* Style the navigation menu */
nav {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background: #ccc;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

/* Style the content */
article {
  -webkit-flex: 4;
  -ms-flex: 4;
  flex: 4;
  background-color: #f1f1f1;
  padding: 10px;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}


input[type=text], input[type=password] {
  width: 40%;
  padding: 6px 10px;
  margin: 3px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  font-size:17px;
  border-radius:4px;
}



/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}

table, th, td {
  border: 1px solid black;
  text-align: center;
}

input#image-button{
    background-image: #ccc url('images/wrong.png') no-repeat;
    
}
</style>

<?php
  if ($_SESSION['user_type'] != 'admin')
  header('location: login3.php?reason=user_type');
?>

</head>
<body>
   
<h2>Welcome To LMS</h2>
<!-- <p>In this example, we have created a header, two columns/boxes and a footer. On smaller screens, the columns will stack on top of each other.</p>
<p>Resize the browser window to see the responsive effect.</p>
<p><strong>Note:</strong> Flexbox is not supported in Internet Explorer 10 and earlier versions.</p> -->

<header>
  <h2>Leave Management System </h2>
  <h3 style="color: white">[ ADMIN ]</h3>
  <a class="home" href="index.html">Home</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a class="logout" href="login.php">Logout</a> 
</header>

<section>
  <nav>
    <ul>
      <li><a href="admin1.php">View Requests</a></li><br>
      <li><a href="view.php">Staff Details</a></li><br>
      <li><a href="delete_staff.php">Delete Staff</a></li><br>
      <li><a href="admin3.php">Program Coodinator</a></li><br>
     
    </ul>
  </nav>


<article>
    <h1>History</h1><br>
    <html>
    <body>

    <table >
    
<?php

include 'config.php';
$user_id=$_POST['user_id'];
$query = "SELECT * FROM leave_requests WHERE staff_id = '$user_id' AND NOT leave_status='Pending'";
$data = mysqli_query($db, $query);
$total = mysqli_num_rows($data);

  if($total!=0)
  {
    echo "
    <tr>
      <th width=\"200px\">Leave Types</th>
      <th width=\"200px\">Start Date</th> 
      <th width=\"200px\">End Date</th>
      <th width=\"200px\">No Of Days</th>
      <th width=\"200px\">Date Applied</th>
      <th width=\"200px\">Status</th>
      </tr>   
    ";
    while(($result = mysqli_fetch_assoc($data)))
    {
      echo " 
    <tr>
    <td width=\"200px\">".$result['leave_type']."</td>
    <td width=\"200px\">".$result['start_date']."</td>
    <td width=\"200px\">".$result['end_date']."</td>
    <td width=\"200px\">".$result['days_requested']."</td>
    <td width=\"200px\">".$result['date_applied']."</td>
    <td width=\"200px\">".$result['leave_status']."</td>
    </tr>";
    }
  }
  else
  { 
    header('location: view.php?reason=norecords');
  }
 
?>
 </table><br><br>

 &nbsp<a href = 'view.php'><button>Back</button><br><br>