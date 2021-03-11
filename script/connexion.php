<?php
    
    if (!isset($_POST["numero"])) die ("Numéro absent");
    $numero = $_POST["numero"];
    if (!isset($_POST["mdp"])) die ("Mdp absent");
    $mdp = $_POST["mdp"];

    $pdo = new PDO("mysql:host=127.0.0.1; dbname=epoka;charset=UTF8", "root", "root");
    $stmt = $pdo->prepare ("SELECT * FROM salarie WHERE sal_id=:user AND sal_mdp=PASSWORD(:mdp)");
    $stmt->bindParam ("user", $numero,PDO::PARAM_STR);
    $stmt->bindParam ("mdp", $mdp,PDO::PARAM_STR);
    $stmt->execute ();

    if ($ligne = $stmt->fetch()){
        
        session_start();
        $_SESSION ["numero"] = $numero;
        $_SESSION ["nom"] = $ligne["sal_nom"];
        $_SESSION ["prenom"] = $ligne["sal_prenom"];

        $_SESSION ["peutValider"] = $ligne["sal_peutValider"];
        $_SESSION ["peutPayer"] = $ligne["sal_peutPayer"];

        header('location: ../index.php');
        
    } else {
        die("<div><center> Numéro ou mot de passe incorrect <br />
        <a href='javascript:history.back()' color='#5fa8d3';>Page précédente</a> </center></div>");
    }

?>