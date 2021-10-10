<html>
<body>
<style>
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 15px;
}

input[type=submit] {
  width: 10%;
  background-color: #000000;
  color: white;
  padding: 20px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 15px;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 40px;
}
</style>
<h1>Add Student</h1>
<?php
$link = mysqli_connect("localhost", "root", "MYSECRET", "Student-Data");
 
// Check connection
if($link === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Check if submit button is clicked
if(isset($_POST['submit'])){
	$ID = $_POST['ID'];
	$First = $_POST['First'];
	$Last = $_POST['Last'];
	$Email  = $_POST['Email'];
	$Address = $_POST['Address'];
	$GPA  = $_POST['GPA'];


  // attempt insert query execution
  $sql = "INSERT INTO student (ID, First, Last, Email, Address,  GPA) VALUES ('$ID','$First', '$Last', '$Email', '$Address', '$GPA')";
  if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}
// Close connection
mysqli_close($link);
?>
<form action="/studentdata.php">
    <input type="submit" value="View Student" />
</form>
<div>
<form action="student.php" method="post">
Student ID: <br> <input type="text" name="ID"><br>
First Name:<br> <input type="text" name="First"><br>
Last Name:<br> <input type="text" name="Last"><br>
Email:<br> <input type="text" name="Email"><br>
Address:<br> <input type="text" name="Address"><br>
GPA:<br> <input type="text" name="GPA"><br>
<!--- <input type="submit" name="submit">--->
<input type="submit" name="submit">
</form>
</div>
</body>
</html>
