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


<h1>Membres ACS et départements:</h1>

<?php 
$reponse = $base->query("SELECT * FROM membre_acs as M INNER JOIN departements_acs as D on M.ID = D.ID ORDER BY `nom`");

while ($donnees = $reponse->fetch()){
    ?>
    <p>
    <strong>Prenom:</strong> : <?php echo $donnees['prenom']; ?>&nbsp;&nbsp;
    <strong>Nom:</strong> : <?php echo $donnees['nom']; ?>&nbsp;&nbsp;
    <strong>Departement:</strong> : <?php echo $donnees['code_dpt'].' - '.$donnees['nom_dpt']; ?>&nbsp;&nbsp;
    </p>
    <?php } $reponse->closeCursor();?>


</body>
</html>