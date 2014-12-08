<?php
// Je me connecte à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=attractif', 'root', '');
}
catch (Exception $e) // Si erreur
{
    die('Erreur : ' . $e->getMessage());
}

//Je vérifie le pseudo et le mot de passe
$req = $bdd->prepare('SELECT COUNT(id) FROM user WHERE pass = :pass AND mail = :login'); // Je compte le nombre d'entrée ayant pour mot de passe et login ceux rentrés
$req->bindValue(':pass', $_POST['pwd'], PDO::PARAM_STR);
$req->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
$data = $req->execute();
$req->closeCursor(); // Termine le traitement de la requête

// Je teste la valeur de $data['membre_valide']

if($data == TRUE) { // On as trouvé un membre avec ce couple mdp, login

   header('location:back-user.php');
}
else { // Personne n'existe dans la table avec ce couple mdp, login

    echo 'le login et le mot de passe rentrés sont invalides';
}
?>