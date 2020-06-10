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