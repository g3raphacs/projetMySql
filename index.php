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


</body>
</html>