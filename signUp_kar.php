<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["_username"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
            try {
                require_once "server.inc.php"; 
                require_once "signup_modal.inc.php";
                require_once "signup_contr.inc.php";
             // Error Handler
                $errors=[];

                if(any_field_empty($first_name ,$last_name, 
                 $username, $email, $pwd)){
                    $errors['error_empty']="Fill in All the fields";
                 }
                
        if(is_username_taken( $pdo,$username)){
        $errors['error_username_taken'] = `"`."$username".`"`.' username not available';
        }
        if(email_invalid($email)){
            $errors['error_invalid_email']="Invalid Email";
        }
        if(email_taken($pdo,$email)){
            $errors['error_email_taken']=" Email Already Used";        
        }
        if(username_invalid($username)){
            $errors['invalid_username']="Username Does not have special characters & atleast 7 digits long!";
        }
        if(password_invalid($pwd)){
            $errors['error_passwordInvalid']="Password must have alphanumeric,lowercase,uppercase and special character!";
        }
        require_once "config_session.inc.php";
        if($errors){
$_SESSION["error"]=$errors;
$signup_data=[
    'firstname'=>$first_name,
    'lastname'=>$last_name,
    'username'=>$username,
    'email'=>$email  
];
$_SESSION["user_data"]=$signup_data;
Header("Location: SignUp2.php");
die();
        }
        create_user($pdo, $first_name ,$last_name,$username ,$email,$pwd);
    
    Header("Location: signUp2.php?signup=success");
    $pdo= null;
    $stmt= null;
    die();
    }
    catch (PDOexeption $e) 
    {
    die("Connection failed:" . $e->getMessage());
    }
}
    else{
    echo"Something Went Wrong";
    Header("Location: ../signUp2.php");
    } 