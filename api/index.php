<?php

header('Content-Type: application/json');

try
{
	$pdo = new PDO('mysql:host=localhost;dbname=api;','root');

	$retour['success'] = true;
	$retour['message'] = "connexion a la base de donnees reussi";

}catch(Exception $e){
	
	$retour['success'] = false;
	$retour['message'] = "connexion a la base de donnees impossible";
}

	$requete= $pdo->prepare("SELECT * FROM `etudiant`");
	$requete->execute();
	$retour['success'] = true;
	$retour['message'] = "voici les etudiants";
	$retour["resultat"]["etudiant"] = $requete->fetchALL();
	
echo json_encode($retour);

?>