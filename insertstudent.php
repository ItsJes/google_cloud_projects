<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "MYSECRET", "Student-Data");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$ID = mysqli_real_escape_string($link, $_REQUEST['ID']);
$First = mysqli_real_escape_string($link, $_REQUEST['First']);
$Last = mysqli_real_escape_string($link, $_REQUEST['Last']);
$Email = mysqli_real_escape_string($link, $_REQUEST['Email']);
$Address = mysqli_real_escape_string($link, $_REQUEST['Address']);
$GPA = mysqli_real_escape_string($link, $_REQUEST['GPA']);
// Attempt insert query execution
$sql = "INSERT INTO Student (ID, First, Last, Email, Address, GPA) VALUES ('{$ID}', '{$First}', '{$Last}', '{$Email}', '{$Address}', '{$GPA}')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
<form action="studentdata.php" method="post">
    <p>
        <label for="ID">Student ID:</label>
        <input type="text" name="ID" id="ID">
    </p>
    <p>
        <label for="First">First Name:</label>
        <input type="text" name="First" id="First">
    </p>
    <p>
        <label for="Last">Last Name:</label>
        <input type="text" name="Last" id="Last">
    </p>
    <p>
        <label for="Email">Email:</label>
        <input type="text" name="Email" id="Email">
    </p>
    <p>
        <label for="Address">Address:</label>
        <input type="text" name="Address" id="Address">
    </p>
    <p>
        <label for="GPA">GPA:</label>
        <input type="text" name="GPA" id="GPA">
    </p>
    <input type="submit" value="Submit">
</form>
</body>
</html>
