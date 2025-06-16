<?php
session_start();
$admin_username = "admin";
$admin_password = "admin123";

$server_name = "localhost";
$username = "root"; 
$password = "";
$database_name = "demo1";
$conn = mysqli_connect($server_name, $username, $password, $database_name);
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['_username']) && isset($_POST['_password'])) {
    $_username = $_POST['_username'];
    $_password = $_POST['_password'];

    if ($_username == $admin_username && $_password == $admin_password) {
       
        $_SESSION['_username'] = $_username;
        header("Location: admin_stats.php");
        exit();
    } else {
       
        $sql = "SELECT * FROM data3 WHERE _username ='$_username'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if ($_password === $user['_password']) {
                $_SESSION['_username'] = $_username;
                header("Location: main_page2.php");
                exit();
            } else {
                echo "Invalid password for user $_username";
            }
        } else {
            echo "User $_username not found";
        }
    }
    
    mysqli_close($conn);
}

// require_once "server.inc.php";
// require_once "config_session.inc.php";
// require_once "login_model.inc.php";
// if($_SERVER["REQUEST_METHOD"]=="POST"){
// if (!empty($_POST['_username']) && !empty($_POST['_password'])) {
//     $_username = $_POST['_username'];
//     $_password = $_POST['_password'];
//        find_user($pdo, $_username,$_password);
// }

// }