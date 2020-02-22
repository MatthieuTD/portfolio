<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matthieu THOLOT</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
require_once 'connect.php';
?>
<!-- NAVBAR -->
<nav class="nav">
    <a href="index.php">
        <div class="name">MATTHIEU TD</div>
    </a>
    <div class="link-list">
        <a href="#con" class="link">Contact</a>
        <a href="#porto" class="link">Portfolio</a>
        <a href="#skill" class="link">Skill</a>
        <a href="#edu" class="link">CV</a>
        <a href="#moi" class="link hei">À propos</a>
    </div>
</nav>

<!-- BANNIERE -->
<div class="ban">
    <div class="contain">
        <div class="title">
            <marquee direction="left"> Développeur Web</marquee>
        </div>
        <div class="bar"></div>
        <?php
        $statement = $db->prepare('SELECT desc1 FROM portfolio WHERE id = 1');
        $statement->execute();
        while ($row = $statement->fetch()) { ?>

            <div class="text">
                <?php echo $row['desc1']; ?>
            </div>
        <?php } ?>
        <a href="#moi">
            <div class="button-propo">À propos de moi</div>
        </a>
    </div>


</div>

<!-- PRESENTATION-->
<div class="propo" id="moi">
    <div class="center1">

        <div class="container">
            <div class="title-propo">
                Développement
                <bold>Front-end</bold> et
                <bold>Back-end</bold>, référencement, prestashop
            </div>
            <div class="center1">
                <div class="bar-bl"></div>

            </div>
            <?php
            $statement = $db->prepare('SELECT desc1 FROM portfolio WHERE id=2');
            $statement->execute();
            while ($row = $statement->fetch()) { ?>


                <div class="text-prez">
                    <?php echo $row["desc1"]; ?>
                </div>
            <?php } ?>
            <div class="center1">
                <a href="#edu">
                    <div class="button-propo-bl">Mes expériences</div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Partie CV  -->
<section>
    <div class="education" id="edu">
        <div>
            <div class="center1">
                <div class="title-educ">Professionnel</div>
            </div>
            <?php
            $statement = $db->prepare('SELECT * FROM pt_comp');
            $statement->execute();
            while ($row = $statement->fetch()) { ?>

                <div class="center1">
                    <div class="formation">
                        <?php echo $row['NomPo'] ?>
                    </div>
                </div>

                <div class="center1">

                    <div class="edu">


                        <div class="contenu">
                            <div class="nom-forma">
                                <?php echo $row['NomBat'] ?>
                            </div>
                        </div>
                        <div class="contenu">
                            <div class="contenu-forma">
                                <?php echo $row['com1'] ?>
                            </div>
                        </div>


                        <div class="contenu">
                            <div class="contenu-forma">
                                <?php echo $row['com2'] ?>
                            </div>
                        </div>
                        <div class="contenu">
                            <div class="contenu-forma">
                                <?php echo $row['com3'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>


    </div>
    <div class="bar-mid"></div>
    <div class="pro">

        <div>
            <div class="center1">
                <div class="title-educ">Education</div>
            </div>
            <?php
            $statement = $db->prepare('SELECT * FROM pt_edu');
            $statement->execute();
            while ($row = $statement->fetch()) { ?>
                <div class="formation">
                    <?php echo $row['NomPo'] ?>
                </div>
                <div class="center1">
                    <div class="edu">


                        <div class="contenu">
                            <div class="nom-forma">
                                <?php echo $row['NomBat'] ?>
                            </div>
                        </div>
                        <div class="contenu">
                            <div class="contenu-forma">
                                <?php echo $row['com1'] ?>
                            </div>
                        </div>


                        <div class="contenu">
                            <div class="contenu-forma">
                                <?php echo $row['com2'] ?>
                            </div>
                        </div>
                        <div class="contenu">
                            <div class="contenu-forma">
                                <?php echo $row['com3'] ?>
                            </div>
                        </div>


                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
    </div>
</section>
<!--Partie skill-->
<div class="center1" id="skill">
    <h1 class="titlesk">Skills</h1>
</div>

<div class="skill">


    <div class="barcentre">

        <?php
        $statement = $db->prepare('SELECT * FROM pt_skill ');
        $statement->execute();
        while ($row1 = $statement->fetch()) { ?>
            <div class="barre">

                <div style="width:<?php echo $row1['pourcentage']; ?>%" class="rempli"><?php echo $row1['nom']; ?></div>
                <?php $nb = 100 - $row1['pourcentage']; ?>
                <p class="bar-in" style="width:<?php echo $nb; ?>%"> <?php echo $row1['pourcentage']; ?>%</p>
            </div>
        <?php } ?>

    </div>






</div>
<!--PROTFOLIO-->
<div class="center1" id="porto">
    <h1 class="titlepor">Portfolio</h1>
</div>
<div class="center1">


<div class="portfolio">
<?php
$statement = $db->prepare('SELECT * FROM pt_presentation');
            $statement->execute();
            while ($row = $statement->fetch()) { ?>

    <a href="<?php echo $row['lien'] ?>">
    <div class="pj">
        <div style="background-image: url('img/<?php echo $row['image']; ?>');" class="banpj"></div>
        <div class="center1">
        <div class="text-port">
           <?php echo $row['nom'] ;?>
        </div>
        </div>
       
    </div>
    </a>
            <?php } ?>





</div>

</div>


<!-- FORMULAIRE -->
<?php
if (isset($_POST['bt_com'])) {
    $statement = $db->prepare('INSERT INTO pt_form (nom,email,objet,msg) 
    VALUES (:nom,:email,:objet,:msg)');
    $statement->bindParam(':nom', $_POST['nom']);
    $statement->bindParam(':email', $_POST['mail']);
    $statement->bindParam(':objet', $_POST['objet']);
    $statement->bindParam(':msg', $_POST['msg']);

    $statement->execute();
}

?>

<div class="formulaire" id="con">
    <div class="container">

        <h2>Contact me</h2>

        <form id="contact" method="post">
            <div class="left">
                <input type="text" name="nom" placeholder="Name" required="required" />
                <input type="email" name="mail" placeholder="Email" required="required" />
                <input type="text" name="objet" placeholder="Subject" required="required" />
            </div>
            <div class="right">
                <textarea placeholder="Message" name="msg" required="required"></textarea>
            </div>
            <div class="send-button cl">
                <button name="bt_com" type="submit">Send</button>
            </div>
        </form>

    </div>
</div>
<!-- FOOTER-->
<div class="footer">

    <div class="center-footer">
        <div class="contact">
            <div class="title-footer">Contact</div>
            <div class="info">68 Cours Victor Hugo</div>
            <div class="info">33000 Bordeaux</div>
            <div class="info">09 82 23 27 78</div>

        </div>
        <div class="reseau">
            <div class="center-res">
                <a href="https://www.facebook.com/tholotmatthieu">
                    <div class="fb"></div>
                </a>
                <a href="https://www.instagram.com/matthieutholot/?hl=fr">
                    <div class="insta"></div>
                </a>
                <a href="https://www.linkedin.com/in/matthieu-tholot-dechene-57156a145/">
                    <div class="linkdin"></div>
                </a>
            </div>

        </div>
    </div>


</div>




<script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!--
<script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        //console.log(scroll);
        if (scroll >= 720) {
            //console.log('a');
            $(".nav").addClass("change");
            $(".link").addClass("lk-change");
        } else {
            //console.log('a');
            $(".nav").removeClass("change");
            $(".link").removeClass("lk-change");
        }
    });
</script>
-->

</html>