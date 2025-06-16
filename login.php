<?php
session_start();

$server_name = "localhost";
$username = "root"; 
$password = "";
$database_name = "demo1";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['_username']) && isset($_POST['_password'])) {
    $_username = $_POST['_username'];
    $_password = $_POST['_password'];

    
    $sql = "SELECT * FROM data3 WHERE _username='$_username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
       
        if ($_password == $user['_password']) {
           
            $_SESSION['_username'] = $_username;
            header("Location: jokesapi.html"); 
            exit();
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
    }
}

mysqli_close($conn);
?>
