<?php
if($_SERVER["REQUEST_METHOD"]=='POST'){
  $item_link=$_POST['item_link'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>ṇ
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video Player Page</title>
  <style>
    body{
     background-color:rgba(11, 11, 10, 0.873); */
  }</style>
</head> 
<body>
<iframe width="1300" height="610" src="<?php echo $item_link?>" title="Free Horror Trailer Intro 30 second No Copyright For Video Cinematic Teaser." frameborder="0" allowfullscreen></iframe>
</body>
</html>
<!-- https://www.youtube.com/embed/jHYhTERQ97s -->