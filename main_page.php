
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['item_name'])) {
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "demo1";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $username = $_SESSION['_username']; 
    $item_name = '';

   
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'item_name') !== false) {
            $item_name = $value; 
            break; 
        }
    }

   
    $stmt = $conn->prepare("INSERT INTO item_data (_username, item_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $item_name);

  
    if ($stmt->execute()) {
        echo "Item added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

   
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Netflix Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: black;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .navbar {
      background-color: black;
      overflow: hidden;
    }
    .navbar a {
      float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 12px 20px;
      text-decoration: none;
    }
    .navbar a:hover {
      background-color: black;
      color: white;
    }
    .navbar .logo {
      margin-bottom: 15px;
      float: left;
      display: block;
    }
    .navbar .search {
      float: right;
    }
    .thumbnail {
      text-align: center;
      margin-top: 20px;
      position: relative;
      size: 100%;
    }
    .thumbnail img {

  
      width: 1600px;
    }
    .video-icon {
      width: 100px;
      height: 100px;
      background-color: rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      margin-left: 500px;
    }
    .video-icon i {
      font-size: 50px;
      color: white;
    }
    .button {
      background-color: rgba(255, 255, 255, 0.2);
      border: none;
      color: white;
      padding: 15px 30px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-top: 20px;
      border-radius: 20px;
      transition: background-color 0.3s ease;
      cursor: pointer;
      border: 2px solid transparent;
    }
    .button:hover {
      background-color: rgba(255, 255, 255, 0.3);
      border-color: rgba(255, 255, 255, 0.5);
    }
    
    .image-container {
      display: flex; 
      padding: 20px;
      justify-content: safe;
      align-items: center; 
    }

    .image-box {
  width: 1655px; /* Adjust width as needed */
  height: 250px; /* Adjust height as needed */
  margin: 10px;
  
}

    .image-box img {
      width: 100%; 
      height: 100%;
      object-fit: cover;
    }
    .add-button {
  background-color: rgba(255, 255, 255, 0.2);
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
 
  font-size: 14px;
 
  border-radius: 20px;
  transition: background-color 0.3s ease;
  cursor: pointer;
  border: 1px solid transparent;
  margin-left:40px;
  bottom: 10px; /* Adjust position */
  left: 50%; /* Center horizontally */
  transform: translateX(-50%);
}

.add-button:hover {
  background-color: rgba(255, 255, 255, 0.3);
  border-color: rgba(255, 255, 255, 0.5);
}
    .hello-message { /* Adjusted style for the welcome message */
      color: white;
      font: 25px Helvetica, Arial, sans-serif;
      text-align: start;
    }

  </style>
</head>
<body>

<div class="navbar">
  <a href="#" class="logo"><img src="photo/netflix.png" alt="Netflix Logo" height="100"></a>
  <a href="#">Home</a>
  <a href="#">TV Shows</a>
  <a href="#">Movies</a>
  <a href="my_list.php">My List</a>
  <div class="search">
    <input type="text" placeholder="Search">
  </div>
</div>
<?php

if (isset($_SESSION['_username'])) {
   
    echo "<p  class='hello-message'>WELCOME, " . $_SESSION['_username'] . "!</p>";
}
?>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row justify-content-left">
        <div class="col-4">
          <div class="thumbnail">
            <img src="photo/Thumbnail1.jpg" alt="Thumbnail 1" style="height: 650px; width: 550x;">
            <a href="playvideo.html" class="video-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="56" height="46" fill="white" class="bi bi-play" viewBox="0 0 16 16">
                <path d="M10.804 8 5 4.633v6.734zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
              </svg>
            </a>
            
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row justify-content-left">
        <div class="col-4">
          <div class="thumbnail">
            <img src="photo/Thumbnail2.jpg" alt="Thumbnail 2"  style="height: 650px; width: 550x;">
            <a href="playvideo2.html" class="video-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="56" height="46" fill="white" class="bi bi-play" viewBox="0 0 16 16">
                <path d="M10.804 8 5 4.633v6.734zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row justify-content-left">
        <div class="col-4">
          <div class="thumbnail">
            <img src="Thumbnail3.jpg" alt="Thumbnail 3"  style="height: 650px; width: 550x;">
            <a href="https://youtu.be/your_video_link_3" class="video-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="56" height="46" fill="white" class="bi bi-play" viewBox="0 0 16 16">
                <path d="M10.804 8 5 4.633v6.734zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
              </svg>
            </a>
          </div>

          

        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row justify-content-left">
        <div class="col-4">
          <div class="thumbnail">
            <img src="Thumbnail4.jpg" alt="Thumbnail 4"  style="height: 650px; width: 550x;">
            <a href="https://youtu.be/your_video_link_4" class="video-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="76" height="56" fill="white" class="bi bi-play" viewBox="0 0 16 16">
                <path d="M10.804 8 5 4.633v6.734zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<h1 style="color: white; margin-left: 35px; font-family: 'Times New Roman', Times, serif;">Popular on Netflix</h1>
<div class="image-container">
<div class="image-box">
    <img src="adv1.jpg" alt="Image 1" style="margin-left: 10px;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="The Slumberland"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>

<div class="image-box">

  <img src="adv2.jpg" alt="Image 2" style="margin-left: 10px;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="The Ledge"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>
<div class="image-box">
<img src="adv3.jpg" alt="Image 3" style="margin-left: 10px;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="Unknown Sea"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>
<div class="image-box">
<img src="adv4.jpg" alt="Image 4" style="margin-left: 10px;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="The Ritual"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>
</div>

<div class="image-box">
<h1 style="color: white; margin-left: 35px;font-family: 'Times New Roman', Times, serif;">Hollywood Movies</h1>
<div class="image-container">
  <div class="image-box">
    <img src="mix1.jpg" alt="Image 1" >
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="007">
      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
    <img src="mix2.jpg" alt="Image 2" >
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love Again">
      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
    <img src="mix3.jpg" alt="Image 3" >
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Mr.Bean & the bee">
      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
    <img src="mix4.jpg" alt="Image 4" >
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love at First sight">
      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
</div>


<h1 style="color: white; margin-left: 35px;font-family: 'Times New Roman', Times, serif;">Continue Watching</h1>
<div class="image-container">
<div class="image-box">
<img src="sci1.jpg" alt="Image 1" >
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="007"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>
<div class="image-box">
  <img src="sci2.jpg" alt="Image 2">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="Spectral-A netflix original Film"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>
<div class="image-box">
  <img src="sci3.jpg" alt="Image 3">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="Transcendence"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>
<div class="image-box">
  <img src="sci4.jpg" alt="Image 4" >
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="3 Body problem"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>
</div>
<h1 style="color: white; margin-left: 35px;font-family: 'Times New Roman', Times, serif;">Top TV shows</h1>
<div class="image-container">
<div class="image-box">
  <img src="mix3.jpg" alt="Image 1" style="margin-left: 10px;">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="Batti Gull meter chalu"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>
<div class="image-box">
  <img src="com2.jpg" alt="Image 2">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="The man from TORONTO"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>
<div class="image-box">
  <img src="com3.jpg" alt="Image 3">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="ME TIME"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>
<div class="image-box">
  <img src="com4.jpg" alt="Image 4" >
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="item_name" value="DarlingS"> 
        <button type="submit" class="add-button">+ Add</button>
    </form>
</div>

</div>

</body>
</html>
