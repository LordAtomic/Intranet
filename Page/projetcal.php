<?php
session_start();
$id = $_SESSION["id"];
// liste des événements
$json = array();
// requête qui récupère les événements
$requete = "SELECT id, Titre as title, date_debut as start, date_fin as end  FROM Projet";

// connexion à la base de données
try {
$bdd = new PDO('mysql:host=localhost;dbname=antoine', 'root', 'Insta123');
} catch(Exception $e) {
exit('Impossible de se connecter à la base de données.');
}
// exécution de la requête
$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

// envoi du résultat au success
echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
