<?php
require_once "config_session.inc.php";
require_once "login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/login.css" rel="stylesheet">
    </head>
    <body>
        <div class="main">
        <nav>
    <a href= "netflix.html">
       <img src="../photo/netflix.png">
       </a>
       <div>
     <a href="signUp2.php"> <button class="btn">Sign Up</button></a>
     </div>
       </nav> 
       <div class="box">
       </div>
        <div class="hero">
      <h2>Login/Sign Up</h2>

      
        <form name=form action="adminlogin.php" method="post">
    <div id="img1">  
    <input class="animated-border" type="text" placeholder="Username" name="_username" required  id="_username">
    <img src="../photo/check.png" id="img1_inner"> </div> 
    <div id="img2">  
    <input class="animated-border" type="password" placeholder="Password" name="_password" required id="_password">
    <img src="../photo/check.png" id="img2_inner">
    </div>  <?php view();
    ?>
    <div id="bttn"> <button type="submit">Login</button></div>
    <div id="tag1">   
     <div id="forget"><a href="fgps.html">Forgot Password?</a></div> 
         <a href="signUp.php">
        <div id="regi"><a href="signUp2.php">Not registered?<br> sign up</a></div>
        </div></form>


        <div id="icon">
        <a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Faccounts.google.com%2F&followup=https%3A%2F%2Faccounts.google.com%2F&ifkv=ARZ0qKLWaKt-qglaVFtZk4nUltPHAfvmPKrz1cZo3sV9euQuaUErGuZFl1FVYmRCQwSxgwgS5GGz&passive=1209600&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S1409331603%3A1712177822012188&theme=mn&ddm=0">
        <img src="../photo/google.png" alt="google" height="23px";
            width="23px";></a>
        <a href="https://www.facebook.com/"> <img src="../photo/facebook.png" alt="facebook" height="23px"
            width="23px"></a>
        <a href="https://twitter.com/i/flow/login"><img src="../photo/twitter.png" alt="twitter" height="23px"
            width="23px"></a>
        </div> </div>
         </div>
      <script src="../Netflix/js/login.js"></script>
</body>
</html>