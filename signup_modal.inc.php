<?php
declare(strict_types=1);      

function get_user(object $pdo,string $username){
$query = "SELECT * FROM data3 WHERE _username=:username;";
$stmt=$pdo->prepare($query);
$stmt->bindParam(":username",$username);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
return $result;
}
function get_email(object $pdo,string $email){
    $query = "SELECT * FROM data3 WHERE email=:email;";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $first_name , $last_name, $username , $email, $pwd)
{
        $query = "INSERT INTO data3 (first_name,last_name,_username, email,_password)
    VALUES (:firstname,:lastname,:username,:email,:_password);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":firstname",$first_name);
    $stmt->bindParam(":lastname",$last_name);
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":_password",$pwd);
    $stmt->execute();

}