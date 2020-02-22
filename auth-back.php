<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion partie back</title>
</head>
<body>
<?php 
session_start();
require_once 'connect.php';
    if (isset($_POST['btsub'])){
        $statement = $db->prepare('SELECT * FROM user ');
$statement->execute();
while ($row1 = $statement->fetch()) { 

    if($row1['login'] == $_POST['login']){
        
        if( password_verify($_POST['mdp'],$row1['mdp']) ){
            $_SESSION['co']= TRUE;
            header('location: back.php');
        }
    }

}

    }
?>

<form method="POST">
    <input type="text" required="required" placeholder="login" name="login">
    <input type="password"required="required" placeholder="Mot de passe" name="mdp" >
    <input type="submit" name="btsub" value="Connexion">
</form>

    

</body>
</html>