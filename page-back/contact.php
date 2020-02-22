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
 <div class="titre formu">
                Liste msg
            </div>

            <div class="table table-striped">
                <table>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Objet</th>
                        <th scope="col">Message</th>
                        <th scope="col">Suppression</th>
                    </tr>
                    <?php
                    //PARTIE RECUP MSG FORM CONTACT
                    if (isset($_POST['bt-sup-msg'])) {
                        $statement = $db->prepare('DELETE FROM pt_form WHERE id = :id ');
                        $statement->bindParam(':id', $_POST['id']);
                        $statement->execute();
                    }
                    $statement = $db->prepare('SELECT * FROM pt_form');
                    $statement->execute();
                    while ($row1 = $statement->fetch()) { ?>


                        <tr>
                            <td><?php echo $row1['nom']; ?></td>
                            <td><?php echo $row1['email']; ?></td>
                            <td><?php echo $row1['objet']; ?></td>
                            <td class="msg"><?php echo $row1['msg']; ?></td>
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
                                <td><input type="submit" class="btn btn-danger " name="bt-sup-msg" value="Supprimer"></td>
                            </form>
                        </tr>








                    <?php } ?>
            </div>

            </table>

            </div>
</body>
</html>