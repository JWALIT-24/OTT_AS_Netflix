<?php 
function is_username_taken(string $username){
    require_once "server.inc.php";
    $query="SELECT * FROM data3 WHERE _username =:_username;";
    $stmt=$pdo->prepare($query);
$stmt->bindParam("_username",$username);
$results= $stmt->fetch(PDO::FETCH_ASSOCS);
if(results){
$utaken = "$username not available";
return true;
}
else{
    return false;
}
}
