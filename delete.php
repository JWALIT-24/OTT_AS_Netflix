<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    try {
        $Sr_No=htmlspecialchars($_POST["Sr_No"]);
        require_once "server.inc.php";
        $query = "DELETE FROM item_data WHERE Sr_No = :Sr_No";
        $stmt=$pdo->prepare($query);
        $stmt->bindParam(":Sr_No",$Sr_No);
        $stmt->execute();
        $stmt=null;
        $pdo=null;
        Header("Location: my_list.php");
        die();
    } catch (PDOException $e) {
        die("Connection error: " . $e->getMessage());
    }
}
else{
    Header("Location: my_list.php");
}