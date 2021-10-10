<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `student` WHERE CONCAT(`ID`, `First`, `Last`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `student`";
    $search_result = filterTable($query);
 }


// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "MYSECRET", "Student-Data");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


?>

<!DOCTYPE html>
<html>
<head>
<title>Student Information</title>
<style>
.myInput {
background-position: 10px 10px;
background-repeat: no-repeat;
width: 50%;
font-size: 16px;
padding: 12px 20px 12px 40px;
border: 1px solid #ddd;
margin-bottom: 12px;
}
input[type=text], select {
  width: 50%;
  padding: 20px 20px;
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
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 15px;
}
#studentTable{
border-collapse: collapse;
width: 100%;
font-family: monospace;
font-size: 18px;
text-align: left;
}
#studentTable th {
background-color: #588c7e;
color: white;
}
 th, td {
border: 1px solid black;
text-align: left;
padding: 12px;
color: #29088A;
}
#studentTable tr.header, #studentTable tr:hover {
  background-color: #f1f1f1;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

#studentTable tr:nth-child(even) {background-color: #f2f2f2}
</style>
<h1>Student Data</h1>
</head>
<body>

 <div>       
 <form action="studentdata.php" method="post">
      <input class="Input"  type="text" name="valueToSearch" placeholder=" Search"><br><br>
       <input class="myButton" type="submit" name="search" value="Filter"><br><br>
              <table class='studentTable'>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
		    <th>Email</th>
                    <th>Address</th>
                    <th>GPA</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['First'];?></td>
                    <td><?php echo $row['Last'];?></td>
		    <td><?php echo $row['Email'];?></td>
                    <td><?php echo $row['Address'];?></td>
                    <td><?php echo $row['GPA'];?></td>
                </tr>
                <?php endwhile;?>
	    </table>
</form>
<form action="student.php" method="post">
     <input  type="submit" name="search" value="Add Student"><br><br>
</form>
</div>        
    </body>
</html>


</table>
</body>
</html>
