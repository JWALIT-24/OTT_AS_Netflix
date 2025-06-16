<?php
declare(strict_types=1);      

function any_field_empty(string $first_name ,string $last_name, 
string $username, string $email, string $pwd){
    if(empty($first_name) || empty($last_name)  
|| empty($username) || empty($email) || empty($pwd)){
return true;
}
else
return false;
}

 function is_username_taken(object $pdo,string $username){
           if(get_user($pdo, $username)){
            return true;
           }
           else{
            return false;
           }
            }

 function email_invalid(string $email){
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    return true;
                }
                else
                return false;
                }
 function email_taken(object $pdo,$email){
     if(get_email( $pdo, $email)){
      return true;
     }
     else
     return false;
            }

 function username_invalid(string $username){
    $pttn= '/^[a-zA-Z0-9]{7,}+$/';
        if(preg_match($pttn,$username)){
    return false;
}
else 
return true;
   }

 function password_invalid(string $pwd){
                $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[\\W_]).{8,}$/';
                if (preg_match($pattern, $pwd)) {
                    return false;
                } else {
                    return true;
                }                     
            }

 function create_user(object $pdo, string $first_name ,string $last_name,string $username ,string $email,string $pwd){
 set_user($pdo, $first_name , $last_name, $username , $email, $pwd);
            
        }
    