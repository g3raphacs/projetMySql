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

    <h1>Insérer un utilisateur, lui mettre à jour son adresse mail puis supprimer l’utilisateur.</h1>
    <!-- définir les variables -->
    <?php
    $id;
    $first_name = 'Jeremy';
    $last_name = 'Mathieu';
    $email = 'jm@gmail.com';
    ?>
    <!-- trouver le nouvel identifiant -->
    <?php
    $reponse = $base->query("SELECT MAX(id) FROM table1");
    while ($donnees = $reponse->fetch()){

        $id=$donnees[0]+1;
        echo 'new ID = '.$id.'<br />';
     } $reponse->closeCursor(); ?>

    <!-- créer un nouvel utilisateur  -->
    <?php
    $reponse = $base->prepare('INSERT INTO table1(id, first_name, last_name) VALUES(:id, :first_name, :last_name)');
    $reponse->execute(array(
	'id' => $id,
	'first_name' => $first_name,
	'last_name' => $last_name,
	));
    echo 'Nouvel utilisateur ajouté<br />';
    ?>
    <!-- mettre à jour l'email  -->
    <?php
    $reponse = $base->prepare('UPDATE table1 SET email = :email WHERE id = :id');
    $reponse->execute(array(
    'email' => $email,
	'id' => $id,
	));
    echo 'Email mis à jour<br />';
    ?>
    <!-- afficher le nouvel utilisateur  -->
    <?php
    $reponse = $base->prepare("SELECT * FROM `table1` WHERE `id` LIKE :id");
    $reponse->execute(array(
	'id' => $id,
    ));

    while ($donnees = $reponse->fetch()){
        ?>
        <p>Nouvel Utilisateur:<br />
        <strong>Prénom:</strong> : <?php echo $donnees['first_name']; ?><br />
        <strong>Nom:</strong> : <?php echo $donnees['last_name']; ?><br />
        <strong>Email:</strong> : <?php echo $donnees['email']; ?><br />
        </p>
        <?php } $reponse->closeCursor(); ?>

    <!-- supprimer l'utilisateur  -->
    <?php
    $reponse = $base->prepare('DELETE FROM table1 WHERE id = :id');
    $reponse->execute(array(
	'id' => $id,
	));
    echo 'Utilisateur supprimé';
    ?>

</body>
</html>