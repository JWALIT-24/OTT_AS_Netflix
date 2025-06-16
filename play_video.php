<?php
session_start();

$item_name = $_GET['item'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT video_links FROM video_url WHERE item_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $item_name);
$stmt->execute();
$stmt->store_result();

if  ($stmt->num_rows === 0) {
    echo "No video found for the item name: " . $item_name;
}   else {
    $stmt->bind_result($video_url);
    $stmt->fetch();
    $stmt->close();

    $conn->close();
    ?>
  
    <!DOCTYPE html>
    <html lang="en">
    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Play Video</title>
    </head>
    <body>

    <iframe width="560" height="315" src="<?php echo $video_url; ?>" frameborder="0" allowfullscreen></iframe>
    </body>
    </html>

    <?php
}
?>