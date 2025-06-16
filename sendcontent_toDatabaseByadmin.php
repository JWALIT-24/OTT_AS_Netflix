<?php
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['Video_name'])){
$Video_name =$_POST["Video_name"];
$Video_address =$_POST["Video_address"];
$img_address =$_POST["img_address"];
$genre =$_POST["genre"];
require_once "server.inc.php";
$query="INSERT INTO content_item (Video_name, Video_address,img_address,genre) VALUES(:Video_name,:Video_address,:img_address,:genre);";    
$stmt=$pdo->prepare($query);
$stmt->bindParam(":Video_name",$Video_name);
$stmt->bindParam(":Video_address",$Video_address);
$stmt->bindParam(":img_address",$img_address);
$stmt->bindParam(":genre",$genre);
$stmt->execute();
$stmt=null;
$pdo=null;
Header("Location: AdminContent.html");
}
?>