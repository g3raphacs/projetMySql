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

    <h1>Nombre de femme et d’homme</h1>

    <?php
    $reponse = $base->query("SELECT COUNT(*) FROM `table1` WHERE `gender` LIKE 'Female'");

    while ($donnees = $reponse->fetch()){
        ?>
        <p>
        <strong>Nombre de femmes</strong> : <?php echo $donnees[0]; ?><br><br>
        </p>
        <?php } $reponse->closeCursor(); ?>


        <?php
        $reponse = $base->query("SELECT COUNT(*) FROM `table1` WHERE `gender` LIKE 'Male'");
        while ($donnees = $reponse->fetch()){
        ?>
        <p>
        <strong>Nombre d'hommes</strong> : <?php echo $donnees[0]; ?><br><br>
        </p>
        <?php } $reponse->closeCursor(); ?>


</body>
</html>