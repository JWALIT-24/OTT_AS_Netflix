<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="post">
        <input type="text" name="x" placeholder="name">
</form>

</body>
</html>

<?php
    // echo"{$_POST["name"]}";
     // echo " {$_POST["x"]}";
    // $x= $_POST["x"];
    // $total=null;

    // $total= $x*10;
    // echo"{$total} rs ";

    $x=$_POST["x"];

    // for($i=0; $i <= $x; $i++){
    //     echo $i  ,"<br>";
    // }
    
   
?>
