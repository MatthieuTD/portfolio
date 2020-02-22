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
?>
<div class="form">
<!-- Partie PORTFOLIO
Ajout
-->
<div class="titre">Ajout Portfolio</div>
<?php
if(isset($_POST['btpo'])){
$statement = $db->prepare('INSERT INTO pt_presentation (Nom,image,lien) 
VALUES (:nom,:image,:lien)');
$statement->bindParam(':nom', $_POST['nom']);
$statement->bindParam(':image', $_POST['image']);
$statement->bindParam(':lien', $_POST['lien']);
$statement->execute();

}

?>




<form  method="post">
<div class="row">

<div class="col">
<input class="form-control" placeholder="Nom" type="text" name="nom" >
<input class="form-control" type="text"placeholder="Image.XXX"  name="image" >
</div>

<div class="col">
<input class="form-control" placeholder="Lien du projet"  type="text" name="lien" >
<input type="submit" name="btpo" class="btn btn-primary" value="Créer">
</div>

</div>


</form>
<div class="titre">Modification  Portfolio</div>

<?php
//MODIFICATION PRO
if (isset($_POST['bt8'])) {
$statement = $db->prepare('UPDATE pt_presentation Set nom= :nom, image= :image,lien = :lien WHERE id = :id ');
$statement->bindParam(':nom', $_POST['nom']);
$statement->bindParam(':image', $_POST['image']);
$statement->bindParam(':lien', $_POST['lien']);
$statement->bindParam(':id', $_POST['id']);
$statement->execute();
}
if (isset($_POST['bt-sup-pre'])) {
$statement = $db->prepare('DELETE FROM pt_presentation WHERE id = :id ');
$statement->bindParam(':id', $_POST['id']);
$statement->execute();
}
$statement = $db->prepare('SELECT * FROM pt_presentation ');
$statement->execute();
while ($row1 = $statement->fetch()) { ?>






<form method="post">
    <div class="center">
        <input type="text" value="<?php echo $row1['nom'] ?>" name="nom" class="form-control">
        <input type="text" value="<?php echo $row1['image'] ?>" name="image" class="form-control">
    </div>
    <div class="center">


        <input type="text" value="<?php echo $row1['lien'] ?>" name="lien" class="form-control">
        
    </div>
    <input type="hidden" name="id" value="<?php echo $row1['id'] ?>">
    <div class="center">


        <input type="submit" name="bt-sup-pre" class="btn btn-danger" value="supprimer">
        <input type="submit" name="bt8" class="btn btn-primary" value="Modifier">

    </div>
</form>


<!-- Recup MESSAGE CONTACT-->


<?php }

?>


</body>
</html>