<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST["username"];
$email = $_POST["email"];
$pwd = $_POST["newpass"];
try {
require_once "server.inc.php";   
$query = "UPDATE data3 SET _password =:pwd WHERE _username= :username AND email=:email;";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":username",$username);
$stmt->bindParam(":email",$email);
$stmt->bindParam(":pwd",$pwd);
$stmt->execute();
$pdo= null;
$stmt= null;
Header("Location: sucess.html");
die();
} catch (PDOexeption $e) 
{
     echo "Connection failed:" . $e->getMessage();
die("Connection failed:" . $e->getMessage());
}
}
else{
    echo"Email or Username is wrong";
   // Header("Location: ../deleteAndUpdate/update.html");
}
