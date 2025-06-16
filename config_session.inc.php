<?php

ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);
session_set_cookie_params([
    'lifetime'=>'1800',
    'domain'=>'localhost',
    'path'=>'/',
    'secure'=>true,
    'httponly'=>true
]);
session_start();
//session_regenerate_id(true);       //instead we can create a code which implement it again and again to after a certain amount of time
if(isset($_SESSION["user_id" ])){

}
else
{
if(!isset($_SESSION["last_regeneration"])){
    // session_regenerate_id(true);
    // $_SESSION['last_regeneration'] =time();   //create a function instead
    regenerate_session_id();  
}
else{
    $interval = 30*60;        //30 minutes
    if(time()- $_SESSION['last_regeneration']>=$interval){    //greater than equal to
    // session_regenerate_id(true);
    // $_SESSION['last_regeneration']=time();      // //create a function instead     
    regenerate_session_id();
}
}
}
// function regenerate_session_id_loggedin(){
//     session_regenerate_id(true);
//     $userId = $_session("user_id");
//     $newSessionId = session_create_id();
//     $sessionId = $newSessionId ."_". $result["id"];
//     session_id($sessionId);
//     $_SESSION['last_regeneration']=time();  
// }

function regenerate_session_id(){
    session_regenerate_id(true);
     $_SESSION['last_regeneration']=time();  
}

// if($_SERVER["REQUEST_METHOD"]=="POST"){


// }

// 41759739179
// SBIN0006702
// VRCE BRANCH 
// tpin 7810
// lpin 7412
// atpin 1115