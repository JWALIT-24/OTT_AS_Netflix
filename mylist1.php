<!-- <?php
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
$sql = "SELECT item_name FROM item_data WHERE _username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();


$stmt->close();

$conn->close();
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
            background-color: #f4f4f4;
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
            background-color: #fff;
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
    </style>
</head>
<body>

<div class="container">
    <h1>My List</h1>
    <ul>
        <?php
     while ($row = $result->fetch_assoc()) {?><?php
    echo "<li onclick=\"redirectToVideoPlayer('" . $row['item_name'] . "')\">" . $row['item_name'] . "</li>";?>
       <form  method="post">
            <input type="hidden" value="" name="">
            <input type="hidden" value="" name="">
            <button value="watch" name="watch">Watch</button>
            <button value="remove" name="remove">Remove</button>
        </form>
    <?php
         }?>
        
     
    </ul>
</div>

<!DOCTYPE html>
<html>
<body>
<!--srmiou nroi &*&*()**************->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['buttonA'])) {
        // Call function for Button A
        performFunctionA();
    } elseif (isset($_POST['buttonB'])) {
        // Call function for Button B
        performFunctionB();
    }
}

function performFunctionA() {
    // Your logic for Button A
    echo "Button A clicked!";
}

function performFunctionB() {
    // Your logic for Button B
    echo "Button B clicked!";
}
?>
</body>
</html>




 //   echo" <form  method='post'>";
        //     echo "<input type='hidden' value='' name=''>";
        //     echo" <input type='hidden' value='' name=''>";
        //     echo"<button value='watch' name='watch'>Watch</button>";
        //     echo"<button value='remove' name='remove'>Remove</button>";
        //     echo"</form>";




<script>
    function redirectToVideoPlayer(itemName) {
       
        window.location.href = "video_player.php?item=" + itemName;
    }
</script>

</body>
</html>
 -->

 <!-- ///////DANISH CREATION -->

 <!-- <?php
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
$sql = "SELECT item_name FROM item_data WHERE _username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();


$stmt->close();

$conn->close();
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
            background-color: #f4f4f4;
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
            background-color: #fff;
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
    </style>
</head>
<body>

<div class="container">
    <h1>My List</h1>
    <ul>
        <?php
  
        while ($row = $result->fetch_assoc()) {
            echo "<li onclick=\"redirectToVideoPlayer('" . $row['item_name'] . "')\">" . $row['item_name'] . "</li>";
        }
        ?>
    </ul>
</div>

<script>
    function redirectToVideoPlayer(itemName) {
       
        window.location.href = "video_player.php?item=" + itemName;
    }
</script>

</body>
</html>
 -->
