<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style_header.css">
    <link rel="stylesheet" href="../style/style_identification.css">
    <link rel="stylesheet" href="../style/style-bulle-etat.css">
    <title>Epoka - Accueil</title>
</head>
<body>
    
    <!---- HEADER ---->
    <?php require_once("../vues/header.php")   ?>
    

    <!---- BULLE INFO ---->
    <?php
        if(isset($_SESSION["numero"])){
    ?>

    <div id="bulle-etat-connecte">
        <p><?php echo("Bonjour ". $_SESSION["prenom"] ." ".$_SESSION["nom"]." ! Vous êtes bien connecté") ?></p>
    </div>

    <?php
        } else {
    ?>

    <div id="bulle-deconnecte">
        <p></p>
    </div>
    <?php }?>

    <?php if(!isset($_SESSION["numero"])){ ?>

    <!---- IDENTIFICATION ---->
    <section>

        <form method="POST" action="../script/connexion.php">

            <h1>Identifiez-vous</h1>

            <div class="form-input">
                
                <input type="text" name="numero" autocomplete="off" required>
                <label for="numero">Numéro</label>
            </div>

            <div class="form-input">
                <input type="password" name="mdp" autocomplete="off" required>
                <label for="mdp">Mot de passe</label>
            </div>
            <div class="form-input">
                <input type="submit" value="Se connecter">
            </div>

        </form>

    </section>

    <?php } ?>
</body>
</html>