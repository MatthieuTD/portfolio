<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back-end.php</title>
    <link rel="stylesheet" href="css/style-back.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<?php
session_start();

if(isset($_SESSION['co'])){
    if ($_SESSION['co'] != TRUE){
        header('location: auth-back.php');
    }
}else {
    header('location: auth-back.php');
}



?>

<body>
 <div class="center">
     

<a href="page-back/desc.php">Modification description</a>
<a href="page-back/pro.php">Modification CV</a>
<a href="page-back/edu.php">Modification Formation</a>
<a href="page-back/skill.php">Modification skill</a>
<a href="page-back/portfolio.php">Modification portfolio</a>
<a href="page-back/contact.php">Liste message</a>

</div>


           



</body>

</html>