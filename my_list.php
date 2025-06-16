<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_SESSION['_username'];

if(!empty($username)){
$sql = "SELECT * FROM item_data WHERE _username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();


$stmt->close();

$conn->close();}
else{
    Header("Location: main_page2.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My List</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #A3D8FF;
        }

        .navbar {
            background-color: #333;
            padding: 10px 0;
            text-align: center;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
            font-size: 18px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #45FFCA;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer; 
        }

        li:hover {
            background-color: #eaeaea;
        }
#remove,#watch{
display:flex;    
    width: 70px;
    padding:10px;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    background-color: #5c6bc0;
    color: white;
    cursor: pointer;
   
}



    </style>
</head>
<body>

<div class="container">
    <h1>My List</h1>
    <ul>
        <?php
  
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['item_name'] . "</li>";  //change item_name-> item_link
         
            echo" <form  method='post' action='playvideo.php' >";
           echo "<input type='hidden' value='" . $row['item_link'] . "' name='item_link'>";
            echo "<input type='hidden' value='" . $row['item_name'] . "' name='item_name'>";
            echo"<button type='submit' id='watch'>Watch</button>";
            echo"</form>";

            echo" <form  method='post' action='delete.php' >";
            echo "<input type='hidden' value='" . $row['Sr_No'] . "' name='Sr_No'>";
            echo "<input type='hidden' value='" . $row['item_link'] . "' name='item_link'>";
             echo "<input type='hidden' value='" . $row['item_name'] . "' name='item_name'>";
             echo"<button id='remove'type='submit'>Remove</button>";
             echo"</form>";
        }
   
        ?>
 </ul>
</div>
<!-- 
<script>
    function redirectToVideoPlayer(itemName) {
       
        window.location.href = "video_player.php?item=" + itemName;
    }
</script> -->

</body>
</html>

