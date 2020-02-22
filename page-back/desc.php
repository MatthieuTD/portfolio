<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-back.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Description</title>
</head>
<body>
<?php
session_start();

if(isset($_SESSION['co'])){
    if ($_SESSION['co'] != TRUE){
        header('location: ../auth-back.php');
    }
}else {
    header('location: ../auth-back.php');
}
require_once '../connect.php';
//Enregistrement desc 1

if (isset($_POST['bt1'])) {

    $desc1 = $_POST['desc1'];
    $statement = $db->prepare('UPDATE portfolio set desc1 ="' . $desc1 . '" WHERE id=1');
    $statement->execute();
}
if (isset($_POST['bt2'])) {

    $desc2 = $_POST['desc2'];
    $statement = $db->prepare('UPDATE portfolio set desc1 ="' . $desc2 . '"WHERE id=2');
    $statement->execute();
}
$statement = $db->prepare('SELECT desc1 FROM portfolio WHERE id=1');
$statement->execute();
while ($row = $statement->fetch()) { ?>

    <div class="text-desc1">
        <div class="center">
            <div class="titre">
                Ajout description 1
            </div>
        </div>
        <div class="center">
            <form class="formu" method="post">
                <input type="text" name="desc1" value="<?php echo $row['desc1'] ?>" class="form-input">
        </div>
        <div class="center">
            <input type="submit" value="enregister" class="btn btn-primary" name="bt1">
        </div>

        </form>



    <?php }    ?>
    </div>

    <?php
    $statement = $db->prepare('SELECT desc1 FROM portfolio WHERE id = 2');
    $statement->execute();
    while ($row1 = $statement->fetch()) { ?>

        <div class="text-desc1">
            <div class="center">
                <div class="titre">
                    Ajout description 2
                </div>
            </div>
            <div class="center">
                <form class="formu" method="post">
                    <input type="text" name="desc2" value="<?php echo $row1['desc1']; ?>" class="form-input">
            </div>
            <div class="center">
                <input type="submit" value="enregister" class="btn btn-primary" name="bt2">
            </div>

            </form>



        <?php }    ?>
        </div>

</body>
</html>