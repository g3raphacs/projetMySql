<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjetMySql</title>
</head>
<body>
    <?php require_once('header.php');?>
    <?php
    // Connexion à la base de données
    $dsn = 'mysql:dbname=projetmysql;host=localhost';
    $user = 'root';
    $password = '';

    try {
        $base = new PDO($dsn, $user, $password);
        echo 'Connecté à la base de donnée';
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

    ?>

    <h1>Afficher tous les gens dont le nom est palmer:</h1>

    <?php 
    $reponse = $base->query("SELECT * FROM `table1` WHERE `last_name` LIKE 'Palmer'");

    while ($donnees = $reponse->fetch()){
    ?>
    <p>
    <strong>Prénom</strong> : <?php echo $donnees['first_name']; ?>&nbsp;&nbsp;
    <strong>Nom</strong> : <?php echo $donnees['last_name']; ?>&nbsp;&nbsp;
    <strong>Email</strong> : <?php echo $donnees['email']; ?>&nbsp;&nbsp;
    <strong>Sexe</strong> : <?php echo $donnees['gender']; ?>&nbsp;&nbsp;
    <strong>Date de naissance</strong> : <?php echo $donnees['birth_date']; ?><br />
    </p>
    <?php } $reponse->closeCursor(); ?>

    <hr>
    <h1>Afficher toutes les femmes:</h1>

    <?php 
    $reponse = $base->query("SELECT * FROM `table1` WHERE `gender` LIKE 'Female'");

    while ($donnees = $reponse->fetch()){
    ?>
    <p>
    <strong>Prénom</strong> : <?php echo $donnees['first_name']; ?>&nbsp;&nbsp;
    <strong>Nom</strong> : <?php echo $donnees['last_name']; ?><br />
    </p>
    <?php } $reponse->closeCursor(); ?>

    <hr>
    <h1>Afficher les états dont la lettre commence par N:</h1>

    <?php 
    $reponse = $base->query("SELECT * FROM `table1` WHERE `state_code` LIKE 'N%'");

    while ($donnees = $reponse->fetch()){
    ?>
    <p>
    <strong>State</strong> : <?php echo $donnees['state_code']; ?><br />
    </p>
    <?php } $reponse->closeCursor(); ?>

    <hr>
    <h1>Afficher les emails qui contiennent google:</h1>

    <?php 
    $reponse = $base->query("SELECT * FROM `table1` WHERE `email` LIKE '%google%'");

    while ($donnees = $reponse->fetch()){
    ?>
    <p>
    <strong>Mail</strong> : <?php echo $donnees['email']; ?><br />
    </p>
    <?php } $reponse->closeCursor(); ?>

</body>
</html>