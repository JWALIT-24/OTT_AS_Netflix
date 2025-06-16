<?php 
require_once "server.inc.php";
$query1="SELECT *FROM content_item";
$stmt1=$pdo->prepare($query1);
$stmt1->execute();
$result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
$results=array_reverse($result);
$stmt=null;
$pdo=null;