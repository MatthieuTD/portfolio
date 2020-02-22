<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-back.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
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
?>
<body>
    <?php  if (isset($_POST['bt3'])) {
                $statement = $db->prepare('INSERT INTO pt_skill (nom,pourcentage) VALUES (:namee,:pourcen  )');
                $statement->bindParam(':namee', $_POST['skillname']);
                $statement->bindParam(':pourcen', $_POST['pourcen']);
                $statement->execute();
            }
            ?>
            <div class="center">
                <div class="titre formu">
                    Ajout skill
                </div>
            </div>
            <div class="center">


                <form method="post">
                    <div class="row">

                        <div class="col">
                            <input type="text" placeholder="Nom skill" name="skillname" class="form-control">
                        </div>
                        <div class="col">
                            <input type="number" placeholder="Pourcentage" name="pourcen" class="form-control">

                        </div>

                    </div>
                    <div class="center">
                        <input type="submit" name="bt3" class="btn btn-primary" value="créer">

                    </div>


                </form>
            </div>


            <div class="center">
                <div class="titre formu">
                    Modification SKILL
                </div>
            </div>
            <div class="center">
                <?php
                if (isset($_POST['bt4'])) {
                    $statement = $db->prepare('UPDATE pt_skill Set nom = :namee, pourcentage= :pourcen WHERE id = :id ');
                    $statement->bindParam(':namee', $_POST['skillname']);
                    $statement->bindParam(':pourcen', $_POST['pourcen']);
                    $statement->bindParam(':id', $_POST['id']);
                    $statement->execute();
                }
                if (isset($_POST['bt-sup-sk'])) {
                    $statement = $db->prepare('DELETE FROM pt_skill WHERE id = :id ');
                    $statement->bindParam(':id', $_POST['id']);
                    $statement->execute();
                }


                $statement = $db->prepare('SELECT * FROM pt_skill ');
                $statement->execute();
                while ($row1 = $statement->fetch()) { ?>

                    <div class="center">


                        <form method="post">
                            <div class="row">

                                <div class="col">
                                    <input type="text" value="<?php echo $row1['nom'] ?>" name="skillname" class="form-control">
                                </div>

                                <div class="col">
                                    <input type="number" value="<?php echo $row1['pourcentage'] ?>" name="pourcen" class="form-control">
                                </div>



                            </div>

                            <div class="center"></div>
                            <input type="hidden" name="id" value="<?php echo $row1['id'] ?>">
                            <input type="submit" name="bt-sup-sk" class="btn btn-danger" value="supprimer">
                            <input type="submit" name="bt4" class="btn btn-primary" value="Modifier">


                        </form>

                    </div>
            </div>
        <?php } ?>
    
</body>
</html>