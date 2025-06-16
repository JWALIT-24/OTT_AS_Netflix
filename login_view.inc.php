<?php
function view(){
if(isset($_SESSION["errors_login"])){
    echo ' <p CLASS="form-error">&#10060 Invalid Credentials!</p>';
}
else
echo"";
}