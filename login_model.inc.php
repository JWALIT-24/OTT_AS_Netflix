<?php
$admin_username = "admin";
$admin_password = "admin123";

function find_user($pdo, $_username,$_password){
    $errors=[];
    if ($_username == $admin_username && $_password == $admin_password) {
    $_SESSION['_username'] = $_username;
    header("Location: admin_stats.php");
    exit();
} 
else 
{
    $query = "SELECT * FROM data3 WHERE _username = :_username and _password=:_password";
  $stmt= $pdo->prepare($query);
$stmt->bindParam(":_username",$_username);
$stmt->bindParam(":_password",$_password);
$stmt->execute();
$result =$stmt->fetch(PDO::FETCH_ASSOC); 

    if (isset($result)) {
        $user = mysqli_fetch_assoc($result);
        if ($_password === $user['_password']) {
            $_SESSION['_username'] = $_username;
            header("Location: main_page2.php");
            exit();
        } else {
            $errors['error_login']=" Invalid Credentials";
       $_SESSION["error_login"]= $errors;
       view();
        }
}
}
mysqli_close($conn);}