<?php
 session_start();
 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['item_name']) && isset($_POST['item_link'])) {  
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
  $item_link = $_POST['item_link'];
    foreach ($_POST as $key => $value) {
      if (strpos($key, 'item_name') !== false) {
    $item_name = $value; 
     break;
  }
  }
  if(isset( $_SESSION['_username'])){
 $stmt = $conn->prepare("INSERT INTO item_data (_username, item_name,item_link) VALUES (?, ?, ?)");
 $stmt->bind_param("sss", $username, $item_name,$item_link);   //ss string string
 $stmt->execute(); 
 // if ($stmt->execute()) {
    //   header("Location: main_page2.php");
    // } else {
    //     echo "Error: " . $conn->error;
    // }
    $stmt->close();
    $conn->close();
  
}
else{
  header("Location: signUp2.php");
  die();
}}
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

       .footer {
        background-color: #333;
        color: #fff;
        padding: 20px 0;
    }
    .footer ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .footer ul li {
        display: inline-block;
        margin-right: 20px;
    }
    .footer ul li:last-child {
        margin-right: 0;
    }
    .footer ul li a {
        color: #fff;
        text-decoration: none;
    }
    .navbar{
    background-color:black;
    display:flex;
    width:100%;
    height:80px;
    position:static;
top:-30px;
left:0px;
z-index: 4;
}
#home,#tv,#movie,#list{
    margin: 30px 30px;
    float:left;
/* margin-top: 10px; */
text-decoration:none;
color:white;
font-family: Arial, Helvetica, sans-serif;
}
.search{
    height:20px;
    margin-right:20x;
}
.fa{
 margin-right:18px;
 cursor:pointer;
 /* margin-top:15px; */
}
#bell{
    position:absolute;
    right:110px;
    top:20px;
    margin:0px 10px;
}
#user{
    float:right;
    margin-left:18px;
    cursor:pointer;
}
#logo{
margin-top:5px;
padding-left:40px;
}
.navbar > :nth-child(2) {
position:absolute;
left:18%;
}
input[type="text"]{
  height:30px;
  border-radius:5px;
  outline:none;
}
  </style>
  <link href="../css/mainpage.css" rel="stylesheet">
</head>
<body>

<div class="navbar">
 
 <img  id="logo"src="../photo/netflix.png" alt="Netflix Logo" height="50px;">
<div>   <a href="#" id="home">Home</a>
 <a href="#" id="tv">TV Shows</a>
 <a href="#" id="movie">Movies</a>
 <a href="my_list.php" id="list">My List</a>
 <a href="#" id="movie">News & Popular </a></div><div id="bell">
 <i class="fa fa-bell" style="font-size:24px;color:white;"></i>

   <input type="text" class="search" placeholder="Search">;
<?php 
if (isset($_SESSION['_username']) && $_SESSION['_username'] !="admin") {
echo"<a href='login2.html'><img id='user' src='user_1177568.png' height='35px' width='35px'><a>
";
echo "<p  class='hello-message' >" . $_SESSION['_username'] ." </p>";
}?> 
 </div>
</div>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row justify-content-left">
        <div class="col-4">
          <div class="thumbnail">
            <img src="Thumbnail1.jpg" alt="Thumbnail 1" 
style="height:600px;
width:1370px;">
            <a href="playvideox.html" class="video-icon">
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
            <img src="pexels-vladalex94-1402787.jpg" alt="Thumbnail 2"  
style="height:600px;   width:1370px;">
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
            <img src="pexels-artempodrez-8087935.jpg" alt="Thumbnail 3" 
            style="height:600px;
width:1370px;">
            <a href="playvideo3.html" class="video-icon">
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
            <img src="pexels-olly-1418519.jpg" alt="Thumbnail 4" 
style="height:600px;
width:1370px;">
            <a href="playvideo4.html" class="video-icon">
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

<!-- *****************Popular On Netflix******************** -->

<h1 style="color: white; margin-left: 35px; font-family: 'Times New Roman', Times, serif;">Popular on Netflix</h1>
<div class="offerssection">
  <div class="image-container">

  <?php
require_once "add.php";

