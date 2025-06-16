<?php
$server_name="localhost";
$username = "root"; 
$password="";
$database_name="demo1";

$conn=mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn)
{ 
     die("Connection failed: ".mysqli_connect_error());
}

if(isset($_POST['save'])) {
    $_username=$_POST['_username'];
    $_password=$_POST['_password'];
  
    $sql_query= "INSERT INTO data2 (_username,_password)
    VALUES('$_username','$_password')";

    if (mysqli_query($conn, $sql_query)) {
        echo "New Details Entry inserted successfully!";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
