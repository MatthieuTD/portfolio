<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-back.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ajout Pro</title>
</head>
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
  // PARTIE EDUCATION

  if (isset($_POST['btedu'])) {
    $statement = $db->prepare('INSERT INTO pt_edu (NomPo,NomBat,com1,com2,com3) 
            VALUES (:nomCom,:nomBat,:com1,:com2,:com3)');
    $statement->bindParam(':nomCom', $_POST['nomCom']);
    $statement->bindParam(':nomBat', $_POST['nomBat']);
    $statement->bindParam(':com1', $_POST['com1']);
    $statement->bindParam(':com2', $_POST['com2']);
    $statement->bindParam(':com3', $_POST['com3']);
    $statement->execute();
}



?>


<div class="center">
    <div class="titre formu">
        Ajout edu
    </div>
</div>
<div class="center">
    <form method="POST">
        <input type="text" class="form-control" placeholder="Nom POSTE" name="nomCom">
        <input type="text" class="form-control" placeholder="Nom lieu" name="nomBat">
        <input type="text" class="form-control" placeholder="Text forma" name="com1">
        <input type="text" class="form-control" placeholder="Text forma" name="com2">
        <input type="text" class="form-control" placeholder="Text forma" name="com3">
        <input type="submit" name="btedu" class="btn btn-primary" value="Créer">
    </form>

</div>

<div class="center">
    <div class="titre formu">
        Modification expérience EDUCATION
    </div>
</div>
<?php
//MODIFICATION PRO
if (isset($_POST['bt6'])) {
    $statement = $db->prepare('UPDATE pt_edu Set NomPo= :nomCom, NomBat= :nomBat,com1 = :com1,com2 = :com2,com3 = :com3 WHERE id = :id ');
    $statement->bindParam(':nomCom', $_POST['nomCom']);
    $statement->bindParam(':nomBat', $_POST['nomBat']);
    $statement->bindParam(':com1', $_POST['com1']);
    $statement->bindParam(':com2', $_POST['com2']);
    $statement->bindParam(':com3', $_POST['com3']);
    $statement->bindParam(':id', $_POST['id']);
    $statement->execute();
}
if (isset($_POST['bt-sup-edu'])) {
    $statement = $db->prepare('DELETE FROM pt_edu WHERE id = :id ');
    $statement->bindParam(':id', $_POST['id']);
    $statement->execute();
}
$statement = $db->prepare('SELECT * FROM pt_edu ');
$statement->execute();
while ($row1 = $statement->fetch()) { ?>






    <form method="post">
        <div class="center">
            <input type="text" value="<?php echo $row1['NomPo'] ?>" name="nomCom" class="form-control">
            <input type="text" value="<?php echo $row1['NomBat'] ?>" name="nomBat" class="form-control">
        </div>
        <div class="center">


            <input type="text" value="<?php echo $row1['com1'] ?>" name="com1" class="form-control">
            <input type="text" value="<?php echo $row1['com2'] ?>" name="com2" class="form-control">
            <input type="text" value="<?php echo $row1['com3'] ?>" name="com3" class="form-control">
        </div>
        <input type="hidden" name="id" value="<?php echo $row1['id'] ?>">
        <div class="center">


            <input type="submit" name="bt-sup-edu" class="btn btn-danger" value="supprimer">
            <input type="submit" name="bt6" class="btn btn-primary" value="Modifier">

        </div>
    </form>


<!-- Recup MESSAGE CONTACT-->
    

    <?php }

    ?>


<body>
</body>
</html>