foreach ($results as $set) {
  if($set['genre']=='Popular on Netflix'){
    echo "<div class='image-box'>";
    echo "<img src='" . $set['img_address'] . "'>"; // corrected syntax
    echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_name' value='" . $set['Video_name'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_link' value='" . $set['Video_address'] . "'>"; // corrected syntax
    echo "<button type='submit' class='add-button'>+ Add</button>";
    echo "</form>";
    echo "</div>";
}}
?>

  <div class="image-box">
    <img src="../photo/horror/IMG-20240419-WA0036.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Damsel"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/iM150ZWovZM"> 
      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0015.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="DARK MATTER"> 
      <input type="hidden" name="item_link" value="www.youtube.com/embed/j6ucGt_Xp14"> 
      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/science/IMG-20240419-WA0010.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Parasyte: The Grey"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/maIGHqJB6aQ"> 
      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/romance/IMG-20240419-WA0024.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love Again"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/CQDXtD2HJAs"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/horror/IMG-20240419-WA0030.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Fear Street"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/UyUuzCGblqc"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/horror/IMG-20240419-WA0031.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Khooni Mahal"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/hdVYHoHHBys"> 
      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/romance/IMG-20240419-WA0029.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love at first Sight!"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/j0kro6SuwxM"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/romance/IMG-20240419-WA0023.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="My Fault"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/3CpKBAPqqM0"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  
  <div class="image-box">
  <img src="../photo/science/IMG-20240419-WA0017.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="In the SEA"> 
      <input type="hidden" name="item_link" value="www.youtube.com/embed/j6ucGt_Xp14"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>

  <div class="image-box">
  <img src="../../photo/comedy/IMG-20240419-WA0006.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="The Man from TOROTNO"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/urqy8DrcGBs"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/comedy/IMG-20240419-WA0007.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Man Vs Bee"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/YQ1vN_91KO0"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/comedy/IMG-20240419-WA0008.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="DARLINGS"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/Dmx5KDOpqeg"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/comedy/IMG-20240419-WA0003.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Batti gul meter chalu"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/BoLTSoVPzQ0"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/adventure/IMG-20240419-WA0019.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="The RITUAL"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/Vfugwq2uoa0"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/adventure/IMG-20240419-WA0020.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="The LEDGE"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/lI5QB-BOWNo"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/adventure/IMG-20240419-WA0021.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="CHUPA"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/ViKnrHjzgn4"> 
      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
  <img src="../photo/adventure/IMG-20240419-WA0022.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="The Slumberland"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/FBnkVJslRGo"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box"> 
  <img src="../photo/adventure/IMG-20240419-WA0019.jpg">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="The RITUAL"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/Vfugwq2uoa0"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>

  <div class="image-box">
  <img src="<<?php ?>">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love at first Sight!"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/j0kro6SuwxM"> 

      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
    <img src="../photo/horror/IMG-20240419-WA0036.jpg">
    <form method="post" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="hidden" name="item_name" value="Damsel"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/iM150ZWovZM"> 
      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>

</div>
</div><br>

<!-- <*******############***********          *Horror******************> -->

<h1 style="color: white; margin-left: 35px;font-family: 'Times New Roman', Times, serif;">Horror</h1>
<div class="offerssection">
<div class="image-container">
<?php
require_once "add.php";

foreach ($results as $set) {
  if($set['genre']=='Horror'){
    echo "<div class='image-box'>";
    echo "<img src='" . $set['img_address'] . "'>"; // corrected syntax
    echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_name' value='" . $set['Video_name'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_link' value='" . $set['Video_address'] . "'>"; // corrected syntax
    echo "<button type='submit' class='add-button'>+ Add</button>";
    echo "</form>";
    echo "</div>";
}}
?>

<div class="image-box">
<img src="../photo/horror/IMG-20240419-WA0030.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Fear Street"> 
          <input type="hidden" name="item_link" value="https://www.youtube.com/embed/UyUuzCGblqc"> 
      <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/horror/IMG-20240419-WA0031.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Khooni Mahal"> 
      <input type="hidden" name="item_link" value="https://www.youtube.com/embed/hdVYHoHHBys">  
<button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/horror/IMG-20240419-WA0032.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="The House"> 
               <input type="hidden" name="item_link" value="https://www.youtube.com/embed/wqbZlAEUb5w"> 
 <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/horror/IMG-20240419-WA0035.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Viking Wolf"> 
                <input type="hidden" name="item_link" value="https://www.youtube.com/embed/6sxnOLRGkhw"> 
<button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/horror/IMG-20240419-WA0033.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="The Fall of the House Busher"> 
                <input type="hidden" name="item_link" value="https://www.youtube.com/embed/yvuAWVzP6wI"> 
<button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/horror/IMG-20240419-WA0036.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Damsel"> 
               <input type="hidden" name="item_link" value="https://www.youtube.com/embed/iM150ZWovZM"> 
 <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
 
  <div class="image-box">
