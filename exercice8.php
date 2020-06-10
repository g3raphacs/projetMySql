<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjetMySql</title>
</head>
<body>
    <?php require_once('header.php');?>
    <?php require_once('connect.php');?>

<h1>Afficher l'âge de chaque personne, puis la moyenne d’âge générale, celle des femmes puis celle des hommes:</h1>

<?php 
$reponse = $base->query("SELECT FLOOR(DATEDIFF( curdate(), birth_date)/365.25) AS age FROM table1");
$reponse2 = $base->query("SELECT AVG(DATEDIFF( curdate(), birth_date)/365.25) FROM table1");
$reponse3 = $base->query("SELECT AVG(DATEDIFF( curdate(), birth_date)/365.25) FROM table1 WHERE `gender` LIKE 'Female'");
$reponse4 = $base->query("SELECT AVG(DATEDIFF( curdate(), birth_date)/365.25) FROM table1 WHERE `gender` LIKE 'Male'");

while ($donnees = $reponse3->fetch()){
    ?>
    <p>
    <strong>Moyenne d'age des femmes:</strong> : <?php echo $donnees[0]; ?>&nbsp;&nbsp;
    </p>
    <?php } $reponse3->closeCursor();

while ($donnees = $reponse4->fetch()){
    ?>
    <p>
    <strong>Moyenne d'age des hommes:</strong> : <?php echo $donnees[0]; ?>&nbsp;&nbsp;
    </p>
    <?php } $reponse4->closeCursor();

while ($donnees = $reponse2->fetch()){
    ?>
    <p>
    <strong>Moyenne d'age:</strong> : <?php echo $donnees[0]; ?>&nbsp;&nbsp;
    </p>
    <?php } $reponse2->closeCursor();

while ($donnees = $reponse->fetch()){
    ?>
    <p>
    <strong>Age:</strong> : <?php echo $donnees['age']; ?>&nbsp;&nbsp;
    </p>
    <?php } $reponse->closeCursor(); ?>


</body>
</html>