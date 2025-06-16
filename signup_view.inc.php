<?php
declare(strict_types=1);
function check_signup_errors(){
    if(isset($_SESSION["error"])){
        $errors=$_SESSION["error"];
        unset($_SESSION["error"]);
    $error = reset($errors);
        echo $error;
        unset($_SESSION["error"]);
    }
}
    function confirmation(){
         if(isset($_GET['signup']) && $_GET["signup"]==="success"){
        // echo '<p class="form-sucess">SignUp Successfully!</p>';
echo '<div id="confirmationModal" class="modal">' .
         '<div class="modal-content">' .
         '<span class="close">×</span>' .
         '<div>' .
         '<h1>Thank You!</h1>' .
         '<p>For registering to our website!</p>' .
         '<p>You have Sign Up Successfully!</p>' .
         '<span>For login ' .
         '<a href="login2.html" style="color:blue">Click here</a></span>' .
         '<button id="button">Close</button>' .
         '</div></div>' .
         '</div>';
    }
}
function signupdata(){
if(isset($_SESSION["user_data"]["firstname"])){
    echo '<input class="animated-border" id="fname" type="text" placeholder="First Name" name="first_name" value="'. $_SESSION["user_data"]["firstname"].'">';
}
else{
echo '<input class="animated-border" id="fname" type="text" placeholder="First Name" name="first_name">';
}
if(isset($_SESSION["user_data"]["lastname"])){
    echo '<input class="animated-border" id="lname" type="text" placeholder="Last Name" name="last_name" value="'. $_SESSION["user_data"]["lastname"].'">';
}
else{
echo '<input class="animated-border" id="lname" type="text" placeholder="Last Name" name="last_name">';
}

if(isset($_SESSION["user_data"]["username"]) && !isset($_SESSION["error"]["error_username_taken"]) && !isset($_SESSION["error"]["invalid_username"])){
echo '<input class="animated-border" type="text" id="username" placeholder="Username" name="_username" value="'. $_SESSION["user_data"]["username"].'" >';
}
else{
    echo'<input class="animated-border" type="text" id="username" placeholder="Username" name="_username">';
}
if( isset($_SESSION["user_data"]["email"]) && !isset($_SESSION["error"]["error_invalid_email"]) && !isset($_SESSION["error"]["error_email_taken"]) ){
echo '<input class="animated-border" id="email" type="text" placeholder="Email/mobile" value="'. $_SESSION["user_data"]["email"].'" name="email" >';         
}
else
echo '<input class="animated-border" id="email" type="text" placeholder="Email/mobile" name="email">';
echo '<input class="animated-border" type="password" id="password" placeholder="Password" name="password">';
}