<img src="../photo/horror/IMG-20240419-WA0035.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Viking Wolf"> 
                <input type="hidden" name="item_link" value="https://www.youtube.com/embed/6sxnOLRGkhw"> 
<button type="submit" class="add-button">+ Add</button>
    </form>
  </div>

</div>
</div><br>

<!-- ******************           **Romance************* -->

<h1 style="color: white; margin-left: 35px;font-family: 'Times New Roman', Times, serif;">Romance</h1>
<div class="offerssection">
<div class="image-container">

<?php
require_once "add.php";

foreach ($results as $set) {
  if($set['genre']=='Romance'){
    echo "<div class='image-box'>";
    echo "<img src='" . $set['img_address'] . "'>"; // corrected syntax
    echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_name' value='" . $set['Video_name'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_link' value='" . $set['Video_address'] . "'>"; // corrected syntax
    echo "<button type='submit' class='add-button'>+ Add</button>";
    echo "</form>";
    echo "</div>";
}}
?>
<div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0023.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="My Fault"> 
               <input type="hidden" name="item_link" value="https://www.youtube.com/embed/3CpKBAPqqM0"> 
 <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0024.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love Again"> 
                <input type="hidden" name="item_link" value="https://www.youtube.com/embed/CQDXtD2HJAs"> 
<button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0025.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Make Me Believe"> 
                <input type="hidden" name="item_link" value="https://www.youtube.com/embed/5Tda-kt97sc"> 
<button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0026.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Along FOR THE Ride"> 
                <input type="hidden" name="item_link" value="https://www.youtube.com/embed/A1PTIxYrTVw"> 
<button type="submit" class="add-button">+ Add</button>
    </form>
  </div><div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0027.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love Is In the AIR"> 
               <input type="hidden" name="item_link" value="https://www.youtube.com/embed/O2JI6EldneY"> 
 <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0028.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love per square foot"> 
               <input type="hidden" name="item_link" value="https://www.youtube.com/embed/XCr0amrMPt0"> 
 <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0029.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love at first sight"> 
                <input type="hidden" name="item_link" value="https://www.youtube.com/embed/j0kro6SuwxM"> 
<button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0024.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love Again"> 
              <input type="hidden" name="item_link" value="https://www.youtube.com/embed/CQDXtD2HJAs"> 
  <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0025.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Make Me Believe"> 
               <input type="hidden" name="item_link" value="https://www.youtube.com/embed/5Tda-kt97sc"> 
 <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0026.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Along For The Ride"> 
              <input type="hidden" name="item_link" value="https://www.youtube.com/embed/A1PTIxYrTVw"> 
  <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0027.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love is in the air"> 
              <input type="hidden" name="item_link" value="https://www.youtube.com/embed/O2JI6EldneY"> 
  <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  
  <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0029.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love At First Sight"> 
              <input type="hidden" name="item_link" value="https://www.youtube.com/embed/j0kro6SuwxM"> 
  <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
    <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0028.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love per square feet"> 
               <input type="hidden" name="item_link" value="https://www.youtube.com/embed/XCr0amrMPt0"> 
 <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  
  <div class="image-box">
<img src="../photo/romance/IMG-20240419-WA0029.jpg" height="200px">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="item_name" value="Love at first sight"> 
              <input type="hidden" name="item_link" value="https://www.youtube.com/embed/j0kro6SuwxM"> 
  <button type="submit" class="add-button">+ Add</button>
    </form>
  </div>
  
</div>
</div><br>

<!-- **********************Comedy************************** -->

<h1 style="color: white; margin-left: 35px;font-family: 'Times New Roman', Times, serif;">Comedy</h1>
<div class="offerssection">
  <div class="image-container">
  <?php
require_once "add.php";
foreach ($results as $set) {
  if($set['genre']=='Comedy'){
    echo "<div class='image-box'>";
    echo "<img src='" . $set['img_address'] . "'>"; // corrected syntax
    echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_name' value='" . $set['Video_name'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_link' value='" . $set['Video_address'] . "'>"; // corrected syntax
    echo "<button type='submit' class='add-button'>+ Add</button>";
    echo "</form>";
    echo "</div>";
}}
?>
    <div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0006.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="The Man From Toranto"> 
          <input type="hidden" name="item_link" value="https://www.youtube.com/embed/urqy8DrcGBs"> 
          <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0007.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Man Vs Bee"> 
          <input type="hidden" name="item_link" value="https://www.youtube.com/embed/YQ1vN_91KO0"> 
          <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0008.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Darlings"> 
                   <input type="hidden" name="item_link" value="https://www.youtube.com/embed/Dmx5KDOpqeg"> 
 <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0003.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Batti Gul Meter Chalu"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/BoLTSoVPzQ0"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div><div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0007.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Man Vs Bee"> 
                 <input type="hidden" name="item_link" value="https://www.youtube.com/embed/YQ1vN_91KO0"> 
   <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0008.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="DARLINGS"> 
                   <input type="hidden" name="item_link" value="https://www.youtube.com/embed/Dmx5KDOpqeg"> 
 <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0006.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="The Man From Toranto"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/urqy8DrcGBs"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0005.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0003.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Me Time">
                   <input type="hidden" name="item_link" value="https://www.youtube.com/embed/Mmq_NVwLN_g"> 
 <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0007.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Make Me Believe"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0004.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Me Time"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/Mmq_NVwLN_g"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/comedy/IMG-20240419-WA0005.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
    </div>
