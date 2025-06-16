<?php
$server_name = "localhost";
$username = "root"; 
$password = "";
$database_name = "demo1";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['delete'])) {
    $_username = $_POST['_username'];
    $_password = $_POST['_password'];
    $sql_delete = "DELETE FROM data3 WHERE _username='$_username' AND _password='$_password'";
    
    if (mysqli_query($conn, $sql_delete)) {
        echo "User data deleted successfully!";
    
        header("Location: admin_stats.php");
        exit();
    } else {
        echo "Error deleting user data: " . mysqli_error($conn);
    }
}
$sql_select = "SELECT * FROM data3";
$result = mysqli_query($conn, $sql_select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        .delete-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        body{
            /* background:linear-gradient(90deg,#d88820,rgb(255, 255, 255),rgba(11, 136, 84, 0.966),rgb(23, 23, 151),purple); */
         /* background-color: #12343b;  */
       background-color:#94FFD8;

        
    }
        #btn{
            position:absolute;
            top:40px;
            color: red;
            right:60px;
            border:1px solid red;
            border-radius:5px;
            box-shadow:grey 0px 0px 0px 2px ;
            background-color:rgba(56, 50, 50, 0);
            padding:8px;
            outline:none;
            cursor:pointer;
        }
        nav{
            height:50px;
            color: white;
            z-index: 1;
        }
        h1{
            color: red;
            text-align :center;
            font-size:40px;
            font-weight:700;
            text-decoration:none;

        }
      
    </style>
</head>
<body>
    <nav>
   <a href="adminContent.html"> 
    <button id="btn">Update Content</button></a>
    </nav>
    <h1>Admin Dashboard</h1>
   
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div>
            <p>Name: <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
            <p>Username: <?php echo $row['_username']; ?></p>
            <p>Password: <?php echo $row['_password']; ?></p>
            <p>Email: <?php echo $row['email']; ?></p>
            <p>Created at : <?php echo $row['created_at']; ?></p>

            <form action="" method="post">
                <input type="hidden" name="_username" value="<?php echo $row['_username']; ?>">
                <input type="hidden" name="_password" value="<?php echo $row['_password']; ?>">
                <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                <input type="hidden" name="created_at" value="<?php echo $row['created_at']; ?>">
                <input type="submit" name="delete" value="Delete" class="delete-btn">
            </form>
            <hr>
        </div>
    <?php } ?>

    <?php mysqli_close($conn); ?>
</body>
</html>
