<?php

$host = 'localhost';
$dbname = 'bddtest';
$username = 'root';
$password = '';

// Connexion a la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
} catch (PDOException $exc) {
    echo $exc->getMessage();
  exit();
}

// On récupère la liste des utilisateurs
try{
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);
    if($stmt === false){
        die("Erreur");
    }
}catch (PDOException $e){
    echo $e->getMessage();
    exit();
}

if(isset($_POST['insert']))
{
    $username = $_POST['lastname'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE lastname=?");
    $stmt->execute([$username]); 
    $user = $stmt->fetch();

    // On vérifie si l'utilisateur existe déja
    if ($user) {
        echo 'Erreur';
} else { 
    // Si l'utilisateur n'existe pas, on execute le code suivant:
    // On Récupère les valeurs du formulaire
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    // Requête pour insérer des données
    $sql = "INSERT INTO `users`(`firstname`, `lastname`) VALUES (:firstname,:lastname)";

    // Exécute une requête préparée
    $res = $pdo->prepare($sql);

    // Exécute une instruction préparée avec un tableau de valeurs d'insertion
    $exec = $res->execute(array(":firstname"=>$firstname,":lastname"=>$lastname));

    // On vérifie si la requête d'insertion a réussi
    if($exec){
        echo "Opération d'insertion réussi";
        }else{
        echo "Échec de l'opération d'insertion";
    }
} 
    
}
