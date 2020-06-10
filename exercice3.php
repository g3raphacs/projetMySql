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

    <h1>Afficher les états dont la lettre commence par N:</h1>

    <?php
    $reponse = $base->query("SELECT * FROM `table1` WHERE `state_code` LIKE 'N%'");

    while ($donnees = $reponse->fetch()){
    ?>
    <p>
    <strong>Etat</strong> : <?php echo $donnees['state_code']; ?><br />
    </p>
    <?php } $reponse->closeCursor(); ?>

</body>
</html>