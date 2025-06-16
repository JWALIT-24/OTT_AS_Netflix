  <?php
require_once "config_session.inc.php";
   require_once "signup_view.inc.php";
    if(isset($uname)) echo $uname ?>
<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="../css/SignUp.css" rel="stylesheet">
   <link href="../css/style1.css" rel="stylesheet">
   <script src="../css/signup.js"></script>
</head>
<body>
  <div class="main">
    <nav><a href= "netflix.html" >
      <img src="../photo/netflix.png">
  </a>
 <div>
   <a href="login2.php">  <button class="btn btn-red-sm">Log In</button>
   </a></div>
     </nav>
 
     
     <div class="box">
       </div>
<!--        
         <div id="confirmationModal" class="modal">
           <div class="modal-content">
               <span class="close">&times;</span>
       <div>
             <h1>Thank You!</h1>
             
             <p>For registering to our website!</p>
             <p>You have Sign Up Successfully!</p>      <span>  For login
               <a href="login2.html" style="color:blue">Click here</a></span>
         <button id="button">Close</button>
       </div></div>
       </div>   -->
    <?php   confirmation();?>
         <div class="hero"><h2>Sign Up</h2>
      <form action="signUp_kar.php" method="POST" id="form">
        <!-- <input class="animated-border" id="fname" type="text" placeholder="First Name" name="first_name">
        <p id="ffname" class="msg">First or last name cannot contain special characters or numbers</p>
        <input class="animated-border" id="lname" type="text" placeholder="Last Name" name="last_name">
        <p class="msg" id="llname">First or last name cannot contain special characters or numbers</p>
        <input class="animated-border" type="text" id="username" placeholder="Username" name="_username">
        <p class="msg" id="uname">Username must be greater than 6 characters</p>
        <input class="animated-border" id="email" type="text" placeholder="Email/mobile" name="email">
        <p class="msg" id="emailmsg">Invalid format. Must be in the form example@gmail.com</p>
        <input class="animated-border" type="password" id="password" placeholder="Password" name="password">
        <p class="msg" id="pwd">Password must contain alphanumeric, uppercase, lowercase, and special characters with atleast 8 characters</p> -->
       <?php signupdata();?>
        <button type="submit" id="btn">Sign Up</button>
        <div id="icon">
            <a href="https://accounts.google.com/">
                <img src="../photo/google.png" alt="Google" height="23px" width="23px">
            </a>
            <a href="https://www.facebook.com/">
                <img src="../photo/facebook.png" alt="Facebook" height="23px" width="23px">
            </a>
            <a href="https://twitter.com/i/flow/login">
                <img src="../photo/twitter.png" alt="Twitter" height="23px" width="23px">
            </a>
        </div>
    </form>
<p class="form-error"><?php
check_signup_errors();
?></p>
  </div>
</div>
</body>
</html>
