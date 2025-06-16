<?php
require_once "signUp_kaar.php";
require_once "server.inc.php";
$query="SELECT * data3 where _username =:_username";
$stmt=$pdo->prepare($query);
$stmt->bindParam(":_username",$username);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);