</div><br>

<!-- ************************************Adventure********************************** -->

<h1 style="color: white; margin-left: 35px;font-family: 'Times New Roman', Times, serif;">Adventure</h1>
<div class="offerssection">
<div class="image-container">
<?php
require_once "add.php";

foreach ($results as $set) {
  if($set['genre']=='Adventure'){
    echo "<div class='image-box'>";
    echo "<img src='" . $set['img_address'] . "'>"; // corrected syntax
    echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_name' value='" . $set['Video_name'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_link' value='" . $set['Video_address'] . "'>"; // corrected syntax
    echo "<button type='submit' class='add-button'>+ Add</button>";
    echo "</form>";
    echo "</div>";
}}
?>


<div class="image-box">
    <img src="../photo/adventure/IMG-20240419-WA0022.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/adventure/IMG-20240419-WA0020.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/adventure/IMG-20240419-WA0019.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/adventure/IMG-20240419-WA0021.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/adventure/IMG-20240419-WA0022.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/adventure/IMG-20240419-WA0021.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/adventure/IMG-20240419-WA0020.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/adventure/IMG-20240419-WA0019.jpg"height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      </div>
</div><br>

<!-- *******************Science Fiction********************************** -->

<h1 style="color: white; margin-left: 35px;font-family: 'Times New Roman', Times, serif;">Science Fiction</h1>
<div class="offerssection">
<div class="image-container">
<?php
require_once "add.php";

foreach ($results as $set) {
  if($set['genre']=='Science Fiction'){
    echo "<div class='image-box'>";
    echo "<img src='" . $set['img_address'] . "'>"; // corrected syntax
    echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_name' value='" . $set['Video_name'] . "'>"; // corrected syntax
    echo "<input type='hidden' name='item_link' value='" . $set['Video_address'] . "'>"; // corrected syntax
    echo "<button type='submit' class='add-button'>+ Add</button>";
    echo "</form>";
    echo "</div>";
}}
?>

<div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0010.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0011.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0012.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Don't Look Up"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/jHYhTERQ97s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0013.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Stowaway"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/A_apvQkWsVY"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0014.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Jung_e"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/LCxnmfdxJ6s"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0016.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Transcendence"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/VCTen3-B8GU"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0015.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Spectral"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/rmC3ZhIHHi4"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0016.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="James Bond 26"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/gcIv4hGDZeE"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>

      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0014.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Dark Matter"> 
                  <input type="hidden" name="item_link" value="www.youtube.com/embed/j6ucGt_Xp14"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0017.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="In The Sea"> 
                  <input type="hidden" name="item_link" value="www.youtube.com/embed/j6ucGt_Xp14"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0018.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="The Railway Men"> 
        <input type="hidden" name="item_link" value="https://www.youtube.com/embed/iD3TZ_Xxc14"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0014.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="Spectral"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/rmC3ZhIHHi4"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      <div class="image-box">
    <img src="../photo/science/IMG-20240419-WA0016.jpg" height="200px">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" name="item_name" value="James Bond 26"> 
                  <input type="hidden" name="item_link" value="https://www.youtube.com/embed/gcIv4hGDZeE"> 
  <button type="submit" class="add-button">+ Add</button>
        </form>
      </div>
      </div>
</div><br>
    <footer class="footer">
        <div class="container">
            <div class="footer-info">
                <p>Phone: 123-456-789</p>
                <p>Address: 123 Street, City, Country</p>
            </div>
            <div class="footer-menu">
                <ul>
                    <li><a href="#">Google</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Terms and Policy</a></li>
                    <li><a href="#">Query</a></li>
                    <li><a href="#">Languages</a></li>
                    <li><a href="#">Community</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Content</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2024 Your Website. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>